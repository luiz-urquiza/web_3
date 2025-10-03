<?php
require_once ("./orm/model.php");
require_once ("./orm/autor.php");

class Livro extends Model{
  protected static $tabela = "Livros";
  
  // Um livro PERTENCE A um autor
  public function autor(){
  	return $this->pertence_a(Autor::class, "autor_id");
  }
}