-- --------------------------------------------------------
-- Hôte:                         iteam-s.mg
-- Version du serveur:           10.3.31-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table ITEAMS. categorie_competence
CREATE TABLE IF NOT EXISTS `categorie_competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(150) NOT NULL,
  `icone` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.categorie_competence : ~6 rows (environ)
/*!40000 ALTER TABLE `categorie_competence` DISABLE KEYS */;
INSERT INTO `categorie_competence` (`id`, `categorie`, `icone`) VALUES
	(1, 'Mobile', 'et-mobile'),
	(2, 'Laptop', 'et-laptop'),
	(3, 'Stylo', 'et-pencil'),
	(4, 'Layers', 'et-layers'),
	(5, 'shield', 'et-shield'),
	(6, 'parametre', 'et-gears');
/*!40000 ALTER TABLE `categorie_competence` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. competences
CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `liste` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_competences_membre` (`id_membre`),
  KEY `FK_competences_categorie_competence` (`id_categorie`),
  CONSTRAINT `FK_competences_categorie_competence` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_competence` (`id`),
  CONSTRAINT `FK_competences_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COMMENT='•Langage informatique: C, JavaScript, Python, PHP\r\n•Framework et technologies: React.js, Jquery, Redux\r\n•Bases de données: MySQL\r\n•OS: Ubuntu-Manjaro-Archlunix-lunixlite /Windows.\r\n•Autres Outils maîtrisés: VMware, Virtual Box, GNS3, Git.';

-- Listage des données de la table ITEAMS.competences : ~66 rows (environ)
/*!40000 ALTER TABLE `competences` DISABLE KEYS */;
INSERT INTO `competences` (`id`, `nom`, `liste`, `id_categorie`, `id_membre`) VALUES
	(1, 'Langages informatiques ', 'PYTHON, JS, PHP, BASH, DART', 3, 1),
	(2, 'Outils Technologique', 'Git, Docker, Ansible, Nagios', 2, 1),
	(3, 'Administration Serveurs', 'Debian, Ubuntu, CentOS', 6, 1),
	(4, 'Frameworks', 'Flutter, VueJS, JQuery, Electron, Flask, Django, Selenium', 1, 1),
	(5, 'Base de Données', 'MySQL, SQLite, Postgres, Oracle, SQLServer', 4, 1),
	(6, 'Interpersonelles', 'Adaptatif, Sens du Collectif, Curieux, Persévérant', 5, 1),
	(7, 'Langages Informatiques', 'PHP, CSS, HTML, DART', 3, 7),
	(8, 'Frameworks', 'Flutter', 1, 7),
	(9, 'Gestion de Base de Données', 'MySQL, Oracle', 4, 7),
	(10, 'Interpersonelles', 'Curieux, Créatif, Innovant, Sérieux, Organisé', 5, 7),
	(11, 'Linguistique', 'Malagasy, Français, Anglais', 3, 16),
	(12, 'Bureautique', 'Word, Excel, Powerpoint', 2, 16),
	(13, 'Interpersonnelles', 'Créative,  Sérieuse, Curieuse, Sens de l\'écoute', 5, 16),
	(14, 'Framework', 'bootstrap', 1, 8),
	(16, 'Outils technologique', 'Git', 2, 8),
	(17, 'Langages informatiques', 'HTML, CSS, PHP, SQL, JAVASCRIPT', 3, 8),
	(18, 'Base de données', 'MySql, oracle', 4, 8),
	(19, 'Interpersonelles', 'adaptif, curieuse, débrouilleuse, active', 5, 8),
	(20, 'Linguistique', 'Français, Anglais, Malagasy', 3, 8),
	(21, 'Bureautique', 'Word, Excel, Powerpoint', 2, 8),
	(22, 'Languages informatiques', 'Python, C , JavaScript, PHP, Bash', 3, 2),
	(23, 'Frameworks', 'ElectronJS, KivyMD, Flask, React Native, Selenium, VueJS', 1, 2),
	(24, 'Outils technologiques', 'Docker, Git, SSH, VirtualBox, Filezilla', 2, 2),
	(25, 'Bases de données ', 'MySQL, MongoDB</br>HeidiSQL, Phpmyadmin', 4, 2),
	(26, 'Bureautiques', 'Word, Excel, PowerPoint, Photoshop', 5, 2),
	(27, 'OS utilisés', 'Win10 / Linux Lite - Manjaro - Fedora', 6, 2),
	(28, 'Bureautique', 'Word, Excel, Powerpoint', 2, 13),
	(29, 'Base de données', 'MySQL, PostgreMySQL', 4, 13),
	(30, 'Langages informatiques', 'HTML, CSS, PHP, SQL, JAVASCRIPT, PYTHON, C', 3, 13),
	(31, 'Frameworks', 'Bootstrap, Laravel, Angular, VueJS', 1, 13),
	(32, 'Outils technologique', 'Git, Filezilla', 2, 13),
	(33, 'Interpersonelles', 'Sociable, Curieuse, Sérieuse, Adaptif', 5, 13),
	(34, 'Linguistique', 'Malagasy, Français, Anglais', 3, 28),
	(35, 'Bureautique', 'Word, Excel, Powerpoint', 2, 28),
	(36, 'Interpersonelles', 'Curieux, Créatif, Innovant, Sérieux, Organisé', 5, 28),
	(37, 'Outils Technologique', 'Photoshop, Vegas Pro, Canva, InDesign, Ilustrator', 2, 28),
	(38, 'Langages informatiques', 'PHP, Python, SQL, JavaSript, HTML, CSS', 3, 19),
	(39, 'Framework', 'Laravel, Symphony, Django, VueJS, Flask', 6, 19),
	(40, 'Outils technologiques', 'Git, Filezilla, Jmerise', 2, 19),
	(41, 'Base de donnée', 'MySQL, SQLite, Postgres, MongoDB', 4, 19),
	(42, 'Bureautique', 'Word, Excel, Powerpoint, Photoshop', 2, 19),
	(43, 'Linguistiques', 'Anglais, Français, Malagasy, Espagnol', 3, 19),
	(44, 'Interpersonnelle', 'Curieuse, Autodidacte, Sociable, Esprit d\'adaptation', 5, 19),
	(45, 'Interpersonnelles', 'sociable, curieux,  créatif, réactif,  sens du collectif', 5, 17),
	(46, 'Langage informatique', 'Python, Javascript, PHP,  Dart ', 2, 17),
	(47, 'Frameworks', 'Jquery , Electron, Selenium , Flask , ExpressJs , NodeJs', 3, 17),
	(48, 'Base de données', 'Postgres , Mysql, Oracle , SQLServer', 4, 17),
	(49, 'ERP', 'Odoo', 5, 17),
	(50, 'Outils téchnologique', 'Jmerise, Filezilla,  Git, HeidiSQL,  Gimp', 6, 17),
	(52, 'Langage informatique', 'JS, PHP, PYTHON, JAVA, C++', 2, 9),
	(53, 'Framework', 'Sails Js, Laravel, Symfony', 4, 9),
	(54, 'Administration base de données', 'Mongodb, MySQL, Postgresql, SQLite', 5, 9),
	(55, 'Développement Node.js', 'Express', 3, 9),
	(56, 'Système d\'exploitation', 'Linux, Windows', 6, 9),
	(57, 'Accés à distance', 'SSH', 1, 9),
	(58, 'Langages Informatiques', 'HTML5, CSS3, JS, PHP', 3, 35),
	(59, 'Frameworks', 'ReactJS, Bootstrap', 4, 35),
	(60, 'OS', 'Windows 10, Ubuntu 20.04', 6, 35),
	(62, 'Linguistique', 'Malagasy, Français, Anglais', 3, 31),
	(63, 'Bureautique', 'Word, Excel, Powerpoint, Access', 2, 31),
	(64, 'Interpersonelles', 'Ambitieux, Cultivé, Curieux, Sociable, Autoditacte', 5, 31),
	(65, 'Langages informatiques', ' C, JavaScript, Python, PHP', 2, 37),
	(66, 'Framework et technologies', 'React.js, Jquery, Redux', 3, 37),
	(67, 'Bases de données', ' MySQL,MongoDB', 4, 37),
	(68, 'OS', ' Ubuntu-Manjaro-Arch Linux-Linuxlite /Windows', 6, 37),
	(69, 'Autres Outils maîtrisés', 'VMware, Virtual Box, GNS3, Git', 5, 37);
/*!40000 ALTER TABLE `competences` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. equipe
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.equipe : ~4 rows (environ)
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` (`id`, `nom`) VALUES
	(1, 'UI & UX'),
	(2, 'Qualité & Exploitation'),
	(3, 'Back-Office'),
	(4, 'Admin');
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text DEFAULT NULL,
  `annee` varchar(50) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_membre` (`id_membre`),
  CONSTRAINT `FK_experiences_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.experiences : ~50 rows (environ)
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` (`id`, `nom`, `annee`, `type`, `description`, `id_membre`) VALUES
	(1, 'iTeam-$', '2020 - ...', 'Fondateur & Leader (Decembre 2020 - ...)', '- Creation de l\'association </br>- Lead Developpeur</br>- Gestion des projets</br>- Gestion des equipes', 1),
	(2, 'Comdata', '2020 - ...', 'Alternant Exploitation (Mai 2020 - ...)', '- Traitements  tickets clients sur les outis en production </br>- Création des outils d\'automatisation</br>- Optimisations des serveurs de production ', 1),
	(3, 'Kayllah Bot Search ', '2020 - ...', 'Administrateur Bot Messenger (Mai 2020-...)', '- Conception & Developpement</br>-Administration Serveur de production', 1),
	(4, 'Bailti', '2020 - 2021', 'Developpeur (Novembre 2020 - Mars 2021)', '- Creation d\'outils d\'Automatisation. </br> - Creation d\'outils de tests fonctionnels ', 1),
	(6, 'Freelancer', '2019-2020', 'Developpeur', '- Application Mobie Gestion de Magasin </br>- Application Desktop : Fiche Metier, Gestion de Stock, Taches ', 1),
	(7, 'IBONIA', '2020', 'Stagiaire', '-Stage d’observation en entreprise</br>-Assimilation du quotidien du métier de développeur.', 7),
	(8, 'BOCASAY', '2020', 'Stagiaire', 'Stage de découverte d’une vie en entreprise et façon de\r\ntravailler-', 7),
	(9, 'ESTI', '2019', 'Projets Scolaires', '- Serveur d\'Appel VoIp avec IVR lié à une base de données<br>\r\n- Serveur Samba administré via Web <br>\r\n- Application Multi-Platforme Gestion de Foyer <br>\r\n- Site Web de vente de jeux en ligne <br>\r\n- Application connectée à une plante avec systèmes de notifications', 1),
	(10, 'Passion 4 Humanity', '2018', 'Stage d\'imprégnation (Mai 2018 - Juillet 2018)', 'Decouverte du metier de l\'IT en entreprise', 1),
	(11, 'MCI Tanjombato', '2020', 'Steward', '-Job étudiant durant le Salon de l\'éxpo 2020', 7),
	(12, 'iTeam-S', '2020-...', 'developpeur', '-Testeur d\'application</br>-Intégrateur', 7),
	(13, 'iTeam-$', '2020 - ...', 'Responsable juridique (Decembre 2020-...)', '  - Elabroation & Redaction statut de l\'association <br>\r  - Chargée de légalisation<br>\r  - Elaboration du reglement intérieure <br>\r  - Examination des projets côtés juridiques', 16),
	(14, 'Tribunal de 1ère instance <br> Mampikony', '2019', 'Stagiaire (Août 2019 - Septembre 2019)', '- Rapport de l\'audience<br>\r- Redaction d\'une requête introductive d\'instance', 16),
	(15, NULL, '2018-2019', 'Tresorière', '- Tresorière club <br>- Tresorière Foyer', 16),
	(16, 'Tribunal de 1ère instance <br>Antananarivo', '2018', 'Stage d\'observation', '- Decouverte du metier d\'un juge', 16),
	(17, 'iteam-$', '2020', 'développeuse', '-développeuse front end et base de donnée</br>-Intégrateur', 8),
	(18, 'BOCASAY', '2020', 'Stagiaire', 'stage de découverte et initiation en entreprise', 8),
	(19, 'Agence Immobilière DIANA', '2020', 'Stagiaire', 'stage de découverte et initiation en entreprise', 8),
	(20, 'PROGRAMME SESAME', '2020', 'Stagiaire', 'stage de découverte et initiation en entreprise', 8),
	(21, 'PHAEL FLORE EXPORT', '2020', 'Stagiaire', 'stage de découverte et initiation en entreprise', 8),
	(22, 'EDUCMAD', '2020', 'Stagiaire', 'stage de découverte et initiation en entreprise', 8),
	(23, 'iTeam-s', '2020-2021', 'Co-fondateur & Développeur (Dec 2020 - ...)', '- En charge des tâches principales de l\'organisation</br>\r\n- Conseillers technologiques et concepteur d\'idée pour les nouveaux projets</br>\r\n- Résponsable du bon fonctionnement des serveurs et des outils', 2),
	(24, 'Supermarche.mg', '2021', 'Développeur Wordpress ( Mai 2021 - ... )', '- Responsable du bon fonctionnement du Site Web </br> - En charge l\'implémentation de nouvelles fonctionalités via les plugins', 2),
	(25, 'iTeam-s', '2020-2021', 'Développeuse', 'Développeur back-end du site de i-team', 13),
	(26, 'API-NESS', '2019', 'Stagiaire', 'Stage d\'observation en entreprise : création d\'un site vitrine, vérification des sites web et rédactions de page web', 13),
	(29, 'LOMAY TECH', '2019', 'Stage d’imprégnation ( Oct 2019 )', '- Découvertes de l’environnement de travail d’un développeur</br>\r\n- Apprenti concepteur d\'environnement 3D avec Unreal Engine', 2),
	(30, 'Infinity Créative', '2019', 'Formateur bénévole en Gamedev ( Oct 2019 )', '- Former des jeunes durant l’évènement GameLoad</br>- Animer l\'évènement avec les jeux vidéo et les jeux grandeurs natures', 2),
	(31, 'ITeam-$', '2020-...', 'développeuse', '-Membre de l\'association des développeurs SESAME</br> -Contribution à la réalisation de projet de développement web et d\'application', 19),
	(32, 'Etech', '2021', 'Intégrateur', '-Job étudiant à temps partiel </br> -Intégrations de produit et MAJ avec odoo', 19),
	(33, 'NewMan\'S Technology', '2019', 'Stagiaire', '-Stage d’observation en entreprise</br>-Assimilation du quotidien du métier de développeur.', 19),
	(34, 'Smiley Shooting', '2019-2020', 'Community Manager', '-Mise en pace d\'une nouvelle branche de département <br>\r\n-Mise en pace d\'un plan de communication <br>\r\n-Etudes des marchés \r\n', 28),
	(35, 'Passion 4 Humanity', '2018', 'Stage d\'imprégnation (Mai 2018 - Juillet 2018)', 'stage de découverte et initiation en entreprise', 28),
	(36, 'Ingenosya', '2020- ...', 'Alternant developpeur Odoo', '-Concepiton et modélisation de module customisé </br> -Intégration des différents modules  natifs (community&enterprise)', 17),
	(37, 'iTeam-$', '2020-...', 'Developpeur ', '-Developpeur Back-end </br> -Administrateur de la base de donnée. </br> -Création de scripts d\'automatisation(scrapping, bot Messenger)', 17),
	(38, 'iTeam-$ Bot-crush', '2020-...', 'Administrateur Bot Messenger', '- Conception & Developpement </br> -Administation du serveur', 17),
	(39, 'eTech', '2020-...', 'Chargé de catalogue et Intégration', '-Intégration des nouvelles articles </br> -Mise à jour des prix , photos , fournisseur </br> -Traitement d\'images', 17),
	(40, 'Passion For Humanity', '2019-2019', 'Stagiaire (Novembre 2019)', 'Découverte du métier du domaine du digital en enteprise.', 17),
	(41, 'BPO Concept', '2021 - ...', 'Développeur Node.js et administrateur base de données', '- Création API avec Express-js </br> - Conception base de données Mongodb </br> - Administrateur serveur sur infomaniak', 9),
	(42, 'ITeam-$', '2020 - ...', 'Principal Developer', '- Responsable équipe Back-office </br> - Conception base de données </br> - Réaliser un cahier de charge', 9),
	(43, 'Easytech', '2020 - 2021', 'Développeur web', '- Développement site web avec Sails Js et PHP </br> - Conception base de données avec Postgresql </br> - Analyser la demande clients', 9),
	(44, 'Passion For Humanity', '2018', 'Stage d\'imprégnation', '- Découverte de l\'entreprise et le métier d\'un développeur et administrateur réseau', 9),
	(45, 'iTeam-$', '2021', 'Développeur', '- Développeur Front End', 35),
	(46, 'Ophir', '2020 - ', 'Développeur et Designer', '- Développement du site web d\'Ophir <br/> - Création de flyers pour les voyages touristiques d\'Ophir', 35),
	(47, 'iTeam-$', '2021 - ...', 'Consultant administratif', '- Etude de marché <br> - Réalisation prévisions financières <br> - Mise en place business plan <br> - Réalisation business model', 31),
	(48, 'SmartOne', '2021', 'Stagiaire Département Production <br>(janvier - mars)', '- Analyse de la stratégie de production <br> - Proposition d\'amélioration des processus', 31),
	(49, 'SmartOne', '2019', 'Stagiaire Département Finance <br> (juillet - septembre)', '- Initiation au concepet de contrôle interne <br> - Etude de la gestion des risques', 31),
	(50, 'IST-T', '2019', 'Concours de débat universitaire en Anglais', '- Représentant de l\'Institut Supérieur de Technologie d\'Antananarivo <br> - Demi-finaliste', 31),
	(51, 'Programme SESAME', '2018', 'Président du Bureau Des Etudiants', '- Représenter les étudiants auprès de la Direction <br> - Médiation', 31),
	(53, 'Coder Dojo- Fianarantsoa', '2020-..', 'Formateur en Développement Web', '-Former  des jeunes Lycéens sur le developpement web', 37),
	(54, 'TELMA Madagascar', '2019', 'Stage d\'imprégnation(Octobre 2019)', '-Découverte du monde du travail d\'un developpeur', 37);
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. fonction
CREATE TABLE IF NOT EXISTS `fonction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_fonction` datetime NOT NULL DEFAULT '2020-11-20 00:00:00',
  `date_fin_fonction` datetime DEFAULT NULL,
  `id_membre` int(11) NOT NULL DEFAULT 0,
  `id_equipe` int(11) NOT NULL DEFAULT 0,
  `id_poste` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_fonction_membre` (`id_membre`),
  KEY `FK_fonction_equipe` (`id_equipe`),
  KEY `FK_fonction_poste` (`id_poste`),
  CONSTRAINT `FK_fonction_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`),
  CONSTRAINT `FK_fonction_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  CONSTRAINT `FK_fonction_poste` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.fonction : ~33 rows (environ)
/*!40000 ALTER TABLE `fonction` DISABLE KEYS */;
INSERT INTO `fonction` (`id`, `date_debut_fonction`, `date_fin_fonction`, `id_membre`, `id_equipe`, `id_poste`) VALUES
	(6, '2020-11-20 00:00:00', NULL, 2, 2, 5),
	(7, '2020-11-20 00:00:00', NULL, 3, 1, 5),
	(8, '2020-11-20 00:00:00', NULL, 4, 1, 5),
	(10, '2020-11-20 00:00:00', NULL, 5, 1, 5),
	(12, '2020-11-20 00:00:00', NULL, 6, 2, 5),
	(13, '2020-11-20 00:00:00', NULL, 7, 3, 5),
	(14, '2020-11-20 00:00:00', NULL, 8, 3, 5),
	(15, '2020-11-20 00:00:00', NULL, 9, 3, 6),
	(16, '2020-11-20 00:00:00', NULL, 10, 1, 5),
	(17, '2020-11-20 00:00:00', NULL, 11, 2, 5),
	(18, '2020-11-20 00:00:00', NULL, 12, 1, 5),
	(19, '2020-11-20 00:00:00', NULL, 13, 3, 5),
	(21, '2020-11-20 00:00:00', NULL, 14, 3, 5),
	(22, '2020-11-20 00:00:00', NULL, 15, 1, 5),
	(23, '2020-11-20 00:00:00', NULL, 16, 4, 2),
	(24, '2020-11-20 00:00:00', NULL, 17, 2, 5),
	(25, '2020-11-20 00:00:00', NULL, 18, 2, 5),
	(26, '2020-11-20 00:00:00', NULL, 19, 3, 5),
	(28, '2020-11-20 00:00:00', NULL, 20, 1, 5),
	(29, '2020-11-20 00:00:00', NULL, 21, 1, 5),
	(30, '2020-11-20 00:00:00', NULL, 22, 3, 5),
	(35, '2020-11-20 00:00:00', NULL, 26, 4, 3),
	(36, '2020-11-20 00:00:00', NULL, 27, 2, 5),
	(37, '2020-11-20 00:00:00', NULL, 28, 4, 4),
	(38, '2020-11-20 00:00:00', NULL, 29, 4, 4),
	(39, '2020-11-20 00:00:00', NULL, 30, 4, 7),
	(40, '2020-11-20 00:00:00', NULL, 31, 4, 5),
	(42, '2020-11-20 00:00:00', NULL, 32, 1, 5),
	(43, '2020-11-20 00:00:00', NULL, 33, 3, 5),
	(44, '2020-11-20 00:00:00', NULL, 34, 3, 5),
	(45, '2020-11-20 00:00:00', NULL, 1, 2, 6),
	(46, '2020-11-20 00:00:00', '2021-05-08 11:09:37', 35, 1, 5),
	(47, '2020-11-20 00:00:00', NULL, 36, 1, 5);
/*!40000 ALTER TABLE `fonction` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. formations
CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` text DEFAULT NULL,
  `annee` varchar(20) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_membre` (`id_membre`),
  CONSTRAINT `FK_formations_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COMMENT='Cette table contient les formations de chaque membre';

-- Listage des données de la table ITEAMS.formations : ~43 rows (environ)
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
INSERT INTO `formations` (`id`, `lieu`, `annee`, `type`, `description`, `id_membre`) VALUES
	(1, 'ESTI Antananarivo', '2018 - ...', 'Réseaux & Systèmes d\'Infromations', '2021 - ... : Troisieme Année<br>\r\n2020 - 2021: Deuxieme Année<br>\r\n2018 - 2019 : Premiere Année', 1),
	(2, 'Programme SESAME', '2017-2018', 'Année Préparatoire', 'Certificat d\'etudes', 1),
	(3, 'Stella Maris ', '2016-2017', 'Terminal C', 'Baccalauréat C 2017<br> Mention Assez Bien', 1),
	(4, 'ESTI Antanimena', '2021-...', 'developpement', '-Mars 2021:Première Année', 7),
	(5, 'Programme SESAME', '2020', 'annéé preparatoire', '-Certificat de fin d\'étude</br>-Orientation pro', 7),
	(6, 'NDP Mahanoro', '2019', 'Terminal D', '-BACC série D générale</br>-BACC série D Catholique', 7),
	(7, 'Alliance Française', '2016', 'linguistique', '-DELF B1 (note:81/100)', 7),
	(8, 'UCM Antananarivo', '2018 - ...', 'Droit public', '2020 - 2021: 3ème année <br>\r2019 - 2020: 2ème année <br>\r2018 - 2019: 1ère année', 16),
	(9, 'Smile Events', '2021', 'Modèle photo, Mannequinat', 'Pose photo, défilé', 16),
	(10, 'Programme SESAME', '2018', 'Année Prépatoire', 'Certificat d\'études', 16),
	(11, 'Lycée St Pierre Miandrivazo', '2016-2017', 'Terminal A2', 'Baccalauréat mention Assez Bien', 16),
	(12, 'ESTI Antananarivo Antanimena', '2021', 'intégration et développement', 'L1 au mois de mars 2021', 8),
	(13, 'Programme SESAME', '2020', 'Année préparatoire', 'certificat détudes', 8),
	(15, 'Lycée catholique Saint Jean', '2019', 'Terminal scientifique', 'Baccalauréat D 2019<br> Mention Bien', 8),
	(16, 'coeur et conscience', '2020', 'call center', 'certificat de formation call center', 8),
	(17, 'NYC Antsiranana', '2017', 'bureautique', 'Word, Excel, Powerpoint, Internet', 8),
	(18, 'ESTI Antananarivo', '2019 - ...', 'Intégrations et développement d\'application', '2021 - ... : Deuxieme Année<br>\r\n2019 - 2021 : Premiere Année', 2),
	(19, 'Programme SESAME', '2018-2019', 'Année Préparatoire', 'Certificat d\'etudes </br>En Année préparatoire aux études universitaires', 2),
	(20, 'St Joseph de Cluny ', '2017-2018', 'Terminal C', 'Baccalauréat C 2018<br> Mention Bien', 2),
	(21, 'ESTI Antananarivo', '2019-2021', 'Intégrations et développement', '2021 : Deuxième année </br> 2019-2020 : Première année', 13),
	(22, 'Programme SESAME', '2018-2019', 'Année Préparatoire', 'Certificat d\'études ', 13),
	(23, 'Ny Sekolintsika Analamahitsy', '2017-2018', 'Terminal D', 'Baccalauréat D 2018 </br> Mention Bien', 13),
	(27, 'ESTI Antanimena', '2019-2021', 'Développement et intégration', '2020-2021: Deuxième Année de Licence</br> 2019-2020: Première Année de Licence', 19),
	(28, 'Programme SESAME', '2018-2019', 'Année préparatoire', 'Certificat de fin d\'étude, mention scientifique', 19),
	(29, 'Ste Jeanne D\'Arc ', '2017-2018', 'Terminal C', 'Baccalauréat C 2018<br> Mention Assez Bien', 19),
	(30, 'ISCAM ', '2019 - ...', 'Marketing & Communication', '', 28),
	(31, 'Programme SESAME', '2017-2018', 'Année Préparatoire', 'Certificat d\'etudes', 28),
	(32, 'Lycée Catholique <br> Sainte-Thérèse <br>Sambava', '2017', 'Terminal A', 'Baccalauréat A2 2017 <br> Mention Assez Bien', 28),
	(33, 'Lycée Saint Jean de Matha', '2017-2018', 'Terminale D', 'Baccalauréat serie D </br> Mention Bien', 17),
	(34, 'Programme SESAME', '2019', 'Année Préparatoire', 'Obtention d\'une bourse d\'étude  pour trois à l\'ESTI Antanimena.', 17),
	(35, 'ESTI Antananarivo', '2020-...', 'Licence', 'Intégration&Developpement', 17),
	(36, 'ESTI Antananarivo', '2018 - ...', 'Développement et intégration', '- 2020 - 2021: L3 </br> - 2019 - 2020: L2 </br> - 2018 - 2019: L1', 9),
	(37, 'Programme SESAME', '2017 - 2018', 'Année Préparatoire', 'Obtention bourse d\'étude et certificat', 9),
	(38, 'Saint Jean de Matha </br> Moramanga', '2010 - 2017', 'Serie D', '- Baccalauréat 2017 : mention Bien </br> - BEPC 2014', 9),
	(39, 'ISSTM Mahajanga', '2019 - ...', 'Licence', '- Licence en génie informatique', 35),
	(40, 'Programme SESAME', '2017 - 2018', 'Année préparatoire', '- Préparation à la vie universitaire', 35),
	(41, 'Saint Gabriel', '2016 - 2017', 'Terminale C', '- Baccalauréat C', 35),
	(42, 'IST-T', '2019 - ...', 'Entrepreneuriat', '2021: Diplôme de Technicien Supérieur dans le parcours Gestion Des Petites et Moyennes Entreprises', 31),
	(43, 'Programme SESAME', '2017-2018', 'Année Préparatoire', 'Certificat d\'étude', 31),
	(44, 'Lycée Techbique <br> Commerciale Ampefiloha', '2017', 'Terminal G2', 'Baccalauréat en G2 mention Très Bien', 31),
	(48, 'ENI Fianarantsoa', '2020-...', 'Licence', '-Génie Logiciel et Bases de Données', 37),
	(49, 'Programme SESAME', '2019-2020', 'Année Préparatoire', '-Certificat d\'études', 37),
	(50, 'Lycée Saint Antoine</br>Bemaneviky A/ja', '2017-2018', 'Terminale D', '-Baccalauréat D', 37);
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;

-- Listage de la structure de la procédure ITEAMS. mbr_equipe_proc
DELIMITER //
CREATE PROCEDURE `mbr_equipe_proc`(
	IN `parametre_equipe` INT
)
    COMMENT 'Procedure pour connaitre le membre d''une equipe particuliere'
BEGIN

SELECT 
	prenom_usuel, m.nom ,prenom, p.nom AS nom_poste, 
	mail, tel1, tel2, user_github, user_github_pic,
	id_poste,id_membre,f.id AS id_fonction, 
	date_d_adhesion, date_exclusion,
	date_debut_fonction,id_equipe, date_fin_fonction,
	e.nom AS nom_equipe

FROM membre m JOIN fonction f ON m.id = f.id_membre 
	JOIN poste p ON f.id_poste = p.id  
	JOIN equipe e ON f.id_equipe = e.id 

WHERE e.id = parametre_equipe
	AND m.date_exclusion IS NULL
	AND date_fin_fonction IS NULL;

END//
DELIMITER ;

-- Listage de la structure de la table ITEAMS. membre
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `prenom_usuel` varchar(50) DEFAULT NULL,
  `user_github` varchar(50) DEFAULT NULL,
  `user_github_pic` varchar(255) DEFAULT NULL,
  `tel1` varchar(50) NOT NULL,
  `tel2` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `date_d_adhesion` date NOT NULL DEFAULT curdate(),
  `date_exclusion` date DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `actif` varchar(50) DEFAULT NULL,
  `cv` text DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fonction` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pdc` varchar(255) DEFAULT './assets/img/banner.png',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `prenom_usuel` (`prenom_usuel`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.membre : ~36 rows (environ)
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id`, `nom`, `prenom`, `prenom_usuel`, `user_github`, `user_github_pic`, `tel1`, `tel2`, `mail`, `date_d_adhesion`, `date_exclusion`, `facebook`, `linkedin`, `actif`, `cv`, `adresse`, `description`, `fonction`, `password`, `pdc`) VALUES
	(1, 'BAKARY', 'Gaetan Jonathan', 'Gaetan', 'gaetan1903', 'https://avatars0.githubusercontent.com/u/43904633', '+261346178078', '+261325398496', 'gaetan.s118@gmail.com', '2020-11-21', NULL, '/gaetan1903', '/gaetan.j', '1', 'https://drive.google.com/file/d/1NXMCtsANj709AAyJa-Ii4a0uKvXqCxYs/view?usp=drivesdk', 'Ambatoroka, Antananarivo 101', 'Étudiant en L3 à l\'ESTI, Alternant à Comdata Madagascar, soutenu par le programme SESAME, passionné par le fabuleux monde de la technologie de l\'Information, voulant contribuer aux développements numériques de Madagascar.', 'Etudiant IT, Developpeur, SysAdmin, Lead Dev à iTeam-$', NULL, 'https://iteam-s.github.io/assets/img/bg-header.jpg'),
	(2, 'BOTORAVONY', 'Arlème Johnson', 'Arlème', 'rootkit7628', 'https://avatars0.githubusercontent.com/u/60097202', '+261349144933', NULL, 'arleme.dev7@gmail.com', '2020-11-21', NULL, '/arleme.scheck', '/arlème-johnson-885247177', '1', 'Arleme.pdf', 'Amboditsiry, Antananarivo 101', 'Etutiant en L2 à l\'ESTI, Alternant à Supermarché.mg</br>Un passionné d\'informatique aspirant à devenir un DevOps.</br>Jeune homme de 20 ans accompagné par le programme SESAME', 'Etudiant en IT, DevOps, Developpeur principale à iTeam-$', NULL, './assets/img/banner.png'),
	(3, 'MASY', 'Charla Rosalie', 'Charla', 'Charla19', 'https://avatars3.githubusercontent.com/u/74827706', '+261345207018', '+261324021926', 'charlap20.aps2a@gmail.com', '2020-11-21', NULL, '/Charla.Masy.R.1', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(4, 'RAFANOMEZANA', 'Herimamy Hasintso', 'Hasintso', 'hasintso2071', 'https://avatars0.githubusercontent.com/u/74848587', '+26134842395', '+261328921862', 'hasintsop20.aps2b@gmail.com', '2020-11-21', NULL, '/hasintso.fanomezana', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(5, 'HAJATIANA', 'Sitraka', 'Haja', 'Jayah001', 'https://avatars2.githubusercontent.com/u/74564160', '+261343191534', NULL, 'hajap20.aps2a@gmail.com', '2020-11-21', NULL, '/ja.yah.357', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(6, 'LIANTSOA', 'Santatriniaina Melchia', 'Melchia', 'mel1742', 'https://avatars0.githubusercontent.com/u/74960132', '+261325807057', '+261345616018', 'melchiap20.aps2b@gmail.com', '2020-11-21', NULL, '/liantsoa.Mel', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(7, 'RANRIAMANANTENA', 'Dominick Grégoire', 'Dominick', 'c3k4ah', 'https://avatars2.githubusercontent.com/u/73609825', '+261344459916', NULL, 'dominickp20.aps1b@gmail.com', '2020-11-21', NULL, '/Dominick.Cekah', '/randriamanantena-dominick-2238351ab/', '1', 'DOMINICK.pdf', 'Tanjombato, Antananarivo 101', 'Originaire de Mahanoro. Je suis passionné par l\'informatique et développement. Quelqu\'un de dynamique et toujours prêt à apprendre.', 'Etudiant en informatique,Développeur à ITeam-s', NULL, './assets/img/banner.png'),
	(8, 'DIDIER', 'Nazirah Milann', 'Nazirah', 'naziradidier', 'https://avatars1.githubusercontent.com/u/74833519', '+261348146430', '+261324828979', 'nazirap20.aps1b@gmail.com', '2020-11-21', NULL, '/profile.php?id=100050072618194', NULL, '1', NULL, 'Ankadifotsy BEFELANTANANA', 'Je viens de la region DIANA. Etudiante à ESTI, je suis la filière intégration et développement. Je suis intérésé par les nouvelles technologies.', 'Etudiante en intégration et développement, développeuse front end et base de donnée à iTeam-$', NULL, './assets/img/banner.png'),
	(9, 'MIHAINGOHERILANTO', 'Manambintsoa', 'Ntsoa', 'ntsoa2112', 'https://avatars2.githubusercontent.com/u/49555661', '+261346664788', NULL, 'ntsoa.s118@gmail.com', '2021-01-13', NULL, '/manambintsoa.mihaingoherilanto.1', '/manambintsoa-mihaingoherilanto-69ab63202/', '1', 'MIHAINGOHERILANTO Manambintsoa.pdf', 'VF100 Ankorahotra', 'Issu du programme d\'études SESAME , développeur web et administrateur base de données, j\'étudie actuellement à l’École Supérieure des Technologies de l\'Information en L3. </br> Soif d\'apprendre et aime également partager les connaissances acquises. </br> Personnalité: mature, persévérant, respectueux, fiable', 'Développeur Node.js et administrateur base de données', NULL, './assets/img/banner.png'),
	(10, 'RASENDRANIRINA', 'Manankoraisina Landry', 'Landry', 'Landris18', 'https://avatars3.githubusercontent.com/u/47665507', '+261329903072', '+261347416068', 'landry.apsa@gmail.com ', '2020-11-21', NULL, '/Landris18', NULL, '1', NULL, 'Ambatoroka, Antananarivo 101', 'Jeune étudiant en informatique soutenu par le programme SESAME, en recherche d\'opportunité, voulant intégrer le domaineet y apporter des innovations', 'Développeur Angular/Django, DevOps, Développeur principal à iTeam-$', NULL, 'https://iteam-s.github.io/assets/img/bg-header.jpg'),
	(11, 'LALANIAINA ', 'Jonquille Sonïa', 'Sonïa', 'Jonquille20', 'https://avatars0.githubusercontent.com/u/74913797', '+261325807057', '+261345616018', 'soniap20.aps2b@gmail.com ', '2020-11-22', NULL, '/profile.php?id=100007363098471', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(12, 'RATODISOA', 'Emmanuel Xavier', 'Xavier', 'xavier-001', 'https://avatars1.githubusercontent.com/u/74898540', '+261349072588', NULL, 'xavierp20.aps1b@gmail.com', '2020-11-23', NULL, '/ratodisoa', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(13, 'ANONA', 'Tréal Darcia', 'Darcia', 'Darcia2125', 'https://avatars3.githubusercontent.com/u/64003085', '+261349688133', NULL, 'darciap19.aps2a@gmail.com', '2020-11-24', NULL, '/trealdarcia.anona', '/tréal-darcia-anona-4396a1182/', '1', 'CV ANONA Tréal Darcia.pdf', 'Ankazomanga, Antananarivo 101', 'Etudiante en L2 à l\'ESTI et membre du programme SESAME.</br> Sociable, Sérieuse et en quête d\'opportunité', 'Etudiante en IT, Développeur à ITeam-s', NULL, './assets/img/banner.png'),
	(14, 'MALALANIRINA', 'Sarino', 'Sarino', 'Sarino22Y', 'https://avatars2.githubusercontent.com/u/74770148', '+261343891815	', NULL, 'sarino.malalanirina@esti.mg', '2020-11-24', NULL, '/irison.radriamampionona', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(15, 'RAKOTOARINAIVO ', 'Diamondra Fandresena Fanomezantsoa', 'Dama', 'amada10', 'https://avatars3.githubusercontent.com/u/67158208', '+261345648425', NULL, 'diamondrap20.aps1b@gmail.com', '2020-11-21', NULL, '/dama.rktvo', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(16, 'KETSASON RAZAFIMALALANIRINA	 ', 'Jerry Princia', 'Princia', 'jerryprincia0103', 'https://avatars3.githubusercontent.com/u/75218166', '+261347519067', '+26132809162', 'jerryprinciaketsason@gmail.com ', '2020-11-24', NULL, '/princia.durhane', NULL, '1', NULL, 'Ambanidia ,  Antananarivo 101', 'Etudiante en droit  public L3 à l\'UCM, je suis passionnée par le monde juridique et interessée par la photographie.', 'Etudiante en droit public, Responsable juridique iTeam-$', NULL, './assets/img/banner.png'),
	(17, 'RAJAOANARIVONY', 'Rivo Lalaina', 'Rivo', 'rivo2302', 'https://avatars2.githubusercontent.com/u/59861055', '+261340921107', NULL, 'rivo.rajaonarivony@esti.mg', '2020-11-24', NULL, '/rivolalaina.rajaonarivony', '/', '1', NULL, 'Ankorahotra,  Antananarivo 101', 'Grâce au soutien de programme SESAME, je suis actuellement étudiant à l\'ESTI en intégration et développement. Certain que demain l\'informatique sera incontournable, je m’intéresse à tout ce qui est nouvelle technologie, ainsi contribuer au développement de mon pays.', 'Etudiant en  IT , Developpeur à INGENOSYA , Developpeur à  iTeam-$ ,19 Ans', NULL, './assets/img/banner.png'),
	(18, 'RAJERISON', 'Fabien Julio', 'Fabien', 'fabienjulio', 'https://avatars3.githubusercontent.com/u/66438909', '+261347581123', '+261345256857', 'fabienjulio5@gmail.com', '2020-11-25', NULL, '/fabienjulio.riley', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(19, 'RAVOLOLONIRINA ', 'Josée Angela', 'Angela', 'joseeange04', 'https://avatars3.githubusercontent.com/u/72744818', '+261348154191	', '+261324042310', 'ravololonirinap19.aps1a@gmail.com', '2020-11-25', NULL, '/profile.php?id=100007167015806', '/angelaravololonirina', '1', NULL, 'Ankazomanga, Antananarivo 101', 'Tout en étant passionnée par la technologie et dotée d\'une grande curiosité, je me présente en tant que solution pour l\'entreprise.</b> Actuellement, en L2 à l\'ESTI avec le parcours de développement et intégration, je suis prête à relever le défi.', 'Etudiante en IT, Developpeuse ITeam-s', NULL, './assets/img/banner.png'),
	(20, 'HERISON', 'Tonny Jacklin', 'Tonny', 'tonny-herison', 'https://avatars1.githubusercontent.com/u/47519091', '+261347833078', NULL, 'hartonnyjack@gmail.com', '2020-11-24', NULL, '/tonyjack.herison', '(NULL)', '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(21, 'TSIAZONAVO', 'Maminkasina Arielle', 'Arielle', 'arielle-i15', 'https://avatars1.githubusercontent.com/u/75167731', '+261347998851', NULL, 'ariellep20.aps1a@gmail.com ', '2020-11-21', NULL, '/maminkasn.iata', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(22, 'ANDRIAMASY', 'Miadantsoa Salema', 'Salema', 'salema02', 'https://avatars3.githubusercontent.com/u/72653798', '+261349962221', NULL, 'salemap19aps1b@gmail.com', '2020-11-25', NULL, '/miadantsoasalema.andriamasy', '/andriamasy-miadantsoa-salema-0b8b2a182/', '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(23, 'RAJAONARIVELO', 'Joyo Richard', 'Joyo', 'JoyoRichard007', 'https://avatars1.githubusercontent.com/u/75166100', '+261325679345', NULL, 'joyop20.aps2b@gmail.com', '2020-11-21', '2021-01-25', '/joyorichard.rajaonarivelo', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(25, 'RAVELONARIVO', 'Lahatra Anjara', 'Lahatra', 'Lahatra3', 'https://avatars0.githubusercontent.com/u/75166341', '+261349570401', NULL, 'lahatrap20.aps2a@gmail.com', '2020-11-21', NULL, '/lahatra.ravelonarivo.1', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(26, 'ANDRIANANTENAINA', 'Rojo Valisoa', 'Rojo', 'RojoValisoa', 'https://avatars0.githubusercontent.com/u/36554948', '+261342873991', NULL, 'rojo.valisoa.andrianantenaina@esti.mg', '2020-12-02', NULL, '/rojo.valisoa.6969', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(27, 'RAKOTOARISOA ', 'Louis Sergio', 'Sergio', 'Sergio22-hub', 'https://avatars3.githubusercontent.com/u/77189630', '+261345789245', '+261322539004', 'sergiop20.aps1b@gmail.com', '2021-01-09', NULL, '/sergio.kenns', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(28, 'RAODISY ', 'Bertilo', 'Bertilo', 'KronosSBK', 'https://avatars2.githubusercontent.com/u/50701754', '+261345614497', '+261328893425', 'rds.bertilo@gmail.com', '2020-12-20', NULL, '/bertilo.rds', NULL, '1', 'Bertilo.pdf', 'Mahazoarivo Ambohitsoa, Antananarivo 101', 'Actuellement en 2è année de Licence à l\'ISCAM suivant le parcours Marketing & Comunication et passionné par le Multimédia ', 'Etudiant en Marketing & Communication, Responsable Communication Digital', NULL, './assets/img/banner.png'),
	(29, 'MAEVASOA', 'Fabiola', 'Fabiola', 'Fmaevasoa', 'https://avatars3.githubusercontent.com/u/77198599', '+261349959652', '+261325781200', 'Fabiolamaevasoa@gmail.com', '2021-01-10', NULL, '/maeva.sue', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(30, 'ANDRIMBOLOLONIRINA ', 'Dewa Miarana', 'Miarana', 'miadewa', 'https://avatars0.githubusercontent.com/u/76114659', '+261343680585', NULL, 'miarana.s217@gmail.com', '2021-01-10', NULL, '/miarana.dewa', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(31, 'ANDRIANINA FITIA', 'Tovonirina Tsiory', 'Tsiory', 'TsioryFitia-boop', 'https://avatars0.githubusercontent.com/u/77095510', '+261340397390', '+261322747127', 'tsioryfitia.apl218@gmail.com', '2021-01-10', NULL, '/tsiory.fitia.547', NULL, '1', NULL, 'Ambohimirary Antananarivo, 101', 'Etudiant en 3 ème année à l\'IST-T dans la filière Management de Projet et Création d\'Entreprises, le monde des affaires m\'a toujours passionné. Cette passion combinée à mon caractère ambitieux me motivent à relever chaque défi dont je fais face et à persévérer pour atteindre mes objectifs.\r\n', 'Etudiant en management, Consultant administratif à iTeam-$', NULL, './assets/img/banner.png'),
	(32, 'NIRIKOMAMY ', 'Bruollin', 'Bruollin', 'Bruollin', 'https://avatars2.githubusercontent.com/u/38380899', '+261342102081', NULL, 'bruollin.s118@gmail.coùm', '2021-01-14', NULL, '/nirikomamy.bruollin', NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(33, 'SOLOFOANDRAINDRAINA', 'Bienvenue Nathalie', 'Nathalie', 'nathalieandrandraina', 'https://avatars.githubusercontent.com/u/37831400', '+261344504209', NULL, 'nathalie.aps.p2@gmail.com', '2021-01-25', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(34, 'RABE', 'Marcellin', 'Marcellin', 'marcellinp20', 'https://avatars.githubusercontent.com/u/75126543', '+261349394698', NULL, 'marcellinp20.aps1a@gmail.com', '2021-01-25', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(35, 'TOMBOZAFY', 'Ianel', 'Ianel', 'Ianel', 'https://avatars.githubusercontent.com/u/48760301', '+261328178421', '+261348568513', 'ianell.s118@gmail.com', '2021-05-08', NULL, '/ianel.tombozafy', '/ianel.tombozafy', '1', '35.pdf', 'Tanambao Ambalavato, Mahajanga 401', 'Suivant le parcours génie informatique au niveau de l\'ISSTM, je me touve actuellement en 2eme année de Licence. Mon ambition est de devenir développeur front-end et de créer des produits utiles et utilisables par le grand public.', 'Etudiant en IT, Développeur Front End', NULL, './assets/img/banner.png'),
	(36, 'Randriamanantenana', 'Tafitasoa Fabrice', 'Fabrice', 'Tafita1339', 'https://avatars.githubusercontent.com/u/83877497', '+261346668165', NULL, 'fabricep19.aps1a@gmail.com', '2021-05-11', NULL, '/tafitasoafabrice.randriamanantena.98', NULL, '1', NULL, NULL, NULL, NULL, NULL, './assets/img/banner.png'),
	(37, 'RAMAMIHARIVELO', 'Marihasina', 'Hasina', 'hasina821', 'https://avatars.githubusercontent.com/u/80751503', '+261342324391', NULL, 'rmnarry.mr@gmail.com', '2021-06-07', NULL, '/hasinarak.benaden', '/marihasina-ramamiharivelo-529344181/', '1', NULL, 'Sohatsihadino Fianarantsoa, 301', 'Etudiant L1 à l’ENI Fianarantsoa, un jeune motivé, dévoué et curieux surtout dans tout ce qui est technologie. Je suis prêt à relever de grands défis et prêt à tout faire pour assouvir ma convoitise de devenir un grand développeur.', 'Etudiant en IT,Développeur à ITeam-s', NULL, './assets/img/banner.png');
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. mission_equipe
CREATE TABLE IF NOT EXISTS `mission_equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) NOT NULL,
  `mission` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.mission_equipe : ~15 rows (environ)
/*!40000 ALTER TABLE `mission_equipe` DISABLE KEYS */;
INSERT INTO `mission_equipe` (`id`, `id_equipe`, `mission`) VALUES
	(1, 1, 'Mettre en place l\'apparence utilisateur et assurer l\'expérience utilisateur.'),
	(2, 1, 'Réaliser les maquettes Web, Mobile et Desktop'),
	(3, 1, 'Apporter les images décoratifs, logo, icones, thèmes et les palettes de couleurs de tous les plateformes'),
	(4, 1, 'Assurer la mise en place des données sur la vue utilisateur'),
	(5, 2, 'Revoir et Assurer la qualité de chaque code écrit (redondance, Normalisation, Performance, Amelioration, ...)'),
	(6, 2, 'Ajouter des touches de perfections à chaque production'),
	(7, 2, 'Automatisation avec la création des divers outils'),
	(8, 2, 'Déployer et Assurer le bon fonctionnement en production'),
	(9, 2, 'Assurer la sécurité des données, du code, ainsi que la production	'),
	(11, 2, 'Prendre toute charge technique non lié aux autres equipes'),
	(12, 3, 'Faire la conception et la modélisation des données)'),
	(13, 3, 'Études des cas d\'utilisation et les différentes fonctionnalités de l\'application'),
	(14, 3, 'Assure le développement et la maintenance du back-end de l\'application'),
	(15, 3, 'Prend en charges la création et l\'administration de la base de données'),
	(16, 3, 'Répondre aux besoins traitements des autres equipes.');
/*!40000 ALTER TABLE `mission_equipe` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. poste
CREATE TABLE IF NOT EXISTS `poste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.poste : ~7 rows (environ)
/*!40000 ALTER TABLE `poste` DISABLE KEYS */;
INSERT INTO `poste` (`id`, `nom`) VALUES
	(1, 'Responsable Equipe'),
	(2, 'Responsable Juridique'),
	(3, 'Responsable Projet'),
	(4, 'Communication Digitale'),
	(5, 'Développeur'),
	(6, 'Lead Developer'),
	(7, 'Responsable Administration');
/*!40000 ALTER TABLE `poste` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. Traduction
CREATE TABLE IF NOT EXISTS `Traduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cle` varchar(100) DEFAULT NULL,
  `fr` text DEFAULT NULL,
  `en` text DEFAULT NULL,
  `mg` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cle` (`cle`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.Traduction : ~32 rows (environ)
/*!40000 ALTER TABLE `Traduction` DISABLE KEYS */;
INSERT INTO `Traduction` (`id`, `cle`, `fr`, `en`, `mg`) VALUES
	(1, 'bienvenue', 'Bienvenue', 'Welcome', 'Tongasoa'),
	(2, 'se_connecter', 'Se  Connecter', 'Log in', 'Hiditra'),
	(3, 'mot_de_passe_oubliee', 'Mot de passe oublié', 'Forgot password', 'Hadino ny teny miafina'),
	(4, 'mot_de_passe_incorrecte', 'Mot de passe incorrect', 'Wrong password', 'Diso ny teny miafina'),
	(5, 'vous_devez_d_abord_vous_connecter', 'Vous devez d\'abord vous connecter.', 'You must login first.', 'Mila miditra aloha ianao.'),
	(6, 'oui', 'Oui', 'Yes', 'Eny'),
	(7, 'non', 'Non', 'No', 'Tsia'),
	(8, 'choisir_votre_langue', 'Veullez choisir votre langue.', 'Please, choose your language.', 'Azafady, safidio ny fiteninao'),
	(9, 'langue_mis_a_jour', 'Votre langue a été mise à jour.', 'Your language has been updated.', 'Niova ny fiteninao.'),
	(10, 'choix_incorrecte', 'Votre choix semble incorrect.', 'Your choice seems incorrect.', 'Toa tsy mety ny safidinao.'),
	(11, 'entrer_votre_username_mail_moodle', 'Entrez votre nom d\'utilisateur ou votre Email sur Moodle ', 'Enter your username or your Email on Moodle', 'Ampidiro ny anaranao na ny  mailaka Moodle.'),
	(12, 'entrer_votre_password_moodle', 'Entrez votre mot de passe Moodle.', 'Enter your Moodle password.', 'Ampidiro ny teny miafinanao amin\'ny Moodle.'),
	(13, 'vous_n_etes_plus_connectee', 'Vous n\'êtes plus connecté(e)', 'You are no longer connected', 'Tsy tafiditra intsony ianao'),
	(14, 'une_erreur_s_est_produite', 'Une erreur s\'est produite', 'An error occurred', 'Nisy lesoka nitranga'),
	(17, 'menu_a_afficher', 'Quel menu voulez-vous afficher?', 'Which menu do you want to display?', 'Lisitry ny inona no tianao aseho?'),
	(18, 'options_a_afficher', 'Que voulez-vous consulter?', 'What do you want to see?', 'Inona no tianao hojerena?'),
	(19, 'tableau_de_bord', 'Tableau de Bord', 'Dashboard', NULL),
	(20, 'liste_cours', 'Lister les cours', 'Course lists', 'Lisitry ny taranja'),
	(21, 'mes_cours', 'Mes cours', 'My courses', 'Taranjako'),
	(22, 'recherche_cours', 'Rechercher un cours', 'Find a course', 'Hitady taranja'),
	(23, 'entrer_votre_recherche', 'Entrer votre recherche', 'What do you want to research?', 'Inona no tianao hotadiavina?'),
	(24, 'aucun_cours_trouvé', 'Il n\'y a aucun cours', 'There\'s no course found ', 'Tsy misy taranja hita '),
	(25, 'erreur_token', NULL, NULL, NULL),
	(26, 'acceder_au_cours', 'Accerder à ce cours', 'Access to this course', 'Hiditra amin\'io taranja io'),
	(27, 'options_a_faire', 'Que voulez-vous faire?', 'What would you do?', 'Inona no tianao hatao?'),
	(28, 'aucun_contenu_trouvee', 'Aucun contenu', 'No content', NULL),
	(29, 'description', 'Description', 'Summary', 'Mombamomba'),
	(30, 'support_de_cours', 'Support de cours', 'course file', NULL),
	(31, 'voir_le_cours', 'Voir le cours', 'View course', NULL),
	(32, 'options_a_telecharger', 'Voulez-vous télécharger... ?', 'Do you want to download ...?', NULL),
	(33, 'contenue_de_cours', NULL, NULL, NULL),
	(34, 'devoirs', 'Devoirs', NULL, NULL),
	(35, 'annonce', 'Annonce', NULL, NULL),
	(36, 'date_limit', 'Date Limite', NULL, NULL),
	(37, 'tous_les_cours', 'Tous les cours', NULL, NULL),
	(38, 'Cours_recent', 'Cours Recent', NULL, NULL);
/*!40000 ALTER TABLE `Traduction` ENABLE KEYS */;

-- Listage de la structure de la table ITEAMS. user_log_server
CREATE TABLE IF NOT EXISTS `user_log_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table ITEAMS.user_log_server : ~2 rows (environ)
/*!40000 ALTER TABLE `user_log_server` DISABLE KEYS */;
INSERT INTO `user_log_server` (`id`, `email`, `mot_de_passe`) VALUES
	(1, 'sergio@gmail.com', 'sergio22**'),
	(2, 'gaetan@gmail.com', 'gaetan22**');
/*!40000 ALTER TABLE `user_log_server` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
