<?php
session_start();
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

try {
    if(!empty(trim($_GET['demande']))) {
        $url=explode('/', filter_var(strip_tags(trim($_GET['demande'])).'/'), FILTER_SANITIZE_URL);
        if(!empty(trim($url[0]))) {
            switch($url[0]) {
                // ********************** LOGIN *********************
                case 'login':
                    if(!empty(trim($url[1]))) {
                        $login=ControllerLogin($_POST['identifiant'], $_POST['password']);
                        switch($url[1]) {
                            case 'api-login':
                                $login->apiLogin();
                            break;
                            case 'session-login':
                                $login->sessionLogin();
                            break;
                            default: throw new Exception("Erreur: la methode d'authentification n'existe pas !");
                        }
                    }
                    else throw new Exception("Erreur: veuillez preciser la methode d'authentification !");
                break;

                case 'get':
                
                break;

                case 'add':

                break;

                case 'update':

                break;

                case 'delete':
                
                break;

                default: throw new Exception("Erreur: la demande est introuvale !");
            }
        }
        else throw new Exception("Erreur: la demande est vide !");
    }
    else throw new Exception("Erreur: aucune demande n'a été envoyée !");
}
catch(Exception $e) {
    print_r(json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_FORCE_OBJECT));
}
