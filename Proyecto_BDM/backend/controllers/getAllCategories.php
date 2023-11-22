<?php
require_once "../utils/dbConnection.php";
require_once "../model/category.php";

$mysqli = dbConnection::connect();
$category = new Category();

$categories = $category->getAllCategories($mysqli);

if ($categories !== null) {
    $json_response = ["success" => true, "categories" => $categories];
} else {
    $json_response = ["success" => false, "msg" => "Error al obtener las categorías"];
}

header('Content-Type: application/json');
echo json_encode($json_response);
?>
