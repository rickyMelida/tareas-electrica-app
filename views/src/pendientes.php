<?php
    require_once ("../../models/validaciones/autorizacion.php");
    setcookie('usuario', $var_session, time() + 900);
    session_start();
    // include_once '../validaciones/conexionBD.php';
    // include_once '../validaciones/metodos_crud.php';

    // $obj = new conectar();
    // $con = $obj->conexion();

    // $tareas = "SELECT * from tareas";

    // $cant = mysqli_query($con, $tareas);
    // $cant_tar = mysqli_num_rows($cant);

    // $num_pag = ceil($cant_tar/10);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/waitMe.min.css">
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
        <div class="row" id="tareas">
            <div class="col-12 col-lg-8 col-md-8 m-auto" id="tarea_esp">
                <div class="card w-100 my-3" >
                    <!-- Carrusel de las imagenes, con data-pause="false" el carrusel no se mueve automaticamente -->
                    <div id="tarea_1" class="carousel slide" data-pause="false">
                        <!-- -->
                        <ol class="carousel-indicators">
                            <li data-target="#tarea_1" data-slide-to="0" class="active"></li>
                            <li data-target="#tarea_1" data-slide-to="1"></li>
                            
                        </ol>

                        <!-- Imagenes del carrusel -->
                        <div class="carousel-inner ">
                            
                            <!-- Imagen del antes del trabajo -->
                            <div class="carousel-item active">
                                <img src="../../task_server/pendiente.jpg" class="d-block w-100 img-thumbnail" id="img_antes_1" alt="Imagen antes">
                            </div>

                            <!-- Imagen del despues del trabajo -->
                            <div class="carousel-item">
                                <img src="../../task_server/pendiente.jpg" class="d-block w-100 img-thumbnail" id="img_despues_1" alt="Imagen despues">
                            </div>
                        </div>

                        <!-- Boton antes -->
                        <a class="carousel-control-prev" href="#tarea_1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <!-- Boton despues -->
                        <a class="carousel-control-next" href="#tarea_1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">Tarea # <span id="id_tarea_1"></span></h5>
                        <p class="card-text">
                            <div>
                                <strong>Descripcion:</strong><span id="descripcion_1"></span>
                            </div> 
                            <div>
                                <strong>Fecha Gen.:</strong> <span id="fecha_gen_1"></span>
                            </div>
                            <div>
                                <strong>Fecha Cier.:</strong> <span id="fecha_cierre_1"></span>
                            </div>
                            <div>
                                <strong>Inicio:</strong> <span id="h_inicio_1"></span>
                            </div>
                            <div>
                                <strong>Fin:</strong> <span id="h_fin_1"></span>
                            </div>
                            <div>
                                <strong>Horas Hombre:</strong > <span id="h_h_1"></span>
                            </div>
                        </p>
                        <button class='btn btn-primary btn-ver-1'>
                            Ver mas
                        </button>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Paginacion de los pendientes --->
        <div class="row">
            <div class="col-12 col-lg-3 col-md-4 m-auto">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i=0;$i<$num_pag;$i++){?>

                        <li class="pagina page-item" id="pagina_<?php echo $i+1; ?>"><a class="page-link" href="#"><?php echo $i+1;?></a></li>

                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            </div>
        </div>

        <!-- Modal para cerrar los pendientes -->
        <div class="modal fade" id="cerrar_pendiente" tabindex="-1" role="dialog" aria-labelledby="cerrar_pendienteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cerrar Tarea </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container m-auto">
                            <form id="form-modal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tarea_num">Tarea #: </label>
                                    <label type="text" class="bg-light text-center w-25" id="id"></label>
                                    <input type="hidden" name="id_tarea" id='id_tarea'>
                                </div>

                                <div class="form-group">
                                    <label for="tarea_num">Generado por:  </label>
                                    <label class="bg-light text-center" id="tecnico"></label>
                                    <input type="hidden" name="generado" id="generado">
                                    <!-- Colocamos el nombre del usuario que genero el pendiente en input tipo oculto -->
                                    <input type="hidden" name="tecnico" id="realizado" value="<?php echo $var_session; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tipo_tarea">Tipo de tarea</label>
                                    <select class="form-control" id="tipo_tarea" name="tipo_tarea">
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
                                    <label for="turno">Turno</label>
                                    <select class="form-control" name="turno" id="turno" >
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noche">Noche</option>
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
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    <!-- Colocamos la fecha de generacion del pendiente en input tipo oculto -->
                                    <input type="hidden" name="fecha_gen" id="fecha_gen">
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
    <script src="../js/waitMe.min.js"></script>
    <script src="../js/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //alert('se cargo');
            pagina_1();

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
                        $('#tecnico').html(data.tecnicos);
                        $('#id').html(data.id_tarea);
                        $('#id_tarea').val(data.id_tarea);
                        $("#tipo_tarea > option[value='"+data.t_tarea+"']").attr('selected', true);
                        $("#turno > option[value='"+data.turno+"']").attr('selected', true);
                        $('#description').val(data.des_tarea);
                        $('#fecha_gen').val(data.fecha_gen);
                        

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
                if($('#description').val() == ''|| $('#h_inicial').val()=='' || $('#h_final').val() == ''){
                    //alert('Falta completar el pendiente');
                    Swal.fire('Ups!', 'Faltan completar algunos datos','error');
                }else {
                    var datos = new FormData(this);

                    $.ajax({
                        url: '../procesos/cerrar_pendiente.php',
                        method: 'post',
                        data: datos,
                        contentType: false,
                        processData: false,
                        
                        success: function(data){
                            Swal.fire('Excelente!', data,'success').then(function() {
                                $('body').waitMe({ 
                                    effect: 'orbit', 
                                    text: 'Cargando..',
                                    fontSize: '24px' 
                                });
                                
                                $('#cerrar_pendiente').modal('hide');
                                setTimeout(function() {
                                    location.reload();
                                    $('body').waitMe('hide');
                                }, 1000);
                            });

                            
                        }
                    });

                }
            });
        });



        //Una vez que carga la pagina se establece la pagina 1
        function pagina_1() {
            var pagina = $('#pagina_1');
            var task_server = '../../task_server/';


            $.ajax({
                url: '../procesos/paginacion.php',
                method: 'post',
                data: {pagina: pagina.attr('id')},  
                dataType: 'json',
                success: function(data) {
                    pagina.addClass('active');

                    ///Especificaciones para la primera tarea

                    $('#id_tarea_1').html(data[0].id_tarea);
                    $('#descripcion_1').html(data[0].des_tarea);
                    $('#fecha_gen_1').html(data[0].fecha_gen);
                   

                    if(data[0].estado == 'Pendiente') {
                        //Cambiamos el color del texto si es un pendiente
                        $('#id_tarea_1').addClass('text-danger');
                        $('#descripcion_1').addClass('text-danger');
                        $('#fecha_gen_1').addClass('text-danger');


                        $('#fecha_cierre_1').addClass('text-danger');
                        $('#h_inicio_1').addClass('text-danger');
                        $('#h_fin_1').addClass('text-danger');
                        $('#h_h_1').addClass('text-danger');

                        $('#fecha_cierre_1').html('dd-mm-aaaa');
                        $('#h_inicio_1').html('00:00:00');
                        $('#h_fin_1').html('00:00:00');
                        $('#h_h_1').html('00:00:00');

                        $('#img_antes_1').attr('src', task_server+'pendiente.jpg');
                        $('#img_despues_1').attr('src', task_server+'pendiente.jpg');

                        if($('.ver_detalles')) {
                            $('.btn-ver-1').removeClass('ver_detalles');
                        }
                        $('.btn-ver-1').text('Cerrar');
                        $('.btn-ver-1').addClass('cerrar_pendientes');
                        $('.btn-ver-1').attr('id', data[0].id_tarea);

                    }else { 
                        $('#fecha_cierre_1').html(data[0].fecha_cierre);
                        $('#h_inicio_1').html(data[0].hora_i);
                        $('#h_fin_1').html(data[0].hora_f);
                        $('#h_h_1').html(data[0].horas_h);


                         //Hacemos la peticion para extraer el usuario de acuerdo al tecnico
                        $.ajax({
                            url: '../procesos/usuario_tecnico.php',
                            method: 'post',
                            dataType: 'html',
                            data: {nombre: data[0].tecnicos},  
                            success: function(usuario) {
                                $('#img_antes_1').attr('src', task_server + usuario + '/tarea_' + data[0].id_tarea + '/' + data[0].img_antes);
                                $('#img_despues_1').attr('src', task_server + usuario + '/tarea_' + data[0].id_tarea + '/' + data[0].img_despues);
                            }
                        });


                        if($('.cerrar_pendientes')) {
                            $('.btn-ver-1').removeClass('cerrar_pendientes');
                        }

                        $('.btn-ver-1').text('Ver Detalles');
                        $('.btn-ver-1').addClass('ver_detalles');
                        $('.btn-ver-1').attr('id', data[0].id_tarea);

                    }

                    

                    let tareas = $('#tareas');

                    //Empezamos copiar y modificar los datos de las tareas
                    for (let  i= 1;  i<10; i++) {
                        tarea_esp = $('#tarea_esp').clone();


                        //Modificamos los nombres de id de las tareas
                        tarea_esp.find('#id_tarea_1').attr('id', 'id_tarea_' + (i+1));
                        tarea_esp.find('#descripcion_1').attr('id', 'descripcion_'+ (i+1));
                        tarea_esp.find('#fecha_gen_1').attr('id', 'fecha_gen_'+ (i+1));
                        tarea_esp.find('#fecha_cierre_1').attr('id', 'fecha_cierre_'+ (i+1));
                        tarea_esp.find('#h_inicio_1').attr('id', 'h_inicio_'+ (i+1));
                        tarea_esp.find('#h_fin_1').attr('id', 'h_fin_'+ (i+1));
                        tarea_esp.find('#h_h_1').attr('id', 'h_h_'+ (i+1));

                        tarea_esp.find('#tarea_1').attr('id', 'tarea_'+ (i+1));
                        tarea_esp.find('a').attr('href', '#tarea_'+ (i+1));
                        tarea_esp.find('#img_antes_1').attr('id', 'img_antes_'+(i+1));
                        tarea_esp.find('#img_despues_1').attr('id', 'img_despues_'+(i+1));

                        tarea_esp.find('.btn-ver-1').attr('id', data[i].id_tarea);



                        tarea_esp.appendTo(tareas);


                        $('#id_tarea_' + (i+1)).html(data[i].id_tarea);
                        $('#descripcion_' + (i+1)).html(data[i].des_tarea);
                        $('#fecha_gen_' + (i+1)).html(data[i].fecha_gen);
                        
                        //$('.btn-ver-'+(i+1)).attr('id', data[i].id_tarea);

                        if(data[i].estado == 'Pendiente') {
                            $('#id_tarea_' + (i+1)).addClass('text-danger');
                            $('#descripcion_' + (i+1)).addClass('text-danger');
                            $('#fecha_gen_' + (i+1)).addClass('text-danger');

                            $('#fecha_cierre_' + (i+1)).addClass('text-danger');
                            $('#fecha_cierre_' + (i+1)).html('dd-mm-aaa');

                            $('#h_inicio_' + (i+1)).addClass('text-danger');
                            $('#h_inicio_' + (i+1)).html('hh:mm:ss');

                            $('#h_fin_' + (i+1)).addClass('text-danger');
                            $('#h_fin_' + (i+1)).html('hh:mm:ss');
                            
                            $('#h_h_' + (i+1)).addClass('text-danger');
                            $('#h_h_' + (i+1)).html('hh:mm:ss');

                            $('#img_antes_' + (i+1)).attr('src', task_server+'pendientes/pendiente.jpg');
                            $('#img_despues_'+(i+1)).attr('src', task_server+'pendientes/pendiente.jpg');

                            if($('.ver_detalles')) {
                                $('#'+data[i].id_tarea).removeClass('ver_detalles');
                            }
                            $('#'+data[i].id_tarea).text('Cerrar');
                            $('#'+data[i].id_tarea).addClass('cerrar_pendientes');
                        }else {

                            //si hay algun texto de las tareas realizadas que esta en rojo
                            if($('.text-danger')) {
                                $('#id_tarea_' + (i+1)).removeClass('text-danger');
                                $('#descripcion_' + (i+1)).removeClass('text-danger');
                                $('#fecha_gen_' + (i+1)).removeClass('text-danger');
                                $('#fecha_cierre_' + (i+1)).removeClass('text-danger');
                                $('#h_inicio_' + (i+1)).removeClass('text-danger');
                                $('#h_fin_' + (i+1)).removeClass('text-danger');
                                $('#h_h_' + (i+1)).removeClass('text-danger');
                            }

                            $('#id_tarea_' + (i+1)).addClass('text-dark');
                            $('#descripcion_' + (i+1)).addClass('text-dark');
                            $('#fecha_gen_' + (i+1)).addClass('text-dark');
                            $('#fecha_cierre_' + (i+1)).addClass('text-dark');
                            $('#h_inicio_' + (i+1)).addClass('text-dark');
                            $('#h_fin_' + (i+1)).addClass('text-dark');
                            $('#h_h_' + (i+1)).addClass('text-dark');

                            $('#fecha_cierre_' + (i+1)).html(data[i].fecha_cierre);
                            $('#h_inicio_' + (i+1)).html(data[i].hora_i);
                            $('#h_fin_' + (i+1)).html(data[i].hora_f);
                            $('#h_h_' + (i+1)).html(data[i].horas_h);


                            //Hacemos la peticion para extraer el usuario de acuerdo al tecnico
                            $.ajax({
                                url: '../procesos/usuario_tecnico.php',
                                method: 'post',
                                dataType: 'html',
                                data: {nombre: data[i].tecnicos},  
                                success: function(usuario) {
                                    $('#img_antes_' + (i+1) ).attr('src', task_server + usuario + '/tarea_' + data[i].id_tarea + '/' + data[i].img_antes);
                                    $('#img_despues_' + (i+1) ).attr('src', task_server + usuario + '/tarea_' + data[i].id_tarea + '/' + data[i].img_despues);
                                }
                            });

                            if($('.cerrar_pendientes')) {
                                $('#'+data[i].id_tarea).removeClass('cerrar_pendientes');
                            }
                            $('#'+data[i].id_tarea).text('Ver Detalles');
                            $('#'+data[i].id_tarea).addClass('ver_detalles');
                        }
                    }

                    
                }

            });
        }


        //Si se presiona una de los botones para la paginacion
        $('.pagina').on('click', function() {
            let pagina_sel = $(this);
            var task_server = '../../task_server/';
            
            $.ajax({
                url: '../procesos/paginacion.php',
                method: 'post',
                dataType: 'json',
                data: {pagina: pagina_sel.attr('id')},  
                success: function(datos) {
                    $('.pagina').removeClass('active');
                    pagina_sel.addClass('active');
                    
                    for (var j= 0;  j<=10; j++) {

                        $('#id_tarea_' + (j+1)).html(datos[j].id_tarea);
                        $('#descripcion_' + (j+1)).html(datos[j].des_tarea);
                        $('#fecha_gen_' + (j+1)).html(datos[j].fecha_gen);

                        $('.btn-ver-1:eq('+j+')').addClass('ver-'+(j+1));

                        $('.ver-'+(j+1)).attr('id', datos[j].id_tarea);

                        var users = datos[j].id_tarea;
                        var tecnico = datos[j].tecnicos;

                        if(datos[j].estado == 'Pendiente') {
                            $('#fecha_cierre_' + (j+1)).html('dd-mm-aaaa');
                            $('#h_inicio_' + (j+1)).html('00:00:00');
                            $('#h_fin_' + (j+1)).html('00:00:00');
                            $('#h_h_' + (j+1)).html('00:00:00');

                            $('#fecha_cierre_' + (j+1)).addClass('text-danger');
                            $('#h_inicio_' + (j+1)).addClass('text-danger');
                            $('#h_fin_' + (j+1)).addClass('text-danger');
                            $('#h_h_' + (j+1)).addClass('text-danger');

                            $('#img_antes_' + (j+1)).attr('src', task_server+'pendientes/pendiente.jpg');
                            $('#img_despues_'+(j+1)).attr('src', task_server+'pendientes/pendiente.jpg');

                            if($('.ver_detalles')) {
                                $('#' + datos[j].id_tarea).removeClass('ver_detalles');
                            }
                            $('#'+datos[j].id_tarea).text('Cerrar');
                            $('#'+datos[j].id_tarea).addClass('cerrar_pendientes');
                            
                        }else { 

                            //si hay algun texto de las tareas realizadas que esta en rojo
                            if($('.text-danger')) {
                                $('#id_tarea_' + (j+1)).removeClass('text-danger');
                                $('#descripcion_' + (j+1)).removeClass('text-danger');
                                $('#fecha_gen_' + (j+1)).removeClass('text-danger');
                                $('#fecha_cierre_' + (j+1)).removeClass('text-danger');
                                $('#h_inicio_' + (j+1)).removeClass('text-danger');
                                $('#h_fin_' + (j+1)).removeClass('text-danger');
                                $('#h_h_' + (j+1)).removeClass('text-danger');
                            }

                            $('#id_tarea_' + (j+1)).addClass('text-dark');
                            $('#descripcion_' + (j+1)).addClass('text-dark');
                            $('#fecha_gen_' + (j+1)).addClass('text-dark');
                            $('#fecha_cierre_' + (j+1)).addClass('text-dark');
                            $('#h_inicio_' + (j+1)).addClass('text-dark');
                            $('#h_fin_' + (j+1)).addClass('text-dark');
                            $('#h_h_' + (j+1)).addClass('text-dark');

                            $('#fecha_cierre_' + (j+1)).html(datos[j].fecha_cierre);
                            $('#h_inicio_' + (j+1)).html(datos[j].hora_i);
                            $('#h_fin_' + (j+1)).html(datos[j].hora_f);
                            $('#h_h_' + (j+1)).html(datos[j].horas_h);

                                    
                            //Hacemos la peticion para extraer el usuario de acuerdo al tecnico
                            
                            $.ajax({
                                
                                url: '../procesos/usuario_tecnico.php',
                                method: 'post',
                                data: {nombre: tecnico},  
                                success: function(usuario) {
                                    /*$('#img_antes_' + (j+1) ).attr('src', task_server + usuario + '/tarea_' + $('#id_tarea_' + (j+1)).text() + '/' + datos[j].img_antes);
                                    $('#img_despues_' + (j+1) ).attr('src', task_server + usuario + '/tarea_' + $('#id_tarea_' + (j+1)).text() + '/' + datos[j].img_despues);*/
                                    alert('El id es: ' + users);
                                }
                            });

                            if($('.cerrar_pendientes')) {
                                $('#'+datos[j].id_tarea).removeClass('cerrar_pendientes');
                            }
                            $('#'+datos[j].id_tarea).text('Ver Detalles');
                            $('#'+datos[j].id_tarea).addClass('ver_detalles');
                            
                            //console.log(datos[0].id_tarea);
                        }
   
                    }

                }

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