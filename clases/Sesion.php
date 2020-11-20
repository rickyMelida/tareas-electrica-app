<?php
    class Sesion{
        private $fecha;
        private $hora;
    
        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function getHora() {
            return $this->hora;
        }

        public function setHora($hora) {
            $this->hora = $hora;
        }

    }


?>