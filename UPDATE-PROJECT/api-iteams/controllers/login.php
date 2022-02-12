<?php
class ControllerLogin {
    private array $resultats;
    public function __construct(string $identifiant, string $password) {
        if(!empty(trim($identifiant)) && !empty(trim($keyword))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'keyword' => $keyword
            ];
            $login=new Login();
            $this->resultats=$login->authentifier($infos);
            unset($login);
        }
        else throw new Exception("Erreur: un des paramètres est vide pour l'authentification !");
    }

    public function apiLogin() {
        print_r(json_encode($this->resultats, JSON_FORCE_OBJECT));
    }

    public function sessionLogin() {
        print_r(json_encode($this->resultats, JSON_FORCE_OBJECT));
    }
}
