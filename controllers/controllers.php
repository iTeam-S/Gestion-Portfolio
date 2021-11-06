<?php
    session_start();
    include_once('../models/models.php');
    
    //------------------------- Membres ------------------------   
    $id_membre = null;

    if(!empty($_POST['nomPersonne']) AND !empty($_POST['prenomsPersonne']) AND !empty($_POST['prenomUsuel']) AND !empty($_POST['telephonePrimo']) AND !empty($_POST['email'])) 
    {
        $membre = new MembreModels(3);
        $infos_prenom = array(
            'prenom' => strip_tags($_POST['prenomUsuel']));
        $reponse = $membre -> db_get_prenom_usuel($infos_prenom);
        $donnee = $reponse -> fetch();
        if(!empty($donnee['TRUE']))
        {
            header("Location:../views/erreurs/erreurPrenomUsuel.php");
        }

        else
        {
            $_SESSION['prenom'] = $_POST['prenomUsuel'];

            $informations_membre = array(
                'nom' => strip_tags($_POST['nomPersonne']), 
                'prenom' => ucwords(strip_tags($_POST['prenomsPersonne'])),
                'prenom_usuel' => ucwords(strip_tags($_POST['prenomUsuel'])),
                'user_github' => strip_tags($_POST['lien_github']),
                'tel1'=> strip_tags($_POST['telephonePrimo']),
                'tel2' => strip_tags($_POST['telephoneSecondo']),
                'mail' => strip_tags($_POST['email']),
                'facebook' => strip_tags($_POST['lien_facebook']),
                'linkedin' => strip_tags($_POST['lien_linkedin']),
                'cv' => strip_tags($_POST['lien_cv']),
                'adresse' => strip_tags($_POST['domicile']),
                'descriptions' => strip_tags($_POST['descriptionTravail']),
                'fonction' => strip_tags($_POST['fonction'])
            );
            $membre -> inserer_information_membre($informations_membre);
            unset($membre);

            //-------------------------- ID du MEMBRE ----------------------------
            $id = new IdMembre();
            $prenomUsuel = array('prenom_usuel' => $_SESSION['prenom']);
            $id_membre = $id -> get_id_membre($prenomUsuel);

            // --------------------------- Fonction -------------------------------
            $fonction = new FonctionModels(3);
            $information_fonction = array(
                'id_membre' => $id_membre,
                'id_poste' => strip_tags($_POST['poste'])
                );
            $fonction -> inserer_information_fonction($information_fonction);
            unset($fonction);
        }
    }
    else
    {
        $id_membre = $_SESSION['id']; 
    }

    //--------------------------- Formations -----------------------------
    $formation = new FormationModels(3);

    $i = 0;
    $lieuFormation = $_POST['lieuF'];
    $anneeFormation = $_POST['anneeF'];
    $typeFormation = $_POST['typeF'];
    $descriptionFormation = $_POST['descriptionF'];

    while($i < count($lieuFormation))
    {
        if(!empty($lieuFormation[$i]) AND !empty($anneeFormation[$i]) AND !empty($typeFormation[$i]))
        {
            $information_formation = array(
                'lieu' => strip_tags($lieuFormation[$i]),
                'annee' => strip_tags($anneeFormation[$i]),
                'type' => strip_tags($typeFormation[$i]),
                'descriptions' => strip_tags($descriptionFormation[$i]),
                'idMembre' => $id_membre,
                'ordre' => 0
            );
            $formation -> inserer_information_formation($information_formation);
        }
        $i++;
    }

    unset($formation);

    //---------------------------- Competences -------------------------------

    if(count($_POST['iconeC']) > 0 AND count($_POST['competences']) > 0)
    {
        $competence = new CompetenceModels(3);

        $i = 0;
        $icones = $_POST['iconeC'];
        $competences = $_POST['competences'];
        $descriptionCempetence = $_POST['descriptionC'];

        while($i < count($icones))
        {
            if(!empty($competences[$i]) AND !empty($descriptionCempetence[$i]) AND !empty($icones[$i]))
            {
                $information_competence = array(
                    'nom' => strip_tags($competences[$i]),
                    'liste' => strip_tags($descriptionCempetence[$i]),
                    'idCategorie' => strip_tags($icones[$i]),
                    'idMembre' => $id_membre,
                    'ordre' => 0
                );
                $competence -> inserer_information_competence($information_competence);
            }
            $i++;
        }
        unset($competence);
    }

    // else
    // {
    //     header('Location:../views/erreurs/erreurCompetence.php');
    // }

    //---------------------------- Expérience ----------------------------------------

    $experience = new ExperienceModels(3);

    $i = 0;
    $nomOrganisation = $_POST['nomE'];
    $anneeExperience = $_POST['anneeE'];
    $typeExperience = $_POST['typeE'];
    $descriptionExperience = $_POST['descriptionE'];

    while($i < count($nomOrganisation))
    {
        if(!empty($nomOrganisation[$i]) AND !empty($anneeExperience[$i]) AND !empty($typeExperience[$i]))
        {
            $information_experience = array(
                'nom' => strip_tags($nomOrganisation[$i]),
                'annee' => strip_tags($anneeExperience[$i]),
                'type' => strip_tags($typeExperience[$i]),
                'descriptions' => strip_tags($descriptionExperience[$i]),
                'idMembre' => $id_membre,
                'ordre' => 0
            );
            $experience -> inserer_information_experience($information_experience);
        }
        $i++;
    }
    unset($experience);

    // ------------------------- Distinction -------------------------

    $i = 0;
    $organisateurs = $_POST['nomD'];
    $anneeDistinction = $_POST['anneeD'];
    $typeDistinction = $_POST['typeD'];
    $descriptionDistinction = $_POST['descriptionD'];
    $rangDistinction = $_POST['rangD'];
    $ordre = null;

    if(count($organisateurs) > 0 AND count($anneeDistinction) > 0 AND count($typeDistinction) > 0)
    {
        $distinction = new DistinctionModels(3);

        while($i < count($organisateurs))
        {
            if(!empty($organisateurs[$i]) AND !empty($anneeDistinction) AND !empty($typeDistinction))
            {
                if(!empty($rangDistinction[$i]))
                {
                    $ordre = strip_tags($rangDistinction[$i]);  
                }
                else
                {
                    $ordre = 0;
                }
                $information_distinction = array(
                        'organisateur' => strip_tags($organisateurs[$i]),
                        'annee' => strip_tags($anneeDistinction[$i]),
                        'types' => strip_tags($typeDistinction[$i]),
                        'descriptions' => strip_tags($descriptionDistinction[$i]),
                        'id_membre' => $id_membre,
                        'ordre' => $ordre
                    );
                $distinction -> inserer_information_distinction($information_distinction);
            }
            $i++;
        }
        unset($distinction);
    }

    unset($id);
    session_destroy();
    // header('Location:../index.php');
?>
