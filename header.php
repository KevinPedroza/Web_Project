<?php 

    $conexion = conexion();

    //this is bringing the information from the user
    $sql = "SELECT id FROM usuarios WHERE correo = :cliente;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cliente' => $_SESSION["usuario"]));
    $id = $info2->fetch();

    //this is bringing the information from the list
    $sql = "SELECT COUNT(*) AS cantidad FROM lista WHERE id_cliente = :cliente;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cliente' => $id["id"]));
    $cantidad = $info2->fetch();

    //here we are calling the correct view
    require "views/header.view.php";
?>