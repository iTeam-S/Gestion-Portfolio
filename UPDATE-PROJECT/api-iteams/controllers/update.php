<?php 
class ControllerUpdate {
    
    public function membre(string $user_github, string $tel1, string $tel2,
     string $mail, string $facebook, string $linkedin, string $adresse,
     string $description, string $function, int $identifiant) {
        $infos=[
            'user_github' => strip_tags(trim($user_github)),
            'tel1' => strip_tags(trim($tel1)),
            'tel2' => strip_tags(trim($tel2)),
            'mail' => strip_tags(trim($mail)),
            'facebook' => strip_tags(trim($facebook)),
            'linkedin' => strip_tags(trim($linkedin)),
            'adresse' => strip_tags(trim($adresse)),
            'description' => strip_tags(trim($description)),
            'fonction' => strip_tags(trim($fonction)),
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $update=new Membre();
        $update->updateMembre($infos);
        unset($update);
        echo '1';
    }

    public function membrePassword(string $keyword, int $identifiant) {
        $infos=[
            'keyword' => $keyword,
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $update=new Membre();
        $update->updateMembrePassword($infos);
        unset($update);
        echo '1';
    }

    public function formations(string $lieu, string $annee, string $type,
     string $description, int $identifiant) {
        $infos=[
            'lieu' => strip_tags(trim($lieu)),
            'annee' => strip_tags(trim($annee)),
            'type' => strip_tags(trim($type)),
            'description' => strip_tags(trim($description)),
            'identifiant' => strip_tags($identifiant) 
        ];
        $update=new Formations();
        $update->updateFormations($infos);
        unset($infos);
        echo '1';
    }

    public function fonction(int $id_poste, int $identifiant) {
        $infos=[
            'id_poste' => strip_tags($id_poste),
            'identifiant' => strip_tags($identifiant)
        ];
        $update=new Fonction();
        $update->updateFonction($infos);
        unset($update);
        echo '1';
    }

    public function experiences(string $nom, string $annee, string $type,
     string $description, int $identifiant) {
        $infos=[
            'nom' => strip_tags(trim($nom)),
            'annee' => strip_tags(trim($annee)),
            'type' => strip_tags(trim($type)),
            'description' => strip_tags(trim($description)),
            'identifiant' => strip_tags($identifiant)
        ];
        $update=new Experiences();
        $update->updateExperiences($infos);
        unset($update);
        echo '1';
    }

    public function distinctions(string $organisateur, string $annee,
     string $type, string $description, int $ordre, int $identifiant) {
        $infos=[
            'organisateur' => strip_tags(trim($organisateur)),
            'annee' => strip_tags(trim($annee)),
            'type' => strip_tags(trim($type)),
            'description' => strip_tags(trim($description)),
            'ordre' => strip_tags(trim($ordre)),
            'identifiant' => strip_tags($identifiant)
        ];
        $update=new Distinctions();
        $update->updateDistinctions($infos);
        unset($update);
        echo '1';
    }

    public function competences(string $nom, string $liste, int $id_categorie) {
        $infos=[
            'nom' => strip_tags(trim($nom)),
            'liste' => strip_tags(trim($liste)),
            'id_categorie' => strip_tags($id_categorie)
        ];
        
    }
}
