<?php

    require_once "./orm/usuario.php";

    $usuarios = Usuario::all();

if ($usuarios){
    echo "<h3>Usuários do Sistema</h3>";

    echo "<table class='table table-hover'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Login</th>";
            echo "<th>Senha</th>";
            echo "<th>Email</th>";
            echo "<th>Ações</th>";
        echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
        foreach($usuarios as $u){
        echo "<tr>";
            echo "<td>{$u->id}</td>";
            echo "<td>{$u->login}</td>";
            echo "<td>{$u->senha}</td>";
            echo "<td>{$u->email}</td>";
            echo "<td><a href='index.php?view=usuario&id={$u->id}'>[+]</a></td>";
        echo "</tr>";
        }
    echo "</tbody>";
    echo "</table>";
}
