<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/custom.min.css">
    <link rel="shortcut icon" href="iconos/electrico.ico" type="image/x-icon">
    <title>Login</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row">
        <header class="col-lg-12 col-md-12 col-sm-8 fixed-top mt-5">
            <h3 class="text-center font-weight-normal">Tareas Eléctrica</h3>
        </header>
        </div>
        <div class="row border border-dark mx-3 h-100">
            <div class="col-lg-12 col-md-12 col-sm-8 cont py-5">
                    <form method="post" action="./validaciones/validar_usuario.php">
                        <div class="form-group">
                            <label><b>Usuario</b></label>
                            <input type="text" class="form-control w-50" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" class="form-control w-50" name="pass" placeholder="Password">
                        </div>
                            <button type="submit" class="btn btn-outline-info"><b>Ingresar</b></button>
                    </form>
                
            </div>
        </div>
    </div>
    
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/custom.js"></script>
  
</body>
</html>