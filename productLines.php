<?php

//Michael: 8 -> show product lines by nr of products

require_once "connection.php";

global $pdo;

try {
    $productLines = $pdo->prepare("SELECT productLine, COUNT(quantityInStock) AS stock FROM products
                                     GROUP BY productLine");
    $productLines->execute();

    while ($showProductLines = $productLines->fetch())
    {
        echo $showProductLines['productLine'] . ' ' . $showProductLines['stock'] . PHP_EOL;
    }
} catch (PDOException $error) {
    echo 'Query error: ' . $error->getMessage() . PHP_EOL;
}