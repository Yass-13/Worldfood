<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

$requser = $bdd->query('SELECT IDrecettes, titreRecettes, contenuRecette FROM recettes WHERE IDpays = 1');

while($recette = $requser->fetch()){
    echo $recette['titreRecettes']; ?><a href="../recette.php?idRecettes=<?= $recette['IDrecettes']; ?>">voir recette</a>
    <?php
    }
    ?>







<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./countrystyle.css">
    <link rel="stylesheet" href="./navbarcss.css">
    <link rel="stylesheet" href="./footercss.css">
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
    <section class="country">
        
        <div class="Acceuil">
            <div class="recettes">
                <div class="flag"><img src="../IMG/africa flag.png" alt="africa flag" class="Flag"></div>
            </div>
        </div>
        <?php include('./Footer.php'); ?>
    </section>
</body>