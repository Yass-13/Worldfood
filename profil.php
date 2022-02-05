<?php
session_start();


include 'db.php';

if (isset($_SESSION['id']) and $_SESSION['id'] > 0) {
   $getid = intval($_SESSION['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}

$recettes = $bdd->prepare('SELECT * FROM recettes WHERE IDmembre = ?');
$recettes->execute(array($getid));
$com = $bdd->prepare('SELECT recettes.IDrecettes, recettes.titreRecettes, commentaires.IDmembre, commentaires.contenu, commentaires.date FROM recettes INNER JOIN commentaires ON recettes.IDrecettes = commentaires.IDrecette
 WHERE commentaires.IDmembre = ?');
$com->execute(array($getid));

?>
<html>

<head>
   <title>TUTO PHP</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="./CSS/profilcss.css">
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
   <?php include('./Navbar.php'); ?>
   <h2>Bonjour <?php echo $_SESSION['pseudo']; ?> ! </h2>

   <div class="perso">
      <div class="myrecipes">
         <h3>Mes Recettes</h3>
         <?php
         while ($r = $recettes->fetch()) { ?>
            <a href="./recette.php?IDrecettes=<?= $r['IDrecettes'] ?>"><?= $r['titreRecettes'] ?></a>
            <img src="./IMG/<?= $r['image'] ?>" height="200px" width="200px">
         <?php
         }
         ?>
      </div>
      <div class="mycomments">
         <h3>Mes Commentaires</h3>
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

</html>