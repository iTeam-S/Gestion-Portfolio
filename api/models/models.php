<?php
abstract class Database {
    private $host = '';
    private $database = '';
    private $user = '';
    private $password = '';

    protected function db_connect():object {
        try {
            return new PDO('mysql:host='.$this->host.'; dbname='.$this -> database.'; charset=utf8', 
                $this -> user, $this -> password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: connexion à la base de données !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }
}

class Membre extends Database {
    public function getMembre(array $donnees):array {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('SELECT id, nom, prenom, prenom_usuel, user_github, 
                 user_github_pic, tel1, tel2, mail, date_d_adhesion, date_exclusion, 
                 facebook, linkedin, actif, cv, adresse, "description", fonction, pdc, dark
                FROM membre WHERE id = :id');
            $demande -> execute($donnees);
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre' !".$e -> getMessage()
            ]));
        }
        $database = null;
    }

    public function addMembres(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('INSERT INTO membre(nom, prenom, prenom_usuel, user_github,
                 tel1, tel2, mail, facebook, linkedin, cv, adresse, description, fonction)
                VALUES(:nom, :prenom, :prenom_usuel, :user_github, :tel1, :tel2, :mail, :facebook, 
                 :linkedin, :cv, :adresse, :descriptions, :fonction)');
            $demande -> execute($donnees);
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre' !".$e -> getMessage()
            ]));
        }
        $database = null;
    }
}

// class Formations extends Database
