<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="unidad_title_profesor">
        <h1>administrador de unidades</h1>
    </div>
    <div class="unidad_divisor_profesor">
        <a class="btn bg-primary" href="?controlador=cursoProfesor&accion=mostrarCurso" role="button">
            <img src="img\logos/atras.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
        </a>
        <button type="button" class="btn unidad_btn_profesor" data-bs-toggle="modal" data-bs-target="#Modal1">Agregar Unidad</button>
        <a class="btn unidad_btn_profesor" href="?controlador=unidad&accion=desbloquearUnidades&idC=<?php echo $idCurso; ?>" role="button">Desbloquear Unidades</a>
    </div>
    <?php if ($unidades != NULL) { ?>
        <div class="unidad_table_profesor rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Descripción </th>
                        <th> Fecha Creación </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <?php foreach ($unidades as $iterador) { ?>
                    <tr>
                        <td><?php echo $iterador->nombre; ?></td>
                        <td><?php echo $iterador->descripcion; ?></td>
                        <td><?php echo $iterador->fecha; ?></td>
                        <td>
                            <a href="?controlador=unidad&accion=modificarUnidad&idC=<?php echo $iterador->idCurso; ?>&idU=<?php echo $iterador->idUnidad; ?>" type="button" class="btn unidad_btn_profesor"> Modificar </a>
                            <a href="?controlador=unidad&accion=borrarUnidad&idC=<?php echo $iterador->idCurso; ?>&idU=<?php echo $iterador->idUnidad; ?>" type="button" class="btn unidad_btn_profesor"> Borrar </a>
                            <a href="?controlador=tema&accion=mostrarTema&idU=<?php echo $iterador->idUnidad; ?>&idC=<?php echo $idCurso; ?> " type="button" class="btn unidad_btn_profesor">Agregar Tema</a>
                            <?php foreach ($verificacionExamen as $ban) { ?>
                                <?php if ($ban->nombreUnidad == $iterador->nombre) { ?>
                                    <a href="?controlador=ExamenProfesor&accion=mostrarExamen&idU=<?php echo $iterador->idUnidad; ?>" type="button" class="btn unidad_btn_profesor">Agregar Examen</a>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Unidades</h1>
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
                <div class="modal-header modal_unidad_header_profesor">
                    <h2 class="modal-title modal_unidad_title_profesor" id="ModalLabel">Agregar Unidad</h2>
                </div>
                <form action="?controlador=unidad&accion=agregarUnidad" method="post" class="needs-validation" novalidate>
                    <div class="modal-body modal_unidad_body_profesor">
                        <div class="mb-3" hidden>
                            <input type="text" class="form-control" name="txtidCurso" id="txtidCurso" placeholder="" value="<?php echo $idCurso; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre de Unidad:</label>
                            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese un Nombre de Unidad">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion de Unidad:</label>
                            <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese una Descripcion"></textarea>
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha de Creación:</label>
                            <input type="date" required class="form-control" name="txtFecha" id="txtFecha" placeholder="Ingrese una Fecha">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_unidad_footer_profesor">
                        <button type="button" class="btn modal_unidad_btn_profesor" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" role="button" class="btn modal_unidad_btn_profesor" value="Guardar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>