<?php
class ConnexionDB
{
	private $defaultValue = null;

	private function __construct()
	{
		$this -> defaultValue = "lahatra_iTeam-$";
	}

	protected function db_connect()
	{
		try
		{
			$database = new PDO('mysql:host=localhost; dbname=iTeam-$; charset=utf8', 'root', '',
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
			);
			return $database;
		}

		catch(PDOException $e)
		{
			die('Erreur sur la connexion à la base de données:<br>'.$e -> getMessage());
		}
	}
}

class InsertionDB extends ConnexionDB
{
	private $defaultValue = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function verifier_prenom_usuel(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$reponse = $database -> prepare('SELECT True FROM membre 
				WHERE prenom_usuel = :prenom');
			$reponse -> execute($donnees);
			$data = $reponse -> fetch();
			return $data['TRUE'];
		}

		catch(PDOException $e)
		{
			die("Erreur sur le prenom usuel: <br>".$e -> getMessage());
		}
        $database = null;
	}

	// inserer dans la table membre...
	public function inserer_membre(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();

			$requete = $database -> prepare('INSERT INTO membre(nom, prenom, prenom_usuel, 
				user_git, tel1, tel2, mail, facebook, linkedin, cv, 
				adresse, description, fonction)
				VALUES(:nom, :prenom, :prenom_usuel, :user_git, :tel1, 
				:tel2, :mail, :facebook, :linkedin, :cv, :adresse, :description, :fonction)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des membres:<br>".$e -> getMessage());
		}
		$database = null;
	}

	public function get_id_db(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$reponse = $database -> prepare('SELECT id FROM membre 
				WHERE prenom_usuel = :prenom 
				AND mail = :email');
			$reponse -> execute($donnees);
			$data = $reponse -> fetch();
			return $data['id'];
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'ID:<br>".$e -> getMessage());
		}
	}

	// inserer dans la table 'formations'...
	public function inserer_formation(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$requete = $database -> prepare('INSERT INTO formations(lieu, annee, 
				type, description, id_membre, ordre)
				VALUES(:lieu, :annee, :type, :description, :id_membre, :ordre)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des formations:<br>".$e -> getMessage());
		}
		$database = null;
	}

	// inserer dans la table 'competences'...
	public function inserer_competence(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$requete = $database -> prepare('INSERT INTO competences(nom, liste, id_categorie, 
				id_membre, ordre)
				VALUES(:nom, :liste, :id_categorie, :id_membre, :ordre)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des competences:<br>".$e -> getMessage());
		}
		$database = null;
	}

	// inserer dans la table 'experiences'...
	public function inserer_experience(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$requete = $database -> prepare('INSERT INTO experiences(nom, annee, 
				type, description, id_membre, ordre)
				VALUES(:nom, :annee, :type, :description, :id_membre, :ordre)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des expérences:<br>".$e -> getMessage());
		}
		$database = null;
	}

	// inserer dans la table 'distinction'...
	public function inserer_distinction(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$requete = $database -> prepare('INSERT INTO distinctions(organisateur, annee, 
				type, description, id_membre, ordre)
				VALUES(:organisateur, :annee, :type, :description, :id_membre, :ordre)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des distinctions:<br>".$e -> getMessage());
		}
		$database = null;
	}

	// inserer la fonction d'une personne..........
	public function inserer_fonction(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$requete = $database -> prepare('INSERT INTO fonction(date_debut_fonction, 
				id_membre, id_poste)
				VALUES(NOW(), :id_membre, :id_poste)');
			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'insertion des fonctions:<br>".$e -> getMessage());
		}
		$database = null;
	}
}

// pour le login.............
class Login extends ConnexionDB
{
	private $defaultValue = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function authentifier(array $donnees)
	{
		try
		{
			$database = ConnexionDB::db_connect();
			$reponse = $database -> prepare('SELECT True, id FROM membre 
				WHERE (prenom_usuel = :identifiant OR mail = :identifiant) 
				AND password = SHA2(:password, 256)');
			$reponse -> execute($donnees);
			$data = $reponse -> fetch();
			return $data;
		}

		catch(PDOException $e)
		{
			die("Erreur sur l'authentification:<br>".$e -> getMessage());
		}
		$database = null;
	}
}

class Personnes extends ConnexionDB
{
    private $defaultValue = null;

    private function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }
}
