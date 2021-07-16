<?php

//Alexei: 3 -> Show me the customer with the highest number of orders

require_once 'connection.php';

global $pdo;

try {
    $customeOrders = $pdo->prepare("SELECT customers.customerName, COUNT(orders.orderNumber) AS highestOrder 
                                     FROM customers INNER JOIN orders 
                                     ON customers.customerNumber = orders.customerNumber 
                                     GROUP BY customers.customerName ORDER BY highestOrder DESC LIMIT 1");
    $customeOrders->execute();
    while ($customer = $customeOrders->fetch())
    {
        echo $customer['customerName'] . ' ' . $customer['highestOrder'] . PHP_EOL;
    }
} catch (PDOException $error) {
    echo 'Query error: ' . $error->getMessage() . PHP_EOL;
}