<?php
    require_once ("./orm/autor.php");
    require_once ("./classes/auxiliares/modal.php");

    $autores = Autor::all();
?>

<h3>Autores de Livros</h3>

<a href="index.php?view=autores/formInserir" class="btn btn-primary">Inserir Autor</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nacionalidade</th>
            <th>Livros</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($autores as $autor){
              $modal = new Modal($autor->id);
              $modal->setMensagem("Confirma a exclusão do autor {$autor->nome}!!");
              $modal->setLink("index.php?view=autores/excluir&id={$autor->id}");

              echo <<<HTML
                  <tr>
                      <td>{$autor->id}</td>
                      <td>{$autor->nome}</td>
                      <td>{$autor->pais()->gentilico}</td>
                HTML;

                echo "<td>";
                  foreach($autor->livros() as $livro){
                    echo "$livro->titulo<br>";
                  }                      
                echo "</td>";

                echo "<td>";
                  echo "<div class='btn-group'>";
                    echo "<a class='btn btn-primary btn-sm' href='#'>Alterar</a>";
                    $modal->gerarBotao();
                  echo "</div>";

                  $modal->gerarModal();

                echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>