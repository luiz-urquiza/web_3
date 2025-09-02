<?php
    // Arquivo com os dados que instanciam as classes
    require_once "./config.php";
    
    // Arquivos com as classes utilizadas para fazer o layout da página
    require_once "./classes/header.php";

    // Instanciando um objeto do Layout
    $header = new Header();
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
    <title>Document</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <?php $header->gerarHTML(); ?>

    <script src="./javascript/bootstrap.bundle.min.js"></script>
</body>
</html>