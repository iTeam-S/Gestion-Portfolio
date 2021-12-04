<?php
session_start();
include_once('controllers_v2.php');
include_once('../models/models.php');

//--------------------------- Membre -----------------------------
$id_membre = null;

$insertion = new InsertionDB(3);

try
{
	if(!empty($_POST['nomPersonne']) AND !empty($_POST['prenomsPersonne']) AND !empty($_POST['prenomUsuel']) AND !empty($_POST['telephonePrimo']) AND !empty($_POST['email'])) 
	{
		$data_membre = new InfosMembre(3);
		$data_membre -> set_info_membre($_POST['nomPersonne'], $_POST['prenomsPersonne'], $_POST['prenomUsuel'], $_POST['lien_github'], $_POST['telephonePrimo'], $_POST['telephoneSecondo'], $_POST['email'], $_POST['lien_facebook'], $_POST['lien_linkedin'], $_POST['lien_cv'], $_POST['domicile'], $_POST['descriptionTravail'], $_POST['fonction']);

		if(empty($insertion -> verifier_prenom_usuel($data_membre -> get_prenom_usuel())))
		{
			$insertion -> inserer_membre($data_membre -> get_info_membre());
			unset($data_membre);

			$data_id = new InfosId(3);
			$data_id -> set_info_id($_POST['prenomUsuel'], $_POST['email']);

			$id_membre = $insertion -> get_id_db($data_id -> get_info_id()); // c'est ID membre

			// inserer la focntion d'un individu...
			$fonction = new InfosFonction(3);
			$fonction -> set_info_fonction($id_membre, $_POST['poste']);
			$insertion -> inserer_fonction($fonction -> get_info_fonction());
			unset($fonction);
		}

		else
		{
			header("Location:../views/erreurs/erreurPrenomUsuel.php");
		}
	}

	else
	{
		$id_membre = $_SESSION['id'];
	}
}

catch(Exception $e)
{
	die("Erreur dans le controlleur sur l'insertion de membre:<br>".$e -> getMessage());
}


//----------------------------------- formation --------------------------

try
{
	$i = 0;
    $lieuFormation = $_POST['lieuF'];
    $anneeFormation = $_POST['anneeF'];
    $typeFormation = $_POST['typeF'];
    $descriptionFormation = $_POST['descriptionF'];

	$data_formation = new InfosFormation(3);
    while($i < count($lieuFormation))
    {
        if(!empty($lieuFormation[$i]) AND !empty($anneeFormation[$i]) AND !empty($typeFormation[$i]))
        {
            $data_formation -> set_info_formation($lieuFormation[$i], $anneeFormation[$i], $typeFormation[$i], $descriptionFormation[$i], $id_membre);
            $insertion -> inserer_formation($data_formation -> get_info_formation());
        }
        $i++;
    }

    unset($data_formation);
}

catch(Exception $e)
{
	die("Erreur sur l'insertion de formation:<br>".$e -> getMessage());
}


// --------------------------- Compétence ---------------------------------

try
{
	if(count($_POST['iconeC']) > 0 AND count($_POST['competences']) > 0)
	{	
		$i = 0;
	    $icones = $_POST['iconeC'];
	    $competences = $_POST['competences'];
	    $descriptionCempetence = $_POST['descriptionC'];

		$data_competence = new InfosCompetence(3);
		while($i < count($icones))
		{
			if(!empty($competences[$i]) AND !empty($descriptionCempetence[$i]) AND !empty($icones[$i]))
			{
				$data_competence -> set_info_competence($competences[$i], $descriptionCempetence[$i], $icones[$i], $id_membre);
				$insertion -> inserer_competence($data_competence -> get_info_competence());
			}
			$i++;
		}
		unset($data_competence);
	}
}

catch(Exception $e)
{
	die("Erreur sur l'insertion de competences:<br>".$e -> getMessage());
}


//----------------------------------- Expérience --------------------------------------

try
{
	$i = 0;
    $nomOrganisation = $_POST['nomE'];
    $anneeExperience = $_POST['anneeE'];
    $typeExperience = $_POST['typeE'];
    $descriptionExperience = $_POST['descriptionE'];

	$data_experience = new InfosExperience(3);
    while($i < count($nomOrganisation))
    {
        if(!empty($nomOrganisation[$i]) AND !empty($anneeExperience[$i]) AND !empty($typeExperience[$i]))
        {
			$data_experience > set_info_experience($nomOrganisation[$i], $anneeExperience[$i], $typeExperience[$i], $descriptionExperience[$i], $id_membre);
			$insertion -> inserer_experience($data_experience -> get_info_experience());
        }
        $i++;
    }
	unset($data_experience);
}

catch(Exception $e)
{
	die("Erreur sur l'insertion des experiences:<br>".$e -> getMessage());
}


//------------------------------------------------------ Distinction -------------------------------------

try
{
	$i = 0;
    $organisateurs = $_POST['nomD'];
    $anneeDistinction = $_POST['anneeD'];
    $typeDistinction = $_POST['typeD'];
    $descriptionDistinction = $_POST['descriptionD'];
    $rangDistinction = $_POST['rangD'];

    if(count($organisateurs) > 0 AND count($anneeDistinction) > 0 AND count($typeDistinction) > 0)
    {
        $data_distinction = new InfosDistinction(3);
        while($i < count($organisateurs))
        {
            if(!empty($organisateurs[$i]) AND !empty($anneeDistinction[$i]) AND !empty($typeDistinction[$i]))
            {
				$data_distinction -> set_info_distinction($organisateurs[$i], $anneeDistinction[$i], $typeDistinction[$i], $descriptionDistinction[$i], $id_membre, (int) $rangDistinction[$i]);
				$insertion -> inserer_distinction($data_distinction -> get_info_distinction());
            }
            $i++;
        }
		unset($data_distinction);
	}
}

catch(Exception $e)
{
	die("Erreur sur l'insertion des distinctions:<br>".$e -> getMessage());
}

unset($data_id);
