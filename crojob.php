<?php

    //this is gonna bring the conexion from the database
    require "conexion.php";

    //this is gonna establish the conexion
    $conexion = conexion();
    
    //this is gonna bring the information from the database
    $sql = "SELECT * FROM productos WHERE stock <= :stock;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':stock' => $argv[1]));
    $productos = $info2->fetchAll();

    //this is gonna establish the information for the email
    $to = "kevinlarios2343@gmail.com";
    $subject = "Productos con bajo stock";

    $txt = "ID Producto | Nombre | Stock \r\n";

    //this is establishing the products on the variable
    foreach($productos as $producto){
        $txt .= $producto["id_producto"] . "                  " .  $producto["nombre"] . "           " .  $producto["stock"] . "\r\n";
    }
    
    $headers = "From: correopruebaxampp@gmail.com";

    //this is gonna send the email throug xampp
    mail($to,$subject,$txt,$headers);

