<?php
    session_start();

    error_reporting(0);
    if(isset($_COOKIE['usuario'])) {
        $var_session = $_COOKIE['usuario'];

    }else {
        $var_session = $_SESSION['usuario'];

    }  

    if($var_session == null || $var_session== '') {
        echo "<script>alert('Debe iniciar sesion con un usuario valido!');
                window.location.href = '../src/volver.php';
        </script>"; 
    }

?>