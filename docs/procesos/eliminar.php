<?php
require_once "../validaciones/conexionBD.php";
require_once "../validaciones/metodos_crud.php";

    $id = $_GET['id'];

    $obj = new metodos();

    if($obj->eliminar($id) == 1) {
        echo "<script>alert('Tecnico Eliminado'); window.open('../src/horario_tecnicos.php', '_self');</script>";
    }else {
        
        echo "<script>alert('No se pudo eliminar', el id es" .$id. " ); window.open('../src/horario_tecnicos.php', '_self');l</script>";
    }

?>