<?php
class ControllerAdd {

    public function membre(string $nom, string $prenom, string $prenom_usuel,
     string $user_github, string $tel1, string $tel2, string $mail, string $adresse) {
        if(!empty(trim($nom)) && !empty(trim($prenom)) && !empty(trim($prenom_usuel))
         && !empty(trim($user_github)) && !empty(trim($tel1)) && !empty(trim($mail))
         && !empty(trim($adresse))) {
            if(preg_match("#^(\+261|0)3[2-4][0-9]{7}$#", $tel1)){
                 $tel2=(preg_match("#^(\+261|0)3[2-4][0-9]{7}$#", $tel2) ? $tel2 : "");
                if(preg_match("#^[a-zA-Z0-9_+.-]+@[a-z]{2,7}\.[a-z]{2,4}$#", $mail)) {
                    $add=new Membre;
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
                    $reponses = $add->addMembre($infos);
                    unset($add);
                    echo $reponses;
                }
                else throw new Exception("erreur: adresse email invalide !");
            }
            else throw new Exception("Erreur: numéro de télephone invalide !");
        } 
        else throw new Exception("Erreur: un des paramètres requis est vide 'add membre' !");
    }

    public function formations(array $lieu, array $annee, array $type,
     array $description, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($lieu) && !empty($annee) && !empty($type)) {
                $add=new Formations;
                for($i=0; $i<count($lieu); $i++) {
                    $infos=[
                        'lieu' => strip_tags(trim($lieu[$i])),
                        'annee' => strip_tags(trim($annee[$i])),
                        'type' => strip_tags(trim($type[$i])),
                        'description' => strip_tags($description[$i]),
                        'id_membre' => strip_tags(trim($token['id']))
                    ];
                    $add->addFormations($infos);
                }
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour ADD FORMATIONS !"); 
        }
        else throw new Exception("Erreur: token invalide ADD FORMATIONS. Merci !");     
    }

    public function fonction(int $id_poste, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($token);
        if(!empty($token)) {
            if(!empty(preg_match("#[1-7]{1}#", trim($id_poste)))) {
                $add=new Fonction;
                $infos=[
                    'id_membre' => strip_tags(trim($token['id'])),
                    'id_poste' =>strip_tags(trim($id_poste))
                ];
                $add->addFonction($infos);
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour 'add fonction' !");
        }
        else throw new Exception("Erreur: token invalide ADD FONCTION. Merci !");
    }

    public function experiences(array $nom, array $annee, array $type, 
     array $description, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($nom) && !empty($annee) && !empty($type)){
                $add=new Experiences;
                for($i=0; $i<count($nom); $i++) {
                    $infos=[
                        'nom' => strip_tags(trim($nom[$i])),
                        'annee' => strip_tags(trim($annee[$i])),
                        'type' => strip_tags(trim($type[$i])),
                        'description' => strip_tags($description[$i]),
                        'id_membre' => strip_tags(trim($token['id']))
                    ];
                    $add->addExperiences($infos);
                }
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour 'add experiences' !");
        }
        else throw new Exception("Erreur: token invalide ADD EXPERIENCES. Merci !");
    }

    public function distinctions(array $organisateur, array $annee,
     array $type, array $description, array $ordre, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($organisateur) && !empty($annee) && !empty($type)) {
                $add=new Distinctions;
                for($i=0; $i<count($organisateur); $i++) {
                    if(empty($ordre[$i])) $ordre[$i]=0;
                    $infos=[
                        'organisateur' => strip_tags(trim($organisateur[$i])),
                        'annee' => strip_tags(trim($annee[$i])),
                        'type' => strip_tags(trim($type[$i])),
                        'description' => strip_tags(trim($description[$i])),
                        'id_membre' => strip_tags(trim($token['id'])),
                        'ordre' => strip_tags(trim($ordre[$i]))
                    ];
                    $add->addDistinctions($infos);
                }
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour 'add distinctions' !");   
        }
        else throw new Exception("Erreur: token invalide ADD DISTINCTIONS. Merci !");           
    }

    public function competences(array $nom, array $liste, array $id_categorie, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($nom) && !empty($liste) && !empty($id_categorie)) {
                $add=new Competences;
                for($i=0; $i<count($nom); $i++) {
                    $infos=[
                        'nom' => strip_tags(trim($nom[$i])),
                        'liste' => strip_tags(trim($liste[$i])),
                        'id_categorie' => strip_tags(trim($id_categorie[$i])),
                        'id_membre' => strip_tags(trim($token['id']))
                    ];
                    $add->addCompetences($infos);
                }
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour 'add competences'!");
        }
        else throw new Exception("Erreur: token invalide ADD COMPETENCES. Merci !");
    }

    public function projets(array $nom, array $description, array $lien, array $pdc, array $ordre, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($nom) && !empty($description) && !empty($lien) && !empty($pdc) && !empty($ordre)) {
               $add=new Projets;
               for($i=0; $i<count($nom); $i++) {
                   if(empty($ordre[$i])) $ordre[$i]=0;
                   $infos=[
                       'nom' => strip_tags(trim($nom[$i])),
                       'description' => strip_tags(trim($description[$i])),
                       'lien' => strip_tags(trim($lien[$i])),
                       'pdc' => strip_tags(trim($pdc[$i])),
                       'id_membre' => strip_tags(trim($token['id'])),
                       'ordre' => strip_tags(trim($ordre[$i]))
                   ];
                   $add->addProjets($infos);
               }
               unset($add);
               echo 1;
           }
           else throw new Exception("Erreur: un des paramètre est vide pour 'add projets' !");  
        }
        else throw new Exception("Erreur: token invalide ADD PROJETS. Merci !"); 
    }

    public function autres(array $nom, array $lien, string $secret) {
        $jwt = new JWT;
        $token = $jwt->isValidToken($secret);
        unset($jwt);
        if(!empty($token)) {
            if(!empty($nom) && !empty($lien)) {
                $add=new Autres;
                for($i=0; $i<count($nom); $i++) {
                    $infos=[
                        'nom' => strip_tags(trim($nom[$i])),
                        'lien' => strip_tags(trim($lien[$i])),
                        'id_membre' => strip_tags(trim($token['id']))
                    ];
                    $add->addAutres($infos);
                }
                unset($add);
                echo 1;
            }
            else throw new Exception("Erreur: un des paramètres est vide pour 'add autres' !");
        }
        else throw new Exception("Erreur: token invalide ADD AUTRES. Merci !");
    }
}
