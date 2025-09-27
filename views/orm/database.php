<?php

class Database{

    // Atributo que representa uma conexão com o BDR
    private static $pdo;

    // Gera a conexão com o BDR
    public static function getConnection(){
        // Conexão com MySQL
        self::$pdo = new PDO("mysql:host=localhost;dbname=banco", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }
}