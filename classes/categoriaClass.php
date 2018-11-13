<?php
    //This is calling the conexion file to get into the database
    require "conexion.php";
    
    //Here we are creating the category class
    class Categoria{

        public $categoria;
        public $descripcion;

        function __construct($categoria,$descripcion){
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO categorias VALUES(null, '$this->categoria', '$this->descripcion')";
            $conexion->query($sql);
        }
        //this function will delete any category from the data base
        function delete($id){
            $conexion = conexion();
            $sql = "DELETE FROM categorias WHERE id = '$id';";
            $conexion->query($sql);
        }
        //this function will update any category from the database
        function update($id){
            $conexion = conexion();
            $sql = "UPDATE categorias SET categoria = '$this->categoria', descripcion = '$this->descripcion' WHERE id = '$id';";
            $conexion->query($sql);
        }
    }
?>