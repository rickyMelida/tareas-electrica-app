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
    
        $user = addslashes(htmlspecialchars($_POST['usuario']));
        $pass = addslashes(htmlspecialchars($_POST['password']));


        if($usuario->existeUsuario($user, $pass, $con) > 0) {
            $_SESSION['usuario'] = $user;
            $autenticacion = true;
            $rpta = $res->authUser($autenticacion);
            echo json_encode($rpta);
            
        }else {
            $autenticacion = false;
            $rpta = $res->authUser($autenticacion);
            echo json_encode($rpta);
        }
    }

?>