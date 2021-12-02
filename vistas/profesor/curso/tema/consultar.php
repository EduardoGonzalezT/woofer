<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="tema_title_profesor">
        <h1>administrador de temas</h1>
    </div>
    <div class="tema_divisor_profesor">
        <a class="btn bg-primary" href="?controlador=unidad&accion=mostrarUnidad&idC=<?php echo $idCurso; ?>" role="button">
            <img src="img\logos/atras.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
        </a>
        <button type="button" class="btn tema_btn_profesor" data-bs-toggle="modal" data-bs-target="#Modal1">Agregar Tema</button>
    </div>
    <?php if ($tema != NULL) { ?>
        <div class="tema_table_profesor rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Descripción </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <?php foreach ($tema as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombre; ?></td>
                        <td><?php echo $iterador->descripcion; ?></td>
                        <td>
                            <a href="?controlador=tema&accion=modificarTema&idU=<?php echo $iterador->idUnidad; ?>&idT=<?php echo $iterador->idTema; ?>&idC=<?php echo $idCurso; ?>" type="button" class="btn tema_btn_profesor"> Modificar </a>
                            <a href="?controlador=tema&accion=borrarTema&idU=<?php echo $iterador->idUnidad; ?>&idT=<?php echo $iterador->idTema; ?>&idC=<?php echo $idCurso; ?>" type="button" class="btn tema_btn_profesor"> Borrar </a>
                            <a href="?controlador=subtema&accion=mostrarSubtema&idT=<?php echo $iterador->idTema;  ?>&idU=<?php echo $idUnidad; ?>&idC=<?php echo $idCurso; ?>" type="button" class="btn tema_btn_profesor">Agregar Subtema</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Tema</h1>
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
                <div class="modal-header modal_tema_header_profesor">
                    <h2 class="modal-title modal_tema_title_profesor" id="ModalLabel">Agregar Tema</h2>
                </div>
                <form action="?controlador=tema&accion=agregarTema&idC=<?php echo $idCurso; ?>" method="post" class="needs-validation" novalidate>
                    <div class="modal-body modal_tema_body_profesor">
                        <div class="mb-3" hidden>
                            <input type="text" class="form-control" name="txtidUnidad" id="txtidUnidad" placeholder="" value="<?php echo $idUnidad; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Tema:</label>
                            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese un Nombre del Tema">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion de Tema:</label>
                            <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese una Descripción"></textarea>
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_tema_footer_profesor">
                        <button type="button" class="btn modal_tema_btn_profesor" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" role="button" class="btn modal_tema_btn_profesor" value="Guardar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>