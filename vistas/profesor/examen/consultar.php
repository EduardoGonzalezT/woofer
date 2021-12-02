<?php include_once("includes/profesor/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="row">
        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Detalles del examen</b></span><br /><br />
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form class="form-horizontal title1" action="?controlador=examenProfesor&accion=registrarExamen" method="POST">
                <fieldset>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="idUnidad" name="idUnidad" value="<?php echo $idUnidad; ?>" hidden class="form-control input-md" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">Titulo</label>
                        <div class="col-md-12">
                            <input id="txtTitulo" name="txtTitulo" placeholder="Ingrese el título del Examen" class="form-control input-md" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">Numero de Preguntas</label>
                        <div class="col-md-12">
                            <input id="txtPreguntaNumero" name="txtPreguntaNumero" placeholder="Ingrese el número total de preguntas" class="form-control input-md" type="number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">valor verdadero</label>
                        <div class="col-md-12">
                            <input id="txtValorVerdadero" name="txtValorVerdadero" placeholder="Ingrese la ponderacion de respuestas verdaderas" class="form-control input-md" min="0" type="number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">Tiempo</label>
                        <div class="col-md-12">
                            <input id="txtTiempo" name="txtTiempo" placeholder="Ingrese el límite de tiempo para la prueba en minutos" class="form-control input-md" min="1" type="number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">Etiqueta</label>
                        <div class="col-md-12">
                            <input id="txtEtiqueta" name="txtEtiqueta" placeholder="Ingrese una etiqueta para que puedan buscar el examen" class="form-control input-md" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="">Descripcion</label>
                        <div class="col-md-12">
                            <textarea rows="8" cols="8" name="txtDescripcion" id="txtDescripcion" class="form-control" placeholder="Escribe una descripción acá..." required></textarea>
                        </div>
                    </div>
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
</div>
<?php include_once("includes/profesor/pie.php"); ?>