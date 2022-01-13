<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_GET['id']) and $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
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
      <div id="leftside">
         <div id="logo">
            <a href="./Index.php"><img src="./IMG/LOGO.png" alt="logo" class="logo"></a>
         </div>
         <div id="searchbar">
            <form method="GET" class="SearchBar">
               <input type="search" name="q" placeholder="Recherche..." class="searchspace" />
               <button type="submit" class="searchButton"><i class="bi bi-search"></i></button>
            </form>
         </div>
      </div>
      <div class="sidebar">
         <ul>
            <li><a href="./carte.php">RECETTES DU MONDE</a></li>
            <li><a href="./profil.php?id=<?= $userinfo['id']?>">PAGE PROFIL</a></li>
            <li><a href="./editionprofil.php">EDITER MON PROFIL</a></li>
            <li><a href="./deconnexion.php">DECONNEXION</a></li>
         </ul>
         <button class="sidebarBtn"><span></span></button>
      </div>
      <h2>Bonjour <?php echo $userinfo['pseudo']; ?> ! </h2>

      <div class="perso">
         <div class="myrecipes">
            <h3>Mes Recettes</h3>
         </div>
         <div class="mycomments">
            <h3>Mes Commentaires</h3>
         </div>
      </div>







      <div class="footer">
         <div class="social">
            <i class="bi bi-facebook facebook"></i>
            <i class="bi bi-twitter twitter"></i>
            <i class="bi bi-pinterest pinterest"></i>
            <i class="bi bi-instagram instagram"></i>
         </div>
         <p class="copyright">© Worldfood 2021 - Tous droits réservés</p>
      </div>

   </body>

   </html>
<?php
}
?>