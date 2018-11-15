<?php 
    //This is calling the conexion file to get into the database
    require "conexion.php";

    //this is getting the from the list to be deleted
    $idlista = $_GET["idpro"];

    //here we are establishing the conexion to the database
    $conexion = conexion();

    //here we are deleting the item from the list on the database
    $sql = "DELETE FROM lista WHERE id = '$idlista';";
    $conexion->query($sql);

    //here we are redirecting to the same page
    header("Location: cliente.php");

?>