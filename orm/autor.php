<?php
require_once ("./orm/model.php");
require_once ("./orm/livro.php");
require_once ("./orm/pais.php");

class Autor extends Model{
  protected static $tabela = "Autores";
  
  // Um autor POSSUI MUITOS livros
  public function livros(){
  	return $this->possui_muitos(Livro::class, "autor_id");
  }

  // Um autor PERTENCE A um pais
  public function pais(){
    return $this->pertence_a(Pais::class, "pais_id");
  }
}