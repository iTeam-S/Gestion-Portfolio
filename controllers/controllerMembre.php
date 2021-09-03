<?php 
    include('../models/requeteMembre.php');

    // echo '<pre>';
    // var_dump($_POST);
    // echo "</pre>";
    if($_POST['nomPersonne']!="" AND $_POST['prenomsPersonne']!="" AND $_POST['tel1']!="" AND $_POST['email']!="")
    {
        while($donnee = $reponses ->fetch())
        {
            if($donnee['prenom_usuel'] == $_POST['prenomUsuel'])
            {
                header("Location:../views/erreurs/erreurPrenomUsuel.php");
            }
        }

        $requete -> execute(array(
            'nom' => strip_tags($_POST['nomPersonne']), 
            'prenom' => strip_tags($_POST['prenomsPersonne']),
            'prenom_usuel' => strip_tags($_POST['prenomUsuel']),
            'user_github' => strip_tags($_POST['usernameGithub']),
            'user_github_pic' => strip_tags($_POST['githubAvatar']),
            'tel1'=> strip_tags($_POST['tel1']),
            'tel2' => strip_tags($_POST['tel2']),
            'mail' => strip_tags($_POST['email']),
            'facebook' => strip_tags($_POST['facebook']),
            'linkedin' => strip_tags($_POST['linkedin']),
            'cv' => strip_tags($_POST['cv']),
            'adresse' => strip_tags($_POST['adresse']),
            'descriptions' => strip_tags($_POST['descriptions']),
            'fonction' => strip_tags($_POST['fonction'])
        ));

        header("Location:../views/formation.php");
    }

    else
    {
        header("Location:../views/erreurs/erreurMembre.php");
    }

?>