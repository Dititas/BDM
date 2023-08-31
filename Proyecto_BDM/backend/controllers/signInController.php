<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once "./../../backend/utils/dbConnection.php";
	require_once "./../../backend/model/instructor.php";
	require_once "./../../backend/model/alumno.php";  
    

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['genero']) && isset($_POST['fechaNacimiento']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['rol']) && isset($_FILES['foto'])){

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $genero = $_POST['genero'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];

        $foto = $_FILES['foto'];
        $nombreFoto = $foto['name'];
        $tipoFoto = $foto['type'];
        $tamanoFoto = $foto['size'];
        $tempFoto = $foto['tmp_name'];

        $longblobdata = file_get_contents($tempFoto);       
        $hashPass = password_hash($pass, PASSWORD_DEFAULT);

         $mysqli = dbConnection::connect();

        if($rol === "Maestro"){
            $instructor = new Instructor();
            $instructor->insertInstructor($mysqli, $nombre, $apellido, $genero, $fechaNacimiento, $longblobdata, $email, $hashPass);
            $json_response = ["success" => true, "msg" => "Se ha creado el usuario Maestro"];
            header('Content-Type: application/json');
            echo json_encode($json_response);
            exit();
        }else if($rol === "Alumno"){
            $alumno = new Alumno();
            $alumno->insertEstudiante($mysqli, $nombre, $apellido, $genero, $fechaNacimiento, $longblobdata, $email, $hashPass);
            $json_response = ["success" => true, "msg" => "Se ha creado el usuario Alumno"];
            header('Content-Type: application/json');
            echo json_encode($json_response);
            exit();                 
        }
    }
    $json_response = ["success" => false, "msg" => "No se ha creado el usuario"];
    header('Content-Type: application/json');
    echo json_encode($json_response);
    exit();
}

?>