
<div id="navigation">
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="tabac.php">Les tabacs</a></li>
        <li><a href="gourmand.php">Les gourmands</a></li>
        <li><a href="fruite.php">Les fruité</a></li>
        <li><a href="boisson.php">Les boissons</a></li>
        <?php 
            if (isset($_SESSION['id'])) {
                echo '<li><a href="profil.php">Profil</a></li>';
            }
            else {
                echo '<li><a href="connection.php">Connexion</a></li>';
            }
        ?>
        
    </ul>
</div>
