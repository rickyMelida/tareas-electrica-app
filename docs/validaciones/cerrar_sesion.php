<?php
    session_start();

    session_destroy();

    for ($i=0; $i < 5; $i++) { 
        setcookie('usuario', null, time() - 900);

    }

    header("Location: ../index.php");

?>