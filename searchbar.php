<?php
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

$searchrec = $bdd->query('SELECT titreRecettes FROM recettes ORDER BY titreRecettes DESC');



if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $searchrec = $bdd->query('SELECT titreRecettes FROM recettes WHERE titreRecettes LIKE "%'.$q.'%" ORDER BY titreRecettes DESC');

}
?>


<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>



<?php while ($a = $searchrec->fetch()) { ?>
    <p><?= $a['titreRecettes'] ?></p>
<?php } ?>

