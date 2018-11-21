<?php
    //this is gonna start all the sessions
    session_start();

    //this is gonna bring the functions nedless
    require "conexion.php";

    //this realizing the conexion
    $conexion = conexion();

    //this is gonna get the id's sales
    $idventa = $_GET["idventa"];

    //this is bringing the information from the sales
    $sql = "SELECT * FROM ventas WHERE id = :id;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':id' => $idventa));
    $venta = $info2->fetch();
        
    //this is bringing the information from the product
    $sql = "SELECT * FROM productos WHERE id_producto = :id;";
    $info = $conexion->prepare($sql); 
    $info->execute(array(':id' => $venta["id_producto"]));
    $producto = $info->fetch();

    //this is gonna get the description of the product
    $sql = "SELECT descri FROM productos WHERE id_producto = :id;";
    $info = $conexion->prepare($sql); 
    $info->execute(array(':id' => $venta["id_producto"]));
    $descri = $info->fetch();

    //this is gonna call the correct view
    require "views/items.view.php";
?>