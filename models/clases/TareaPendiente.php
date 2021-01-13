<?php
    require_once './Tarea.php';
    class TareaFinalizada extends Tarea {
        

        function __construct() {
            $tarea_pendiente = new Tarea();
            $tarea_pendiente.setEstado('Pendiente');
        }
    }

?>