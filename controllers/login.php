<?php
session_start();
include_once('../models/models.php');
if(!empty($_POST['identifiant']) AND !empty($_POST['password']))
{
    $login = new Login(3);
    $login -> set_info(trim(strip_tags($_POST['identifiant'])), trim(strip_tags($_POST['password'])));
    $reponse = $login -> get_id();
    $donnee = $reponse -> fetch();
    if(!empty($donnee['id']))
    {
        $_SESSION['id'] = $donnee['id'];
        header('Location:../views/ajouter.php');
    }
    else
    {
        header('Location:../index.php');
    }
}
?>
