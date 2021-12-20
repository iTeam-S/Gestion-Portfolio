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

            case "getters":
                require_once('./getters.php');
                if(!empty($url[1]))
                {
                    if(!empty($url[2]))
                    {
                        switch($url[1])
                        {
                            case "formations":
                                getFormation($url[2]);
                            break;
                            case "fonctions":
                                getFonction($url[2]);
                            break;
                            case "experiences":
                                getExperience($url[2]);
                            break;
                            case "distinctions":
                                getDistinction($url[2]);
                            break;
                            case "competences":
                                getCompetence($url[2]);
                            break;
                            default: throw new Exception("Erreur sur le paramètre passé en URL...!", 404);
                        }
                    }
                    else
                    {
                        throw new Exception("Aucun ID n'a été passé sur l'URL...!", 404);
                        
                    }
                }
                else
                {
                    throw new Exception("La demande est invalide. Veuillez verifier l'URL...!", 500);
                }
            break;

            default: throw new Exception("La demande n'est pas validée. Veuillez verifier l'URL...!", 500);
        }
    }
    else
    {
        throw new Exception("Erreurs sur la récupération des données...!", 300);
    }
}
catch(Exception $e)
{
    $errors = array(
        'status' => false,
        'message' => $e -> getMessage(),
        'code' => $e -> getCode()
    );
    header('Content-Type: application/json');
    echo json_encode($errors, JSON_FORCE_OBJECT);
}
