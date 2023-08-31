<!DOCTYPE html>
<html>
<head>
	<?php
	include_once (__DIR__ ."./../bootstrap.php"); 
	include_once(__DIR__ . "./../backend/utils/dbConnection.php");


	
	$activeSesion;
	$isSessionActive;
	$urlImagen;

	if(isset($_SESSION['rolUser']) && isset($_SESSION['AUTH'])){
		$imagenCodificada;
		$activeSesion = $_SESSION['AUTH'];
		if($_SESSION['rolUser'] == 'maestro'){
			$isSessionActive = 1;
			$imagenCodificada = base64_encode($activeSesion["picture_userInstructor"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
		}else if($_SESSION['rolUser'] == 'alumno'){
			$isSessionActive = 2;
			$imagenCodificada = base64_encode($activeSesion["picture_userestudiante"]);
			$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
		}else if($_SESSION['rolUser'] == 'admin'){
			$isSessionActive = 3;
		}
		

		
	}else{
		$isSessionActive = 0;
	}

	$db = new dbConnection();
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
	<div class="sidebar">
		<div class="logo-details">
			<img src="./img/Learn-Hub_Figura.png" class="imgSideBar">
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
					<form action="../views/dashboard.php">
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
				<?php
					if($isSessionActive != 0 && $isSessionActive != 3){
					
				?>
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
					<form action="./views/myProfile.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-user'></i>
							<span class="link_name">Mi Perfil</span>
						</button>
					</form>					
				</li>

				<?php
					}
					if($isSessionActive === 3){
				?>
				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-user'></i>
							<span class="link_name">Usuarios</span>
						</button>
					</form>					
				</li>

				<li>
					<form action="../index.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-chat'></i>
							<span class="link_name">Comentarios</span>
						</button>
					</form>
					
				</li>

				<li>
					<form action="../views/myProfile.php">
						<button type="submit" class="bg-dark border-0">
							<i class='bx bxs-report'></i>
							<span class="link_name">Reportes</span>
						</button>
					</form>					
				</li>
				<?php
					}

					if($isSessionActive === 0){					
				?>
				<li>			
					<div class="profile-details">
						<div class="profile-content">
							<img src="./img/profilePicture.png" alt="FotoDePerfil">
						</div>				
						<div class="name-job">
							<div class="profile_name">Usuario</div>
							<div class="rol"> Sin Iniciar Sesión</div>
						</div>
						<form action="./views/login.php">
							<button type="submit" class="bg-dark-x border-0">
								<i class='bx logout bxs-log-in'></i>
							</button>						
						</form>
						
					</div>
				</li>
				<?php
					}else if($isSessionActive === 1){				
				?>
				<li>			
					<div class="profile-details">
						<div class="profile-content">
							<img src="<?php echo $urlImagen;?>" alt="FotoDePerfil">
						</div>				
						<div class="name-job">
							<div class="profile_name"><?php echo $activeSesion["name_userInstructor"]; ?></div>
							<div class="rol">Profesor</div>
						</div>
						<form action="./backend/controllers/closeSession.php">
							<button type="submit" class="bg-dark-x border-0">
								<i class='bx logout bxs-log-out'></i>
							</button>						
						</form>
						
					</div>
				</li>
				<?php
					}else if($isSessionActive === 2){					
				?>
				<li>			
					<div class="profile-details">
						<div class="profile-content">
							<img src="<?php echo $urlImagen ?>" alt="FotoDePerfil">
						</div>				
						<div class="name-job">
							<div class="profile_name"><?php echo $activeSesion["name_userestudiante"];//NOMBRE DEL ALUMNO ?></div>
							<div class="rol">Alumno</div>
						</div>
						<form action="./backend/controllers/closeSession.php">
							<button type="submit" class="bg-dark-x border-0">
								<i class='bx logout bxs-log-out'></i>
							</button>						
						</form>
						
					</div>
				</li>
				<?php
					}else if($isSessionActive === 3){					
				?>
				<li>			
					<div class="profile-details">
						<div class="profile-content">
							<img src="./img/profilePicture.png" alt="FotoDePerfil">
						</div>				
						<div class="name-job">
							<div class="profile_name"><?php echo "ADMIN";//NOMBRE DEL ALUMNO ?></div>
							<div class="rol">Admin</div>
						</div>
						<form action="./backend/controllers/closeSession.php">
							<button type="submit" class="bg-dark-x border-0">
								<i class='bx logout bxs-log-out'></i>
							</button>						
						</form>
						
					</div>
				</li>
				<?php
					}
				?>
			</ul>
	</div>

	<section class="home-selection">
		<div class="home-content">
			<i class="bx bx-menu"></i>
			<span class="text">Bienvenido</span>
		</div>
	</section>	


<section class="dashboard-main">
  <section class="container d-flex flex-column">
    <h2>Últimos Cursos Agregados</h2>
    <div id="carousel-1" class="carousel slide d-none d-sm-block" data-ride="carousel">      
      <div class="carousel-inner">
        <div class="carousel-item active">
        	<div class="cards-wrapper">

        		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 1">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 1</h5>
              				<p class="card-text">Descripción breve del curso 1</p>
            			</div>
          		</div>        	
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 2">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 2</h5>
              				<p class="card-text">Descripción breve del curso 2</p>
            			</div>
          		</div>
        		
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>

          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>
        		
        <!-- Añade más elementos según el número de elementos en el carrusel -->
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

    <!-- Añade los carruseles restantes aquí, siguiendo la estructura del ejemplo anterior -->

    <br>
    <h2>Cursos con más me gusta</h2>
    <div id="carousel-2" class="carousel slide" data-ride="carousel">
      <!-- Añade el código del carrusel aquí, siguiendo la estructura del ejemplo anterior -->
      <div class="carousel-inner">
        <div class="carousel-item active">
        	<div class="cards-wrapper">

        		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 1">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 1</h5>
              				<p class="card-text">Descripción breve del curso 1</p>
            			</div>
          		</div>        	
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 2">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 2</h5>
              				<p class="card-text">Descripción breve del curso 2</p>
            			</div>
          		</div>
        		
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>

          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>
        		
        <!-- Añade más elementos según el número de elementos en el carrusel -->
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
    <h2>Cursos con más ventas</h2>
    <div id="carousel-3" class="carousel slide" data-ride="carousel">
      <!-- Añade el código del carrusel aquí, siguiendo la estructura del ejemplo anterior -->
      <div class="carousel-inner">
        <div class="carousel-item active">
        	<div class="cards-wrapper">

        		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 1">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 1</h5>
              				<p class="card-text">Descripción breve del curso 1</p>
            			</div>
          		</div>        	
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 2">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 2</h5>
              				<p class="card-text">Descripción breve del curso 2</p>
            			</div>
          		</div>
        		
        		
          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>

          		<div class="card bg-dark">
            		<img src="./img/Learn-Hub_Figura.png" class="card-img-top img-fluid" alt="Imagen del curso 3">
            			<div class="card-body">
              				<h5 class="card-title">Los Recientes 3</h5>
              				<p class="card-text">Descripción breve del curso 3</p>
            			</div>
          		</div>
        		
        <!-- Añade más elementos según el número de elementos en el carrusel -->
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



	

	<script type="text/javascript" src="./scripts/scriptDashboard.js"></script>

</body>
</html>