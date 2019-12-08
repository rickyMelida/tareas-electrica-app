<?php
    require_once "../validaciones/autorizacion_admin.php";
    require_once "../validaciones/conexionBD.php";
    require_once ("../validaciones/metodos_crud.php");


    $obj = new conectar();
    $con = $obj->conexion();

    mysqli_set_charset($con, 'utf8');
    $sql = "SELECT * FROM tecnicos";

    $muestra = new metodos();
    $ver = $muestra->mostrar($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Horarios</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container border border-primary">
        <header class="text-center bg-primary p-4">   
            <a href="reportes.php" class="float-left m-3 btn btn-outline-dark">Volver</a>
            <h1 class=" d-inline">Tecnicos</h1>
        </header>
        <div class="row">
            <div class="col-md-8 m-auto p-3">
                <table class="table table-bordered table-primary text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Actualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($ver as $key) {
                        ?>        
                                <tr>
                                    <td scope='row'><?php echo $key['id_tecnico'];?></td>
                                    <td><?php echo $key['nombre']; ?></td>
                                    <td><?php echo $key['cargo_t']; ?></td>
                                    <td><?php echo $key['turno']; ?></td>         
                                    <td><a href="actualizar_tecnico.php?id=<?php echo $key['id_tecnico']?>">Editar</a></td>  
                                    <td><a href="../procesos/eliminar.php?id=<?php echo $key['id_tecnico']?>">Eliminar</a></td>
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/design.js"></script>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>