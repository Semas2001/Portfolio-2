<?php
    $host = 'localhost';
    $dbname = 'shoppinglist';
    $itemsTable = 'items';
    $username = 'root';
    $password = '';

    $mysqli = new mysqli ($host, $username, $password);

    if ($mysqli->connect_error) {
        echo("Connection error: " . $mysqli->connect_error);
    }

    $query = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($mysqli->query($query) === TRUE) {
            // echo "Database Created";
            mysqli_select_db($mysqli, $dbname);
        } else {
            echo "Error while creating database: " . $mysqli->error;
        }


    $query = "CREATE TABLE IF NOT EXISTS $itemsTable (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        item varchar(100) NOT NULL,
        price DECIMAL(10,2) NOT NULL
    )";

    if ($mysqli->query($query) === TRUE) {
        // echo "Table Created";
    } else {
        echo "Error while creating table: " . $mysqli->error;
    }

    return $mysqli;

?>