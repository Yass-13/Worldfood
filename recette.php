<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');
   
    
if (isset($_GET['IDrecettes']) and $_GET['IDrecettes'] > 0) {
    $getid = intval($_GET['IDrecettes']);
    $requser = $bdd->prepare('SELECT * FROM recettes WHERE IDrecettes = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    $recette = $userinfo['contenuRecette'];
}
    if (isset($_POST["postcom"]) && !empty($_POST['com'])) {
        $comment = htmlspecialchars($_POST['com']);
        $rece = intval($_GET['IDrecettes']);
        $mem = intval($_SESSION['id']);
        $date =  date("m.d.y");

        $insertcom = $bdd->prepare("INSERT INTO commentaires(IDrecette, IDmembre, contenu,date) VALUES(?, ?, ?, ?)");
        $insertcom->execute(array($rece, $mem, $comment, $date));
    }

    $com = $bdd->prepare('SELECT recettes.IDrecettes, commentaires.IDcommentaire, membres.pseudo, commentaires.contenu, commentaires.date FROM recettes INNER JOIN commentaires ON commentaires.IDrecette = recettes.IDrecettes INNER JOIN membres ON commentaires.IDmembre = membres.id WHERE IDrecettes = ?');
    $com->execute(array($getid));
 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./CSS/recettestyle.css">
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
        <div class="RECETTE">
            <div class="recette">
                <h1><?php echo $userinfo['titreRecettes']; ?></h1>
                <div class="ban">
                    <p><?= nl2br($recette); ?></p><img src="./IMG/<?= $userinfo['image'] ?>">
                </div>
            </div>
            <?php

            $lescom = $com->fetch();
            if (isset($lescom['IDcommentaire'])) { ?>

                <div class="com">
                    <?php
                    while ($lescom = $com->fetch()) {
                        $auteur = $lescom['pseudo'];
                        $cont = $lescom['contenu'];
                        $date = $lescom['date'];
                    ?>

                        <div>
                            <h3><?= $auteur ?></h3>
                            <h4><?= $date ?></h4>
                        </div>
                        <p><?= $cont ?></p>

                    <?php
                    }
                    ?>
                </div>
            <?php } else { ?>

                <div class="com" style="display: none;"></div>

            <?php
            }
            ?>





            <div class="Addcom">

                <h2>Ajouter un commentaire !!!</h2>
                <form method="POST" class="comform">
                    <textarea name="com"></textarea>
                    <input type="submit" name="postcom" value="Envoyer !" />
                </form>

            </div>

        </div>



        <?php include('./Footer.php'); ?>
    </body>

    </html>
