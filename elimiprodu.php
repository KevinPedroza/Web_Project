<?php 

    //This is calling the conexion file to get into the database
    require "conexion.php";

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $id = $_POST["id"];

        $conexion = conexion();
        $sql = "DELETE FROM productos WHERE id_producto = '$id';";
        $conexion->query($sql);
        
        header("Location: productos.php");
    }

?>