# Gestion-portfolio

- C'est une **application web** qui sert à modifier les informations de chacun des membres de la communauté **iTeam-$**.

- Back-End: *API rest écrit en PHP native*,

- Front-End: *Angular2 (Google)*

### Concernant l'API: 
   Avant tout, veuillez créer un fichier `db.json` le dossier `models`; dans db.json: 
   `{ "host": "<nom de l'hote", "dbname": "<nom de la base de données>", "user": "<nom d'utilisateur>", "password": "<mot de passe de l'user>" }`

   Veuillez aussi créer deux fichiers utils dans *controllers* pour génerer le token: 
      - jwt-header.json (header)
      - jwt-secret.php (*const LAHATRA = "<cle du token>"*)

- Authentification: `https://api-ep.iteam-s.mg/index.php?demande=login/token-login` accompagne des donnees d'authentification (identifiant et mot de passe en utilisant des formData) et qui fournira après un token. Mais, on peut s'authentifier à d'autres application en utilisant l'api (pour les membres) en utilisant l'URL: 
 `https://api-ep.iteam-s.mg/index.php?demande=login/api-login`

- Membre: 
   - tous les membres: `https://api-ep.iteam-s.mg/index.php?demande=get/membre/*`
   - un seul membre: `https://api-ep.iteam-s.mg/index.php?demande=get/membre/1`
   - update: `https://api-ep.iteam-s.mg/index.php?demande=update/membre`

- Formations:
   - toutes les formations: `https://api-ep.iteam-s.mg/index.php?demande=get/formations/1`
   - la formation d'un seul membre: `https://api-ep.iteam-s.mg/index.php?demande=get/formations/1`
   - add: `https://api-ep.iteam-s.mg/index.php?demande=add/formations`
   - update: `https://api-ep.iteam-s.mg/index.php?demande=update/membre`
   - delete: `https://api-ep.iteam-s.mg/index.php?demande=delete/membre`

- Fonction:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/fonction/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/fonction/1`
   - `https://api-ep.iteam-s.mg/index.php?demande=update/fonction`

- Expériences:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/experiences/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/experiences/1` (get)
   - `https://api-ep.iteam-s.mg/index.php?demande=add/experiences` (add)
   - `https://api-ep.iteam-s.mg/index.php?demande=update/experiences` (update)
   - `https://api-ep.iteam-s.mg/index.php?demande=delete/experiences` (delete)

- Distinctions:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/distinctions/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/distinctions/1` (get)
   - `https://api-ep.iteam-s.mg/index.php?demande=add/distinctions` (add)
   - `https://api-ep.iteam-s.mg/index.php?demande=update/distinctions` (update)
   - `https://api-ep.iteam-s.mg/index.php?demande=delete/distinctions` (delete)

- Competences:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/competences/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/competences/1` (get)
   - `https://api-ep.iteam-s.mg/index.php?demande=add/competences` (add)
   - `https://api-ep.iteam-s.mg/index.php?demande=update/competences` (update)
   - `https://api-ep.iteam-s.mg/index.php?demande=delete/competences` (delete)

- Projets:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/projets/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/projets/1` (get)
    - `https://api-ep.iteam-s.mg/index.php?demande=add/projets` (add)
   - `https://api-ep.iteam-s.mg/index.php?demande=update/projets` (update)
   - `https://api-ep.iteam-s.mg/index.php?demande=delete/projets` (delete)

- Autres:
   - `https://api-ep.iteam-s.mg/index.php?demande=get/autres/*`
   - `https://api-ep.iteam-s.mg/index.php?demande=get/autres/1` (get)
    - `https://api-ep.iteam-s.mg/index.php?demande=add/autres` (add)
   - `https://api-ep.iteam-s.mg/index.php?demande=update/autres` (update)
   - `https://api-ep.iteam-s.mg/index.php?demande=delete/autres` (delete)

   **Accompagné des données en formData... Merci iTeam-$ 🤓**
