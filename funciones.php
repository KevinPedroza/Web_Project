<?php
    //this function will check if the user exists
    function checkUser($email){
        $conexion = conexion();
        $sql = "SELECT * FROM usuarios WHERE correo = :corre";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':corre' => $email));
        $info = $info2->fetch();
        return $info;
    }

?>