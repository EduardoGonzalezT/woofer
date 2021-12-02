<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="not_pendientes_title">
        <h1>notificaciones Pendientes</h1>
    </div>
    <?php if ($notificacionProfesor != NULL) { ?>
        <div class="not_pendientes_table rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del alumno</th>
                        <th>Matricula</th>
                        <th>Nombre el Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php foreach ($notificacionProfesor as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombreAlumno; ?></td>
                        <td><?php echo $iterador->matriculaAlumno; ?></td>
                        <td><?php echo $iterador->nombreCurso; ?></td>
                        <td>
                            <a href="?controlador=notificacion&accion=accionSolicitud&valor=Aceptado&idP=<?php echo $iterador->idNotificacionProfesor; ?>&nAlumno=<?php echo $iterador->nombreAlumno; ?>&mAlumno=<?php echo $iterador->matriculaAlumno; ?>&nCurso=<?php echo $iterador->nombreCurso; ?>" type="button" class="btn not_pendientes_button"> Aceptar </a>
                            <a href="?controlador=notificacion&accion=accionSolicitud&valor=Rechazado&idP=<?php echo $iterador->idNotificacionProfesor; ?>&nAlumno=<?php echo $iterador->nombreAlumno; ?>&mAlumno=<?php echo $iterador->matriculaAlumno; ?>&nCurso=<?php echo $iterador->nombreCurso; ?>" type="button" class="btn not_pendientes_button"> Rechazar </a>
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