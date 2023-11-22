<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/product.php";

    if (
        isset($_POST['name']) && isset($_POST['description']) && isset($_FILES['image']) &&
        isset($_POST['quotation']) && isset($_POST['price']) && isset($_POST['quantityAvailable'])
    ) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $convertedImage = file_get_contents($_FILES['image']['tmp_name']);
        $quotation = $_POST['quotation'];
        $price = $_POST['price'];
        $quantityAvailable = $_POST['quantityAvailable'];
        session_start();
        $loggedUser = $_SESSION['AUTH'] ?? null;
        $mysqli = dbConnection::connect();
        $newProduct = new Product();
        if ($loggedUser != null) {
            if ($newProduct->insertProduct($mysqli, $name, $description, $convertedImage, $quotation, $price, $quantityAvailable, $loggedUser['user_id'])) {
                $json_response = ["success" => true, "msg" => "Agregada con exito"];
                header('Content-Type: application/json');
                echo json_encode($json_response);
                exit();
            } else {
                $json_response = ["success" => false, "msg" => "Algo fallo, intente mas tarde"];
                header('Content-Type: application/json');
                echo json_encode($json_response);
                exit();
            }
        }
    } else {
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
