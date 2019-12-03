<?php
$host_name = '127.0.0.1';
$database = 'deliver';
$user_name = 'root';
$password = '';
$bdd = null;

try {
    $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
}
