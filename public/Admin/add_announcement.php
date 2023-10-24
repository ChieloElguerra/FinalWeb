<?php
include("../../included/DBUtil.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getConnection();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $content = $_POST['content'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO announcements (announcementContent, announcementDate, announcementStatus) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sss", $content, $date, $status);
        if ($stmt->execute()) {
            header("Location: announcement.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
