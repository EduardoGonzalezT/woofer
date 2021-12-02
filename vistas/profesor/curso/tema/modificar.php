<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="tema_title_modificar_profesor">
        <h1>Modificar Tema</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="tema_modificar_profesor_form">
            <div class="mb-3">
                <label for="" class="form-label">Nombre del Tema:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $tema->nombre; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion del Tema:</label>
                <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="" value="<?php echo $tema->descripcion; ?>"><?php echo $tema->descripcion; ?></textarea>
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
        </div>
        <div class="tema_modificar_profesor_footer">
            <button type="submit" class="btn tema_modificar_profesor_btn">Modificar</button>
            <a class="btn tema_modificar_profesor_btn" href="?controlador=tema&accion=mostrarTema&idU=<?php echo $tema->idUnidad; ?>&idC=<?php echo $idCurso; ?>" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>