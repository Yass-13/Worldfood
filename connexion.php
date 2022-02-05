<?php
session_start();


include 'db.php';

if (isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if (!empty($mailconnect) and !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if ($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['tipe'] = $userinfo['tipe'];
         header("Location: profil.php?id=" . $_SESSION['id']);
         if ($userinfo['tipe'] == 'admin' OR $userinfo['tipe'] == 'mod') {
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
}
?>
<html>

<head>
   <title>TUTO PHP</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="./CSS/connexionstyle.css">
   <link rel="stylesheet" href="./CSS/navbarcss.css">
   <link rel="stylesheet" href="./CSS/footercss.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $('.sidebarBtn').click(function() {
            $('.sidebar').toggleClass('active');
            $('.sidebarBtn').toggleClass('toggle');
         })
      })
   </script>
</head>

<body>
   <?php include('./NavBar.php'); ?>
   <div class="Formular">
      <div class="formularii">
         <form method="POST" action="" class="connect">
            <span class="span1"><input type="email" name="mailconnect" placeholder="Mail" />
               <input type="password" name="mdpconnect" placeholder="Mot de passe" /></span>
            <span class="span2"> <?php
                                 if (isset($erreur)) {
                                    echo '<font color="red">' . $erreur . "</font>";
                                 }
                                 ?><input class="submit" type="submit" name="formconnexion" value="Se connecter !" /></span>
         </form>

      </div>
   </div>
   <?php include('./Footer.php'); ?>
</body>

</html>