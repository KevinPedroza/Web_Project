<?php
    //this is requiring the class for it to be done
    require "classes/productClass.php";

    //this is getting the id from the category
    $id = $_GET["id"];

    //this is getting the conexion from the database
    $conexion = conexion();

    //this is bringing all the categories
    $sql = "SELECT * FROM productos WHERE id = '$id';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $producto = $info2->fetch();

    //this is getting the unique category
    $idcate = $producto['id_categoria'];
    $sql = "SELECT * FROM categorias WHERE id = '$idcate';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $categoria = $info2->fetch();

    //this is getting all the categories
    $sql = "SELECT * FROM categorias;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $categorias = $info2->fetchAll();

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $oldid = $_POST["oldid"];
        $sku = $_POST["sku"];
        $producto = $_POST["producto"];
        $precio = $_POST["precio"];
        $des = $_POST["des"];
        $stock = $_POST["stock"];
        $categoria = $_POST["categoria"];
        $oldimg = $_POST["oldimg"];
        $img = $_FILES["img"];
        $oldcate = $_POST["oldcate"];

        if(empty($img) || $img == null){
            $img = $oldimg;
        }else{
            $archivo = "img/" . $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"], $archivo);
            $img = $_FILES["img"]["name"];
        }
        if($categoria == null || empty($categoria)){
            $categoria = $oldcate;
        }

        $producto = new Product($sku,$producto,$des,$img,$categoria,$stock,$precio);
        $producto->update($oldid);  
        header("Location: productos.php");
    }

    //this is requiring the view 
    require "views/modifiprodu.view.php";
?>