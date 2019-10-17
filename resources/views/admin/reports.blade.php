<!doctype html>
<html lang="pt-br">
	<head>
		<title>Ferrugini</title>
		<meta name="description" content="Page description"><!-- Max 155 characters -->

		<meta name="robots" content="noindex, nofollow" />
		
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--Dependencies-->
		<link rel="stylesheet" href="../dist/css/alldep.min.css" /> 

		<!-- Css Project -->
		<link rel="stylesheet" href="../dist/css/style.css" />

		<!--Tag Hotjar-->

		<!--Tag Analytics-->
	</head>
	<body>

		<div class="menu-bar">
			<h3 class="menu-bar__user">José Silva</h3>
			<div class="menu-bar__item"><a href="collaborator-list.html" class="menu-bar__link"><i class="fas fa-user-tie mr-2"></i>Vendedores</a></div>
			<div class="menu-bar__item"><a href="reports.html" class="menu-bar__link"><i class="fas fa-chart-pie mr-2"></i>Relatórios</a></div>
			<div class="menu-bar__item menu-bar__item--pos-bottom"><a href="config.html" class="menu-bar__link"><i class="fas fa-cog mr-2"></i>Configurações</a></div>
		</div>
		<div class="menu-bar__close"></div>

		<header class="app-header">
			<div class="logged-user">
				<span>Bem-vindo</span>
				<h2>Carlos Ribeiro</h2>
			</div>
			<a href="javascript:void(0)" class="btn btn-icon-primary menu-bar__button"><i class="fas fa-bars"></i></a>
		</header>
		<div class="app-main app-main--grey">
			<h1 class="title-master text-center mt-4">Relatórios</h1>
			<h3 class="title-form-label mt-3">Período</h3>
			<div class="section-full">
				<div class="form-group">
					<label for="">De</label>
					<input class="form-control" type="date" placeholder="DD/MM/AAAA">
				</div>
				<div class="form-group">
					<label for="">Até</label>
					<input class="form-control" type="date" placeholder="DD/MM/AAAA">
				</div>
			</div>
			<h3 class="title-form-label mt-3">Vendedor</h3>
			<div class="section-full">
				<div class="form-group">
					<label for="">Escolha o vendedor</label>
					<select name="" id="" class="form-control">
						<option value="" selected>Todos</option>
						<option value="">Maria José</option>
						<option value="">Carlos Ribeiro</option>
						<option value="">Victor Frossard</option>
						<option value="">João Felix</option>
						<option value="">Mario Afonso</option>
					</select>
				</div>
			</div>
			<a href="single-report.html" class="btn btn-primary rounded-pill text-center d-block mt-4 mb-4">GERAR RELATÓRIO</a>
		</div>
		
		<nav class="app-nav">
			<a href="dashboard.html" class="app-nav__item app-nav__item--active"><i class="fas fa-home"></i>Inicio</a>
			<a href="client-list.html" class="app-nav__item"><i class="fas fa-users"></i>Clientes</a>
			<a href="schedule-list.html" class="app-nav__item"><i class="fas fa-calendar-alt"></i>Agenda</a>
			<a href="notifications.html" class="app-nav__item"><i class="fas fa-bell"><span class="app-nav__item-new">2</span></i>Notificações</a>
			<a href="profile.html" class="app-nav__item"><i class="fas fa-user"></i>Perfil</a>
		</nav>

		<!-- Script Project -->
		<script src="../dist/js/alldep.min.js" crossorigin="anonymous"></script>
		<script src="../dist/js/scripts.js" crossorigin="anonymous"></script>
	</body>
</html>