<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        header("index.php");
    }
    //this is gonna bring the functions nedless
    require "conexion.php";

    $errores = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
        $contra = $_POST["password"];
        $conexion = conexion();

        $sql = "SELECT * FROM usuarios WHERE correo = :email AND contra = :con;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':email' => $email,':con' => $contra));
        $info = $info2->fetch();
        if($info === false){
            $errores .= "<li>El Usuario no existe o la información es Incorrecta!</li>";
        }else{
            $_SESSION["usuario"] = $email;
            //header();
        }
    }

    
    //this is calling the view for the index
    require "views/index.view.php";

?>