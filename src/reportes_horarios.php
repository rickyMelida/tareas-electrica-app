<?php
    require_once "../validaciones/autorizacion.php";
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";

    //Objetivo de las horas hombre
    $objetivo = "23:00:00";

    $obj = new metodos();

    //Seleccion de todos los tecnicos
    $nombres_tec = array();
    $numero = 875;

    $c = new conectar();
    $con = $c->conexion();
    $nom = "SELECT tecnicos from tareas";
    $result = mysqli_query($con, $nom);
    $r = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($r as $key) {
        array_push($nombres_tec, $key['tecnicos']);
    }

    //Seleccion de tareas
    $nombres_tipo_tarea = array();

    $tipo = "SELECT tipo from t_tareas";
    $res_tipo = mysqli_query($con, $tipo);
    $r_t = mysqli_fetch_all($res_tipo, MYSQLI_ASSOC);

    foreach($r_t as $key) {
        array_push($nombres_tipo_tarea, $key['tipo']);
    }

    $n_t_t = $nombres_tipo_tarea;
    ////Extraemos a los datos de los sectores
    $sql_tipo = "SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas";
    $datos_tipo = $obj->mostrar($sql_tipo);

    ////Diferencia entre el objetivo y las horas hombre actual
     ///Extraemos el total de las horas hombre
    $hh = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas";
    $datos_hh = $obj->mostrar($hh);

    /*$hora1 = array();
    foreach($datos_hh as $key) { array_push($hora1, $key['horas']) ;}*/

    $horaInicio = new DateTime($hora1);
    $horaTermino = new DateTime($objetivo);
    
    $interval = $horaInicio->diff($horaTermino);
    //echo $interval->format('%H horas %i minutos %s seconds');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Horarios</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <style>
        .principal {
            /*background: #3a7bd5;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>
<body class="principal">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 bg-dark">
        <a href="principal.php" class="float-left m-2 btn btn-outline-light text-light">Volver</a>
        <h1 class=" d-inline text-light m-4">Reportes</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-md-10 p-3">

            <!-----------------Reporte General----------------------------->

            <div class="table-responsive-xl">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mes</th>
                            <th scope="col">Año</th>
                            <th scope="col">H. H. Actual</th>
                            <th scope="col">H. H. Objetivo</th>
                            <th scope="col">Diferencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php setlocale(LC_TIME, "spanish"); echo ucfirst(strftime("%B"));?></th>
                            <td><?php setlocale(LC_TIME, "spanish"); echo ucfirst(strftime("%Y"));?></td>
                            <td><?php foreach($datos_hh as $key) { echo $key['horas'];} ?> </td>
                            <td><?php echo $objetivo." Hs"; ?></td>
                            <td><?php echo $interval->format('%H:%i:%S '); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 m-auto p-3">

            <!-----------------Reporte por tecnico----------------------------->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Técnicos</th>
                            <th scope="col" class="text-center">Total de horas por mes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            ////Extraemos a los datos de los tecnicos
                            for($i=0;$i<count($nombres_tec);$i++){
                                $sql_tec = "SELECT tecnicos, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where tecnicos='$nombres_tec[$i]'";
                                $datos_tec = $obj->mostrar($sql_tec);
                                foreach($datos_tec as $key){ ?>
                                    <tr>
                                        <td class="text-center"><b> <?php echo $key['tecnicos'];?> </b></td>
                                        <td class="text-center"><b> <?php echo $key['horas'];?> </b></td>
                                    </tr>
                        <?php
                                }
                            }
                     ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12 m-auto p-3">
                
            <!-----------------Reporte por sector----------------------------->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Tipo de Trabajo</th>
                            <th scope="col" class="text-center">Total de horas por mes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        ////Extraemos a los datos de los tecnicos
                        for($i=0;$i<count($nombres_tipo_tarea);$i++){

                            $sql_tipo2 = "SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where t_tarea='$nombres_tipo_tarea[$i]'";
                            $datos_tipo2 = $obj->mostrar($sql_tipo2);

                            foreach($datos_tipo2 as $key){ ?>
                                <tr>
                                <td class="text-center"><b> <?php echo $key['t_tarea'];?> </b></td>
                                <td class="text-center"><b> <?php echo $key['horas'];?> </b></td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!------Grficos para el KPI----------->
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(grafica);

            function grafica() {

                var data = google.visualization.arrayToDataTable([
                    ['Tipo de tarea', 'Horas'],
                    
                    <?php
                        $horas = array();
                        $h = array();
                        $h_t = array();

                        $m = array();
                        $m_t = array();

                        //Declaramos variable tipo array donde vamos a guardar los datos con los minutos en decimales
                        $todos = array();

                        //Agregamos una variable de array donde almacenaremos todos los nombres de los distintos tipos de trabajos
                        $nombres = array();

                        for ($i=0; $i < count($nombres_tipo_tarea); $i++) { 
                            $sql_t = "SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where t_tarea='$nombres_tipo_tarea[$i]'";
                            $datos_t = $obj->mostrar($sql_t);    

                            foreach($datos_t as $key) {
                                
                                $horas = $obj->tipo_horas($key['horas']);
                                array_push($nombres, $key['t_tarea']);

                            }

                                array_push($h, $horas[0]);
                                array_push($m, $horas[1]);

                                //Aqui se van a guardar los datos de las horas y minutos por separado
                                if(strlen($h[$i]) == 2) {
                                    array_push($h_t, $h[$i]);
                                    array_push($m_t, $m[$i]);
                                    
                                }else {
                                    array_push($h_t, substr($h[$i], 0, 2));

                                }                            
                        }

                        for($j=0; $j < count($h_t); $j++) {
                            //calculamos el porcentaje de los minutos
                            $por = ($m_t[$j] * 100)/60;
                            array_push($todos, $h_t[$j].".".$por);
                        }
                        
                        for($k=0;$k < count($todos);$k++) {
                            echo "['$nombres[$k]', ".(float)$todos[$k]."],";
                            
                        }
                    ?>
                ]);

                var options = {
                    title: 'Horas hombre por sector',
                    height: 500,
                };

                var chart = new google.visualization.PieChart(document.getElementById('grafica'));
                chart.draw(data, options);
            }
            /*-------------------------- GRAFICA EN BARRA POR TECNICO ----------------------------------------*/


            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(barra);

            function barra() {
            var data = google.visualization.arrayToDataTable([
                ['Técnico', 'Horas Hombre', {role: 'style'}],
                
                

                <?php
                       /* $horas_t = array();
                        $h_t = array();
                        $h_t_t = array();

                        $m_t = array();
                        $m_t_t = array();

                        //Declaramos variable tipo array donde vamos a guardar los datos con los minutos en decimales
                        $todos_t = array();

                        //Agregamos una variable de array donde almacenaremos todos los nombres de los distintos tipos de trabajos
                        $nombres_t = array();

                        for ($i=0; $i < count($nombres_tec); $i++) { 
                            $sql_t_t = "SELECT tecnicos, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where tecnicos='$nombres_tec[$i]'";
                            $datos_t_t = $obj->mostrar($sql_t_t);    

                            foreach($datos_t_t as $key) {
                                
                                $horas_t = $obj->tipo_horas($key['horas']);
                                array_push($nombres_t, $key['t_tarea']);

                            }

                                array_push($h_t, $horas_t[0]);
                                array_push($m_t, $horas_t[1]);

                                //Aqui se van a guardar los datos de las horas y minutos por separado
                                if(strlen($h_t[$i]) == 2) {
                                    array_push($h_t_t, $h_t[$i]);
                                    array_push($m_t_t, $m_t[$i]);
                                    
                                }else {
                                    array_push($h_t_t, substr($h_t[$i], 0, 2));

                                }                            
                        }

                        for($j=0; $j < count($h_t_t); $j++) {
                            //calculamos el porcentaje de los minutos
                            $por_t = ($m_t[$j] * 100)/60;
                            array_push($todos_t, $h_t_t[$j].".".$por_t);
                        }
                        
                        for($k=0;$k < count($todos_t);$k++) {
                            echo "['$nombres_t[$k]', ".(float)$todos_t[$k]."],";
                            
                        }*/
                    ?>




                ['Camilo Barreto', 8.94, '#b87333'],
                ['Miler Sosa', 10.49, '#c82a54'],
                ['Luis Cabrera ', 19.30, '#ef280f'],
                ['Ramon Coronel', 21.45, '#e5e4e2'],
                ['Santiago Mendez', 11.4, '#02ac66'],
                ['Ricardo Melida', 18.45, '#222222'],
                ['Nicolas Acosta', 7.45, '#109dfa'],
            ]);

            var options = {
                title: "Horas Hombre por Técnico",
                height: 500,
                bar: {
                    groupWidth: "70%"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("barra"));
            chart.draw(data, options);
            }
           

        </script>
        <!-- Grafica en torta por sector -->
        <div class="row">
            <div class="col-md-12 m-auto p-3 ">
                <div id="grafica" class="m-auto w-90"></div>
            </div>  
        </div>

        <!-- Grafica en barra por tecnico -->
        <div class="row">
            <div class="col-md-12 m-auto p-3 ">
                <div id="barra" class="m-auto w-100"></div>
            </div>  
        </div>
        <!-- Pie de agina de la aplicacion --->
        <div class="row footer my-5">
            <div class="col-md-12 col-lg-12">
                <footer class="fixed-bottom bg-dark" > 
                    <p class="text-light m-2">Eléctrica PLG - 2020 &copy; </p>
                </footer>
            </div>
        </div>
    </div>

    <script src="../js/design.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>