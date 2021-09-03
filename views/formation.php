<?php include('../includes/entete.php');?>

<section>
<h1>Formation:</h1>
<div class = "corps">
	<form method = "post" action = "../controllers/controllerFormation.php">
    <div class="identite">
        <label for="lieuFormation"><b>Lieu:</b></label><br>
        <input type="text" name="lieu" id="lieuFormation" placeholder="lieu de formation ***"><br><br>

        <label for="anneeFormation"><b>Année:</b></label><br>
        <input type="text" name="annee" id="anneeFormation" placeholder="Année de formation ***"><br><br>

        <label for="typeFormation"><b>Type:</b></label><br>
        <input type="text" name="type" id="typeFormation" placeholder="L'intitulé de formation ***"><br><br>
    </div>
    <div class="fonction">
        <label for="descriptionFormation"><b>Description:</b></label><br>
        <textarea name = "description" id="descriptionFormation" cols="32" rows="12" placeholder="Une petite description sur votre formation ... ***"></textarea>
        <br><br>
			<div class="envoyer">
				<input type="submit" value="Envoyer">
			</div>
    </div>
    </form>
</div>
</section>

<?php include('../includes/pied.php'); ?>
