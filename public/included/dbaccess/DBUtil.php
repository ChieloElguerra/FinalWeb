<?php
$conn;
// Create connection
function getConnection()
{
    // Database configuration
    $hostname = "localhost"; // Replace with your database hostname
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $database = "sd_208"; // Replace with your database name
    
    
    $mysqli = new mysqli($hostname, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Close connection
function closeConnection()
{
    $conn->close();
}
?>