<?php
    require_once ("../validaciones/autorizacion.php");
    require_once ("../validaciones/conexionBD.php");
    require_once ("../validaciones/metodos_crud.php");

    $obj = new conectar();
    $con = $obj->conexion();
    

    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * from tareas";
    $sql_tec = "SELECT nombre from tecnicos";

    $muestra = new metodos();
    $ver = $muestra->mostrar($sql);

    $tecs = $muestra->mostrar($sql_tec);

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
</head>
<body class="bg-light">
    <div class="container">
        
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
<<<<<<< HEAD
			    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
=======
                <form method="post" id="formulario">
                    <div class="input-group">
                      <select name="" class="form-control" id="">
                        <?php 
                        foreach($tecs as $key){
                            echo "<option>". $key['nombre'] ."</option>";
                        }
                        ?>
                      </select>
                      <input type="button" value="Buscar" id="btn-buscar">
                    </div>
                </form>
>>>>>>> e32b784f2bd228129347d162c03fea868e975331
            </div>
        </div>
                        
        <!-- Lista de tareas de acuerdo al tecnico -->
        <?php
            $card = 1;
            foreach($ver as $key) {
        ?>
<<<<<<< HEAD
        
=======
>>>>>>> e32b784f2bd228129347d162c03fea868e975331
        <div class="row m-auto">
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
                                <img src="../tareas/<?php echo $var_session;?>/tarea_<?php echo $key['id_tarea']."/".$key['img_antes'] ;?>" class="d-block w-100 img-thumbnail" alt="Imagen antes">
                            </div>

                            <!-- Imagen del despues del trabajo -->
                            <div class="carousel-item">
                                <img src="../tareas/<?php echo $var_session;?>/tarea_<?php echo $key['id_tarea']."/".$key['img_despues'] ;?>" class="d-block w-100 img-thumbnail" alt="Imagen despues">
                            </div>
                        </div>

                        <!-- -->
                        <a class="carousel-control-prev" href="#tarea_<?php echo $card;?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <!-- -->
                        <a class="carousel-control-next" href="#tarea_<?php echo $card;?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tarea <?php echo $card;?></h5>
                        <p class="card-text">
                            <div>
                                <strong>Descripcion:</strong> <span><?php echo $key['des_tarea'];?></span>
                            </div> 
                            <div>
                                <strong>Fecha:</strong> <span><?php echo $key['fecha']; ?></span>
                            </div>
                            <div>
                                <strong>Inicio:</strong> <span><?php echo $key['hora_i']; ?></span>
                            </div>
                            <div>
                                <strong>Fin:</strong> <span><?php echo $key['hora_f']; ?></span>
                            </div>
                            <div>
                                <strong>Horas Hombre:</strong> <span><?php echo $key['horas_h']; ?></span>
                            </div>
                        </p>
                        <a href="index.php" class="btn btn-primary">Volver..</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $card = $card + 1;
            }        
        ?>
        <!-- Pie de agina de la aplicacion --->
       <div class="row footer">
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

    <script>
        $(function() {
            $("#btn-buscar").click(function() {
                $.ajax({
                    type: "POST",
                    url: "../procesos/tareas_tec.php",
                    data: $("#formulario").serialize(),
                    success : function(data) {
                        
                    }
                });
            });
        });
    </script>


</body>
</html>