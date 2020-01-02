<?php
    require_once "../validaciones/autorizacion.php";
    require_once "../validaciones/conexionBD.php";


    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];


    if(isset($_COOKIE['admin']) && isset($_COOKIE['admin_pass'])) {
        $usuario = $_COOKIE['admin'];
        $pass = $_COOKIE['admin_pass'];
    }

    $obj = new conectar();
    $con = $obj->conexion();

    mysqli_set_charset($con,'utf8');
    $sql = "SELECT * from usuarios where usuario= 'Admin' and pass='$pass'";

    $resultado = mysqli_query($con, $sql);

    $filas = mysqli_num_rows($resultado);

    
    //Validamos si el usuario es el administrador
    if($filas > 0 || $_SESSION['usuario'] == "admin") {
        $_SESSION['usuario'] = $usuario;
        //echo "<script>alert('Bienvenido Admin!!')</script>";
        setcookie('admin', $usuario, time() + 900);
        setcookie('admin_pass', $pass, time() + 900);

    }else {
        echo "<script> alert('Contraseña o usuario de administrador incorrecto');
            window.location='./principal.php';
        </script>";
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Reportes</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 bg-dark">
               <a href="principal.php" class="float-left m-2 btn btn-outline-light text-light">Salir</a>
              <h1 class=" d-inline text-light m-5">Reportes</h1>
            </div>
        </div>
    <div class="row mt-5 menu">
        <div class="col-lg-6 col-md-12">
            <h1>Reporte Horarios</h1>
            <a href="reportes_horarios.php"> <img src="../iconos/reporte.png" width="200" height="200"> </a>
        </div>
        <div class="col-lg-6 col-md-12">
            <h1>Horario tecnicos</h1>
            <a href="horario_tecnicos.php"> <img src="../iconos/electricista.png" width="200" height="200"> </a>

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
    </div>
    <script src="../js/design.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>