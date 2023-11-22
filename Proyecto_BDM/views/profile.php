<!DOCTYPE html>
<html lang="en">

<head>

	<?php

	include_once(__DIR__ . "./../bootstrap.php");
	session_start();
	if (isset($_SESSION["AUTH"])) {
		$userInfo = $_SESSION["AUTH"];
		$perfil = 'vendedor';
		$imagenCodificada = base64_encode($userInfo["user_image"]);
		$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
	} else {
		$userInfo = "";
	}

	?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="./../css/stylesMyProfile.css">


	<title><?php echo $userInfo['user_userName']; ?> | Bytes & Bites</title>


</head>

<body class="bg-dark">
	<?php include_once(__DIR__ . "././sidebar.php");   ?>

	<section class="home-selection">
		<div class="home-content">
			<i class="bx bx-menu"></i>
		</div>
	</section>
	<section class="profile-main">
		<div class="container d-flex align-items-center ">
			<div id="updateProfile" class="profile update-profile container d-flex flex-column">
				<div class="centered-content col-8">
					<img class="image" src="<?php echo $urlImagen; ?>">
					<h1><?php echo $userInfo['user_userName']; ?></h1>
				</div>

				<?php switch ($perfil) {
					case 'privado': ?>
						<!-- PRIVADO -->
						<div class="container flex-column justify-content-center h-75">
							<div class="d-flex justify-content-center w-100 ">
								<i style="font-size: 250px;" class='bx bx-lock-alt bx-tada'></i>
							</div>
							<div>
								<h4>Usuario Privado</h4>
							</div>

						</div>
					<?php
						break;
					case 'vendedor':
					?>
						<!-- VENDEDOR -->
						<div class="container vh-100">
							<!-- Gallery -->
							<div class="row">
								<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
									<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Boat on Calm Water" />

									<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Wintry Mountain Landscape" />
								</div>

								<div class="col-lg-4 mb-4 mb-lg-0">
									<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Mountains in the Clouds" />

									<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Boat on Calm Water" />
								</div>

								<div class="col-lg-4 mb-4 mb-lg-0">
									<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Waves at Sea" />

									<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Vendedor - Yosemite National Park" />
								</div>
							</div>
							<!-- Gallery -->
						</div>
					<?php
						break;

					case 'comprador': ?>
						<!-- COMPRADOR -->
						<section class="wishlists-container container flex-column">
							<section class="wishlists-header d-flex h-25 w-100 justify-content-between">
								<h2>Mis listas de deseos</h2>
								<button id="addWL" class="btn btn-primary">Agregar</button>
							</section>
							<section class="container mt-3">
								<div class="table-container container flex-column">
									<table class="table table-striped table-hover table-dark">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Imagen</th>
												<th scope="col">Nombre</th>
												<th scope="col">Descripción</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>
													<img src="../img/profilePicture.png" class="card-img-top img-fluid" alt="Imagen del producto 3">
												</td>
												<td>Mi lista #1</td>
												<td>Productos para mis hermanos</td>
												<td>
													<button class="bg-transparent border-0">
														<i class='bx bxs-trash icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-pencil icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-lock-open icon-large'></i>
													</button>
												</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td></td>
												<td>Cosas para la casa</td>
												<td>Productos para conectar la casa con el IoT</td>
												<td>
													<button class="bg-transparent border-0">
														<i class='bx bxs-trash icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-pencil icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-lock-alt icon-large'></i>
													</button>
												</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td></td>
												<td>Por comprar</td>
												<td></td>
												<td>
													<button class="bg-transparent border-0">
														<i class='bx bxs-trash icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-pencil icon-large'></i>
													</button>
													<button class="bg-transparent border-0 ms-3">
														<i class='bx bxs-lock-alt icon-large'></i>
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</section>
						</section>

					<?php
						break;
					default:
					?>
						<p>Perfil no reconocido</p>
				<?php
				}
				?>

			</div>
		</div>
	</section>

	
	<script type="text/javascript" src="./../scripts/scriptSidebar.js"></script>
	<script type="text/javascript" src="./../scripts/scriptProfile.js"></script>

</body>

</html>