<?php
session_start();
// Include your database connection code here (e.g., using PDO or MySQLi).
include_once('../included/DBUtil.php'); // Added a semicolon at the end of the line.

// Replace placeholders with your actual database credentials.
$servername = "localhost";
$username = "root";
$password = "";
$database = "sd_208";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_name = $_POST['your_name'];
    $input_password = $_POST['your_pass'];

    // Query the database to check user credentials.
    $stmt = $conn->prepare("SELECT password, role, ID FROM users WHERE login_status = '1' AND name = :name");
    $stmt->bindParam(':name', $input_name);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $stored_password = $row['password'];
        $role = $row['role'];

        // Verify the password using password_verify
        if (password_verify($input_password, $stored_password)) {
            // Password is correct, log them in based on their role.
            if ($role === 'admin') {
                // Redirect to admin dashboard.
                header("Location: Admin/admindash.php");
            } elseif ($role === 'user') {
                header("Location: ../User/index.php");
            } else {
                // Handle other roles as needed.
            }
        } else {
            // Incorrect password.
            echo "Invalid username or password.";
        }

        $_SESSION["Role"] = $row["role"];
        $_SESSION["id"] = $row["ID"];
    } else {
        // User not found.
        echo "User not found.";
    }
}
?>
