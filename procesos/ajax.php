<?php
    require_once './paginacion.php';

    $pagina = $_POST['pagina'];

    switch(strlen($pagina)) {
        case 7: $id=substr($pagina, -1);
        break;
        case 8: $id=substr($pagina, -1);
        break;
        case 9: $id=substr($pagina, -2);
        break;
        case 10: $id=substr($pagina, -3);
    }


    echo 'La pagina es '.$id;

?>