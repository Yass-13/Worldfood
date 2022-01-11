<?php


$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
$rec = $bdd->query('SELECT * FROM recettes WHERE IDpays = 4');

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./countrystyle.css">
    <link rel="stylesheet" href="./navbarcss.css">
    <link rel="stylesheet" href="./footercss.css">
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
    <section class="country">
        <?php include('./NavBar.php'); ?>
        <div class="Acceuil">
            <div class="recettes">
                <div class="flag"><img src="../IMG/china flag.webp" alt="africa flag" class="Flag"></div>
                <?php
                while ($bonjour = $rec->fetch()) {
                    $recette = $bonjour['titreRecettes'];
                    $img = $bonjour['image'];
                ?>
                    <div><a href="../recette.php?IDrecettes=<?= $bonjour['IDrecettes'];?>"><?= $recette; ?></a> <img src="../IMG/<?=$img?>" height="50px" width="50px" ></div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php include('./Footer.php'); ?>
    </section>
</body>