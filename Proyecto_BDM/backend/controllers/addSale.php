<?php
require_once "../utils/dbConnection.php";
require_once "../model/sale.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['productId']) &&
        isset($_POST['sellerId'])
    ) {
        $productId = $_POST['productId'];
        $sellerId = $_POST['sellerId'];

        $mysqli = dbConnection::connect();

        $saleModel = new Sale();
        $result = $saleModel->addSale($mysqli, $productId, $sellerId);

        if ($result) {
            $json_response = ["success" => true, "msg" => "Venta registrada con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al registrar la venta"];
        }

        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    } else {
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
?>
