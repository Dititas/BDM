<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesMyWishLists.css">

    <script src="https://kit.fontawesome.com/3b5032f2e6.js" crossorigin="anonymous"></script>
    <title>Categorías</title>

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

        <section class="d-flex justify-content-center justify-content-between">
            <div class="w-100 wishlists-header d-flex  justify-content-between mb-3">
                <h2>Categorías</h2>
                <button id="addWL" class="btn btn-primary me-5">Agregar</button>
            </div>

        </section>
        <section class="container flex-column container-categories">

            <ul class="column-list" id="allCategories">
                <li><a href="#">Sistemas de sonido para el hogar</a>
                    <button class="bg-transparent border-0 ms-3">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
            </ul>
            <hr>
        </section>

    </section>




    <div class="modal fade" id="newWLModal" tabindex="-1" role="dialog" aria-labelledby="newWLModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="newWLModalLabel">Agregar Categoría</h5>
                </div>
                <form method="post" action="" id="addCategoryForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="CategoryName">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="CategoryName" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="CategoryDescription">Descripción</label>
                            <textarea class="form-control" id="CategoryDescription" rows="3" placeholder="Ingrese una breve descripción"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="addCategoryButton">Agregar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editWLModal" tabindex="-1" role="dialog" aria-labelledby="editWLModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWLModalLabel">Editar Categoría</h5>
                </div>
                <form method="post" action="" id="editCategoryForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="editCategoryName">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="editCategoryName" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="editCategoryDescription">Descripción</label>
                            <textarea class="form-control" id="editCategoryDescription" rows="3" placeholder="Ingrese una breve descripción"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="editCategoryButton">Editar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>
    <script type="text/javascript" src="../scripts/scriptCategories.js"></script>

</body>

</html>