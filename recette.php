<?php
session_start();

include 'db.php';


if (isset($_GET['IDrecettes']) and $_GET['IDrecettes'] > 0) {
    $getid = intval($_GET['IDrecettes']);
    $requser = $bdd->prepare('SELECT * FROM recettes WHERE IDrecettes = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    $recette = $userinfo['contenuRecette'];
}

if (isset($_POST['postcom'])) {
    if (isset($_POST['com'])) {
        $rece = intval($_GET['IDrecettes']);
        $mem = intval($_SESSION['id']);
        $comment = htmlspecialchars($_POST['com']);
        $date = date("d.m.y");

        $ins = $bdd->prepare("INSERT INTO commentaires(IDrecette, IDmembre, contenu, date) VALUES(?, ?, ?, ?)");
        $ins->execute(array($rece, $mem, $comment, $date));
    }
}


$com = $bdd->prepare('SELECT recettes.IDrecettes, commentaires.IDcommentaire, membres.pseudo, commentaires.contenu, commentaires.date FROM recettes INNER JOIN commentaires ON commentaires.IDrecette = recettes.IDrecettes INNER JOIN membres ON commentaires.IDmembre = membres.id WHERE IDrecettes = ?');
$com->execute(array($_GET['IDrecettes']));

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
            <?php
            if (isset($_SESSION['tipe']) and $_SESSION['tipe'] == 'mod') {
            ?>
                <button><a href="modifier.php?IDrecettes=<?= $userinfo['IDrecettes'] ?>">MODIFIER RECETTE</a></button>
            <?php
            }
            ?>
            <h1><?php echo $userinfo['titreRecettes']; ?></h1>
            <div class="ban">
                <p><?= nl2br($recette); ?></p><img src="./IMG/<?= $userinfo['image'] ?>">
            </div>
        </div>

        <div class="com">
            <?php while ($c = $com->fetch()) { ?>
                <div>
                    <?php
                    if (isset($_SESSION['tipe']) AND $_SESSION['tipe'] == 'admin' || $_SESSION['tipe'] == 'mod') {
                      
                    ?>
                        <button><a href="bannir.php?IDcommentaire=<?= $c['IDcommentaire'] ?>&IDrecettes=<?= $c['IDrecettes'] ?>">X</a></button>
                    <?php
                    }
                    ?>
                    <h3><?= $c['pseudo'] ?> </h3>
                    <h4><?= $c['date'] ?></h4>
                </div>
                <p><?= $c['contenu'] ?></p>
            <?php } ?>
        </div>

        <div class="Addcom">

            <h2>Ajouter un commentaire !!!</h2>
            <form method="POST" class="comform">
                <?php if (isset($_SESSION['id']) and !empty($_SESSION['id'])) { ?>
                    <textarea name="com"></textarea>
                    <input type="submit" name="postcom" value="Envoyer !" />
                <?php } else {
                ?>
                    <p>Il faut être connecté pour pouvoir poster un commentaire</p>
                    <textarea disabled name="com"></textarea>
                    <input type="submit" name="postcom" value="Envoyer !" style="display: none;" />
                <?php } ?>
            </form>

        </div>

    </div>



    <?php include('./Footer.php'); ?>
</body>

</html>