<!DOCTYPE html>
<html>
<head>
	<?php  
	include_once (__DIR__ ."./../bootstrap.php");
	include_once(__DIR__ . "./../backend/utils/dbConnection.php");

	$activeSesion;
	$isSessionActive;
	$urlImagen;
	$gender;

	session_start();
	if(isset($_SESSION['rolUser']) && isset($_SESSION['AUTH'])){
		$imagenCodificada;
		$activeSesion = $_SESSION['AUTH'];
		if($_SESSION['rolUser'] == 'maestro'){
			$isSessionActive = 1;
			$imagenCodificada = base64_encode($activeSesion["picture_userInstructor"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
			$gender = $activeSesion['gender_userInstructor'];
		}else if($_SESSION['rolUser'] == 'alumno'){
			$isSessionActive = 2;
			$imagenCodificada = base64_encode($activeSesion["picture_userestudiante"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
			$gender = $activeSesion['gender_userestudiante'];
		}



	}else{
		$isSessionActive = 0;
	} 


	
	?>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../css/stylesMyProfile.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>



    <title>Learn-Hub</title>
    

</head>
<body class="bg-dark">
	<div class="sidebar">
		<div class="logo-details">
			<img src="./../img/Learn-Hub_Figura.png" class="imgSideBar">
			<span class="logo_name">Learn-Hub</span>
		</div>
			<ul class="nav-links">
				<li>
					<form action="">
						<div class="buscar">
							<input type="text" name="search" placeholder="Buscar">
							<button type="submit">
								<i class="bx bxs-search"></i>
							</button>
						</div>
					</form>					
				</li>

				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0 boton">
							<i class='bx bxs-home'></i>
							<span class="link_name">Inicio</span>
						</button>
					</form>					
				</li>

				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-category-alt'></i>
							<span class="link_name">Categorias</span>
						</button>
					</form>
					
				</li>

				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-book-content'></i>
							<span class="link_name">Mis Cursos</span>
						</button>
					</form>
					
				</li>

				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-chat'></i>
							<span class="link_name">Chats</span>
						</button>
					</form>
					
				</li>

				<li>
					<form action="../views/myProfile.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-user'></i>
							<span class="link_name">Mi Perfil</span>
						</button>
					</form>
					
				</li>


				<li>			
					<div class="profile-details">
						<div class="profile-content">
							<img src="<?php echo $urlImagen;?>" alt="FotoDePerfil">
						</div>				
						<div class="name-job">
							<?php
								if($isSessionActive == 1){			
							?>
							<div class="profile_name"><?php echo $activeSesion["name_userInstructor"]; ?></div>
							<div class="rol">Profesor</div>
							<?php
								}else{								
							?>
							<div class="profile_name"><?php echo $activeSesion["name_userestudiante"]; ?></div>
							<div class="rol">Alumno</div>
							<?php
								}
							?>
						</div>
						<form action="../backend/controllers/closeSession.php">
							<button type="submit" class="bg-dark-x border-0">
								<i class='bx logout bxs-log-out'></i>
							</button>						
						</form>
						
					</div>
				</li>

			</ul>
	</div>

	<section class="home-selection">
		<div class="home-content">
			<i class="bx bx-menu"></i>
			<span class="text">Mi Perfil</span>
		</div>
	</section>	

<?php
if($isSessionActive == 1){
?>

<section class="profile-main">
		<div class="container ">
			<div class="profile">
				<div class="centered-content">
					<img class="image" src="<?php echo $urlImagen;?>">
					<h3><?php echo $activeSesion["name_userInstructor"]; ?></h3>
				</div>				
				
				<form id="updateProfile" action="#" method="post" enctype="multipart/form-data">
					<div class="flex">
						<div class="inputBox">

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelName">Nombre</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelLastName">Apellido</label>
							</div>


							<div class="mb-1 input-group">

  								<input type="text" aria-label="First name" placeholder="Ingresa tu Nombre" class="form-control bg-dark-x text-light border-0" id="nameInput" onkeypress="validarSoloLetras()" value="<?php echo $activeSesion["name_userInstructor"]; ?>">
  								<input type="text" aria-label="Last name" placeholder="Ingresa tu Apellido" class="form-control bg-dark-x text-light border-0 " id="lastNameInput" onkeyup="validarSoloLetras()" value="<?php echo $activeSesion["lastname_userInstructor"]; ?>"> 

							</div>

							<span id="textWarningName" class="font-weight-bold mb-2 colorWarning"></span>
							<br>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelGender">Género</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelBirthday">Fecha de Nacimiento</label>
							</div>

							
							<div class="mb-1 input-group ">
								<?php //AQUI VA LA LOGICA PARA SELECCIONAR EL GENERO DE LA PERSONA
									if($gender == 'Hombre'){?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre" selected>Hombre</option>
    										<option value="Mujer">Mujer</option>
    										<option value="Otro">Otro</option>
  										</select>

								<?php
									}else if($gender == 'Mujer'){?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre">Hombre</option>
    										<option value="Mujer" selected>Mujer</option>
    										<option value="Otro">Otro</option>
  										</select>
								<?php
									}else{?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre">Hombre</option>
    										<option value="Mujer">Mujer</option>
    										<option value="Otro" selected>Otro</option>
  										</select>
								<?php
									}
								?>

  								<input type="date" value="<?php echo $activeSesion["birthday_userInstructor"]; ?>"   class="form-control form__input bg-dark-x text-light border-0 " id="inputDate" aria-describedby="emailHelp" required>  								
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
    								<input type="file"   class="custom-file-input full-width" id="foto" accept=".jpg,.jpeg,.png" >
  								</div>
							</div>

							  							
							<span id="textWarningFile" class="font-weight-bold mb-2 colorWarning"></span>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelEmail">Correo</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Contraseña</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Confirmar Contraseña</label>
							</div>

							<div class="mb-4 input-group">
    							
    							<input type="email" class="form-control bg-dark-x text-light border-0  emailText" placeholder="Ingresa tu Correo" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $activeSesion["email_userInstructor"]; ?>" >
    							
    								<input type="password" class="form-control bg-dark-x text-light border-0 passText" placeholder="Ingresa tu Contraseña" id="inputPass" value="" >
    								<input type="password" class="form-control bg-dark-x text-light border-0 passText"  placeholder="Confirma tu Contraseña" id="inputPassConfirm" value="" >   								

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
  								<button id="cancelBtn" class="btn btn-danger">Cancelar</button>
								<button type="submit" id="nextBtn" class="btn btn-primary">Actualizar Perfil</button>

  							</div>
  							

						</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</section>

<?php
}else{
?>

<section class="profile-main">
		<div class="container ">
			<div class="profile">
				<div class="centered-content">
					<img class="image" src="<?php echo $urlImagen;?>">
					<h3><?php echo $activeSesion["name_userestudiante"]; ?></h3>
				</div>				
				
				<form id="updateProfile" action="#" method="post" enctype="multipart/form-data">
					<div class="flex">
						<div class="inputBox">

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelName">Nombre</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelLastName">Apellido</label>
							</div>


							<div class="mb-1 input-group">

  								<input type="text" aria-label="First name" placeholder="Ingresa tu Nombre" class="form-control bg-dark-x text-light border-0" id="nameInput" onkeypress="validarSoloLetras()" value="<?php echo $activeSesion["name_userestudiante"]; ?>">
  								<input type="text" aria-label="Last name" placeholder="Ingresa tu Apellido" class="form-control bg-dark-x text-light border-0 " id="lastNameInput" onkeyup="validarSoloLetras()" value="<?php echo $activeSesion["lastname_userestudiante"]; ?>"> 

							</div>

							<span id="textWarningName" class="font-weight-bold mb-2 colorWarning"></span>
							<br>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelGender">Género</label>
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelBirthday">Fecha de Nacimiento</label>
							</div>

							
							<div class="mb-1 input-group ">
								<?php //AQUI VA LA LOGICA PARA SELECCIONAR EL GENERO DE LA PERSONA
									if($gender == 'Hombre'){?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre" selected>Hombre</option>
    										<option value="Mujer">Mujer</option>
    										<option value="Otro">Otro</option>
  										</select>

								<?php
									}else if($gender == 'Mujer'){?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre">Hombre</option>
    										<option value="Mujer" selected>Mujer</option>
    										<option value="Otro">Otro</option>
  										</select>
								<?php
									}else{?>
										<select  class="form-select bg-dark-x text-light border-0" id="inputSelect" required>
    										<option id="optionDisabled" value="0" disabled >Elige una opción...</option>
    										<option value="Hombre">Hombre</option>
    										<option value="Mujer">Mujer</option>
    										<option value="Otro" selected>Otro</option>
  										</select>
								<?php
									}
								?>

  								<input type="date" value="<?php echo $activeSesion["birthday_userestudiante"]; ?>"   class="form-control form__input bg-dark-x text-light border-0 " id="inputDate" aria-describedby="emailHelp" required>  								
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
    								<input type="file"   class="custom-file-input full-width" id="foto" accept=".jpg,.jpeg,.png" required>
  								</div>
							</div>

							  							
							<span id="textWarningFile" class="font-weight-bold mb-2 colorWarning"></span>

							<div class="label">
								<label for="exampleInputEmail1" class="form-label font-weight-bold labelEmail">Correo</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Contraseña</label>
								<label for="exampleInputPassword1" class="form-label font-weight-bold labelPass">Confirmar Contraseña</label>
							</div>

							<div class="mb-4 input-group">
    							
    							<input type="email" class="form-control bg-dark-x text-light border-0  emailText" placeholder="Ingresa tu Correo" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $activeSesion["email_userestudiante"]; ?>" >
    							
    								<input type="password" class="form-control bg-dark-x text-light border-0 passText" placeholder="Ingresa tu Contraseña" id="inputPass" value="" >
    								<input type="password" class="form-control bg-dark-x text-light border-0 passText"  placeholder="Confirma tu Contraseña" id="inputPassConfirm" value="" >
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
  								<button id="cancelBtn" class="btn btn-danger">Cancelar</button>
								<button type="submit" id="nextBtn" class="btn btn-primary">Actualizar Perfil</button>

  							</div>
  							

						</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</section>
<?php
}
?>
	<script type="text/javascript" src="./../scripts/scriptProfile.js"></script>

</body>
</html>