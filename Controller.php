<?php
session_start();


include 'db.php';

//REQUETE SQL QUI RECUPERE LES DETAILS D'UNE RECETTE QUAND ON SE REND SUR SA PAGE
if (isset($_GET['IDrecettes']) and $_GET['IDrecettes'] > 0) {       //ON VERIFIE QUE L'ID DE LA RECETTE EXISTE
    $getid = intval($_GET['IDrecettes']);                             // ON L'ASSIGNE A UNE VARIABLE
    $reqRecipe = $bdd->prepare('SELECT * FROM recettes WHERE IDrecettes = ?'); //ON PREPARE LA REQUETE EN SELECTIONNANT TOUTES LES INFOS SELON L'ID DE LA RECETTE
    $reqRecipe->execute(array($getid));                                     // ON EXECUTE LA REQUETE 
    $recipeInfo = $reqRecipe->fetch();                                      //ON STOCKE LES INFOS DANS UNE VARIABLE GRACE A fetch()
    //REQUETE SQL QUI PERMET AFFICHER LES COMMENTAIRES PAR RECETTE
    $comRecipe = $bdd->prepare('SELECT recettes.IDrecettes, commentaires.IDcommentaire, membres.pseudo, commentaires.contenu, commentaires.date FROM recettes INNER JOIN commentaires ON commentaires.IDrecette = recettes.IDrecettes INNER JOIN membres ON commentaires.IDmembre = membres.id WHERE IDrecettes = ?');
    $comRecipe->execute(array($getid));
}


//REQUETE SQL QUI PERMET D'AJOUTER UN COMMENTAIRE
if (isset($_POST['com'])) {
    $user = intval($_SESSION['id']);
    $comment = htmlspecialchars($_POST['com']);
    $date = date("d.m.y");

    $ins = $bdd->prepare("INSERT INTO commentaires(IDrecette, IDmembre, contenu, date) VALUES(?, ?, ?, ?)");
    $ins->execute(array($getid, $user, $comment, $date));
}

//REQUETES SQL QUI PERMETTENT D'AFFICHER LES MEMBRES ET LES RECETTES (ADMINISTRATEUR)
$displayUsers = $bdd->query('SELECT * FROM membres ORDER BY tipe ASC');
$displayRecipes = $bdd->query('SELECT * FROM recettes ');


//REQUETE SQL QUI PERMET DE PROMOUVOIR UN UTILISATEUR A MODERATEUR
if (isset($_GET['upgrade'])) {
    $upgrade = intval($_GET['upgrade']);
    $upgradeUser = $bdd->prepare('UPDATE membres SET tipe = "mod" WHERE id = ? ');
    $upgradeUser->execute(array($upgrade));
    header('Location: membres.php');
}

//REQUETE SQL QUI PERMET DE RETROGRADER UN MODERATEUR A UTILISATEUR
if (isset($_GET['demote'])) {
    $demote = intval($_GET['demote']);
    $demoteUser = $bdd->prepare('UPDATE membres SET tipe = "user" WHERE id = ? ');
    $demoteUser->execute(array($demote));
    header('Location: membres.php');
}

//REQUETE SQL QUI SUPPRIME UN UTILISATEUR DE LA BASE DE DONNéES
if (isset($_GET['supprime'])) {
    $supprime = intval($_GET['supprime']);
    $del = $bdd->prepare("DELETE FROM membres WHERE id = ?");
    $del->execute(array($supprime));
    header('Location: membres.php');
}

//REQUETE SQL QUI SUPPRIME UNE RECETTE DE LA BASE DE DONNéES
if (isset($_GET['supprimer'])) {
    $supprimer = intval($_GET['supprimer']);
    $delr = $bdd->prepare("DELETE FROM recettes WHERE IDrecettes = ?");
    $delr->execute(array($supprimer));
    header('Location: membres.php');
}

//REQUETE SQL QUI PERMET DE SUPPRIMER UN COMMENTAIRE
if (isset($_GET['IDcommentaire'])) {
    $supprimer = intval($_GET['IDcommentaire']);
    $delr = $bdd->prepare("DELETE FROM commentaires WHERE IDcommentaire = ?");
    $delr->execute(array($supprimer));
    header('Location:recette.php?IDrecettes=' . $_GET['IDrecettes']);
}

