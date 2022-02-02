<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $membres = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $membres->execute(array($getid));
    if ($membres->rowCount() > 0) {

        $promouvoir = $bdd->prepare('UPDATE membres SET tipe = "admin" WHERE id = ?');
        $promouvoir->execute(array($getid));
    }
}


if (isset($_GET['IDrecettes'])) {
    $selrec = $bdd->prepare("SELECT * FROM recettes WHERE IDrecettes = ?");
    $selrec->execute(array($_GET['IDrecettes']));
    $rekt = $selrec->fetch();
    if (isset($_POST['newtitre'])) {
       $newtitre = htmlspecialchars($_POST['newtitre']);
       $inserttitre = $bdd->prepare("UPDATE recettes SET titreRecettes = ? WHERE IDrecettes = ?");
       $inserttitre->execute(array($newtitre, $_GET['IDrecettes']));
       header('Location: recette.php?IDrecettes=' . $_GET['IDrecettes']);
    }
    if (isset($_POST['newcontenu'])) {
       $newcontenu = htmlspecialchars($_POST['newcontenu']);
       $insertcontenu = $bdd->prepare("UPDATE recettes SET contenuRecette = ? WHERE IDrecettes = ?");
       $insertcontenu->execute(array($newcontenu, $_GET['IDrecettes']));
       header('Location: recette.php?IDrecettes=' . $_GET['IDrecettes']);
    }

?>




<html>

<head>
   <title>TUTO PHP</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="./CSS/inscriptionstyle.css">
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

   <div class="formEdition">
      <h2>Edition de la Recette</h2>
      <form method="POST" action="" enctype="multipart/form-data" class="edition">
         <label>Titre :</label>
         <input type="text" name="newtitre" placeholder="titre" value="<?php echo $rekt['titreRecettes']; ?>" /><br /><br />
         <label>Contenu recette :</label>
         <textarea name="newcontenu" placeholder="contenu" ><?php echo $rekt['contenuRecette']; ?></textarea><br /><br />
         <input type="submit" value="Mettre à jour mon profil !" />
      </form>
   </div>


   <?php include('./Footer.php'); ?>

</body>

</html>

<?php
}
?>