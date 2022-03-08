<?php
//BARRE DE NAVIGATION

//REQUETE SQL QUI TRIE LES RESULTAT DE LA BARRE DE RECHERCHE
$searchrec = $bdd->query('SELECT titreRecettes FROM recettes ORDER BY titreRecettes DESC');

//REQUETE SQL PERMETTANT LA RECHERCHE DE RECETTE 
if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $searchrec = $bdd->query('SELECT * FROM recettes WHERE titreRecettes LIKE "%' . $q . '%" ORDER BY titreRecettes DESC');
}
?>



<div id="leftside">
<!-- LOGO -->
    <div id="logo">
        <a href="./Index.php"><img src="./IMG/LOGO.png" alt="logo" class="logo"></a>
    </div>
<!-- BARRE DE RECHERCHE -->
    <div id="searchbar">
        <form method="GET" action="resultsearch.php" class="SearchBar">
            <input type="search" name="q" placeholder="Recherche..." class="searchspace" />
            <button type="submit" class="searchButton"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
<div class="sidebar">
<!-- MENU DE NAVIGATION QUAND UN UTILISATEUR EST CONNECTé -->
    <?php
    if (isset($_SESSION['id']) and !empty($_SESSION['id'])) { ?>
        <ul>
            <li><a href="./carte.php">RECETTES DU MONDE</a></li>
            <?php
            if ($_SESSION['tipe'] == 'user') { ?>
                <li><a href="./profil.php">PAGE PROFIL</a></li>
            <?php } else { ?>
                <li><a href="./membres.php">PAGE PROFIL</a></li>
            <?php } ?>
            <li><a href="./editionprofil.php">EDITER MON PROFIL</a></li>
            <li><a href="./deconnexion.php">DECONNEXION</a></li>
        </ul>
    <?php
    } else {
    ?>
<!-- MENU DE NAVIGATION QUAND ON'EST PAS CONNECTé -->
        <ul>
            <li><a href="./carte.php">RECETTES DU MONDE</a></li>
            <li><a href="./connexion.php">CONNEXION</a></li>
            <li><a href="./inscription.php">INSCRIPTION</a></li>
        </ul>
    <?php } ?>

    <button class="sidebarBtn"><span></span></button>

</div>


