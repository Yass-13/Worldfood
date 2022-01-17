<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_SESSION['id']) and $_SESSION['id'] > 0) {
   $getid = intval($_SESSION['id']);
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
   <?php include('./Navbar.php'); ?>
      <h2>Bonjour <?php echo $_SESSION['pseudo']; ?> ! </h2>

      <div class="perso">
         <div class="myrecipes">
            <h3>Mes Recettes</h3>
         </div>
         <div class="mycomments">
            <h3>Mes Commentaires</h3>
         </div>
      </div>







      <?php include('./Footer.php'); ?>
   </body>

   </html>
<?php
}
?>