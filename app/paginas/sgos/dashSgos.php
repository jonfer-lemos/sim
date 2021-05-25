<div class="col-md-12">
    <div class="card">
        <div class="card-header">

            <h5 class="card-title"><strong>SGOS</strong></h5>

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
                        <canvas id="myChart" height="600" style="height: 180px; display: block; width: 304px;" width="912" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <p class="text-center">
                        <strong>Percentual/Manutenção</strong>
                    </p>

                    <div class="card-body p-0">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th id="tabelaCarai" style="width:50%;"> Manutenções</th>
                                    <th> Progress</th>
                                    <th style="width:1%; text-align: center;"> % </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- @media (max-width: 600px) -->
                                    <td><a href="?pag=mecanica"><i class="nav-icon far fa-chart-bar"></i> Mecânica</a></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated
                                     <?php echo $mec ?>" style="width: <?php echo $mecanica ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-pill <?php echo $mec ?>"><?php echo $mecanica ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=eletrica"><i class="nav-icon far fa-chart-bar"></i> Elétrica</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                    <?php echo $ele ?>" style="width: <?php echo $eletrica ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-pill <?php echo $ele ?>"><?php echo $eletrica ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=instrumentacao"></i><i class="far fa-chart-bar"></i> Instrumentação</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                    <?php echo $inst ?>" style="width: <?php echo $instrumentacao ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-pill <?php echo $inst ?>"><?php echo $instrumentacao ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=lubrificacao"><i class="nav-icon far fa-chart-bar"></i> Lubrificação</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                     <?php echo $lub ?>" style="width: <?php echo $lubrificacao ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge  badge-pill <?php echo $lub ?>"><?php echo $lubrificacao ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=inspecao"><i class="nav-icon far fa-chart-bar"></i> Inspeção</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                     <?php echo $insp ?>" style="width: <?php echo $inspecao ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge  badge-pill <?php echo $insp ?>"><?php echo $inspecao ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=preditiva"><i class="nav-icon far fa-chart-bar"></i> Preditiva</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                     <?php echo $pred ?>" style="width: <?php echo $preditiva ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge  badge-pill <?php echo $pred ?>"><?php echo $preditiva ?>%</span></td>
                                </tr>
                                <tr>
                                    <td><a href="?pag=frotas"><i class="nav-icon far fa-chart-bar"></i> Frotas</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                     <?php echo $fro ?>" style="width: <?php echo $frotas ?>%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge  badge-pill <?php echo $fro ?>"><?php echo $frotas ?>%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.progress-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                        <h5 class="description-header"><?php echo $totalOsGeradas ?></h5>
                        <span class="description-text">TOTAL O.S's</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        <!-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>                         -->
                        <h5 class="description-header"><?php echo $totalOsFinalizadas ?></h5>
                        <span class="description-text">TOTAL FINALIZADOS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> -->
                        <h5 class="description-header"><?php echo $totalOsGeradas - $totalOsFinalizadas  ?></h5>
                        <span class="description-text">DIFERENÇA</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <!-- <div class="col-sm-3 col-6">
                    <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                   
                </div> -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>


<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mecânica', 'Elétrica', 'Instrumentação', 'Lubrificação', 'Inspeção', 'Preditiva', 'Frotas'],
            datasets: 
            [
                {

                    label: '<?php echo date('M/Y', strtotime($antepenultimo)) ?>',
                    backgroundColor: 'rgba(205, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo $antepenultimomecanica ?>,
                        <?php echo $antepenultimoeletrica ?>,
                        <?php echo $antepenultimoinstrumentacao ?>,
                        <?php echo $antepenultimolubrificacao ?>,
                        <?php echo $antepenultimoinspecao ?>,
                        <?php echo $antepenultimopreditiva ?>,
                        <?php echo $antepenultimofrotas ?>
                    ]
                },
                {
                    label: '<?php echo date('M/Y', strtotime($penultimo)) ?>',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo $penultimomecanica ?>,
                        <?php echo $penultimoeletrica ?>,
                        <?php echo $penultimoinstrumentacao ?>,
                        <?php echo $penultimolubrificacao ?>,
                        <?php echo $penultimoinspecao ?>,
                        <?php echo $penultimopreditiva ?>,
                        <?php echo $penultimofrotas ?>
                    ]

                },


                {
                    label: '<?php echo date('M/Y', strtotime($x)) ?>',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo $mecanica ?>,
                        <?php echo $eletrica ?>,
                        <?php echo $instrumentacao ?>,
                        <?php echo $lubrificacao ?>,
                        <?php echo $inspecao ?>,
                        <?php echo $preditiva ?>,
                        <?php echo $frotas ?>
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