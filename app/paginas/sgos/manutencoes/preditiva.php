<?php

include '../app/backend/homeBackend/sgosBackend/preditivaEfic.php';

?>



<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $manutencaoNome ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?php echo $eficienciaManutencao; ?>%</a></li>
                    <li class="breadcrumb-item active"><?php echo date('M-Y', strtotime($x)); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card card-navy card-outline">
            <div class="card-header">
                <h3 class="card-title">Mecânica & Elétrica</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chartPreditivas" height="400" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>




</div>



<script>
    var ctx = document.getElementById('chartPreditivas');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mecânica', 'Elétrica'],
            datasets: [{
                    label: 'Geradas',
                    backgroundColor: 'rgba(37, 159, 255, 0.37)',
                    borderColor: 'rgba(37, 159, 255, 0.37)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo $preditivaMecanicaGeradas ?>,
                        <?php echo $preditivaEletricaGeradas ?>




                    ]
                },
                {
                    label: 'Finalizadas',
                    backgroundColor: 'rgba(158, 175, 241, 0.37)',
                    borderColor: 'rgba(158, 175, 241, 0.37)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo $preditivaMecanicaGeradasFinalizadas ?>,
                        <?php echo $preditivaEletricaGeradasFinalizadas ?>
                    ]
                }








            ]
        },

        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>