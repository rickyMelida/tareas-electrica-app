<?php

    function horas($hora) {
        $h = substr($hora, 0,2);
        $m = substr($hora, 3,5);
        $datos = array($h, $m);

        return $datos;
    }

    function validarHora($hora){
        $val="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])$/";

        if(preg_match($val,$hora)){
            return true;
        }        
        return false;
    }

?>