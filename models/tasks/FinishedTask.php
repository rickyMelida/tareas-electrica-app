<?php
    require_once 'Task.php';
    
    class FinishedTask extends Task{
     
        private $end_date;
        private $start_hour;
        private $end_hour;
        private $hours_man;
        private $turn_finished;

        public function __construct( $type_of_task, $description, $responsable, $status,
                                     $start_hour,  $end_hour,$hours_man, $turn_finished) {

            parent::__construct($type_of_task, $description, $responsable, $status);
            $this->end_date = date("d-m-Y");
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

        public function addTasks() {
            $con = parent::getCon();

            $data = 
            [
                't_tarea'      => $this->getTypeOfTask(),
                'estado'       => $this->getState(),
                'des_tarea'    => $this->getDescription(),
                'fecha_gen'    => $this->getGenerationDate(),
                'fecha_cierre' => $this->getEndDate(),
                'hora_i'       => $this->getStartHour(),
                'hora_i'       => $this->getEndHour(),
                'horas_h'      => $this->getHourMan(),
                'turno'        => $this->getTurnPending(), 
                'tecnicos'     => $this->getResponsable(),
                'cargo'        => 'Junior',
                'img_antes'    => 'img/img_antes.jpg',
                'img_despues'  => 'img/img_antes.jpg',
                'id_tar1'      => 2
            ];

            $sql = "INSERT into tareas(t_tarea, estado, des_tarea, fecha_gen, fecha_cierre, hora_i, hora_f, horas_h, turno, tecnicos, cargo, img_antes, img_despues, id_tar1)
                    values('$data[t_tarea]', '$data[estado]', '$data[des_tarea]', '$data[fecha_gen]', '$data[fecha_cierre]', '$data[hora_i]', '$data[hora_f]', '$data[horas_h]', '$data[turno]', '$data[tecnicos]', '$data[cargo]', '$data[img_antes]', '$data[img_despues]', '$data[id_tar1]')";

            return $result = mysqli_query($con, $sql);
        }
    }

?>