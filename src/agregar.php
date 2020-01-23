<?php
    require_once "../validaciones/autorizacion.php";
    require_once "../procesos/tecnicos.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Agregar</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <style>
        .principal {
            /*background: #3a7bd5;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>
<body>
    <div class="container-fluid border border-primary w-100">
        <!-- Cabecera de la aplicacion -->
        <div class="row mb-2">
            <div class="col-md-12 col-lg-12 bg-dark p-2">
               <a href="principal.php" class="float-left m-2 btn btn-outline-light text-light">Volver</a>
              <h2 class=" d-inline text-light my-5">Agregar Tareas</h2>
            </div>
        </div>

        <!-- Formulario de ingreso de tareas y pendientes ----- -->
        <form action="../validaciones/formulario.php" method="post" name="formulario" class="border border-dark p-3 principal mx-lg-5" enctype="multipart/form-data">
        <div class="row">
            
            <!---------------Tipos de trabajo--------------------->
            <div class="col-lg-4 col-md-12">
                <h2>Tipos de Trabajo</h2>
                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="rutinas" value="Rutinas" checked>
                    <label class="form-check-label" for="rutinas">Rutinas</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="asistencia" value="Asistencia" >
                    <label class="form-check-label" for="asistencia">Asistencia</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="mantenimiento" value="Mantenimiento" >
                    <label class="form-check-label" for="mantenimiento">Mantenimiento</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="correctivo" value="Correctivo" >
                    <label class="form-check-label" for="correctivo">Correctivo</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="s_evento" value="Salon_de_Eventos" >
                    <label class="form-check-label" for="s_evento">Salon de Eventos</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="marketing" value="Marketing" >
                    <label class="form-check-label" for="marketing">Marketing</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="b_center" value="Business_Center" >
                    <label class="form-check-label" for="b_center">Business Center</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="gym" value="Gimnasio" >
                    <label class="form-check-label" for="gym">Gimnasio</label>
                </div>

                <div class="form-check m-3">
                    <input type="radio" class="form-check-input" name="t_trabajo" id="tic" value="TIC" >
                    <label class="form-check-label" for="tic">TIC</label>
                </div>

            </div>

            <div class="col-lg-8 col-md-12">
                <div class="row">

                    <!-------------Estados-------------------------------------->
                    <div class="col-lg-6">
                        <h2 class="mt-2">Estado</h2>
                        <div class="row">
                            <div class="col-lg-12 p-3">
                                <div class="form-check">
                                    <input type="radio" name="estado" id="pendiente" value="pendiente" onclick="deshabilitar_t()" checked>
                                    <label class="form-check-label" for="pendiente">Pendiente</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 p-3">
                                    <div class="form-check">
                                        <input type="radio" name="estado" id="finalizado" onclick="habilitar_t()" value="finalizado">
                                        <label class="form-check-label" for="finalizado">Finalizado</label>
                                    </div>                                     
                            </div>
                        </div>

                        <h2>Turno</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="form-control" name="turno" >
                                        <option>Mañana</option>
                                        <option>Tarde</option>
                                        <option>Noche</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-----------------------Horarios---------------------------->
                    <div class="row">
                        <div class="col-lg-12 px-3">
                            <h2>Horas trabajadas</h2>
                            <div class="form-group">
                                <label for="h_inicial">Hora Inicial</label>
                                <input type="text" name="h_inicial" id="h_inicial" class=" w-50 ml-4 horas" >
                            </div>
                            <div class="form-group">
                                <label for="h_inicial">Hora Final</label>
                                <input type="text" name="h_final" id="h_final" class="ml-4 w-50 horas" >
                            </div>
                            <div class="form-group disabled">
                                <label for="h_hombre">Horas hombre</label>
                                <input type="text" name="h_hombre" class="hora w-50" id="h_hombre" disabled>
                                <input type="hidden" name="res_hh" id="res_hh">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>    


        <!---- Subir imagenes de antes y despues de los trabajos  -->
        <div class="row m-auto">
            <div class="col-lg-12">
                <div class="form-group">
                    <h4>Antes</h4>
                    <div class="col-sm-8">
                        <input type="file" class="form-control images" id="image" name="antes" multiple>
                    </div>
                    <!--button name="submit" class="btn btn-dark">Cargar Imagen</button-->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <h4>Despúes</h4>
                    <div class="col-sm-8">
                        <input type="file" class="form-control images" id="image" name="despues" multiple>
                    </div>
                    <!--button name="submit" class="btn btn-dark">Cargar Imagen</button-->
                </div>
            </div>
        </div>

            <!-------------Descripcion del trabajo-------------------------------------->
        <div class="row">
            <div class="col-lg-12 py-2 px-5">
                <div class="form-group">
                    <h3>Descripcion del trabajo</h3>
                    <textarea class="form-control" name="descripcion" id="txt_tarea" rows="5"></textarea>
                </div>
            </div>
        </div>    

            <!---  Botones de guardar y volver --->
            <div class='row'>
                <div class="col-lg-12 col-md-12">
                    <button type="submit" iid="enviar" class="btn btn-dark m-4 px-3">Guardar</button>
                    <a href="./principal.php" class="btn btn-dark float-right mt-4 mr-4">Volver..</a>
                </div>
            </div>
        </form>
    </div>
            

    <script src="../js/design.js"></script>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>