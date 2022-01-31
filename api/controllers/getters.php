<?php
include_once('../models/models.php');
include_once('controllers.php');

// Cette fonction se charge de prendre les données de FORMATIONS...!
function getFormation(int $personneId)
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($personneId);
    $reponse = $information -> obtenir_formation($id -> get_personne_id());
    $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
    $json = new CreateJSON(3);
    $json -> sendJSON($data);
    unset($json);
    unset($id);
    unset($information);
}

// Cette fonction prende la FONCTION d'une personne...!
function getFonction(int $personneId)
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($personneId);
    $reponse = $information -> obtenir_fonction($id -> get_personne_id());
    $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
    $json = new CreateJSON(3);
    $json -> sendJSON($data);
    unset($json);
    unset($id);
    unset($information);
}

function getExperience(int $personneId)
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($personneId);
    $reponse = $information -> obtenir_experience($id -> get_personne_id());
    $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
    $json = new CreateJSON(3);
    $json -> sendJSON($data);
    unset($json);
    unset($id);
    unset($information);
}

function getDistinction(int $personneId)
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($personneId);
    $reponse = $information -> obtenir_distinction($id -> get_personne_id());
    $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
    $json = new CreateJSON(3);
    $json -> sendJSON($data);
    unset($json);
    unset($id);
    unset($information);
}

function getCompetence(int $personneId)
{
    $information = new Personnes(3);
    $id = new PersonneId(3);
    $id -> set_personne_id($personneId);
    $reponse = $information -> obtenir_competence($id -> get_personne_id());
    $data = $reponse -> fetchAll(PDO::FETCH_ASSOC);
    $json = new CreateJSON(3);
    $json -> sendJSON($data);
    unset($json);
    unset($id);
    unset($information);
}
