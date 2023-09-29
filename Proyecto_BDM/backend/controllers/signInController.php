<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "../backend/utils/dbConnection.php";
    require_once "../backend/model/user.php";

    if( isset($_POST['email'])      && isset($_POST['username'])    && 
        isset($_POST['password'])   && isset($_POST['name'])        && 
        isset($_POST['lastname'])   && isset($_POST['birthdate'])   && 
        isset($_FILES['image'])     && isset($_POST['gender'])      &&
        isset($_POST['isPublic']    && isset($_POST['rol']))){
            
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $birthdate = $_POST['birthdate'];
            $gender = $_POST['gender'];
            $isPublic = $_POST['isPublic'];
            $rol = $_POST['rol'];            
            $convertedImage = file_get_contents($_FILES['image']['tmp_name']);

            $mysqli = dbConnection::connect();

            $newUser = new User();
            if($newUser->checkOneUserExists($mysqli, $email)['response'] === "NOT EXISTS"  && $newUser->checkOneUserExists($mysqli, $username)['response'] === "NOT EXISTS"){
                if($newUser->insertUser($mysqli, $email, $username, $encryptedPassword, $name, $lastname, $birthdate, $convertedImage, $gender, $isPublic, $rol)){
                    $json_response = ["success" => true, "msg" => "Agregado con éxito"];
                    header('Content-Type: application/json');
                    echo json_encode($json_response);
                    exit();
                }else{
                    $json_response = ["success" => false, "msg" => "Algo falló, intente más tarde"];
                    header('Content-Type: application/json');
                    echo json_encode($json_response);
                    exit();
                }
            }else{
                $json_response = ["success" => false, "msg" => "Email o Usuario ya existente"];
                header('Content-Type: application/json');
                echo json_encode($json_response);
                exit();
            }
            $json_response = ["success" => false, "msg" => "No entró a lsd validaciones"];
            header('Content-Type: application/json');
            echo json_encode($json_response);
            exit();
    }else{
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
?>