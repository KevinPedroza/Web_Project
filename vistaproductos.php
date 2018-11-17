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

    //Here we get the category's id
    $idcate = $_GET["idcate"];

    //this is bringing the information from the products related to the category
    $sql = "SELECT * FROM productos WHERE id_categoria = :cate AND stock > 0;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':cate' => $idcate));
    $info = $info2->fetchAll();

    //this is requiring the correct view
    require "views/vistaproductos.view.php";
?>