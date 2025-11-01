<?php

    $livro_id = isset($_GET["livro_id"])? $_GET["livro_id"]: null;

    if ($livro_id == null){
        echo "<div class='alert alert-warning'>";
        echo "<strong>Aviso!</strong> Livro não encontrado.";
        echo "</div>";
    }
    else{
        require_once "./orm/livro.php";
        require_once "./orm/genero.php";

        $livro = Livro::find($livro_id);

        if ($livro == null){
            echo "<div class='alert alert-warning'>";
            echo "<strong>Aviso!</strong> Livro não encontrado no BDR.";
            echo "</div>";
        }
        else{
            echo "<h3>Gêneros do Livro {$livro->titulo}</h3>";
            echo "<form action='index.php?view=livros/sincronizarGeneros' method='post'>";
            echo "<input type='hidden' name='livro_id' value='{$livro->id}'>";

            foreach(Genero::all() as $genero){
                echo "<div>";

                    $checked = in_array($genero, $livro->generos())? "checked": "";

                    echo "<input type='checkbox' name='generos[]' value='{$genero->id}' {$checked}>";
                    echo $genero->nome;

                echo "</div>";
            }

            echo "<button type='submit' class='btn btn-primary btn-sm'>Salvar</button>";

            echo "</form>";

        }
    
    }