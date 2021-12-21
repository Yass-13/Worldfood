<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $membres = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $membres->execute(array($getid));
    if($membres->rowCount() > 0){
        
        $retrograder = $bdd->prepare('UPDATE membres SET tipe = "user" WHERE id = ?');
        $retrograder->execute(array($getid));

        header('Location: membres.php');

    }else{
        echo "aucun utilisateur trouvé";
    }
}else{
    echo "l'identifiant n'a pas été recuperé";
}