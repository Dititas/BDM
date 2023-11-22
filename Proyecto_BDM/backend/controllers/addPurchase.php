<?php
require_once "../utils/dbConnection.php";
require_once "../model/purchase.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['productId']) &&
        isset($_POST['buyerId'])
    ) {
        $productId = $_POST['productId'];
        $buyerId = $_POST['buyerId'];

        $mysqli = dbConnection::connect();

        $purchaseModel = new Purchase();
        $result = $purchaseModel->addPurchase($mysqli, $productId, $buyerId);

        if ($result) {
            $json_response = ["success" => true, "msg" => "Compra registrada con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al registrar la compra"];
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
