<?php
    session_start();

    //This is calling the conexion file to get into the database
    require "conexion.php";

    //this is getting the conexion from the database
    $conexion = conexion();

    //this is verifying if there is a session active
    if(!$_SESSION){
        header("Location: index.php");
    }

    //this is bringing the information from the user
    $sql = "SELECT id FROM usuarios WHERE correo = :cliente;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cliente' => $_SESSION["usuario"]));
    $id = $info2->fetch();

    //this is getting the value from the list
    $idlista = $_GET["idlista"];

    //this is bringing the information from the list
    $sql = "SELECT * FROM lista WHERE id_cliente = :cliente AND id = '$idlista';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cliente' => $id["id"]));
    $lista = $info2->fetch();

    //this is bringing the stock from the product
    $sql = "SELECT stock FROM productos WHERE id_producto =" . $lista['id_producto'] . ";";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $stock = $info2->fetch();
    
    //this is getting the total of the rest
    $total = $stock["stock"] - $lista['cantidad'];

    //this is getting the date
    (string)$today = date("F j, Y, g:i a");  
    
    //this is changing the stock 
    $sql = "UPDATE productos SET stock = '$total' WHERE id_producto = " . $lista['id_producto'] . ";";
    $conexion->query($sql);

    //this is inserting the data into ventas
    $sql = "INSERT INTO ventas VALUES(NULL," . $lista["id_producto"] . ", " . $lista["id_cliente"] . ", '$today' ," . $lista["cantidad"] . "," . $lista["precio"] . ");";
    $conexion->query($sql);

    //this is deleting from the lista
    $sql = "DELETE FROM lista WHERE id_cliente = " . $id['id'] . " AND id = '$idlista';";
    $conexion->query($sql);

    //this is redirecting to another view
    header("Location: cliente.php");
    
?>