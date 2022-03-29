<?php 
class ControllerUpdate {
    
    public function membre(string $user_github, string $tel1, string $tel2,
     string $mail, string $facebook, string $linkedin, string $cv, string $adresse,
     string $description, string $fonction, string $pdc, int $dark, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'user_github' => strip_tags(trim($user_github)),
                'tel1' => strip_tags(trim($tel1)),
                'tel2' => strip_tags(trim($tel2)),
                'mail' => strip_tags(trim($mail)),
                'facebook' => strip_tags(trim($facebook)),
                'linkedin' => strip_tags(trim($linkedin)),
                'cv' => strip_tags(trim($cv)),
                'adresse' => strip_tags(trim($adresse)),
                'description' => strip_tags(trim($description)),
                'fonction' => strip_tags(trim($fonction)),
                'pdc' => strip_tags(trim($pdc)),
                'dark' => strip_tags(trim($dark)),
                'identifiant' => strip_tags(trim($token['id']))
            ];
            $update=new Membre;
            $update->updateMembre($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE MEMBRE. Merci !");
        
    }

    public function membrePassword(string $lastKeyword, string $newKeyword, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $verify=[
                'keyword' => $lastKeyword,
                'identifiant' => strip_tags(trim($token['id']))
            ];
            $donnees=[
                'keyword' => $newKeyword,
                'identifiant' => strip_tags(trim($token['id']))
            ];
            $update=new Membre;
            $reponses=$update->updateMembrePassword($donnees, $verify);
            unset($update);
            echo $reponses;
        }
        else throw new Exception("Erreur: invalide token UPDATE PASSWORD. Merci !");
    }

    public function formations(string $lieu, string $annee, string $type, string $description, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'lieu' => strip_tags(trim($lieu)),
                'annee' => strip_tags(trim($annee)),
                'type' => strip_tags(trim($type)),
                'description' => strip_tags(trim($description)),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id'])) 
            ];
            $update=new Formations;
            $update->updateFormations($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE FORMATIONS. Merci !");
    }

    public function fonction(int $id_poste, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'id_poste' => strip_tags($id_poste),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Fonction;
            $update->updateFonction($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE FONCTION. Merci !");
    }

    public function experiences(string $nom, string $annee, string $type, string $description, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'nom' => strip_tags(trim($nom)),
                'annee' => strip_tags(trim($annee)),
                'type' => strip_tags(trim($type)),
                'description' => strip_tags(trim($description)),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Experiences;
            $update->updateExperiences($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE EXPERIENCES. Merci !");
    }

    public function distinctions(string $organisateur, string $annee,
     string $type, string $description, int $ordre, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'organisateur' => strip_tags(trim($organisateur)),
                'annee' => strip_tags(trim($annee)),
                'type' => strip_tags(trim($type)),
                'description' => strip_tags(trim($description)),
                'ordre' => strip_tags(trim($ordre)),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Distinctions;
            $update->updateDistinctions($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE DISTINCTIONS. Merci !");
    }

    public function competences(string $nom, string $liste, int $id_categorie, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'nom' => strip_tags(trim($nom)),
                'liste' => strip_tags(trim($liste)),
                'id_categorie' => strip_tags($id_categorie),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Competences;
            $update->updateCompetences($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE COMPETENCES. Merci !");
    }

    public function projets(string $nom, string $description, string $lien,
     string $pdc, int $ordre, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'nom' => strip_tags(trim($nom)),
                'description' => strip_tags(trim($description)),
                'lien' => strip_tags(trim($lien)),
                'pdc' => strip_tags(trim($pdc)),
                'ordre' => strip_tags($ordre),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Projets;
            $update->updateProjets($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE PROJETS. Merci !");
    }

    public function autres(string $nom, string $lien, int $identifiant, string $secret) {
        $jwt=new JWT;
        $token=$jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            $infos=[
                'nom' => strip_tags(trim($nom)),
                'lien' => strip_tags(trim($lien)),
                'id' => strip_tags(trim($identifiant)),
                'id_membre' => strip_tags(trim($token['id']))
            ];
            $update=new Autres;
            $update->updateAutres($infos);
            unset($update);
            echo 1;
        }
        else throw new Exception("Erreur: token invalide UPDATE AUTRES. Merci !");
    }
}
