<?php
session_start();
session_destroy();
header("Location: connexion.php");
?>

<!-- PAGE DE DECONNECTION ET FERMETURE DE SESSION -->