<?php

require_once "./orm/autor.php";

$id = isset($_GET["id"])? $_GET["id"]: NULL;

if ($id == NULL){
    header("location: index.php?view=autores");
    die();
}

$autor = Autor::find($id);

$autor->excluir();