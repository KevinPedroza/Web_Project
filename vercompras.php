<?php 
    //this is gonna start all the sessions
    session_start();

    //this is gonna bring the functions nedless
    require "conexion.php";

    //this realizing the conexion
    $conexion = conexion();

    //this is bringing the information from the user
    $sql = "SELECT id FROM usuarios WHERE correo = :correo;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':correo' => $_SESSION["usuario"]));
    $id = $info2->fetch();

    //this is bringing the information from the user
    $sql = "SELECT * FROM ventas WHERE id_cliente = :id ORDER BY id DESC;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':id' => $id["id"]));
    $cliente = $info2->fetchAll();
    
    //this is gonna call the correct view
    require "views/vercompras.view.php";
?>