<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
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
    <link rel="stylesheet" type="text/css" href="../css/stylesDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesMyShoppingCart.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <?php include_once(__DIR__ . "././sidebar.php");   ?>

    <section class="home-selection">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Producto</span>
        </div>
    </section>
    <section class="dashboard-main">

        <section class="container-fluid mt-1 row justify-content-center">
            <div class="product-gallery col-lg-6 col-md-8 col-sm-12" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                <div class="row py-2 shadow-5 d-flex">
                    <div class="col-12 mb-1 w-100">
                        <div class="active-product-img">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp" alt="Gallery image 1" class="product-gallery-main-img active" />
                        </div>
                    </div>
                    <div class="col-3 mt-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp" data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp" alt="Gallery image 1" class="active w-100 " />
                    </div>
                    <div class="col-3 mt-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp" data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp" alt="Gallery image 2" class="w-100" />
                    </div>
                    <div class="col-3 mt-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp" data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp" alt="Gallery image 3" class="w-100" />
                    </div>
                    <div class="col-3 mt-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp" data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp" alt="Gallery image 4" class="w-100" />
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-8 col-sm-8 ms-5 border info-product-container">
                <h2 class="mb-3">Nombre Producto</h2>
                <h1 class="mb-3">$Precio</h1>
                <p class="mb-3">Descripción Producto</p>
                <p class="mb-3">Vendedor</p>
                <p class="mb-3">Cantidad disponible</p>
                <div class="row ">
                    <div class="row justify-content-center">
                        <button class="btn btn-primary mt-3 col-6">
                            Comprar ahora
                        </button>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-secondary mt-3 col-6">
                            Agregar al carrito
                        </button>
                    </div>

                </div>

            </div>
        </section>

    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptDashboard.js"></script>

</body>

</html>