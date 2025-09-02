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
 * 		  - $menu (lista estruturada URL => ROTULO): é um array de rótulos indexados pela sua URL
 * 
 */
class Header
{
    private $titulo;
    private $logo;
    private $menu;

	// Construtor da classe - As constantes TITULO, LOGO e MENU são definidas no arquivo ./config.php
    public function __construct($titulo = TITULO, $logo = LOGO, $menu = MENU)
	{
        $this->titulo = $titulo;
        $this->logo = $logo;
        $this->menu = $menu;
    }

	// Função que adiciona um novo link no menu passando sua url e seu rótulo
    public function adicionarLink($url, $rotulo)
	{
        $this->menu[$url] = $rotulo;
    }

	// Função que produz uma apresentação HTML do cabeçalho da página utilizando classes do Bootstrap CSS
    public function gerarHTML()
	{
		echo "<header class='bg-primary text-white p-3'>";
			echo "<div class='container d-flex flex-wrap align-items-center justify-content-between'>";
				echo "<a href='#' class='d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none'>";
        
					if ($this->logo != NULL){
						echo "<img src='{$this->logo}' alt='Logo' class='me-2 rounded'>";
					}
		
					echo "<span class='fs-4'>{$this->titulo}</span>";
				echo "</a>";
	
				echo "<ul class='nav'>";
				foreach ($this->menu as $url => $rotulo){
					echo "<li class='nav-item'><a href='{$url}' class='nav-link text-white'>{$rotulo}</a></li>";
				}
				echo "</ul>";
			echo "</div>";
		echo "<header>";
    }
}