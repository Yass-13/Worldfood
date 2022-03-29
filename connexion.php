<?php
session_start();

include 'db.php';

// ON VERIFIE QUE LE FORMULAIRE DE CONNEXION A BIEN ETE ENVOYé 
if (isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];


   $requser = $bdd->query("SELECT * FROM membres WHERE mail = '" . $mailconnect . "'");
   $userexist = $requser->rowCount();
   if ($userexist == 1) {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['motdepasse'] = $userinfo['motdepasse'];
      $_SESSION['mail'] = $userinfo['mail'];
      $_SESSION['tipe'] = $userinfo['tipe'];
      // ET ON EST DIRIGé VERS NOTRE PAGE PROFIL
      header("Location: profil.php?id=" . $_SESSION['id']);
      // LES ADMINISTRATEUR ET LES MODERATEURS ACCEDENT A UNE PAGE DIFFERENTE QU'UN UTILISATEUR BASIQUE
      if ($userinfo['tipe'] == 'admin' or $userinfo['tipe'] == 'mod') {
         header("Location:membres.php");
      } else {
         header("Location: profil.php?id=" . $_SESSION['id']);
      }
   } else {
      $erreur = "Mauvais mail ou mot de passe !";
   }
} else {
   $erreur = "Tous les champs doivent être complétés !";
}

?>

<?php $title = 'Connexion' ?>
<?php $css = './CSS/connexionstyle.css' ?>

<?php ob_start(); ?>

<body>
   <?php include('./NavBar.php'); ?>
   <div class="Formular">
      <div class="formularii">
         <form method="POST" action="" class="connect">

            <div class="form-floating mb-3">
               <input type="email" class="form-control" id="floatingInput" name="mailconnect" placeholder="name@example.com">
               <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
               <input type="password" class="form-control" id="floatingPassword" name="mdpconnect" placeholder="Password">
               <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-light" name="formconnexion" type="submit">Se connecter !</button>

         </form>
      </div>
   </div>
   <?php include('./Footer.php'); ?>
</body>

</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>