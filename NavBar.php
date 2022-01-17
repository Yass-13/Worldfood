<div id="leftside">

    <div id="logo">
        <a href="./Index.php"><img src="./IMG/LOGO.png" alt="logo" class="logo"></a>
    </div>
    <div id="searchbar">
        <form method="GET" class="SearchBar">
            <input type="search" name="q" placeholder="Recherche..." class="searchspace" />
            <button type="submit" class="searchButton"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
<div class="sidebar">
    <?php
    if (isset($_SESSION['id']) and !empty($_SESSION['id'])) { ?>
        <ul>
            <li><a href="./carte.php">RECETTES DU MONDE</a></li>
        <?php 
            if($_SESSION['tipe'] == 'user'){?>
            <li><a href="./profil.php">PAGE PROFIL</a></li>
            <?php }else{?>
            <li><a href="./membres.php">PAGE PROFIL</a></li>
            <?php } ?>
            <li><a href="./editionprofil.php">EDITER MON PROFIL</a></li>
            <li><a href="./deconnexion.php">DECONNEXION</a></li>
        </ul>
    <?php
    } else {
    ?>
        <ul>
            <li><a href="./carte.php">RECETTES DU MONDE</a></li>
            <li><a href="./connexion.php">CONNEXION</a></li>
            <li><a href="./inscription.php">INSCRIPTION</a></li>
        </ul>
    <?php } ?>

    <button class="sidebarBtn"><span></span></button>

</div>