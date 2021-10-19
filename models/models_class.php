<?php

class ConnectToDb
{
    protected function db_connect()
    {
        try
        {
            $database = new PDO('mysql:host=localhost; dbname=iteams; charset=utf8', 'root', '',
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
    public function get_prenom_usuel()
    {
        $database = $this -> db_connect();

        return $database -> query('SELECT prenom_usuel FROM membre ORDER BY id');
    }

    public function inserer_information_membre($donneesMembre)
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
    public function inserer_information_formation($donneesFormation)
    {
        $database = $this -> db_connect();

        $requete = $database -> prepare("INSERT INTO formations(lieu, annee, type, description, id_membre) 
            VALUES(:lieu, :annee, :type, :descriptions, :idMembre)");
        
        $requete -> execute($donneesFormation);
    }
}

class ExperienceModels extends ConnectToDb
{
    public function inserer_information_experience($donneesExperience)
    {
        $database = $this -> db_connect();

        $requete = $database -> prepare("INSERT INTO experiences(nom, annee, type, description, id_membre)
            VALUES(:nom, :annee, :type, :descriptions, :idMembre)");

        $requete -> execute($donneesExperience);
    }
}

class CompetenceModels extends ConnectToDb
{
    public function inserer_information_competence($donneesCompetence)
    {
        $database = $this -> db_connect();
        
        $requete = $database -> prepare("INSERT INTO competences(nom, liste, id_categorie, id_membre)
            VALUES(:nom, :liste,:idCategorie, :idMembre)");

        $requete -> execute($donneesCompetence);
    }
}

class IdMembre extends ConnectToDb
{
    public function get_id_membre($prenomUsuel)
    {
        $database = $this -> db_connect();

        $reponse = $database -> prepare('SELECT id FROM membre WHERE prenom_usuel = :prenom_usuel');
        $reponse -> execute($prenomUsuel);
        $donnee = $reponse -> fetch();
        return $donnee['id'];
    }
}