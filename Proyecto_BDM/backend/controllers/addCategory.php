<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../utils/dbConnection.php";
    require_once "../model/category.php";

    if (
        isset($_POST['name']) &&
        isset($_POST['description'])
    ) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        session_start();
        $loggedUser = $_SESSION['AUTH'] ?? null;
        $mysqli = dbConnection::connect();

        $newCategory = new Category();

        if ($loggedUser != null) {
            if ($newCategory->addCategory($mysqli, $name, $description, $loggedUser['user_id'])) {
                $json_response = ["success" => true, "msg" => "Agregada con exito"];
                    header('Content-Type: application/json');
                    echo json_encode($json_response);
                    exit();
                
            } else {
                $json_response = ["success" => false, "msg" => "Algo fallo, intente mas tarde"];
                header('Content-Type: application/json');
                echo json_encode($json_response);
                exit();
            }
        }
    } else {
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
