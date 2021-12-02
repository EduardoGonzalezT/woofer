<?php include_once("includes/alumno/cabecera.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js" integrity="sha512-CWVDkca3f3uAWgDNVzW+W4XJbiC3CH84P2aWZXj+DqI6PNbTzXbl1dIzEHeNJpYSn4B6U8miSZb/hCws7FnUZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="mar_root_max">
    <div class="estadisticas_table_alumno rounded shadow">
        <table class="table">
            <thead>
                <tr>
                    <th> Nombre del Curso </th>
                    <th> Nombre Unidad </th>
                    <th> Estatus </th>
                    <th> Calificacion </th>
                    <th> Fecha de registro </th>
                </tr>
            </thead>
            <?php foreach ($consulta as $iterador) { ?>
                <tr>
                    <td><?php echo $iterador->nombreCurso; ?></td>
                    <td><?php echo $iterador->nombreUnidad; ?></td>
                    <td><?php echo $iterador->estatus; ?></td>
                    <td><?php echo $iterador->calificacion;  ?></td>
                    <td><?php echo $iterador->fechaRegistro; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="row">
    <div class="grafica_alumno">
        <canvas id="myChart" width="100%" height="100%"></canvas>
    </div>
    <div class="grafica_alumno">
        <canvas id="myChart2" width="100%" height="100%"></canvas>
    </div>
    </div>

</div>
<script>
    var calif = <?php echo json_encode($arreglo); ?>;
    var unidades = <?php echo json_encode($nombres); ?>;
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: unidades,
            datasets: [{
                label: 'Calificación',
                data: calif,
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
            plugins:{
                title:{
                    display: true,
                    text: 'Calificaciones por Unidad'
                }
            },
            scales: {
                y: {
                    title: {
                    display: true,
                    text: 'Calificación'
                    },
                    min: 0,
                    max: 10
                },
                x:{
                    title: {
                    display: true,
                    text: 'Unidades'
                    }
                }
            }
        }
    });
</script>

<script>
    var datos = <?php echo json_encode($datos); ?>;
    var estatus = <?php echo json_encode($estatus); ?>;
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: datos,
            datasets: [{
                label: 'Avance',
                data: estatus,
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
            plugins:{
                title:{
                    display: true,
                    text: 'Avance de Unidad',
                }
            },
            indexAxis: 'y',
            scales: {
                y: {
                    title: {
                    display: true,
                    text: 'Unidades'
                    }
                },
                x:{
                    title: {
                    display: true,
                    text: 'Tipo de Avance'
                    
                    },
                    min:0,
                    max: 1,
                    ticks: {
                        stepSize: 0.5
                    }
                }
            }
        }
    });
</script>
<?php include_once("includes/profesor/pie.php"); ?>