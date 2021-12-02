<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="edit_profesor_title">
        <h1>Editar información</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit_profesor_form">
            <div class="row edit_profesor_divisor">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $profesor->nombreProfesor . " " . $profesor->apellidoPaterno . " " . $profesor->apellidoMaterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha de Nacimiento:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $profesor->fechaNacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo: </label>
                        <input type="text" disabled class="form-control" value="<?php echo $profesor->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cedula: </label>
                        <input type="text" class="form-control" disabled value="<?php echo $profesor->cedula; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Usuario:</label>
                        <input type="text" disabled class="form-control" value="<?php echo $profesor->usuario; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña: </label>
                        <input type="text" class="form-control" name="txtContraseña" id="txtContraseña" value="<?php echo $profesor->contraseña; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Pregunta:</label>
                        <select class="form-select" required name="txtPregunta" id="txtPregunta">
                            <option selected><?php echo $profesor->pregunta; ?></option>
                            <option class="option_color">¿Cúal es tu comida favorita?</option>
                            <option class="option_color">¿Cúal es tu fruta favorita?</option>
                            <option class="option_color">¿Cúal es el nombre de tu mascota?</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Respuesta:</label>
                        <input type="text" class="form-control" name="txtRespuesta" id="txtRespuesta" value="<?php echo $profesor->respuesta; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Imagen:</label>
                        <img src="img\profesor/<?php echo $profesor->imagen; ?>" width="200px" height="200px">
                        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="edit_profesor_footer">
            <button type="submit" class="btn edit_profesor_btn">Guarda Cambios</button>
            <a class="btn edit_profesor_btn" href="?controlador=principal&accion=iniciarSesionProfesor" role="button">Cancelar</a>
        </div>
    </form>
    <div class="backup">
        <div class="edit_profesor_title">
            <h1>Respaldo de la base de datos</h1>
        </div>
        <div class="edit_profesor_footer">
            <a name="" id="" class="btn edit_profesor_btn" href="?controlador=copiaSeguridad&accion=hacerCopiaSeguridad" role="button">Guardar BD</a>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>