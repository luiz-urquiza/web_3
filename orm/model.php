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
        $this->atributo[$chave] = $valor;
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

} 