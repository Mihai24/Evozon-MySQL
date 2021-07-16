<?php
$host = 'localhost';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=classicmodels", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo 'Connection fail: ' . $exception->getMessage();
}