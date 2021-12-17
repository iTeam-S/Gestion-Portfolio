<?php
session_start();
$informations = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/informations/'.$_SESSION["id"]), true);
ob_start();
?>
<p class="mt-3">Mes formations:</p>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">Lieu</th>
            <th scope="col">Année</th>
            <th scope="col">Type</td>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($informations['formation'] as $formation):?>
        <tr>
            <td><?= $formation['lieu']?></td>
            <td><?= $formation['annee']?></td>
            <td><?= $formation['type']?></td>
            <td><?= $formation['description']?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<p class="mt-3">Ma fonction:</p>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">Fonction</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($informations['fonction'] as $fonction):?>
            <tr>
                <td><?= $fonction['nom']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<p class="mt-3">Mes expériences:</p>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nom de l'entreprise</th>
            <th scope="col">Année</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($informations['experience'] as $experience):?>
            <tr>
                <td><?= $experience['nom']?></td>
                <td><?= $experience['annee']?></td>
                <td><?= $experience['type']?></td>
                <td><?= $experience['description']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<p class="mt-3">Mes distinctions:</p>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">Organisateur d'évènements</th>
            <th scope="col">Date</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Rang</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($informations['distinction'] as $distinction):?>
            <tr>
                <td><?= $distinction['organisateur']?></td>
                <td><?= $distinction['annee']?></td>
                <td><?= $distinction['type']?></td>
                <td><?= $distinction['description']?></td>
                <td><?= $distinction['ordre']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<p class="mt-3">Mes competences:</p>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Liste</th>
            <th scope="col">Catégorie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($informations['competence'] as $competence):?>
            <tr>
                <td><?= $competence['nom']?></td>
                <td><?= $competence['liste']?></td>
                <td><?= $competence['categorie']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php
$contenu = ob_get_clean();
require_once('../includes/entete_view.php');
?>
<section class="mt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class=" col-12 shadow rounded table-responsive mt-5">
                <?= $contenu ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('../includes/pied_view.php');?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
