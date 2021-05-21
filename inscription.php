<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" href="img/logo_potion.png" size="20x20">
    <title>Inscription</title>
</head>
<body>


    <div id="main_container">
        <?php
            require "elements/navbar.php";
            ?>
        <div id="formulaire">
            <form method="post" id="form_inscription">
                <input type="text" name="pseudo" class="input_inscription" placeholder="Entrez un pseudo"><br>
                <input type="text" name="email1" class="input_inscription" placeholder="Entrez un e-mail"><br>
                <input type="text" name="email2" class="input_inscription" placeholder="Confirmez votre e-mail"><br>
                <input type="password" name="mdp1" class="input_inscription" placeholder="Entrez un mot de passe"><br>
                <input type="password" name="mdp2" class="input_inscription" placeholder="Confirmez le mot de passe"><br>
                <input type="submit" value="Valider" id="connect_btn">
            </form>
            <?php
                if (isset($_POST['pseudo']) && isset($_POST['email1']) && isset($_POST['email2']) && isset($_POST['mdp1']) && isset($_POST['mdp2'])) {
                    
                    require "elements/connection_bdd.php";
        
                    if ($_POST['mdp1'] == $_POST['mdp2']) {

                        if ($_POST['email1'] == $_POST['email2']) {

                            if (preg_match('#^[a-z0-9-_.]+@[a-z0-9-_.]{2,}\.[a-z]{2,4}$#', $_POST['email1'])) {

                                $_POST['email1'] = strtolower($_POST['email1']);

                                $email = $bdd->query('SELECT email FROM membres WHERE email="'. $_POST['email1'] .'"');
                                $email_exist = $email->fetch();

                                if (isset($email_exist['email'])) {
                                    echo '<p class="erreur_form">Cet e-mail est deja utilisé !</p>';
                                    $email->closeCursor();
                                }
                                else {
                                    $mdp_crypt = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);

                                    $registration = $bdd->prepare('INSERT INTO membres (email, mdp, pseudo, date_inscription) VALUES (:email, :mdp, :pseudo, CURDATE())');
                                    $registration->execute(array(
                                        'email' => $_POST['email1'],
                                        'mdp' => $mdp_crypt,
                                        'pseudo' => $_POST['pseudo']
                                    ));
                                    echo '<p id="valid_form">Compte créer avec succès !</p>';
                                }
                            }
                            else {
                                echo '<p class="erreur_form">L\'e-mail n\'est pas correct !</p>';
                            }
                        }
                        else {
                            echo '<p class="erreur_form">Les e-mails ne correspondent pas !</p>';
                        }
                    }
                    else {
                        echo '<p class="erreur_form">Les mots de passes ne correspondent pas !</p>';
                    }
        
                }
            ?>
        </div>
    </div>

</body>
</html>