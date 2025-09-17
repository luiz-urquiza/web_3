<?php
    // Arquivo com os dados que instanciam as classes
    require_once "./config.php";
    
    // Arquivos com as classes utilizadas para fazer o layout da página
    require_once "./classes/header.php";
    require_once "./classes/footer.php";
    require_once "./classes/view.php";
    require_once "./classes/navbar.php";

    // Instanciando um objeto do Layout
    $header = new Header();

    // Instaniando um objeto Footer
    $footer = new Footer();

    // Instanciando um objeto View
    $view = new View();

    // Instanciando um objeto Navbar
    $navbar = new Navbar();
?>
<!-- 
    Esta página possui um layout contendo:
        HEADER - O cabeçalho da página contendo um TÍTULO, uma LOGO e um MENU de hyperlinks
        MAIN - A parte principal da página, onde serão exibidos os conteúdos
        FOOTER - O rodapé da página com os dados de COPYRIGHT, AUTOR e ANO

    Esta página utiliza bootstrap para formatação CSS
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <?php 
        // Produzindo um header
        $header->gerarHTML(); 

        // Produzindo uma barra de navegação
        $navbar->gerarHTML();

        // Carregar uma view
        $view->gerarHTML();

        // Produzindo um footer
        $footer->gerarHTML();    
    ?>

    <script src="./javascript/bootstrap.bundle.min.js"></script>
</body>
</html>