<?php

    session_start();

    //this is gonna bring the functions nedless
    require "conexion.php";

    //this is verifying if there is a session active
    if(!$_SESSION){
        header("Location: index.php");
    }

    //this realizing the conexion
    $conexion = conexion();

    //this is bringing the information from the user
    $sql = "SELECT nombre,id FROM usuarios WHERE correo = :correo;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':correo' => $_SESSION["usuario"]));
    $nombre = $info2->fetch();

    //here we are getting the idproduct
    $idpro = $_GET["idpro"];
    //here we get the category's ID
    $idcate = $_GET["idcate"];
    //here we are getting the specific product
    $sql = "SELECT * FROM productos WHERE id_producto = :pro;";
    $info2 = $conexion->prepare($sql);
    $info2->execute(array(':pro' => $idpro));
    $info = $info2->fetch();

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $idcliente = $_POST["iduser"];
        $idproducto = $_POST["idproducto"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["preciototal"];

        $sql = "INSERT INTO lista VALUES(null,'$idcliente', '$idproducto', '$cantidad', '$precio');";
        $conexion->query($sql);
        header("Location: cliente.php");
    }

    //this is gonna bring the correct view
    require "views/productosingle.view.php";
?>