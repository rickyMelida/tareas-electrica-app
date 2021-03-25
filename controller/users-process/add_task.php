<?php
    require_once '../../models/tasks/FinishedTask.php';
    require_once '../../models/tasks/PendingTask.php';

    $type_of_task = $_POST['t_task'];
    $work_status = $_POST['status'];
    $description = $_POST['description'];
    $turn = $_POST['turn'];
    $before_type = $_FILES['before']['type'];
    $before_name = $_FILES['before']['name'];
    $after_type = $_FILES['after']['type'];
    $after_name = $_FILES['after']['name'];
    
    if($turn == "Mañana") { $turn = "Manhana"; }

    // $task = new PendingTask($type_of_task, $descripcion, 'Ricardo', $work_status, $turn);


    if($work_status == "Finalizado") {
        $generation_hour = $_POST['generation_hour'];
        $end_hour = $_POST['end_hour'];
        $hours_man = $_POST['hours_man'];

        // $task = new FinishedTask();

        // $task->setGenerationDate();
        // $task->setEndHour();

        
    
    }else {
        echo $type_of_task . "<br>";
        $task = new PendingTask($type_of_task, $description, 'Ricardo', $work_status, $turn);
        echo $task->getResponsable();
    }
    

?>