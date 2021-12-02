<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="unidad_title_modificar_profesor">
        <h1>Modificar Unidad</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="unidad_modificar_profesor_form">
            <div class="mb-3">
                <label for="" class="form-label">Nombre de la Unidad:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $unidad->nombre; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion de la Unidad:</label>
                <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="" value="<?php echo $unidad->descripcion; ?>"><?php echo $unidad->descripcion; ?></textarea>
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha:</label>
                <input type="date" required class="form-control" name="txtFecha" id="txtFecha" placeholder="" value="<?php echo $unidad->fecha; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
        </div>
        <div class="curso_modificar_profesor_footer">
            <button type="submit" class="btn unidad_modificar_profesor_btn">Modificar</button>
            <a class="btn unidad_modificar_profesor_btn" href="?controlador=unidad&accion=mostrarUnidad&idC=<?php echo $unidad->idCurso; ?>" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>