<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="curso_title_profesor">
        <h1>administrador de cursos</h1>
    </div>
    <div class="curso_divisor_profesor">
        <button type="button" class="btn curso_btn_profesor" data-bs-toggle="modal" data-bs-target="#Modal1">Agregar Curso</button>
    </div>
    <?php if ($cursos != NULL) { ?>
        <div class="curso_table_profesor rounded shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th> Imagen </th>
                        <th> Nombre </th>
                        <th> Descripción </th>
                        <th> Duración </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <?php foreach ($cursos as $iterador) { ?>
                    <tr>
                        <td><img src="img\curso/<?php echo $iterador->imagen; ?>" width="200px" height="200px" alt=""></td>
                        <td><?php echo $iterador->nombre; ?></td>
                        <td><?php echo $iterador->descripcion; ?></td>
                        <td><?php echo $iterador->duracion; ?></td>
                        <td>
                            <a href="?controlador=cursoProfesor&accion=modificarCurso&idP=<?php echo $iterador->idProfesor; ?>&idC=<?php echo $iterador->idCurso; ?>" type="button" class="btn curso_btn_profesor"> Modificar </a>
                            <a href="?controlador=cursoProfesor&accion=borrarCurso&idP=<?php echo $iterador->idProfesor; ?>&idC=<?php echo $iterador->idCurso; ?>" type="button" class="btn curso_btn_profesor"> Borrar </a>
                            <a href="?controlador=unidad&accion=mostrarUnidad&idC=<?php echo $iterador->idCurso; ?>" type="button" class="btn curso_btn_profesor"> Agregar Unidad </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Cursos</h1>
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
                <div class="modal-header modal_curso_header_profesor">
                    <h2 class="modal_curso_title_profesor">Agregar Curso</h2>
                </div>
                <form action="?controlador=cursoProfesor&accion=agregarCurso" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="modal-body modal_curso_body_profesor">
                        <div class="mb-3" hidden>
                            <input type="text" class="form-control" name="txtidProfesor" id="txtidProfesor" placeholder="" value="<?php echo $idProfesor->idProfesor; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del Curso:</label>
                            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese un Nombre del Curso">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion del Curso:</label>
                            <textarea type="text" required class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese una Descripcion"></textarea>
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Duración:</label>
                            <input type="number" required class="form-control" name="txtDuracion" id="txtDuracion" placeholder="Ingrese el numero de dias">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen Curso:</label>
                            <input type="file" required class="form-control" name="fotoCurso" id="fotoCurso" placeholder="">
                            <p class="valid-feedback">Imagen Seleccionada!</p>
                            <p class="invalid-feedback">Imagen No Seleccionada!</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_curso_footer_profesor">
                        <button type="button" class="btn modal_curso_btn_profesor" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" role="button" class="btn modal_curso_btn_profesor" value="Guardar Cambios">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>