<?php
$informations = json_decode(file_get_contents('http://localhost/Interfaces-portfolio/controllers/informations'), true);
ob_start();
var_dump($informations);
$contenu = ob_get_clean();
include_once('../includes/entete_view.php');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $contenu ?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="../assets/js/js_informations.js"></script> -->
</body>
</html>
