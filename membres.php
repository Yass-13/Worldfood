<?php

include 'Controller.php';
//PAGE PROFIL ADMINISTRATEUR ET MODERATEUR
?>

<html>
<?php $title = 'Votre Profil' ?>
<?php $css = './CSS/profilcss.css' ?>

<?php ob_start(); ?>

<body>
    <?php include('./Navbar.php'); ?>
    
    <h2>Bonjour <?php echo $_SESSION['pseudo']; ?> ! </h2>
<!-- ICI ON VERIFIE SI L'UTILISATEUR EST UN ADMINISTRATEUR ET ON AFFICHE SA PAGE D'ADMINISTRATION  -->
    <?php if ($_SESSION['tipe'] == 'admin') { ?>
        <div class="perso">
<!-- ON AFFICHE LES MEMBRES INSCRITS AVEC LA POSSIBILITé DE SUPPRIMER ET DE GERER LES MODERATEURS ET LES UTILISATEUR -->
            <div class="members">
                <h3>Les Membres</h3>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Adresse Mail</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Gestion</th>
                        </tr>
                    </thead>
                    <?php
                    while ($m = $displayUsers->fetch()) { ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $m['pseudo']  ?></th>
                                <td><?= $m['tipe']  ?></td>
                                <td><?= $m['mail'] ?></td>
                                <td><a href="membres.php?supprime=<?= $m['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                                <td>
                                    <?php if ($m['tipe'] == 'user') { ?>
                                        <a href="modifier.php?upgrade=<?= $m['id'] ?>" class="btn btn-success" >Promouvoir a Moderateur </a>
                                    <?php } ?>
                                    
                                    <?php if ($m['tipe'] == 'mod') { ?>
                                        <a href="modifier.php?demote=<?= $m['id'] ?> " class="btn btn-info">Retrograder </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>                
            </div>
<!-- ICI ON AFFICHé LES RECETTES POSTé SUR LE SITE, ON POURRA ACCEDER A LA PAGE POUR VOIR LES DETAILS DE LA RECETTE ET AUSSI
     SUPPRIMER LES COMMENTAIRES SOUS LA RECETTE -->
            <div class="myrecipes">
                <h3>Les Recettes Posté</h3>
                <?php
                while ($r = $displayRecipes->fetch()) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="./IMG/<?= $r['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $r['titreRecettes'] ?></h5>
                            <a href="./recette.php?IDrecettes=<?= $r['IDrecettes'] ?>" class="btn btn-primary">Voir Recette</a>
                            <a href="membres.php?supprimer=<?= $r['IDrecettes'] ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
<!-- ICI SI A LA CONNEXION L'UTILISATEUR N'EST NI UN ADMINSTRATEUR NI UN UTILSATEUR ON AFFICHE L'INTERFACE DU MODERATEUR -->
    <?php } else { ?>
        <div class="perso">
            <div class="myrecipes">
            <!-- LE MODERATEUR POURRA AVOIR ACCES A TTE LES RECETTES DU SITE IL POURRA MODIFIER LE CONTENU DES RECETTES
             ET GERER L'ESPACE COMMENTAIRE -->
                <h3>Gestion des Recettes et Commentaires</h3>
                <?php
                while ($r = $displayRecipes->fetch()) { ?>

                    <div class="card" style="width: 18rem;">
                        <img src="./IMG/<?= $r['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $r['titreRecettes'] ?></h5>
                            <a href="./recette.php?IDrecettes=<?= $r['IDrecettes'] ?>" class="btn btn-primary">Voir Recette</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php } ?>
    <?php include('./Footer.php'); ?>
</body>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>