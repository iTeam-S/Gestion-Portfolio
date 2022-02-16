<?php
class ControllerDelete {

    public function membre(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Membre();
        $delete->deleteMembre($infos);
        unset($delete);
        echo '1';
    }

    public function formations(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Formations();
        $delete->deleteFormations($infos);
        unset($delete);
        echo '1';
    }

    public function fonction(int $identifiant) {
        $infos=[
            'identifiant' => strip_tags(trim($identifiant))
        ];
        $delete=new Fonction();
        $delete->deleteFonction($infos);
        unset($delete);
        echo '1';
    }
}