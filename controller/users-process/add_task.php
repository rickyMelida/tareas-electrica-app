<?php
    require_once '../../models/class/tasks/FinishedTask.php';
    require_once '../../models/class/tasks/PendingTask.php';

    $type_of_task = $_POST['t_task'];
    $work_status = $_POST['status'];
    $description = $_POST['description'];
    $turn = $_POST['turn'];
    $before_type = $_FILES['before']['type'];
    $before_name = $_FILES['before']['name'];
    $after_type = $_FILES['after']['type'];
    $after_name = $_FILES['after']['name'];
    
    if($turn == "Mañana") { $turn = "Manhana"; }

    $task = new PendingTask($type_of_task, $descripcion, 'Ricardo', $work_status, $turn);


   echo $task->getTypeOfTask();

    //-------------------------- Si se da la opcion de finalizado -----------------------///
    if($work_status == "Finalizado") {
        $generation_hour = $_POST['generation_hour'];
        $end_hour = $_POST['end_hour'];
        $hours_man = $_POST['hours_man'];

        // $task = new FinishedTask();

        // $task->setGenerationDate();
        // $task->setEndHour();

        
    //     //Guardamos la hora de finalizacion del trabajo
    //     $hora_final = $_POST['h_final'];
        
    //     //Guardamos las horas hombre del trabajo(final-inicial)
    //     $horas_hombre = $_POST['res_hh'];

    //     //Si el estado del trabajo es finalizado la fecha de cierre es el mismo que la fecha de generacion 
    //     $fecha_cierre = $fecha_gen;
        

    //     //Si algunos de los campos que se necesitan completar despues de dar la opcion de finalizado estan vacios
    //     //Da un mensaje de alerta
    //     if($hora_inicial=="" && $hora_final=="" && empty($descripcion) ) {
    //         echo "<script>alert('Faltan completar el pendiente'); window.open('../src/agregar.php','_self');</script>";  
    //     }else {
            
    //         //Directorio donde van a ser almacenadas todas las imagenes de las tareas
    //         //$task_server = '/var/www/html/task_server/';
    //         $task_server = "../../task_server/";

    //         //Creamos la carpeta(si no existe) donde almacenaremos las imagenes de acuerdo al usuario
    //         if (!file_exists($task_server.$var_session, 0777)) {
    //             //creamos la carpeta
    //             mkdir($task_server.$var_session, 0777, true);
    //             //le damos los permisos correspondientes
    //             chmod($task_server.$var_session, 0777);
                
    //         }
            
    //         //Seleccionamos el ultimo registro guardado
    //         $ult_reg = "SELECT * from tareas order by id_tarea desc limit 1";
            
    //         $r = $obj->mostrar($ult_reg);

    //         //$res_id es la variable(array)  donde esta almacenado el ultimo id de la tarea guardada
    //         $res_id = array();
    //         foreach($r as $key) {
    //             array_push($res_id, $key['id_tarea']); 
    //         }
            

    //         //Creamos la carpeta donde se van a almacenar las imagenes de acuerdo al id de la tarea, le sumamos una para que detecta
    //         $file_moved_a = $_FILES['antes']['tmp_name'];
    //         $file_moved_d = $_FILES['despues']['tmp_name'];
    //         $directorio = $task_server.$var_session."/tarea_".($res_id[0] + 1);

    //         if (!file_exists($directorio, 0777, true)) {
    //             //Creamos la carpeta
    //             mkdir($directorio, 0777);
    //             //Le damos los permisos
    //             //chmod($directorio, 0777);
    //         }
            
    //         //Movemos las imagenes a la carpeta previamente creada

    //         move_uploaded_file($file_moved_a, $directorio.'/'.$antes_nombre);
    //         move_uploaded_file($file_moved_d, $directorio.'/'.$despues_nombre);
            
            
    //         $tipo_antes = substr($antes_tipo, 6, 10);
    //         $tipo_despues = substr($despues_tipo, 6, 10);
            
    //         if($tipo_antes == "jpeg") {
    //             $tipo_antes = "jpg";
    //         }
            
    //         if($tipo_despues == "jpeg") {
    //             $tipo_despues = "jpg";
    //         }

    //         rename($directorio.'/'.$antes_nombre, $directorio."/antes.".$tipo_antes);
    //         rename($directorio.'/'.$despues_nombre, $directorio."/despues.".$tipo_despues);
            
    //         echo 'El nombre es '. $antes_nombre .'<br>';
    //         $datos = array($tipo_tr, $estado_tr, $descripcion, $fecha_gen, $fecha_cierre, $hora_inicial, $hora_final, $horas_hombre, $turno, $car_tec[0], $car_tec[1], $antes_nombre, $despues_nombre, $id_tp_tr);
            

    //         if($obj->agregar($datos) == 1) {
    //             echo "<script>alert('Se agrego a la BD'); window.open('../src/agregar.php','_self');</script>";        
    //             $modifica = $obj->modificar_nombre($tipo_antes, $tipo_despues, $res_id[0]);
    //         }else {
    //                 echo "<script>alert('Error al agregar a la BD'); window.open('../src/agregar.php','_self');</script>";     
    //         } 

    //     }
    
    //     //----------Si se da la opcion de pendiente----///
    }else {
        // $pending_task = new PendingTask();
        // echo $pending_task->getStatus();
    //     if($estado_tr == "Pendiente" && empty($descripcion)) {
    //         echo "<script>alert('Faltan completar el pendiente'); window.open('../src/agregar.php','_self');</script>";
    //         error_reporting(0);
    //     }else {
    //         //tareas(t_tarea, estado, des_tarea, fecha_gen, turno, tecnicos, cargo, id_tar1)
    //         $datos = array($tipo_tr, $estado_tr, $descripcion, $fecha_gen, $turno, $car_tec[0], $car_tec[1], $id_tp_tr);
    //         if($obj->agregar_pendiente($datos)) {
    //             error_reporting(0);
    //             echo "<script>alert('Se agrego a la BD'); window.open('../src/agregar.php','_self');</script>";        
    //         }else {
    //             echo "<script>alert('Error al agregar a la BD'); window.open('../src/agregar.php','_self');</script>";        
                
    //         }
    //     }
    }
    

?>