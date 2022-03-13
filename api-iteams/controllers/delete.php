<?php
class ControllerDelete {

    public function membre(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Membre;
        $delete->deleteMembre($infos);
        unset($delete);
        echo '1';
    }

    public function formations(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Formations;
        $delete->deleteFormations($infos);
        unset($delete);
        echo '1';
    }

    public function fonction(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Fonction;
        $delete->deleteFonction($infos);
        unset($delete);
        echo '1';
    }

    public function experiences(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Experiences;
        $delete->deleteExperiences($infos);
        unset($delete);
        echo '1';
    }

    public function distinctions(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Distinctions;
        $delete->deleteDistinctions($infos);
        unset($delete);
        echo '1';
    }

    public function competences(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Competences;
        $delete->deleteCompetences($infos);
        unset($delete);
        echo '1';
    }

    public function projets(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Projets;
        $delete->deleteProjets($infos);
        unset($delete);
        echo '1';
    }

    public function autres(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Autres;
        $delete->deleteAutres($infos);
        unset($delete);
        echo '1';
    }
}