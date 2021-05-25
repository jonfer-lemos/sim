<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Base de Dados</h3>
                    <div class="card-tools">


                    </div>
                </div>


                <div class="card-body table-responsive p-0" style="height: auto;">
                    <table class="table table-sm table-striped table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Data</th>
                                <th scope="col" style="text-align: center;">Ação</th>
                               
                            </tr>
                        </thead>
                        <div>
                            <tbody id="myTable">

                                <?php                                
                                $sql = "SELECT DISTINCT DATE_FORMAT(dt_original, '%Y-%m') AS data_formatada FROM stj";
                                $buscar = mysqli_query($conexao, $sql);
                                if (!$buscar) {
                                    printf("Error: %s\n", mysqli_error($conexao));
                                    exit();
                                }
                                while ($linha = mysqli_fetch_array($buscar)) { ?>

                                    <tr>
                                        <td scope="col" style="text-align: center;"> <?php echo $linha['data_formatada'] ?></td>
                                        
                                        <td scope="col" style="text-align: center;">
                                            <a href='?pag=deletaMes&mes=<?php echo $linha['data_formatada'] ?>'> <button type="submit" class="btn btn-sm btn-outline-danger" style="margin-left: 15px;"><i class="far fa-trash-alt"></i></button></a>


                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody>
                        </div>


                    </table>
                </div>


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>