<?php

    require_once '../../models/Technical.php';
    session_start();

    function getTechnical() {
        // $technical = new Technical();

        // if(getNameWithUserName($_SESSION['usuario'])) {
            if(true) {
            $result = ['status' => '200', "message" => 'Excelente'];

        }else {
            $result = ['status' => '500', "message" => 'error'];

        }

        return $result;
    }


?>