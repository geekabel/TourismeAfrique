<?php
try {
    //connexion à la base de données par PDO
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=ndc1s6gr1p9","ndc1s6gr1p9","c7Ggjzo" );
} catch (Exception $e) {
    die('Erreur de connexion :' .$e->getMessage());
}

?>