<?php
    require_once "../validaciones/autorizacion.php";
    require_once "../validaciones/conexionBD.php";
    require_once "../validaciones/metodos_crud.php";

    $id = $_GET['id'];
    $obj  = new metodos();

    $nombre = "SELECT nombre from tecnicos where id_tecnico = $id";
    $cargo = "SELECT cargo_t from tecnicos where id_tecnico = $id";
    $turno = "SELECT turno from tecnicos where id_tecnico = $id";


    $nombre_res = $obj->mostrar($nombre);
    $cargo_res = $obj->mostrar($cargo);
    $turno_res = $obj->mostrar($turno);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Actualizar Tecnico</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
</head>
<body>
    <div class="container border border-primary">
        <header class="text-center bg-primary p-4">   
            <a href="horario_tecnicos.php" class="float-left m-3 btn btn-outline-dark">Volver</a>
            <h1 class=" d-inline">Actualizar</h1>
        </header>
        <div class="row">
            <form action="../procesos/actualizar.php" method="post" class="col-md-8 m-auto p-3">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="nombre">Nombre</label>
                    <input type='text' class='form-control' id='nombre' name="nombre" value = "<?php foreach($nombre_res as $key){ echo $key['nombre']; }?>" >
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select name="cargo" id="cargo" class="form-control">
                        <option value= "<?php foreach($cargo_res as $key){ if ($key['cargo_t'] == 'Junior'){ echo 'Junior';}else{echo 'Senior';} }?>" > <?php foreach($cargo_res as $key){ if ($key['cargo_t'] == "Junior"){ echo "Junior";}else{echo "Senior";} }?> </option>
                        <option value= "<?php foreach($cargo_res as $key){ if ($key['cargo_t'] == 'Junior'){ echo 'Senior';}else{echo 'Junior';} }?>" ><?php foreach($cargo_res as $key){ if ($key['cargo_t'] == "Junior"){ echo "Senior";}else{echo "Junior";} }?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="turno">Turno</label>
                    <select name="turno" id="turno" class="form-control">
                        <option value= "<?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Mañana';}else if($key['turno'] == 'Tarde'){echo 'Tarde';}else { echo "Noche";} }?>" > <?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Mañana';}else if($key['turno'] == 'Tarde'){echo 'Tarde';}else { echo "Noche";} }?> </option>
                        <option value="<?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Tarde';}else if($key['turno'] == 'Tarde'){echo 'Noche';}else { echo "Mañana";} }?>"> <?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Tarde';}else if($key['turno'] == 'Tarde'){echo 'Noche';}else { echo "Mañana";} }?> </option>
                        <option value="<?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Noche';}else if($key['turno'] == 'Tarde'){echo 'Mañana';}else { echo "Tarde";} }?>"> <?php foreach($turno_res as $key){ if ($key['turno'] == 'Manhana'){ echo 'Noche';}else if($key['turno'] == 'Tarde'){echo 'Mañana';}else { echo "Tarde";} }?> </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

    <script src="../js/design.js"></script>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>