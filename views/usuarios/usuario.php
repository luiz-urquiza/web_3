<?php
    require_once("./orm/usuario.php");

    $id = isset($_GET["id"])? $_GET["id"]: NULL;

    $usuario = NULL;

    if ($id){
        $usuario = Usuario::find($id);
    }

    if ($usuario == NULL){
        echo "<div class='alert alert-warning'>";
        echo "<strong>Aviso!</strong> Usuário não foi encontrado.";
        echo "</div>";
    }
    else{
        echo "<div class='card'>";
            echo "<div class='card-header'><h3>Usuário #{$usuario->id}</h3></div>";
            echo "<div class='card-body'>";

            echo "<strong>Login: </strong> {$usuario->login}<br>";
            echo "<strong>Email: </strong> {$usuario->email}<br>";
            echo "<strong>Senha: </strong> {$usuario->senha}<br>";

            echo "</div>";
        echo "</div>";
    }

