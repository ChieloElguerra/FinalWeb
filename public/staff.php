<?php
    session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: loginform.html");
    }
    else
    {
        if($_SESSION["Role"] == "user")
        {}
        else
        {
            header("Location: loginform.html");
        }

    }
    
?>
user  page