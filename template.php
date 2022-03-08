
<!-- LE MODELE COMMUN DE TOUTE LES PAGES -->

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8mb4" />
    <title><?= $title ?> </title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="./CSS/navbarcss.css">
    <link rel="stylesheet" href="./CSS/footercss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./CSS/css/bootstrap.min.css">
    <script src="./CSS/css/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sidebarBtn').click(function() {
                $('.sidebar').toggleClass('active');
                $('.sidebarBtn').toggleClass('toggle');
            })
        })
    </script>
</head>


<?= $content ?>


</html>