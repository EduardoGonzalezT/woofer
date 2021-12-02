<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="not_completas_title">
        <h1>notificaciones</h1>
    </div>
    <?php if ($completo != NULL) { ?>
        <div class="not_completas_table rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del alumno</th>
                        <th>Matricula</th>
                        <th>Nombre del Curso</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php foreach ($completo as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombreAlumno; ?></td>
                        <td><?php echo $iterador->matriculaAlumno; ?></td>
                        <td><?php echo $iterador->nombreCurso; ?></td>
                        <td><?php echo $iterador->estatus; ?></td>
                        <td>
                            <a href="?controlador=notificacion&accion=borrarSolicitud&idP=<?php echo $iterador->idNotificacionProfesor; ?>" type="button" class="btn not_completas_button"> Eliminar </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Notificaciones</h1>
                <hr class="my-2">
                <div>
                    <img src="img\logos/vacio.png" width="400" alt="">
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include_once("includes/profesor/pie.php"); ?>