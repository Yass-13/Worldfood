<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $membres = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $membres->execute(array($getid));
    if($membres->rowCount() > 0){
        
        $bannir = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannir->execute(array($getid));

        header('Location: membres.php');

    }
}


if (isset($_GET['IDcommentaire'])) {
    $supprimer = intval($_GET['IDcommentaire']);
    $delr = $bdd->prepare("DELETE FROM commentaires WHERE IDcommentaire = ?");
    $delr->execute(array($supprimer)); 
    header('Location:recette.php?IDrecettes=' . $_GET['IDrecettes']);
    

}