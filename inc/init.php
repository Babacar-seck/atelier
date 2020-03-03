<?php

// Connexion a la base de données
$pdo = new PDO('mysql:host=localhost;dbname=shauto', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

session_start();
//session_destroy();

// // Definition de constante
define("RACINE_SITE", $_SERVER["DOCUMENT_ROOT"] . "/projetPhp/atelier");

define("URL", "http://localhost/projetPhp/atelier");

$content = '';

require_once('fonction.php');

?>