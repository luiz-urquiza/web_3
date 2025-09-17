<?php
/**
 * Classe Footer
 * 
 *      A classe Footer representa o RODAPÉ da página. Ela exibe
 *  informações simples como copyright e email de contato da
 *  equipe de desenvolvimento
 * 
 *      Atributos:
 *      - $ano (int): ano de produção do App
 *      - $endereco (string): endereço físico da empresa, se houver
 *      - $email (string): URL de email de contato da empresa ou equipe de desenvolvimento
 *      - $autor (string): responsável pela equipe de desenvolvimento
 * 
 */
class Footer{

    private $ano;
    private $endereco;
    private $email;
    private $autor;

    // Construtor da classe - As constantes ANO, ENDERECO, EMAIL e AUTOR são definidas no arquivo ./config.php
    public function __construct($ano = ANO, $endereco = ENDERECO, $email = EMAIL, $autor = AUTOR){
        $this->ano = $ano;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->autor = $autor;
    }

    public function gerarHTML(){

        echo "<footer class='mt-5 p-4 bg-dark text-white text-center'>";
        echo "<p>&copy; " .  $this-> ano . " Todos os direitos reservados</p>";
        echo "<div>Desenvolvido por <a href='mailto:{$this->email}'>{$this->autor}</a></div>";
        echo "</footer>";

    }
}