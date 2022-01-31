<?php
include_once('../models/models.php');
include_once('controllers.php');

try
{
    $update = new Update(3);
    // ********************** FORMATIONS ******************** FORMATIONS **********************
    if(!empty($_POST['lieuUpdateFormations']) && !empty($_POST['anneeUpdateFormations']) && !empty($_POST['typeUpdateFormations']) && !empty($_POST['idFormationsUpdate']))
    {
        $dataFormations = new FormationsUpdate(3);
        $dataFormations -> setFormationsUpdate($_POST['lieuUpdateFormations'], $_POST['anneeUpdateFormations'], $_POST['typeUpdateFormations'], $_POST['descriptionUpdateFormations'], $_POST['idFormationsUpdate']);
        $update -> updateFormations($dataFormations -> getFormationsUpdate());
        echo '1';
        unset($dataFormations);
    }

    // ********************* EXPERIENCES ******************** EXPERIENCES ************************
    else if(!empty($_POST['nomUpdateExperiences']) && !empty($_POST['anneeUpdateExperiences']) && !empty($_POST['typeUpdateExperiences']) && $_POST['idExperiencesUpdate'])
    {
        $dataExperiences = new ExperiencesUpdate(3);
        $dataExperiences -> setExperiencesUpdate($_POST['nomUpdateExperiences'], $_POST['anneeUpdateExperiences'], $_POST['typeUpdateExperiences'], $_POST['descriptionUpdateExperiences'], $_POST['idExperiencesUpdate']);
        $update -> updateExperiences($dataExperiences -> getExperiencesUpdate());
        echo '1';
        unset($dataExperiences);
    }

    // ********************* DISTINCTIONS ******************* DISTINCTIONS **********************
    else if(!empty($_POST['organisateurUpdateDistinctions']) && !empty($_POST['anneeUpdateDistinctions']) && !empty($_POST['typeUpdateDistinctions']) && !empty($_POST['idDistinctionsUpdate']))
    {
        $dataDistinctions = new DistinctionsUpdate(3);
        $dataDistinctions -> setDistinctionsUpdate($_POST['organisateurUpdateDistinctions'], $_POST['anneeUpdateDistinctions'], $_POST['typeUpdateDistinctions'], $_POST['descriptionUpdateDistinctions'], $_POST['ordreUpdateDistinctions'], $_POST['idDistinctionsUpdate']);
        $update -> updateDistinctions($dataDistinctions -> getDistinctionsUpdate());
        echo '1';
        unset($dataDistinctions);
    }

    // ******************** COMPETENCES ********************* COMPETENCES ***********************
    else if(!empty($_POST['nomUpdateCompetences']) && !empty($_POST['listeUpdateCompetences']) && !empty($_POST['categorie']) && !empty($_POST['idCompetencesUpdate']))
    {
        $dataCompetences = new CompetencesUpdate(3);
        $dataCompetences -> setCompetencesUpdate($_POST['nomUpdateCompetences'], $_POST['listeUpdateCompetences'], $_POST['categorie'], $_POST['idCompetencesUpdate']);
        $update -> updateCompetences($dataCompetences -> getCompetencesUpdate());
        echo '1';
        unset($dataCompetences);
    }

    else if(!empty($_POST['poste']) && !empty($_POST['idFonctionsUpdate']))
    {
        $dataFonctions = new FonctionsUpdate(3);
        $dataFonctions -> setFonctionsUpdate($_POST['poste'], $_POST['idFonctionsUpdate']);
        $update -> updateFonctions($dataFonctions -> getFonctionsUpdate());
        echo '1';
        unset($dataFonctions);
    }

    else
    {
        throw new Exception("La mise à jour n'a pas pu être effectuée !", 500);
    }
    
    unset($update);
}
catch(Exception $e)
{
    $erreurs = ['message' => $e -> getMessage(), 'code' => $e -> getCode()];
    var_dump($erreurs);
}
