<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="ofertado_alumno_title">
        <h1>Catálogo de Cursos</h1>
    </div>
    <?php if ($cursos != NULL) { ?>
        <div class="ofertado_alumno_cont row">
            <?php foreach ($cursos as $iterador) { ?>
                <div class="col-md-3">
                    <div class="card rounded shadow">
                        <img class="card-img-top" src="img\curso/<?php echo $iterador->imagen; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $iterador->nombre; ?></h5>
                            <h6 class="card-title">Duracion: <?php echo $iterador->duracion; ?></h6>
                            <textarea readonly class="textarea"><?php echo $iterador->descripcion; ?></textarea>
                            <a class="btn ofertados_alumno_btn" href="?controlador=cursoAlumno&accion=detallesCurso&idC=<?php echo $iterador->idCurso; ?>" role="button">Ver Más</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Cursos Ofertados</h1>
                <hr class="my-2">
                <div>
                    <img src="img\logos/ofertado.png" width="400" alt="">
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include_once("includes/profesor/pie.php"); ?>