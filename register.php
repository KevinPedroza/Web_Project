<?php

    $errores = "";
    //this is calling the class user
    require "classes/userClass.php";
    //this is calling the functions
    require "funciones.php";
    //this is verifying the info has been sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
        $apellido = filter_var($_POST["apellido"],FILTER_SANITIZE_STRING);
        $telefono = $_POST["telefono"];
        $correo = filter_var($_POST["correo"],FILTER_SANITIZE_EMAIL);
        $dire =  filter_var($_POST["dire"],FILTER_SANITIZE_STRING);
        $contra = $_POST["contra"];
        $contra2 = $_POST["contra2"];
        $tipo = 0;
        
        //this is gonna verify if the user already exits
        if(checkUser($correo) !== false){
            $errores .= "<li>El usuario ya existe!</li>";
        }
        //here we are trying to verify both passwords
        if($contra !== $contra2){
            $errores .= "<li>Las contraseñas no Coinciden!</li>";
        }
        else{
            $contra = hash('sha512',$contra);
            $user = new User($nombre,$apellido,$telefono,$correo,$dire,$contra,$tipo);
            $user->insert();
            header("Location: index.php");
        }

    }

    //this is calling the register view 
    require "views/register.view.php";

?>