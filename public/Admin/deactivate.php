<?php
// Include your database connection code here
include_once('../../included/DBUtil.php');
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd_208";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    
    // Perform the deactivation logic in your database
    // Update the user's login_status to 0 (inactive)
    
    // Return a success response if deactivation is successful
    echo json_encode(['success' => true]);
} else {
    // Return an error response
    echo json_encode(['success' => false, 'message' => 'Invalid request']);

echo json_encode(["success" => true, "message" => "User deactivated successfully"]);
}
?>


