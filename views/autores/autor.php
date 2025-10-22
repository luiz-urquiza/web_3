<?php

    require_once("./orm/autor.php");

    $id = isset($_GET["id"])? $_GET["id"]: NULL;

    if (!$id){
        echo "<div class='alert alert-warning'>";
        echo "<strong>Aviso!</strong> Autor não informado";
        echo "</div>";
    } 

    else {
        $autor = Autor::find($id);

        if (!$autor){
            echo "<div class='alert alert-warning'>";
            echo "<strong>Aviso!</strong> Autor não encontrado";
            echo "</div>";
        }
        else{
            echo "<h3>{$autor->nome}</h3>";

            echo "<table class='table table-hover'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Título</th>";
                echo "</tr>";
            echo "</thead>";

            echo "<tbody>";

            foreach($autor->livros() as $livro){
                echo "<tr>";
                    echo "<td>{$livro->id}</td>";
                    echo "<td>{$livro->titulo}</td>";
                echo "</tr>";
            }

            echo "</tbody>";


            echo "</table>";
        }

    }

    echo "<a class='btn btn-primary' href='index.php?view=livros'>Voltar</a>";