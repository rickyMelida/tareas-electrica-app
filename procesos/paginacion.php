<?php
    
    require_once ("../validaciones/conexionBD.php");
    require_once ("../validaciones/metodos_crud.php");

    $obj = new conectar();
    $con = $obj->conexion();
    
    $pagina = $_POST['pagina'];

    switch(strlen($pagina)) {
        case 7: $id=substr($pagina, -1);
        break;
        case 8: $id=substr($pagina, -1);
        break;
        case 9: $id=substr($pagina, -2);
        break;
        case 10: $id=substr($pagina, -3);
    }

    $pag = 10;
    $desde = ($id-1) * $pag;

    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * from tareas order by id_tarea desc limit $desde, $pag";

    $muestra = new metodos();
    $ver = $muestra->mostrar($sql);

    $estado_tarea = array();

    foreach($key as $ver) {
        array_push($estado_tarea, $key['estado']);
    }

    echo json_encode($ver);

?>