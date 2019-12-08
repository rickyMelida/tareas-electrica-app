<?php
    require_once ("../validaciones/autorizacion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Rutinas electricas</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
</head>
<body>
    <div class="container border border-primary">
        <header class="text-center bg-primary p-4">
            <a href="#" data-toggle="modal" data-target="#acceso"><img src="../iconos/config.png" class="float-left m-3" title="Reporte de horarios" ></a>                    
            <h1 class=" d-inline">Menu Principal</h1>
            <a href="../validaciones/cerrar_sesion.php"><img src="../iconos/perfil.png" class="float-right m-3" title="<?php echo $var_session;?>"></a>
        </header>
        <div class="row menu">
            <div class="col-lg-6 col-md-6">
                <img src="../iconos/anotar.png" onclick="agregar()" width="200" height="200"><br>
                <span>Agregar Tareas</span>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="../iconos/tareas.png" onclick="pendientes()" alt="" width="200" height="200"><br>
                <span>Ver Pendientes</span>
            </div>
        </div>
    </div>


    <!--Modal para ingresar como administrador-->
    <div class="modal fade " id="acceso">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Iniciar sesion de administrador</h5>
                </div>
                <div class="modal-body">
                    <form action="./reportes.php" method="post">
                        <div class="form-group">
                            <label for="usuario">usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" value="Acceder">
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <!------------------------->


    <script src="../js/design.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

