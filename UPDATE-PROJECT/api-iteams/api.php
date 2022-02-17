<?php
session_start();
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

require_once 'models/models.php';
require_once 'controllers/login.php';
require_once 'controllers/getters.php';
require_once 'controllers/adding.php';
require_once 'controllers/update.php';
require_once 'controllers/delete.php';

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
                        unset($login);
                    }
                    else throw new Exception("Erreur: veuillez preciser la methode d'authentification !");
                break;

                case 'get':
                    if(!empty(trim($url[1]))) {
                        $get=ControllerGet();
                        switch($url[1]) {
                            case 'membre':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->membreAll();
                                    else $get->membre();
                                }
                                else throw new Exception("Erreur: veuillez preciser 'membre get' !");
                            break;

                            case 'formations':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->formationsAll();
                                    else $get->formations();
                                }
                                else throw new Exception("Erreur: veuillez preciser 'formations get' !");
                            break;

                            case 'fonction':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->fonctionAll();
                                    else $get->fonction();
                                }
                                else throw new Exception("Erreur: veuillez preciser 'fonction get' !");
                            break;

                            case 'experiences':
                                
                            break;

                            case 'distinctions':
                            
                            break;

                            case 'competences':
                            
                            break;

                            case 'projets':

                            break;

                            case 'autres':

                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                        unset($get);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande 'get' !");
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
