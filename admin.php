<?php 
    //this is gonna active the sessions active
    session_start();

    //this is gonna verify if there is an active session
    if($_SESSION["usuario"] != "kevinlarios2343@gmail.com"){
        header("Location: error.php");
    }

    //this is gonna call the principal view
    require "views/admin.view.php";
?>