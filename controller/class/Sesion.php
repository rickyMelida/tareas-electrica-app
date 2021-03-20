<?php
    class Sesion{
        private $id;
        private $fecha;
        private $hora;

        public function FunctionName() {
            return $this->id;
        }
    
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