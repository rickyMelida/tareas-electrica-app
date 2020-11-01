<?php
    require_once '../validaciones/conexionBD.php';
    require_once '../validaciones/metodos_crud.php';

    if(isset($_POST['id_tarea'])) {
        $datos = '';
        $obj = new metodos();
        $sql = "SELECT * from tareas where id_tarea = '".$_POST['id_tarea']."'";
        $ver = $obj->mostrar($sql);


        $datos .= '
            <div class="table-responsive">  
            <table class="table table-bordered">
        ';

        foreach($ver as $key) {
            $datos .= "
                <tr>
                    <td width='30%'><strong>Tarea #</strong></td>  
                    <td width='70%'>".$key['id_tarea']."</td>
                </tr>
                <tr>
                    <td width='30%'><strong>Tipo de Tarea</strong></td>  
                    <td width='70%'>".$key['t_tarea']."</td>
                </tr>

                <tr>
                    <td width='30%'><strong>Estado</strong></td>  
                    <td width='70%'>".$key['estado']."</td>
                </tr>

                <tr>
                    <td width='30%'><strong>Descripcion</strong></td>  
                    <td width='70%'>".$key['des_tarea']."</td>
                </tr>

                <tr>
                    <td width='30%'><strong>Fecha de generacion</strong></td>  
                    <td width='70%'>".$key['fecha_gen']."</td>
                </tr>

                <tr>
                    <td width='30%'><strong>Fecha Cierre</strong></td>  
                    <td width='70%'>".$key['fecha_cierre']."</td>
                </tr>
                
                <tr>
                    <td width='30%'><strong>Hora Inicio</strong></td>  
                    <td width='70%'>".$key['hora_i']."</td>
                </tr>
                
                <tr>
                    <td width='30%'><strong>Hora Finalizado</strong></td>  
                    <td width='70%'>".$key['hora_f']."</td>
                </tr>
                
                <tr>
                    <td width='30%'><strong>Horas Hombre</strong></td>  
                    <td width='70%'>".$key['horas_h']."</td>
                </tr>
                
                <tr>
                    <td width='30%'><strong>Tecnico</strong></td>  
                    <td width='70%'>".$key['tecnicos']."</td>
                </tr>
                
                <tr>
                    <td width='30%'><strong>Cargo</strong></td>  
                    <td width='70%'>".$key['cargo']."</td>
                </tr>

                <tr>
                    <td width='30%'><strong>Turno</strong></td>  
                    <td width='70%'>".$key['turno']."</td>
                </tr>
                
            
            ";
        }

        $datos .= '
            </table></div>
        ';

        echo $datos;

    }



?>