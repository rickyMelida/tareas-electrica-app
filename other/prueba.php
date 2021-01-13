<?php
    $usuario = addslashes(htmlspecialchars($_POST['usuario']));
    $password = addslashes(htmlspecialchars($_POST['password']));

    // $usuario = $_POST['usuario'];
    // $password = $_POST['password'];

    echo "Devuelve $usuario y $password";

?>