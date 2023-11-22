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

        <section class="d-flex justify-content-center">
            <div class="w-75 wishlists-header d-flex  justify-content-between mb-3">
                <h2>Categorías</h2>
                <button id="addWL" class="btn btn-primary">Agregar</button>
            </div>

        </section>
        <section class="container d-flex flex-column container-categories">
            <h3>
                <a href="#">Computación</a>
                <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                    <i class='bx bxs-pencil icon-large'></i>
                </button>
                <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                    <i class='bx bxs-trash icon-large'></i>
                </button>
            </h3>
            <ul class="column-list">
                <li><a href="#">Accesorios de antiestática</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Accesorios para PC Gaming</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Almacenamiento</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Componentes de PC</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Conectividad y Redes</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Laptops y accesorios</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Monitores y pantallas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Periféricos de computadora</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
            </ul>
            <hr>
            <h3><a href="#">Consolas y Videojuegos</a>
                <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                    <i class='bx bxs-pencil icon-large'></i>
                </button>
                <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                    <i class='bx bxs-trash icon-large'></i>
                </button>
            </h3>
            <ul class="column-list">
                <li><a href="#">Accesorios para consolas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Accesorios para PC Gaming</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Consolas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Maquinitas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Repuestos para consolas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Videojuegos</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Joysticks y controladores</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Realidad virtual</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
            </ul>
            <hr>
            <h3><a href="#">Audio y Video</a>
                <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                    <i class='bx bxs-pencil icon-large'></i>
                </button>
                <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                    <i class='bx bxs-trash icon-large'></i>
                </button>
            </h3>
            <ul class="column-list">
                <li><a href="#">Accesorios para audio y video</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Accesorios para TV</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Audio</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Cables</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Componentes electrónicos</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Pilas y cargadores</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Proyectores y pantallas</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
                        <i class='bx bxs-trash icon-large'></i>
                    </button>
                </li>
                <li><a href="#">Sistemas de sonido para el hogar</a>
                    <button class="bg-transparent border-0 ms-3" onclick="editList('Mi lista #1', 'Productos para mis hermanos')">
                        <i class='bx bxs-pencil icon-large'></i>
                    </button>
                    <button class="bg-transparent border-0" onclick="confirmDelete('Mi lista #1')">
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
                        <span id="userIdInput"><?php echo $userInfo["user_userName"] ?></span>
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
                    <h5 class="modal-title" id="editWLModalLabel">Agregar Nueva Lista</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="listName">Nombre de la Lista</label>
                        <input type="text" class="form-control" id="listName" placeholder="Ingrese el nombre de la lista">
                    </div>
                    <div class="form-group mb-2">
                        <label for="listDescription">Descripción</label>
                        <textarea class="form-control" id="listDescription" rows="3" placeholder="Ingrese una breve descripción"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="listImage">Imagen de la Lista</label>
                        <input type="file" class="form-control-file" id="listImage">
                    </div>
                    <div class="form-group mb-2">
                        <label for="privacySelect">Privacidad</label>
                        <select class="form-control" id="privacySelect">
                            <option value="public">Pública</option>
                            <option value="private">Privada</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addListButton">Agregar Lista</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>
    <script type="text/javascript" src="../scripts/scriptCategories.js"></script>

</body>

</html>