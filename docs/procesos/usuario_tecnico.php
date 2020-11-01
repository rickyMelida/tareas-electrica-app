<?php
    require_once '../validaciones/conexionBD.php';
    require_once '../validaciones/metodos_crud.php';
    $nombre = $_POST['nombre'];

    $obj = new conectar();
    $con = $obj->conexion();

    $sql = "SELECT usuario from usuarios inner join tecnicos on usuarios.tecns=tecnicos.id_tecnico where nombre = '$nombre'";

    $muestra = new metodos();
    $ver = $muestra->mostrar($sql);

    $res = array();

    foreach($ver as $key) {
        array_push($res, $key['usuario']);
    }

    echo $res[0];

?>