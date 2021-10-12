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
    $infromation_formation = array(
        'lieu' => strip_tags($_POST['lieu']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['descriptionFormation']),
        'idMembre' => $donneeF['id']
    );
    $formation -> inserer_information_formation($infromation_formation);
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
    $information_experience = array(
        'nom' => strip_tags($_POST['nom']),
        'annee' => strip_tags($_POST['annee']),
        'type' => strip_tags($_POST['type']),
        'descriptions' => strip_tags($_POST['descriptionExperience']),
        'idMembre' => $donneeE['id']
    );

    $experience -> inserer_information_experience($information_experience);
    unset($experience);
    unset($membre);
    header('Location:../views/view.m.php');

?>
