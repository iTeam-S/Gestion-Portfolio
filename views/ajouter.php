<?php
session_start();
include_once('../includes/entete_view.php'); ?>

<section>
<form method="post">
    <div class="container mt-2" id="formation">
    <p class="font-weight-bold">Formations:</p>
        <div class="row form-group rounded border-md shadow text-center">
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
                    placeholder="Une petite description sur votre formation ... ***" class="form-control">
                </textarea>
                <div class="container mt-3 text-center" id="bouttonFormation">
                    <div class="row">
                        <div class="col-4 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"><<<</span></button>
                        </div>

                        <div class="col-4 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>

                        <div class="col-4 suivant">
                            <button type="button" class="btn btn-success"><span title="suivant">>>></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--------------------------------------------------------- Compétence ----------------------------------------------------------->

    <div class="container mt-2" id="competence">
    <p class="font-weight-bold">Compétences:</p>
        <div class="row text-center shadow rounded mb-3 p-1">
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Mobile</span><br>
                <img src="../assets/images/mobile.png" width="50" height="50" alt="mobile">
            </div>
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Laptop</span><br>
                <img src="../assets/images/laptop.png" width="50" height="50" alt="laptop">
            </div>
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Stylo</span><br>
                <img src="../assets/images/stylo.png" width="50" height="50" alt="stylo">
            </div>
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Layers</span><br>
                <img src="../assets/images/layers.png" width="50" height="50" alt="layers">
            </div>
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Shield</span><br>
                <img src="../assets/images/shield.png" width="50" height="50" alt="shield">
            </div>
            <div class="col-lg-2 col-4">
                <span class="font-weight-bold">Paramètre</span><br>
                <img src="../assets/images/parametre.png" width="50" height="50" alt="paramètre">
            </div>
        </div>
        <div class="row form-group m-1 ml-lg-5">
            <div class="col-12 col-lg-7 m-1 p-2 rounded border text-center">
                <select id="icones_categories" class="m-1 form-control">
                    <option value="0" selected>--- Veuillez en choisir ***</option>
                    <option value="1">Mobile</option>
                    <option value="2">Laptop</option>
                    <option value="3">Stylo</option>
                    <option value="4">Layers</option>
                    <option value="5">Shield</option>
                    <option value="6">Paramètre</option>
                </select>
                <input type="text" id="mes_competences" class="m-1 form-control" placeholder="Votre compétence ***">
                <br>
                <label for="descritpionCompetences"><b><u>Descriptions:</u></b></label><br>
                <textarea id="descritpionCompetences" class="form-control" 
                    placeholder="Une petite description sur ce dernier ... ***" rows="7"></textarea>

                <div class="container mt-3 text-center" id="bouttonCompetence">
                    <div class="row">
                        <div class="col-4 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"><<<</span></button>
                        </div>
                        <div class="col-4 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>
                        <div class="col-4 suivant">
                            <button type="button" class="btn btn-success"><span title="suivant">>>></span></button>
                        </div>
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
                    placeholder="Une petite description sur ce dernier ... ***" class="form-control">
                </textarea>
                <div class="container mt-3 text-center" id="bouttonExperience">
                    <div class="row">
                        <div class="col-md-4 col-3 precedant">
                            <button type="button" class="btn btn-success"><span title="précèdant"><<<</span></button>
                        </div>
                        <div class="col-md-4 col-3 ajouter">
                            <button type="button" class="btn btn-secondary">
                            <img src="../assets/images/addButton.jpg" id="ajoutIcone" 
                            width="30" height="25" alt="ajouter" title="Plus d'informations"></button>
                        </div>
                        <div class="col-md-4 col-3 suivant">
                            <button type="button" class="btn btn-success">>>></button>
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
                <input type="numbre" id="rangDistinction"
                    placeholder="Votre position durant l'évènement ***" class="form-control">
            </div>
            <div class="col-12 col-md-6 pb-1 m-md-3 m-1 rounded border text-center">
                <label for="descriptionDistinction"><b><u>Description:</u></b></label><br>
                <textarea id="descriptionDistinction" rows="7" 
                    placeholder="Une petite description sur l'évènement***" class="form-control">
                </textarea>
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
    
<!------------------------------------------------*******------------------------------------------------>
</form>
</section>
<br>
<br>
<?php include_once('../includes/pied_view.php'); ?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/js_ajouter.js"></script>
</body>
</html>

