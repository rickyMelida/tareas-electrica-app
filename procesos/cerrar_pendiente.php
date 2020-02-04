<?php
    require_once '../validaciones/conexionBD.php';
    require_once '../validaciones/metodos_crud.php';

    if(!empty($_POST)){
        $datos = array();
        $estado = 'Finalizado';
        //Guardamos la fecha que extraemos del sistema
        $fecha_cierre = date("Y")."-".date("m")."-".date("d");

        //Extraemos los datos del formulario del modal
        $id_tarea = $_POST['id_tarea'];
        $tipo_tarea = $_POST['tipo_tarea'];
        $h_inicial = $_POST['h_inicial'];
        $h_final = $_POST['h_final'];
        $res_hh = $_POST['res_hh'];
        $var_session = $_POST['tecnico'];
        $des_tarea = $_POST['description'];
        $turno = $_POST['turno'];


        //Guardamos las imagenes que subimos de los trabajos
        $antes_tipo = $_FILES['antes']['type'];
        $antes_nombre = $_FILES['antes']['name'];

        $despues_tipo = $_FILES['despues']['type'];
        $despues_nombre = $_FILES['despues']['name'];


        $carpeta_antes = $_SERVER['DOCUMENT_ROOT'].'/tareas-electrica-app/tareas/'.$var_session.'/';
        $carpeta_despues = $_SERVER['DOCUMENT_ROOT'].'/tareas-electrica-app/tareas/'.$var_session.'/';

        $obj = new metodos();

        //seleccionamos el id del tipo de tarea y lo guardamos en la variable $id_tp_tr
        $id_tipo_tar = "SELECT id_tar from t_tareas where tipo = '$tipo_tarea'";
        $res_t_t = $obj->mostrar($id_tipo_tar);
        
        foreach($res_t_t as $key) {
            $id_tp_tr = $key['id_tar'];
        }


        //Declaramos un array donde guardaremos el nombre del tecnico y su cargo
        $car_tec = array();

        //Seleccionamos el id que une el usuario y el nombre del usuario
        $selec = "SELECT tecns from usuarios where usuario='$var_session'";
        $id = $obj->mostrar($selec);
        
        foreach($id as $key) {
            $id_t = $key['tecns'];
            $datos_tec = "SELECT nombre, cargo_t from tecnicos where id_tecnico='$id_t'";
            
        }
        
        $res = $obj->mostrar($datos_tec);
        foreach($res as $key) {
            array_push($car_tec, $key['nombre'], $key['cargo_t']);
        }


        //Directorio donde van a ser almacenadas todas las imagenes de las tareas
        $task_server = '/var/www/html/task_server/';

        //Creamos la carpeta(si no existe) donde almacenaremos las imagenes de acuerdo al usuario
        if (!file_exists($task_server.$var_session, 0777)) {
            //creamos la carpeta
            mkdir($task_server.$var_session, 0777, true);
            //le damos los permisos correspondientes
            chmod($task_server.$var_session, 0777);
            
        }

        //Creamos la carpeta donde se van a almacenar las imagenes de acuerdo al id de la tarea, le sumamos una para que detecta
        $file_moved_a = $_FILES['antes']['tmp_name'];
        $file_moved_d = $_FILES['despues']['tmp_name'];
        $directorio = $task_server.$var_session."/tarea_".$id_tarea;

        if (!file_exists($directorio, 0777, true)) {
            //Creamos la carpeta
            mkdir($directorio, 0777);
            //Le damos los permisos
            chmod($directorio, 0777);
        }
        
        //Movemos las imagenes a la carpeta previamente creada

        move_uploaded_file($file_moved_a, $directorio.'/'.$antes_nombre);
        move_uploaded_file($file_moved_d, $directorio.'/'.$despues_nombre);
        
        
        $tipo_antes = substr($antes_tipo, 6, 10);
        $tipo_despues = substr($despues_tipo, 6, 10);
        
        if($tipo_antes == "jpeg") {
            $tipo_antes = "jpg";
        }
        
        if($tipo_despues == "jpeg") {
            $tipo_despues = "jpg";
        }

        rename($directorio.'/'.$antes_nombre, $directorio."/antes.".$tipo_antes);
        rename($directorio.'/'.$despues_nombre, $directorio."/despues.".$tipo_despues);

        $datos = array($tipo_tarea, $estado, $des_tarea, $fecha_cierre, $h_inicial, $h_final, $res_hh, $turno, $car_tec[0], $car_tec[1], $antes_nombre, $despues_nombre, $id_tp_tr);
        

        if($obj->cerrar_pendiente($datos, $id_tarea) == 1) {
            echo 'Pendiente cerrado!';
            $modifica = $obj->modificar_nombre($tipo_antes, $tipo_despues, ($id_tarea - 1));

        }else {
            echo 'No se pudo cerrar pendiente';
        }
    }else {
        echo "No esta leyendo nada";
    }

?>