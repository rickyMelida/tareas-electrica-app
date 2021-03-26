<?php
    require_once '../../models/Technical.php';

    function getTechnical() {
        // $technical = new Technical();
        // $name = getNameWithUserName($_SESSION['usuario']);
        $result = ['status' => '500', "message" => 'error', 'value' => $_SESSION['usuario']];

        return $result;
    }


?>