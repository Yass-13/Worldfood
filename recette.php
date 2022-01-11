<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');

if (isset($_GET['IDrecettes']) and $_GET['IDrecettes'] > 0) {
    $getid = intval($_GET['IDrecettes']);
    $requser = $bdd->prepare('SELECT * FROM recettes WHERE IDrecettes = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    $recette = $userinfo['contenuRecette'];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="recettestyle.css">
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
        <?php include('./NavBar.php'); ?>
        <div class="RECETTE">
            <div class="recette">
                <h1><?php echo $userinfo['titreRecettes']; ?></h1>
               <div class="ban"><img src="./IMG/<?= $userinfo['image'] ?>" > </div>
               <p><?= nl2br($recette); ?></p>
                
            </div>
        </div>
        <?php include('./Footer.php'); ?>
    </body>

    </html>
<?php
}
?>