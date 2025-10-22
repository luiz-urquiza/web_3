<?php
require_once ("./orm/genero.php");

// Captura todos os livros do BDR
$generos = Genero::all();

?>

<h3>Livros por Gêneros</h3>

<?php

    foreach ($generos as $genero){
        echo "<h4>{$genero->nome}</h4>";

        foreach ($genero->livros() as $livro){
            echo $livro->titulo . " ({$livro->autor()->nome})<br>";
        }
    }
