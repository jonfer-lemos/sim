<div class="col-md-12">
    <div class="card">
        <div class="card-header">

            <h5 class="card-title"><strong>Custo</strong></h5>

            <div class="card-tools">
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <!-- <a href="#" class="dropdown-item">Mês/Ano</a>
                        <form onchange="document.forms['menuForm'].submit();" name="menuForm" method="POST">
                            <input value="<?php echo $x ?>" type="month" id="bdaymonth" min="2020-01" max="2030-12" name="datasFiltro" class="form-control float-right">
                        </form> -->

                    </div>
                </div>
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
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">

                        <strong>Último mês <?php echo $x ?> </strong>
                    </p>

                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <!-- Sales Chart Canvas -->
                        <canvas id="myChartAnalise_line" height="600" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                

                <!-- <canvas id="myChartAnalise_line"></canvas> -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- ./card-body -->

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>



<script>
var ctx = document.getElementById('myChartAnalise_line').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['jan/21', 'fev/21', 'mar/21', 'abr/21', 'mai/21'],
        datasets: [{
            label: 'Histórico',
            data: [12, 13, 13, 11, 15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',                
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



