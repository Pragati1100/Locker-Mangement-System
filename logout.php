<?php 
    session_start();
    $_SESSION["uname"] = "adminlogout";
    header("Location: index.php");
?>