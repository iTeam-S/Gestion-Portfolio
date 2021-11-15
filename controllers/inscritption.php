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
	$data_formation = new InfosFormation(3);

	$i = 0;
    $lieuFormation = $_POST['lieuF'];
    $anneeFormation = $_POST['anneeF'];
    $typeFormation = $_POST['typeF'];
    $descriptionFormation = $_POST['descriptionF'];

    while($i < count($lieuFormation))
    {
        if(!empty($lieuFormation[$i]) AND !empty($anneeFormation[$i]) AND !empty($typeFormation[$i]))
        {
            $data_formation -> set_info_formation($lieuFormation[$i], $anneeFormation[$i], $typeFormation[$i], $descriptionFormation[$i], $id_membre, 0);

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
		$data_competence = new InfosCompetence(3);
	
		$i = 0;
	    $icones = $_POST['iconeC'];
	    $competences = $_POST['competences'];
	    $descriptionCempetence = $_POST['descriptionC'];
	}
	/*if(count($_POST['iconeC']) > 0 AND count($_POST['competences']) > 0)
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
    }*/



}

catch(Exception $e)
{
	die("Erreur sur l'insertion de competences:<br>".$e -> getMessage());
}
