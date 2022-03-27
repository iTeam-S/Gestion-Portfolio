<?php
abstract class Database {
    
    public function __construct() {
        $lahatra=json_decode(file_get_contents('./models/db.json'));
        $this->host = $lahatra->host;
        $this->dbname = $lahatra->dbname;
        $this->user = $lahatra->user;
        $this->password = $lahatra->password;
    }

    protected function db_connect(): object | string {
        try {
            return new PDO("mysql:host=$this->host; dbname=$this->dbname; charset=utf8", 
                $this->user, $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: connexion à la base de données !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
    }
}

class Membre extends Database {
    // ************************ PRENDRE LA LISTE DES MEMBRES AU SEIN DE ITEAM-$ **********************
    public function getAllMembre():array {
        try {
            $database = Database::db_connect();
            $demande = $database->query('SELECT id, nom, prenom, prenom_usuel, user_github, 
                 user_github_pic, tel1, tel2, mail, DATE_FORMAT(date_d_adhesion, "%d %b %Y") AS date_d_adhesion, facebook, linkedin, actif, cv, adresse, 
                 `description`, fonction, pdc, dark
                FROM membre WHERE actif=1
                ORDER BY id ASC');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre Tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    // ***************************** PRENDRE LES INFORMATIONS D'UNE MEMBRE ************************
    public function getMembre(array $donnees): array | bool {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT id, nom, prenom, prenom_usuel, user_github, 
                  user_github_pic, tel1, tel2, mail, DATE_FORMAT(date_d_adhesion, "%d %b %Y") AS date_d_adhesion, facebook, linkedin, cv, adresse, 
                  `description`, fonction, pdc, dark
                FROM membre 
                WHERE actif=1 AND (id=:identifiant 
                OR (prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant)=SOUNDEX(prenom_usuel)))');
            $demande->execute($donnees);
            $reponses=$demande->fetch(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Membre' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    private function verifyMembre(array $donnees):int {
        $database=Database::db_connect();
        $demande=$database->prepare('SELECT True FROM membre
            WHERE prenom_usuel=:prenom_usuel OR user_github=:user_github
             OR mail=:mail');
        $demande->execute($donnees);
        $reponses=$demande->fetch(PDO::FETCH_ASSOC);
        $demande->closeCursor();
        return (!empty($reponses) ? 1 : 0);
    }

    public function addMembre(array $donnees, array $verify):int {
        try {
            $status=0;
            if($this->verifyMembre($verify) === 0) {
                $database=Database::db_connect();
                $demande=$database->prepare('INSERT INTO membre(nom, prenom, prenom_usuel, user_github
                     tel1, tel2, mail, actif, adresse, `password`, dark)
                    VALUES(:nom, :prenom, :prenom_usuel, :user_github, :tel1, :tel2, :mail, 
                     1, :adresse, SHA2("iTeam-$", 256), 0)');
                $demande->execute($donnees);
                $status=1;
            }
            return $status;
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'Membre' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateMembre(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare("UPDATE membre 
                SET user_github = :user_github, tel1 = :tel1,
                tel2 = :tel2, mail = :mail, facebook = :facebook,
                linkedin = :linkedin, cv = :cv, adresse = :adresse, 
                description = :description, fonction = :fonction, 
                pdc = :pdc, dark = :dark 
                WHERE id=:identifiant");
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: la mise n'a pas été effectuer !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    private function verifyPassword(array $donnees):int {
        $database=Database::db_connect();
        $demande=$database->prepare('SELECT True FROM membres
            WHERE `password`=SHA2(:keyword, 256) AND id=:identifiant');
        $demande->execute($donnees);
        $reponses=$demande->fetch(PDO::FETCH_ASSOC);
        return (!empty($reponses) ? 1 : 0);
    }

    public function updateMembrePassword(array $donnees, array $verify):int {
        try {
            $status = 0;
            if($this->verifyPassword($verify) === 1) {
                $database=Database::db_connect();
                $demande=$database->prepare('UPDATE membre
                    SET `password`=SHA2(:keyword, 256)
                    WHERE id=:identifiant');
                $demande->execute($donnees);
                $status=1;
            }
            return $status;
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
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM membre 
                WHERE id=:identifiant');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: la suppression n'a pas été effectuer !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Formations extends Database {
    // ******************** PRENDRE TOUTES LES FORMTIONS **********************
    public function getAllFormations(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT f.id, f.lieu, f.annee, f.type, 
                 f.description, f.id_membre, f.ordre, m.prenom_usuel
                FROM formations f
                JOIN membre m ON f.id_membre = m.id
                ORDER BY f.id_membre ASC');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Formations Tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }
// ********************** PRENDRE UNE FORMATION ***********************
    public function getFormations(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT f.id, f.lieu, f.annee, f.type, 
                 f.description, f.id_membre, f.ordre, m.prenom_usuel
                FROM formations f
                JOIN membre m ON f.id_membre=m.id
                WHERE f.id_membre=:identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant)=SOUNDEX(m.prenom_usuel))
                ORDER BY f.id DESC');
            $demande->execute($donnees);
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Formations' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        // $database = null;
    }

    public function addFormations(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('INSERT INTO formations(lieu, annee, `type`, `description`,
                 id_membre, ordre)
                VALUES(:lieu, :annee, :type, :description, :id_membre, 0)');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu ajouter 'Formations' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database = null;
    }

    public function updateFormations(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE formations
                SET lieu=:lieu, annee=:annee, `type`=:type, 
                `description`=:description
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu effectuer des mises à jours !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function deleteFormations(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM formations
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu effectuer de suppression !".$e->getMessage()            
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Fonction extends Database {
    // ************************ PRENDRE TOUTES LES FONCTIONS DES PERSONNES, C'EST ITEAM-$ ***************************
    public function getAllFonction(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT f.id, f.date_debut_fonction, f.id_membre,
                 m.prenom_usuel, f.id_poste, p.nom, p.categorie
                FROM fonction f
                JOIN membre m ON f.id_membre=m.id
                JOIN poste p ON p.id=f.id_poste
                ORDER BY f.id_membre ASC');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Fonction Tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function getFonction(array $donnees): array | bool {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT f.id, f.date_debut_fonction, f.id_membre,
                 m.prenom_usuel, f.id_poste, p.nom, p.categorie
                FROM fonction f
                JOIN membre m ON f.id_membre=m.id
                JOIN poste p ON f.id_poste=p.id 
                WHERE f.id_membre=:identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant)=SOUNDEX(m.prenom_usuel))
                ORDER BY f.id');
            $demande->execute($donnees);
            $reponses=$demande->fetch(PDO::FETCH_ASSOC);
            $demande->closeCursor();
            return $reponses;
        }
        catch(PDOException $e) {
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu obtenir 'Fonction Tout' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    private function verifyFonction(array $donnees): int {
        $database=Database::db_connect();
        $demande=$database->prepare('SELECT True FROM fonction
            WHERE id_membre=:id_membre');
        $demande->execute($donnees);
        $reponses=$demande->fetch(PDO::FETCH_ASSOC);
        $demande->closeCursor();
        return (!empty($reponses)? 1 : 0);
    }

    public function addFonction(array $donnees, array $verify): int {
        try {
            $status=0;
            if($this->verifyFonction($verify) === 0) {
                $database=Database::db_connect();
                $demande=$database->prepare("INSERT INTO fonction(id_membre, id_poste)
                    VALUES(:id_membre, :id_poste)
                ");
                $demande->execute($donnees);
                $status=1;
            }
            return $status;
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu ajouter de fonction !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }

    public function updateFonction(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('UPDATE fonction
                SET id_poste=:poste
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database -> rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreu: on a pas pu mettre à jours 'fonction' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));   
        }
        $database=null;
    }

    public function deleteFonction(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM fonction 
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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

    public function getAllExperiences(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT e.id, e.nom, e.annee, e.type, e.description,
                 e.id_membre, e.ordre, m.prenom_usuel
                FROM experiences e
                JOIN membre m ON e.id_membre=m.id
                ORDER BY e.id_membre ASC');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
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

    public function getExperiences(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT e.id, e.nom, e.annee, e.type, e.description, 
                 e.id_membre, e.ordre, m.prenom_usuel
                FROM experiences e
                JOIN membre m ON e.id_membre=m.id
                WHERE e.id_membre=:identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant)=SOUNDEX(m.prenom_usuel))
                ORDER BY e.id DESC');
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
            $demande=$database->prepare('INSERT INTO experiences(nom, annee, `type`, `description`, id_membre, ordre)
                VALUES(:nom, :annee, :type, :description, :id_membre, 0)');
            $demande->execute($donnees);
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
                SET nom=:nom, annee=:annee, `type`=:type, 
                `description`=:description
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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

    public function getAllDistinctions(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT d.id, d.organisateur, d.annee, d.type, 
                 d.description, d.id_membre, d.ordre, m.prenom_usuel
                FROM distinctions d
                JOIN membre m ON d.id_membre=m.id
                ORDER BY d.id_membre ASC');
            $reponses=$demande->fetchAll(PDO::FETCH_ASSOC);
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

    public function getDistinctions(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT d.id, d.organisateur, d.annee, d.type, 
                 d.description, d.id_membre, d.ordre, m.prenom_usuel
                FROM distinctions d
                JOIN membre m ON d.id_membre=m.id
                WHERE d.id_membre = :identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ORDER BY d.id DESC');
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
            $demande=$database->prepare('INSERT INTO distinctions(organisateur, annee, `type`, 
                 `description`, id_membre, ordre)
                VALUES(:organisateur, :annee, :type,  :description, :id_membre, :ordre)
            ');
            $demande->execute($donnees);
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
                 `description`=:description, ordre=:ordre
                 WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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

    public function getAllCompetences(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT c.id, c.nom, c.liste, 
                 c.id_categorie, cc.categorie, cc.icone,
                 c.id_membre, c.ordre, m.prenom_usuel
                FROM competences c
                JOIN membre m ON c.id_membre=m.id
                JOIN categorie_competence cc ON c.id_categorie=cc.id
                ORDER BY c.id_membre ASC');
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

    public function getCompetences(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT c.id, c.nom, c.liste, 
                    c.id_categorie, cc.categorie, cc.icone,
                    c.id_membre, c.ordre, m.prenom_usuel
                FROM competences c
                JOIN membre m ON c.id_membre=m.id
                JOIN categorie_competence cc ON c.id_categorie=cc.id
                WHERE c.id_membre = :identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ORDER BY c.id DESC');
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
                VALUES(:nom, :liste, :id_categorie, :id_membre, 0)
            ');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre
            ');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre
            ');
            $demande->execute($donnees);
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
    
    public function getAllProjets(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT p.id, p.nom, p.description, p.lien,
                 p.pdc, p.id_membre, p.ordre, m.prenom_usuel
                FROM projets p
                JOIN membre m ON p.id_membre=m.id
                ORDER BY p.id_membre ASC');
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

    public function getProjets(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT p.id, p.nom, p.description, p.lien,
                 p.pdc, p.id_membre, p.ordre, m.prenom_usuel
                FROM projets p
                JOIN membre m ON p.id_membre=m.id
                WHERE p.id_membre = :identifiant 
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ORDER BY p.id DESC');
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
            $demande=$database->prepare('INSERT INTO projets(nom, `description`, lien,
                 pdc, id_membre, ordre)
                VALUES(:nom, :description, :lien, :pdc, :id_membre, :ordre)');
            $demande->execute($donnees);
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
                SET nom=:nom, `description`=:description, lien=:lien,
                 pdc=:pdc, ordre=:ordre
                WHERE id=:id AND id_membre=:id_membre
            ');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
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

    public function getAllAutres(): array {
        try {
            $database=Database::db_connect();
            $demande=$database->query('SELECT a.id, a.nom, a.lien, a.id_membre
                FROM autres a
                JOIN membre m ON a.id_membre=m.id
                ORDER BY a.id_membre ASC');
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

    public function getAutres(array $donnees): array {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT a.id, a.nom, a.lien, a.id_membre
                FROM autres a
                JOIN membre m ON a.id_membre=m.id
                WHERE a.id_membre=:identifiant
                OR (m.prenom_usuel LIKE "%:identifiant%" OR SOUNDEX(:identifiant) = SOUNDEX(m.prenom_usuel))
                ORDER BY a.id DESC');
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
                VALUES(:nom, :lien, :id_membre)');
            $demande->execute($donnees);
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
                WHERE id=:id AND id_membre=:id_membre
            ');
            $demande->execute($donnees);
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
    
    public function deleteAutres(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('DELETE FROM autres 
                WHERE id=:id AND id_membre=:id_membre');
            $demande->execute($donnees);
        }
        catch(PDOException $e) {
            $database->rollBack();
            print_r(json_encode([
                'status' => false,
                'message' => "Erreur: nous n'avons pas pu supprimer 'autres' !".$e->getMessage()
            ], JSON_FORCE_OBJECT));
        }
        $database=null;
    }
}

class Login extends Database {

    public function authentifier(array $donnees) {
        try {
            $database=Database::db_connect();
            $demande=$database->prepare('SELECT True, id, prenom_usuel, mail
                FROM membre
                WHERE (mail=:identifiant OR prenom_usuel=:identifiant) AND password=SHA2(:password, 256)
            ');
            $demande->execute($donnees);
            $reponses=$demande->fetch(PDO::FETCH_ASSOC);
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
