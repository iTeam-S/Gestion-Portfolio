<?php include_once('../includes/entete_view.php');?>

<section>
    <div class="container mt-3">
        <p class="font-weight-bold">Compétences:</p>
        <form action="../controllers/controllerCompetence.php" method="post">
            <div class="row form-group">
                <div class="col-12 col-lg-4 m-1 pb-1 rounded border">
                    <img src="../assets/images/stylo.png" width="30" height="30">
                    <label for="stylo"><b> Langages informatiques:</b></label>
                    <input type="text" name="langages" id="stylo" 
                        placeholder="listez les langages ***" class="form-control"><br>

                    <img src="../assets/images/mobile.png" width="30" height="30">
                    <label for="mobile"><b>Frameworks</b></label>
			        <input type="text" name="frameworks" id="mobile" 
                        placeholder="Listez les frameworks ***" class="form-control"><br>
            
                    <img src="../assets/images/parametre.png" width="30" height="30">
                    <label for="parametre"><b>Administration système:</b></label>
		            <input type="text" name="system" id="sysadmin"
                        placeholder="O.S/serveurs/... ***" class="form-control"><br>

                    <img src="../assets/images/laptop.png" width="30" height="30">
                    <label for="laptop"><b>Outils technologiques:</b></label>
                    <input type="text" name="outils" id="laptop"
                        placeholder="Les outils utilisés ***" class="form-control"><br>

                    <div class="container mt-3 text-center">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success" 
                                type="submit">Envoyer</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once('../includes/pied_view.php');?>
