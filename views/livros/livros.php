<?php

require_once ("./orm/livro.php");

// Captura todos os livros do BDR
$livros = Livro::all();
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gêneros</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($livros as $livro){
            echo "<tr>";
                echo "<td>{$livro->id}</td>";    
                echo "<td>{$livro->titulo}</td>";
                echo "<td>{$livro->autor()->nome}</td>";
                
                echo "<td>";
                foreach($livro->generos() as $genero){
                    echo $genero->nome . "<br>";
                }
                echo "</td>";
                
                echo "<td>";
                    echo "<div class='btn-group'>";
                        echo "<a class='btn btn-primary btn-sm'>Alterar</a>"; 
                        echo "<a class='btn btn-primary btn-sm'>Excluir</a>";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>

</table>