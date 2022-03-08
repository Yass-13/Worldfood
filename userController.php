<?php
session_start();
include 'db.php';


if (isset($_SESSION['id']) and $_SESSION['id'] > 0) {
//REQUETE SQL PERMETTANT D'IDENTIFIER LA SESSION PAR UTILISATEUR
    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
//REQUETE SQL PERMETTANT D'AFFICHER LES RECETTES PAR UTILISATEUR (POUR QUE L'UTILISATEUR PUISSE VOIR SES RECETTES POSTé)
    $recettes = $bdd->prepare('SELECT * FROM recettes WHERE IDmembre = ?');
    $recettes->execute(array($getid));
//REQUETE SQL PERMETTANT D'AFFICHER LES COMMENTAIRES PAR RECETTE (POUR QUE L'UTILISATEUR PUISSE VOIR SES COMMENTAIRES POSTé)
    $com = $bdd->prepare('SELECT recettes.IDrecettes, recettes.titreRecettes, commentaires.IDmembre, commentaires.contenu, commentaires.date FROM recettes INNER JOIN commentaires ON recettes.IDrecettes = commentaires.IDrecette
    WHERE commentaires.IDmembre = ?');
    $com->execute(array($getid));
}





if (isset($_GET['IDpays']) and $_GET['IDpays'] > 0) {
    //REQUETE SQL PERMETTANT DE RECUPERER LES DETAILS DE CHAQUE PAYS (DRAPEAU...)
    $getid = intval($_GET['IDpays']);
    $requser = $bdd->prepare('SELECT * FROM pays WHERE IDpays = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    //REQUETE SQL PERMETTANT  DE RECUPERER LES RECETTES PAR PAYS
    $countryRecipe = $bdd->prepare('SELECT * FROM recettes WHERE IDpays = ?');
    $countryRecipe->execute(array($getid));
}
