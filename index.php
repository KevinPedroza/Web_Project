<?php
    //This is because we are working with sessions
    session_start();

    //this is gonna bring the functions nedless
    require "conexion.php";
    //this is calling the view for the index
    require "views/index.view.php";

    $errores = "";
    //this is gonna verify the info has been sent
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
        $contra = $_POST["password"];
        $contra = hash('sha512',$contra);
        $conexion = conexion();

        $sql = "SELECT * FROM usuarios WHERE correo = :email AND contra = :con;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':email' => $email,':con' => $contra));
        $info = $info2->fetch();
        if($info === false){
            $errores .= "<li>El Usuario no existe o la información es Incorrecta!</li>";
        }elseif($email == "kevinlarios2343@gmail.com" && $contra == "3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2"){
            $_SESSION["usuario"] = $email;
            header("Location: admin.php");
        }
        else{
            $_SESSION["usuario"] = $email;
            header("Location: cliente.php");
        }
    }

?>