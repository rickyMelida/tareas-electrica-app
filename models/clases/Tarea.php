<?php
    class Tarea {
        private $id;
        private $tipoTarea;
        private $descripcion;
        private $responsable;

       

        public function setTipoTareas ($tipoTarea) {
            $this->tipoTarea = $tipoTarea;
        }
        
        public function getTipoTarea() {
            return $this->tipoTarea;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getResponsable() {
            return $this->responsable;
        }

        public function setResponsable($responsable) {
            $this->responsable = $responsable;
        }

    }

?>