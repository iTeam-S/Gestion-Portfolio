<?php
include_once('../models/models.php');
include_once('controllers.php');

try
{
        $supprimer = new Suppression(3);
        $informations = new InformationsSuppression(3);
    // ********************* SUPPRIMER UNE FORMATION **********************
    if(!empty($_POST['dataFormations']))
    {
        $informations -> setId((int) $_POST['dataFormations']);
        $supprimer -> deleteFormations($informations -> getId());
        echo '1';
    }
// ************************* SUPPRIMER UNE EXPERIENCE *************************

    else if(!empty($_POST['dataExperiences']))
    {
        $informations -> setId((int) $_POST['dataExperiences']);
        $supprimer -> deleteExperiences($informations -> getId());
        echo '1';
    }
// *********************** SUPPRIMER UNE DISTINCTION **********************
    else if(!empty($_POST['dataDistinctions']))
    {
        $informations -> setId((int) $_POST['dataDistinctions']);
        $supprimer -> deleteDistinctions($informations -> getId());
        echo '1';
    }
// *********************** SUPPRIMER UN COMPETENCE ***********************

    else if(!empty($_POST['dataCompetences']))
    {
        $informations -> setId((int) $_POST['dataCompetences']);
        $supprimer -> deleteCompetences($informations -> getId());
        echo '1';
    }

    else
    {
        throw new Exception("Aucun ID n'a pas été obtenu...!", 500);
    }
    
    unset($informations);
    unset($supprimer);
}
catch(Exception $e)
{
    $erreurs = ['message' => $e -> getMessage(), 'code' => $e -> getCode()];
    var_dump($erreurs);
}
