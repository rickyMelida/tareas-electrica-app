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

        public function addTasks() {
            $con = parent::getCon();

            $data = 
            [
                't_tarea'   => $this->getTypeOfTask(),
                'estado'    => $this->getState(),
                'des_tarea' => $this->getDescription(),
                'fecha_gen' => $this->getGenerationDate(),
                'turno'     => $this->getTurnPending(), 
                'tecnicos'  => $this->getResponsable(),
                'cargo'     => 'Junior',
                'id_tar1'   => 2
            ];

            $sql = "INSERT into tareas(t_tarea, estado, des_tarea, fecha_gen, turno, tecnicos, cargo, id_tar1)
                    values('$data[t_tarea]', '$data[estado]', '$data[des_tarea]', '$data[fecha_gen]', '$data[turno]', '$data[tecnicos]', '$data[cargo]', '$data[id_tar1]')";

            return $result = mysqli_query($con, $sql);
        }


    }

?>