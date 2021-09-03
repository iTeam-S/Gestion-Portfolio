<?php
    include('connectToDatabase.php');
    
    $reponse = $database -> query("SELECT id FROM membre ORDER BY id DESC LIMIT 0, 1");

    $requete = $database -> prepare("INSERT INTO competences(nom, liste, id_categorie, id_membre)
    VALUES(:nom, :liste,:idCategorie, :idMembre)");
?>