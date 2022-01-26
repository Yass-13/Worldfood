<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

require 'uploadFile.php';

$upload = new uploadFile();



if (isset($_POST['publier'])){
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/newrecettestyle.css">
    <link rel="stylesheet" href="./CSS/navbarcss.css">
    <link rel="stylesheet" href="./CSS/footercss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sidebarBtn').click(function() {
                $('.sidebar').toggleClass('active');
                $('.sidebarBtn').toggleClass('toggle');
            })
        })
    </script>
</head>

<body>
    <?php include('./NavBar.php'); ?>

   
    <div class="FFF"> 
        <h1>Ajoutez ici votre recette !</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="formadd">
            Prenez une belle photo de vore plat:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <h4>Mettez un titre</h4>
            <input type="text" id="titre" name="title">
            <h4>Expliquez nous comment faire votre plat</h4>
            <textarea placeholder="mettez les ingredients et la préparation de votre recette..." name="contenu"></textarea>
            <input type="submit" placeholder="Publier" name="publier">

        </form>
    </div>



    <?php include('./Footer.php'); ?>

</body>

</html>