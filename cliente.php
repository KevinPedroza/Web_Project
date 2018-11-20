<?php 
    //this is gonna active the sessions active
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
    
    //this is gonna bring all the products
    $sql = "SELECT id_producto,id_categoria,img FROM productos LIMIT 5";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $prod = $info2->fetchAll();


    //this is for the pagination
    $pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
    $inicio = ($pagina > 1) ? ($pagina * 4 - 4) :  0;

    //this gonna bring all the categories
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM categorias LIMIT $inicio, 4";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $cate = $info2->fetchAll(); 

    if(!$cate){
        header("Location: cliente.php");
    }

    //this is bringing the total of categories
    $totalcate = $conexion->query("SELECT FOUND_ROWS() AS total");
    $totalcate = $totalcate->fetch()["total"];
    $numeropaginas = ceil($totalcate / 4);

    //this is calling the view of the customer
    require "views/cliente.view.php";
?>