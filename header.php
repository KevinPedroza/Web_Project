<?php 

    //this is getting the conexion from the database
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

    //this is gonna bring all the product list from the database
    $sql = "SELECT l.id, p.nombre, l.precio, l.cantidad, p.img FROM lista AS l INNER JOIN productos AS p ON p.id_producto = l.id_producto WHERE id_cliente = :cliente;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cliente' => $id["id"]));
    $lista = $info2->fetchAll();

    //here we are calling the correct view
    require "views/header.view.php";
?>