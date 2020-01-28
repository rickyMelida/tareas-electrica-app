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
                                <strong>Descripcion:</strong> <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php echo $key['des_tarea'];?></span>
                            </div> 
                            <div>
                                <strong>Fecha Gen.:</strong> <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php echo date('d-m-Y', strtotime($key['fecha_gen'])); ?></span>
                            </div>
                            <div>
                                <strong>Fecha Cier.:</strong> <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php if ($key['estado'] == 'Pendiente') { echo 'dd-mm-aaaa'; }else { echo date('d-m-Y', strtotime($key['fecha_cierre'])); } ?></span>
                            </div>
                            <div>
                                <strong>Inicio:</strong> <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['hora_i']; }?></span>
                            </div>
                            <div>
                                <strong>Fin:</strong> <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['hora_f']; }?></span>
                            </div>
                            <div>
                                <strong>Horas Hombre:</strong > <span <?php if($key['estado'] == 'Pendiente') { echo "class='text-danger'"; }?> ><?php if ($key['estado'] == 'Pendiente') { echo '00:00:00'; }else { echo $key['horas_h']; }?></span>
                            </div>
                        </p>
                        <button <?php echo "id='$card'"; if($key['estado'] == 'Pendiente') { echo " class='cerrar_pendientes btn btn-primary'"; }else { echo "class='ver_detalles btn btn-primary'"; }?> >
                            <?php if($key['estado'] == 'Pendiente') { echo "Cerrar"; }else { echo "Ver mas.."; }?>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        
        <?php
            $card = $card - 1;
                }
            }        
        ?>

        <!-- Modal para cerrar los pendientes -->
        <div class="modal fade" id="cerrar_pendiente" tabindex="-1" role="dialog" aria-labelledby="cerrar_pendienteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cerrar Tarea</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container m-auto">
                            <form id="form-modal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tarea_num">Tarea # </label>
                                    <label class="bg-light text-center" id="num_tarea"></label>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tipo de tarea</label>
                                    <select class="form-control" id="tipo_tarea">
                                        <option value="Rutinas">Rutinas</option>
                                        <option value="Asistencia">Asistencia</option>
                                        <option value="Mantenimiento">Mantenimiento</option>
                                        <option value="Correctivo">Correctivo</option>
                                        <option value="Salon de Eventos">Salon de Eventos</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Businesss Center">Businesss Center</option>
                                        <option value="Gimnasio">Gimnasio</option>
                                        <option value="TIC">TIC</option>

                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label for="h_inicial" class="d-block">Hora Inicial:</label>
                                    <input type="text" name="h_inicial" id="h_inicial" class="ml-3">
                                </div>
                                <div class="form-group">
                                    <label for="h_final" class="d-block">Hora Final:</label>
                                    <input type="text" name="h_final" id="h_final" class="ml-3">
                                </div>
                                <div class="form-group disabled">
                                    <label for="h_hombre" class="d-block">Horas hombre:</label>
                                    <input type="text" name="h_hombre"  id="h_hombre" class="ml-3" disabled>
                                    <input type="hidden" name="res_hh" id="res_hh">
                                </div>
                                

                                <div class="form-group">
                                    <div class="form-group">
                                        <h4>Antes</h4>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control images" id="image" name="antes" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h4>Despúes</h4>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control images" id="image" name="despues" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="description" rows="3"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para ver detalles de las tareas realizadas -->
        <div class="modal fade" id="ver_detalles" tabindex="-1" role="dialog" aria-labelledby="ver_detallesTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" > <strong> Tarea Realizada <?php echo $key['id_tar']; ?> </strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="detalles">
                    

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
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


    
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //Si se presiona ver detalles
            $(document).on('click', '.ver_detalles', function() {
                var id_tarea = $(this).attr('id');

                $.ajax({
                    url: '../procesos/detalles.php',
                    method: 'post',
                    data:{ id_tarea: id_tarea },
                    success: function(data) {
                        $('#detalles').html(data);
                        $('#ver_detalles').modal('show');
                    }
                });
            });

            //Si se presiona cerrar pendientes
            $(document).on('click', '.cerrar_pendientes', function() {
                var id_pendiente = $(this).attr('id');

                $.ajax({
                    url: '../procesos/datos_modificar.php',
                    method: 'post',
                    dataType: 'json',
                    data: { id_pendiente: id_pendiente },
                    success: function(data) {
                        $('#num_tarea').html(data.id_tarea);
                        $("#tipo_tarea > option[value='"+data.t_tarea+"']").attr('selected', true);
                        $('#description').val(data.des_tarea);

                        $('#cerrar_pendiente').modal('show');

                        //Calculamos las horas hombre con el focusout de la hora final del trabajo
                        $('#h_final').focusout(function() {
                            //alert('sale');
                            var valida_h1 = new Array();
                            var valida_h2 = new Array();

                            var hora_i = $('#h_inicial').val();
                            var hora_f = $('#h_final').val();

                            valida_h1 = validar(hora_i);
                            valida_h2 = validar(hora_f);

                            var hora_h = valida_h2[0] - valida_h1[0];
                            var min_h = valida_h2[1] - valida_h1[1];


                            //Validamos la hora para que no de negativo
                            if(hora_h < 0)  {
                                hora_h = hora_h * (-1);
                            }

                            //Condicionamos para que los minutos no den negativo
                            if(min_h < 0)  {
                                min_h = min_h * (-1);
                            }


                            //Condicionamos si el horario inicial es mayor que el final
                            if(hora_f < hora_i) {
                                hora_h = ( (24 + parseInt(hora_f)) - parseInt(hora_i) );

                                if (valida_h2[1] < valida_h1[1]) {
                                    hora_h = ( (24 + parseInt(hora_f)) - parseInt(hora_i) ) - 1;
                                    min_h = ((parseInt(valida_h2[1]) + 60) - (valida_h1[1]));

                                }
                            }

                            

                            if(validar(hora_i) == false || validar(hora_f) == false){
                                if(validar(hora_i) == false){
                                    alert('Formato de hora inicial no valido!');
                                    //document.getElementById('h_inicial').select();
                                }

                                if(validar(hora_f) == false){
                                    alert('Formato de hora final no valido!');
                                    //document.getElementById('h_final').select();
                                }
                            }else{
                                $('#h_hombre').val(hora_h + ":" + min_h);
                                $('#res_hh').val(hora_h + ":" + min_h);

                            }
                        });
                    }
                });
            });


            //Si se presiona para guardar el formulario
            $('#form-modal').on('submit', function(event) {
                event.preventDefault();
                if($('#h_inicial').val() == '' && $('#h_final').val() == '') {
                    alert('Faltan completar los horarios');
                }

                

                $('#cerrar_pendiente').modal('hide');
                //alert('Aqui se guardan los datos ');
            });
        });

        ///Funcion para validar hora
        function validar(hora) {
            var horario = new Array();

            var horas = hora.substr(0, 2);
            var minuto = hora.substr(3,5);
            var puntos = hora.substr(2, 1);

            if(!isNaN(horas) && hora.length == 5 && puntos == ':' && horas <= 23 && minuto <= 59) {
                horario[0] = horas;
                horario[1] = minuto;

                return horario;

            }else {
                return false;
            }
        }
        
    </script>
</body>
</html>