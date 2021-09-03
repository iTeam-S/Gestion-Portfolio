<?php
    include("../models/requeteCompetence.php");

    if($_POST['langages']!="" AND $_POST['frameworks']!="" AND $_POST['system']!="" AND $_POST['outils']!="")
    {
        $tableauIdCategorie = array(3, 1, 6, 2);
        $tableauNomCompetence = array(
            'Langages informatiques' => strip_tags($_POST['langages']), 
            'Frameworks' => strip_tags($_POST['frameworks']), 
            'Administration système' =>  strip_tags($_POST['system']), 
            'Outils informatiques' => strip_tags($_POST['outils'])
        );
        
        $donnee = $reponse -> fetch();

        $i = 0;
        foreach($tableauNomCompetence as $cle => $valeur)
        {
            $requete -> execute(array(
                'nom' => $cle,
                'liste' => $valeur,
                'idCategorie' => $tableauIdCategorie[$i],
                'idMembre' => $donnee['id']
            ));
            $i++;
        }
        
        header('Location:../views/membre.php');
    }

    else
    {
        header('Location:../views/erreurs/erreurCompetence.php');
    }
?>