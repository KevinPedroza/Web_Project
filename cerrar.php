<?php session_start();
    //this is destroying the session
    session_destroy();
    //this is cleaning the session
    $_SESSION = array();
    //this is redirecting to another page
    header("Location: index.php");
?>