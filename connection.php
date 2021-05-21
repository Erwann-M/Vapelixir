<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" href="img/logo_potion.png" size="20x20">
    <title>Connection</title>
</head>
<body>

    <?php
        require 'elements/connection_bdd.php';

        if (isset($_POST['email']) && isset($_POST['mdp'])) {

            $recup_info = $bdd->query('SELECT id, email, mdp FROM membres WHERE email="'. $_POST['email'] .'"');
            $info = $recup_info->fetch();

            if (!$info) {
                echo '<p class="erreur_form">Mauvais e-mail !</p>';
            }
            else {
                $pass_correct = password_verify($_POST['mdp'], $info['mdp']);
                
                if ($pass_correct) {
                    session_start();
                    $_SESSION['id'] = $info['id'];
                    header('Location:index.php');
                }
                else {
                    echo '<p class="erreur_form">Mauvais mot de passe !</p>';
                }
            }
        }
    ?>

    <div id="main_container">

        <?php
            require "elements/navbar.php"
        ?>
        <div id="formulaire">
            <form method="post" id="form_connection">
                <input type="text" name="email" id="email" placeholder="Entrez votre e-mail"><br>
                <input type="password" name="mdp" class="mdp" placeholder="Entrez votre mot de passe"><br>
                <input type="submit" value="Se connecter" id="connect_btn">
            </form>
            <p id="demande_inscription">Pas de compte ? Pour sauvegarder vos recettes préférées et ajouter les votres.<br><a href="inscription.php">Inscrivez vous</a></p>

        </div>

    </div>
</body>
</html>