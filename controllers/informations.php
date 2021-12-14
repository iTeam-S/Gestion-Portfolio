<?php
session_start();
header('Content-Type: application/json');
include_once('../models/models.php');
include_once('controllers.php');

try
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id((int) $_SESSION['id']);
    $formation = $information -> obtenir_formation($id -> get_personne_id());
    $fonction = $information -> obtenir_fonction($id -> get_personne_id());
    $experience = $information -> obtenir_experience($id -> get_personne_id());
    $distinction = $information -> obtenir_distinction($id -> get_personne_id());
    $competence = $information -> obtenir_competence($id -> get_personne_id());

    $infos = [];
    if(count($fonction -> fetchall()) && count($competence -> fetchall()))
    {
            $infos['status'] = true;
            $infos['message'] = "Les données sont bien envoyées !";
            $infos['formation'] = $formation -> fetchall();
            $infos['fonction'] = $fonction -> fetchall();
            $infos['experience'] = $experience -> fetchall();
            $infos['distinction'] = $distinction -> fetchall();
            $infos['competence'] = $competence -> fetchall();
    }
    else
    {
        $infos = array(
            'status' => false,
            'message' => "Erreur: aucune donnée renvoyée"
        );
    }

}
catch(Exception $se)
{
    die('Erreur:<br>'.$e -> getMessage());
}

echo json_encode($infos);
