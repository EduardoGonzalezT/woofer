<?php include_once("includes/alumno/cabecera.php"); ?>
<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Numero de Preguntas</th>
            <th>Tiempo</th>
            <th>Descripcion</th>
            <th>Fecha de Creacion</th>
            <th>Etiqueta</th>
            <th>Accion</th>
        </tr>
    </thead>
        <tr>
            <td><?php echo $examen->titulo; ?></td>
            <td><?php echo $examen->totalPreguntas; ?></td>
            <td><?php echo $examen->tiempo; ?></td>
            <td><?php echo $examen->descripcion; ?></td>
            <td><?php echo $examen->fecha; ?></td>
            <td><?php echo $examen->etiqueta; ?></td>
            <td>
                <a  href="?controlador=examenAlumno&accion=realizarExamen&ex=<?php echo $examen->idExamen; ?>&pre=1&nPre=<?php echo $examen->totalPreguntas; ?>" type="button" class="btn btn-info"> Realizar Examen </a>
            </td>
        </tr>
</table>
<?php include_once("includes/profesor/pie.php"); ?>