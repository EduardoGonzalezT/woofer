<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="material_title_profesor">
        <h1>administrador de Materiales</h1>
    </div>
    <div class="material_divisor_profesor">
        <a class="btn bg-primary" href="?controlador=subtema&accion=mostrarSubtema&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" role="button">
            <img src="img\logos/atras.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
        </a>
        <button type="button" class="btn material_btn_profesor" data-bs-toggle="modal" data-bs-target="#Modal1">Agregar Material</button>
    </div>
    <?php if ($material != NULL) { ?>
        <div class="material_table_profesor rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Descripcion </th>
                        <th> Archivo </th>
                        <th> Tipo </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <?php foreach ($material as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombre; ?></td>
                        <td><?php echo $iterador->descripcion; ?></td>
                        <td><?php echo $iterador->archivo; ?></td>
                        <td><?php echo $iterador->extension; ?></td>
                        <td>
                            <a href="?controlador=material&accion=modificarMaterial&idSub=<?php echo $iterador->idSubtema; ?>&idM=<?php echo $iterador->idMaterial; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" type="button" class="btn material_btn_profesor"> Modificar </a>
                            <a href="?controlador=material&accion=borrarMaterial&idSub=<?php echo $iterador->idSubtema; ?>&idM=<?php echo $iterador->idMaterial; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" type="button" class="btn material_btn_profesor"> Borrar </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Material</h1>
                <hr class="my-2">
                <div>
                    <img src="img\logos/cursos.png" width="400" alt="">
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="modal fade" id="Modal1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal_material_header_profesor">
                    <h2 class="modal-title modal_material_header_profesor" id="ModalLabel">Agregar Material</h2>
                </div>
                <form action="?controlador=material&accion=agregarMaterial&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="modal-body modal_material_body_profesor">
                        <div class="mb-3" hidden>
                            <input type="text" class="form-control" name="txtidSubtema" id="txtidSubtema" placeholder="" value="<?php echo $idSubtema; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Material:</label>
                            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese un Nombre del Subtema">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion del Material:</label>
                            <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese una Descripción"></textarea>
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tipo de Material:</label>
                            <select class="form-select" required name="txtExtension" id="txtExtension">
                                <option selected disabled value="">Seleccionar</option>
                                <option class="option_color">MP4</option>
                                <option class="option_color">PDF</option>
                                <option class="option_color">PPTX</option>
                            </select>
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Material</label>
                            <input type="file" required class="form-control" name="Material" id="Material" placeholder="">
                            <p class="valid-feedback">Material Seleccionado!</p>
                            <p class="invalid-feedback">Material No Seleccionado!</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_material_footer_profesor">
                        <button type="button" class="btn modal_material_btn_profesor" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" role="button" class="btn modal_material_btn_profesor" value="Guardar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>