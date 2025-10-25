<?php

require_once "./orm/autor.php";

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "<div class='alert alert-danger'>";
    echo "<strong>Aviso!</strong> Insersão não pode ser realizada";
    echo "</div>";
}
else{
    $autor = new Autor($_POST);    
    $autor->inserir();
    header("Location: index.php?view=autores/autores");
}


