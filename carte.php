<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');
$membres = $bdd->prepare('SELECT * FROM pays');
$membres->execute();
$bonjour= $membres->fetchAll();


?> 

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/cartestyle.css">
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

<body class="bodymap">
<?php include('./NavBar.php'); ?>
    
<div id="mapsection">
    <img src="./IMG/carte.jpg" width="518" height="333" usemap="#map" />
    <map name="map">

        <area shape="poly"
            coords="165,128,68,119,68,128,65,145,68,161,101,167,110,167,122,174,124,164,128,159,137,155,138,149,154,139,160,135,164,132"
            alt="usa" href="pays.php?IDpays=21" />
        <area shape="poly"
            coords="165,128,171,77,169,48,187,28,180,24,27,30,28,100,36,97,43,92,48,89,53,89,59,97,65,108,68,115,68,119,68,118,68,119"
            alt="canada" href="pays.php?IDpays=3" />
        <area shape="poly"
            coords="126,208,137,198,125,201,118,199,118,191,112,189,112,182,112,181,108,181,103,185,97,183,96,177,100,167,68,161,74,171,75,172,74,163,90,186,105,194,111,197,124,206,125,207"
            alt="mexique" href="pays.php?IDpays=13" />
        <area shape="poly"
            coords="126,207,125,212,121,217,122,229,134,243,138,254,137,295,146,314,151,316,154,314,152,308,149,301,151,285,162,273,169,262,176,252,182,247,187,236,190,229,190,225,178,219,166,212,161,207,155,203,150,200,144,199,144,198,137,198,126,208"
            alt="amerique du sud" href="pays.php?IDpays=17" />
        <area shape="poly"
            coords="216,190,224,190,231,179,245,188,258,188,265,178,261,164,253,157,239,157,227,164,219,176,217,182,216,184,216,190"
            alt="maghreb" href="pays.php?IDpays=12" />
        <area shape="poly"
            coords="260,164,276,165,285,166,292,180,292,185,296,193,300,197,309,197,309,196,313,196,313,199,311,203,306,212,298,228,298,236,311,237,311,256,290,254,277,267,274,268,273,269,268,269,258,258,255,247,255,219,254,217,252,213,248,210,243,208,242,207,225,207,217,202,215,194,215,190,223,190,230,179,244,188,257,188,264,178,260,164"
            alt="afrique" href="pays.php?IDpays=1" />
        <area shape="poly"
            coords="233,158,228,157,225,152,225,149,228,145,231,145,236,142,243,145,241,148,242,149,242,152,234,157,233,157"
            alt="espagne" href="pays.php?IDpays=16" />
        <area shape="poly" coords="243,145,236,142,236,138,235,137,235,136,240,133,242,132,248,136,247,144,244,145"
            alt="francais" href="pays.php?IDpays=6" />
        <area shape="poly"
            coords="247,140,258,141,258,144,262,150,262,155,259,156,257,151,254,147,253,145,250,144,247,144"
            alt="italie" href="pays.php?IDpays=10" />
        <area shape="poly" coords="248,124,256,125,263,131,258,142,248,140,250,131,247,127" alt="allemagne"
            href="pays.php?IDpays=7" />
        <area shape="rect" coords="224,110,240,129" alt="Angleterre" href="pays.php?IDpays=20" />
        <area shape="poly"
            coords="258,120,255,119,253,114,247,114,246,106,256,88,264,82,274,82,285,88,285,91,280,94,278,95,279,97,280,98,289,113,287,139,281,139,279,142,279,148,275,149,264,148,261,142,260,140,258,141,263,131,256,125,257,120"
            alt="Europe de l&apos; Est" href="pays.php?IDpays=5" />
        <area shape="poly" coords="264,148,269,158,279,148,275,149,264,148" alt="Grece" href="pays.php?IDpays=8" />
        <area shape="poly" coords="278,157,278,155,278,152,283,150,294,150,303,154,303,159,288,158,279,159,278,157"
            alt="Turquie" href="pays.php?IDpays=19" />
        <area shape="poly"
            coords="289,158,290,161,289,165,286,166,294,181,306,192,312,192,318,188,324,183,324,179,321,177,316,176,312,173,311,171,332,176,336,176,347,162,303,154,303,159,289,158"
            alt="Moyen-orient" href="pays.php?IDpays=14" />
        <area shape="poly"
            coords="280,98,289,96,289,91,294,87,306,85,311,81,312,71,321,71,338,45,350,44,358,49,361,56,364,56,371,52,378,53,384,57,388,57,392,52,398,48,410,48,425,51,432,50,437,46,447,47,457,47,461,47,463,51,462,54,459,60,459,63,462,65,462,72,460,76,454,80,451,82,450,84,450,91,451,96,453,100,454,103,454,109,453,111,448,109,445,102,444,95,445,88,443,87,440,86,434,92,426,92,420,98,420,107,427,113,429,117,431,127,422,141,406,115,368,108,295,145,292,140,287,139,289,113,280,98"
            alt="Russie" href="pays.php?IDpays=15" />
        <area shape="poly"
            coords="372,182,383,175,402,180,408,179,413,175,414,168,413,162,408,151,408,147,410,146,415,146,418,150,419,152,421,153,423,149,420,142,421,140,406,115,368,108,328,140,347,162,372,182"
            alt="Chine" href="pays.php?IDpays=4" />
        <area shape="poly"
            coords="334,176,341,184,346,196,351,203,352,203,357,200,360,189,365,184,368,182,370,182,346,162,335,176"
            alt="Inde" href="pays.php?IDpays=9" />
        <area shape="poly"
            coords="371,182,386,228,395,224,403,232,416,231,414,215,426,202,421,194,415,188,410,191,401,180,382,175,371,182"
            alt="Thailande" href="pays.php?IDpays=18" />
        <area shape="poly"
            coords="403,251,403,273,407,275,411,274,422,270,430,270,434,274,442,296,446,296,475,311,483,301,492,286,490,282,461,266,461,254,456,247,462,231,459,226,453,221,440,218,435,218,433,234,415,246,403,252"
            alt="Australie" href="pays.php?IDpays=2" />
        <area shape="poly"
            coords="425,157,436,147,436,140,434,136,435,132,440,132,442,134,442,136,439,137,438,140,441,146,441,152,439,154,435,155,432,157,430,160,428,162,424,158,426,156"
            alt="Japon" href="pays.php?IDpays=11" />
    </map>
    <h2>Decouvrez les aliments du monde entier en cliquant sur les differents pays de la carte.
Bon Voyage culinaire !!</h2>
</div>
<?php include('./Footer.php'); ?>
</body>

</html>