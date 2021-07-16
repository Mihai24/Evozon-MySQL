<?php

//Razvan: 4 -> Select all orders between 2003-02-01 and 2003-03-30 and show them in descending order

require_once "connection.php";

global $pdo;

try {
    $dates = $pdo->prepare("SELECT * FROM orders WHERE orderDate BETWEEN '2003-04-01' and '2003-04-30' 
                              ORDER BY orderDate DESC");
    $dates->execute();
    $showDates = $dates->fetchall(PDO::FETCH_ASSOC);
    print_r($showDates);
} catch (PDOException $error) {
    echo 'Query error: ' . $error->getMessage() . PHP_EOL;
}
