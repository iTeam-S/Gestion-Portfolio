<?php
    include('../models/requeteExperience.php');
    $donnee = $reponse -> fetch();
    $requete -> execute(array(
        'nom' => strip_tags($_POST['nom']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['description']),
        'idMembre' => $donnee['id']
    ));
    header('Location:../views/competence.php')
?>