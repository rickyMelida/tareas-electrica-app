<?php
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";


    function tecns($turno) {
        $ver = new metodos();
        
        $obj = new conectar();
        $con = $obj->conexion();

        if($turno == "admin"){
            mysqli_set_charset($con,'utf8');
            $tecnicos = "SELECT * from tecnicos";
        }else {
            mysqli_set_charset($con,'utf8');
            $tecnicos = "SELECT * from tecnicos where turno = '$turno'";
        }


        $tecnicosBD = $ver->mostrar($tecnicos);

        $tecs = array();
        $i=0;
        foreach ($tecnicosBD as $key) {
            $tecs[$i] = $key['nombre'];
            $i++;
        }

        return $tecs;
    }

    
?>