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
                OR (prenom_usue LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(prenom_usuel))');
            $demande -> execute($donnees);
            $reponses = $demande -> fetch(PDO::FETCH_ASSOC);
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
        $database=null;
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
        $database=null;
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
        $database=null;
    }
}

class Formations extends Database {
    // ******************** PRENDRE TOUTES LES FORMTIONS **********************
    public function getAllFormations():array {
        try {
            $database = Database::db_connect();
            $demande = $database -> query('SELECT f.id, f.lieu, f.annee, f.type, 
                 f.description, f.id_membre, f.ordre, m.prenom_usuel
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
                f.description, f.id_membre, f.ordre m.prenom_usuel
                FROM formations f
                JOIN membre m ON f.id_membre = m.id
                GROUP BY f.id ASC
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))');
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
                "description" = :descriptions, id_membre = :id_membre
                WHERE id = :id');
            $demande -> execute($donnees);
            $database -> commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu effectuer des mises à jours !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
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
        $database=null;
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
        $database=null;
    }

    public function getFonction(array $donnees):array {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare('SELECT f.id, f.date_debut_fonction, f.id_membre,
                 m.prenom_usuel, f.id_poste, p.nom, p.categorie
                FROM fonction f
                JOIN membre m ON f.id_membre = m.id
                JOIN poste p ON f.id_poste=p.id 
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Fonction Tout' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addFonction(array $donnees) {
        try {
            $database = Database::db_connect();
            $demande = $database -> prepare("INSERT INTO fonction(id_membre, id_poste)
                VALUES(:id_membre, id_poste)
            ");
            $demande -> execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu ajouter de fonction !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateFonction(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE fonction
                SET id_poste=:poste
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu mettre à jours 'fonction' !".$e -> getMessage()
            ], JSON_FORCE_OBJECT));   
        }
        $database=null;
    }

    public function deleteFonction(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM fonction WHERE id=:identifiant');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'fonction' !"
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Experiences extends Database {

    public function getAllExperiences():array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT e.id, e.nom, e.annee, e.type, e.description,
                 e.id_membre, e.ordre, m.prenom_usuel
                FROM experiences e
                JOIN membre m ON e.id_membre=m.id
            ');
            $reponses=$demande->fetchAll(PDO::ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Experiences Tout'".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getExperiences(array $donnees):array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT e.id, e.nom, e.annee, e.type, e.description, 
                 e.id_membre, e.ordre, m.prenom_usuel
                FROM experiences e
                JOIN membre m ON e.id_membre=m.id
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
            ');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;  
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'experiences'!".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addExperiences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO experiences(nom, annee, "type", "description", id_membre, ordre)
                VALUES(:nom, :annee, :"type", :"description", :id_membre, :ordre)
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'experiences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateExperiences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE experiences
                SET nom=:nom, annee=:annee, "type"=:"type", 
                "description"=:"description", id_membre=:id_membre
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jour 'experiences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function deleteExperiences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM experiences
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'experiences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Distinctions extends Database {

    public function getAllDistinctions():array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT d.id, d.organisateur, d.annee, d.type, 
                 d.description, d.id_membre, d.ordre, m.prenom_usuel
                FROM distinctions d
                JOIN membre m ON d.id_membre=m.id
            ');
            $reponses=$demande->fetchAll(PDO::ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'distinctions Tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getDistinctions(array $donnees):array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT d.id, d.organisateur, d.annee, d.type, 
                 d.description, d.id_membre, d.ordre, m.prenom_usuel
                FROM distinctions d
                JOIN membre m ON d.id_membre=m.id
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
            ');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'distinctions' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addDistinctions(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO distinctions(organisateur, annee, "type", 
                 "descriptions", id_membre, ordre)
                VALUES(:organisateur, :annee, :"type",  :"description", :id_membre, :ordre)
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'distinctions' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateDistinctions(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE distinctions
                SET organisateur=:organisateur, annee=:annee, "type"=:"type",
                 "description"=:"description", ordre=:ordre
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jour 'distinctions' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function deleteDistinctions(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM distinctions 
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'distinctions' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Competences extends Database {

    public function getAllCompetences():array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT c.id, c.nom, c.liste, 
                 c.id_categorie, cc.nom as categorie, cc.icone,
                 c.id_membre, c.ordre, m.prenom_usuel
                FROM competences c
                JOIN membre m ON c.id_membre=m.id
                JOIN categorie_competence cc ON c.id_categorie=cc.id
            ');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'competences tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getCompetences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT c.id, c.nom, c.liste, 
            c.id_categorie, cc.nom as categorie, cc.icone,
            c.id_membre, c.ordre, m.prenom_usuel
           FROM competences c
           JOIN membre m ON c.id_membre=m.id
           JOIN categorie_competence cc ON c.id_categorie=cc.id
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
            ');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'competences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addCompetences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO competences(nom, liste, id_categorie,
                 id_membre, ordre)
                VALUES(:nom, :liste, :id_categorie, :id_membre, :ordre)
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'competences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateCompetences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE competences
                SET nom=:nom, liste=:liste, id_categorie=:id_categorie
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {    
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jour 'competences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function deleteCompetences(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM competences
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'competences' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Projets extends Database {
    
    public function getAllProjets():array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT p.id, p.nom, p.description, p.lien,
                 p.pdc, p.id_membre, p.ordre, m.prenom_usuel
                FROM projets p
                JOIN membre m ON p.id_membre=m.id
            ');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'projets tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getProjets(array $donnees):array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT p.id, p.nom, p.description, p.lien,
                 p.pdc, p.id_membre, p.ordre, m.prenom_usuel
                FROM projets p
                JOIN membre m ON p.id_membre=m.id
                WHERE m.id = :identifiant 
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCorsor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'projets' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addProjets(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO projets(nom, "description", lien,
                 pdc, id_membre, ordre)
                VALUES(:nom, :"description", :lien, :pdc, :id_membre, :ordre)');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'projets' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateProjets(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE projets
                SET nom=:nom, "description"=:"description", lien=:lien,
                 pdc=:pdc, ordre=:ordre
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jour 'projets' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function deleteProjets(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM projets 
            WHERE id=:identifiant');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'projets' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Autres extends Database {

    public function getAllAutres():array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT a.id, a.nom, a.lien, a.id_membre
                FROM autres a
                JOIN membre m ON a.id_membre=m.id
            ');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'autres tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getAutres(array $donnees):array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT a.id, a.nom, a.lien, a.id_membre
                FROM autres a
                JOIN membre m ON a.id_membre=m.id
                WHERE m.id=:identifiant
                OR (m.prenom_usuel LIKE %:identifiant% OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'autres' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function addAutres(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO autres(nom, lien, id_membre)
                VALUES(:nom, :lien, :id_membre)
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'autres' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateAutres(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE autres
                SET nom=:nom, lien=:lien
                WHERE id=:identifiant
            ');
            $demande->execute($donnees);
            $database->commit();
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu mettre à jour 'autres' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Login extends Database {

    public function authentifier(array $donnees):array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT True, id, prenom_usuel
                FROM membre
                WHERE (mail=:identifiant OR prenom_usuel=:identifiant) AND "password"=SHA2(:"password", 256)
            ');
            $demande->execute($donnees);
            $reponses->fetch(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu les informations d'authentification !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}
