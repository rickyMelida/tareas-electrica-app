<?php
    require_once "conexionBD.php";
    session_start();

    $obj = new conectar();
    $con = $obj->conexion();

    if (!$con) {
        header('Location: ../src/errorDB.php');
    }else {

        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        mysqli_set_charset($con,'utf8');
        $sql = "SELECT * from usuarios where usuario= '$usuario' and pass='$pass'";

        $resultado = mysqli_query($con, $sql);

        $filas = mysqli_num_rows($resultado);

        

        if($filas > 0) {
            $_SESSION['usuario'] = $usuario;
            header('Location: ../src/principal.php');

        }else {
            echo "<script> alert('Contraseña o usuario incorrecto');
                window.location='../index.php';
            </script>";
        }
    }



?>