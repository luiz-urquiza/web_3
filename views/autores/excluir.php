<?php

require_once "./orm/autor.php";

$id = isset($_GET["id"])? $_GET["id"]: NULL;

if ($id == NULL){
    echo "<div class='alert alert-danger'>";
    echo "<strong>Aviso!</strong> Exclusão não pode ser realizada";
    echo "</div>";
}
else{
    $autor = Autor::find($id);
    if ($autor){
        $autor->excluir();
    }
    header("location: index.php?view=autores/autores");
}

