<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>Iteam-$</title>
	<link rel = "stylesheet" type = "text/css" href = "../assets/css/iteams.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="../assets/images/iteams.jpg" width="80" height="80">
		</div>

		<div class="iteams">
			<b><i>Iteam-$</i></b>
		</div>

		<div class="titre">
			<b><i>Inscription</i></b>
		</div>
	</header>

	<section>
	<div class = "corps">
		<form method = "post" action = "../controllers/">
			<div class="identite">
				<label for="nom"><b>Nom:</b></label><br>
				<input type="text" name="nomPersonne" placeholder="Votre nom ***" id="nom"><br><br>

				<label for="prenom"><b>Prenoms:</b></label><br>
				<input type="text" name="prenomsPersonne" placeholder="Votre prenom ***" id="prenom"><br><br>

				<label for="prenom_usuel"><b>Prenom usuel:</b></label><br>
				<input type="text" name="prenomUsuel" placeholder="Prenom usuel ***" id="prenom_usuel"><br><br>
				
				<div class="icones">
					<img src="../assets/images/telephone.png" width="30" height="30">
					<label for="telephone"><b>Telephone</b>:</label>
				</div>
				<input type="tel" name="tel1" placeholder="Premier contact ***" id="telephone"><br><br>
				<input type="tel" name="tel2" placeholder="Deuxième contact ***" id="telephone"><br><br>


				<div class="icones">
					<img src="../assets/images/domicile.png" width="30" height="30">
					<label for="domicile"><b>Domicile:</b></label>
				</div>
				<input type="text" name="adresse" placeholder="Où habitez-vous ? ***" id="domicile"><br><br>
			</div>

			<div class="fonction">
				<div class="icones">
					<img src="../assets/images/gmail.png" width="30" height="30">
					<label for="emailAdress"><b>Adresse email:</b></label>
				</div>
				<input type="email" name="email" id="emailAdress" placeholder="Email ***"><br><br>


				<div class="icones">
					<img src="../assets/images/cv.png" width="30" height="30">
					<label for="lien_cv"><b>Cirrucilum vitea:</b></label>
				</div>
				<input type="text" name="cv" id="lien_cv" placeholder="URL sur votre CV sur drive... ***"><br><br>

				<label for="fonction"><b>Votre fonction:</b></label><br>
				<input type="text" name="fonction" placeholder="Votre travail et/ou étude ***"><br><br>


				<label for="descriptionTravail"><b>Description:</b></label><br>
				<textarea id="descriptionTravail" cols="32" rows="12" placeholder="Disez-nous sur votre fonction... ***"></textarea><br>
			</div>

			<div class="socialNetwork">
				<div class="icones">
					<img src="../assets/images/linkedin.png" width="30" height="30">
					<label for="lien_linkedin"><b>Linkedin:</b></label>
				</div>
				<input type="text" name="linkedin" id="lien_linkedin" placeholder="Lien du profile ***"><br><br>


				<div class="icones">
					<img src="../assets/images/github.png" width="30" height="30">
					<label for="lien_github"><b>Github:</b></label>
				</div>
				<input type="text" name="github" id="lien_github" placeholder="Lien du profile ***"><br><br><input type="text" name="username" placeholder="Username sur github ***"><br><br>


				<div class="icones">
					<img src="../assets/images/facebook.png" width="30" height="30">
					<label for="lien_facebook"><b>Facebook:</b></label>
				</div>
				<input type="text" name="facebook" id="lien_facebook" placeholder="Lien du profile ***"><br><br>

				<br><br>
				<div class="envoyer">
					<input type="submit" value="Envoyer">
				</div>
			</div>
		</form>
	</div>
	</section>

	<br>
	<br>

	<footer>
		<div class="titreIteams">
			<b><i><img src="../assets/images/iteams.jpg" width="70" height="70" style="margin-left: 25px;"><br>
			Iteam-$</i></b>
		</div>

		<div class="lienImages">
			<a href="mailto:lahatrap20.aps2a@gmail.com" target="_blank" title="Nous-contacter via adresse mail."><img src="../assets/images/gmail.png" width="50" height="50"></a>

			<a href="github.com/iteam-$" target="_blank" title="github.com/iteam-$"><img src="../assets/images/github.png" width="50" height="50"></a>

			<a href="facebook.com/iTeamsCommunity" title="facebook.com/iTeamsCommunity" target="_blank"><img src="../assets/images/facebook.png" width="50" height="50"></a>
		</div>
	</footer>
</body>
</html>

