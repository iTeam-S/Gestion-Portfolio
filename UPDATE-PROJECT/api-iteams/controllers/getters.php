<?php
class ControllerGet {
    // *********************** MEMBRES ************************
    public function membreAll() {
        $get=new Membre();
        $resultats=$get->getAllMembre();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function membre(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' =>strip_tags($identifiant)
            ];
            $get=new Membre();
            $resultats=$get->getMembre($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'membre' !");
    }

    // ******************* FORMATIONS **************************
    public function formationsAll() {
        $get=new Formations();
        $resultats=$get->getAllFormations();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function formations(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags($identifiant)
            ];
            $get=new Formations();
            $resultats=$get->getFormations($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètre est vide pour 'formations' !");
    }

    // ********************** FONCTION ********************
    public function fonctionAll() {
        $get=new Fonction();
        $resultats=$get->getAllFonction();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function fonction(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags($identifiant)
            ];
            $get=new Fonction();
            $resultats=$get->getFonction($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètre est vide pour 'fonction' !"); 
    }

    // *********************** EXPERIENCES ********************
    public function experiencesAll() {
        $get=new Experiences();
        $resultats=$get->getAllExperiences();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function experiences(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags($identifiant)
            ];
            $get=new Experiences();
            $resultats=$get->getExperiences($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'experiences' !");   
    }

    // *************************** DISTINCTIONS **********************
    public function distinctionsAll() {
        $get=new Distinctions();
        $resultats=$get->getAllDistinctions();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function distinctions(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags($identifiant)
            ];
            $get=new Distinctions();
            $resultats=$get->getDistinctions($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètre est vide pour 'distinctions' !");
    }

    // ************************ COMPETENCES ********************
    public function competencesAll() {
        $get=new Competences();
        $resultats=$get->getAllCompetences();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function competences(string $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags($identifiant)
            ];
            $get=new Competences();
            $resultats=$get->getCompetences($infos);
            unset($get);
            print_r(json_encode($resultats, JSON_FORCE_OBJECT));
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'competences' !");
    }
}
