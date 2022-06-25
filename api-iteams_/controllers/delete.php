<?php
class ControllerDelete {

    public function membre(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Membre;
            $delete->deleteMembre($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide DELETE MEMBRE. Merci !");
    }

    public function formations(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Formations;
            $delete->deleteFormations($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide DELETE FORMATIONS. Merci !");      
    }

    public function fonction(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Fonction;
            $delete->deleteFonction($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide DELETE FONCTION. Merci !");
    }

    public function experiences(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Experiences;
            $delete->deleteExperiences($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide DELETE EXPERIENCES. Merci !");
    }

    public function distinctions(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Distinctions;
            $delete->deleteDistinctions($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide DELETE DISTINCTIONS. Merci !");
    }

    public function competences(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Competences;
            $delete->deleteCompetences($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE COMPETENCES. Merci !");
    }

    public function projets(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Projets;
            $delete->deleteProjets($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE PROJETS. Merci !");
    }

    public function autres(int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $delete=new Autres;
            $delete->deleteAutres($infos);
            unset($delete);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE AUTRES. Merci !");
    }
}
