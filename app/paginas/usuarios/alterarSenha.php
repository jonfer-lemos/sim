<?php
//session_start();
//include "../app/backend/conexao.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = $id";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>
 

<div class="col-lg-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Alterar Senha</h3>
        </div>
        <form action="../app/backend/usuarioBackend/alterarSenhaUser.php" method="POST">

            <input style="display:none;" value="<?php echo $row_usuario['id']; ?>" name="id_user">

            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                    </div>
                    <input value="<?php echo $row_usuario['nome']; ?>" type="text" class="form-control" placeholder="Nome" disabled name="nome">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                    </div>
                    <input value="" type="text" class="form-control" placeholder="Nova Senha" name="novaSenha" required>

                </div>


                <div class="float-sm-right ">
                    <div class="input-group mb-3">
                        <a href="">
                            <button type="submit" class="btn  btn-outline-primary">
                                Atualizar
                            </button>
                        </a>
                    </div>

        </form>
    </div>
</div>