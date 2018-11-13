<?php
    //this is requiring the class for it to be done
    require "classes/categoriaClass.php";

    //this is getting the id from the category
    $id = $_GET["id"];

    //this is getting the conexion from the database
    $conexion = conexion();

    //this is bringing all the categories
    $sql = "SELECT * FROM categorias WHERE id = '$id';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $categoria = $info2->fetch();

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $cate = $_POST["newcate"];
        $des = $_POST["newdes"];
        $id = $_POST["oldid"];

        $categorias = new Categoria($cate,$des);
        $categorias->update($id);
        header("Location: categorias.php");
    }

    //this is requiring the view 
    require "views/modificate.view.php";
?>