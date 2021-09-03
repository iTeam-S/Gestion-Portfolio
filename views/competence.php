<?php include('../includes/entete.php'); ?>

<section>
<h1>Compétences:</h1>
<div class = "corps">
	<form method = "post" action = "../controllers/controllerCompetence.php">
    <div class="identite">
        <div class="icones">
            <img src="../assets/images/stylo.png" width="30" height="30">
            <label for="stylo"><b> Langages informatiques:</b></label>
        </div>
        <input type="text" name="langages" id="stylo" placeholder="listez les langages ***"><br><br>

        <div class="icones">
            <img src="../assets/images/mobile.png" width="30" height="30">
            <label for="mobile"><b>Frameworks</b></label>
        </div>
			<input type="text" name="frameworks" id="mobile" placeholder="Listez les frameworks ***"><br><br>

        <div class="icones">
            <img src="../assets/images/parametre.png" width="30" height="30">
            <label for="parametre"><b>Administration système:</b></label>
        </div>
		<input type="text" name="system" id="sysadmin" placeholder="O.S/serveurs/... ***"><br><br>

        <div class="icones">
            <img src="../assets/images/laptop.png" width="30" height="30">
            <label for="laptop"><b>Outils technologiques:</b></label>
        </div>
        <input type="text" name="outils" id="laptop" placeholder="Les outils utilisés ***"><br><br>

        <div class="envoyer">
				<input type="submit" value="Envoyer">
		</div>
    </div>
    </form>
</div>
</section>

<?php include('../includes/pied.php'); ?>
