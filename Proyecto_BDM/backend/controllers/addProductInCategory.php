<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/category.php";

    if (isset($_POST['idProduct']) && isset($_POST['idCategory'])) {
        $idProduct = $_POST['idProduct'];
        $idCategory = $_POST['idCategory'];

        $mysqli = dbConnection::connect();
        $newCategory = new Category();
        if ($newCategory->addProductInCategory($mysqli, $idProduct, $idCategory)) {
            $json_response = ["success" => true, "msg" => "Producto agregado a la categoría con éxito"];
        } else {
            $json_response = ["success" => false, "msg" => "Error al agregar el producto a la categoría"];
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
