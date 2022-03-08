<?php

include 'userController.php';

//PAGE UTILISATEUR
?>
<html>

<?php $title = 'Votre Profil' ?>
<?php $css = './CSS/profilcss.css' ?>

<?php ob_start(); ?>

<body>
   <?php include('./Navbar.php'); ?>
   <h2>Bonjour <?php echo $_SESSION['pseudo']; ?> ! </h2>

   <div class="perso">
      <div class="myrecipes">
         <h3>Mes Recettes</h3>
         <!-- L'UTILSATEUR PEUT VOIR LES RECETTES QU'IL A POSTé -->
         <?php
                while ($r = $recettes->fetch()) { ?>

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
      <div class="mycomments">
         <h3>Mes Commentaires</h3>
         <!-- L'UTILSATEUR POURRA VOIR SES COMMENTAIRES AINSI QUE LES RECETTES COMMENTéS -->
         <?php

         while ($c = $com->fetch()) { ?>

            <div class="mescom">
               <span> <a href="./recette.php?IDrecettes=<?= $c['IDrecettes'] ?>"><?= $c['titreRecettes'] ?></a></span>
               <span><?= $c['contenu'] ?></span>
               <span><?= $c['date'] ?>
            </div></span>

         <?php
         }
         ?>
      </div>
   </div>
   <?php include('./Footer.php'); ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


</html>