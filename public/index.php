<?php
session_start();

// Check if the user is not logged in, then redirect to the sign-in form
if (!isset($_SESSION['user_id'])) {
    header("Location: loginform.html"); // Redirect to the sign-in form if not logged in
    exit();
}

// Set cache control headers to prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>