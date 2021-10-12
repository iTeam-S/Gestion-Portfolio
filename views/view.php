<?php include_once('../includes/entete_view.php'); ?>

<section>
<form action="teste.php" method="post">
    <div class="container mt-3" id="membre">
    <p class="font-weight-bold">Indentité:</p>
        <div class="row form-group">

            <div class="col-lg-4 col-12 rounded border pt-1 pb-1 mt-1 mb-1">
                <label for="nomPersonne"><b>Nom:</b></label>
                <input type="text" name="nomPersonne"
                    placeholder="Votre nom (obligatoire)***" id="nomPersonne" class="form-control" required><br>

                <label for="prenomsPersonne"><b>Prénoms:</b></label>
                <input type="text" name="prenomsPersonne" 
                    placeholder="Votre prenom (obligatoire)***" id="prenomsPersonne" class="form-control" required><br>

                <label for="prenomUsuel"><b>Prenom usuel:</b></label>
                <input type="text" name="prenomUsuel" 
                    placeholder="Prenom usuel ***" id="prenomUsuel" class="form-control" required><br>

                <img src="../assets/images/telephone.png" width="30" height="30">
				<label for="telephonePrimo"><b>Téléphones</b>:</label>
                <input type="tel" name="tel1" 
                    placeholder="Premier contact (obligatoire)***" id="telephonePrimo" class="form-control" required><br>
			    <input type="tel" name="tel2" 
                    placeholder="Deuxième contact ***" id="telephone" class="form-control"><br>

                <img src="../assets/images/domicile.png" width="30" height="30">
				<label for="domicile"><b>Domicile:</b></label>
                <input type="text" name="adresse" 
                    placeholder="Où habitez-vous ? ***" id="domicile" class="form-control"><br>
            </div>

            <div class="col-lg-4 col-12 rounded border shadow pt-1 pb-1">
                <img src="../assets/images/gmail.png" width="30" height="30">
                <label for="email"><b>Adresse email:</b></label>
                <input type="email" name="email" id="email" 
                    placeholder="Email (obligatoire)***" class="form-control" required><br>

                <img src="../assets/images/cv.png" width="30" height="30">
                <label for="lien_cv"><b>Cirrucilum vitea:</b></label>
                <input type="url" name="cv" id="lien_cv" 
                    placeholder="URL sur votre CV... ***" class="form-control"><br>

                <label for="fonction"><b>Votre fonction:</b></label><br>
                <input type="text" name="fonction" id="fonction" 
                    placeholder="Votre travail et/ou étude ***" class="form-control"><br>

                <label for="descriptionTravail"><b>Description:</b></label><br>
                <textarea name = "descriptionsTravail" id="descriptionTravail" rows="7" 
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

                <div class="container mt-5 text-center" id="bouttonMembre">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-success">Suivant >>></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--------------------------------------------------formation---------------------------------------------------------->

    <div class="container mt-3" id="formation">
    <p class="font-weight-bold">Formations:</p>
        <div class="row form-group" id="infosF1">
            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>
        </div>
        <br>
        <div class="row form-group" id="infosF2">
        <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" name="lieuFormation[]" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>

                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" name="anneeFormation[]" id="anneeFormation" 
                    placeholder="Année de formation ***"class="form-control"><br>

                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" name="typeFormation[]" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>

                <label for="descriptionFormation"><b>Description:</b></label><br>
                <textarea name = "descriptionFormation[]" id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
            </div>
        </div>

        <div class="row rounded border text-center pt-2 pb-2 passer" id="bouttonFormation">
            <div class="col-4 precedant">
                <button type="button" class="btn btn-success"><< Précédant</button>
            </div>

            <div class="col-4 ajouter">
                <button type="button" class="btn btn-secondary">
                <img src="../assets/images/addButton.jpg" id="ajoutIcone" width="30" height="25" alt="" title="Plus d'informations"></button>
            </div>

            <div class="col-4 suivant">
                <button type="button" class="btn btn-success">Suivant >></button>
            </div>
            <br>
        </div>
    </div>
    <br>

    <!--------------------------------------------------------- Compétence ----------------------------------------------------------->

    <div class="container mt-3" id="competence">
    <p class="font-weight-bold">Compétences:</p>
        <div class="row form-group">
            <div class="col-12 col-lg-4 m-1 pb-1 rounded border">
                <img src="../assets/images/stylo.png" width="30" height="30">
                <label for="stylo"><b> Langages informatiques:</b></label>
                <input type="text" name="langages" id="stylo" 
                    placeholder="listez les langages (obligatoire)***" class="form-control" required><br>

                <img src="../assets/images/mobile.png" width="30" height="30">
                <label for="mobile"><b>Frameworks</b></label>
                <input type="text" name="frameworks" id="mobile" 
                    placeholder="Listez les frameworks (obligatoire)***" class="form-control" required><br>
        
                <img src="../assets/images/parametre.png" width="30" height="30">
                <label for="parametre"><b>Administration système:</b></label>
                <input type="text" name="system" id="parametre"
                    placeholder="O.S/serveurs/... (obligatoire)***" class="form-control" required><br>

                <img src="../assets/images/laptop.png" width="30" height="30">
                <label for="laptop"><b>Outils technologiques:</b></label>
                <input type="text" name="outils" id="laptop"
                    placeholder="Les outils utilisés (obligatoire)***" class="form-control" required><br>

                <div class="container mt-3 text-center" id="bouttonCompetence">
                    <div class="row">
                        <div class="col precedant">
                            <button type="button" class="btn btn-success"><<< Précédant</button>
                        </div>
                        <div class="col suivant">
                            <button type="button" class="btn btn-success">Suivant >>></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------ experience --------------------------------------> 

    <div class="container mt-3" id="experience">
    <p class="font-weight-bold">Expériences:</p>
        <div class="row form-group" id="infosE1">
            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>
        </div>
<!------------------------------------- InfosE2 --------------------------------->
        <div class="row form-group" id="infosE2">
            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>

            <div class="col-12 col-lg-3 pb-1 m-3 ml-5 rounded  border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" name="nomOrganisation[]" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" name="anneeExperience[]" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>

                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" name="typeExperience[]" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control"><br>
                <label for="descriptionExperience"><b>Description:</b></label><br>
                <textarea name = "descriptionExperience[]" id="descriptionExperience" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
            </div>
        </div>

        <!---------------------------- ***************** ---------------------->

        <div class="row rounded border text-center pt-2 pb-2 passer" id="bouttonExperience">
            <div class="col-4 precedant">
                <button type="button" class="btn btn-success"><< Précédant</button>
            </div>

            <div class="col-4 ajouter">
                <button type="button" class="btn btn-secondary">
                <img src="../assets/images/addButton.jpg" id="ajoutIcone" width="30" height="25" alt="" title="Plus d'informations"></button>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            <br>
        </div>
    </div>
    <br>

<!------------------------------------------------*******------------------------------------------------>
</form>
</section>
<?php include_once('../includes/pied_view.php'); ?>
