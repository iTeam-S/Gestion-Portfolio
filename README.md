# interfaces-portfolio

- C'est une **application web** qui sert à mettre à jours les informations de chacun des membres de la communauté *iTeam-$*.

- L'application utilise le langage `PHP` pour le back-end qui lui fournit une **API rest** qui se trouve dans le dossier `api-iteams`.
 
- La mise à jours du côté front-end est en cours de développement, qui, lui, est développé avec le framework `Angular JS`. 

### Concernant l'API: 
- Authentification: `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=login/session-login` accompagne des donnees d'authentification (identifiant et mot de passe) et qui fournira après une session. Mais, on peut s'authentifier à d'autres application en utilisant l'api (pour les membres) en utilisant l'URL: 
 `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=login/api-login`
- Pour avoir la liste des membres: 
   - tous les membres: `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/membre/*`
   - un membre suivant leur identifiant (prenom usuel ou id) : `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/membre/identifiant`
- La liste des formations:
   - toutes les formations: `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/formations/*`
   - la formation d'un membre: `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/formations/identifiant`
- La liste des fonctions:
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/fonction/*`
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/fonction/identifiant`
- Liste des expériences:
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/experiences/*`
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/experiences/identifiant`
- Liste des distinctions:
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/distinctions/*`
   - `http(s)://<nom_de_domaine>/api-iteams/api.php?demande=get/distinctions/identifiant`
