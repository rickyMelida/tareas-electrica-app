<?php
    require_once "../../models/conexionBD.php";
    require_once "./Responses.php";
    require_once "../class/Usuario.php";

    session_start();

    $obj = new conectar();
    $res = new Responses();
    $usuario = new Usuario();

    
    $con = $obj->conexion();

    if (!$con) {
        header('Location: ../views/src/errorDB.php');
    }else {
    
        $user = addslashes(htmlspecialchars($_POST['user']));
        $pass = addslashes(htmlspecialchars($_POST['pass']));

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