<!DOCTYPE html>
<html lang="en">

<head>

	<?php

	include_once(__DIR__ . "./../bootstrap.php");
	session_start();
	if (isset($_SESSION["AUTH"])) {
		$userInfo = $_SESSION["AUTH"];
		$imagenCodificada = base64_encode($userInfo["user_image"]);
		$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
	} else {
		$userInfo = "";
	}
	/*$activeSesion;
	$isSessionActive;
	$urlImagen;

	if (isset($_SESSION['AUTH'])) { //isset($_SESSION['rolUser']) && isset($_SESSION['AUTH'])) {
		$imagenCodificada;
		$activeSesion = $_SESSION['AUTH'];
		$userInfo = $_SESSION["AUTH"];
		echo "<pre>";
		print_r($_SESSION["AUTH"]);
		echo "</pre>";
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
	}*/
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


	<title>Mi Perfil</title>


</head>

<body class="bg-dark">
	<?php include_once(__DIR__ . "././sidebar.php");   ?>

	<section class="home-selection">
		<div class="home-content">
			<i class="bx bx-menu"></i>
			<span class="text">Mi Perfil</span>
		</div>
	</section>

	<section class="profile-main">
		<div class="container d-flex align-items-center ">
			<div id="updateProfile" class="profile update-profile container d-flex flex-column">
				<div class="centered-content col-8">
					<img class="image" src="<?php echo $urlImagen; ?>">
					<h3></h3>
				</div>

				<form id="updateProfile" class="col-8 mt-5" action="#" method="post" enctype="multipart/form-data">
					<div class="flex">
						<div class="inputBox">

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelName">Nombre</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelLastName">Apellido</label>
							</div>


							<div class="mb-1 input-group">

								<input type="text" aria-label="First name" placeholder="Ingresa tu Nombre" class="form-control bg-dark-x text-light border-0" id="nameInput" onkeypress="onlyLetters()" value="<?php echo $userInfo["user_name"]; ?>" name="name">
								<input type="text" aria-label="Last name" placeholder="Ingresa tu Apellido" class="form-control bg-dark-x text-light border-0 " id="lastNameInput" onkeyup="onlyLetters()" value="<?php echo $userInfo["user_lastName"]; ?>" name="lastname">

							</div>

							<span id="textWarningName" class="font-weight-bold mb-2 colorWarning"></span>
							<br>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelGender">Género</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelBirthday">Fecha de Nacimiento</label>
							</div>


							<div class="mb-1 input-group ">

								<select class="form-select bg-dark-x text-light border-0" id="inputSelect" name="gender" required>
									<option id="optionDisabled" value="<?php echo $userInfo["user_gender"]; ?>" disabled>Elige una opción...</option>
									<option value="Hombre" selected>Hombre</option>
									<option value="Mujer">Mujer</option>
									<option value="Otro">Otro</option>
								</select>


								<input type="date" value="<?php echo $userInfo["user_birthDate"]; ?>" class="form-control form__input bg-dark-x text-light border-0 " id="inputDate" aria-describedby="emailHelp" required name="birthdate">
							</div>

							<div class="label">
								<span id="textWarningSelect" class="font-weight-bold mb-2 colorWarning"></span>
								<span id="textWarningDate" class="font-weight-bold mb-2 colorWarning"></span>
							</div>


							<div class="label">
								<label for="formFile" class="labelImage">Subir Imagen</label>
							</div>

							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input full-width" id="foto" accept=".jpg,.jpeg,.png">
								</div>
							</div>


							<span id="textWarningFile" class="font-weight-bold mb-2 colorWarning"></span>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelEmail">Correo</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Contraseña</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Confirmar Contraseña</label>
							</div>

							<div class="mb-4 input-group">

								<input type="email" class="form-control bg-dark-x text-light border-0  emailText" placeholder="Ingresa tu Correo" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $userInfo["user_email"]; ?>">

								<input type="password" class="form-control bg-dark-x text-light border-0 passText" placeholder="Ingresa tu Contraseña" id="inputPass" value="">
								<input type="password" class="form-control bg-dark-x text-light border-0 passText" placeholder="Confirma tu Contraseña" id="inputPassConfirm" value="">

							</div>

							<div class="label">
								<span id="textWarningEmail" class="font-weight-bold mb-2 colorWarning"></span>
								<span id="textWarningPass" class="font-weight-bold mb-2 colorWarning"></span>
							</div>

							<div class="changePassword">
								<label class="custom-checkbox">
									<input type="checkbox" id="checkbox" onchange="toggleInput()">
									<span class="checkmark"></span>
									¿Cambiar Contraseña?
								</label>
							</div>

							<div class="centered-content">
								<button id="cancelBtn" class="btn btn-info">Cancelar</button>
								<button type="submit" id="nextBtn" class="btn btn-primary">Actualizar Perfil</button>
								<button type="submit" id="deleteBtn" class="btn btn-danger">Eliminar Cuenta</button>
							</div>


						</div>
					</div>
				</form>
			</div>


		</div>
	</section>

	
	<script type="text/javascript" src="./../scripts/scriptSidebar.js"></script>
	<script type="text/javascript" src="./../scripts/scriptProfile.js"></script>

</body>

</html>