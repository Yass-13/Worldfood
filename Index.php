<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

$requser = $bdd->query('SELECT IDrecettes, titreRecettes, contenuRecette FROM recettes');

while($recette = $requser->fetch()){
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./indexcss.css">
    <title>Document</title>
    <link rel="stylesheet" href="navbarcss.css">
      <link rel="stylesheet" href="./footercss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('.sidebarBtn').click(function(){
                $('.sidebar').toggleClass('active');
                $('.sidebarBtn').toggleClass('toggle');
            })
        })

    </script>
</head>


<body class="bodyindex">
<?php include('./NavBar.php'); ?>
<div class="Acceuil">
    <div class="recettes">
    <div class="vues">
    <div><img src="./IMG/pancake.jpg" alt="pancakes"> <? echo $recette['titreRecettes']; ?><a href="./recette.php?IDrecettes=<?= $recette['IDrecettes']; ?>">voir recette</a></div>
    <div><img src="./IMG/lasagnes.jpg" alt="lasagnes"> <? echo $recette['titreRecettes']; ?> <a href="./recette.php?IDrecettes=<?= $recette['IDrecettes']; ?>">Voir recette</a></div>
    <div><img src="./IMG/burger.jpg" alt="burger"><a href="#">Voir recette</a></div>
    <div><img src="./IMG/cake.jpg" alt="cake"><a href="#">Voir recette</a></div>
    <div><img src="./IMG/chicken.jpg" alt="chicken"><a href="#">Voir recette</a></div>
    <div><img src="./IMG/cookies.jpg" alt="cookies"><a href="#">Voir recette</a></div>
    </div>
    </div>

</div>





<?php include('./Footer.php'); ?>


</body>

</html>
<?php
    }
    ?>