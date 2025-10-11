<?php
require_once ("./orm/model.php");
require_once ("./orm/autor.php");
require_once ("./orm/genero.php");

class Livro extends Model{
  protected static $tabela = "Livros";
  
  // Um livro PERTENCE A um autor
  public function autor(){
  	return $this->pertence_a(Autor::class, "autor_id");
  }

  // Um livro PERTENCE A MUITOS gêneros (n: n)
  public function generos(){
    return $this->pertence_a_muitos(Genero::class, "genero_livro", "livro_id", "genero_id");
  }

}