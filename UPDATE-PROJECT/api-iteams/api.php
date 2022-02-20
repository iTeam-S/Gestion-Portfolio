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
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'formations':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->formationsAll();
                                    else $get->formations();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'fonction':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->fonctionAll();
                                    else $get->fonction();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'experiences':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->experiencesAll();
                                    else $get->experiences();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'distinctions':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->distinctionsAll();
                                    else $get->distinctions();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'competences':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->competencesAll();
                                    else $get->competences();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'projets':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->projetsAll();
                                    else $get->projets();
                                }
                                else throw new Exception("Erreur: veuillez preciser '$url[1] $url[0]' !");
                            break;

                            case 'autres':
                                if(!empty(trim($url[2]))) {
                                    if(preg_match("#[\\\/+.&é\"'()è`_^£\$ù%§!~,<>?-]#", trim($url[2]))) {
                                        throw new Exception("Erreur: la demande $url[0]/$url[1]/$url[2] est introuvable !");
                                    }
                                    elseif(trim($url[2]) === '*') $get->autresAll();
                                    else $get->autres();
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
                        $add=ControllerAdd();
                        switch($url[1]) {
                            case 'membre':
                                $add->membre($_POST['nom'], $_POST['prenom'], $_POST['prenom_usuel'],
                                 $_POST['user_github'], $_POST['tel1'], $_POST['tel2'], $_POST['mail'], 
                                 $_POST['adresse']);
                            break;

                            case 'formations':
                                $add->formations($_POST['lieu'], $_POST['annee'], $_POST['type'],
                                 $_POST['description'], $_POST['id_membre']);
                            break;

                            case 'fonction':
                                $add->fonction($_POST['id_membre'], $_POST['id_poste']);
                            break;

                            case 'experiences':
                                $add->experiences($_POST['nom'], $_POST['annee'], $_POST['type'], 
                                 $_POST['description'], $_POST['id_membre']);
                            break;

                            case 'distinctions':
                                $add->distinctions($_POST['organisateur'], $_POST['annee'], $_POST['type'],
                                 $_POST['description'], $_POST['id_membre'], $_POST['id_poste']);
                            break;

                            case 'competences':
                                $add->competences($_POST['nom'], $_POST['liste'], $_POST['id_categorie'], 
                                 $_POST['id_membre']);
                            break;

                            case 'projets':
                                $add->projets($_POST['nom'], $_POST['description'], $_POST['lien'],
                                 $_POST['pdc'], $_POST['id_membre'], $_POST['ordre']);
                            break;

                            case 'autres':
                                $add->autres($_POST['nom'], $_POST['lien'], $_POST['id_membre']);
                            break;
                            default: throw new Exception("Erreur: la demande $url[0]/$url[1] est introuvable !");
                        }
                        unset($add);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
                break;

                case 'update':
                    if(!empty(trim($url[1]))) {
                        $update=ControllerUpdate();
                        switch($url[1]) {
                            case 'membre':
                                $update->membre($_POST['user_github'], $_POST['tel1'], $_POST['tel2'],
                                 $_POST['mail'], $_POST['facebook'], $_POST['linkedin'], $_POST['$adresse'], 
                                 $_POST['description'], $_POST['fonction'], $_POST['identifiant']);
                            break;

                            case 'keyword':
                                $update->membrePassword($_POST['keyword'], $_POST['identifiant']);
                            break;
                            
                            case 'formations':
                                
                            break;

                            case 'fonction':
                                
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
                        unset($update);
                    }
                    else throw new Exception("Erreur: Veuillez precisez la demande $url[0] !");
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
