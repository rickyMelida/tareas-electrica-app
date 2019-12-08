<?php
    require_once "validar_horario.php";
    require_once "conexionBD.php";
    require_once "metodos_crud.php";
    require_once "../procesos/tecnicos.php";

    //Guardamos los datos que vinieron desde el formulario
    $tipo_tr = $_POST['t_trabajo'];
    $estado_tr = $_POST['estado'];

    $turno = $_POST['turno'];
    $descripcion = $_POST['descripcion'];
    
    //Guardamos la fecha que extraemos del sistema
    $fecha = date("Y")."-".date("m")."-".date("d");

    //Cambiar el nombre del turno por manhana
    if($turno == "Mañana") {
        $turno = "Manhana";
    }

    $obj = new metodos();
    //----------Si se da la opcion de finalizado----///
    if($estado_tr == "finalizado") {
        $hora_inicial = $_POST['h_inicial'];
        $hora_final = $_POST['h_final'];
    
        $horas_hombre = $_POST['res_hh'];
        
        $tecnicos = isset($_POST['tecnico']) ? $_POST['tecnico'] : null;

        if( $estado_tr == "finalizado" && $hora_inicial=="" && $hora_final=="" && empty($descripcion) ) {

            echo "<script>alert('Faltan completar el pendiente'); window.open('../src/agregar.php','_self');</script>";  

        }else {
    
            $arrayTecnicos = null;
            $tec_sele = tecns($turno);            

            $contador = 0;

            $num_array = count($tecnicos);
        
            if($num_array > 0) {
                foreach($tecnicos as $key => $value) {
                    if($contador != $num_array-1) {
                        $arrayTecnicos .= $value. ' ';
                    }else {
                        $arrayTecnicos .= $value;
                        $contador ++;
                    }
                }
            }
            
            $selec = "SELECT cargo_t from tecnicos where turno='$turno' and nombre='$arrayTecnicos'";

            $cargo = $obj->mostrar($selec);

            foreach($cargo as $key) {
                $res_cargo = $key['cargo_t'];         
            }

            $datos = array($tipo_tr, $estado_tr, $descripcion, $fecha, $hora_inicial, $hora_final, $horas_hombre, $turno, $arrayTecnicos, $res_cargo);
            if($obj->agregar($datos) == 1) {
                echo "<script>alert('Se agrego a la BD'); window.open('../src/agregar.php','_self');</script>";        
                //echo "Los tecnicos son ".$arrayTecnicos;
            }else {
                echo "<script>alert('Error al agregar a la BD'); //window.open('../src/agregar.php','_self');</script>";        

            }
        
            

        }

    //----------Si se da la opcion de pendiente----///
    }else {
        if($estado_tr == "pendiente" && empty($descripcion)) {
            echo "<script>alert('Faltan completar el pendiente'); window.open('../src/agregar.php','_self');</script>";
            error_reporting(0);
        }else {
        
            $datos = array($tipo_tr, $estado_tr, $descripcion, $fecha, $turno);
            if($obj->agregar($datos) == 1) {
                error_reporting(0);
                echo "<script>alert('Se agrego a la BD'); window.open('../src/agregar.php','_self');</script>";        
            }
        }
    }
    
       

    

?>