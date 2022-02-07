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
    // ************************ PRENDRE LA LISTE DES MEMBRES AU SEIN DE ITEAM-$ **********************
    public function getAllMembre():array {
        try {
            $database = Database::db_connect();
            $demande = $database -> query('SELECT id, nom, prenom, prenom_usuel, user_github, 
                 user_github_pic, tel1, tel2, mail, date_d_adhesion, facebook, linkedin, actif, cv, adresse, 
                 "description", fonction, pdc, dark
                FROM membre');
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre Tout' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    // ***************************** PRENDRE LES INFORMATIONS D'UNE MEMBRE ************************
    public function getMembre(array $donnees):array {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('SELECT id, nom, prenom, prenom_usuel, user_github, 
                  user_github_pic, tel1, tel2, mail, date_d_adhesion, facebook, linkedin, actif, cv, adresse, 
                  "description", fonction, pdc, dark
                FROM membre 
                WHERE id = :identifiant 
                OR (prenom_usuel = :identifiant OR SOUNDEX(:identifiant) = SOUNDEX(prenom_usuel))');
            $demande -> execute($donnees);
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    public function addMembres(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('INSERT INTO membre(nom, prenom, prenom_usuel, user_github,
                 tel1, tel2, mail, facebook, linkedin, cv, adresse, "description", fonction)
                VALUES(:nom, :prenom, :prenom_usuel, :user_github, :tel1, :tel2, :mail, :facebook, 
                 :linkedin, :cv, :adresse, :descriptions, :fonction)');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'Membre' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    public function updateMembre(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare("UPDATE membre 
                SET user_github = :github, tel1 = :phone1,
                tel2 = :phone2, mail = :mail, facebook = :facebook
                linkedin = :linkedin, adresse = :adresse, 
                `description` = :'description', `function` = :'fonction'
            ");
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: la mise n'a pas été effectuer !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }

    public function updateMembrePassword(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE membre
                SET "password"=SHA2(:keyword, 256)
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jours le mot de passe !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }

    public function deleteMembre(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('DELETE FROM membre WHERE id = :identifiant');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: la suppression n'a pas été effectuer !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }
}

class Formations extends Database {
    // ******************** PRENDRE TOUTES LES FORMTIONS **********************
    public function getAllFormations():array {
        try {
            $database = Database::db_connect();
            $demande = $database -> query('SELECT f.id, f.lieu, f.annee, f.type, 
                 f.description, f.id_membre, m.prenom_usuel
                FROM formations f
                JOIN membre m ON f.id_membre = m.id
                GROUP BY f.id_membre ASC');
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Formations Tout' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }
// ********************** PRENDRE UNE FORMATION ***********************
    public function getFormations(array $donnees):array {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('SELECT f.id, f.lieu, f.annee, f.type, 
                f.description, f.id_membre, m.prenom_usuel
                FROM formations f
                JOIN membre m ON f.id_membre = m.id
                GROUP BY f.id ASC
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel = :identifiant OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))');
            $demande -> execute($donnees);
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Formations' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    public function addFormations(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('INSERT INTO formations(lieu, annee, "type", "description",
                 id_membre, ordre)
                VALUES(:lieu, :annee, :types, :descriptions, :id_membre, :ordre)');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'Formations' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    public function updateFormations(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('UPDATE formations
                SET lieu = :lieu, annee = :annee, "type" = :types, 
                "description" = :descriptions, id_membre = :id_membre, ordre = :ordre
                WHERE id = :id');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu effectuer des mises à jours !".$e -> getMessage()
            ]));
        }
    }

    public function deleteFormations(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('DELETE FROM formations
                WHERE id = :id');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu effectuer de suppression !".$e -> getMessage()            
            ], JSON_FORCE_OBJECT));
        }
    }
}

class Fonction extends Database {
    // ************************ PRENDRE TOUTES LES FONCTIONS DES PERSONNES, C'EST ITEAM-$ ***************************
    public function getAllFonction():array {
        try {
            $database = Database::db_connect();
            $demande = $database -> query('SELECT f.id, f.date_debut_fonction, f.id_membre,
                 m.prenom_usuel, f.id_poste, p.nom
                FROM fonction f
                JOIN membre m ON f.id_membre = m.id
                JOIN poste p ON p.id = f.id_poste');
            $reponses = $demande -> fetchAll(PDO::FETCH_ASSOC);
            $demande -> closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Fonction Tout' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }

    public function getFonction(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('SELECT f.id, f.date_debut_fonction, f.id_membre,
                 m.prenom_usuel, f.id_poste, p.nom
                FROM fonction f
                JOIN membre m ON f.id_membre = m.id
                JOIN poste p ON p.id = f.id_poste
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel = :identifiant OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))');
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Fonction Tout' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }

    public function addFonction(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare("INSERT INTO fonction(id_membre, id_poste)
                VALUES(:idMembre, idPoste)
            ");
            $demande -> execute($donnees);
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu ajouter de fonction !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }

    public function update(array $donnees) {
        try {

        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu mettre à jours fonction !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));   
        }
    }
}
