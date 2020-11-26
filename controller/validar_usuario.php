<?php
    require_once "../models/conexionBD.php";
    require_once "../models/clases/Usuario.php";

    session_start();

    $obj = new conectar();
    $con = $obj->conexion();

    $user = new Usuario();


    if (!$con) {
        header('Location: ../views/src/errorDB.php');
    }else {
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];

        echo $user->metodoPrueba();

        echo $res;

        // if($user->existeUsuario($user, $pass, $con) > 0) {
        //     $_SESSION['usuario'] = $usuario;

        // }else {
        //     echo "<script> alert('Contraseña o usuario incorrecto');
        //         window.location='../index.php';
        //     </script>";
        // }
    }



?>