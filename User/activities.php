<?php
// Database connection parameters
$servername = "localhost";  // Replace with your database server hostname
$username = "root";    // Replace with your database username
$password = "";    // Replace with your database password
$dbname = "sd_208";        // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the HTML form
session_start();
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$ootd = $_POST['ootd'];
$userId = $_SESSION['id'];

// SQL query to insert data into the "activities" table
$sql = "INSERT INTO activities (name, date, time, location, ootd, userID) VALUES ('$name', '$date', '$time', '$location', '$ootd', '$userId')";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => true);
    echo json_encode($response);
} else {
    $response = array("success" => false, "error" => $conn->error);
    echo json_encode($response);
}



// Close the database connection
$conn->close();
?>
