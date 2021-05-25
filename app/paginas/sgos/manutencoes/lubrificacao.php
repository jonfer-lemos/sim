<?php

include '../app/backend/homeBackend/sgosBackend/lubrificacaoEfic.php';

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
                <h3 class="card-title">Lubrificação x Área</h3>
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
                    <canvas id="LubArea" height="400" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>


    <div class="col-md-12">
        <div class="card card-navy card-outline">
            <div class="card-header">
                <h3 class="card-title">Lubrificação x Manutenções</h3>
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
                    <canvas id="chartPrev" height="400" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>




</div>



<script>
    var ctx = document.getElementById('LubArea');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Combustíveis L1', 'Britagem', 'Pré Homo', 'Galpão', 'M. Cru L1', 'Clinquerização L1', 'M. Cimento L1',
                'Silo 2/17 Mil', 'Ensac/Palet. L1', 'M. Cru L2', 'Combustíveis L2', 'Clinquerização L2', 'M. Cimento L2', 'Ensac/Palet. L2',
                'Automotivo', 'Outros'
            ],
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
                        <?php echo $combustiveisTotalPrev ?>,
                        <?php echo $britagemTotalPrev ?>,
                        <?php echo $preHomoTotalPrev ?>,
                        <?php echo $galpaoMateriaPrimaTotalPrev ?>,
                        <?php echo $moagemCruTotalPrev ?>,
                        <?php echo $cliquerizacaoTotalPrev ?>,
                        <?php echo $moagemCimentoTotalPrev ?>,
                        <?php echo $silo2_17_MilPrev ?>,
                        <?php echo $ensacadeiraPaletizadoraTotalPrev ?>,
                        <?php echo $moagemCruL2TotalPrev ?>,
                        <?php echo $combustiveisL2TotalPrev ?>,
                        <?php echo $cliquerizacaoL2TotalPrev ?>,
                        <?php echo $moagemCimentoL2TotalPrev ?>,
                        <?php echo $ensacadeiraPaletizadoraL2TotalPrev ?>,
                        <?php echo $lubFrotasGeradas ?>,
                        <?php echo $outrosTotalPrev ?>

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
                        <?php echo $combustiveisTotalPrevFinalizada ?>,
                        <?php echo $britagemTotalPrevFinalizada ?>,
                        <?php echo $preHomoTotalPrevFinalizada ?>,
                        <?php echo $galpaoMateriaPrimaTotalPrevFinalizada ?>,
                        <?php echo $moagemCruTotalPrevFinalizada ?>,
                        <?php echo $cliquerizacaoTotalPrevFinalizada ?>,
                        <?php echo $moagemCimentoTotalPrevFinalizada ?>,
                        <?php echo $silo2_17_MilPrevFinalizada ?>,
                        <?php echo $ensacadeiraPaletizadoraTotalPrevFinalizada ?>,
                        <?php echo $moagemCruL2TotalPrevFinalizada ?>,
                        <?php echo $combustiveisL2TotalPrevFinalizada ?>,
                        <?php echo $cliquerizacaoL2TotalPrevFinalizada ?>,
                        <?php echo $moagemCimentoL2TotalPrevFinalizada ?>,
                        <?php echo $ensacadeiraPaletizadoraL2TotalPrevFinalizada ?>,
                        <?php echo $lubFrotasGeradasFinalizadas ?>,
                        <?php echo $outrosTotalPrevFinalizada ?>

                    ]
                },


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


<script>
    var ctx = document.getElementById('chartPrev');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mecânica', 'Elétrica', 'Frotas', 'Grande Parada'],
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
                        <?php echo $lubMecanicaGeradas ?>,
                        <?php echo $lubEletricaGeradas ?>,
                        <?php echo $lubFrotasGeradas ?>,
                        <?php echo $lubGrandeParadaGeradas ?>




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
                        <?php echo $lubMecanicaGeradasFinalizadas ?>,
                        <?php echo $lubEletricaGeradasFinalizadas ?>,
                        <?php echo $lubFrotasGeradasFinalizadas ?>,
                        <?php echo $lubGrandeParadaGeradasFinalizadas ?>
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