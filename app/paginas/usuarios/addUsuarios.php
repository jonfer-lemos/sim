

<div class="col-lg-6">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Novo Usuário</h3>
        </div>
        <form action="../app/backend/usuarioBackend/addUser.php" method="POST">
               
            <div class="card-body">
            <p style="color: red;">Digite o e-mail do novo usuário abaixo:</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>

                    <br>


                <p style="color: blue;">Depois clique em Adicionar: </p>

                <div class="float-sm-right ">
                    <div class="input-group mb-3">
                        <a href="">
                            <button type="submit" class="btn  btn-outline-primary">
                                <strong>Adcionar</strong>
                            </button>
                        </a>
                    </div>

        </form>
    </div>
</div>