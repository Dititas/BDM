<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis productos</title>
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
            <span class="text">Mis Productos</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="wishlists-container container flex-column">
            <section class="container mt-3">
                <div class="table-container container flex-column">
                    <div class="d-flex flex-wrap align-items-end">
                        <h4>Total: $2,549.99</h4>
                        <button id="btnAddProduct" class="btn btn-primary ms-2">Agregar producto</button>
                    </div>
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Cantidad disponile</th>
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
                                <td>Descripción</td>
                                <td>Cantidad disponible</td>
                                <td>$249.99</td>
                                <td scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                </th>
                                <td>2</td>
                                <td>
                                    <img src="../img/printer.jfif" class="card-img-top img-fluid" alt="Imagen del producto 2">
                                </td>
                                <td>Impresora láser</td>
                                <td>Descripción</td>
                                <td>Cantidad disponible</td>
                                <td>$1800</td>
                                <td scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                </th>
                                <td>3</td>
                                <td>
                                    <img src="../img/keyboard.jfif" class="card-img-top img-fluid" alt="Imagen del producto">
                                </td>
                                <td>Teclado RGB</td>
                                <td>Descripción</td>
                                <td>Cantidad disponible</td>
                                <td>$500</td>
                                <td scope="row">
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                </div>
            </section>
        </section>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog text-body-secondary bg-dark-x" role="document">
            <div class="modal-content bg-dark-x">
                <div class="modal-header">
                    <h5 class="modal-title text-reset" id="buyModalLabel">Agregar producto</h5>
                </div>
                <form class="mb-5 row" method="post" action="" id="addProductForm" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div class="mb-1 col-12">
                            <label for="nameInput" class="form-label font-weight-bold">Nombre del producto</label>
                            <input type="text" aria-label="Product name" placeholder="Nombre" class="form-control bg-dark-x text-light border-0" id="nameInput">
                        </div>

                        <div class="mb-1 col-12">
                            <label for="descriptionInput" class="form-label font-weight-bold">Descripción</label>
                            <input type="text" aria-label="Product description" placeholder="Descripción" class="form-control bg-dark-x text-light border-0" id="descriptionInput">
                        </div>

                        <div class="mb-3 col-12">
                            <label for="foto" class="">Subir Imagen</label>
                            <div class="input-group mb-2">
                                <input type="file" class="custom-file-input" id="foto" accept="image/*">
                            </div>
                        </div>

                        <span id="textWarningFile" class="font-weight-bold colorWarning mb-2"></span>

                        <div class="form-group mb-2">
							<label class="custom-checkbox">
								<input type="checkbox" id="checkbox" onchange="toggleInput()">
								<span class="checkmark"></span>
								¿Cotizable?
							</label>
						</div>

                        <div class="mb-1 col-12">
                            <label for="priceInput" class="form-label font-weight-bold">Precio</label>
                            <input type="text" aria-label="Product price" placeholder="Precio" class="form-control bg-dark-x text-light border-0" id="priceInput">
                        </div>

                        <div class="mb-1 col-12">
                            <label for="quantityInput" class="form-label font-weight-bold">Cantidad disponible</label>
                            <input type="text" aria-label="Product quantity" placeholder="Cantidad" class="form-control bg-dark-x text-light border-0" id="quantityInput">
                        </div>

                        <span id="textWarningPass" class="font-weight-bold colorWarning mb-2"></span>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="addProductButton">Agregar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>
    <script type="text/javascript" src="../scripts/scriptProduct.js"></script>

</body>

</html>