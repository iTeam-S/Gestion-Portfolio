<?php
   include('connectToDatabase.php');

   $reponse = $database -> query("SELECT id FROM membre ORDER BY id DESC LIMIT 0, 1");

   $requete = $database -> prepare("INSERT INTO formations(lieu, annee, type, description, id_membre) 
   VALUES(:lieu, :annee, :type, :descriptions, :idMembre)");
   
?>