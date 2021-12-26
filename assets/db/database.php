<?php
         //properties, dataset van een bepaalde class
        $hostname = "localhost";
        $username = "root";
        $password = "root";
        $database = "sortinghat";
        $port = 8889;
        $conn;

        // create connection
        $connection = new mysqli($hostname, $username, $password, $database, $port);

        // check if connection was successful
        if ($connection->connect_error) {
            die('connection failed: ' . $connection->connect_error);
        }
?>