<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/wishList.php";

    if (isset($_POST['idList']) && isset($_POST['idProduct'])) {
        $idList = $_POST['idList'];
        $idProduct = $_POST['idProduct'];

        $mysqli = dbConnection::connect();
        $wishlist = new WishList();
        if ($wishlist->addProductToList($mysqli, $idList, $idProduct)) {
            $json_response = ["success" => true, "msg" => "Producto agregado a la lista con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al agregar el producto a la lista"];
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
