<?php
include_once('../../included/DBUtil.php');
$conn = getConnection();

$id = $_GET['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$ootd = $_POST['ootd'];

$sql = "UPDATE activities SET name='$name', date = '$date', time='$time', location='$location', ootd='$ootd' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  header('Location: ../index.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

closeConnection($conn);
?>