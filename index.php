<?php
session_start();

$printResposta = " ";
if (isset($_SESSION['msg'])) {
	$msgResposta = $_SESSION['msg'];
	unset($_SESSION['msg']);

	if ($msgResposta == "outOk") {
		$printResposta = '<script>alert("Sessão encerrada com sucesso");</script>';
	} elseif ($msgResposta == "notOk") {
		$printResposta = '<script>alert("Usúario ou senha incorretos!");</script>';
	}
}
echo $printResposta;
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
		<link rel="stylesheet" href="./app/plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="./app/dist/css/adminlte.min.css">

		<!-- SweetAlert2 -->
		<link rel="stylesheet" href="./app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
		<!-- Toastr -->
		<link rel="stylesheet" href="./app/plugins/toastr/toastr.min.css">

		<!-- BAR CHART -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<!-- jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


		<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.css' rel='stylesheet' />
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.js'></script>


	</head>
	<meta charset="utf-8">
	<title>Celke - Login</title>
</head>

<body class="hold-transition login-page">

	<div class="login-box">
		<div class="login-logo">
			<img width="300" height="94" src="http://www.curveloonline.com/wp-content/uploads/Logo-Mizu-300x94.png" class="attachment-medium size-medium tie-appear" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px">
			<h5></h5>
		</div>

		<div class="card">


			<div class="card-body login-card-body">
				<p class="login-box-msg"><b>Sistema Integrado de Manuteções</b></p>

				<form method="POST" action="./login/valida.php">

					<div class="input-group mb-3">
						<!-- <input type="email" class="form-control" placeholder="Email"> -->
						<input type="email" name="usuario" class="form-control" placeholder="Digite o seu usuário">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>

					<div class="input-group mb-3">
						<input type="password" name="senha" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						
						<!-- /.col -->
						<div class="col-4">
							<input type="submit" class="btn btn-block btn-outline-success" name="btnLogin" value="Acessar">							
						</div>
						<!-- /.col -->
						<a href="./login/cadastrar.php" class="text-center">Cadastre-se</a>
					</div>

				</form>
			</div>
			
		</div>

		
		</div>






		<!-- REQUIRED SCRIPTS -->

		<!-- jQuery -->
		<script src="./app/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="./app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="./app/dist/js/adminlte.min.js"></script>
		<!-- ChartJS -->
		<script src="./app/plugins/chart.js/Chart.min.js"></script>

		<!-- SweetAlert2 -->
		<script src="./app/plugins/sweetalert2/sweetalert2.min.js"></script>
		<!-- Toastr -->
		<script src="./app/plugins/toastr/toastr.min.js"></script>


		<!-- AdminLTE for demo purposes -->



	</div>

</body>

</html>