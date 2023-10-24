<?php
include("../../included/DBUtil.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConnection();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $announcementID = $_POST["announcementID"];

    $sql = "DELETE FROM announcements WHERE announcementID = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $announcementID);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    } else {
        echo "error";
    }

    $conn->close();
}
?>
