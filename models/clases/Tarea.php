<?php
    abstract class Tarea {
        private $id;
        private $tipoTarea;
        private $descripcion;
        private $responsable;
        private $estado;
        private $fechaGeneracion;
        private $horaGeneracion;

       public function getId() {
           return $this->id;
       }

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

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function getFechaGeneracion() {
            return $this->fechaInicio;
        }

        public function setFechaGeneracion() {
            $time = time();
            $this->fechaInicio = date("d-m-Y", $time);
        }

        public function getHoraGeneracion() {
            return $this->horaGeneracion;
        }

        public function setHoraGeneracion() {
            $time = time();

            $this->horaGeneracion = date("H:i:s", $time);
        }
    }

?>