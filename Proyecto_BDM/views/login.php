<!DOCTYPE html>
<html>

<head>
	<?php include_once(__DIR__ . "./../bootstrap.php"); ?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="./../css/styles.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">

	<title>Login</title>

</head>

<body class="bg-dark">
	<section class="container-fluid">
		<div class="row g-0 d-flex vh-100">
			<div class="d-flex col-lg-7 d-none d-lg-block vh-100">
				<div id="carouselExampleCaptions" class="carousel slide">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner">
						<div class="carousel-item img-1 min-vh-100 active">
							
						</div>
						<div class="carousel-item img-2 min-vh-100 ">
							
						</div>
						<div class="carousel-item img-3 min-vh-100 ">

							
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class=" d-flex col-lg-5  flex-column vh-100">
				<div class="d-flex justify-content-center align-items-center px-lg-5">
					<img src="./../img/logo.jpg" class="" width="250" height="250">
				</div>
				<div class="d-flex flex-column justify-content-center mx-lg-4 py-lg-4 pe-5 ps-5">
					<h1 class="font-weight-bold text-center mb-3">Bienvenido</h1>

					<form class="mb-2" id="loginForm" method="post" action="login.php">
						<div class="mb-4">
							<label for="exampleInputEmail1" class="form-label font-weight-bold">Correo</label>
							<input type="email" class="form-control bg-dark-x text-light border-0 emailText mb-2" placeholder="Ingresa tu Correo" id="emailInput" aria-describedby="emailHelp">
							<span id="textWarningEmail" class="font-weight-bold colorWarning"></span>

						</div>
						<div class="mb-4">
							<label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
							<input type="password" class="form-control bg-dark-x text-light border-0 mb-3 passText" placeholder="Ingresa tu Contraseña" id="passInput">
							<span id="textWarningPass" class="font-weight-bold colorWarning"></span>
						</div>

						<button type="submit" id="nextBtn" class="btn btn-primary w-100 mb-4">Iniciar sesión</button>

					</form>

					<!-- <p class="font-weight-bold texted-center text-muted">O Inicia sesión con</p>
					<div class="d-flex justify-content-around">
						<button type="button" class="btn btn-outline-light flex-grow-1 mx-2"><i class="fa-brands fa-google lead mx-2"></i>Google</button>
						<button type="button" class="btn btn-outline-light flex-grow-1 mx-2"><i class="fa-brands fa-facebook lead mx-2"></i>Facebook</button>
					</div> -->
				</div>

				<div class="d-flex flex-column justify-content-center align-items-center">
					<div class="text-center px-lg-5">
						<p class="d-inline-block mb-0">
							¿No tienes una cuenta? <a href="signIn.php" class="text-light font-weight-bold text-decoration-none">Registrate aquí</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.js" integrity="sha512-kwtW9vT4XIHyDa+WPb1m64Gpe1jCeLQLorYW1tzT5OL2l/5Q7N0hBib/UNH+HFVjWgGzEIfLJt0d8sZTNZYY6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script type="text/javascript" src="./../scripts/scriptLogIn.js"></script>



</body>

</html>