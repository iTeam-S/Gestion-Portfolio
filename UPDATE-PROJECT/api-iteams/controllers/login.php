<?php
class ControllerLogin {
     public function apiLogin($identifiant, $password) {
        if(!empty(trim($identifiant)) && !empty(trim($keyword))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'keyword' => $keyword
            ];
            $login=new Login();
            $resultats=$login->authentifier($infos);
            unset($login);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètres est vide pour l'authentification !");
    }

    public function sessionLogin($identifiant, $password) {
        if(!empty(trim($identifiant)) && !empty(trim($keyword))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'keyword' => $keyword
            ];
            $login=new Login();
            $resultats=$login->authentifier($infos);
            unset($login);
            $_SESSION['TRUE']=$resultats['TRUE'];
            $_SESSION['id']=$resultats['id'];
            $_SESSION['prenom_usuel']=$resultats['prenom_usuel'];
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètres est vide pour l'authentification !");
    }

    public function getSession() {
        if(!empty($_SESSION)) {
            print_r(json_encode($_SESSION, JSON_FORCE_OBJECT));
        }
    }
}
