<?php
session_start();
include_once('../../included/DBUtil.php');
$conn = getConnection();

// Retrieve data from the HTML form
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$ootd = $_POST['ootd'];
$user = $_SESSION['id'];

// SQL query to insert data into the "activities" table
$sql = "INSERT INTO activities (name, date, time, location, ootd, userID) VALUES ('$name', '$date', '$time', '$location', '$ootd', $user)";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php');
    echo '<script>addActivity();</script>';
} else {
    $response = array("success" => false, "error" => $conn->error);
    echo json_encode($response);
}


closeConnection($conn);

?>