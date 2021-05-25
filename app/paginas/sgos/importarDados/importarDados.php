<div class="row">

    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"></h3> <i class=" float-sm-right fa fa-upload" aria-hidden="true"></i>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="../app/backend/incluirArquivosBackend/processa.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuário</label>
                        <input class="form-control" id="exampleInputEmail1" value="<?php echo ($_SESSION['nome']); ?>" disabled>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">

                            <input type="file" name="arquivo" id="exampleInputFile">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer ">
                    <button type="submit" class="btn btn-outline-primary float-sm-right">Enviar</button>
                </div>
            </form>
        </div>


    </div>
</div>