<?php

    require "classes/categoriaClass.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $cate = $_POST["cate"];
        $des = $_POST["des"];

        $categorias = new Categoria($cate,$des);
        $categorias->insert();
        
    }
    $conexion = conexion();

    $sql = "SELECT * FROM categorias";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $info = $info2->fetchAll();

    require "views/categorias.view.php";
?>