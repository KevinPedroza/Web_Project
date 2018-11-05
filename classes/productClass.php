<?php

    //This is calling the conexion file to get into the database
    require "conexion.php";
    //Here we are creating the product class
    class Product{

        public $id_prod;
        public $nombre;
        public $descrip;
        public $img;
        public $categoria;
        public $stock;
        public $precio;

        function __construct($id_prod,$nombre,$descrip,$img,$categoria,$stock,$precio){
            $this->id_prod = $id_prod;
            $this->nombre = $nombre;
            $this->descrip = $descrip;
            $this->img = $img;
            $this->categoria =$categoria;
            $this->stock = $stock;
            $this->precio = $precio;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO productos VALUES('$this->id_prod', '$this->nombre', '$this->descrip', '$this->img', '$this->categoria','$this->stock','$this->precio')";
            $conexion->query($sql);
        }
        //this function will delete any product from the data base
        function delete(){
            $conexion = conexion();
            $sql = "DELETE FROM productos WHERE id_producto = '$this->id_prod';";
            $conexion->query($sql);
        }
        //this function will update any product from the database
        function update($id){
            $conexion = conexion();
            $sql = "UPDATE productos SET id_producto = '$this->id_prod', nombre = '$this->nombre', descri = '$this->descrip', img = '$this->img', id_categoria = '$this->categoria', stock = '$this->stock', precio = '$this->precio' WHERE id = '$id';";
            $conexion->query($sql);
        }

    }


?>