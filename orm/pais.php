<?php
require_once ("./orm/model.php");
require_once ("./orm/autor.php");

class Pais extends Model{
  protected static $tabela = "Paises";
  
  // Um pais POSSUI MUITOS autores
  public function autores(){
  	return $this->possui_muitos(Autor::class, "pais_id");
  }
}