<?php
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $turno = $_POST['turno'];

    $datos = array($nombre, $cargo, $turno, $id);


    $obj = new metodos();

    if($obj->actualizar($datos) == 1) {
        //echo "<script>alert('Datos del tecnico actualizado correctamente!'); window.open('../src/horario_tecnicos.php', '_self');<script>";
        header("location:../src/horario_tecnicos.php");
    }else {
        echo "<script>alert('No se pudieron actualizar los datos.'); window.open('../src/actualizar_tecnico.php', '_self');<script>";
    }


?>