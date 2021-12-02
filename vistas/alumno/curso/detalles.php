<?php include_once("includes/alumno/cabecera.php"); ?>

<div class="mar_root_max">
    <div class="ofertado_detalles_alumno_title">
        <h1 class="display"><?php echo $curso->nombre; ?></h1>
    </div>
    <a class="btn inscripcion_btn" href="?controlador=cursoAlumno&accion=solicitudIngresarCurso&nC=<?php echo $curso->nombre; ?>&idP=<?php echo $curso->idProfesor; ?>" role="button">Solictar Inscripción</a>
    
    <?php foreach ($unidades as $unidad) { ?>
        <div class="accordion">
            </br>
            <div class="accordition_unidades" id="unidades">
                <h2 class="accordion-header" id="headingOne">
                    <h3 align="center"> <?php echo $unidad->nombre; ?> </h3>
                    </br>
                    <h4 align="center"> Que Veremos: </h4>
                    <h6 align="center"> <?php echo $unidad->descripcion; ?> </h6>
                    </br>
                    <button id="accorditionstyle" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5>Temario de la Unidad</h5>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body_temas" id="temas">
                        <?php foreach ($temas as $tema) { ?>
                            <?php if ($tema->idUnidad == $unidad->idUnidad) { ?>
                            </br>
                                <h4 align="center" > Tema: <?php echo $tema->nombre; ?> </h4>
                                <h6 align="center"> <?php echo $tema->descripcion; ?>  </h6>
                            </br>
                                <div class="accordion-body_subtemas" id="subtemas">
                                    <?php foreach ($subtemas as $subtema) { ?>
                                        <?php if ($subtema->idTema == $tema->idTema) { ?>
                                            <h5 align="center" > Subtemas: </h5>
                                            <h6 align="center" > * <?php echo $subtema->nombre; ?> </h6>
                                        </br>    
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar_separate progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                            <?php } ?>
                        <?php } ?>  
                        </br>  
                    </div>
                </div>    
            </div>
            </br>
        </div>
    <?php } ?>
</div>

<?php include_once("includes/profesor/pie.php"); ?>
