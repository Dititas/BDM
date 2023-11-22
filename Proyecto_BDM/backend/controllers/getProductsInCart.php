<?php
require_once "../utils/dbConnection.php";
require_once "../model/cart.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idCart'])) {
        $idCart = $_POST['idCart'];

        $mysqli = dbConnection::connect();

        $cartModel = new Cart();
        $result = $cartModel->getProductsInCart($mysqli, $idCart);

        if ($result !== null) {
            $json_response = ["success" => true, "products" => $result];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener los productos del carrito"];
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
