<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])) {
       $pseudolength = strlen($pseudo);
       if($pseudolength <= 255) {
         if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if($mailexist == 0) {
                      $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, pseudo, mail, motdepasse) VALUES(?, ?, ?, ?, ?)");
                      $insertmbr->execute(array($nom, $prenom, $pseudo, $mail, $mdp));
                      $erreur = "Le compte a été ajouté ! <a href=\"membres.php\">Retour</a>";
                   } else {
                      $erreur = "Vos mots de passes ne correspondent pas !";
                   }
                } else {
                   $erreur = "Adresse mail déjà utilisée !";
                }
             } else {
                $erreur = "Votre adresse mail n'est pas valide !";
             }
       } else {
          $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 
 ?>

<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div >
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
                     <input type="text" placeholder="Votre nom" id="nom" name="nom" value="" />
                     <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="" />
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" />
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="" />
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />

                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
               
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>