<?php
session_start();
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

require_once './models/models.php';
require_once './controllers/login.php';
require_once './controllers/getters.php';
require_once './controllers/adding.php';
require_once './controllers/update.php';
require_once './controllers/delete.php';
require_once './controllers/jwt.php';
require_once './controllers/jwt-secret.php';


try {
    if(!empty(trim($_GET['demande']))) {
        $url=explode('/', filter_var(strip_tags(trim($_GET['demande'])).'/'), FILTER_SANITIZE_URL);
        if(!empty(trim($url[0]))) {
            switch($url[0]) {
                // ********************** LOGIN *********************
                case 'login':
                    if(!empty(trim($url[1]))) {
                        $login=new ControllerLogin;
                        switch($url[1]) {
                            case 'api-login':
                                $login->apiLogin($_POST['identifiant'], $_POST['password']);
                            break;
                            case 'token-login':
                                $login->tokenLogin($_POST['identifiant'], $_POST['password'], LAHATRA);
                            break;
                            default: throw new Exception("Erreur: la methode d'authentification n'existe pas !");
                        }
                        unset($login);
                    }
                    else throw new Exception("Erreur: veuillez preciser la methode d'authentification !");
                break;

                case 'get':
                    if(!empty(trim($url[1]))) {
                        $get=new ControllerGet;
                        switch($url[1]) {
                            case 'membre':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->membreAll(LAHATRA);
                                    else $get->membre(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'formations':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->formationsAll(LAHATRA);
                                    else $get->formations(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'fonction':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->fonctionAll(LAHATRA);
                                    else $get->fonction(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'experiences':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->experiencesAll(LAHATRA);
                                    else $get->experiences(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'distinctions':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->distinctionsAll(LAHATRA);
                                    else $get->distinctions(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'competences':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->competencesAll(LAHATRA);
                                    else $get->competences(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'projets':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->projetsAll(LAHATRA);
                                    else $get->projets(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'autres':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->autresAll(LAHATRA);
                                    else $get->autres(LAHATRA);
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                        unset($get);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
                break;

                case 'add':
                    if(!empty(tirm($url[1]))) {
                        $add=new ControllerAdd();
                        switch($url[1]) {
                            case 'membre':
                                $add->membre($_POST['nom'], $_POST['prenom'], $_POST['prenom_usuel'],
                                 $_POST['user_github'], $_POST['tel1'], $_POST['tel2'], $_POST['mail'], 
                                 $_POST['adresse']);
                            break;

                            case 'formations':
                                $add->formations($_POST['lieu'], $_POST['annee'], $_POST['type'],
                                 $_POST['description'], LAHATRA);
                            break;

                            case 'fonction':
                                $add->fonction($_POST['id_poste'], LAHATRA);
                            break;

                            case 'experiences':
                                $add->experiences($_POST['nom'], $_POST['annee'], $_POST['type'], 
                                 $_POST['description'], LAHATRA);
                            break;

                            case 'distinctions':
                                $add->distinctions($_POST['organisateur'], $_POST['annee'], $_POST['type'],
                                 $_POST['description'], $_POST['id_poste'], LAHATRA);
                            break;

                            case 'competences':
                                $add->competences($_POST['nom'], $_POST['liste'], $_POST['id_categorie'], LAHATRA);
                            break;

                            case 'projets':
                                $add->projets($_POST['nom'], $_POST['description'], $_POST['lien'],
                                 $_POST['pdc'], $_POST['ordre'], LAHATRA);
                            break;

                            case 'autres':
                                $add->autres($_POST['nom'], $_POST['lien'], LAHATRA);
                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                        unset($add);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
                break;

                case 'update':
                    if(!empty(trim($url[1]))) {
                        $update=new ControllerUpdate();
                        switch($url[1]) {
                            case 'membre':
                                $update->membre($_POST['user_github'], $_POST['tel1'], $_POST['tel2'],
                                 $_POST['mail'], $_POST['facebook'], $_POST['linkedin'], $_POST['$adresse'], 
                                 $_POST['description'], $_POST['fonction'], LAHATRA);
                            break;

                            case 'keyword':
                                $update->membrePassword($_POST['lastKeyword'], $_POST['newKeyword'], LAHATRA);
                            break;
                            
                            case 'formations':
                                $update->formations($_POST['lieu'], $_POST['annee'], $_POST['type'],
                                 $_POST['description'], $_POST['identifiant'], LAHATRA);
                            break;

                            case 'fonction':
                                $update->fonction($_POST['id_poste'], $_POST['identifiant'], LAHATRA);
                            break;

                            case 'experiences':
                                $update->experiences($_POST['nom'], $_POST['annee'], $_POST['type'],
                                $_POST['description'], $_POST['identifiant'], LAHATRA);
                            break;  

                            case 'distinctions':
                                $update->distinctions($_POST['organisateur'], $_POST['annee'], $_POST['type'],
                                $_POST['description'], $_POST['ordre'], $_POST['identifiant'], LAHATRA);
                            break;

                            case 'competences':
                                $update->competences($_POST['nom'], $_POST['liste'], $_POST['id_categorie'], 
                                 $_POST['identifiant'], LAHATRA);
                            break;

                            case 'projets':
                                $update->projets($_POST['nom'], $_POST['description'], $_POST['lien'],
                                $_POST['pdc'], $_POST['ordre'], $_POST['identifiant'], LAHATRA);
                            break;

                            case 'autres':
                                $update->autres($_POST['nom'], $_POST['lien'], $_POST['identifiant'], LAHATRA);
                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                        unset($update);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
                break;

                case 'delete':
                    if(!empty(trim($url[1]))) {
                        $delete=new ControllerDelete();
                        switch($url[1]) {
                            case 'membre':
                                $delete->membre($_POST['identifiant'], LAHATRA);
                            break;

                            case 'formations':
                                $delete->formations($_POST['identifiant'], LAHATRA);
                            break;

                            case 'fonction':
                                $delete->fonction($_POST['identifiant'], LAHATRA);
                            break;

                            case 'experiences':
                                $delete->experiences($_POST['identifiant'], LAHATRA);
                            break;

                            case 'distinctions':
                                $delete->distinctions($_POST['identifiant'], LAHATRA);
                            break;

                            case 'competences':
                                $delete->competences($_POST['identifiant'], LAHATRA);
                            break;

                            case 'projets':
                                $delete->projets($_POST['identifiant'], LAHATRA);
                            break;

                            case 'autres':
                                $delete->autres($_POST['identifiant'], LAHATRA);
                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
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
