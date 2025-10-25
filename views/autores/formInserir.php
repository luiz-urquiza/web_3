<form action="index.php?view=autores/inserir" method="post">

  <div class="mb-3 mt-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="nome" placeholder="Informe o nome do autor" name="nome" required>
  </div>

  <div class="mb-3">
    <label for="pais_id" class="form-label">Nacionalidade:</label>

    <select class="form-select" required name="pais_id" id="pais_id">
        <option>Selecione...</option>
        <?php
            require_once "./orm/pais.php";
            $paises = Pais::all();
            foreach ($paises as $pais){
                echo "<option value='{$pais->id}'>{$pais->gentilico}</option>";
            }
        ?>
    </select>
    
  </div>

  <button type="submit" class="btn btn-primary">Salvar</button>
</form>