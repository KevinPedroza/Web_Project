<?php
    //this is requiring the class for it to be done
    require "classes/categoriaClass.php";

    //this is getting the conexion from the file
    $conexion = conexion();
    $errores = "";
    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $cate = $_POST["cate"];
        $des = $_POST["des"];

        //this is bringing all the categories
        $sql = "SELECT categoria FROM categorias WHERE categoria = '$cate';";
        $info2 = $conexion->prepare($sql); 
        $info2->execute();
        $info = $info2->fetch();

        if($info !== false){
            $errores .= "<li>El nombre de esa categoria ya existe!</li>";
        }
        else{
            $categorias = new Categoria($cate,$des);
            $categorias->insert();
        }
        
    }
    
    //this is bringing all the categories
    $sql = "SELECT * FROM categorias";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $info = $info2->fetchAll();

    //this is requiring the correct view
    require "views/categorias.view.php";
?>