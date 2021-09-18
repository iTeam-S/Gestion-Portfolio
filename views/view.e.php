<?php include_once('../includes/entete_view.php'); ?>

    <section>
        <div class="container mt-3">
        <p class="font-weight-bold">Expériences:</p>
            <form action="../controllers/controllerExperience.php" methhod="post">
                <div class="row form-group">
                    <div class="col-12 col-lg-5 pb-1 m-1 rounded  border">
                        <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                        <input type="text" name="nom" id="nomOrganisation" 
                            placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                        
                        <label for="anneeExperience"><b>Année:</b></label>
                        <input type="text" name="annee" id="anneeExperience" 
                            placeholder="Durée d'expérience ***" class="form-control"><br>

                        <label for="typeExperience"><b>Type:</b></label>
                        <input type="text" name="type" id="typeExperience" 
                            placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                    </div>

                    <div class="col-12 col-lg-6 ml-lg-3 m-1 pb-1 rounded  border">
                        <label for="descriptionExperience"><b>Description:</b></label><br>
                        <textarea name = "description" id="descriptionExperience" rows="7" 
                            placeholder="Une petite description sur ce dernier ... ***" class="form-control">
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
