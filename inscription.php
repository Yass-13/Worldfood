<?php

include 'db.php';
//PAGE PERMETTANT A UN NOUVEL UTILISATEUR DE S'INSCRIRE DANS LA BASE DE DONNéES
if (isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
   $mdp2 = password_verify($_POST['mdp'], $mdp);

   //ON VERIFIE QUE LES ESPACE SONT BIEN COMPLETéS
   if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      //ON VERIFIE QUE LE PSEUDO FASSE MOINS DE 255 CARACTERES
      if ($pseudolength <= 255) {
         //ON VERIFIE QUE LES 2 ADRESSES MAILS CORRESPONDENT
         if ($mail == $mail2) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               //ON VERIFIE SI L'ADRESSE MAIL EXISTE DEJA DANS LA BASE DE DONNéES
               if ($mailexist == 0) {
                  //ON VERIFIE SI LES MOT DE PASSE CORRESPONDENT
                  if ($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, pseudo, mail, motdepasse) VALUES(?, ?, ?, ?, ?)");
                     $insertmbr->execute(array($nom, $prenom, $pseudo, $mail, $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
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
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<html>
<?php $title = 'Inscription' ?>
<?php $css = './CSS/inscriptionstyle.css' ?>

<?php ob_start(); ?>

<body>

   <?php include('./NavBar.php'); ?>

   <div class="Formular">
      <h2>Inscription</h2>
      <br /><br />
      <form method="POST" action="" class="formularr">
         <div>
            <label for="nom">Nom :</label>
            <input type="text" placeholder="Votre nom" id="nom" name="nom" value="" />
         </div>
         
         <div>
            <label for="prenom">Prenom :</label>
            <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="" />
         </div>

         <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" />
         </div>

         <div>
            <label for="mail">Mail :</label>
            <input type="email" placeholder="Votre mail" id="mail" name="mail" value="" />
         </div>

         <div>
            <label for="mail2">Confirmation du mail :</label>

            <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="" />
         </div>

         <div>
            <label for="mdp">Mot de passe :</label>

            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
         </div>

         <div>
            <label for="mdp2">Confirmation du mot de passe :</label>

            <input type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2" />
         </div>

         <button class="btn btn-light" name="forminscription" type="submit">Je m'inscris !</button>

      </form>
      <?php
      if (isset($erreur)) {
         echo '<font color="red">' . $erreur . "</font>";
      }
      ?>
   </div>
   <?php include('./Footer.php'); ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</html>