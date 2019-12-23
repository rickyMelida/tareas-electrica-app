<?php
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";


    function tecns($id) {
        $ver = new metodos();
        
        $obj = new conectar();
        $con = $obj->conexion();

        mysqli_set_charset($con,'utf8');
        $tecnico = "SELECT nombre from tecnicos where id_tecnico='$id'";

        $tecnicosBD = $ver->mostrar($tecnico);

        return $tecnicosBD;
    }

    
?>