# Gestion-portfolio

<p align="center">
   <a href="https://ep.iteam-s.mg/" target="blank"><img src="https://raw.githubusercontent.com/iTeam-S/Interfaces-portfolio/main/apercu.png" alt="Gestion portfolio Logo" /></a>
</p>

- C'est une **application web** qui sert à modifier les informations de chacun des membres de la communauté **iTeam-$**.

- Back-End: **API rest écrit en PHP native**,

- Front-End: **Angular (Google)**

### Concernant l'API: 
   Avant tout, veuillez créer un fichier `db.json` le dossier `models`; dans db.json: 
   `{ "host": "<nom de l'hote", "dbname": "<nom de la base de données>", "user": "<nom d'utilisateur>", "password": "<mot de passe de l'user>" }`

   Veuillez aussi créer deux fichiers utils dans *controllers* pour génerer le token: 
      - jwt-header.json (header)
      - jwt-secret.php (*const LAHATRA = "<cle du token>"*)

- Authentification: `https://api-ep.iteam-s.mg/?demande=login/token-login` accompagne des donnees d'authentification (identifiant et mot de passe en utilisant des formData) et qui fournira après un token. Mais, on peut s'authentifier à d'autres application en utilisant l'api (pour les membres) en utilisant l'URL: 
 `https://api-ep.iteam-s.mg/?demande=login/api-login`

- Membre: 
   - tous les membres: `https://api-ep.iteam-s.mg/?demande=get/membre/*`
   - un seul membre: `https://api-ep.iteam-s.mg/?demande=get/membre/1`
   - update: `https://api-ep.iteam-s.mg/?demande=update/membre`

- Formations:
   - toutes les formations: `https://api-ep.iteam-s.mg/?demande=get/formations/1`
   - la formation d'un seul membre: `https://api-ep.iteam-s.mg/?demande=get/formations/1`
   - add: `https://api-ep.iteam-s.mg/?demande=add/formations`
   - update: `https://api-ep.iteam-s.mg/?demande=update/membre`
   - delete: `https://api-ep.iteam-s.mg/?demande=delete/membre`

- Fonction:
   - `https://api-ep.iteam-s.mg/?demande=get/fonction/*`
   - `https://api-ep.iteam-s.mg/?demande=get/fonction/1`
   - `https://api-ep.iteam-s.mg/?demande=update/fonction`

- Expériences:
   - `https://api-ep.iteam-s.mg/?demande=get/experiences/*`
   - `https://api-ep.iteam-s.mg/?demande=get/experiences/1` (get)
   - `https://api-ep.iteam-s.mg/?demande=add/experiences` (add)
   - `https://api-ep.iteam-s.mg/?demande=update/experiences` (update)
   - `https://api-ep.iteam-s.mg/?demande=delete/experiences` (delete)

- Distinctions:
   - `https://api-ep.iteam-s.mg/?demande=get/distinctions/*`
   - `https://api-ep.iteam-s.mg/?demande=get/distinctions/1` (get)
   - `https://api-ep.iteam-s.mg/?demande=add/distinctions` (add)
   - `https://api-ep.iteam-s.mg/?demande=update/distinctions` (update)
   - `https://api-ep.iteam-s.mg/?demande=delete/distinctions` (delete)

- Competences:
   - `https://api-ep.iteam-s.mg/?demande=get/competences/*`
   - `https://api-ep.iteam-s.mg/?demande=get/competences/1` (get)
   - `https://api-ep.iteam-s.mg/?demande=add/competences` (add)
   - `https://api-ep.iteam-s.mg/?demande=update/competences` (update)
   - `https://api-ep.iteam-s.mg/?demande=delete/competences` (delete)

- Projets:
   - `https://api-ep.iteam-s.mg/?demande=get/projets/*`
   - `https://api-ep.iteam-s.mg/?demande=get/projets/1` (get)
   - `https://api-ep.iteam-s.mg/?demande=add/projets` (add)
   - `https://api-ep.iteam-s.mg/?demande=update/projets` (update)
   - `https://api-ep.iteam-s.mg/?demande=delete/projets` (delete)

- Autres:
   - `https://api-ep.iteam-s.mg/?demande=get/autres/*`
   - `https://api-ep.iteam-s.mg/?demande=get/autres/1` (get)
    - `https://api-ep.iteam-s.mg/?demande=add/autres` (add)
   - `https://api-ep.iteam-s.mg/?demande=update/autres` (update)
   - `https://api-ep.iteam-s.mg/?demande=delete/autres` (delete)

   **Accompagné des données en formData... Merci iTeam-$ 🤓**
