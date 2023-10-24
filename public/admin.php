<?php
    session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: loginform.html");
    }
    else
    {
        if($_SESSION["Role"] == "admin")
        {}
        else
        {
            header("Location: index.html");
        }

    }
    
?>
admin page
<a href="logout.php"> Logout </a>

