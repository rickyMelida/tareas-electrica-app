<?php
    require_once ("../validaciones/autorizacion.php");
    require_once ("../validaciones/conexionBD.php");
    require_once ("../validaciones/metodos_crud.php");

    $obj = new conectar();
    $con = $obj->conexion();
    

    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * from tareas order by id_tarea desc";
    $cant = mysqli_query($con, $sql);
    $cant_tar = mysqli_num_rows($cant);

    $muestra = new metodos();
    $ver = $muestra->mostrar($sql);

    $estado_tarea = array();

    foreach($key as $ver) {
        array_push($estado_tarea, $key['estado']);
    }

    $task_server = '../../task_server/';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <title>Pendientes</title>
    <style>
        .principal {
            background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>
<body class="principal">
    <div class="container-fluid">
        
        <!-- Cabecera de la aplicacion -->
        <div class="row">
            <div class="col-md-12 col-lg-12 bg-dark">
               <a href="principal.php" class="float-left m-2 btn btn-outline-light text-light">Volver</a>
              <h1 class=" d-inline text-light m-5">Tareas</h1>
            </div>
        </div>
        
        <!-- Buscar por  -->
        <div class="row m-auto">
            <div class="col-10 p-3">
			    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
            </div>
        </div>
                        
        <!-- Lista de tareas de acuerdo al tecnico -->
        <?php
            $card = $cant_tar;
            foreach($ver as $key) {
                $sql_tec = "SELECT usuario from usuarios inner join tecnicos on usuarios.tecns=tecnicos.id_tecnico where nombre = '$key[tecnicos]'";
                $tecs = $muestra->mostrar($sql_tec);
                foreach($tecs as $tec){  

        ?>
        <div class="row m-2">
            <div class="col-12 col-lg-3 col-md-4">
                <div class="card w-100 " >
                    <!-- Carrusel de las imagenes, con data-pause="false" el carrusel no se mueve automaticamente -->
                    <div id="tarea_<?php echo $card;?>" class="carousel slide" data-pause="false">
                        <!-- -->
                        <ol class="carousel-indicators">
                            <li data-target="#tarea_<?php echo $card;?>" data-slide-to="0" class="active"></li>
                            <li data-target="#tarea_<?php echo $card;?>" data-slide-to="1"></li>
                            
                        </ol>

                        <!-- Imagenes del carrusel -->
                        <div class="carousel-inner ">
                            
                            <!-- Imagen del antes del trabajo -->
                            <div class="carousel-item active">
                                <img src="<?php echo $task_server; if($key['estado'] == 'Pendiente') { echo 'pendientes/pendiente.jpg'; }else { echo $tec['usuario'].'/tarea_'; ?><?php echo $key['id_tarea']."/".$key['img_antes'] ; }?>" class="d-block w-100 img-thumbnail" alt="Imagen antes">
                            </div>

                            <!-- Imagen del despues del trabajo -->
                            <div class="carousel-item">
                                <img src="<?php echo $task_server; if($key['estado'] == 'Pendiente') { echo 'pendientes/pendiente.jpg'; }else { echo $tec['usuario'].'/tarea_'; ?><?php echo $key['id_tarea']."/".$key['img_despues'] ; }?>" class="d-block w-100 img-thumbnail" alt="Imagen despues">
                            </div>
                        </div>

                        <!-- Boton antes -->
                        <a class="carousel-control-prev" href="#tarea_<?php echo $card;?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <!-- Boton despues -->
                        <a class="carousel-control-next" href="#tarea_<?php echo $card;?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">Tarea #<?php echo $card;?></h5>
                        <p class="card-text">
                            <div>
                                <strong>Descripcion:</strong> <span><?php echo $key['des_tarea'];?></span>
                            </div> 
                            <div>
                                <strong>Fecha Gen.:</strong> <span><?php echo date('d-m-Y', strtotime($key['fecha_gen'])); ?></span>
                            </div>
                            <div>
                                <strong>Fecha Cier.:</strong> <span><?php if ($key['estado'] == 'Pendiente') { echo 'dd-mm-aaaa'; }else { echo date('d-m-Y', strtotime($key['fecha_cierre'])); } ?></span>
                            </div>
                            <div>
                                <strong>Inicio:</strong> <span><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['hora_i']; }?></span>
                            </div>
                            <div>
                                <strong>Fin:</strong> <span><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['hora_f']; }?></span>
                            </div>
                            <div>
                                <strong>Horas Hombre:</strong> <span><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['horas_h']; }?></span>
                            </div>
                        </p>
                        <a href="index.php" class="btn btn-primary">Ver mas..</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $card = $card - 1;
                }
            }        
        ?>
        <!-- Pie de agina de la aplicacion --->
       <div class="row footer my-5">
            <div class="col-md-12 col-lg-12">
                <footer class="fixed-bottom bg-dark" > 
                    <p class="text-light m-2">Eléctrica PLG - 2020 &copy; </p>
                </footer>
            </div>
        </div>
    </div>


    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>