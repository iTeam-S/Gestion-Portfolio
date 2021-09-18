<?php 
    include_once('../models/models_class.php');

    // echo '<pre>';
    // var_dump($_POST);
    // echo "</pre>";
    if(!empty($_POST['nomPersonne']) AND !empty($_POST['prenomsPersonne']) AND !empty($_POST['tel1']) AND !empty($_POST['email']))
    {
        $membre = new MembreModels();
        $reponses = $membre -> get_prenom_usuel();

        while($donnee = $reponses ->fetch())
        {
            if($donnee['prenom_usuel'] == $_POST['prenomUsuel'])
            {
                header("Location:../views/erreurs/erreurPrenomUsuel.php");
            }
        }

        $informations_membre = array(
            'nom' => strip_tags($_POST['nomPersonne']), 
            'prenom' => ucwords(strip_tags($_POST['prenomsPersonne'])),
            'prenom_usuel' => ucwords(strip_tags($_POST['prenomUsuel'])),
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
        );

        $membre -> inserer_information_membre($informations_membre);
        unset($membre);
        header("Location:../views/view.f.php");
    }

    else
    {
        header("Location:../views/erreurs/erreurMembre.php");
    }

?>