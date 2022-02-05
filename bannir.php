<?php
session_start();
 

include 'db.php';




if (isset($_GET['IDcommentaire'])) {
    $supprimer = intval($_GET['IDcommentaire']);
    $delr = $bdd->prepare("DELETE FROM commentaires WHERE IDcommentaire = ?");
    $delr->execute(array($supprimer)); 
    header('Location:recette.php?IDrecettes=' . $_GET['IDrecettes']);
    

}