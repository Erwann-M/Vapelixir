<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" href="img/logo_potion.png" size="20x20">
    <title>Profil</title>
</head>
<body>
    <?php
        require "elements/header.php"
    ?>
    <div id="main_container">
        
        <?php
            require "elements/navbar.php";

            require 'elements/connection_bdd.php';

            $nom = $bdd->query('SELECT pseudo, photo_profil FROM membres WHERE id="'. $_SESSION['id'] .'"');
            $pseudo = $nom->fetch();
        ?>
        <img src="img_profil/<?php echo $pseudo['photo_profil'] ?>" alt="">
        <h1>Salut <?php echo $pseudo['pseudo'] ?></h1><br>
        <a href="deconnection.php">Deconnexion</a>

    </div>
</body>
</html>