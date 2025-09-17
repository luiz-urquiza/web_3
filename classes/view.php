<?php
class View{
    private $view;

    public function __construct(){
        if (isset($_GET["view"])){
            $this->view = $_GET["view"];
        }
        else {
            $this->view = "inicio";
        }
    }

    public function gerarHTML(){
        echo "<main class='container mt-5'>";

        if (file_exists("./views/{$this->view}.php")){
            include_once("./views/{$this->view}.php");
        }
        else{
            echo "<div class='alert alert-warning m-3'>";

            echo "<strong>Aviso!</strong> A view \"{$this->view}\" ainda não foi implementada!";

            echo "</div>";
        }

        echo "</main>";
    }
}