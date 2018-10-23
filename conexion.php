<?php
    //this function will return the conexion to get or exchange the information
    function conexion(){
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
            return $conexion;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();  
        }
    }

?>