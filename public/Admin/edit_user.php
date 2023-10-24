<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sd_208";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $user_id = $_GET["edit_user_id"];
    $user_name = $_GET["edit_user_name"];
    $user_email = $_GET["edit_user_email"];
    $user_role = $_GET["edit_user_role"];
    $user_gender = $_GET["edit_user_gender"];
    $user_login_status = $_GET["edit_user_login_status"];

    $query = "UPDATE users SET name = '$user_name', email = '$user_email', role = '$user_role', gender = '$user_gender', login_status = '$user_login_status' WHERE ID = '$user_id'";

    if(mysqli_query($conn, $query)){
        echo "Successfully updated user record.";
        header("Location: admindash.php");
    }else{
        echo "Failed to update user record.";
    }
