<?php
    require_once ("./orm/autor.php");

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
                echo "<tr>";
                    echo "<td>{$autor->id}</td>";
                    echo "<td>{$autor->nome}</td>";
                    echo "<td>{$autor->pais()->gentilico}</td>";

                    echo "<td>";
                    echo count($autor->livros());
                    echo "</td>";

                    echo "<td>";
                    echo "<div class='btn-group'>";
                        echo "<a class='btn btn-primary btn-sm'>Alterar</a>"; 
                        echo "<button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#excluir_{$autor->id}'>";
                        echo "Excluir";
                        echo "</button>";
                    echo "</div>";
?>
                    <!-- The Modal -->
                    <div class="modal" id="<?php echo "excluir_{$autor->id}"?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Confirma a exclusão?</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                    
                          <!-- Modal body -->
                          <div class="modal-body">
                            <?php echo "Excluindo o autor #{$autor->id} - {$autor->nome}" ?>
                          </div>
                    
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <a href="index.php?view=autores/excluir&id=<?php echo $autor->id ?>" class="btn btn-success">Confirmar</a>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                          </div>
                    
                        </div>
                      </div>
                    </div>                    
<?php
                    echo "</td>";

                echo "</tr>";
            }
        ?>
    </tbody>
</table>