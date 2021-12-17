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
                require_once('./getters.php');
                if(!empty($url[1]))
                {
                    get_infos($url[1]);
                }
                else
                {
                    throw new Exception("Aucun ID n'a été pas en demande", 1);
                }
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
