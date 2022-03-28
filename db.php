<?php

try
{
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8mb4', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}