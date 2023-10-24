<?php

function getConnection(){
    $servername = "localhost";  // Replace with your database server hostname
    $username = "root";    // Replace with your database username
    $password = "";    // Replace with your database password
    $dbname = "sd_208";        // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeConnection($conn){
    $conn->close();
}
?>