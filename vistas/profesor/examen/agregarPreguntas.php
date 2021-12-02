<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Ingrese los detalles de las pregunta</b></span><br /><br />
    <div class="col-md-6">
        <form class="form-horizontal title1" name="form" action="?controlador=examenProfesor&accion=registrarPreguntas&ex=<?php echo $idExamen; ?>&nPre=<?php echo $numeroPreguntas; ?>" method="POST">
            <fieldset>
                <?php for ($i = 1; $i <= $numeroPreguntas; $i++) { ?>
                    <h1>Pregunta numero: <?php echo $i; ?></h1>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="txtPregunta<?php echo $i; ?>"></label>
                        <div class="col-md-12">
                            <label for="" class="form-label">Pregunta:</label>
                            <textarea rows="3" cols="5" name="txtPregunta<?php echo $i; ?>" class="form-control" placeholder="Escribe la pregunta número <?php echo $i; ?>  acá"></textarea>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="<?php echo $i; ?>1"></label>
                        <div class="col-md-12">
                            <label for="" class="form-label">Opcion A:</label>
                            <input id="<?php echo $i; ?>1" name="<?php echo $i; ?>1" placeholder="Ingresa la opción A" class="form-control input-md" type="text">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="<?php echo $i; ?>2"></label>
                        <div class="col-md-12">
                            <label for="" class="form-label">Opcion B:</label>
                            <input id="<?php echo $i; ?>2" name="<?php echo $i; ?>2" placeholder="Ingresa la opción B" class="form-control input-md" type="text">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="<?php echo $i; ?>3"></label>
                        <div class="col-md-12">
                            <label for="" class="form-label">Opcion C:</label>
                            <input id="<?php echo $i; ?>3" name="<?php echo $i; ?>3" placeholder="Ingresa la opción C" class="form-control input-md" type="text">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="<?php echo $i; ?>4"></label>
                        <div class="col-md-12">
                            <label for="" class="form-label">Opcion D:</label>
                            <input id="<?php echo $i; ?>4" name="<?php echo $i; ?>4" placeholder="Ingresa la opción D" class="form-control input-md" type="text">
                        </div>
                    </div>
                    <label for="" class="form-label">Escoge la respuesta Correcta:</label>
                    <select id="txtRespuesta<?php echo $i; ?>" name="txtRespuesta<?php echo $i; ?>" placeholder="Escoge la respuesta correcta" class="form-control input-md">
                        <option value="#">Seleccione la respuesta a la pregunta <?php echo $i; ?></option>
                        <option value="a">opcion A</option>
                        <option value="b">opcion B</option>
                        <option value="c">opcion C</option>
                        <option value="d">opcion D</option>
                    </select>
                    <br>
                <?php } ?>
                <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12">
                        <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>