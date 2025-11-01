<?php

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "<div class='alert alert-danger'>";
    echo "<strong>Aviso!</strong> Gêneros não puderam ser vinculados ao livro";
    echo "</div>";
}
else{
    require_once "./orm/livro.php";

    $livro = Livro::find($_POST["livro_id"]);
    $generos = $_POST["generos"];

    $livro->sincronizarGeneros($generos);
    header("location: index.php?view=livros/livros");
}
