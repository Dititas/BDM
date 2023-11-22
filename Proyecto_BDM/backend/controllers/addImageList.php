<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/wishList.php";

    if (isset($_POST['image']) && isset($_POST['idList'])) {
        $image = $_POST['image'];
        $idList = $_POST['idList'];

        $mysqli = dbConnection::connect();
        $wishlist = new WishList();
        if ($wishlist->addImageList($mysqli, $image, $idList)) {
            $json_response = ["success" => true, "msg" => "Imagen agregada a la lista con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al agregar la imagen a la lista"];
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
