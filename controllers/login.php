<?php
session_start();
include_once('../models/models.php');
include_once('controllers.php');

try
{
    if(!empty($_POST['identifiant']) AND !empty($_POST['password']))
    {    
        $login = new Login(3);
        $info_auth = new InfosLogin(3);
        $info_auth -> set_info_login($_POST['identifiant'], $_POST['password']);

        $donnees = $login -> authentifier($info_auth -> get_info_login());

        if(!empty($donnees['TRUE']) AND !empty($donnees['id']))
        {
            $_SESSION['id'] = $donnees['id'];
            echo $donnees['TRUE'];
        }
        else
        {
            echo "Identifiant et/ou mot de passe incorrecte...!\nMerci de réessayer !";
        }
        unset($login);
        unset($info_auth);
    }
}
catch(Exception $e)
{
    die("Erreur sur l'authentification:<br>".$e -> getMessage());
}
