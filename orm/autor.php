<?php
require_once ("./orm/model.php");
require_once ("./orm/livro.php");

class Autor extends Model{
  protected static $tabela = "Autores";
  
  // Um autor POSSUI MUITOS livros
  public function livros(){
  	return $this->possui_muitos(Livro::class, "autor_id");
  }
}