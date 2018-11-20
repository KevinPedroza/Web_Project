<?php
    //this is gonna active the sessions active
    session_start();

    //This is calling the conexion file to get into the database
    require "conexion.php";

    //this is getting the conexion from the file
    $conexion = conexion();
    
    //this is verifying is we got the admin
    if($_SESSION["usuario"] != "kevinlarios2343@gmail.com"){
        header("Location: error.php");
    }
    
    //this is gonna get the id from the category
    $id = $_POST["id"];

    //this is gonna verify is there is a product related to the category
    $sql = "SELECT * FROM productos WHERE id_categoria = '$id';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $info = $info2->fetch();

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST" && $info !== false){

        $conexion = conexion();
        $sql = "DELETE FROM categorias WHERE id = '$id';";
        $conexion->query($sql);
        
        header("Location: categorias.php");
    }else{
        echo "<script>
        alert('Esta Categoria contiene Productos!');
        window.location.href='categorias.php';
        </script>";
    }

?>