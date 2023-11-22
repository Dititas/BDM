<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
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
            <span class="text">Inventario</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="wishlists-container container flex-column">
            <section class="container mt-3">
                <div class="table-container container flex-column">
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="h-25">
                                <th scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                </th>

                                <td>1</td>
                                <td>
                                    <img src="../img/mouse2.jfif" class="card-img-top img-fluid" alt="Imagen del producto 3">
                                </td>
                                <td>Mouse</td>
                                <td>$249.99</td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bx-credit-card bx-flashing icon-large'></i> 
                                    </button>
                                    <span class="link_name">Comprar ahora</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                </th>
                                <td>2</th>
                                <td>
                                    <img src="../img/printer.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
                                </td>
                                <td>Impresora láser</td>
                                <td>$1800</td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bx-credit-card bx-flashing icon-large'></i>
                                    </button>
                                    <span class="link_name">Comprar ahora</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                </th>
                                <td>3</th>
                                <td>
                                    <img src="../img/keyboard.jfif" class="card-img-top img-fluid" alt="Imagen del producto">
                                </td>
                                <td>Teclado RGB</td>
                                <td>$500</td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bx-credit-card bx-flashing icon-large'></i> 
                                    </button>
                                    <span class="link_name">Comprar ahora</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex flex-column align-items-end">
                        <h3>Resumen de compra</h3>
                        <h4>Total: $2,549.99</h4>
                        <button id="btnBuy" class="btn btn-primary">Comprar</button>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Confirmar Compra</h5>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas realizar la compra?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar Compra</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>
    <script type="text/javascript" src="../scripts/scriptPayModal.js"></script>

</body>

</html>