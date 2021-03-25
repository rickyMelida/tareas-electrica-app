<?php

    abstract class Task {

        private $type_of_task;
        private $description;
        private $generation_date;
        private $responsable;
        private $status;

        public function __construct($type_of_task, $description, $responsable, $status) {
            $this->type_of_task = $type_of_task;
            $this->description = $description;
            $this->responsable = $responsable;
            $this->status = $status;
        }


        public function setTypeOfTask ($type_of_task) {
            $this->type_of_task = $type_of_task;
        }
        
        public function getTypeOfTask() {
            return $this->type_of_task;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getResponsable() {
            return $this->responsable;
        }

        public function setResponsable($responsable) {
            $this->responsable = $responsable;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getGenerationDate() {
            return $this->generation_date;
        }

        public function setGenerationDate() {
            $date = time();
            $this->generation_date = date("d-m-Y", $date);
        }
    }

?>
