<?php

class ConnectToDb
{
    protected function db_connect()
    {
        try
        {
            $database = new PDO('mysql:host=localhost; dbname=iteam-s; charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $database;
        }

        catch(Exception $e)
        {
            die('Erreur: '.$e -> getMessage());
        }
    }
}

class MembreModels extends ConnectToDb
{
    private $defaultValue = null;
    
    public function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }

    public function get_prenom_usuel()
    {
        $database = $this -> db_connect();

        return $database -> query('SELECT prenom_usuel FROM membre ORDER BY id');
    }

    public function inserer_information_membre( array $donneesMembre)
    {
        $database = $this -> db_connect();

        $requete = $database -> prepare("INSERT INTO membre(nom, prenom, prenom_usuel, user_github,
            tel1, tel2, mail, facebook, linkedin, cv, adresse, description, fonction)
            VALUES(:nom, :prenom, :prenom_usuel,:user_github, :tel1, :tel2, :mail, 
            :facebook, :linkedin, :cv, :adresse, :descriptions, :fonction)");

        $requete -> execute($donneesMembre);
    }
}

class FormationModels extends ConnectToDb
{
    private $defaultValue = null;

    public function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }

    public function inserer_information_formation(array $donneesFormation)
    {
        $database = $this -> db_connect();

        $requete = $database -> prepare("INSERT INTO formations(lieu, annee, type, description, id_membre, ordre) 
            VALUES(:lieu, :annee, :type, :descriptions, :idMembre, :ordre)");
        
        $requete -> execute($donneesFormation);
    }
}

class CompetenceModels extends ConnectToDb
{
    private $defaultValue = null;

    public function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }

    public function inserer_information_competence(array $donneesCompetence)
    {
        $database = $this -> db_connect();
        
        $requete = $database -> prepare("INSERT INTO competences(nom, liste, id_categorie, id_membre, ordre)
            VALUES(:nom, :liste,:idCategorie, :idMembre, :ordre)");

        $requete -> execute($donneesCompetence);
    }
}

class ExperienceModels extends ConnectToDb
{
    private $defaultValue = null;

    public function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }

    public function inserer_information_experience(array $donneesExperience)
    {
        $database = $this -> db_connect();

        $requete = $database -> prepare("INSERT INTO experiences(nom, annee, `type`, `description`, id_membre, ordre)
            VALUES(:nom, :annee, :type, :descriptions, :idMembre, :ordre)");

        $requete -> execute($donneesExperience);
    }
}

class DistinctionModels extends ConnectToDb
{
    private $defaultValue = null;

    public function __construct(int $number)
    {
        $this -> defaultValue = $number;
    }

    public function inserer_information_distinction(array $donnees)
    {
        $database = $this -> db_connect();
        $requete = $database -> prepare("INSERT INTO distinctions(organisateur, annee, `type`, `description`, id_membre, ordre)
            VALUES(:organisateur, :annee, :types, :descriptions, :id_membre, :ordre)");

        $requete -> execute($donnees);
    }
}

class FonctionModels extends ConnectToDb
{
    private $defaultValue = null;

    public function __construct(int $nombre)
    {
        $this -> defaultValue = $nombre;
    }

    public function inserer_information_fonction(array $donnees)
    {
        try
        {
            $database = $this -> db_connect();
            $requete = $database -> prepare('INSERT INTO fonction(date_debut_fonction, id_membre, id_poste)
                VALUES(NOW(), :id_membre, :id_poste)');

            $requete -> execute($donnees);
        }
        
        catch(Exception $e)
        {
            die('Erreur: '.$e -> getMessage());
        }
    }

}

class IdMembre extends ConnectToDb
{
    public function get_id_membre(array $prenomUsuel)
    {
        $database = $this -> db_connect();

        $reponse = $database -> prepare('SELECT id FROM membre WHERE prenom_usuel = :prenom_usuel');
        $reponse -> execute($prenomUsuel);
        $donnee = $reponse -> fetch();
        return $donnee['id'];
    }
}

class Login extends ConnectToDb
{
    private $defaultValue;
    private $identifiant;
    private $password;

    public function __construct(int $nombre)
    {
        $defaultValue = $nombre;
    }

    public function set_info(string $identifiant, string $password)
    {
        $this -> identifiant = $identifiant;
        $this -> password = $password;

    }

    private function get_info()
    {
        $infos = array(
            'identifiant' => $this -> identifiant,
            'password' => $this -> password
        );
        return $infos;
    }

    public function get_id()
    {
        try
        {
            $database = $this -> db_connect();
            $reponse = $database -> prepare("SELECT id FROM membre WHERE (prenom_usuel = :identifiant OR mail = :identifiant) AND `password` = SHA2(:password, 256)");
            $reponse -> execute($this -> get_info());
            return $reponse;
        }
        catch(Exception $e)
        {
            die('Erreur:'.$e -> getMessage());
        }
    }
}
