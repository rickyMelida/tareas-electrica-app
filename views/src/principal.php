<?php
    require_once ("../../models/auth/auth.php");
    setcookie('usuario', $var_session, time() + 900);
    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Rutinas electricas</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Menu Principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="#"><?php echo $_SESSION['usuario']?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#acceso" href="#">Horario Tecnico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#acceso" href="#">Reportes Horario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../models/auth/cerrar_sesion.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://rickymelida.github.io/" target="_blank" title="Desarrollador">Acerca De</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-2">
                <figure class="figure" id="add">
                    <img src="../iconos/anotar.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-primary">Agregar Tareas/Pendientes</figcaption>
                </figure>
            </div>
            <div class="col-md-3 offset-md-2" id="view">
                <figure class="figure">
                    <img src="../iconos/tareas.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption text-primary">Ver Tareas/Pendientes</figcaption>
                </figure>
            </div>
        </div>
    </div>


    <!--Modal para ingresar como administrador-->
    <div class="modal fade" id="acceso">
        <div class="modal-dialog bg-dark">
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

    <script src="../js/main.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>

