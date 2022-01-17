<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
$membres = $bdd->query('SELECT * FROM membres');
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

    <?php if ($_SESSION['tipe'] == 'admin') { ?>
        <div class="perso"> 
            <div class="members">
                <h3>Les Membres</h3>
            </div>
            <div class="mycomments">
                <h3>Les Commentaires</h3>
            </div>
            <div class="myrecipes">
                <h3>Les Recettes Posté</h3>
            </div>
            
           
        </div>
    <?php } else { ?>
        <div class="perso">
            <div class="myrecipes">
                <h3>Gestion des Recettes</h3>
            </div>
            <div class="mycomments">
                <h3>Gestion des Commentaires</h3>
            </div>
        </div>
    <?php } ?>
    <?php include('./Footer.php'); ?>
</body>

</html>