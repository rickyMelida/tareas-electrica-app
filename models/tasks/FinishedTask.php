<?php
    require_once 'Task.php';
    
    class FinishedTask extends Task{
     
        private $end_date;
        private $start_hour;
        private $end_hour;
        private $hours_man;
        private $turn_finished;

        public function __construct( $type_of_task, $description, $responsable, $status,
                                     $end_date,     $start_hour,  $end_hour,    $hours_man, 
                                     $turn_finished) {

            parent::__construct($type_of_task, $description, $responsable, $status);
            $this->end_date = "";
            $this->start_hour = $start_hour;
            $this->end_hour = $end_hour;
            $this->hours_man = $hours_man;
            $this->turn_finished = $turn_finished;
        }

        public function setEndDate() {
            $date = time();
            $this->end_date = date("d-m-Y", $date);
        }

        public function getEndDate() {
            return $this->end_date;
        }

        public function setStartHour($start_hour) {
            $this->start_hour = $start_hour;
        }

        public function getStartHour() {
            return $this->start_hour;
        }

        public function setEndHour($end_hour) {
            $this->end_hour = $end_hour;
        }

        public function getEndHour() {
            return $this->end_hour;
        }

        public function setHourMan($hours_man) {
            $this->hours_man = $hours_man;
        }

        public function getHourMan() {
            return $this->hours_man;
        }

        public function getTurnFinished() {
            return $this->turn_finished;
        }

        public function setTurnFinished($turn_finished) {
            $this->turn_finished  = $turn_finished;
        }
    }

?>