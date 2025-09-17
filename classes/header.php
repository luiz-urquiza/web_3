<?php
/**
 * Classe Header
 * 
 * 		Esta é uma classe de Layout da página que organiza o CABEÇALHO da página
 * 
 * 		Atributos:
 * 		  - $titulo (string): O título principal do App
 * 		  - $logo (string): Nome do arquivo de imagem (jpg, png, etc) com a logo do App
 * 				Este arquivo deve estar na pasta ./imagens
 * 
 */
class Header
{
    private $titulo;
    private $logo;
   
	// Construtor da classe - As constantes TITULO, LOGO e MENU são definidas no arquivo ./config.php
    public function __construct($titulo = TITULO, $logo = LOGO)
	{
        $this->titulo = $titulo;
        $this->logo = $logo;
    }

	// Função que produz uma apresentação HTML do cabeçalho da página utilizando classes do Bootstrap CSS
    public function gerarHTML()
	{
		echo "<header class='bg-light text-dark p-3'>";
			echo "<div class='container d-flex flex-wrap align-items-center justify-content-between'>";
				echo "<a href='index.php' class='d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none'>";
        
					if ($this->logo != NULL){
						echo "<img src='./imagens/{$this->logo}' alt='Logo' class='me-2 rounded'>";
					}
					echo "<h1>{$this->titulo}</h1>";
					
				echo "</a>";
			echo "</div>";
		echo "</header>";
    }
}