<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="navbarcss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('.sidebarBtn').click(function(){
                $('.sidebar').toggleClass('active');
                $('.sidebarBtn').toggleClass('toggle');
            })
        })



    </script>
</head>

<body>
    <div id="leftside">
        <div id="logo">
            <img src="./IMG/LOGO.png" alt="logo" class="logo">
        </div>
        <div id="searchbar">
            <form method="GET">
                <input type="search" name="q" placeholder="Recherche..." class="searchspace" />
                <button type="submit" class="searchButton"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
    <div class="sidebar">
      <ul>
          <li><a href="#">RECETTES DU MONDE</a></li>
          <li><a href="#">CONNEXION</a></li>
          <li><a href="#">INSCRIPTION</a></li>
      </ul>
      <button class="sidebarBtn"><span></span></button>
      
  </div>

</body>

</html>