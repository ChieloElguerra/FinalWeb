<?php
// Include the database connection code here if it's in a separate file.
// For example: include("db_connection.php");
include_once ('included\dbaccess\DButil.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $role = $_POST["role"];
    $gender = $_POST["gender"];

    // Hash the password for security (you should use a better hashing method)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    // Replace 'your_db_connection' with your actual database connection
    $conn = new mysqli("localhost", "root", "", "sd_208");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (name, email, password, role, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $name, $email, $hashedPassword, $role, $gender);

    if ($stmt->execute()) {
        // Redirect to the login page after successful registration
        header("Location: loginform.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
