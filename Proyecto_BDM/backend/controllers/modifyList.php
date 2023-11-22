<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/wishList.php";

    if (
        isset($_POST['id']) &&
        isset($_POST['name']) &&
        isset($_POST['description']) &&
        isset($_POST['isPublic'])
    ) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $isPublic = $_POST['isPublic'];

        $mysqli = dbConnection::connect();
        $wishlist = new WishList();
        if ($wishlist->modifyList($mysqli, $id, $name, $description, $isPublic)) {
            $json_response = ["success" => true, "msg" => "Lista modificada con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al modificar la lista"];
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
