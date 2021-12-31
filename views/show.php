<?php
session_start();?>
<!-- les fonctions d'une personne -->
<div id="fonctionsToShow">
    <p class="mt-3">Ma fonction:</p>
    <?php 
        $fonctions = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/getters/fonctions/'.$_SESSION['id']), true);
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
                        <button class="btn btn-warning" type="button">
                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                        </button> 
                    </td>  
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<!-- les formations qui vont s'afficher -->
<div id="formationsToShow">
    <p class="mt-3">Mes formations:</p>
    <?php 
        $formations = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/getters/formations/'.$_SESSION["id"]), true);
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
            <tr>
                <td><?= $formation['lieu']?></td>
                <td><?= $formation['annee']?></td>
                <td><?= $formation['type']?></td>
                <td><?= $formation['description']?></td>
                <td class="text-center rounded bg-light shadow">
                    <button class="btn btn-warning" type="button">
                        <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                    </button> 
                </td>  
                <td class="text-center rounded bg-light shadow">
                    <button class="btn btn-danger" type="button">
                        <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                    </button>
                </td> 
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<!-- les experiences de la personne -->
<div id="experiencesToShow">
    <p class="mt-3">Mes expériences:</p>
    <?php 
        $experiences = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/getters/experiences/'.$_SESSION['id']), true);
    ?>
    <table class="table table-bordered table-hover shadow">
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
                <tr>
                    <td><?= $experience['nom']?></td>
                    <td><?= $experience['annee']?></td>
                    <td><?= $experience['type']?></td>
                    <td><?= $experience['description']?></td>
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-warning" type="button">
                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                        </button> 
                    </td>  
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-danger" type="button">
                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<!-- les distinctions de la personne -->
<div id="distinctionsToShow">
    <?php 
        $distinctions = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/getters/distinctions/'.$_SESSION['id']), true);
    ?>
    <p class="mt-3">Mes distinctions:</p>
    <table class="table table-bordered table-hover shadow">
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
                <tr>
                    <td><?= $distinction['organisateur']?></td>
                    <td><?= $distinction['annee']?></td>
                    <td><?= $distinction['type']?></td>
                    <td><?= $distinction['description']?></td>
                    <td><?= $distinction['ordre']?></td>
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-warning" type="button">
                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                        </button> 
                    </td>  
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-danger" type="button">
                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<!-- les competences de la personne -->
<div id="competencesToShow">
    <?php 
        $competences = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/getters/competences/'.$_SESSION['id']), true);
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
                <tr>
                    <td><?= $competence['nom']?></td>
                    <td><?= $competence['liste']?></td>
                    <td class="text-center">
                        <img src="../assets/images/<?= $competence['categorie']?>.png" class="rounded-circle" alt="categorie" width="40" height="40">
                    </td>
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-warning" type="button">
                            <img src="../assets/images/modifier.png" alt="modifier" width="30" height="30">
                        </button> 
                    </td>  
                    <td class="text-center rounded bg-light shadow">
                        <button class="btn btn-danger" type="button">
                            <img src="../assets/images/supprimer.png" alt="supprimer" width="30" height="30">
                        </button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
