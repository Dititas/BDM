<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/category.php";

    if (isset($_POST['idCategory'])) {
        $idCategory = $_POST['idCategory'];

        $mysqli = dbConnection::connect();
        $newCategory = new Category();
        $products = $newCategory->getProductByCategory($mysqli, $idCategory);

        if ($products !== null) {
            $json_response = ["success" => true, "products" => $products];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener los productos de la categoría"];
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
