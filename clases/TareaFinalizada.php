<?php
    require_once './Tarea.php';
    class TareaFinalizada extends Tarea {
        
        private $estado;
        private $fechaFin;
        private $horaInicio;
        private $horaFin;
        private $horasHombre;

        public function __construct($estado) {
            $this->estado = $estado;
        }

        public function setFechaFin($fechaFin) {
            $this->fechaFin = $fechaFin;
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

        public function setHoraFin($horaFin) {
            $this->horaFin = $horaFin;
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