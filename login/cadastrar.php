<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) {
    include_once '../app/backend/conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    $email = $_POST['email'];
    $listaUserAltentica = "SELECT COUNT(email_autenticado) AS total FROM emails WHERE email_autenticado = '$email'";
    $consultaListaUserAltentica = mysqli_query($conexao, $listaUserAltentica);
    $totalAltentica = mysqli_fetch_array($consultaListaUserAltentica);  

    $listaUser = "SELECT COUNT(email) AS total FROM usuarios WHERE email = '$email'";
    $consultaListaUser = mysqli_query($conexao, $listaUser);
    $total = mysqli_fetch_array($consultaListaUser);
    
    //echo $totalAltentica['total'];

    if ($totalAltentica['total'] >= 1) {
        
        if ($total['total'] >= 1){
            echo '<script>alert("Email já cadastrado na lista de usuários!"); history.go(-1)</script> ';
        }else{
            $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

            $result_usuario = "INSERT INTO usuarios (nome, telefone, email, senha) VALUES (
            				'" . $dados['nome'] . "',
                            '" . $dados['telefone'] . "',
            				'" . $dados['email'] . "',				
            				'" . $dados['senha'] . "'
            				)";
            $resultado_usario = mysqli_query($conexao, $result_usuario);
            if (mysqli_insert_id($conexao)) {
                header("Location: ../");
                 echo '<script>alert("Cadastro efetuado com sucesso!"); </script> ';
                    //
            } else {
                $_SESSION['msg'] = "Erro ao cadastrar o usuário";
            }
        }
        
        
       
    }else {
         echo '<script>alert("Usuário não cadastrado, pois não pretence ao BD autenticado!"); history.go(-1)</script> ';
    }
}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>S.I.M</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../app/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../app/dist/css/adminlte.min.css">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../app/plugins/toastr/toastr.min.css">

        <!-- BAR CHART -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.js'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    </head>
    <meta charset="utf-8">
    <title>Celke - Login</title>
</head>

<script type="text/javascript">
    $("#telefone, #celular").mask("(00) 0 0000-0000");
</script>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <img width="300" height="94" src="http://www.curveloonline.com/wp-content/uploads/Logo-Mizu-300x94.png" class="attachment-medium size-medium tie-appear" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px">

        </div>
        

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div class="card">


            <div class="card-body login-card-body">
                <h5>Cadastro de Usuários</h5>
                <form method="POST" action="">

                    <div class="input-group mb-3">
                        <!-- <input type="email" class="form-control" placeholder="Email"> -->
                        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-signature"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <!-- <input type="email" class="form-control" placeholder="Email"> -->

                        <input type="text" class="form-control" placeholder="Celular" id="celular" name="telefone" required><br>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <!-- <input type="email" class="form-control" placeholder="Email"> -->
                        <input type="email" name="email" class="form-control" placeholder="Digite o seu usuário" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>

                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input name="senha" class="form-control" type="password" autocomplete="off" placeholder="Senha" maxlength="15" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                <br>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="remember"> -->
                                <a href="../"><label for="remember">Voltar
                                <i class="fas fa-arrow-circle-left"></i>
                                </label>
                                </a>
                                
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" class="btn btn-block btn-outline-primary" name="btnCadUsuario" value="Cadastrar">
                        </div>
                        <!-- /.col -->

                    </div>

                </form>
            </div>

        </div>


    </div>






    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../app/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../app/dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="../app/plugins/chart.js/Chart.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="../app/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../app/plugins/toastr/toastr.min.js"></script>


    <!-- AdminLTE for demo purposes -->



    </div>

</body>

</html>