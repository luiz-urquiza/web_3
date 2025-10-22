<?php

require_once "./orm/pais.php";

$paises = Pais::all();
?>

<?php foreach ($paises as $pais): ?>
    <?php if (count($pais->autores()) > 0): ?>
    <div class="card m-3">
        <div class="card-header">
            #<?php echo $pais->id ?>
            <?php echo $pais->nome ?> (<?php echo $pais->sigla?>)
        </div>
        <div class="card-body">
            <?php foreach ($pais->autores() as $autor): ?>
                <div>
                    <strong>Autor: </strong> <?php echo $autor->nome ?>

                    <h5>Livros</h5>
                    <div class="m-2">
                    <?php foreach ($autor->livros() as $livro): ?>
                        <div>
                            <?php echo $livro->titulo ?>
                        </div>
                    <?php endforeach; ?>   
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>