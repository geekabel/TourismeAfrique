<?php
try {
    //connexion à la base de données par PDO
    $pdo = new PDO("mysql:host=localhost;dbname=discover","root","" );
} catch (Exception $e) {
    die('Erreur de connexion :' .$e->getMessage());
}

?>