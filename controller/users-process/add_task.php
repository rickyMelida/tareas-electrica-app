<?php
    require_once '../../models/tasks/FinishedTask.php';
    require_once '../../models/tasks/PendingTask.php';
    require_once '../../models/class/Responses.php';
    require_once "./getTechnical.php";

    session_start();

    $type_of_task = $_POST['t_task'];
    $work_status = $_POST['status'];
    $description = $_POST['description'];
    $turn = $_POST['turn'];
    $before_type = $_FILES['before']['type'];
    $before_name = $_FILES['before']['name'];
    $after_type = $_FILES['after']['type'];
    $after_name = $_FILES['after']['name'];
    
    if($turn == "Mañana") { $turn = "Manhana"; }

    $response = new Responses();
    

    if($work_status == "Finalizado") {
        $generation_hour = $_POST['generation_hour'];
        $end_hour = $_POST['end_hour'];
        $hours_man = $_POST['hours_man'];

        $task = new FinishedTask( $type_of_task, $description, 'Ricardo', $work_status, $generation_hour, $end_hour,$hours_man, $turn);
    
    }else {
        // $task = new PendingTask($type_of_task, $description, 'Ricardo', $work_status, $turn);
        // $add = $task->addTasks();
        
        // echo json_encode($response->resDB($add));

        $r = getTechnical();

        echo json_encode($r);
    }

    
    

?>