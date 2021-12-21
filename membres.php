<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
$membres = $bdd->query('SELECT * FROM membres');
while ($user = $membres->fetch()){
?>  

<p><?= $user['pseudo']; ?> <a href="bannir.php?id=<?= $user['id']; ?>">Bannir</a> <a href="modifier.php?id=<?= $user['id']; ?>">Promouvoir</a> <a href="retrograder.php?id=<?= $user['id']; ?>">retrograder</a> </p> 

<?php
}
?><p><a href="ajouter.php?id=<?= $user['id']; ?>">Ajouter</a></p>