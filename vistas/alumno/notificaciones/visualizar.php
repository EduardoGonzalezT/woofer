<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="not_alumno_title">
        <h1>notificaciones</h1>
    </div>
    <?php if ($notificacion != NULL) { ?>
        <div class="not_divisor_alumno">
            <a href="?controlador=misCursos&accion=mostrarMisCursos&idA=<?php echo $alumno->idAlumno; ?>" type="button" class="btn not_alumno_button"> Ir a Mis Cursos </a>
        </div>
        <div class="not_alumno_table rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del alumno</th>
                        <th>Matricula</th>
                        <th>Nombre el Curso</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php foreach ($notificacion as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombreAlumno; ?></td>
                        <td><?php echo $iterador->matriculaAlumno; ?></td>
                        <td><?php echo $iterador->nombreCurso; ?></td>
                        <td><?php echo $iterador->estatus; ?></td>
                        <td>
                            <a href="?controlador=notificacion&accion=eliminarNotificacion&idP=<?php echo $iterador->idnotificacionAlumno; ?>" type="button" class="btn not_alumno_button"> Eliminar </a>
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
</div>
<?php include_once("includes/profesor/pie.php"); ?>