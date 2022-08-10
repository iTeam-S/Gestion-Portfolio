<p align="center">
  <a href="http://nestjs.com/" target="blank"><img src="https://nestjs.com/img/logo-small.svg" width="200" alt="Nest Logo" /></a>
</p>

[circleci-image]: https://img.shields.io/circleci/build/github/nestjs/nest/master?token=abc123def456
[circleci-url]: https://circleci.com/gh/nestjs/nest

  <p align="center">A progressive <a href="http://nodejs.org" target="_blank">Node.js</a> framework for building efficient and scalable server-side applications.</p>
    <p align="center">
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/v/@nestjs/core.svg" alt="NPM Version" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/l/@nestjs/core.svg" alt="Package License" /></a>
<a href="https://www.npmjs.com/~nestjscore" target="_blank"><img src="https://img.shields.io/npm/dm/@nestjs/common.svg" alt="NPM Downloads" /></a>
<a href="https://circleci.com/gh/nestjs/nest" target="_blank"><img src="https://img.shields.io/circleci/build/github/nestjs/nest/master" alt="CircleCI" /></a>
<a href="https://coveralls.io/github/nestjs/nest?branch=master" target="_blank"><img src="https://coveralls.io/repos/github/nestjs/nest/badge.svg?branch=master#9" alt="Coverage" /></a>
<a href="https://discord.gg/G7Qnnhy" target="_blank"><img src="https://img.shields.io/badge/discord-online-brightgreen.svg" alt="Discord"/></a>
<a href="https://opencollective.com/nest#backer" target="_blank"><img src="https://opencollective.com/nest/backers/badge.svg" alt="Backers on Open Collective" /></a>
<a href="https://opencollective.com/nest#sponsor" target="_blank"><img src="https://opencollective.com/nest/sponsors/badge.svg" alt="Sponsors on Open Collective" /></a>
  <a href="https://paypal.me/kamilmysliwiec" target="_blank"><img src="https://img.shields.io/badge/Donate-PayPal-ff3f59.svg"/></a>
    <a href="https://opencollective.com/nest#sponsor"  target="_blank"><img src="https://img.shields.io/badge/Support%20us-Open%20Collective-41B883.svg" alt="Support us"></a>
  <a href="https://twitter.com/nestframework" target="_blank"><img src="https://img.shields.io/twitter/follow/nestframework.svg?style=social&label=Follow"></a>
</p>
  <!--[![Backers on Open Collective](https://opencollective.com/nest/backers/badge.svg)](https://opencollective.com/nest#backer)
  [![Sponsors on Open Collective](https://opencollective.com/nest/sponsors/badge.svg)](https://opencollective.com/nest#sponsor)-->


## Documentation API

Swagger: `https:gp-api.iteam-s.mg/docs`

 ### Authentification: 
 ```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/auth/membre \
  --header 'Content-Type: application/json' \
  --data '{
	"identifiant": "",
	"password": ""
}'
 ```

 ### Membre:
 ```bash
 curl --request GET \
  --url http://gp-api.iteam-s.mg/membre \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json'
 ```

```bash
  curl --request PATCH \
  --url https://gp-api.iteam-s.mg/membre/update-info \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
	  "user_github": "",
    "user_github_pic": "",
    "tel1": "",
    "tel2": "",
    "mail": "",
    "facebook": "",
    "linkedin": "",
    "cv": ",
    "adresse": "",
    "description": "",
    "fonction": "",
    "pdc": "",
    "dark": 1 ou 0,
    "role": "admin" ou "user"
}'
```

```bash
 curl --request PATCH \
  --url https://gp-api.iteam-s.mg/membre/update-password \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "lastPassword": "",
    "newPassword": ""
  }'
```

 ### Fonction
 ```bash
 curl --request GET \
  --url http://gp-api.iteam-s.mg/fonction \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json'
 ```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/fonction/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id_poste": ,
  }'
```

```bash
  curl --request PATCH \
  --url https://gp-api.iteam-s.mg/fonction/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "id_poste": ,
  }'
```

 ### Formations
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/formations \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/formations/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "lieu": "",
    "annee": "",
    "type": "",
    "description": "" 
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/formations/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "lieu": "",
    "annee": "",
    "type": "",
    "description": "" 
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/formations/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```

 ### Expériences
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/experiences \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/experiences/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "nom": "",
    "annee": "",
    "type": "",
    "description": "" 
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/experiences/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "nom": "",
    "annee": "",
    "type": "",
    "description": "" 
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/experiences/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```

 ### Distinctions
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/distinctions \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/distinctions/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "organisateur": "",
    "annee": "",
    "type": "",
    "description": "",
    "ordre": ,
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/distinctions/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "organisateur": "",
    "annee": "",
    "type": "",
    "description": "",
    "ordre": ,
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/distinctions/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```

 ### Competences
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/competences \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/competences/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "nom": "",
    "liste": "",
    "id_categorie": ,
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/competences/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "nom": "",
    "liste": "",
    "id_categorie": ,
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/competences/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```

 ### Projets
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/projets \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/projets/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "nom": "",
    "description": ,
    "lien": "",
    "pdc": "",
    "ordre": ,
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/projets/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "description": ,
    "lien": "",
    "pdc": "",
    "ordre": ,
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/projets/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```

 ### Autres
```bash
  curl --request GET \
  --url https://gp-api.iteam-s.mg/autres \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
```

```bash
  curl --request POST \
  --url https://gp-api.iteam-s.mg/autres/create \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "nom": "",
    "lien": ""
  }'
```

```bash
  curl --request PUT \
  --url https://gp-api.iteam-s.mg/autres/update \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
    "nom": "",
    "lien": ""
  }'
```

```bash
  curl --request DELETE \
  --url https://gp-api.iteam-s.mg/autres/remove \
  --header 'Authorization: Bearer <your token>' \
  --header 'Content-Type: application/json' \
  --data '{
    "id": ,
  }'
```



- Author - [iTeam-$](https://github.com/iTeam-S)
- Website - [https://iteam-s.mg/](https://iteam-s.mg/)

