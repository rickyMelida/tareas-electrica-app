<?php
    require_once 'Task.php';

    class PendingTask  extends Task{
        private $turn_pending;
        
        public function __construct($type_of_task, $description, $responsable, $status, $turn_pending) {
            parent::__construct($type_of_task, $description, $responsable, $status);
            $this->turn_pending = $turn_pending;
        }

        public function getTurnPending() {
            return $this->turn_pending;
        }

        public function setTurnPending($turn_pending) {
            $this->turn_pending = $turn_pending;
        }


    }

?>