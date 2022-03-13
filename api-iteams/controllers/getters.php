<?php
class ControllerGet {

    public function __construct(string $identifiant) {
        $this->data=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
    }

    // *********************** MEMBRES ************************
    public function membreAll() {
        $get=new Membre;
        $resultats=$get->getAllMembre();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function membre() {
        $get=new Membre;
        $resultats=$get->getMembre($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // ******************* FORMATIONS **************************
    public function formationsAll() {
        $get=new Formations;
        $resultats=$get->getAllFormations();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function formations(string $identifiant) {
        $get=new Formations;
        $resultats=$get->getFormations($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // ********************** FONCTION ********************
    public function fonctionAll() {
        $get=new Fonction;
        $resultats=$get->getAllFonction();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function fonction(string $identifiant) {
        $get=new Fonction;
        $resultats=$get->getFonction($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // *********************** EXPERIENCES ********************
    public function experiencesAll() {
        $get=new Experiences;
        $resultats=$get->getAllExperiences();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function experiences(string $identifiant) {
        $get=new Experiences;
        $resultats=$get->getExperiences($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    // *************************** DISTINCTIONS **********************
    public function distinctionsAll() {
        $get=new Distinctions;
        $resultats=$get->getAllDistinctions();
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
    }

    public function distinctions(string $identifiant) {
        $get=new Distinctions;
        $resultats=$get->getDistinctions($this->data);
        unset($get);
        print_r(json_encode($resultats, JSON_FORCE_OBJECT));
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
