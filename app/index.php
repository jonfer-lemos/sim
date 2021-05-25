<?php
//date_default_timezone_set('America/Sao_Paulo');
//require 'backend/conexao.php';
session_start();

if (empty($_SESSION['id'])) {
  header("location: ../");
  exit();
}

require_once 'backend/conexao.php';
require_once 'backend/temaUser.php';

error_reporting(0);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>S.I.M</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

  <!-- BAR CHART -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="./plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="./plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="./plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="./plugins/fullcalendar-bootstrap/main.min.css">
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.js'></script>


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-<?php echo $nav; ?> navbar-light" style="opacity: .98;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../app" class="nav-link"><strong>Home</strong></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="../login/sair.php" role="button">
            <i class="fas fa-sign-out-alt"> Sair</i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  sidebar-dark-transparent bg-gradient-<?php echo $side ?> elevation-4">


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./dist/img/cliente/img_client.jpg" class="img-circle elevation-1" alt="User Image" style="background: white;">
          </div>
          <div class="info">
            <a href="../app" class="d-block">
              <?php
              echo $_SESSION['nome'];


              ?>
            </a>
          </div>
        </div>


        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- SGOS -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">
                <!-- active -->

                <i class=" nav-icon fas fa-tachometer-alt"></i>
                <p>
                  SGOS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="../app" class="nav-link">

                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>Manutenções x Área</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../app" class="nav-link">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>Área x Manutenções</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../app" class="nav-link">
                    <i class="fas fa-sitemap nav-icon"></i>
                    <p>Sistemáticas</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="fas fa-file-signature nav-icon"></i>
                    <p>Manuais</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-exclamation-circle nav-icon"></i>
                    <p>Pendentes</p>
                  </a>
                </li>

                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=inserirDados" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Dados</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=deletarDados" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Dados</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- SGOS FIM -->

            <!-- CALENDÁRIOS-->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">

                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Calendários
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-industry nav-icon"></i>
                    <p>Prev. Indústrial</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-truck-monster nav-icon"></i>
                    <p>Prev. Autos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-calendar-check nav-icon"></i>
                    <p>Grande Paradas</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- CALENDÁRIO FIM -->

            <!-- ANÁLISE DE ÓLEO -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">

                <i class="nav-icon fas fa-oil-can"></i>
                <p>
                  Análise de Óleo
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">

                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Detalhamento</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Custos</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Custos</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- ANALISE DE ÓLEO FIM -->

            <!-- CUSTOS $ -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">
                <i class="nav-icon fas fa-donate"></i>
                <p>
                  Custos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">

                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Detalhamento</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Custos</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Custos</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- CUSTOS $ FIM -->

            <!-- Linha -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>

            <!-- P.A integrado -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">
                <i class=""></i>
                <i class="nav-icon fas fa-check-double"></i>
                <p>
                  P.A Integrado
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">

                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Detalhamento</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Custos</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Custos</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- P.A FIM -->

            <!-- Indicadores -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                  Indicadores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Detalhamento</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Custos</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Custos</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- Indicadores FIM -->

            <!-- Boletim -->
            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">
                <i class=""></i>
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Boletins Diários

                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">

                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Industrial</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="" class="nav-link">

                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Automotivo</p>
                  </a>
                </li>
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                  <i class="fas fa-cloud-upload-alt nav-icon"></i>
                  <p>Inserir Custos</p>
                </a>
              </li>';
                  echo '
              <li class="nav-item">
                <a href="?pag=" class="nav-link">
                
                  <i class="fas fa-trash-alt nav-icon"></i>
                  <p>Deletar Custos</p>
                </a>
              </li>';
                }
                ?>

              </ul>

            </li>
            <!-- Boletim FIM -->

            <!-- Linha -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>

            <li class="nav-item menu-look">
              <a class="nav-link" style="margin-left: -10px;">

                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Controle de Usuários
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php
                //esta linha bloqueia caso o usúario não seja nível 1 adm
                if ($_SESSION['adm'] == 1) {
                  echo '<li class="nav-item">
                      <a href="?pag=usuarios" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>Lista Usuários</p>
                      </a>
                    </li>';
                  echo '<li class="nav-item">
                      <a href="?pag=addUsuarios" class="nav-link">                      
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Add Usuários</p>
                      </a>
                    </li>';
                }
                ?>

                    <li class="nav-item">
                      <a href="?pag=alterarSenha&id=<?php echo $_SESSION['id'] ?>" class="nav-link">                      
                      <i class="nav-icon fas fa-unlock-alt"></i>
                        <p>Alterar Senha</p>
                      </a>
                    </li>
              </ul>

            </li>



          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5 class="m-0 text-dark">

              </h5>

            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="#">Sair</a></li> -->

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?php

        $url = '';
        if (isset($_GET['pag'])) {
          $url = $_GET['pag']; // pega a string depois do dominio
        }
        //echo '_______X  ' . $url;
        // $url = explode('/', $url);
        // $x = count($url);
        // echo '<br>';
        // echo '_______' . $x;

        if ($url == '') {
          include '../app/paginas/home.php';
        }

        if (isset($_GET['pag'])) {

          switch ($_GET['pag']) {
            case 'index':
              include 'index.php';
              break;

                //cases manutenções do SGOS
                    case 'mecanica':
                      include '../app/paginas/sgos/manutencoes/mMecEleInst.php';
                      break;
                    case 'eletrica':
                      include '../app/paginas/sgos/manutencoes/mMecEleInst.php';
                      break;
                    case 'instrumentacao':
                      include '../app/paginas/sgos/manutencoes/mMecEleInst.php';
                      break;
                    case 'lubrificacao':
                      include '../app/paginas/sgos/manutencoes/lubrificacao.php';
                      break;
                    case 'inspecao':
                      include '../app/paginas/sgos/manutencoes/inspecao.php';
                      break;
                    case 'preditiva':
                      include '../app/paginas/sgos/manutencoes/preditiva.php';
                      break;
                    case 'frotas':
                      include '../app/paginas/sgos/manutencoes/frotas.php';
                      break;
                    case 'inserirDados':
                      include '../app/paginas/sgos/importarDados/importarDados.php';
                      break;                      
                    case 'deletarDados':
                      include '../app/paginas/sgos/deletarDados/deletarDados.php';
                      break;
                    case 'deletaMes':
                      include '../app/paginas/sgos/deletarDados/deletaMes.php';
                      break;
                //Fim cases manutenções do SGOS

              //Calendário
              //Calendário Fim

              //Análise de óleo
              //Análise de óleo Fim

              //Custos
              //Custos Fim

              //P.A integrado
              //P.A integrado Fim

              //Indicadores
              //Indicadores Fim

              //users
            
            
            case 'usuarios':
              include '../app/paginas/usuarios/user.php';
              break;
            case 'addUsuarios':
              include '../app/paginas/usuarios/addUsuarios.php';
              break;

            case 'userEdit':
              include '../app/paginas/usuarios/userEdit.php';
              break;

            case 'userDelete':
              include '../app/paginas/usuarios/userDelete.php';
              break;
            case 'alterarSenha':
                include '../app/paginas/usuarios/alterarSenha.php';
                break;
              //user fim


            default:
              include '../app/paginas/404.php';
              break;
          }
        } else //if (!file_exists($_GET['pag'])) 
        {
          //include '../app/pags/404.php';
        }




        ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">

        <h5 class="card-title">Informações do usuário:</h5><br>
        <?php
        echo 'Bem vindo ' . ($_SESSION['nome']);
        echo '<br>';
        echo 'Seu #ID: ' . ($_SESSION['id']);
        echo '<br>';

        if ($_SESSION['adm'] == 1) {
          echo 'Usuario Administrador';
        } else {
          echo 'Usuario Padrão';
        }

        ?>
        <br>
        <br>
        <h5>Side Bar</h5>
        <hr style="background-color:lightgrey ">
        <form action="backend/usuarioBackend/alteraSide.php" method="post">
          <div class="d-flex">
            <div class="d-flex flex-wrap mb-3">

              <input type="text" name="user" hidden value="<?php echo ($_SESSION['id']); ?>">

              <button type="submit" name="side" value="indigo" class="btn btn-block bg-gradient-indigo btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="side" value="purple" class="btn btn-block bg-gradient-purple btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="side" value="navy" class="btn btn-block bg-gradient-navy btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="side" value="gray-dark" class="btn btn-block bg-gradient-gray-dark btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="side" value="" class="bg-dark btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px;"></button>


            </div>
          </div>
        </form>


        <h5>Nav Bar</h5>
        <hr style="background-color:lightgrey ">
        <form action="backend/usuarioBackend/alteraNav.php" method="post">
          <div class="d-flex">
            <div class="d-flex flex-wrap mb-3">

              <input type="text" name="user" hidden value="<?php echo ($_SESSION['id']); ?>">

              <button type="submit" name="nav" value="primary" class="btn btn-block bg-gradient-primary btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="secondary" class="btn btn-block bg-gradient-secondary btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="info" class="btn btn-block bg-gradient-info btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="pink" class="btn btn-block bg-gradient-pink btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="warning" class="btn btn-block bg-gradient-warning btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="orange" class="btn btn-block bg-gradient-orange btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>

              <button type="submit" name="nav" value="indigo" class="btn btn-block bg-gradient-indigo btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="purple" class="btn btn-block bg-gradient-purple btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="navy" class="btn btn-block bg-gradient-navy btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="gray-dark" class="btn btn-block bg-gradient-gray-dark btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
              <button type="submit" name="nav" value="" class="bg-dark btn-sm elevation-2" style="width: 20px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px;"></button>

            </div>
          </div>
        </form>


      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-sm-right d-none d-sm-inline">
        Dev: Jonathan Lemos
      </div>
      <!-- Default to the left -->
      <strong><a href="">PCM-MZBA</a> 2021</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- ChartJS -->
  <script src="./plugins/chart.js/Chart.min.js"></script>

</body>

</html>