<?php
    include('connectToDatabase.php');
    $reponse = $database -> query("SELECT id FROM membre ORDER BY id DESC LIMIT 0, 1");

    $requete = $database -> prepare("INSERT INTO experiences(nom, annee, type, description, id_membre)
    VALUES(:nom, :annee, :type, :descriptions, :idMembre)");

?>