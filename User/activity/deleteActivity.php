<?php
include_once('../../included/DBUtil.php');
$conn = getConnection();

$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM activities WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

closeConnection($conn);
?>