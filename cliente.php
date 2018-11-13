<?php session_start();

    //this is gonna bring the functions nedless
    require "conexion.php";

    //this is verifying if there is a session active
    if(!$_SESSION){
        header("Location: index.php");
    }

    //this realizing the conexion
    $conexion = conexion();

    //this is bringing the information from the user
    $sql = "SELECT nombre FROM usuarios WHERE correo = :correo;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':correo' => $_SESSION["usuario"]));
    $nombre = $info2->fetch();
    
    //this is calling the view of the customer
    require "views/cliente.view.php";
?>