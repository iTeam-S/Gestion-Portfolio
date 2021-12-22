<?php session_start();
if(!empty($_SESSION['id']))
{
require_once('../includes/entete_view.php'); ?>
<section class="pt-5 pb-3">
    <div class="container table-responsive mt-5 border rounded shadow" id="informations">
        <!-- ************************************ FORMATIONS ******************************* -->
        <div class="row">
            <div id="formations" class="col-12">
                <!-- les formations de la personne vont s'afficher ici -->
            </div>
            <!-- Modal pour ajouter des formations -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formationsModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="formationsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- ************************************ FONCTIONS ********************************* -->
        <div class="row">
            <div id="fonctions" class="col-12">
                <!-- les fonctions de la personne au sein de iTeam-$ -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fonctionsModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="fonctionsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
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
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#experiencesModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="experiencesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
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
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#distinctionsModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="distinctionsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
            </div>
            <!-- Modal de competences -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#competencesModal" data-whatever="@getbootstrap">Ajouter</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="competencesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Compétences:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                <label for="descritpionCompetences" class="col-form-label">Descriptions:</label>
                                <textarea id="descritpionCompetences" class="form-control" 
                                    placeholder="Une petite description sur ce dernier ... ***" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button id="sendFormations" type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<?php require_once('../includes/pied_view.php');?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/js_informations.js"></script>
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
