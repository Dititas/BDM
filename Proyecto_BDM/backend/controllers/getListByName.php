<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/wishList.php";

    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        $mysqli = dbConnection::connect();
        $wishlist = new WishList();
        $lists = $wishlist->getListByName($mysqli, $name);

        if ($lists !== null) {
            $json_response = ["success" => true, "lists" => $lists];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener las listas por nombre"];
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
