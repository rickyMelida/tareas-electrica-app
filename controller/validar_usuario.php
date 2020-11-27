<?php
    require_once "../models/conexionBD.php";
    require_once "../models/clases/Usuario.php";
    require_once "./Responses.php";

    session_start();

    $usuario = new Usuario();
    $obj = new conectar();
    $res = new Responses();

    
    $con = $obj->conexion();

    

    if (!$con) {
        header('Location: ../views/src/errorDB.php');
    }else {
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];


        if($usuario->existeUsuario($user, $pass, $con) > 0) {
            $_SESSION['usuario'] = $usuario;
            $autenticacion = true;
            $rpta = $res->authUser($autenticacion);

            // header('Location: ../views/src/principal.php');
            
        }else {
            echo "<script> alert('Contraseña o usuario incorrecto');
                    window.location='../index.php';
                  </script>";
        }
    }

?>