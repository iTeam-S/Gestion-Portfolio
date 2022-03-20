<?php
class ControllerGet {

    // *********************** MEMBRES ************************
    public function membreAll(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $get=new Membre;
            $resultats=$get->getAllMembre();
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide TOUT MEMBRE. Merci !");
    }

    public function membre(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $donnees = [
                'identifiant' => strip_tags(trim($token['prenom_usuel']))
            ];
            $get=new Membre;
            $resultats=$get->getMembre($donnees);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide MEMBRE. Merci !");
    }

    // ******************* FORMATIONS **************************
    public function formationsAll(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $get=new Formations;
            $resultats=$get->getAllFormations();
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide TOUT FORMATIONS. Merci !");
    }

    public function formations(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $donnees = [
                'identifiant' => strip_tags(trim($token['prenom_usuel']))
            ];
            $get=new Formations;
            $resultats=$get->getFormations($donnees);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide FORMATIONS. Merci !");
    }

    // ********************** FONCTION ********************
    public function fonctionAll(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $get=new Fonction;
            $resultats=$get->getAllFonction();
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide TOUT FONCTION. Merci !");
    }

    public function fonction(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $donnees = [
                'identifiant' => strip_tags(trim($token['prenom_usuel']))
            ];
            $get=new Fonction;
            $resultats=$get->getFonction($donnees);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide FONCTION. Merci !");
    }

    // *********************** EXPERIENCES ********************
    public function experiencesAll(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $get=new Experiences;
            $resultats=$get->getAllExperiences();
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide TOUT EXPERIENCES. Merci !");
    }

    public function experiences(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $donnees = [
                'identifiant' => strip_tags(trim($token['prenom_usuel']))
            ];
            $get=new Experiences;
            $resultats=$get->getExperiences($donnees);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide EXPERIENCES. Merci !");
    }

    // *************************** DISTINCTIONS **********************
    public function distinctionsAll(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $get=new Distinctions;
            $resultats=$get->getAllDistinctions();
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide TOUT DISTINCTIONS. Merci !");
    }

    public function distinctions(string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $donnees=[
                'identifiant' => strip_tags(trim($token['prenom_usuel']))
            ];
            $get=new Distinctions;
            $resultats=$get->getDistinctions($donnees);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: token invalide DISTINCTIONS. Merci !");
    }

    // ************************ COMPETENCES ********************
    public function competencesAll() {
        $get=new Competences;
        $resultats=$get->getAllCompetences();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function competences(string $identifiant) {
        $get=new Competences;
        $resultats=$get->getCompetences($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // ********************** PROJETS *********************
    public function projetsAll() {
        $get=new Projets;
        $resultats=$get->getAllProjets();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function projets(string $identifiant) {
        $get=new Projets;
        $resultats=$get->getProjets($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // ************************* AUTRES *********************
    public function autresAll() {
        $get=new Autres;
        $resultats=$get->getAllAutres();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function autres(string $identifiant) {
        $get=new Autres;
        $resultats=$get->getAutres($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }
}
