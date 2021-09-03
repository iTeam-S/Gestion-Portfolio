<?php include('../includes/entete.php'); ?>

<section>
<div class = "corps">
	<form method = "post" action = "../controllers/controllerMembre.php">
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
			<input type="url" name="cv" id="lien_cv" placeholder="URL sur votre CV sur drive... ***"><br><br>

			<label for="fonction"><b>Votre fonction:</b></label><br>
			<input type="text" name="fonction" id="fonction" placeholder="Votre travail et/ou étude ***"><br><br>


			<label for="descriptionTravail"><b>Description:</b></label><br>
			<textarea name = "descriptions" id="descriptionTravail" cols="32" rows="12" placeholder="Disez-nous sur votre fonction... ***"></textarea><br>
		</div>

		<div class="socialNetwork">
			<div class="icones">
				<img src="../assets/images/linkedin.png" width="30" height="30">
				<label for="lien_linkedin"><b>Linkedin:</b></label>
			</div>
			<input type="url" name="linkedin" id="lien_linkedin" placeholder="Lien du profile ***"><br><br>


			<div class="icones">
				<img src="../assets/images/github.png" width="30" height="30">
				<label for="lien_github"><b>Github:</b></label>
			</div>
			<input type="text" name="usernameGithub" id="lien_github" placeholder="Username sur github ***"><br><br>
			<input type="url" name="githubAvatar" placeholder="Lien d'avatar sur github ***"><br><br>


			<div class="icones">
				<img src="../assets/images/facebook.png" width="30" height="30">
				<label for="lien_facebook"><b>Facebook:</b></label>
			</div>
			<input type="url" name="facebook" id="lien_facebook" placeholder="Lien du profile ***"><br><br>

			<br><br>
			<div class="envoyer">
				<input type="submit" value="Envoyer">
			</div>
		</div>
	</form>
</div>
</section>

<?php include('../includes/pied.php'); ?>
