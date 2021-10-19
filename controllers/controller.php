<?php 
    include_once('../models/models_class.php');

//-------------------------------- Membre ----------------------------------

    

    $membre = new MembreModels();

    if(!empty($_POST['nomPersonne']) AND !empty($_POST['prenomsPersonne']) AND !empty($_POST['tel1']) AND !empty($_POST['email']) AND !empty($_POST['prenomUsuel']))
    {
        $reponses = $membre -> get_prenom_usuel();

        while($donnee = $reponses ->fetch())
        {
            if($donnee['prenom_usuel'] == $_POST['prenomUsuel'])
            {
                header("Location:../views/erreurs/erreurPrenomUsuel.php");
            }
        }

        $informations_membre = array(
            'nom' => strip_tags($_POST['nomPersonne']), 
            'prenom' => ucwords(strip_tags($_POST['prenomsPersonne'])),
            'prenom_usuel' => ucwords(strip_tags($_POST['prenomUsuel'])),
            'user_github' => strip_tags($_POST['usernameGithub']),
            'user_github_pic' => strip_tags($_POST['githubAvatar']),
            'tel1'=> strip_tags($_POST['tel1']),
            'tel2' => strip_tags($_POST['tel2']),
            'mail' => strip_tags($_POST['email']),
            'facebook' => strip_tags($_POST['facebook']),
            'linkedin' => strip_tags($_POST['linkedin']),
            'cv' => strip_tags($_POST['cv']),
            'adresse' => strip_tags($_POST['adresse']),
            'descriptions' => strip_tags($_POST['descriptionsTravail']),
            'fonction' => strip_tags($_POST['fonction'])
        );

        $membre -> inserer_information_membre($informations_membre);
    }

    else
    {
        header("Location:../views/erreurs/erreurMembre.php");
    }


//---------------------------------- Formation --------------------------------------

    $formation = new FormationModels();
    $reponseF = $membre -> get_last_id_membre();
    $donneeF = $reponseF -> fetch();
    // $information_formation = array(
    //     'lieu' => strip_tags($_POST['lieu']),
    //     'annee' => strip_tags($_POST['annee']),
    //     'type' => strip_tags($_POST['type']),
    //     'descriptions' => strip_tags($_POST['descriptionFormation']),
    //     'idMembre' => $donneeF['id']
    // );
    // $formation -> inserer_information_formation($information_formation);
    
    $itemF = 0;
    $lieuFormation = $_POST['lieuFormation'];
    $anneeFormation = $_POST['anneeFormation'];
    $typeFormation = $_POST['typeFormation'];
    $descriptionFormation = $_POST['descriptionFormation'];

    while($itemF < 6)
    {
        if(!empty($lieuFormation[$itemF]) AND !empty($anneeFormation[$itemF]) AND !empty($typeFormation[$itemF]) AND !empty($descriptionFormation[$itemF]))
        {
            $information_formation = array(
                'lieu' => strip_tags($lieuFormation[$itemF]),
                'annee' => strip_tags($anneeFormation[$itemF]),
                'type' => strip_tags($typeFormation[$itemF]),
                'descriptions' => strip_tags($descriptionFormation[$itemF]),
                'idMembre' => $donneeF['id'];
            );
            $formation -> inserer_information_formation($information_formation);
        }
        $itemF += 1;
    }

    unset($formation);

    //------------------------------ Competence -----------------------------------------

    if($_POST['langages']!="" AND $_POST['frameworks']!="" AND $_POST['system']!="" AND $_POST['outils']!="")
    {
        $tableauIdCategorie = array(3, 1, 6, 2);
        $tableauNomCompetence = array(
            'Langages informatiques' => strip_tags($_POST['langages']), 
            'Frameworks' => strip_tags($_POST['frameworks']), 
            'Administration système' =>  strip_tags($_POST['system']), 
            'Outils informatiques' => strip_tags($_POST['outils'])
        );
        
        $competence = new CompetenceModels();
        $reponseC = $membre -> get_last_id_membre();
        $donneeC = $reponseC -> fetch();
        $i = 0;
        foreach($tableauNomCompetence as $cle => $valeur)
        {
            $information_competence = array(
                'nom' => $cle,
                'liste' => $valeur,
                'idCategorie' => $tableauIdCategorie[$i],
                'idMembre' => $donneeC['id']
            );
            $competence -> inserer_information_competence($information_competence);
            $i++;
        }
        unset($competence);
    }

    else
    {
        header('Location:../views/erreurs/erreurCompetence.php');
    }
//-------------------------------- Expérience ---------------------------------------

    $experience = new ExperienceModels();
    $reponseE = $membre -> get_last_id_membre();
    $donneeE = $reponseE -> fetch();
    // $information_experience = array(
    //     'nom' => strip_tags($_POST['nom']),
    //     'annee' => strip_tags($_POST['annee']),
    //     'type' => strip_tags($_POST['type']),
    //     'descriptions' => strip_tags($_POST['descriptionExperience']),
    //     'idMembre' => $donneeE['id']
    // );

    // $experience -> inserer_information_experience($information_experience);

    $itemE = 0;
    $nomOrganisation = $_POST['nomOrganisation'];
    $anneeExperience = $_POST['anneeExperience'];
    $typeExperience = $_POST['typeExperience'];
    $descriptionExperience = $_POST['descriptionExperience'];

    while($itemE < 6)
    {
        if(!empty($nomOrganisation[$itemE]) AND !empty($anneeExperience[$itemE]) AND !empty($typeExperience[$itemE]) AND !empty($descriptionExperience[$itemE]))
        {
            $information_experience = array(
                'nom' => strip_tags($nomOrganisation[$itemE]),
                'annee' => strip_tags($anneeExperience[$itemE]),
                'type' => strip_tags($typeExperience[$itemE]),
                'descriptions' => strip_tags($descriptionExperience[$itemE]))
            );
            $experience -> inserer_information_experience($information_experience);
        }
        $itemE += 1;
    }
    unset($experience);
    unset($membre);
    header('Location:../views/view.php');

?>
