<?php
class ControllerLogin {

     public function apiLogin(string $identifiant, string $password) {
        if(!empty(trim($identifiant)) && !empty(trim($password))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'password' => $password
            ];
            $login=new Login;
            $resultats=$login->authentifier($infos);
            unset($login);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: les données d'authentifications sont vides. Merci !");
    }

    public function tokenLogin(string $identifiant, string $password, string $secret) {
        if(!empty(trim($identifiant)) && !empty(trim($password))) {
            $infos=[
                'identifiant' => strip_tags($identifiant),
                'password' => $password
            ];
            $login=new Login;
            $resultats=$login->authentifier($infos);
            unset($login);
            if($resultats) {
                if(intval($resultats['TRUE']) === 1) {
                    $header = json_decode(file_get_contents('./controllers/jwt-header.json'), true);
                    $token = new JWT;
                    $resultats['token'] = $token->generateToken($header, $resultats, $secret, 84600);
                    unset($token);
                }
            }
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: les données d'authentifications sont vides. Merci !");       
    }
}
