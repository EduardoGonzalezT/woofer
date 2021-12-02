<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="contenido_alumno_title">
        <h1><?php echo $curso->nombre; ?></h1>
    </div>
    <div class="contenido_alumno_cont rounded shadow">
        <?php foreach ($estatusUnidad as $estatus) { ?>
            <?php foreach ($listaUnidades as $unidades) { ?>
                <?php if ($estatus->idUnidad == $unidades->idUnidad && $estatus->estado == "Activado") { ?>
                    <div class="accordion">
                        </br>
                        <div class="accordition_unidades" id="unidades">
                            <h2 class="accordion-header" id="headingOne">
                                <h3 align="center"> Unidad: <?php echo $unidades->nombre; ?> </h3>
                                </br>
                                <h4 align="center"> Que Veremos: </h4>
                                <h6 align="center"> <?php echo $unidades->descripcion; ?> </h6>
                                </br>
                                <a class="btn btn-dark" href="?controlador=misCursos&accion=iniciarUnidad&idU=<?php echo $unidades->idUnidad; ?>&idC=<?php echo $idCurso; ?>&nUnidad=<?php echo $unidades->numeroUnidad; ?>" role="button">Iniciar Unidad</a>
                                </br>
                                </br>
                                <button id="accorditionstyle" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5>Temario de la Unidad</h5>
                                </button>
                                </br>
                                <a class="btn btn-dark" href="?controlador=examenAlumno&accion=mostrarExamenAlumno&idU=<?php echo $unidades->idUnidad; ?>" role="button">realizar Examen</a>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body_temas" id="temas">
                                    <?php foreach ($listaTemas as $temas) { ?>
                                        <?php if ($temas->idUnidad == $unidades->idUnidad) { ?>
                                        </br>
                                            <h4 align="center" > Tema: <?php echo $temas->nombre; ?> </h4>
                                            <h6 align="center"> <?php echo $temas->descripcion; ?>  </h6>
                                        </br>
                                            <div class="accordion-body_subtemas" id="subtemas">
                                                <?php foreach ($listaSubtemas as $subtema) { ?>
                                                    <?php if ($subtema->idTema == $temas->idTema) { ?>
                                                        <h5 align="center" > Subtemas: </h5>
                                                        <h6 align="center" > * <?php echo $subtema->nombre; ?> </h6>
                                                    </br>
                                                        <div class="accordion-body_material" id="material">
                                                            <?php foreach ($listaMaterial as $material) { ?>
                                                                <?php if ($material->idSubtema == $subtema->idSubtema) { ?>
                                                                    <a href="?controlador=misCursos&accion=mostrarMateriales&idM=<?php echo $material->idMaterial; ?>&idC=<?php echo $idCurso; ?>" class="btn position-relative btn-material" role="button">
                                                                        <?php echo $material->nombre; ?>
                                                                        <span class="position-absolute top-0 start-100 translate-middle">
                                                                    </a>
                                                                </br>
                                                                </br>    
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        </div>
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
                <?php if ($estatus->idUnidad == $unidades->idUnidad && $estatus->estado == "Inactivo") { ?>
                    <h6>La Unidad: <?php echo $unidades->nombre; ?> se encuentra inactiva.</h6>
                    <h6>Espera a que el profesor la active.</h6>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<div>
    <a name="" id="" class="btn btn-dark" href="?controlador=comentario&accion=mostrarComentario&idC=<?php echo $idCurso; ?>" role="button">Agrega un comentario del curso</a>
</div>

<?php include_once("includes/profesor/pie.php"); ?>