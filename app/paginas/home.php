<?php
include '../app/backend/homeBackend/homePainel.php';
?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box md-3">
            <span class="info-box-icon <?php echo $efic ?> elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">SGOS Eficiência Geral</span>
                <span class="info-box-number">
                    <?php echo $eficienciaGeral . '%' ?></span>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Programação</span>
                <span class="info-box-number">290 Preventivas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Lubrificantes</span>
                <span class="info-box-number">60%</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-search-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Custo Ton</span>
                <span class="info-box-number">15,00</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
</div>

<?php
include '../app/paginas/sgos/dashSgos.php';

include '../app/paginas/calendarios/dashCalender.php';
?>