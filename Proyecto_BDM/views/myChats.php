<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Chats</title>
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
    ?>
    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesMyChats.css">
    <script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>


</head>

<body class="bg-dark">
    <?php include_once(__DIR__ . "././sidebar.php");   ?>
    <section class="home-selection">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Mis Chats</span>
        </div>
    </section>
    <section class="dashboard-main">
        <div class="row msg-container ">
            <aside class="col-3 msg-left">
                <h1 class="mt-4 ms-4">Chats</h1>
                <ul>
                    <li>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat 1</h5>
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat 2</h5>
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat 3</h5>
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat 4</h5>
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </aside>
            <section class="col-9 msg-right">
            <h1 class="mt-4 ms-4">Chat 1</h1>
                <ul>
                    <li class="propio">
                        <div class="card ">
                            <div class="card-body">
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li class="propio">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card ">
                            <div class="card-body">
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                    <li class="propio">
                        <div class="card ">
                            <div class="card-body">
                                <p class="card-text">Este es un chat de ejemplo, aquí estarán los pedidos</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
        </div>




    </section>

    <script type="text/javascript" src="../scripts/scriptDashboard.js"></script>
</body>

</html>