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

        <div id="left_container">
            <img src="img_profil/<?php echo $pseudo['photo_profil'] ?>" alt="">
            <h1>Salut <?php echo $pseudo['pseudo'] ?></h1><br>
            <h2><a href="deconnection.php">Deconnexion</a></h2>
            <h2><a href="creation_elixir.php">Ajouter une recette</a></h2>
        </div>
        <div id="right_container">
            <h1>Mes recettes</h1>
            <?php

                $recettes = $bdd->query('SELECT id FROM eliquide WHERE id_createur="'. $_SESSION['id'] .'"');
                $nbre_recettes = $recettes->fetch();

                $nbre_tot_recettes = count(array($nbre_recettes));

                if ($nbre_tot_recettes > 1) {
                    
                    $number_while = 0;

                    while ($nbre_tot_recettes != $number_while) {

                        $affichage_recettes = $bdd->query('SELECT id, nom_liquide, id_createur, categorie, nbr_like, description_l, photo_liquide FROM eliquide WHERE id_createur="'. $_SESSION['id'] .'"');
                        $affichage_recettes_min = $affichage_recettes->fetch();
                        ?>
                            <div class="conteneur_recette">
                                <img src="img_liquide/<?php echo $affichage_recettes_min['photo_liquide'] ?>" alt="">
                                <h2><a href="affichage_recette.php?id_recette=<?php echo $affichage_recettes_min['id'] ?>"><?php echo $affichage_recettes_min['nom_liquide'] ?></a></h2>
                                <?php
                                    $createur = $bdd->query('SELECT pseudo FROM membres WHERE id="'. $affichage_recettes_min['id_createur'] .'"');
                                    $nom_createur = $createur->fetch();
                                ?>
                                <p>Créé par : <?php echo $nom_createur['pseudo'] ?></p>
                                <p>Categorie : <?php echo $affichage_recettes_min['categorie'] ?></p>
                                <p><?php echo $affichage_recettes_min['description_l'] ?></p>
                                <?php
                                ?>

                            </div>
                        <?php

                    }

                }
                else {
                    echo "Vous n'avez pas de recettes enregistrées";
                }
                
            ?>
        </div>


    </div>
</body>
</html>