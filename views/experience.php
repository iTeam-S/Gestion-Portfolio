<?php include('../includes/entete.php'); ?>

<section>
<h1>Expérience:</h1>
<div class = "corps">
	<form method = "post" action = "../controllers/controllerExperience.php">
    <div class="identite">
        <label for="nomOrganisation"><b>Nom d'organisation:</b></label><br>
        <input type="text" name="nom" id="nomOrganisation" placeholder="Entreprise et/ou institut supérieur ***"><br><br>

        <label for="anneeExperience"><b>Année:</b></label><br>
        <input type="text" name="annee" id="anneeExperience" placeholder="Durée d'expérience ***"><br><br>

        <label for="typeExperience"><b>Type:</b></label><br>
        <input type="text" name="type" id="typeExperience" placeholder="L'intitulé d'expérience ***"><br><br>
    </div>
    <div class="fonction">
        <label for="descriptionExperience"><b>Description:</b></label><br>
        <textarea name = "description" id="descriptionExperience" cols="32" rows="12" placeholder="Une petite description sur ce dernier ... ***"></textarea>
        <br><br>
			<div class="envoyer">
				<input type="submit" value="Envoyer">
			</div>
    </div>
    </form>
</div>
</section>

<?php include('../includes/pied.php'); ?>
