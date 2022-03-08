<?php
session_start();

//PAGE PERMETTANT A L'UTILISATEUR DE MODIFIER SON PROFIL

include 'db.php';

if (isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
//MODIFICATION DU PSEUDO
   if (isset($_POST['newpseudo']) and !empty($_POST['newpseudo']) and $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id=' . $_SESSION['id']);
   }
//MODIFICATION DU MAIL
   if (isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id=' . $_SESSION['id']);
   }
//MODIFICATION DU MOT DE PASSE
   if (isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if ($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id=' . $_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
?>

<?php $title = 'Edition de profil' ?>
<?php $css = './CSS/inscriptionstyle.css' ?>

<?php ob_start(); ?>
   <body>
      <?php include('./NavBar.php'); ?>

      <div class="formEdition">
         <h2>Edition de mon profil</h2>
         <form method="POST" action="" enctype="multipart/form-data" class="edition">
            <label>Pseudo :</label>
            <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
            <label>Mail :</label>
            <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
            <label>Mot de passe :</label>
            <input type="password" name="newmdp1" placeholder="Mot de passe" /><br /><br />
            <label>Confirmation - mot de passe :</label>
            <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
            <input type="submit" value="Mettre à jour mon profil !" />
         </form>
         <?php if (isset($msg)) {
            echo $msg;
         } ?>
      </div>


      <?php include('./Footer.php'); ?>

   </body>

   </html>
<?php
} else {
   header("Location: connexion.php");
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
