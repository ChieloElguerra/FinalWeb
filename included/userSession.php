<?php
session_start();
if ($_SESSION["Role"] == null) {
    header("Location: ../public/loginform.html");
} else {
    if ($_SESSION["Role"] == "user") {
    } else {
        header("Location: ../public/loginform.html");
    }
}
?>