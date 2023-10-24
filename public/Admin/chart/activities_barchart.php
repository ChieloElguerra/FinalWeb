<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd_208";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT MONTH(created_at) AS month, COUNT(*) AS count FROM activities GROUP BY month";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);
?>
