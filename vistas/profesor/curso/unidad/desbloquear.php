<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="desbloqueo_title_profesor">
        <h1>Curso: <?php echo $curso->nombre; ?></h1>
    </div>
    <?php if($unidades!=NULL){ ?>
    <div class="desbloqueo_table_profesor rounded shadow">
        <table class="table">
            <thead>
                <tr>
                    <th> Nombre de la Unidad </th>
                    <th> Acciones </th>
                </tr>
            </thead>
            <?php foreach ($unidades as $iterador) { ?>
                <tr>
                    <td><?php echo $iterador->nombre; ?></td>
                    <td>
                        <?php foreach ($estatusUnidad as $i) { ?>
                            <?php if ($iterador->idUnidad == $i->idUnidad) { ?>
                                <?php if ($i->estado == "Activado") { ?>
                                    <a class="btn desbloqueo_btn_profesor" href="?controlador=unidad&accion=cambioEstado&idC=<?php echo $curso->idCurso; ?>&estado=Inactivo&idU=<?php echo $iterador->idUnidad; ?>" role="button">Desactivar</a>
                                <?php } ?>
                                <?php if ($i->estado == "Inactivo") { ?>
                                    <a class="btn desbloqueo_btn_profesor" href="?controlador=unidad&accion=cambioEstado&idC=<?php echo $curso->idCurso; ?>&estado=Activado&idU=<?php echo $iterador->idUnidad; ?>" role="button">Activar</a>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php }else{ ?>
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-3">No existen Unidades que Desbloquear</h1>
                <hr class="my-2">
                <div>
                    <img src="img\logos/desbloqueado.png" width="400" alt="">
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include_once("includes/profesor/pie.php"); ?>