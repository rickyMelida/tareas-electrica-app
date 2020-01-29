<?php

    class metodos {
        
        public function mostrar($sql) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $result  = mysqli_query($con, $sql);

            //return mysqli_fetch_array($result, MYSQLI_NUM);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            //return mysqli_fetch_row($result);
        }

        public function asociativo($sql) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $result  = mysqli_query($con, $sql);

            return mysqli_fetch_assoc($result);
        }


        public function agregar($datos) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $sql = "INSERT into tareas(t_tarea, estado, des_tarea, fecha_gen, fecha_cierre, hora_i, hora_f, horas_h, turno, tecnicos, cargo, img_antes, img_despues, id_tar1)
            values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]', '$datos[10]', '$datos[11]', '$datos[12]', '$datos[13]')";

            return $result = mysqli_query($con, $sql);
        }

        public function agregar_pendiente($datos) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $sql = "INSERT into tareas(t_tarea, estado, des_tarea, fecha_gen, turno, tecnicos, cargo, id_tar1)
            values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";

            return $result = mysqli_query($con, $sql);
        }

        public function eliminar($id) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $sql = "DELETE from tecnicos where id_tecnico = '$id'";

            return mysqli_query($con, $sql);
        }

        public function actualizar($datos) {
            $obj = new conectar();
            $con = $obj ->conexion();

            $sql = "UPDATE tecnicos set nombre='$datos[0]', cargo_t='$datos[1]', turno='$datos[2]' where id_tecnico='$datos[3]'";

            return $result = mysqli_query($con, $sql);
        }

        public function tipo_horas($horario){
            $res = array();

            //Si nos da esta opcion la hora tiene dos digitos
            if(substr($horario, 3, 1) ) {
                $hora = substr($horario, 0, 2);
                $min = substr($horario, 3, 2);
                $seg = substr($horario, 6, 2);

            }else {
                
                $hora = substr($horario, 0, 3);
                $min = substr($horario, 4, 2);
                $seg = substr($horario, 7, 2);
            }
            
            for ($i=0; $i < 2; $i++) { 
                array_push($res, $hora, $min, $seg);
            }

            return $res;
        }

        public function cerrar_pendiente($datos, $id) {
            $obj = new conectar();
            $con = $obj->conexion();

            $sql = "UPDATE tareas 
            set t_tarea = '$datos[0]', 
            estado = '$datos[1]',
            des_tarea = '$datos[2]',
            fecha_cierre = '$datos[3]',
            hora_i = '$datos[4]',
            hora_f = '$datos[5]',
            horas_h = '$datos[6]',
            turno = '$datos[7]',
            tecnicos = '$datos[8]',
            cargo='$datos[9]',
            img_antes = '$datos[10]',
            img_despues = '$datos[11]',
            id_tar1 = '$datos[12]' where id_tarea='$id'";

            return $result = mysqli_query($con, $sql);

        }

        public function modificar_nombre($tipo_antes, $tipo_despues, $res) {
            $obj = new conectar();
            $con = $obj ->conexion();
            $sql = "UPDATE tareas set img_antes='antes.$tipo_antes', img_despues='despues.$tipo_despues' where id_tarea = ($res + 1)";


            return $result = mysqli_query($con, $sql);
        }


        //Funcion para determinar diferencia entre horas actual y horas objetivo
        function diff($h_ini, $h_fin) {

            //------------Se separan las los tiempos de la hora inicial
            //Si es la hora tiene mas de dos digitos entonces seleccionas los tres primeros caracteres
            if(strlen($h_ini) > 8) {
                $hor_ini= substr($h_ini, 0,3);
                $min_ini= substr($h_ini, 4, 2);
                $seg_ini= substr($h_ini, 7, 2);
            }else {
                $hor_ini= substr($h_ini, 0,2);
                $min_ini= substr($h_ini, 3, 2);
                $seg_ini= substr($h_ini, 6, 2);
            }
        
        
        
        
            //----Se separan las los tiempos de la hora final
            //Si es la hora tiene mas de dos digitos entonces seleccionas los tres primeros caracteres
            if(strlen($h_fin) > 8) {
                $hor_fin= substr($h_fin, 0,3);
                $min_fin= substr($h_fin, 4, 2);
                $seg_fin= substr($h_fin, 7, 2);
            }else {
                $hor_fin= substr($h_fin, 0,2);
                $min_fin= substr($h_fin, 3, 2);
                $seg_fin= substr($h_fin, 6, 2);
            }
            
        
            //Se resuelve conflicto entre difencia de horas
            if($min_fin < $min_ini) {
                $min_fin = 60;
                $hor_fin = $hor_fin - 1;
            }
        
        
            //----------------Diferencia entre ambos tiempos
            $dif_hor = $hor_fin - $hor_ini;
            $dif_min = $min_fin - $min_ini;
            $dif_seg = $seg_fin - $seg_ini;
            
            //----------Si uno de los resultados sea negativo lo redondeamos
            if($dif_hor < 0) {
                $dif_hor = $dif_hor * (-1);
            }
            if($dif_min < 0) {
                $dif_min = $dif_min * (-1);
            }
            if($dif_seg < 0) {
                $dif_seg = $dif_seg * (-1);
            }
        
            
            //Agregamos un cero delante si es un numero menor a 10
            if($dif_hor < 10) {
                $dif_hor = (0 . $dif_hor);    
            }
            if($dif_min < 10) {
                $dif_min = (0 . $dif_min); 
            }
            if($dif_seg < 10) {
                $dif_seg = (0 . $dif_seg);    
            }
        
        
            //Concatenamos todos los datos
            $res = $dif_hor . ":" . $dif_min . ":" . $dif_seg;
        
        
            return $res;
        
          }
    }

?>