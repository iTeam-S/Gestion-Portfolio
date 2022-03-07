<?php
class ControllerAdd {

    public function membre(string $nom, string $prenom, string $prenom_usuel,
     string $user_github, string $tel1, string $tel2, string $mail, string $adresse) {
        if(!empty(trim($nom)) && !empty(trim($prenom)) && !empty(trim($prenom_usuel))
         && !empty(trim($user_github)) && !empty(trim($tel1)) && !empty(trim($mail))
         && !empty(trim($adresse))) {
            if(preg_match("#^([0-9 +]{12})$#", $tel1) && preg_match("#^([0-9 +]{12})$#", $tel2)){
                if(preg_match("#^[a-zA-Z0-9_+.-]+@[a-z]{2, 7}\.[a-z]{2, 4}#", $mail)) {
                    $add=new Membre();
                    $infos=[
                        'nom' => strip_tags(ucwords($nom)),
                        'prenom' => strip_tags(ucwords($prenom)),
                        'prenom_usuel' => strip_tags(trim($prenom_usuel)),
                        'user_github' => strip_tags(trim($user_github)),
                        'tel1' => strip_tags(trim($tel1)),
                        'tel2' => strip_tags(trim($tel2)),
                        'mail' => strip_tags(trim($mail)),
                        'adresse' => strip_tags(trim($adresse))
                    ];
                    $data = $add->addMembre($infos);
                    unset($add);
                    echo $data;
                }
                else throw new Exception("erreur: adresse email invalide !");
            }
            else throw new Exception("Erreur: numéro télephone invalide !");
        } 
        else throw new Exception("Erreur: un des paramètres requis est vide 'add membre' !");
    }

    public function formations(array $lieu, array $annee, array $type,
     array $description, int $id_membre) {
        if(!empty($lieu) && !empty($annee) && !empty($type)
         && !empty(trim($id_membre))) {
            $add=new Formations();
            for($i=0; $i<count($lieu); $i++) {
                $infos=[
                    'lieu' => strip_tags(trim($lieu[$i])),
                    'annee' => strip_tags(trim($annee[$i])),
                    'type' => strip_tags(trim($type[$i])),
                    'description' => strip_tags($description[$i]),
                    'id_membre' => strip_tags(trim($id_membre))
                ];
                $add->addFormations($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add formations' !");        
    }

    public function fonction(int $id_membre, int $id_poste) {
        if(!empty((trim($id_membre))) && preg_match("#[1-7]#", trim($id_poste))) {
            $add=new Fonction();
            $infos=[
                'id_membre' => strip_tags($id_membre),
                'id_poste' =>strip_tags(trim($id_poste))
            ];
            $add->addFonction($infos);
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add fonction' !");
    }

    public function experiences(array $nom, array $annee, array $type, 
     array $description, int $id_membre) {
        if(!empty($nom) && !empty($annee) && !empty($type)
         && !empty($id_membre)){
            $add=new Experiences();
            for($i=0; $i<count($nom); $i++) {
                $infos=[
                    'nom' => strip_tags(trim($nom[$i])),
                    'annee' => strip_tags(trim($annee[$i])),
                    'type' => strip_tags(trim($type[$i])),
                    'description' => strip_tags($description[$i]),
                    'id_membre' => strip_tags($id_membre)
                ];
                $add->addExperiences($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add experiences' !");
    }

    public function distinctions(array $organisateur, array $annee,
     array $type, array $description, int $id_membre, array $ordre) {
        if(!empty($organisateur) && !empty($annee) && !empty($type)
         &&  !empty(trim($id_membre))) {
            $add=new Distinctions();
             for($i=0; $i<count($organisateur); $i++) {
                if(empty($ordre[$i])) $ordre[$i]=0;
                $infos=[
                    'organisateur' => strip_tags(trim($organisateur[$i])),
                    'annee' => strip_tags(trim($annee[$i])),
                    'type' => strip_tags(trim($type[$i])),
                    'description' => strip_tags(trim($description[$i])),
                    'id_membre' => strip_tags(trim($id_membre)),
                    'ordre' => strip_tags(trim($ordre[$i]))
                ];
                $add->addDistinctions($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add distinctions' !");        
    }

    public function competences(array $nom, array $liste, array $id_categorie,
     int $id_membre) {
        if(!empty($nom) && !empty($liste) 
         && !empty($id_categorie) && !empty(trim($id_membre))) {
            $add=new Competences();
            for($i=0; $i<count($nom); $i++) {
                $infos=[
                    'nom' => strip_tags(trim($nom[$i])),
                    'liste' => strip_tags(trim($liste[$i])),
                    'id_categorie' => strip_tags(trim($id_categorie[$i])),
                    'id_membre' => strip_tags(trim($id_membre))
                ];
                $add->addCompetences($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add competences'!");        
    }

    public function projets(array $nom, array $description, array $lien, 
     array $pdc, int $id_membre, array $ordre) {
        if(!empty($nom) && !empty($description) && !empty($lien)
         && !empty($pdc) && !empty(trim($id_membre)) && !empty($ordre)) {
            $add=new Projets();
            for($i=0; $i<count($nom); $i++) {
                if(empty($ordre[$i])) $ordre[$i]=0;
                $infos=[
                    'nom' => strip_tags(trim($nom[$i])),
                    'description' => strip_tags(trim($description[$i])),
                    'lien' => strip_tags(trim($lien[$i])),
                    'pdc' => strip_tags(trim($pdc[$i])),
                    'id_membre' => strip_tags(trim($id_membre)),
                    'ordre' => strip_tags(trim($ordre[$i]))
                ];
                $add->addProjets($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètre est vide pour 'add projets' !");        
    }

    public function autres(array $nom, array $lien, int $id_membre) {
        if(!empty($nom) && !empty($lien) && !empty(trim($id_membre))) {
            $add=new Autres();
            for($i=0; $i<count($nom); $i++) {
                $infos=[
                    'nom' => strip_tags(trim($nom[$i])),
                    'lien' => strip_tags(trim($lien[$i])),
                    'id_membre' => strip_tags(trim($id_membre))
                ];
                $add->addAutres($infos);
            }
            unset($add);
            echo '1';
        }
        else throw new Exception("Erreur: un des paramètres est vide pour 'add autres' !");
    }
}
