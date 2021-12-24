<?php include_once('../includes/entete_view.php'); ?>
<section class="pt-5 mt-4">
    <div class="container mt-3" id="membre">
    <p class="font-weight-bold">Indentité:</p>
        <div class="row form-group">
            <div class="col-lg-4 col-12 rounded border pt-1 pb-1 mt-1 mb-1">
                <label for="nomPersonne"><b>Nom:</b></label>
                <input type="text" id="nomPersonne"
                    placeholder="Votre nom (obligatoire)***" class="form-control" required><br>
                <label for="prenomsPersonne"><b>Prénoms:</b></label>
                <input type="text" id="prenomsPersonne"
                    placeholder="Votre prenom (obligatoire)***" class="form-control" required><br>
                <label for="prenomUsuel"><b>Prenom usuel:</b></label>
                <input type="text" id="prenomUsuel"
                    placeholder="Prenom usuel ***" class="form-control" required><br>
                <img src="../assets/images/telephone.png" width="30" height="30">
				<label for="telephonePrimo"><b>Téléphones</b>:</label>
                <input type="tel" id="telephonePrimo"
                    placeholder="Premier contact (obligatoire)***" class="form-control" required><br>
			    <input type="tel" id="telephoneSecondo"
                    placeholder="Deuxième contact ***" class="form-control"><br>
                <img src="../assets/images/domicile.png" width="30" height="30">
				<label for="domicile"><b>Domicile:</b></label>
                <input type="text" id="domicile"
                    placeholder="Où habitez-vous ? ***" class="form-control"><br>
            </div>
            <div class="col-lg-4 col-12 rounded border shadow pt-1 pb-1">
                <img src="../assets/images/gmail.png" width="30" height="30">
                <label for="email"><b>Adresse email:</b></label>
                <input type="email" id="email" 
                    placeholder="Email (obligatoire)***" class="form-control" required><br>
                <img src="../assets/images/cv.png" width="30" height="30">
                <label for="lien_cv"><b>Cirrucilum vitea:</b></label>
                <input type="url" id="lien_cv" 
                    placeholder="URL sur votre CV... ***" class="form-control"><br>
                <label for="fonction"><b>Votre fonction:</b></label><br>
                <input type="text" id="fonction" 
                    placeholder="Votre travail et/ou étude (..., ...... ,...) ***" class="form-control"><br>
                <label for="descriptionTravail"><b>Description:</b></label><br>
                <textarea id="descriptionTravail" rows="7" 
                    placeholder="Disez-nous sur votre fonction... ***" class="form-control"></textarea>
            </div>
            <div class="col-lg-4 col-12 rounded border pt-1 pb-1 mt-1 mb-1 ">
                <img src="../assets/images/linkedin.png" width="30" height="30">
                <label for="lien_linkedin"><b>Linkedin:</b></label>
                <input type="url" id="lien_linkedin" 
                    placeholder="Lien du profile ***" class="form-control"><br>
                <img src="../assets/images/github.png" width="30" height="30">
				<label for="lien_github"><b>Github:</b></label>
                <input type="text" id="username_github" 
                    placeholder="Username sur github ***" class="form-control"><br>
                <img src="../assets/images/facebook.png" width="30" height="30">
				<label for="lien_facebook"><b>Facebook:</b></label>
                <input type="url" id="lien_facebook" 
                    placeholder="Lien du profile ***" class="form-control"><br>
                <div class="container mt-5 text-center" id="bouttonMembre">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-success"> >>> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--------------------------------------------------formation---------------------------------------------------------->
    <div class="container mt-2" id="formation">
    <p class="font-weight-bold">Formations:</p>
        <div class="row form-group rounded border-lg shadow text-center">
            <div class="col-12 col-md-4 pb-1 m-md-3 m-1 ml-md-5 rounded border">
                <label for="lieuFormation"><b>Lieu:</b></label>
                <input type="text" id="lieuFormation" 
                    placeholder="lieu de formation ***" class="form-control"><br>
                <label for="anneeFormation"><b>Année:</b></label><br>
                <input type="text" id="anneeFormation" 
                    placeholder="Année de formation ***" class="form-control"><br>
                <label for="typeFormation"><b>Type:</b></label><br>
                <input type="text" id="typeFormation" 
                    placeholder="L'intitulé de formation ***" class="form-control"><br>
            </div>
            <div class="col-12 col-md-6 pb-1 m-md-3 m-1 rounded border">
                <label for="descriptionFormation"><b><u>Descriptions:</u></b></label><br>
                <textarea id="descriptionFormation"  rows="7" 
                    placeholder="Une petite description sur votre formation ... ***" class="form-control"></textarea>
                <div class="container mt-3 text-center" id="bouttonFormation">
                    <div class="row">
                        <div class="col-4 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"> <<< </span></button>
                        </div>
                        <div class="col-4 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>
                        <div class="col-4 suivant">
                            <button type="button" class="btn btn-success"><span title="suivant"> >>> </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------- Compétence ----------------------------------------------------------->
    <div class="container mt-md-1 mt-1" id="competence">
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="font-weight-bold text-center">Compétences:</p>
                <div class="row text-center border shadow p-2 rounded">
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Mobile</span><br>
                        <img src="../assets/images/mobile.png" width="50" height="50" alt="mobile">
                    </div>
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Laptop</span><br>
                        <img src="../assets/images/laptop.png" width="50" height="50" alt="laptop">
                    </div>
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Stylo</span><br>
                        <img src="../assets/images/stylo.png" width="50" height="50" alt="stylo">
                    </div>
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Layers</span><br>
                        <img src="../assets/images/layers.png" width="50" height="50" alt="layers">
                    </div>
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Shield</span><br>
                        <img src="../assets/images/shield.png" width="50" height="50" alt="shield">
                    </div>
                    <div class="col-md-2 col-4">
                        <span class="font-weight-bold">Paramètre</span><br>
                        <img src="../assets/images/parametre.png" width="50" height="50" alt="paramètre">
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col-12 rounded border text-center p-2">
                        <select id="icones_categories" class="m-1 form-control" required>
                            <option value="" selected>--- Veuillez en choisir ***</option>
                            <option value="1">Mobile</option>
                            <option value="2">Laptop</option>
                            <option value="3">Stylo</option>
                            <option value="4">Layers</option>
                            <option value="5">Shield</option>
                            <option value="6">Paramètre</option>
                        </select>
                        <input type="text" id="mes_competences" class="m-1 form-control" placeholder="Votre compétence ***" required>
                        <br>
                        <label for="descritpionCompetences"><b><u>Descriptions:</u></b></label><br>
                        <textarea id="descritpionCompetences" class="form-control" 
                            placeholder="Une petite description sur ce dernier ... ***" rows="7" required></textarea>
                        <div class="col-12 mt-1">
                            <div class="container text-center" id="bouttonCompetence">
                                <div class="row">
                                    <div class="col-4 precedant">
                                        <button type="button" class="btn btn-success"><span title="précèdant"> <<< </span></button>
                                    </div>
                                    <div class="col-4 ajouter">
                                        <button type="button" class="btn btn-secondary">
                                        <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                                        width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                                    </div>
                                    <div class="col-4 suivant">
                                        <button type="button" class="btn btn-success"><span title="suivant"> >>> </span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 ml-md-4">
                <br><br><br><br><br><br><br>
                <p class="font-weight-bold text-center">Poste:</p>
                <div class="row form-group border rounded instruction">
                    <div class="m-1 text-center">
                        Veuillez choisir votre poste au sein de la communauté !<br>
                        Merci de votre compréhension !
                    </div>
                    <div class="col-12">
                        <select id="poste" class="m-1 form-control" required>
                            <option value="" selected>--- Veuillez en choisir ***</option>
                            <option value="1">Responsable équipe</option>
                            <option value="3">Relation Projet</option>
                            <option value="4">Communication digitale</option>
                            <option value="5">Développeur</option>
                            <option value="6">Lead développeur</option>
                            <option value="7">Chargé Administration</option>
                            <option value="8">Consultant Administration</option>
                            <option value="9">Chargé Juridique</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!------------------------------------------ experience --------------------------------------> 
    <div class="container mt-2" id="experience">
        <p class="font-weight-bold">Expériences:</p>
        <div class="row form-group row text-center shadow rounded mb-3 p-1">
            <div class="col-12 col-md-4 pb-1 m-md-3 m-1 ml-md-5 rounded border">
                <label for="nomOrganisation"><b>Nom d'organisation:</b></label>
                <input type="text" id="nomOrganisation" 
                    placeholder="Entreprise et/ou institut supérieur ***" class="form-control"><br>
                <label for="anneeExperience"><b>Année:</b></label>
                <input type="text" id="anneeExperience" 
                    placeholder="Durée d'expérience ***" class="form-control"><br>
                <label for="typeExperience"><b>Type:</b></label>
                <input type="text" id="typeExperience" 
                    placeholder="L'intitulé d'expérience ***" class="form-control">
            </div>
            <div class="col-12 col-md-6 pb-1 m-md-3 m-1 rounded border text-center">
                <label for="descriptionExperiences"><b><u>Description:</u></b></label><br>
                <textarea id="descriptionExperiences" rows="7" 
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control"></textarea>
                <div class="container mt-3 text-center" id="bouttonExperience">
                    <div class="row">
                        <div class="col-md-4 col-3 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"> <<< </span></button>
                        </div>
                        <div class="col-md-4 col-3 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>
                        <div class="col-md-4 col-3 suivant">
                            <button type="button" class="btn btn-success"> >>> </button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------------------------------- Distinctions ------------------------------------->
    <div class="container mt-2" id="distinction">
    <p class="font-weight-bold">Évènements distinctifs:</p>
        <div class="row form-group row text-center shadow rounded mb-3 p-1">
            <div class="col-12 col-md-4 pb-1 m-md-3 m-1 ml-md-5 rounded border">
                <label for="organisateurs"><b>Organisateur(s):</b></label>
                <input type="text" id="organisateurs" 
                    placeholder="Le(s) organisteur(s) de l'évènement ***" class="form-control"><br>
                <label for="anneeDistinction"><b>Année:</b></label>
                <input type="text" id="anneeDistinction" 
                    placeholder="Moment de l'évènement ***" class="form-control"><br>
                <label for="typeDistinction"><b>Type:</b></label>
                <input type="text" id="typeDistinction" 
                    placeholder="L'évènement que vous avez participé ***" class="form-control">
                <label for="rangDistinction">Rang / ordre:</label>
                <input type="number" id="rangDistinction"
                    placeholder="Votre position durant l'évènement ***" class="form-control">
            </div>
            <div class="col-12 col-md-6 pb-1 m-md-3 m-1 rounded border text-center">
                <label for="descriptionDistinction"><b><u>Description:</u></b></label><br>
                <textarea id="descriptionDistinction" rows="7" 
                    placeholder="Une petite description sur l'évènement***" class="form-control"></textarea>
                <div class="container mt-3 text-center" id="bouttonDistinction">
                    <div class="row">
                        <div class="col-md-4 col-3 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"> <<< </span></button>
                        </div>
                        <div class="col-md-4 col-3 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>
                        <div class="col-md-4 col-3 suivant">
                            <button type="button" class="btn btn-success"> >>> </button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <button type="button" id="register" class="btn btn-primary">Enregister tout</button>
            </div>
        </div>
    </div>
</section>
<br>
<?php include_once('../includes/pied_view.php'); ?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/js_inscription.js"></script>
</body>
</html>