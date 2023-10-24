<?php
session_start();
session_destroy();

// Redirect to the loginform.html page
header('Location: ../loginform.html');
exit;
?>
