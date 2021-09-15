<?php
    include("../models/models_class.php");

    if($_POST['langages']!="" AND $_POST['frameworks']!="" AND $_POST['system']!="" AND $_POST['outils']!="")
    {
        $tableauIdCategorie = array(3, 1, 6, 2);
        $tableauNomCompetence = array(
            'Langages informatiques' => strip_tags($_POST['langages']), 
            'Frameworks' => strip_tags($_POST['frameworks']), 
            'Administration système' =>  strip_tags($_POST['system']), 
            'Outils informatiques' => strip_tags($_POST['outils'])
        );
        
        $competence = new Competence();
        $membre_id = new Membre();

        $reponse = $membre_id -> get_last_id_membre();

        $donnee = $reponse -> fetch();

        $i = 0;
        foreach($tableauNomCompetence as $cle => $valeur)
        {
            $information_competence = array(
                'nom' => $cle,
                'liste' => $valeur,
                'idCategorie' => $tableauIdCategorie[$i],
                'idMembre' => $donnee['id']
            );

            $competence -> inserer_information_competence();
            $i++;
        }
        
        unset($membre_id);
        unset($competence);
        
        header('Location:../views/membre.php');
    }

    else
    {
        header('Location:../views/erreurs/erreurCompetence.php');
    }
?>