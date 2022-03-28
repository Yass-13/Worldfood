<?php

include 'userController.php';
//PAGE DYNAMIQUE PAR PAYS QUI AFFICHE LES DIFFERENTES RECETTES PAR PAYS
?>

<!DOCTYPE html>

<?php $title = 'Pays' ?>
<?php $css = './CSS/countrystyle.css' ?>

<?php ob_start(); ?>

<body>
    <section class="country">
        <?php include('./NavBar.php'); ?>
        <div class="Acceuil">
            <div class="recettes">
                <!-- DRAPEAU -->
                <div class="flag"><img src="./IMG/<?= $userinfo['flag'] ?>" alt="usa flag" class="Flag">
                    <h2><?= $userinfo['nomPays'] ?></h2>
                </div><br>

                <?php if (isset($_SESSION['id']) and !empty($_SESSION['id'])) { ?>
                    <!-- BOUTON POUR ACCEDER AU FORMULAIRE D'AJOUT DE RECETTE (UTILISABLE QUE SI L'UTILISATEUR EST CONNECTé) -->
                    <a class="css-button" href="./newrecette.php?IDpays=<?= $_GET['IDpays']; ?>">
                        <span class="css-button-icon"><i class="fa fa-hand-peace-o" aria-hidden="true"></i></span>
                        <span class="css-button-text">Ajoutez Votre Recette !</span>
                    </a>
                <?php } else { ?>
                    <a class="css-button">
                        <span class="css-button-icon"><i class="fa fa-hand-peace-o" aria-hidden="true"></i></span>
                        <span class="css-button-text">Connectez-vous pour ajouter une recette</span>
                    </a>
                <?php
                }
                ?>
                <div class="t">
                    <!-- ON AFFICHE LES RECETTES -->
                    <?php
                    while ($cr = $countryRecipe->fetch()) { ?>
                        <div class="articles">
                            <a href="./recette.php?IDrecettes=<?= $cr['IDrecettes']; ?>" class="btn btn-success btn-sm"><?= $cr['titreRecettes'] ?></a><img src="./IMG/<?= $cr['image'] ?>" class="x">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include('./Footer.php'); ?>
    </section>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>