<?php
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";

    $obj = new metodos();

<<<<<<< HEAD
    $sql = "SELECT * from tareas ORDER BY id_tarea";

    if(isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $sql = "SELECT * from tareas where
            id_tarea LIKE '%".$nombre."%' OR
            t_tarea LIKE '%".$nombre."%' OR
            estado LIKE '%".$nombre."%' OR
            des_tarea LIKE '%".$nombre."%' OR
            fecha LIKE '%".$nombre."%' OR
            hora_i LIKE '%".$nombre."%' OR
            hora_f LIKE '%".$nombre."%' OR
            horas_h LIKE '%".$nombre."%' OR
            tecnicos LIKE '%".$nombre."%' OR
            cargo LIKE '%".$nombre."%' OR
            img_antes LIKE '%".$nombre."%' OR
            img_despues LIKE '%".$nombre."%' OR";
    }

    $res = $obj->mostrar($sql);


=======
>>>>>>> e32b784f2bd228129347d162c03fea868e975331
?>