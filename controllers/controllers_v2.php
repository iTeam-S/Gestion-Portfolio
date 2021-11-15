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
		$this -> nom = $nom;
		$this -> prenom = $prenom;
		$this -> prenom_usuel = $prenom_usuel;
		$this -> user_git = $user_git;
		$this -> tel1 = $tel1;
		$this -> tel2 = $tel2;
		$this -> mail = $mail;
		$this -> facebook = $facebook;
		$this -> linkedin = $linkedin;
		$this -> cv = $cv;
		$this -> adresse = $adresse;
		$this -> description = $description;
		$this -> fonction = $fonction;
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
			'fonction' => $this -> fonction);

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

	public function set_info_formation(string $lieu, string $annee, string $type, string $description, int $id_membre, int $ordre)
	{
		$this -> lieu = $lieu;
		$this -> annee = $annee;
		$this -> type = $type;
		$this -> description = $description;
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_formation()
	{
		$infos = array(
			'lieu' => $this -> lieu,
			'annee' => $this -> annee,
			'type' => $this -> description,
			'description' => $this -> description,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre);

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

	public function set_info_competence(string $nom, string $liste, int $id_categorie, int $id_membre, int $ordre)
	{
		$this -> nom = $nom;
		$this -> liste = $liste;
		$this -> id_categorie = $id_categorie;
		$this -> id_membre = $id_membre;
		$this -> ordre = $ordre;
	}

	public function get_info_experience()
	{
		$infos = array(
			'nom' => $this -> nom,
			'liste' => $this -> liste,
			'id_categorie' => $this -> id_categorie,
			'id_membre' => $this -> id_membre,
			'ordre' => $this -> ordre);
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
		$this -> organisateur = $organisateur;
		$this -> annee = $annee;
		$this -> type = $type;
		$this -> description = $description;
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
			'ordre' => $this -> ordre);

		return $infos;
	}
}

class InfosFonction
{
	private $defaultValue = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function set_info_fonction(int $id_membre, int $poste)
	{
		$this -> id_membre = $id_membre;
		$this -> id_poste = $poste;
	}

	public function get_info_fonction
	{
		$infos = array(
			'id_membre' => $this -> id_membre,
			'id_poste' => $this -> id_poste);

		return $infos;
	}
}
