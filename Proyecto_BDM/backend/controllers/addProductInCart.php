<?php
require_once "../utils/dbConnection.php";
require_once "../model/cart.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['quantity']) &&
        isset($_POST['product']) &&
        isset($_POST['cart'])
    ) {
        $quantity = $_POST['quantity'];
        $product = $_POST['product'];
        $cart = $_POST['cart'];

        $mysqli = dbConnection::connect();

        $cartModel = new Cart();
        $result = $cartModel->addProductInCart($mysqli, $quantity, $product, $cart);

        if ($result) {
            $json_response = ["success" => true, "msg" => "Producto agregado al carrito con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al agregar el producto al carrito"];
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
