<div class="col-md-12">
    <div class="card">
        <div class="card-header">

            <h5 class="card-title"><strong>Análise de óleo</strong></h5>

            <div class="card-tools">
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Mês/Ano</a>
                        <form onchange="document.forms['menuForm'].submit();" name="menuForm" method="POST">
                            <input value="<?php echo $x ?>" type="month" id="bdaymonth" min="2020-01" max="2030-12" name="datasFiltro" class="form-control float-right">
                        </form>

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
                <div class="col-md-6">
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
                        <canvas id="myChartAnalise_pie" height="600" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                </div>
                <div class="col-md-6">
                <br><br><br>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">tag</th>
                                <th scope="col">descrição</th>
                                <th scope="col">Analise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>L1 220.2</td>
                                <td>Z1 ZZZZ</td>
                                <td>@ENSC</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>60</td>
                                <td>30</td>
                                <td>@50</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>100</td>
                                <td>ZZZZZ</td>
                                <td>@ZZZZZ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
                <!-- <canvas id="myChartAnalise_pie"></canvas> -->


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
    var ctx = document.getElementById('myChartAnalise_pie').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Trocar,', 'Alerta', 'Bom'],
            datasets: [{
                label: '# of Votes',
                data: [10, 30, 60],
                backgroundColor: [
                    'rgba(238, 59, 59, 0.5)',
                    'rgba(255, 255, 0, 0.5)',
                    'rgba(50, 205, 50, 0.5)'
                ],
                borderColor: [
                    'rgba(238, 59, 59, 0.5)',
                    'rgba(255, 255, 0, 0.5)',
                    'rgba(50, 205, 50, 0.5)'
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