<?php
    //This is calling the conexion file to get into the database
    require "../conexion.php";
    //Here we are creating the sale class
    class Venta{

        public $id_producto;

        function __construct($id_producto){
            $this->id_producto = $id_producto;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO ventas VALUES('$this->id_producto')";
            $conexion->query($sql);
        }
    }

?>