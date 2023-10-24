<?php
session_start();
include_once("included/dbaccess/DBUtil.php");

$username = $_POST["Username"];
$password = $_POST["Password"];


$conn = getConnection();
$sql = "SELECT * from User where Email = '".$username."' and Password = '".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row["Email"] == $username && $row["Password"]== $password)
{
    if($row["Role"]=="admin")
    {        
        header("Location: index.html");
    }
    else
    {        
        header("Location: staff.php");
    }
    $_SESSION["Role"] = $row["Role"];
    
}
else
{
    header("Location: loginform.html");
}
closeConnection();


?>