<?php 

class GestionErreur
{
    public function erreur_prenom_usuel()
    {
        header("Location:../views/erreurs/erreurPrenomUsuel.php");
    }

    public function erreur_membre()
    {
        header("Location:../views/erreurs/erreurMembre.php");
    }
}

class MembreControllers extends GestionErreur
{
    
}