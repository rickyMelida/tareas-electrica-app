<?php
    require_once '../validaciones/conexionBD.php';
    require_once '../validaciones/metodos_crud.php';

    if($_POST['id_pendiente']) {
        $obj = new metodos();
        $sql = "SELECT * from tareas where id_tarea = '".$_POST['id_pendiente']."'";
        $res = $obj->asociativo($sql);
        

        echo json_encode($res);
    }

?>