<?php
session_start();
include_once('../models/models.php');
include_once('controllers.php');

try
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($_SESSION['id']);
    $formation = $information -> obtenir_formation($id -> get_personne_id());
    $fonction = $information -> obtenir_fonction($id -> get_personne_id());
    $experience = $information -> obtenir_experience($id -> get_personne_id());
    $distinction = $information -> obtenir_distinction($id -> get_personne_id());
    $competence = $information -> obtenir_competence($id -> get_personne_id());

    $infos = [];
    $infos['formation'] = $formation -> fetchAll(PDO::FETCH_ASSOC);
    $infos['fonction'] = $fonction -> fetchAll(PDO::FETCH_ASSOC);
    $infos['experience'] = $experience -> fetchAll(PDO::FETCH_ASSOC);
    $infos['distinction'] = $distinction -> fetchAll(PDO::FETCH_ASSOC);
    $infos['competence'] = $competence -> fetchAll(PDO::FETCH_ASSOC);

    $json = new CreateJSON(3);
    $json -> sendJSON($infos);
    unset($json);
    unset($id);
    unset($information);
}
catch(Exception $se)
{
    die('Erreur:<br>'.$e -> getMessage());
}
