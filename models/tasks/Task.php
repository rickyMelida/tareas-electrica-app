<?php

    require_once '../../core/db_abstract_model.php';

    abstract class Task extends DBAbstractModel{

        private $type_of_task;
        private $description;
        private $generation_date;
        private $responsable;
        private $status;
        private $con;

        public function __construct($type_of_task, $description, $responsable, $status) {
            $this->type_of_task = $type_of_task;
            $this->description = $description;
            $this->responsable = $responsable;
            $this->status = $status;
            $this->generation_date = date("d-m-Y");
        }

        public function getCon() {
            $con = parent::open_connection();
            return $con;
        }

        public function testConn() {
            $res = false;
            if(parent::open_connection()) {
                $res = true;               
            }
            return $res;
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

        public function getState() {
            return $this->status;
        }

        public function setState($status) {
            $this->status = $status;
        }

        public function getGenerationDate() {
            return $this->generation_date;
        }

        public function setGenerationDate($date) {
            $this->generation_date = $date;
        }
    }

?>
