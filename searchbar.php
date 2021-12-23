<?php
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

$articles = $bdd->query('SELECT pseudo FROM membres ORDER BY id DESC');



if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $articles = $bdd->query('SELECT pseudo FROM membres WHERE pseudo LIKE "%'.$q.'%" ORDER BY id DESC');

}
?>


<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valier" />
</form>



<?php while ($a = $articles->fetch()) { ?>
    <p><?= $a['pseudo'] ?></p>
<?php } ?>

