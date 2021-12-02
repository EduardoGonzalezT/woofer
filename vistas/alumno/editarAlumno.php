<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="edit_alumno_title">
        <h1>Editar Información</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit_alumno_form">
            <div class="row edit_alumno_divisor">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del Usuario:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $alumno->nombreAlumno . " " . $alumno->apellidoPaterno . " " . $alumno->apellidoMaterno; ?>" name="txtNombre" id="txtNombre">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha de Nacimiento:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $alumno->fechaNacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo Electronico:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $alumno->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Matricula:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $alumno->matricula; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" disabled value="<?php echo $alumno->usuario; ?>" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña:</label>
                        <input type="text" class="form-control" name="txtContraseña" id="txtContraseña" value="<?php echo $alumno->contraseña; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Pregunta:</label>
                        <select class="form-select" required name="txtPregunta" id="txtPregunta">
                            <option selected><?php echo $alumno->pregunta; ?></option>
                            <option>¿Cúal es tu comida favorita?</option>
                            <option>¿Cúal es tu fruta favorita?</option>
                            <option>¿Cúal es el nombre de tu mascota?</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Respuesta:</label>
                        <input type="text" class="form-control" name="txtRespuesta" id="txtRespuesta" value="<?php echo $alumno->respuesta; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Imagen:</label>
                        <img src="img\alumno/<?php echo $alumno->imagen; ?>" width="200px" height="200px">
                        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="edit_alumno_footer">
            <button type="submit" class="btn edit_alumno_btn">Guardar Cambios</button>
            <a name="" id="" class="btn edit_alumno_btn" href="?controlador=principal&accion=iniciarSesionAlumno" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>