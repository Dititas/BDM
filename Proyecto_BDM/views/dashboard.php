<!DOCTYPE html>
<html>

<head>
	<?php
	include 'urls.php';
	include_once(__DIR__ . "./../bootstrap.php");

	$activeSesion;
	$isSessionActive;
	$urlImagen;

	if (isset($_SESSION['rolUser']) && isset($_SESSION['AUTH'])) {
		$imagenCodificada;
		$activeSesion = $_SESSION['AUTH'];
		echo $activeSesion;
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

	<title>Bytes & Bites</title>

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
			<h2>Últimos Productos</h2>
			<div id="carouselLastProducts" class="carousel" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos.jfif" class="d-block w-100" alt="Imagen del producto 1">
							</div>
							<div class="card-body">
								<h5 class="card-title">Audifonos</h5>
								<p class="card-text">Alta calidad de audio</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos2.jfif" class="d-block w-100" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos bluetooth</h5>
								<p class="card-text">Dura la pila hasta 30 horas</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos2.jfif" class="d-block w-100" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos bluetooth</h5>
								<p class="card-text">Dura la pila hasta 30 horas</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos2.jfif" class="d-block w-100" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos bluetooth</h5>
								<p class="card-text">Dura la pila hasta 30 horas</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/keyboard2.jfif" class="d-block w-100" alt="Imagen del producto 3">
							</div>
							<div class="card-body">
								<h5 class="card-title">Teclado</h5>
								<p class="card-text">Teclado para computadora</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/cargador.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Cargador</h5>
								<p class="card-text">Cargador de laptop Lenovo</p>
							</div>
						</div>
					</div>




				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselLastProducts" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselLastProducts" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<br>
			<h2>Recomendados</h2>
			<div id="carouselRecommended" class="carousel" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/keyboard.jfif" class="card-img-top img-fluid" alt="Imagen del producto 1">
							</div>

							<div class="card-body">
								<h5 class="card-title">Teclado</h5>
								<p class="card-text">Teclado RGB</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse gamer para PC</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse gamer para PC</p>
							</div>
						</div>
					</div>


					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse con luces RGB</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos</h5>
								<p class="card-text">Audífonos de diadema</p>
							</div>
						</div>

					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse con luces RGB</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos</h5>
								<p class="card-text">Audífonos de diadema</p>
							</div>
						</div>

					</div>

				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselRecommended" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselRecommended" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>

			<br>
			<h2>Más Vendidos</h2>
			<div id="carouselMostSelled" class="carousel" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card bg-dark">
							<div>
								<div class="img-wrapper">
									<img src="./img/laptop.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
								</div>


							</div>
							<div class="card-body">
								<h5 class="card-title">Laptop</h5>
								<p class="card-text">Laptop HP</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse gamer para PC</p>
							</div>
						</div>
					</div>


					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/mouse2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Mouse</h5>
								<p class="card-text">Mouse con luces RGB</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/audifonos3.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Audífonos</h5>
								<p class="card-text">Audífonos de diadema</p>
							</div>
						</div>

					</div>
					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/printer.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
							</div>

							<div class="card-body">
								<h5 class="card-title">Impresora</h5>
								<p class="card-text">Impresora láser</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/printer2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Impresora</h5>
								<p class="card-text">Impresora a color</p>
							</div>
						</div>
					</div>

					<div class="carousel-item">
						<div class="card bg-dark">
							<div class="img-wrapper">
								<img src="./img/laptop2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
							</div>

							<div class="card-body">
								<h5 class="card-title">Laptop</h5>
								<p class="card-text">Laptop 16GB RAM</p>
							</div>
						</div>
					</div>



				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselMostSelled" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselMostSelled" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>

		</section>
	</section>
	<?php

	?>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="./scripts/scriptDashboard.js"></script>

</body>

</html>