<?php

    //This is calling the conexion file to get into the database
    require "../conexion.php";
    //Here we are creating the user class
    class User{

        public $nombre;
        public $apellidos;
        public $telefono;
        public $correo;
        public $direccion;
        public $contra
        public $tipo;

        function __construct($nombre,$apellidos,$telefono,$correo,$direccion,$contra,$tipo){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->direccion =$direccion;
            $this->contra = $contra;
            $this->tipo = $tipo;
        }
        //this function will insert data into the database
        function insert(){
            $conexion = conexion();
            $sql = "INSERT INTO usuarios VALUES('$this->nombre', '$this->apellidos', '$this->telefono', '$this->correo', '$this->direccion','$this->contra','$this->tipo')";
            $conexion->query($sql);
        }

    }


?>