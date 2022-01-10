<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['IDrecettes']) AND $_GET['IDrecettes'] > 0) {
    $getid = intval($_GET['IDrecettes']);
    $requser = $bdd->prepare('SELECT * FROM recettes WHERE IDrecettes = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
 <p><?php echo $userinfo['titreRecettes']; ?></p>
 <p><?php echo $userinfo['contenuRecette']; ?></p>
 </body>
 </html>
 <?php   
}
?>
