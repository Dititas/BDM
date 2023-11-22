<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis ventas</title>
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
            <span class="text">cosa q escribí en la búsqueda</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="container d-flex flex-column">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <h4>Búsqueda avanzada:</h4>
                <div class="dropdown ms-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtrar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Menor a mayor precio</a></li>
                        <li><a class="dropdown-item" href="#">Mayor a menor precio</a></li>
                        <li><a class="dropdown-item" href="#">Mejores calificados</a></li>
                        <li><a class="dropdown-item" href="#">Más vendidos</a></li>
                        <li><a class="dropdown-item" href="#">Menos vendidos</a></li>

                    </ul>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card bg-dark h-100">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="card-title">Nombre producto</h5>
                            <p class="card-text">
                                precio
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">vendedor</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark h-100">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp" class="card-img-top" alt="Los Angeles Skyscrapers" />
                        <div class="card-body">
                            <h5 class="card-title">Nombre producto</h5>
                            <p class="card-text">
                                precio
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">vendedor</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark h-100">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road" />
                        <div class="card-body">
                            <h5 class="card-title">Nombre producto</h5>
                            <p class="card-text">
                                precio
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">vendedor</small>
                        </div>
                    </div>
                </div>
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