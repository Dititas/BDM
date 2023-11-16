<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <?php
    include_once(__DIR__ . "./../bootstrap.php");
    include_once(__DIR__ . "./../backend/utils/dbConnection.php");
    
	session_start();
	if (isset($_SESSION["AUTH"])) {
		$userInfo = $_SESSION["AUTH"];
		$imagenCodificada = base64_encode($userInfo["user_image"]);
		$urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
	} else {
		$userInfo = "";
	}
    ?>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesMyWishLists.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>


</head>

<body class="bg-dark">
    <?php include_once(__DIR__ . "././sidebar.php");   ?>
    <section class="home-selection">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Categorías</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="container d-flex flex-column container-categories">
            <h3><a href="#">Computación</a></h3>
            <ul class="column-list">
                <li><a href="#">Accesorios de antiestática</a></li>
                <li><a href="#">Accesorios para PC Gaming</a></li>
                <li><a href="#">Almacenamiento</a></li>
                <li><a href="#">Componentes de PC</a></li>
                <li><a href="#">Conectividad y Redes</a></li>
                <li><a href="#">Laptops y accesorios</a></li>
                <li><a href="#">Monitores y pantallas</a></li>
                <li><a href="#">Periféricos de computadora</a></li>
            </ul>
            <hr>
            <h3><a href="#">Consolas y Videojuegos</a></h3>
            <ul class="column-list">
                <li><a href="#">Accesorios para consolas</a></li>
                <li><a href="#">Accesorios para PC Gaming</a></li>
                <li><a href="#">Consolas</a></li>
                <li><a href="#">Maquinitas</a></li>
                <li><a href="#">Repuestos para consolas</a></li>
                <li><a href="#">Videojuegos</a></li>
                <li><a href="#">Joysticks y controladores</a></li>
                <li><a href="#">Realidad virtual</a></li>
            </ul>
            <hr>
            <h3><a href="#">Audio y Video</a></h3>
            <ul class="column-list">
                <li><a href="#">Accesorios para audio y video</a></li>
                <li><a href="#">Accesorios para TV</a></li>
                <li><a href="#">Audio</a></li>
                <li><a href="#">Cables</a></li>
                <li><a href="#">Componentes electrónicos</a></li>
                <li><a href="#">Pilas y cargadores</a></li>
                <li><a href="#">Proyectores y pantallas</a></li>
                <li><a href="#">Sistemas de sonido para el hogar</a></li>
            </ul>
            <hr>
            <h3><a href="#">Teléfonos y Accesorios</a></h3>
            <ul class="column-list">
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Fundas y protectores</a></li>
                <li><a href="#">Auriculares y manos libres</a></li>
                <li><a href="#">Baterías y cargadores</a></li>
                <li><a href="#">Accesorios para relojes inteligentes</a></li>
                <li><a href="#">Tarjetas SIM</a></li>
                <li><a href="#">Adaptadores y cables</a></li>
            </ul>
            <hr>
            <h3><a href="#">Fotografía y Videocámaras</a></h3>
            <ul class="column-list">
                <li><a href="#">Cámaras digitales</a></li>
                <li><a href="#">Lentes y accesorios</a></li>
                <li><a href="#">Trípodes y soportes</a></li>
                <li><a href="#">Cámaras de acción</a></li>
                <li><a href="#">Cámaras instantáneas</a></li>
                <li><a href="#">Álbumes y marcos de fotos</a></li>
                <li><a href="#">Iluminación y estudio</a></li>
            </ul>
            <hr>
            <h3><a href="#">Wearables y Tecnología Portátil</a></h3>
            <ul class="column-list">
                <li><a href="#">Relojes inteligentes</a></li>
                <li><a href="#">Rastreadores de actividad</a></li>
                <li><a href="#">Auriculares inalámbricos</a></li>
                <li><a href="#">Gafas de realidad aumentada</a></li>
                <li><a href="#">Pulseras de fitness</a></li>
                <li><a href="#">Ropa inteligente</a></li>
                <li><a href="#">Dispositivos de realidad virtual</a></li>
            </ul>
            <hr>
        </section>

    </section>





    <script type="text/javascript" src="../scripts/scriptDashboard.js"></script>

</body>

</html>