<?php
    //This is calling the conexion file to get into the database
    require "conexion.php";

    //this is verifying if the information was sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $id = $_POST["id"];

        $conexion = conexion();
        $sql = "DELETE FROM categorias WHERE id = '$id';";
        $conexion->query($sql);
        
        header("Location: categorias.php");
    }

?>