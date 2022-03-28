<?php

session_start();
include 'db.php';
//PAGE D'ACCEUIL DU SITE
?> 

    <?php $title = 'Bienvenue sur WorldFood'?>
    <?php $css = './CSS/indexcss.css' ?>
    

<?php ob_start(); ?>   <!--FONCTION PHP QUI PERMET D'IMPLEMENTER CETTE PARTIE DE LA PAGE DANS LE TEMPLATE-->
<body class="bodyindex">
    <?php include('./NavBar.php'); ?>  <!-- BARRE DE NAVIGATION -->
    <div class="Acceuil">

        <div class="recettes">
            
            <div class="vues">
                <span class="titre"><h1>LES MEILLEURES RECETTES</h1></span>
                <div><img src="./IMG/pancake.jpg" alt="pancakes"><a href="recette.php?IDrecettes=1" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/lasagnes.jpg" alt="lasagnes"><a href="recette.php?IDrecettes=2" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/burger.jpg" alt="burger"><a href="recette.php?IDrecettes=3" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/cake.jpg" alt="cake"><a href="recette.php?IDrecettes=4" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/chicken.jpg" alt="chicken"><a href="recette.php?IDrecettes=5" class="btn btn-warning">Voir recette</a></div>
                <div><img src="./IMG/cookies.jpg" alt="cookies"><a href="recette.php?IDrecettes=6" class="btn btn-warning">Voir recette</a></div>
            </div>
        </div>

    </div>


    <?php include('./Footer.php'); ?>  <!-- PIED DE PAGE -->
</body>

</html>

<?php $content = ob_get_clean(); ?> <!-- FIN DE L'IMPLENTATION -->

<?php require('template.php'); ?>
