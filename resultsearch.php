<?php

include 'db.php';

if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = ($_GET['q']);
    $searchrec = $bdd->query('SELECT * FROM recettes WHERE titreRecettes LIKE "%' . $q . '%" ');
}
?>

<!-- PAGE QUI AFFICHE LES RESULTAT DE LA BARRE DE RECHERCHE -->

<!DOCTYPE html>
<html>

<?php $title = 'Resultat de votre Recherche' ?>
<?php $css = './CSS/indexcss.css' ?>


<?php ob_start(); ?>

<body class="bodyindex">
    <?php include('./NavBar.php'); ?>
    <div class="Acceuil">
<!-- ON AFFICHE LES RECETTES RECEHERCHéS -->
        <div class="recettes">
            <div class="vues">
                <div>
                    <?php while ($a = $searchrec->fetch()) { ?>
                        <img src="./IMG/<?= $a['image'] ?>"><a href="./recette.php?IDrecettes=<?= $a['IDrecettes'] ?>" class="btn btn-warning"> Voir <?= $a['titreRecettes'] ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>


    <?php include('./Footer.php'); ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>