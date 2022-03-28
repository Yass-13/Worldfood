<?php

include 'Controller.php';
//PAGE DE DETAILS DE LA RECETTE
?>

<!DOCTYPE html>
<html>

<?php $title = 'Votre Recette' ?>
<?php $css = './CSS/recettestyle.css' ?>

<?php ob_start(); ?>

<body>
    <?php include('./NavBar.php'); ?>
    <div class="RECETTE">
        <div class="recette">
            <!-- ICI LE MODERATEUR AURA ACCES A UN BOUTON QUI LUI PERMETRRA DE MODIFIER LA RECETTE -->
            <?php
            if (isset($_SESSION['tipe']) and $_SESSION['tipe'] == 'mod') {
            ?>
            <a href="modifier.php?IDrecettes=<?= $recipeInfo['IDrecettes'] ?>" class="btn btn-success" >MODIFIER RECETTE</a>
            <?php
            }
            ?>
            <!-- LE TITRE DE LA RECETTE -->
            <h1><?= $recipeInfo['titreRecettes']; ?></h1>
            <div class="ban">
            <!-- LE CONTENU DE LA RECETTE                                   L'IMAGE DE LA RECETTE -->
                <p><?= nl2br($recipeInfo['contenuRecette']); ?></p><img src="./IMG/<?= $recipeInfo['image'] ?>">
            </div>
        </div>

        <div class="com">
            <!-- SOUS LA RECETTE ON AFFICHE LES COMMENTAIRES -->
            <?php while ($c = $comRecipe->fetch()) { ?>
                <div>
            <!-- L'ADMINISTRATEUR ET LE MODERATEUR POURRONT SUPPRIMER LES COMMENTAIRES -->
                    <?php
                    if (isset($_SESSION['tipe']) and $_SESSION['tipe'] == 'admin' || $_SESSION['tipe'] == 'mod') {

                    ?>
                    <a href="modifier.php?IDcommentaire=<?= $c['IDcommentaire'] ?>&IDrecettes=<?= $c['IDrecettes'] ?>" class="btn btn-danger">Supprimer commentaire</a>
                    <?php
                    }
                    ?>
                    <h3><?= $c['pseudo'] ?> </h3>
                    <h4><?= $c['date'] ?></h4>
                </div>
                <p><?= $c['contenu'] ?></p>
            <?php } ?>
        </div>

        <div class="Addcom">
            <!-- ESPACE POUR POSTER UN NOUVEAU COMMENTAIRE -->
            <h2>Ajouter un commentaire !!!</h2>
            <form method="POST" class="comform">
                <?php if (isset($_SESSION['id']) and !empty($_SESSION['id'])) { ?>
                    <textarea name="com"></textarea>
                    <input type="submit" name="postcom" value="Envoyer !" />
            <!-- IL SERA UTILISABLE QUE SI L'UTILSATEUR EST CONNECTé  -->
                <?php } else {
                ?>
                    <p>Il faut être connecté pour pouvoir poster un commentaire</p>
                    <textarea disabled name="com"></textarea>
                    <input type="submit" name="postcom" value="Envoyer !" style="display: none;" />
                <?php } ?>
            </form>

        </div>

    </div>



    <?php include('./Footer.php'); ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>