<?php

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=vapelixir;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e) {
        die ('erreur :' . $e->getMessage());
    }

?>