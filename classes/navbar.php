<?php
class Navbar{

    private $menu;

    public function __construct($menu = MENU){
        if (is_array($menu)){
            $this->menu = $menu;
        }
        else{
            $this->menu = array();
        }
    }

    public function adicionarLink($url, $rotulo){
        $this->menu[$url] = $rotulo;
    }

    public function gerarHTML(){
        echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>";
        echo "<div class='container-fluid'>";

        // Botão sanduiche
        echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">';
        echo '<span class="navbar-toggler-icon"></span>';
        echo '</button>';

            echo '<div class="collapse navbar-collapse" id="collapsibleNavbar">';
            echo "<ul class='navbar-nav'>";

            foreach($this->menu as $url => $rotulo){

                echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='index.php?view=$url'>$rotulo</a>";
                echo "</li>";
            }

            echo "</ul>";
            echo "</div>";
            
        echo "</div>";
        echo "</nav>";
    }
}
