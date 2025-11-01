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

  public function vincularGenero($genero_id){
    $this->vincular("genero_livro", "livro_id", "genero_id", $genero_id);
  }

  public function desvincularGenero($genero_id){
    $this->desvincular("genero_livro", "livro_id", "genero_id", $genero_id);
  }

  public function sincronizarGeneros($generos_id){
    $this->sincronizar("genero_livro", "livro_id", "genero_id", $generos_id);
  }
}