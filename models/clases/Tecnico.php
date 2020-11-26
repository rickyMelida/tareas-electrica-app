<?php
    class Tecnico {
        private $nombre;
        private $cargo;
        private $turno;

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        public function getCargo() {
            return $this->cargo;
        }

        public function setTurno($turno) {
            $this->turno = $turno;
        }

        public function getTurno() {
            return $this->turno;
        }
        
    }
    
?>