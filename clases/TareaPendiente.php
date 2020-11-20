<?php
    require_once './Tarea.php';
    class TareaFinalizada extends Tarea {
        
        private $estado;

        function __construct($estado) {
            $this->estado = $estado;
        }
    }

?>