<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="material_title_modificar_profesor">
        <h1>Modificar Material</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="material_modificar_profesor_form">
            <div class="mb-3">
                <label for="" class="form-label">Nombre del Material:</label>
                <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $material->nombre; ?>">
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion del Material:</label>
                <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="" value="<?php echo $material->descripcion; ?>"><?php echo $material->descripcion; ?></textarea>
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tipo de Material:</label>
                <select class="form-select" required name="txtExtension" id="txtExtension">
                    <option selected disabled value=""><?php echo $material->extension; ?></option>
                    <option>MP4</option>
                    <option>PDF</option>
                    <option>PPTX</option>
                </select>
                <p class="valid-feedback">Campo Completo!</p>
                <p class="invalid-feedback">Campo Vacio!</p>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Material:</label>
                <label for="" class="form-label"><?php echo $material->archivo; ?></label>
                <input type="file" class="form-control" name="Material" id="Material" placeholder="">
            </div>
        </div>
        <div class="material_modificar_profesor_footer">
            <button type="submit" class="btn material_modificar_profesor_btn">Modificar</button>
            <a class="btn material_modificar_profesor_btn" href="?controlador=material&accion=mostrarMaterial&idSub=<?php echo $idSubtema; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" role="button">Cancelar</a>
        </div>
    </form>
</div>
<?php include_once("includes/profesor/pie.php"); ?>