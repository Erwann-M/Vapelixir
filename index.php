<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" href="img/logo_potion.png" size="20x20">
    <title>Vapelixir</title>
</head>
<body>
    <?php
        require "elements/header.php"
    ?>
    <div id="main_container">
        
        <?php
            require "elements/navbar.php";
        ?>
    
        <div id="last_entry">
            <div class="row">
                <div class="items"></div>
                <div class="items"></div>
                <div class="items"></div>
                <div class="items"></div>
            </div>
            <div class="row">
                <div class="items"></div>
                <div class="items"></div>
                <div class="items"></div>
                <div class="items"></div>
            </div>
        </div>

    </div>
</body>
</html>