<?php
class ControllerDelete {

    public function membre(int $identifiant) {
        if(!empty(trim($identifiant))) {
            $infos=[
                'identifiant' => strip_tags(trim($identifiant))
            ];
            $delete=new Membre();
            $delete->deleteMembre($infos);
            unset($delete);
            echo '1';
        }
    }
}