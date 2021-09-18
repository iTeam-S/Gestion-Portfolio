<?php
    include('../models/models_class.php');

    $experience = new ExperienceModels();
    $membre_id = new MembreModels();

    $reponse = $membre_id -> get_last_id_membre();

    $donnee = $reponse -> fetch();

    $information_experience = array(
        'nom' => strip_tags($_POST['nom']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['description']),
        'idMembre' => $donnee['id']
    );

    $experience -> inserer_information_experience($information_experience);

    unset($membre_id);
    unset($experience);
    header('Location:../views/view.c.php')
?>