<?php

$host = 'localhost'; // Our client. Server in the laptop
$port = 3306; // Port number
$dbname = ''; // Database name
$username = 'root'; // Username
$password = ''; // Password

$dsn = "mysql:host=$host; port=$port; dbname=$dbname; charset=utf8"; // (DSN) Data Source Name

// Wrap in try and catch to catch any errors
try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch as associative Array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo 'Database Connected Successfully!';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
