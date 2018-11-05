<?php session_start();

    if($_SESSION["usuario"] != "kevinlarios2343@gmail.com"){
        header("Location: error.php");
    }

    

    require "views/admin.view.php";
?>