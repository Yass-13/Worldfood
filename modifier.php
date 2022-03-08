<?php

//PAGE EDITION DE RECETTE POUR LE MODERATEUR

include 'Controller.php';


if (isset($_GET['IDrecettes'])) {
// POUR CHAQUE RECETTE LE MODERATEUR AURA ACCéS A UN FORMULAIRE QUI LUI PERMETTRA
// DE MODIFIER LE TITRE AINSI QUE LE CONTENU DE LA RECETTE
   if (isset($_POST['newtitre'])) {
      $newtitre = htmlspecialchars($_POST['newtitre']);
      $inserttitre = $bdd->prepare("UPDATE recettes SET titreRecettes = ? WHERE IDrecettes = ?");
      $inserttitre->execute(array($newtitre, $_GET['IDrecettes']));
      header('Location: recette.php?IDrecettes=' . $_GET['IDrecettes']);
   }
   if (isset($_POST['newcontenu'])) {
      $newcontenu = htmlspecialchars($_POST['newcontenu']);
      $insertcontenu = $bdd->prepare("UPDATE recettes SET contenuRecette = ? WHERE IDrecettes = ?");
      $insertcontenu->execute(array($newcontenu, $_GET['IDrecettes']));
      header('Location: recette.php?IDrecettes=' . $_GET['IDrecettes']);
   }

?>


   <html>

   <?php $title = 'Edition de Recette' ?>
   <?php $css = './CSS/inscriptionstyle.css' ?>

   <?php ob_start(); ?>

   <body>
      <?php include('./NavBar.php'); ?>

      <div class="formEdition">
         <h2>Edition de la Recette</h2>
         <form method="POST" action="" enctype="multipart/form-data" class="edition">
            <label>Titre :</label>
            <input type="text" name="newtitre" placeholder="titre" value="<?php echo $recipeInfo['titreRecettes']; ?>" /><br /><br />
            <label>Contenu recette :</label>
            <textarea name="newcontenu" placeholder="contenu"><?php echo $recipeInfo['contenuRecette']; ?></textarea><br /><br />
            <input type="submit" value="Mettre à jour la Recette !" />
         </form>
      </div>


      <?php include('./Footer.php'); ?>

   </body>

   <?php $content = ob_get_clean(); ?>

   <?php require('template.php'); ?>

   </html>

<?php
}
?>