<?php

    //this is requiring the class for it to be done
    require "classes/productClass.php";

    //this is getting the conexion from the file
    $conexion = conexion();
    $errores = "";

    //this is bringing all the categories
    $sql = "SELECT * FROM categorias";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $catego = $info2->fetchAll();

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $check = @getimagesize($_FILES["img"]["tmp_name"]);
        $sku = $_POST["sku"];
        $producto = $_POST["producto"];
        $precio = $_POST["precio"];
        $des = $_POST["des"];
        $stock = $_POST["stock"];
        $categoria = $_POST["categoria"];

        if($check !== false){
            $imgsubida = "img/" . $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"], $imgsubida);
            
            //this is bringing all the categories
            $sql = "SELECT * FROM productos WHERE id_producto = '$sku';";
            $info2 = $conexion->prepare($sql); 
            $info2->execute();
            $info = $info2->fetch();

           if($info !== false){
                $errores .= "<li>El código de ese producto ya existe!</li>";
            }
            else{
                $producto = new Product($sku,$producto,$des,$_FILES["img"]["name"],$categoria,$stock,$precio);
                $producto->insert();            
            }

        }
    }
    
    //this is bringing all the categories
    $sql = "SELECT * FROM productos";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $info = $info2->fetchAll();


    //this is bringing the correct view 
    require "views/productos.view.php";
?>