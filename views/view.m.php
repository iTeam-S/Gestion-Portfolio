<?php include_once('../includes/entete_view.php'); ?>

<section>
    <div class="container mt-3">
    <p class="font-weight-bold">Indentité:</p>
    <form action="../controllers/controllerMembre.php" method="post">
        <div class="row form-group">

            <div class="col-lg-4 col-12 rounded border pt-1 pb-1 mt-1 mb-1">
                <label for="nom"><b>Nom:</b></label>
                <input type="text" name="nomPersonne"
                    placeholder="Votre nom ***" id="nom" class="form-control"><br>

                <label for="prenom"><b>Prenoms:</b></label>
                <input type="text" name="prenomsPersonne" 
                    placeholder="Votre prenom ***" id="prenom" class="form-control"><br>

                <label for="prenom_usuel"><b>Prenom usuel:</b></label>
                <input type="text" name="prenomUsuel" 
                    placeholder="Prenom usuel ***" id="prenom_usuel" class="form-control"><br>

                <img src="../assets/images/telephone.png" width="30" height="30">
				<label for="telephone"><b>Telephone</b>:</label>
                <input type="tel" name="tel1" 
                    placeholder="Premier contact ***" id="telephone" class="form-control"><br>
			    <input type="tel" name="tel2" 
                    placeholder="Deuxième contact ***" id="telephone" class="form-control"><br>

                <img src="../assets/images/domicile.png" width="30" height="30">
				<label for="domicile"><b>Domicile:</b></label>
                <input type="text" name="adresse" 
                    placeholder="Où habitez-vous ? ***" id="domicile" class="form-control"><br>
            </div>

            <div class="col-lg-4 col-12 rounded border shadow pt-1 pb-1">
                <img src="../assets/images/gmail.png" width="30" height="30">
                <label for="emailAdress"><b>Adresse email:</b></label>
                <input type="email" name="email" id="emailAdress" 
                    placeholder="Email ***" class="form-control"><br>

                <img src="../assets/images/cv.png" width="30" height="30">
                <label for="lien_cv"><b>Cirrucilum vitea:</b></label>
                <input type="url" name="cv" id="lien_cv" 
                    placeholder="URL sur votre CV sur drive... ***" class="form-control"><br>

                <label for="fonction"><b>Votre fonction:</b></label><br>
                <input type="text" name="fonction" id="fonction" 
                    placeholder="Votre travail et/ou étude ***" class="form-control"><br>

                <label for="descriptionTravail"><b>Description:</b></label><br>
                <textarea name = "descriptions" id="descriptionTravail" rows="7" 
                    placeholder="Disez-nous sur votre fonction... ***" class="form-control"></textarea>
            </div>
            
            <div class="col-lg-4 col-12 rounded border pt-1 pb-1 mt-1 mb-1 ">
                <img src="../assets/images/linkedin.png" width="30" height="30">
                <label for="lien_linkedin"><b>Linkedin:</b></label>
                <input type="url" name="linkedin" id="lien_linkedin" 
                    placeholder="Lien du profile ***" class="form-control"><br>
                
                <img src="../assets/images/github.png" width="30" height="30">
				<label for="lien_github"><b>Github:</b></label>
                <input type="text" name="usernameGithub" id="lien_github" 
                    placeholder="Username sur github ***" class="form-control"><br>
                <input type="url" name="githubAvatar" 
                    placeholder="Lien d'avatar sur github ***" class="form-control"><br>

                    <img src="../assets/images/facebook.png" width="30" height="30">
				<label for="lien_facebook"><b>Facebook:</b></label>
                <input type="url" name="facebook" id="lien_facebook" 
                    placeholder="Lien du profile ***" class="form-control"><br>

                <div class="container mt-5 text-center">
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
    <br>
</section>
<?php include_once('../includes/pied_view.php'); ?>
