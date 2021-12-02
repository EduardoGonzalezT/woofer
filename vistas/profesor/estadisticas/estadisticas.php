<?php include_once("includes/profesor/cabecera.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js" integrity="sha512-CWVDkca3f3uAWgDNVzW+W4XJbiC3CH84P2aWZXj+DqI6PNbTzXbl1dIzEHeNJpYSn4B6U8miSZb/hCws7FnUZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="mar_root_max">
    <div class="estadisticas_title_profesor">
        <h1>Estadísticas</h1>
    </div>
    <div class="estadisticas_t1_profesor">
        <h2>Número de Alumnos Inscritos a Curso</h2>
    </div>
    <div class="estadisticas_tablet_divisor_Profesor">
        <table class="table estadisticas_table_profesor">
            <thead>
                <tr>
                    <th> Nombre del Curso </th>
                    <th> Numero de Alumnos Inscritos </th>
                </tr>
            </thead>
            <?php foreach ($totalAlumnos as $iterador) { ?>
                <tr>
                    <td><?php echo $iterador->nombreCurso; ?></td>
                    <td><?php echo $iterador->numero; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="estadisticas_t1_profesor">
        <h2>Calificaciones por Alumno Inscrito al Curso</h2>
    </div>
    <div class="estadisticas_tablet_divisor_Profesor">
        <table class="table estadisticas_table_profesor">
            <thead>
                <tr>
                    <th> Nombre del Alumno </th>
                    <th> Nombre Curso </th>
                    <th> Nombre Unidad </th>
                    <th> Calificación </th>
                </tr>
            </thead>
            <?php foreach ($calificacionEstudiante as $iterador) { ?>
                <tr>
                    <td><?php echo $iterador->nombreAlumno; ?></td>
                    <td><?php echo $iterador->nombreCurso; ?></td>
                    <td><?php echo $iterador->nombreUnidad; ?></td>
                    <td><?php echo $iterador->calificacion; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="estadisticas_t1_profesor">
        <h2>Comentarios y Valoración por Curso</h2>
    </div>
    <div class="estadisticas_tablet_divisor_Profesor">
        <table class="table estadisticas_table_profesor">
            <thead>
                <tr>
                    <th> Nombre del Curso </th>
                    <th> Fecha y Hora </th>
                    <th> Valoración </th>
                    <th> Comentario </th>
                </tr>
            </thead>
            <?php foreach ($comentarios as $iterador) { ?>
                <tr>
                    <td><?php echo $iterador->nombreCurso; ?></td>
                    <td><?php echo $iterador->fechaHora; ?></td>
                    <td><?php echo $iterador->valoracion; ?></td>
                    <td><?php echo $iterador->comentario; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="row">
        <div class="grafica_profesor">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
    </div>
</div>
<script>
    var nombreCurso = <?php echo json_encode($nombreCurso); ?>;
    var total = <?php echo json_encode($total); ?>;
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: nombreCurso,
            datasets: [{
                label: 'Calificación',
                data: total,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Cantidad de Alumnos Inscritos al Curso'
                }
            }
        }
    });
</script>
<?php include_once("includes/profesor/pie.php"); ?>