<?php
    //This is calling the conexion file to get into the database
    require "conexion.php";
    //Here we are creating the sale class
    class Venta{

        public $id_producto;
        public $id_cliente;
        public $fecha;
        public $total;
        public $cantidad;

        function __construct($id_producto , $id_cliente,$fecha,$cantidad,$total){
            $this->id_producto = $id_producto;
            $this->id_cliente = $id_cliente;
            $this->fecha = $fecha;
            $this->total = $total;
            $this->cantidad = $cantidad;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO ventas VALUES(null,'$this->id_producto', '$this->id_cliente', '$this->fecha','$this->cantidad','$this->total')";
            $conexion->query($sql);
        }
    }

?>