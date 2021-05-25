<?php


$mes = filter_input(INPUT_GET, 'mes', FILTER_SANITIZE_NUMBER_INT);


//echo $mes;

?>

<h2 style="color: red; margin-right: 20px ;margin-left: 20px;"><strong>Atenção!!!</strong> </h2>


<div class="col-lg-5">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><strong>Deseja deletar dados de:</strong><span style="background: rgba(250, 30, 30, .09);"><?php echo ' '. $mes; ?></span> </h3>
        </div>
        <form action="../app/backend/incluirArquivosBackend/deletaDadosBackend.php" method="POST">
            <input style="display:none;" value="<?php echo $mes; ?>" name="mes">

            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                    </div>
                    <input disabled value="<?php echo $mes; ?>" type="text" class="form-control">
                </div>

            </div>


            <div class="float-sm-right" style="margin-right: 20px ;margin-left: 20px;">
                <div class="input-group mb-3">
                    <a href="">
                        <button type="submit" class="btn  btn-danger">
                            <strong>Excluir</strong>
                        </button>
                    </a>
                </div>

        </form>
    </div>
</div>