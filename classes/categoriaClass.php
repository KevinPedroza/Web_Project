<?php
    //This is calling the conexion file to get into the database
    require "../conexion.php";
    //Here we are creating the category class
    class Categoria{

        public $id_cate;
        public $categoria;

        function __construct($id_cate,$categoria){
            $this->id_cate = $id_cate;
            $this->categoria = $categoria;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO categorias VALUES('$this->id_cate', '$this->categoria')";
            $conexion->query($sql);
        }
        //this function will delete any category from the data base
        function delete(){
            $conexion = conexion();
            $sql = "DELETE FROM categorias WHERE id_categoria = '$this->id_cate';";
            $conexion->query($sql);
        }
        //this function will update any category from the database
        function update($id){
            $conexion = conexion();
            $sql = "UPDATE categorias SET id_categoria = '$this->id_cate', categoria = '$this->categoria' WHERE id = '$id';";
            $conexion->query($sql);
        }
    }
?>