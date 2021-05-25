<?php
//session_start();
//include "../app/backend/conexao.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = $id";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

// if ($id == '') {
//     header('Location: ../'); // voltar para pagina


// } else {
//     # code...
// }

?>


<div class="col-lg-8">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Apagar Usuário #ID <?php echo  $row_usuario['id']; ?></h3>
        </div>
        <form action="../app/backend/usuarioBackend/deletar.php" method="POST">

            <input style="display:none;" value="<?php echo $row_usuario['id']; ?>" name="id_user">

            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                    </div>
                    <input disabled value="<?php echo $row_usuario['nome']; ?>" type="text" class="form-control" placeholder="Nome" name="nome">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input disabled value="<?php echo $row_usuario['email']; ?>" type="text" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input disabled value="<?php echo $row_usuario['telefone']; ?>" type="text" class="form-control" placeholder="Telefone" name="tel">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>

                    </div>
                    <select disabled type="text" class="form-control" name="userTipo">
                        <option value="0"></option>
                        <option value="1">Usuário Administrador</option>
                        <option value="0">Usuário Cliente</option>
                    </select>

                </div>


                <div class="float-sm-right ">
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