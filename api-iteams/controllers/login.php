<?php
class ControllerLogin {
    private array $data;

    public function __construct(string $identifiant, string $password) {
        if(!empty(trim($identifiant)) && !empty(trim($password))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'password' => $password
            ];
            $this->data = $infos;
        }
        else throw new Exception("Erreur: un des paramètres est vide pour l'authentification !");
    }

     public function apiLogin() {
        $login=new Login();
        $resultats=$login->authentifier($this->data);
        unset($login);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));        
    }

    public function sessionLogin() {
        $login=new Login();
        $resultats=$login->authentifier($this->data);
        unset($login);
        $_SESSION['TRUE']=$resultats['TRUE'];
        $_SESSION['id']=$resultats['id'];
        $_SESSION['prenom_usuel']=$resultats['prenom_usuel'];
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function getSession() {
        if(!empty($_SESSION)) {
            print_r(json_encode($_SESSION, JSON_FORCE_OBJECT));
        }
    }
}
