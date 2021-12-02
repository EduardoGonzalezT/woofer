<?php include_once("includes/alumno/cabecera.php"); ?>
<a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId"> Agregar Comentario </a>

<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comentarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?controlador=comentario&accion=registrarComentario&idC=<?php echo $idCurso; ?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Comentario</label>
                        <textarea type="text" class="form-control" name="txtComentario" id="txtComentario" placeholder=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"></label>
                        <select class="form-select" name="txtValoracion" id="txtValoracion">
                            <option value="Muy Malo">Muy Malo</option> 
                            <option value="Malo">Malo</option>
                            <option value="Regular">Regular</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Excelente">Excelete</option>
                        </select>
                    </div>
                    <button id="" type="submit" class="btn btn-dark">Enviar Comentario</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<?php foreach($consultaComentario as $iterador){ ?>
    <div class="col-md-3">
    <br/>    
        <div class="card text-dark  bg-warning " style="max-width: 18rem;">
            <div class="card-header"><?php echo $iterador->nombreAlumno; ?> - <?php echo $iterador->fechaHora; ?></div>
                <div class="card-body">
                    <p class="card-text"><?php echo $iterador->comentario; ?></p>
            </div>
            <div class="card-footer">
                <h6>Calificacion dada al Curso:</h6>
                <?php switch($iterador->valoracion){ 
                    case 'Muy Malo': ?>
                        <i class="fas fa-star"></i>
                <?php        
                    break;

                    case 'Malo': ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <?php
                    break;

                    case 'Regular': ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <?php
                    break;

                    case 'Bueno': ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <?php
                    break;

                    case 'Excelente': ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <?php
                    break;
                }?>
            </div>
        </div>
    </div>
<?php } ?>
<?php include_once("includes/profesor/pie.php"); ?>