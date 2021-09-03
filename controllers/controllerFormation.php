<?php
    include('../models/requeteFormation.php');
    $donnee = $reponse -> fetch();
    $requete -> execute(array(
        'lieu' => strip_tags($_POST['lieu']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['description']),
        'idMembre' => $donnee['id']
    ));
    header("Location:../views/experience.php");
?>