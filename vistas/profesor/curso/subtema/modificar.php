<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="subtema_title_modificar_profesor">
        <h1>Modificar Subtema</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="subtema_modificar_profesor_form">
            <div class="mb-3">
                <label for="" class="form-label">Nombre del subtema:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $subtema->nombre; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
        </div>
        <div class="subtema_modificar_profesor_footer">
            <button type="submit" class="btn subtema_modificar_profesor_btn">Modificar</button>
            <a class="btn subtema_modificar_profesor_btn" href="?controlador=subtema&accion=mostrarSubtema&idT=<?php echo $idTema; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>