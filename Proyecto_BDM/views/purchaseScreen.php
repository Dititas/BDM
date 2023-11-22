<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesSearch.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>


</head>

<body>
    <?php include_once(__DIR__ . "././sidebar.php");   ?>

    <section class="home-selection">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Continuar con la compra</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="container d-flex justify-content-between">
            <div class="d-flex flex-column col-6 ms-2 mb-4 bg-dark rounded">
                <h2 class="mt-3 ms-4">Enviar a Domicilio</h2>
                <form action="procesar_formulario.php" class="d-flex flex-column mb-3" method="post">
                    <div class="form-group d-flex d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="nombre">Nombre y Apellido:</label>
                        <input type="text" id="nombre" class="form-control bg-dark-x text-light border-0 " name="nombre" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="codigo_postal">Código Postal:</label>
                        <input type="text" id="codigo_postal" class="form-control bg-dark-x text-light border-0 " name="codigo_postal" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" class="form-control bg-dark-x text-light border-0 " name="estado" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="municipio">Municipio/Alcaldía:</label>
                        <input type="text" id="municipio" class="form-control bg-dark-x text-light border-0 " name="municipio" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="colonia">Colonia:</label>
                        <input type="text" id="colonia" class="form-control bg-dark-x text-light border-0 " name="colonia" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="calle">Calle:</label>
                        <input type="text" id="calle" class="form-control bg-dark-x text-light border-0 " name="calle" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="numero_exterior">Número Exterior:</label>
                        <input type="text" id="numero_exterior" class="form-control bg-dark-x text-light border-0 " name="numero_exterior" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">

                        <label for="numero_interior">Número Interior/Depto (opcional):</label>
                        <input type="text" id="numero_interior" class="form-control bg-dark-x text-light border-0 " name="numero_interior">
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="entre_calles">Entre qué calles está? (opcional):</label>
                        <input type="text" id="entre_calles" class="form-control bg-dark-x text-light border-0 " name="entre_calles">
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3 ms-3 ">
                        <label for="telefono">Teléfono de Contacto:</label>
                        <input type="tel" id="telefono" class="form-control bg-dark-x text-light border-0 " name="telefono" required>
                    </div>
                    <div class="form-group d-flex flex-column w-75 align-self-center mb-3  ms-3">
                        <label for="indicaciones">Indicaciones Adicionales:</label>
                        <textarea id="indicaciones" class="form-control bg-dark-x text-light border-0 " name="indicaciones" rows="4"></textarea>
                    </div>
                    <button type="submit" id="nextBtn" class="btn btn-primary w-75 mt-3 align-self-center">Comprar</button>
                </form>
            </div>
            <div class="d-flex flex-column col-4">
                <h3>Datos de la compra</h3>
                <h5>Productos:</h5>
                <span>Producto 1</span>
                <span>Precio</span>
                <span>Producto 2</span>
                <span>Precio</span>
                <span>Producto 3</span>
                <span>Precio</span>
                <h2>Total: $200.99</h2>
                <button>Comprar</button>
            </div>
        </section>
    </section>
    
    <?php

    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>

</body>

</html>