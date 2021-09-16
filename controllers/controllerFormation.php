<?php
    include_once('../models/models_class.php');

    $formation = new FormationModels();
    $membre_id = new MembreModels();

    $reponse = $membre_id -> get_last_id_membre();

    $donnee = $reponse -> fetch();

    $infromation_formation = array(
        'lieu' => strip_tags($_POST['lieu']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['description']),
        'idMembre' => $donnee['id']
    );

    $formation -> inserer_information_formation($infromation_formation);

    unset($membre_id);
    unset($formation);
    
    header("Location:../views/experience.php");
?>