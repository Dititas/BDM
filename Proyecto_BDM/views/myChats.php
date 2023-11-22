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
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesMyChats.css">


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
            <span class="text">Mis Chats</span>
        </div>
    </section>
    <section class="dashboard-main">
        <div class="row msg-container">
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
            <section class="col-9 msg-right d-flex flex-column justify-content-between">
                <h1 class="mt-4 ms-4 align-self-start">Chat 1</h1>
                <div class="sms-container">
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
                </div>
                <div class="card-footer text-muted d-flex justify-content-end position-relative">
                    <div class="input-group mb-0">

                        <input type="text" class="form-control" placeholder="Type message" aria-label="Recipient's username" aria-describedby="button-addon2" />
                        <button class="btn btn-warning" type="button" id="button-addon2">
                            Enviar
                        </button>
                        <button class="btn btn-success" type="button" id="buttonCotizar">
                            Cotizar
                        </button>
                    </div>
                </div>

            </section>
        </div>




    </section>
    <div class="modal fade" id="newCotModal" tabindex="-1" role="dialog" aria-labelledby="newWLModalLabel" aria-hidden="true">
        <div class="modal-dialog bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCotModal">Agregar Nueva Lista</h5>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="../scripts/scriptSidebar.js"></script>
    <script type="text/javascript" src="../scripts/scriptCotizacion.js"></script>

</body>

</html>