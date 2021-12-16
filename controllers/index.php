<?php
try
{
    if(!empty($_GET['requete']))
    {
        $url = explode("/", filter_var($_GET['requete']), FILTER_SANITIZE_URL);

        switch($url[0])
        {
            case "login":
                require_once('./login.php');
            break;

            case "setters":
                require_once('./setters.php');
            break;

            case "informations":
                require_once('./informations.php');
            break;

            default: throw new Exception("Le demande n'est pas validée. Veuillez verifier l'URL...!", 1);
        }
    }
    else
    {
        throw new Exception("Erreurs sur la récupération des données...!", 1);
    }
}
catch(Exception $e)
{
    $errors = array(
        'status' => false,
        'message' => $e -> getMessage(),
        'code' => $e -> getCode()
    );
    print_r($errors);
}
