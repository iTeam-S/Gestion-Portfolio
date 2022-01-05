<?php session_start();
if(!empty($_SESSION['id']))
{
    require_once('../includes/entete.php');
?>
<!-- ************************ C'est ici que commence la section*********************** -->
<section class="pt-5 pb-3">
    <div class="container table-responsive mt-5 border rounded shadow">

        <!-- ************************************ FONCTIONS ********************************* -->
        <div class="row">
            <div id="fonctions" class="col-12">
                <!-- les fonctions de la personne au sein de iTeam-$ -->
                <div id="fonctionsToShow">
                    <p class="mt-3">Ma fonction:</p>
                    <?php 
                        $fonctions = json_decode(file_get_contents((isset($_SERVER['HTTPS'])?"https":"http").'://'.$_SERVER['SERVER_NAME'].'/controllers/index.php?demande=getters/fonctions/'.$_SESSION['id']), true);
                    ?>
                    <table class="table table-bordered table-hover shadow">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Fonction</th>
                                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($fonctions as $fonction):?>
                                <tr>
                                    <td><?= $fonction['nom']?></td>
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="fonctionsModifier_<?= $fonction['id']?>" class="btn btn-warning fonctionsModifier" type="button" data-toggle="modal" data-target="#fonctionsModal" data-whatever="@getbootstrap">
                                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                                        </button>
                                    </td>  
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ****************************************************************************** -->
            <div class="modal fade" id="fonctionsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="fonctionsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fonctionsModalLabel">Fonctions:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="../assets/images/iteams.jpg" class="rounded-circle shadow" alt="iTeam-$" width="70" height="70">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <select id="poste" class="form-control" required>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button id="updateFonctions" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
        <!-- **************** FORMATIONS ***************** FORMATIONS *************** FORMATIONS **************** -->
        <div class="row">
            <div id="formations" class="col-12">
                <!-- les formations de la personne vont s'afficher ici -->
                <div id="formationsToShow">
                    <p class="mt-3">Mes formations:</p>
                    <?php 
                        $formations = json_decode(file_get_contents((isset($_SERVER['HTTPS'])?"https":"http").'://'.$_SERVER['SERVER_NAME'].'/controllers/index.php?demande=getters/formations/'.$_SESSION["id"]), true);
                    ?>
                    <table class="table table-bordered table-hover shadow">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Lieu</th>
                                <th class="text-center" scope="col">Année</th>
                                <th class="text-center" scope="col">Type</td>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($formations as $formation):?>
                            <tr id="formations_<?= $formation['id']?>">
                                <td id="lieuFormations_<?= $formation['id']?>"><?= $formation['lieu']?></td>
                                <td id="anneeFormations_<?= $formation['id']?>"><?= $formation['annee']?></td>
                                <td id="typeFormations_<?= $formation['id']?>"><?= $formation['type']?></td>
                                <td id="descriptionFormations_<?= $formation['id']?>"><?= $formation['description']?></td>
                                <td class="text-center rounded bg-light shadow">
                                    <button id="formationsModifier_<?= $formation['id']?>" class="btn btn-warning formationsModifier" type="button">
                                        <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                                    </button> 
                                </td>  
                                <td class="text-center rounded bg-light shadow">
                                    <button id="formationsSupprimer_<?= $formation['id']?>" class="btn btn-danger formationsSupprimer" type="button">
                                        <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                                    </button>
                                </td> 
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered table-hover shadow rounded">
                    <tbody id="updateFormations">
                        <tr>
                            <td>
                                <textarea id="lieuUpdateFormations" class="form-control text-warning"
                                    placeholder="Lieu ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="anneeUpdateFormations" class="form-control text-warning"
                                    placeholder="Année ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="typeUpdateFormations" class="form-control text-warning"
                                    placeholder="Intitulé ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="descriptionUpdateFormations" class="form-control text-warning"
                                    placeholder="Description ... ***"></textarea>
                            </td>
                            <td>
                                <button id="confirmerUpdateFormations" class="btn btn-primary text-warning shadow mt-3">Enregistrer</button>
                            </td>
                            <td>
                                <button id="annulerUpdateFormations" class="btn btn-secondary shadow mt-3">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal pour ajouter des formations -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formationsModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="formationsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formationsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formationsModalLabel">Formations:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="../assets/images/iteams.jpg" class="rounded-circle shadow" alt="iTeam-$" width="70" height="70">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lieuFormation" class="col-form-label"><b><i>Lieu:</i></b></label>
                                <input type="text" id="lieuFormation" class="form-control"
                                    placeholder="lieu de formation ***" required>
                                
                                <label for="anneeFormation" class="col-form-label"><b><i>Année:</i></b></label>
                                <input type="text" id="anneeFormation" class="form-control"
                                    placeholder="Année de formation ***" required>

                                <label for="typeFormation" class="col-form-label"><b><i>Type:</i></b></label>
                                <input type="text" id="typeFormation" class="form-control"
                                    placeholder="L'intitulé de formation ***" required>
                            </div>
                            <div class="form-group">
                                <label for="descriptionFormation" class="col-form-label"><b><i>Descriptions:</i></b></label>
                                <textarea id="descriptionFormation" class="form-control"
                                    placeholder="Une petite description sur votre formation ... ***"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button id="ajouterFormations" type="button" class="btn btn-success">
                                <img src="../assets/images/ajouter.png" 
                                width="30" height="25" alt="ajouter" title="Plus d'informations">
                            </button>
                            <button id="sendFormations" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- ************************************ EXPERIENCES ***************************** -->
        <div class="row">
            <div id="experiences" class="col-12">
                <!-- les experiences -->
                <div id="experiencesToShow">
                    <p class="mt-3">Mes expériences:</p>
                    <?php 
                        $experiences = json_decode(file_get_contents((isset($_SERVER['HTTPS'])?"https":"http").'://'.$_SERVER['SERVER_NAME'].'/controllers/index.php?demande=getters/experiences/'.$_SESSION['id']), true);
                    ?>
                    <table class="table table-bordered table-hover shadow rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Nom de l'entreprise</th>
                                <th class="text-center" scope="col">Année</th>
                                <th class="text-center" scope="col">Type</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($experiences as $experience):?>
                                <tr id="experiences_<?= $experience['id']?>">
                                    <td id="nomExperiences_<?= $experience['id']?>"><?= $experience['nom']?></td>
                                    <td id="anneeExperiences_<?= $experience['id']?>"><?= $experience['annee']?></td>
                                    <td id="typeExperiences_<?= $experience['id']?>"><?= $experience['type']?></td>
                                    <td id="descriptionExperiences_<?= $experience['id']?>"><?= $experience['description']?></td>
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="experiencesModifier_<?= $experience['id']?>" class="btn btn-warning experiencesModifier" type="button">
                                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                                        </button> 
                                    </td>  
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="experiencesSupprimer_<?= $experience['id']?>" class="btn btn-danger experiencesSupprimer" type="button">
                                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered table-hover shadow rounded">
                    <tbody id="updateExperiences">
                        <tr>
                            <td>
                                <textarea id="nomUpdateExperiences" class="form-control text-warning"
                                        placeholder="Entreprise et/ou institut supérieur ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="anneeUpdateExperiences" class="form-control text-warning"
                                    placeholder="Durée d'expérience ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="typeUpdateExperiences" class="form-control text-warning"
                                    placeholder="L'intitulé d'expérience ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="descriptionUpdateExperiences" class="form-control text-warning"
                                    placeholder="Une petite description sur ce dernier ... ***" required></textarea>
                            </td>
                            <td>
                                <button id="confirmerUpdateExperiences" class="btn btn-primary text-warning shadow mt-3">Enregistrer</button>
                            </td>
                            <td>
                                <button id="annulerUpdateExperiences" class="btn btn-secondary shadow mt-3">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#experiencesModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="experiencesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="experiencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="experiencesModalLabel">Éxpériences:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="../assets/images/iteams.jpg" class="rounded-circle shadow" alt="iTeam-$" width="70" height="70">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomOrganisation" class="col-form-label"><b><i>Nom d'organisation:</i></b></label>
                                <input type="text" id="nomOrganisation" class="form-control"
                                    placeholder="Entreprise et/ou institut supérieur ***" required>
                                
                                <label for="anneeExperience" class="col-form-label"><b><i>Année:</i></b></label>
                                <input type="text" id="anneeExperience" class="form-control"
                                    placeholder="Durée d'expérience ***" required>

                                <label for="typeExperience" class="col-form-label"><b><i>Type:</i></b></label>
                                <input type="text" id="typeExperience" class="form-control"
                                    placeholder="L'intitulé d'expérience ***" required>
                            </div>
                            <div class="form-group">
                                <label for="descriptionExperiences" class="col-form-label"><b><i>Descriptions:</i></b></label>
                                <textarea id="descriptionExperiences" class="form-control" 
                                    placeholder="Une petite description sur ce dernier ... ***" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="ajouterExperiences" type="button" class="btn btn-success">
                                <img src="../assets/images/ajouter.png" 
                                width="30" height="25" alt="ajouter" title="Plus d'informations">
                            </button>
                            <button id="sendExperiences" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- *************************************** DISTINCTIONS ******************************* -->
        <div class="row">
            <div id="distinctions" class="col-12">
                <!-- les distinctions d'une personne -->
                <div id="distinctionsToShow">
                    <p class="mt-3">Mes distinctions:</p>
                    <?php 
                        $distinctions = json_decode(file_get_contents((isset($_SERVER['HTTPS'])?"https":"http").'://'.$_SERVER['SERVER_NAME'].'/controllers/index.php?demande=getters/distinctions/'.$_SESSION['id']), true);
                    ?>
                    <table class="table table-bordered table-hover shadow rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Organisateur d'évènements</th>
                                <th class="text-center" scope="col">Date</th>
                                <th class="text-center" scope="col">Type</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center" scope="col">Rang</th>
                                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($distinctions as $distinction):?>
                                <tr id="distinctions_<?= $distinction['id']?>">
                                    <td id="organisateurDistinctions_<?= $distinction['id']?>"><?= $distinction['organisateur']?></td>
                                    <td id="anneeDistinctions_<?= $distinction['id']?>"><?= $distinction['annee']?></td>
                                    <td id="typeDistinctions_<?= $distinction['id']?>"><?= $distinction['type']?></td>
                                    <td id="descriptionDistinctions_<?= $distinction['id']?>"><?= $distinction['description']?></td>
                                    <td id="ordreDistinctions_<?= $distinction['id']?>"><?= $distinction['ordre']?></td>
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="distinctionsModifier_<?= $distinction['id']?>" class="btn btn-warning distinctionsModifier" type="button">
                                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                                        </button> 
                                    </td>  
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="distinctionsSupprimer_<?= $distinction['id']?>" class="btn btn-danger distinctionsSupprimer" type="button">
                                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered table-hover shadow rounded">
                    <tbody id="updateDistinctions">
                        <tr>
                            <td>
                                <textarea id="organisateurUpdateDistinctions" class="form-control text-warning"
                                    placeholder="Le(s) organisteur(s) de l'évènement ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="anneeUpdateDistinctions" class="form-control text-warning"
                                    placeholder="Moment de l'évènement ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="typeUpdateDistinctions" class="form-control text-warning"
                                    placeholder="L'évènement que vous avez participé ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="descriptionUpdateDistinctions" class="form-control text-warning"
                                    placeholder="Moment de l'évènement ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="ordreUpdateDistinctions" class="form-control text-warning"
                                    placeholder="Votre rang durant l'évènement ***" required></textarea>
                            </td>
                            <td>
                                <button id="confirmerUpdateDistinctions" class="btn btn-primary text-warning shadow mt-3">Enregistrer</button>
                            </td>
                            <td>
                                <button id="annulerUpdateDistinctions" class="btn btn-secondary shadow mt-3">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#distinctionsModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="distinctionsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="distinctionsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="distinctionsModalLabel">Distinctions:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="../assets/images/iteams.jpg" class="rounded-circle shadow" alt="iTeam-$" width="70" height="70">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="organisateurs" class="col-form-label"><b><i>Organisateur(s):</i></b></label>
                                <input type="text" id="organisateurs" class="form-control"
                                    placeholder="Le(s) organisteur(s) de l'évènement ***" required>
                                
                                <label for="anneeDistinction" class="col-form-label"><b><i>Année:</i></b></label>
                                <input type="text" id="anneeDistinction" class="form-control"
                                    placeholder="Moment de l'évènement ***" required>

                                <label for="typeDistinction" class="col-form-label"><b><i>Type:</i></b></label>
                                <input type="text" id="typeDistinction" class="form-control"
                                    placeholder="L'évènement que vous avez participé ***" required>
                                
                                <label for="rangDistinction"><b><i>Rang / ordre:</i></b></label>
                                <input type="numbre" id="rangDistinction" class="form-control"
                                    placeholder="Votre rang durant l'évènement ***" required>
                            </div>
                            <div class="form-group">
                                <label for="descriptionDistinction" class="col-form-label"><b><i>Discriptions:</i></b></label>
                                <textarea id="descriptionDistinction" class="form-control"
                                    placeholder="Une petite description sur l'évènement***" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button id="ajouterDistinctions" type="button" class="btn btn-success">
                                <img src="../assets/images/ajouter.png" 
                                width="30" height="25" alt="ajouter" title="Plus d'informations">
                            </button>
                            <button id="sendDistinctions" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>    
        <!-- ************************************** COMPETENCES ********************************* -->
        <div class="row">
            <div id="competences" class="col-12">
                <!-- les competences d'une personne -->
                <div id="competencesToShow">
                    <?php 
                        $competences = json_decode(file_get_contents((isset($_SERVER['HTTPS'])?"https":"http").'://'.$_SERVER['SERVER_NAME'].'/controllers/index.php?demande=getters/competences/'.$_SESSION['id']), true);
                    ?>
                    <p class="mt-3">Mes competences:</p>
                    <table class="table table-bordered table-hover shadow">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Nom</th>
                                <th class="text-center" scope="col">Liste</th>
                                <th class="text-center" scope="col">Catégorie</th>
                                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
                        </thead>
                        <tbody>
                            <?php foreach($competences as $competence):?>
                                <tr id="competences_<?= $competence['id']?>">
                                    <td id="nomCompetences_<?= $competence['id']?>"><?= $competence['nom']?></td>
                                    <td id="listeCompetences_<?= $competence['id']?>"><?= $competence['liste']?></td>
                                    <td class="text-center">
                                        <img src="../assets/images/<?= $competence['categorie']?>.png" class="rounded-circle" alt="categorie" width="40" height="40">
                                    </td>
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="competencesModifier_<?= $competence['id']?>" class="btn btn-warning competencesModifier" type="button">
                                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                                        </button> 
                                    </td>  
                                    <td class="text-center rounded bg-light shadow">
                                        <button id="competencesSupprimer_<?= $competence['id']?>" class="btn btn-danger competencesSupprimer" type="button">
                                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-bordered table-hover shadow rounded">
                    <tbody id="updateCompetences">
                        <tr>
                            <td>
                                <textarea id="nomUpdateCompetences" class="form-control text-warning" 
                                    placeholder="Votre compétence ***" required></textarea>
                            </td>
                            <td>
                                <textarea id="listeUpdateCompetences" class="form-control text-warning" 
                                    placeholder="Listes / descriptions ***" required></textarea>
                            </td>
                            <td>
                                <select id="iconeUpdateCompetences" class="form-control text-warning" required>
                                    <option value="0" selected>--- Veuillez en choisir ***</option>
                                    <option value="1">Mobile</option>
                                    <option value="2">Laptop</option>
                                    <option value="3">Stylo</option>
                                    <option value="4">Layers</option>
                                    <option value="5">Shield</option>
                                    <option value="6">Setting</option>
                                </select>
                            </td>
                            <td>
                                <button id="confirmerUpdateCompetences" class="btn btn-primary text-warning shadow mt-3">Enregistrer</button>
                            </td>
                            <td>
                                <button id="annulerUpdateCompetences" class="btn btn-secondary shadow mt-3">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal de competences -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#competencesModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="competencesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="competencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="competencesModalLabel">Compétences:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="../assets/images/iteams.jpg" class="rounded-circle shadow" alt="iTeam-$" width="70" height="70">
                                    </div>
                                </div>
                            </div>
                            <!-- les différentes icônes -->
                            <div class="container">
                                <div class="row">
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
                                        <img src="../assets/images/stylo.png" width="50" height="50" alt="laptop">
                                    </div>
                                    <div class="col-lg-2 col-4">
                                        <span class="font-weight-bold">Layers</span><br>
                                        <img src="../assets/images/layers.png" width="50" height="50" alt="laptop">
                                    </div>
                                    <div class="col-lg-2 col-4">
                                        <span class="font-weight-bold">Shield</span><br>
                                        <img src="../assets/images/shield.png" width="50" height="50" alt="laptop">
                                    </div>
                                    <div class="col-lg-2 col-4">
                                        <span class="font-weight-bold">Setting</span><br>
                                        <img src="../assets/images/parametre.png" width="50" height="50" alt="laptop">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <select id="icones_categories" class="form-control" required>
                                    <option value="0" selected>--- Veuillez en choisir ***</option>
                                    <option value="1">Mobile</option>
                                    <option value="2">Laptop</option>
                                    <option value="3">Stylo</option>
                                    <option value="4">Layers</option>
                                    <option value="5">Shield</option>
                                    <option value="6">Setting</option>
                                </select>
                                <input type="text" id="mes_competences" class="mt-2 form-control" 
                                    placeholder="Votre compétence ***" required>
                            </div>
                            <div class="form-group">
                                <label for="descritpionCompetences" class="col-form-label"><b><i>Descriptions:</i></b></label>
                                <textarea id="descritpionCompetences" class="form-control" 
                                    placeholder="Une petite description sur ce dernier ... ***" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button id="ajouterCompetences" type="button" class="btn btn-success">
                                <img src="../assets/images/ajouter.png" 
                                width="30" height="25" alt="ajouter" title="Plus d'informations">
                            </button>
                            <button id="sendCompetences" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<?php require_once('../includes/pied.php');?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/js_adding.js"></script>
<script type="text/javascript" src="../assets/js/js_setters.js"></script>

</body>
</html>
<?php
}
else
{?>
    <script>
        window.location.replace('../index.php');
    </script>
<?php
}
