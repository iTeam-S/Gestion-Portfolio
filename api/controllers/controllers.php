<?php
class InfosMembre
{
	private $defaultValue = null;
	private $nom = null;
	private $prenom = null;
	private $prenom_usuel = null;
	private $user_git = null;
	private $tel1 = null;
	private $tel2 = null;
	private $mail = null;
	private $facebook = null;
	private $linkedin = null;
	private $cv = null;
	private $adresse = null;
	private $description = null;
	private $fonction = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_membre(string $nom, string $prenom, string $prenom_usuel, string $user_git, string $tel1, string $tel2, string $mail, string $facebook, string $linkedin, string $cv, $adresse, $description, string $fonction)
	{
		$this -> nom = ucwords(strip_tags($nom));
		$this -> prenom = ucwords(strip_tags($prenom));
		$this -> prenom_usuel = ucwords(strip_tags($prenom_usuel));
		$this -> user_git = strip_tags($user_git);
		$this -> tel1 = strip_tags($tel1);
		$this -> tel2 = strip_tags($tel2);
		$this -> mail = strip_tags($mail);
		$this -> facebook = strip_tags($facebook);
		$this -> linkedin = strip_tags($linkedin);
		$this -> cv = strip_tags($cv);
		$this -> adresse = strip_tags($adresse);
		$this -> description = strip_tags($description);
		$this -> fonction = strip_tags($fonction);
	}

	public function get_info_membre()
	{
		$infos = array(
			'nom' => $this -> nom,
			'prenom' => $this -> prenom,
			'prenom_usuel' => $this -> prenom_usuel,
			'user_github' => $this -> user_git,
			'tel1' => $this -> tel1,
			'tel2' => $this -> tel2,
			'mail' => $this -> mail,
			'facebook' => $this -> facebook,
			'linkedin' => $this -> linkedin,
			'cv' => $this -> cv, 
			'adresse' => $this -> adresse,
			'description' => $this -> description,
			'fonction' => $this -> fonction
		);
		return $infos;
	}

	public function get_prenom_usuel()
	{
		$infos = array(
			'prenom' => $this -> prenom_usuel
		);
		return $infos;
	}
}

class InfosFormation
{
	private $defaultValue = null;
	private $lieu = null;
	private $annee = null;
	private $type = null;
	private $description = null;
	private $id_membre = null;
	private $ordre = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_formation(string $lieu, string $annee, string $type, string $description, int $id_membre, int $ordre = 0)
	{
		$this -> lieu = strip_tags($lieu);
		$this -> annee = strip_tags($annee);
		$this -> type = strip_tags($type);
		$this -> description = strip_tags($description);
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_formation()
	{
		$infos = array(
			'lieu' => $this -> lieu,
			'annee' => $this -> annee,
			'type' => $this -> type,
			'description' => $this -> description,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre
		);
		return $infos;
	}
}

class InfosCompetence
{
	private $defaultValue = null;
	private $nom = null;
	private $liste = null;
	private $id_categorie = null;
	private $id_membre = null;
	private $ordre = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_competence(string $nom, string $liste, int $id_categorie, int $id_membre, int $ordre = 0)
	{
		$this -> nom = strip_tags($nom);
		$this -> liste = strip_tags($liste);
		$this -> id_categorie = $id_categorie;
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_competence()
	{
		$infos = array(
			'nom' => $this -> nom,
			'liste' => $this -> liste,
			'id_categorie' => $this -> id_categorie,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre
		);
		return $infos;
	}
}

class InfosExperience
{
	private $defaultValue = null;
	private $nom = null;
	private $annee = null;
	private $type = null;
	private $description = null;
	private $id_membre = null;
	private $ordre = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_experience(string $nom, string $annee, string $type, string $description, int $id_membre, int $ordre = 0)
	{
		$this-> nom = strip_tags($nom);
		$this -> annee = strip_tags($annee);
		$this -> type = strip_tags($type);
		$this -> description = strip_tags($description);
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_experience()
	{
		$infos = array(
			'nom' => $this -> nom,
			'annee' => $this -> annee,
			'type' => $this -> type,
			'description' => $this -> description,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre
		);
		return $infos;
	}
}

class InfosDistinction
{
	private $defaultValue = null;
	private $organisateur = null;
	private $annee = null;
	private $type = null;
	private $description = null;
	private $id_membre = null;
	private $ordre = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_distinction(string $organisateur, string $annee, string $type, string $description, int $id_membre, int $ordre)
	{
		$this -> organisateur = strip_tags($organisateur);
		$this -> annee = strip_tags($annee);
		$this -> type = strip_tags($type);
		$this -> description = strip_tags($description);
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_distinction()
	{
		$infos = array(
			'organisateur' => $this -> organisateur,
			'annee' => $this -> annee,
			'type' => $this -> type,
			'description' => $this -> description,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre
		);
		return $infos;
	}
}

class InfosFonction
{
	private $defaultValue = null;
	private $id_membre = null;
	private $id_poste = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_fonction(int $id_membre, int $poste)
	{
		$this -> id_membre = $id_membre;
		$this -> id_poste = strip_tags($poste);
	}

	public function get_info_fonction()
	{
		$infos = array(
			'id_membre' => $this -> id_membre,
			'id_poste' => $this -> id_poste
		);
		return $infos;
	}
}

class InfosLogin
{
	private $defaultValue = null;
	private $identifiant = null;
	private $password = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_login(string $identifiant, string $password)
	{
		$this -> identifiant = strip_tags($identifiant);
		$this -> password = $password;
	}

	public function get_info_login()
	{
		$infos = array(
			'identifiant' => $this -> identifiant,
			'password' => $this -> password
		);
		return $infos;
	}
}

class InfosId
{
	private $defaultValue = null;
	private $prenom = null;
	private $email = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_id(string $prenom, string $email)
	{
		$this -> prenom = strip_tags($prenom);
		$this -> email = strip_tags($email);
	}

	public function get_info_id()
	{
		$infos = array(
			'prenom' => $this -> prenom,
			'email' => $this -> email
		);
		return $infos;
	}
}

class PersonneId
{
	private $defaultValue = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_personne_id($id)
	{
		$this -> id = strip_tags($id);
	}

	public function get_personne_id()
	{
		$infos = array(
			'id' => $this -> id
		);
		return $infos;
	}
}

class CreateJSON
{
	private $defaultValue = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function sendJSON(array $donnees)
	{
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($donnees, JSON_FORCE_OBJECT);
	}
}

class FormationsUpdate
{
	private $defaultValue = null;
	private $lieu = null;
	private $annee = null;
	private $types = null;
	private $descriptions = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function setFormationsUpdate(string $lieu, string $annee, string $types, string $descriptions, int $id)
	{
		$this -> lieu = strip_tags($lieu);
		$this -> annee = strip_tags($annee);
		$this -> types = strip_tags($types);
		$this -> descriptions = strip_tags($descriptions);
		$this -> id = strip_tags($id);
	}

	public function getFormationsUpdate()
	{
		$infos = array(
			'lieu' => $this -> lieu,
			'annee' => $this -> annee,
			'types' => $this -> types,
			'descriptions' => $this -> descriptions,
			'id' => $this -> id
		);
		return $infos;
	}
}

class FonctionsUpdate
{
	private $defaultValue = null;
	private $poste = null;
	private $id = null;
	
	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function setFonctionsUpdate(int $poste, int $id)
	{
		$this -> poste = strip_tags($poste);
		$this -> id = strip_tags($id);
	}

	public function getFonctionsUpdate()
	{
		$infos = array(
			'poste' => $this -> poste,
			'id' => $this -> id
		);
		return $infos;
	}
}

class ExperiencesUpdate
{
	private $defaultValue = null;
	private $nom = null;
	private $annee = null;
	private $types = null;
	private $descriptions = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = null;
	}

	public function setExperiencesUpdate(string $nom, string $annee, string $types, string $descriptions, int $id)
	{
		$this -> nom = strip_tags($nom);
		$this -> annee = strip_tags($annee);
		$this -> types = strip_tags($types);
		$this -> descriptions = strip_tags($descriptions);
		$this -> id = strip_tags($id);
	}

	public function getExperiencesUpdate()
	{
		$infos = array(
			'nom' => $this -> nom,
			'annee' => $this -> annee,
			'types' => $this -> types,
			'descriptions' => $this -> descriptions,
			'id' => $this -> id
		);
		return $infos;
	}
}

class DistinctionsUpdate
{
	private $defaultValue = null;
	private $organisateur = null;
	private $annee = null;
	private $types = null;
	private $descriptions = null;
	private $ordre = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function setDistinctionsUpdate(string $organisateur, string $annee, string $types, string $descriptions, int $ordre, int $id)
	{
		$this -> organisateur = strip_tags($organisateur);
		$this -> annee = strip_tags($annee);
		$this -> types = strip_tags($types);
		$this -> descriptions = strip_tags($descriptions);
		$this -> id = strip_tags($id);
		if(!empty(trim($ordre)))
		{
			$this -> ordre = strip_tags($ordre);
		}
		else
		{
			$this -> ordre = 0;
		}
	}

	public function getDistinctionsUpdate()
	{
		$infos = array(
			'organisateur' => $this -> organisateur,
			'annee' => $this -> annee,
			'types' => $this -> types,
			'descriptions' => $this -> descriptions,
			'ordre' => $this -> ordre,
			'id' => $this -> id
		);
		return $infos;
	}
}

class CompetencesUpdate
{
	private $defaultValue = null;
	private $nom = null;
	private $liste = null;
	private $id_categorie = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function setCompetencesUpdate(string $nom, string $liste, int $id_categorie, int $id)
	{
		$this -> nom = strip_tags($nom);
		$this -> liste = strip_tags($liste);
		$this -> id_categorie = strip_tags($id_categorie);
		$this -> id = strip_tags($id);
	}

	public function getCompetencesUpdate()
	{
		$infos = array(
			'nom' => $this -> nom,
			'liste' => $this -> liste,
			'id_categerie' => $this -> id_categorie,
			'id' => $this -> id
		);
		return $infos;
	}
}

class InformationsSuppression
{
	private $defaultValue = null;
	private $id = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function setId(int $id)
	{
		$this -> id = strip_tags($id);
	}

	public function getId()
	{
		return array('id' => $this -> id);
	}
}
