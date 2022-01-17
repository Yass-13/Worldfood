<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
$membres = $bdd->prepare('SELECT IDrecettes, titreRecettes, contenuRecette FROM recettes');
$membres->execute();
$bonjour= $membres->fetchAll();


?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/indexcss.css">
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


<body class="bodyindex">
    <?php include('./NavBar.php'); ?>
    <div class="Acceuil">

        <div class="recettes">
            <div class="vues">
                <div><img src="./IMG/pancake.jpg" alt="pancakes"><a href="recette.php?IDrecettes=1">Voir recette</a></div>
                <div><img src="./IMG/lasagnes.jpg" alt="lasagnes"><a href="recette.php?IDrecettes=2">Voir recette</a></div>
                <div><img src="./IMG/burger.jpg" alt="burger"><a href="recette.php?IDrecettes=3">Voir recette</a></div>
                <div><img src="./IMG/cake.jpg" alt="cake"><a href="recette.php?IDrecettes=4">Voir recette</a></div>
                <div><img src="./IMG/chicken.jpg" alt="chicken"><a href="recette.php?IDrecettes=5">Voir recette</a></div>
                <div><img src="./IMG/cookies.jpg" alt="cookies"><a href="recette.php?IDrecettes=6">Voir recette</a></div>
            </div>
        </div>

    </div>
    <?php include('./Footer.php'); ?>
</body>

</html>
