<!doctype html>
<html lang="pt-br">
	<head>
		<title>Título do projeto</title>
		<meta name="description" content="Page description"><!-- Max 155 characters -->

		<meta name="robots" content="noindex, nofollow" />
		
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--Dependencies-->
		<link rel="stylesheet" href="dist/css/alldep.min.css" /> 

		<!-- Css Project -->
		<link rel="stylesheet" href="dist/css/style.css" />

		<!--Tag Hotjar-->

		<!--Tag Analytics-->
	</head>
	<body class="page-login">
		
		<div class="section-login">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<img src="dist/img/logo.png" srcset="dist/img/logo@2x.png 2x" alt="" />
						<h1>Entrar</h1>
						<form action="dashboard.html">
							<div class="form-group">
								<div class="input-group input-group--border-rounded">
									<div class="input-group-prepend">
										<span class="input-group-text" id="login_id_username"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="login_id_username">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group--border-rounded">
									<div class="input-group-prepend">
										<span class="input-group-text" id="login_id_pass"><i class="fas fa-key"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="login_id_pass">
								</div>
							</div>
							<div class="text-right">
								<a href="#" class="section-login__forgot">Esqueceu a senha?</a>
							</div>
							<button onclick="location.href='dashboard.html';" type="submit" class="btn btn-primary btn-block rounded-pill">ENTRAR</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Script Project -->
		<script src="dist/js/alldep.min.js" crossorigin="anonymous"></script>
		<script src="dist/js/scripts.js" crossorigin="anonymous"></script>
	</body>
</html>