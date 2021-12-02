<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="curso_title_modificar_profesor">
        <h1>Modificar Curso</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="curso_modificar_profesor_form">
            <div class="mb-3">
                <label for="" class="form-label">Nombre del Curso:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $curso->nombre; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion del Curso:</label>
                <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="" value="<?php echo $curso->descripcion; ?>"><?php echo $curso->descripcion; ?></textarea>
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Duracion del Curso:</label>
                <input type="number" required class="form-control" name="txtDuracion" id="txtDuracion" placeholder="" value="<?php echo $curso->duracion; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen del Curso</label>
                <input type="file" id="fotoC" class="form-control" name="fotoC" placeholder="Ingresa tu Foto">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
                <img src="img\curso/<?php echo $curso->imagen; ?>" width="200px" height="200px">
            </div>
        </div>
        <div class="curso_modificar_profesor_footer">
            <button type="submit" class="btn curso_modificar_profesor_btn">Modificar</button>
            <a class="btn curso_modificar_profesor_btn" href="?controlador=cursoProfesor&accion=mostrarCurso" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>