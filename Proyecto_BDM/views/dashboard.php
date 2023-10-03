<!DOCTYPE html>
<html>

<head>
	<?php
	include_once(__DIR__ . "./../bootstrap.php");

	$activeSesion;
	$isSessionActive;
	$urlImagen;

	if (isset($_SESSION['rolUser']) && isset($_SESSION['AUTH'])) {
		$imagenCodificada;
		$activeSesion = $_SESSION['AUTH'];
		if ($_SESSION['rolUser'] == 'maestro') {
			$isSessionActive = 1;
			$imagenCodificada = base64_encode($activeSesion["picture_userInstructor"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
		} else if ($_SESSION['rolUser'] == 'alumno') {
			$isSessionActive = 2;
			$imagenCodificada = base64_encode($activeSesion["picture_userestudiante"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
		} else if ($_SESSION['rolUser'] == 'admin') {
			$isSessionActive = 3;
		}
	} else {
		$isSessionActive = 0;
	}
	?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/stylesDashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>



	<title>Learn-Hub</title>


</head>

<body class="bg-dark">
	<?php include_once(__DIR__ . "././sidebar.php");   ?>
	<section class="home-selection">
		<div class="home-content">
			<i class="bx bx-menu"></i>
			<span class="text">Bienvenido</span>
		</div>
	</section>
	<section class="dashboard-main">
		<section class="container d-flex flex-column">
			<h2>Últimos Productos Agregados</h2>
			<div id="carousel-1" class="carousel slide d-none d-sm-block" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="cards-wrapper">
							<div class="card bg-dark">
								<img src="./img/audifonos.jfif" class="card-img-top img-fluid" alt="Imagen del producto 1">
								<div class="card-body">
									<h5 class="card-title">Audifonos</h5>
									<p class="card-text">Alta calidad de audio</p>
								</div>
							</div>

							<div class="card bg-dark">
								<img src="./img/audifonos2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
								<div class="card-body">
									<h5 class="card-title">Audífonos bluetooth</h5>
									<p class="card-text">Dura la pila hasta 30 horas</p>
								</div>
							</div>
							<div class="card bg-dark">
								<img src="./img/keyboard2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Teclado</h5>
									<p class="card-text">Teclado para computadora</p>
								</div>
							</div>
							<div class="card bg-dark">
								<img src="./img/cargador.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Cargador</h5>
									<p class="card-text">Cargador de laptop Lenovo</p>
								</div>
							</div>

						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>
			<br>
			<h2>Vistos anteriormente</h2>
			<div id="carousel-2" class="carousel slide d-none d-sm-block" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="cards-wrapper">

							<div class="card bg-dark">
								<img src="./img/keyboard.jfif" class="card-img-top img-fluid" alt="Imagen del producto 1">
								<div class="card-body">
									<h5 class="card-title">Teclado</h5>
									<p class="card-text">Teclado RGB</p>
								</div>
							</div>

							<div class="card bg-dark">
								<img src="./img/mouse3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
								<div class="card-body">
									<h5 class="card-title">Mouse</h5>
									<p class="card-text">Mouse gamer para PC</p>
								</div>
							</div>


							<div class="card bg-dark">
								<img src="./img/mouse2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Mouse</h5>
									<p class="card-text">Mouse con luces RGB</p>
								</div>
							</div>

							<div class="card bg-dark">
								<img src="./img/audifonos3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Audífonos</h5>
									<p class="card-text">Audífonos de diadema</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>

			<br>
			<h2>Más Vendidos</h2>
			<div id="carousel-3" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="cards-wrapper">
							<div class="card bg-dark">
								<div>
								<img src="./img/laptop.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">

								</div>
								<div class="card-body">
									<h5 class="card-title">Laptop</h5>
									<p class="card-text">Laptop HP</p>
								</div>
							</div>
							<div class="card bg-dark">
								<img src="./img/printer.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
								<div class="card-body">
									<h5 class="card-title">Impresora</h5>
									<p class="card-text">Impresora láser</p>
								</div>
							</div>
							<div class="card bg-dark">
								<img src="./img/printer2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Impresora</h5>
									<p class="card-text">Impresora a color</p>
								</div>
							</div>

							<div class="card bg-dark">
								<img src="./img/laptop2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								<div class="card-body">
									<h5 class="card-title">Laptop</h5>
									<p class="card-text">Laptop 16GB RAM</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>

		</section>
	</section>


	<script type="text/javascript" src="../scripts/scriptDashboard.js"></script>

</body>

</html>