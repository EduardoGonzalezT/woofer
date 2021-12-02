<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="subtema_title_profesor">
        <h1>administrador de subtemas</h1>
    </div>
    <div class="subtema_divisor_profesor">
        <a class="btn bg-primary" href="?controlador=tema&accion=mostrarTema&idU=<?php echo $idUnidad; ?>&idC=<?php echo $idCurso; ?>" role="button">
            <img src="img\logos/atras.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
        </a>
        <button type="button" class="btn subtema_btn_profesor" data-bs-toggle="modal" data-bs-target="#Modal1">Agregar Subtema</button>
    </div>
    <?php if ($subtema != NULL) { ?>
        <div class="subtema_table_profesor rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <?php foreach ($subtema as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombre; ?></td>
                        <td>
                            <a href="?controlador=subtema&accion=modificarSubtema&idT=<?php echo $iterador->idTema; ?>&idSub=<?php echo $iterador->idSubtema; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>" type="button" class="btn subtema_btn_profesor"> Modificar </a>
                            <a href="?controlador=subtema&accion=borrarSubtema&idT=<?php echo $iterador->idTema; ?>&idSub=<?php echo $iterador->idSubtema; ?>&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>" type="button" class="btn subtema_btn_profesor"> Borrar </a>
                            <a href="?controlador=material&accion=mostrarMaterial&idSub=<?php echo $iterador->idSubtema; ?>&idT=<?php echo $idTema ?>&idU=<?php echo $idUnidad; ?>&idC=<?php echo $idCurso; ?>" type="button" class="btn subtema_btn_profesor">Agregar Material</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Subtema</h1>
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
                <div class="modal-header modal_subtema_header_profesor">
                    <h2 class="modal-title modal_subtema_title_profesor" id="ModalLabel">Agregar Subtema</h2>
                </div>
                <form action="?controlador=subtema&accion=agregarSubtema&idC=<?php echo $idCurso; ?>&idU=<?php echo $idUnidad; ?>&idT=<?php echo $idTema; ?>" method="post" class="needs-validation" novalidate>
                    <div class="modal-body modal_subtema_body_profesor">
                        <div class="mb-3" hidden>
                            <input type="text" class="form-control" name="txtidTema" id="txtidTema" placeholder="" value="<?php echo $idTema; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Subtema:</label>
                            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese un Nombre del subtema">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_subtema_footer_profesor">
                        <button type="button" class="btn modal_subtema_btn_profesor" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" role="button" class="btn modal_subtema_btn_profesor" value="Guardar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>