<?php
// Start a session (if not already started)
session_start();

// Check if the logout button was clicked
if (isset($_POST['logout'])) {
    // Destroy the session data to log the user out
    session_destroy();
    
    // Redirect the user to the login page or any other page as needed
    header("Location: loginform.html"); // Replace with the appropriate URL
    exit();
}
?>
