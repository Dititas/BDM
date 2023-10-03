<!DOCTYPE html>
<html>

<head>
	<?php include_once(__DIR__ . "./../bootstrap.php"); ?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	
	<link rel="stylesheet" type="text/css" href="./../css/styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>
<title>Sign Up</title>
</head>

<body class="bg-dark vh-100">
	<section class="h-100">
		<div class="row g-0 d-flex align-items-center h-100">
			<div class="col-lg-7 d-none d-lg-block ">
				<div id="carouselExampleCaptions" class="carousel slide">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner">
						<div class="carousel-item img-1 min-vh-100 active ">

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

			<div class="col-lg-5  d-flex flex-column ">
				<div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 text-center">
					<img src="./../img/logo.jpg" class="img-fluid" width="200" height="200">
				</div>
				<div class="mx-lg-4 py-lg-4 p-5">
					<h1 class="font-weight-bold text-center mb-4">Registrarse</h1>

					<form class="mb-5" method="post" action="login.php" id="registerForm" enctype="multipart/form-data">

						<label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre y Apellido</label>
						<div class="mb-1 input-group">

							<input type="text" aria-label="First name" placeholder="Ingresa tu Nombre" class="form-control bg-dark-x text-light border-0" id="nameInput">
							<input type="text" aria-label="Last name" placeholder="Ingresa tu Apellido" class="form-control bg-dark-x text-light border-0 " id="lastNameInput">
						</div>

						<span id="textWarningName" class="font-weight-bold mb-2 colorWarning"></span>
						<br>

						<label for="exampleInputEmail1" class="form-label font-weight-bold">Género</label>
						<div class="mb-2 input-group ">
							<select class="form-select bg-dark-x text-light border-0" id="inputSelect">
								<option value="0" selected>Elige una opción...</option>
								<option value="Hombre">Hombre</option>
								<option value="Mujer">Mujer</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
						<span id="textWarningSelect" class="font-weight-bold mb-2 colorWarning"></span>

						<div class="mb-4 ">
							<label for="exampleInputEmail1" class="form-label font-weight-bold">Fecha de Nacimiento</label>
							<input type="date" class="form-control form__input bg-dark-x text-light border-0 " id="inputDate" aria-describedby="emailHelp">
						</div>
						<span id="textWarningDate" class="font-weight-bold mb-2 colorWarning"></span>

						<div class="mb-4">
							<label for="formFile" class="">Subir Imagen</label>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto" accept="image/*">
								</div>
							</div>
						</div>
						<span id="textWarningFile" class="font-weight-bold colorWarning mb-2"></span>


						<div class="mb-4">
							<label for="exampleInputEmail1" class="form-label font-weight-bold">Correo</label>
							<input type="email" class="form-control bg-dark-x text-light border-0 mb-1 emailText" placeholder="Ingresa tu Correo" id="inputEmail" aria-describedby="emailHelp">
							<span id="textWarningEmail" class="font-weight-bold colorWarning mb-2"></span>
						</div>

						<label for="exampleInputEmail1" class="form-label font-weight-bold">Usuario y Contraseña</label>
						<div class="mb-1 input-group">
							<input type="text" aria-label="Username" placeholder="Ingresa tu Usuario" class="form-control bg-dark-x text-light border-0" id="inputUsuario">
							<input type="password" aria-label="Password" placeholder="Ingresa tu Contraseña" class="form-control bg-dark-x text-light border-0 " id="inputPass">
						</div>
						<span id="textWarningUsuario" class="font-weight-bold colorWarning mb-2"></span>
						<span id="textWarningPass" class="font-weight-bold colorWarning mb-2"></span>

						<label for="exampleInputEmail1" class="form-label font-weight-bold">Rol</label>
						<div class="mb-2 input-group ">
							<select class="form-select bg-dark-x text-light border-0" id="inputSelectRol">
								<option value="0" selected>Elige una opción...</option>
								<option value="seller">Vendedor</option>
								<option value="buyer">Comprador</option>
							</select>
						</div>
						<span id="textWarningSelectRol" class="font-weight-bold mb-4 colorWarning"></span>

						<div class="changePassword mt-2">
								<label class="custom-checkbox">
									<input type="checkbox" id="checkbox" onchange="toggleInput()">
									<span class="checkmark"></span>
									¿Perfil Público?
								</label>
							</div>

						<button type="submit" id="nextBtn" class="btn btn-primary w-100 mt-3" data-toggle="modal" data-target="#myModal">Registrarse</button>

					</form>

					<!-- <p class="font-weight-bold texted-center text-muted">O Registrate con</p>
					<div class="d-flex justify-content-around">
						<button type="button" class="btn btn-outline-light flex-grow-1 mx-2"><i class="fa-brands fa-google lead mx-2"></i>Google</button>
						<button type="button" class="btn btn-outline-light flex-grow-1 mx-2"><i class="fa-brands fa-facebook lead mx-2"></i>Facebook</button>
					</div> -->
				</div>

				<div>
					<div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4">
						<p class="d-inline-block mb-0">
							¿Ya tienes una cuenta? <a href="login.php" class="text-light font-weight-bold text-decoration-none">Inicia sesión aquí</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	

	<script type="text/javascript" src="./../scripts/scriptSignIn.js"></script>

</body>

</html>