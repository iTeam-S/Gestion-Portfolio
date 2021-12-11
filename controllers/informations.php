<?php
session_start();
include_once('../models/models.php');
include_once('controllers/controllers.php');

$information = new Personnes(3);
$id = new PersonneId(3);
$id -> set_personne_id($_SESSION['id']);
$formation = $information -> obtenir_formation($id -> get_personne_id());
$fonction = $information -> obtenir_fonction($id -> get_personne_id());
$experience = $information -> obtenir_experience($id -> get_personne_id());
$distinction = $information -> obtenir_distinction($id -> get_personne_id());
$competence = $information -> obtenir_competence($id -> get_personne_id());

echo json_encode($formation, JSON_FORCE_OBJECT);
echo '<br>';

echo json_encode($fonction, JSON_FORCE_OBJECT);
echo '<br>';

echo json_encode($experience, JSON_FORCE_OBJECT);
echo '<br>';

echo json_encode($distinction, JSON_FORCE_OBJECT);
echo '<br>';

echo json_encode($competence, JSON_FORCE_OBJECT);
echo '<br>';
