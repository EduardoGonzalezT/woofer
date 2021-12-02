<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="miscursos_alumno_title">
        <h1>Mis Cursos</h1>
    </div>
    <div class="miscursos_alumno_cont row">
        <?php foreach ($registro as $i) { ?>
            <?php foreach ($cursos as $iterador) { ?>
                <?php if ($iterador->idCurso == $i->idCurso) { ?>
                    <div class="col-md-3">
                        </br>
                        <div class="card rounded shadow">
                            <img class="card-img-top" src="img\curso/<?php echo $iterador->imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $iterador->nombre; ?></h5>
                                <h6 class="card-title">Duracion: <?php echo $iterador->duracion; ?></h6>
                                <textarea readonly class="textarea"><?php echo $iterador->descripcion; ?></textarea>
                                <a class="btn miscursos_alumno_btn" href="?controlador=misCursos&accion=mostrarContenido&idC=<?php echo $iterador->idCurso; ?>" role="button">Ver Mas</a>
                            </div>
                        </div>
                        </br>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>