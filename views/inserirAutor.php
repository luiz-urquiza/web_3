<?php

require_once "./orm/autor.php";

$autor = new Autor();

$autor->nome = "Aluísio de Azevedo";
$autor->pais_id = 1;

$autor->inserir();