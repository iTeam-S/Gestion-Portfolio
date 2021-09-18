<?php include_once('../includes/entete_view.php'); ?>

<section>
    <div class="container mt-3">
    <p class="font-weight-bold">Formations:</p>
        <form action="../controllers/controllerFormation.php" method="post">
            <div class="row form-group">
                <div class="col-12 col-lg-5 pb-1 m-1 rounded border">
                    <label for="lieuFormation"><b>Lieu:</b></label>
                    <input type="text" name="lieu" id="lieuFormation" 
                        placeholder="lieu de formation ***" class="form-control"><br>

                    <label for="anneeFormation"><b>Année:</b></label><br>
                    <input type="text" name="annee" id="anneeFormation" 
                        placeholder="Année de formation ***"class="form-control"><br>

                    <label for="typeFormation"><b>Type:</b></label><br>
                    <input type="text" name="type" id="typeFormation" 
                        placeholder="L'intitulé de formation ***" class="form-control"><br>
                </div>
                <div class="col-12 col-lg-6 ml-lg-3 pb-1 m-1 rounded border">
                    <label for="descriptionFormation"><b>Description:</b></label><br>
                    <textarea name = "description" id="descriptionFormation"  rows="7" 
                        placeholder="Une petite description sur votre formation ... ***" class="form-control">
                    </textarea>

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
<?php include_once('../includes/pied_view.php'); ?>
