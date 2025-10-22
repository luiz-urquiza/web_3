<?php

require_once "./orm/database.php";

abstract class Model{
    // Nome da tabela representada no BDR
    protected static $tabela;

    // Array associativo de campos da tabela do BDR
    protected $atributos;

    public function __construct($dados = []){
        $this->atributos = $dados;
    }

    public function __get($chave){
        return $this->atributos[$chave];
    }

    public function __set($chave, $valor){
        $this->atributos[$chave] = $valor;
    }

    // Busca no BDR o registro cuja PK é passado por parâmetro
    public static function find($id){
        $tabela = static::$tabela;

        // Consulta segura com prepared statement
        $stmt = Database::getConnection()->prepare("SELECT * FROM $tabela WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha){
            return new static($linha);
        }
        else {
            return NULL;
        }
    }

    // Busca no BDR todos os registros da tabela
    public static function all(){
        $tabela = static::$tabela;

        // Consulta
        $stmt = Database::getConnection()->query("SELECT * FROM $tabela");

        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dados = [];

        foreach($linhas as $linha){
            $dados[] = new static($linha);
        }

        return $dados;
    }


    /** Relacionamento um para um genérico */
    public function pertence_a($classeReferenciada, $atributoFK){
        // Pega o valor da chave FK
        $valorFK = $this->$atributoFK;
      
        // Executa o método find da $classeReferenciada para retornar o registro proprietário
        return $classeReferenciada::find($valorFK);  
    }

    /**
     * Representa um relacionamento um para um do lado do proprietário
     * 
     * O proprietário busca o registro que pertence a ele
     */
    public function possui_um($classeReferenciada, $atributoFK){
        // Pega o valor da chave PK
        $valorPK = $this->id;
      
        // Pega o nome da tabela referenciada
        $tabela = $classeReferenciada::$tabela;
      
        // Prepara e executa a consulta
        $stmt = Database::getConnection()->prepare("SELECT * FROM $tabela WHERE $atributoFK = :valorPK");
        $stmt->execute(["valorPK" => $valorPK]);
      
        // Pega o registro gerado pela consulta
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
      
        // Transforma o registro em objeto e retorna
        return $registro? new $classeReferenciada($registro): NULL;  
    }

    public function possui_muitos($classeReferenciada, $atributoFK){
        // Pega o valor da chave PK
        $valorPK = $this->id;
      
        // Pega o nome da tabela referenciada
        $tabela = $classeReferenciada::$tabela;
      
        // Prepara a e executa a consulta
        $stmt = Database::getConnection()->prepare("SELECT * FROM $tabela WHERE $atributoFK = :valorPK");
        $stmt->execute(["valorPK" => $valorPK]);
      
        // Pega o todos os registros gerados
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        // Transforma todas os registros em um array de objetos e retorna
        return array_map(fn($r) => new $classeReferenciada($r), $registros);  
    }

    public function pertence_a_muitos($classeReferenciada, $tabelaPivo, $fkLocal, $fkReferenciada){
        // Pega o valor da chave PK local
        $valorPK = $this->id;
      
        // Pega o nome da tabela referenciada
        $tabelaReferenciada = $classeReferenciada::$tabela;
      
        // Prepara a e executa a consulta
        $stmt = Database::getConnection()->prepare("SELECT $tabelaReferenciada.* 
           FROM $tabelaReferenciada 
           JOIN $tabelaPivo ON $tabelaReferenciada.id = $tabelaPivo.$fkReferenciada
           WHERE $fkLocal = :valorPK"
        );
      
        $stmt->execute(["valorPK" => $valorPK]);
      
        // Pega o todos os registros gerados
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        // Transforma todas os registros em um array de objetos e retorna
        return array_map(fn($r) => new $classeReferenciada($r), $registros);  
    }

    public function excluir(){
        $tabela = static::$tabela;		// A tabela de onde será excluído o registro
        
        // Preparando a consulta
        $stmt = Database::getConnection()->prepare("DELETE FROM $tabela WHERE id = :id");
        
        // Executando a consulta passando o id do objeto a ser excluído
        $stmt->execute([":id" => $this->id]);
    }

    public function alterar(){
        $tabela = static::$tabela;
        
        $campos = array_keys($this->atributos);
        $set = implode(", ", array_map(fn($campo) => "$campo = :$campo", $campos));
        
        // Gerar a consulta
        $stmt = Database::getConnection()->prepare("UPDATE $tabela SET $set WHERE id = :id");
        
        // Executa a consulta
        $stmt->execute($this->atributos);
    }

    public function inserir(){
        $tabela = static::$tabela;
        
        $campos = array_keys($this->atributos);
        $colunas = implode (", ", $campos);
        $values = implode(", ", array_map(fn($campo) => ":$campo", $campos));
        
        // Gerar a consulta
        $stmt = Database::getConnection()->prepare("INSERT INTO $tabela ($colunas) VALUES ($values)");
        
        // Executa a consulta
        $stmt->execute($this->atributos);
        
        // Preenche o id do objeto
        $this->id = Database::getConnection()->lastInsertId();
    }
} 