<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');




if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = ($_GET['q']);
    $searchrec = $bdd->query('SELECT * FROM recettes WHERE titreRecettes LIKE "%' . $q . '%" ');
    
}
?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/indexcss.css">
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


<body class="bodyindex">
    <?php include('./NavBar.php'); ?>
    <div class="Acceuil">

        <div class="recettes">
            <div class="vues">
                <?php while ($a = $searchrec->fetch()) {var_dump($a) ?>
                 
                <?php } ?>

            </div>
        </div>

    </div>


    <?php include('./Footer.php'); ?>
</body>

</html>