<?php
    require_once './Tarea.php';
    class TareaFinalizada extends Tarea {
     
        private $fechaFin;
        private $horaInicio;
        private $horaFin;
        private $horaInicio;
        private $horasHombre;

        public function __construct() {
            $tarea_pendiente = new Tarea();
            $tarea_pendiente.setEstado('Pendiente');
        }

        public function setFechaFin() {
            $time = time();
            $this->fechaFin = date("d-m-Y", $time);
        }

        public function getFechaFin() {
            return $this->fechaFin;
        }


        public function setHoraInicio($horaInicio) {
            $this->horaInicio = $horaInicio;
        }

        public function getHoraInicio() {
            return $this->horaInicio;
        }

        public function setHoraFin() {
            $time = time();
            $this->horaFin = date("H:i:s", $time)
        }

        public function getHoraFin() {
            $this->horaFin;
        }

        public function setHorasHombre($horaInicio, $horaFin) {
            $horaInicio = $this->getHoraInicio;
            $horaFin = $this->getHoraFin;

            $this->horasHombre = $horaFin - $horaInicio;
        }

        public function getHorasHombre() {
            return $this->horasHombre;
        }
    }

?>