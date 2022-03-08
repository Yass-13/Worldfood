<?php
session_start();

include 'db.php';

//PAGE POUR AJOUTER UNE NOUVELLE RECETTE
require 'uploadFile.php';
//CLASSE PHP PERMETTANT DE CHARGER UNE IMAGE POUR SA RECETTE
$upload = new uploadFile();


//QUAND ON RECOIT LE PARAMETRE 'publier'
//ON EXECUTE LA REQUETE SQL QUI AJOUTE LA RECETTE A LA BASE DE DONNéES
if (isset($_POST['publier'])) {
    $pays = intval($_GET['IDpays']);
    $membre = intval($_SESSION['id']);
    $titreRecett = htmlspecialchars($_POST['title']);
    $contenuRecett = htmlspecialchars($_POST['contenu']);
    $img = htmlspecialchars($_FILES['fileToUpload']['name']);
    $upload->upload($_FILES);
    $insertrecett = $bdd->prepare("INSERT INTO recettes(IDpays, IDmembre, titreRecettes, contenuRecette, image) VALUES(?, ?, ?, ?, ?)");
    $insertrecett->execute(array($pays, $membre, $titreRecett, $contenuRecett, $img));
}
?>

<!DOCTYPE html>
<html>

<?php $title = 'Nouvelle Recette' ?>
<?php $css = './CSS/newrecettestyle.css' ?>

<?php ob_start(); ?>

<body>
    <?php include('./NavBar.php'); ?>


    <div class="FFF">
        <h1>Ajoutez ici votre recette !</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="formadd">
            Prenez une belle photo de vore plat:
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
                <label class="custom-file-label" for="fileToUpload"></label>
            </div>
           
            <h4>Mettez un titre</h4>
            <input type="text" id="titre" name="title">
            <h4>Expliquez nous comment faire votre plat</h4>
            <textarea placeholder="mettez les ingredients et la préparation de votre recette..." name="contenu"></textarea>
            <input type="submit" placeholder="Publier" name="publier" class=" btn btn-primary" >

        </form>
    </div>



    <?php include('./Footer.php'); ?>

</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>