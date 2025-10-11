<?php
    require_once ("./orm/autor.php");

    $autores = Autor::all();
?>

<h3>Autores de Livros</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Livros</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($autores as $autor){
                echo "<tr>";
                    echo "<td>{$autor->id}</td>";
                    echo "<td>{$autor->nome}</td>";

                    echo "<td>";
                    echo "<ul>";
                    foreach ($autor->livros() as $livro){
                        echo "<li>{$livro->titulo}</li>";
                    }
                    echo "</ul>";
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