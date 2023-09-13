<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once(__DIR__ . "./../bootstrap.php");
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

<body>
    <?php include_once(__DIR__ . "././sidebar.php");   ?>

    <section class="home-selection">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Mis Listas</span>
        </div>
    </section>
    <section class="dashboard-main">
        <section class="wishlists-container container flex-column">
            <section class="wishlists-header d-flex h-25 w-100 justify-content-between">
                <h2>Mis listas de deseos</h2>
                <button id="addWL" class="btn btn-primary">Agregar</button>
            </section>
            <section class="container mt-3">
                <div class="table-container container flex-column">
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="../img/profilePicture.png" class="card-img-top img-fluid" alt="Imagen del producto 3">
                                </td>
                                <td>Mi lista #1</td>
                                <td>Productos para mis hermanos</td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-lock-open icon-large'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td></td>
                                <td>Cosas para la casa</td>
                                <td>Productos para conectar la casa con el IoT</td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-lock-alt icon-large'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td></td>
                                <td>Por comprar</td>
                                <td></td>
                                <td>
                                    <button class="bg-transparent border-0">
                                        <i class='bx bxs-trash icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-pencil icon-large'></i>
                                    </button>
                                    <button class="bg-transparent border-0 ms-3">
                                        <i class='bx bxs-lock-alt icon-large'></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </section>
    <div class="modal fade" id="newWLModal" tabindex="-1" role="dialog" aria-labelledby="newWLModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newWLModalLabel">Agregar Nueva Lista</h5>
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
    <script type="text/javascript" src="../scripts/scriptDashboard.js"></script>
    <script type="text/javascript" src="../scripts/scriptWishLists.js"></script>

</body>

</html>