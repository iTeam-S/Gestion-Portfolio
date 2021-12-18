<?php
session_start();
if(!empty($_SESSION['id']))
{
    $informations = json_decode(file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/Interfaces-portfolio/controllers/informations/'.$_SESSION["id"]), true);
    // ob_start();
    ?>
    <p class="mt-3">Mes formations:</p>
    <table class="table table-bordered table-hover">
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
            <?php foreach($informations['formation'] as $formation):?>
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

    <hr>
    <p class="mt-3">Ma fonction:</p>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="text-center" scope="col">Fonction</th>
                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($informations['fonction'] as $fonction):?>
                <tr>
                    <td><?= $fonction['nom']?></td>
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
    <hr>
    <p class="mt-3">Mes expériences:</p>
    <table class="table table-bordered table-hover">
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
            <?php foreach($informations['experience'] as $experience):?>
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <button id="ajouter" class="btn btn-primary font-weight-bold"><img src="../assets/images/ajouter.png" alt="ajouter" width="30" height="30"></button>
            </div>
        </div>
    </div>
    <hr>
    <p class="mt-3">Mes distinctions:</p>
    <table class="table table-bordered table-hover">
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
            <?php foreach($informations['distinction'] as $distinction):?>
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
    <hr>
    <p class="mt-3">Mes competences:</p>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="text-center" scope="col">Nom</th>
                <th class="text-center" scope="col">Liste</th>
                <th class="text-center" scope="col">Catégorie</th>
                <th class="text-center text-warning rounded" scope="col">Modifier</th>
                <th class="text-center text-danger rounded" scope="col">Supprimer</th>
        </thead>
        <tbody>
            <?php foreach($informations['competence'] as $competence):?>
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
    <hr>
    <?php
    // $contenu = ob_get_clean();
}
else
{?>
    <script>
        window.location.replace('../index.php');
    </script>
<?php
}
require_once('../includes/pied_view.php');
?>
