<?php

include 'ProductModel.php';

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=dokon';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
