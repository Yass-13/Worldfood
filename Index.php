<?php

session_start();
include 'db.php';
//PAGE D4ACCEUIL DU SITE
?> 

    <?php $title = 'Bienvenue sur WorldFood'?>
    <?php $css = './CSS/indexcss.css' ?>
    

<?php ob_start(); ?>
<body class="bodyindex">
    <?php include('./NavBar.php'); ?>
    <div class="Acceuil">

        <div class="recettes">
            <div class="vues">
                <div><img src="./IMG/pancake.jpg" alt="pancakes"><a href="recette.php?IDrecettes=1" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/lasagnes.jpg" alt="lasagnes"><a href="recette.php?IDrecettes=2" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/burger.jpg" alt="burger"><a href="recette.php?IDrecettes=3" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/cake.jpg" alt="cake"><a href="recette.php?IDrecettes=4" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/chicken.jpg" alt="chicken"><a href="recette.php?IDrecettes=5" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/cookies.jpg" alt="cookies"><a href="recette.php?IDrecettes=6" class="btn btn-warning">Voir recette</a></div>
            </div>
        </div>

    </div>


    <?php include('./Footer.php'); ?>
</body>

</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
