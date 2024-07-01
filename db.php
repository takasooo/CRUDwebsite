<?php

$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = 'Snowman13';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
