<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');



if (isset($_GET['IDpays']) and $_GET['IDpays'] > 0) {
    $getid = intval($_GET['IDpays']);
    $requser = $bdd->prepare('SELECT * FROM pays WHERE IDpays = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    $rec = $bdd->prepare('SELECT * FROM recettes WHERE IDpays = ?');
    $rec->execute(array($getid));
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/countrystyle.css">
    <link rel="stylesheet" href="./CSS/navbarcss.css">
    <link rel="stylesheet" href="./CSS/footercss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="flag"><img src="./IMG/<?= $userinfo['flag'] ?>" alt="usa flag" class="Flag"></div><br>

               
                    <a class="css-button" href="./newrecette.php?IDpays=<?=$_GET['IDpays'];?>">
                        <span class="css-button-icon"><i class="fa fa-hand-peace-o" aria-hidden="true"></i></span>
                        <span class="css-button-text">Ajoutez Votre Recette !</span>
                    </a>
               
                <div class="t">
                    <?php
                    while ($bonjour = $rec->fetch()) {
                        $recette = $bonjour['titreRecettes'];
                        $img = $bonjour['image'];
                    ?>
                        <div class="articles">
                            <a href="./recette.php?IDrecettes=<?= $bonjour['IDrecettes']; ?>"><?= $recette; ?></a><img src="./IMG/<?= $img ?>" class="x">
                            
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include('./Footer.php'); ?>
    </section>
</body>

</html>