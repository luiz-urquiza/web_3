<?php
require_once ("./orm/model.php");
require_once ("./orm/livro.php");

class Genero extends Model{
  protected static $tabela = "Generos";
  
  // Um gênero PERTENCE A MUITOS livros
  public function livros(){
  	return $this->pertence_a_muitos(Livro::class, "genero_livro", "genero_id", "livro_id");
  }
}