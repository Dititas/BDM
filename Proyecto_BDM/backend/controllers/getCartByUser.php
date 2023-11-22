<?php
require_once "../utils/dbConnection.php";
require_once "../model/cart.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idUser'])) {
        $idUser = $_POST['idUser'];

        $mysqli = dbConnection::connect();

        $cartModel = new Cart();
        $result = $cartModel->getCartByUser($mysqli, $idUser);

        if ($result) {
            $json_response = ["success" => true, "cartId" => $result['cart_id']];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener el carrito del usuario"];
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
