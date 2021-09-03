<?php 

include('connectToDatabase.php');
$reponses = $database -> query("SELECT prenom_usuel FROM membre");

$requete = $database -> prepare("INSERT INTO membre(nom, prenom, prenom_usuel, user_github, user_github_pic, tel1,tel2, mail, facebook, linkedin, cv, adresse, description, fonction)
VALUES(:nom, :prenom, :prenom_usuel,:user_github, :user_github_pic, :tel1, :tel2, :mail, :facebook, :linkedin, :cv, :adresse, :descriptions, :fonction)");

?>
