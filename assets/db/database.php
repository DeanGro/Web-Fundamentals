<?php
         //properties, dataset van een bepaalde class
        $hostname = "ID330081_sortingHat.db.webhosting.be"; //localhost
        $username = "ID330081_sortingHat"; //root
        $password = "sortinghatDean123"; //root
        $database = "ID330081_sortingHat"; //sortinghat
        //$port = 8889;
        //$conn;

        // create connection
        //$connection = new mysqli($hostname, $username, $password, $database, $port);
        $connection = new mysqli($hostname, $username, $password, $database);

        // check if connection was successful
        if ($connection->connect_error) {
            die('connection failed: ' . $connection->connect_error);
        }
?>