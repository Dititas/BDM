<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require_once "./../../backend/utils/dbConnection.php";
		require_once "./../../backend/model/instructor.php";
		require_once "./../../backend/model/alumno.php";

		if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['genero']) && isset($_POST['fechaNacimiento']) && isset($_POST['option'])){

			$mysqli = dbConnection::connect();

			$name = $_POST['nombre'];
			$lastName = $_POST['apellido'];
			$gender = $_POST['genero'];
			$birthday = $_POST['fechaNacimiento'];
			$option = intval($_POST['option']);

			session_start();
			$loggedUser = $_SESSION['AUTH'];
			$rolUser = $_SESSION['rolUser'];
			if($rolUser === 'alumno'){
				$user = new Alumno();
				if(isset($_FILES['foto']) || isset($_POST['pass'])){		
					if($option === 2){
						$picture = $_FILES['foto'];
						$pass = $_POST['pass'];

						$tempPicture = $foto['tmp_name'];
						$longBlobData = file_get_contents($tempPicture);
						$hashPass = password_hash($pass, PASSWORD_DEFAULT);

						if($user->updateEstudiante($mysqli, $name, $lastName, $gender, $birthday, $longBlobData, $loggedUser['email_userestudiante'], $hashPass)){

							$alumno = $user->findAlumnoByEmail($mysqli, $loggedUser['email_userestudiante']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $alumno;
							$_SESSION['rolUser'] = 'alumno';

							$json_response = ["success" => true, "msg" => "Los 	cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se 	han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}elseif ($option == 3) {
						$pass = $_POST['pass'];
						$hashPass = password_hash($pass, PASSWORD_DEFAULT);
						if($user->updateEstudiante($mysqli, $name, $lastName, $gender, $birthday, null, $loggedUser['email_userestudiante'], $hashPass)){

							$alumno = $user->findAlumnoByEmail($mysqli, $loggedUser['email_userestudiante']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $alumno;
							$_SESSION['rolUser'] = 'alumno';

							$json_response = ["success" => true, "msg" => "Los 	cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se 	han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}elseif ($option === 4){
						$picture = $_FILES['foto'];
						$tempPicture = $foto['tmp_name'];
						$longBlobData = file_get_contents($tempPicture);
						if($user->updateEstudiante($mysqli, $name, $lastName, $gender, $birthday, $longBlobData, $loggedUser['email_userestudiante'], null)){

							$alumno = $user->findAlumnoByEmail($mysqli, $loggedUser['email_userestudiante']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $alumno;
							$_SESSION['rolUser'] = 'alumno';

							$json_response = ["success" => true, "msg" => "Los 	cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se 	han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}
				}else{
					if($user->updateEstudiante($mysqli, $name, $lastName, $gender, $birthday, null, $loggedUser['email_userestudiante'], null)){


						$alumno = $user->findAlumnoByEmail($mysqli, $loggedUser['email_userestudiante']);
						session_destroy();
						session_start();
						$_SESSION['AUTH'] = $alumno;
						$_SESSION['rolUser'] = 'alumno';
						
						$json_response = ["success" => true, "msg" => "Los cambios se han efectuado"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}else{
						$json_response = ["success" => false, "msg" => "No se han podido hacer los cambios"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}
				}				
			}else{
				$user = new Instructor();
				if(isset($_POST['foto']) || isset($_POST['pass'])){
					if($option === 2){
						$picture = $_FILES['foto'];
						$pass = $_POST['pass'];

						$tempPicture = $foto['tmp_name'];
						$longBlobData = file_get_contents($tempPicture);
						$hashPass = password_hash($pass, PASSWORD_DEFAULT);

						if($user->updateInstructor($mysqli, $name, $lastName, $gender, $birthday, $longBlobData, $loggedUser['email_userInstructor'], $hashPass)){

							$instructor = $user->findInstructorByEmail($mysqli, $loggedUser['email_userInstructor']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $instructor;
							$_SESSION['rolUser'] = 'maestro';

							$json_response = ["success" => true, "msg" => "Los cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}elseif ($option == 3) {
						$pass = $_POST['pass'];
						$hashPass = password_hash($pass, PASSWORD_DEFAULT);
						if($user->updateInstructor($mysqli, $name, $lastName, $gender, $birthday, null, $loggedUser['email_userInstructor'], $hashPass)){

							$instructor = $user->findInstructorByEmail($mysqli, $loggedUser['email_userInstructor']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $instructor;
							$_SESSION['rolUser'] = 'maestro';

							$json_response = ["success" => true, "msg" => "Los cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}elseif ($option === 4){
						$picture = $_FILES['foto'];
						$tempPicture = $foto['tmp_name'];
						$longBlobData = file_get_contents($tempPicture);
						if($user->updateInstructor($mysqli, $name, $lastName, $gender, $birthday, $longBlobData, $loggedUser['email_userInstructor'], null)){

							$instructor = $user->findInstructorByEmail($mysqli, $loggedUser['email_userInstructor']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $instructor;
							$_SESSION['rolUser'] = 'maestro';

							$json_response = ["success" => true, "msg" => "Los cambios se han efectuado"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$json_response = ["success" => false, "msg" => "No se han podido hacer los cambios"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
					}
				}else{
					if($user->updateInstructor($mysqli, $name, $lastName, $gender, $birthday, null, $loggedUser['email_userInstructor'], null)){

						$instructor = $user->findInstructorByEmail($mysqli, $loggedUser['email_userInstructor']);
							session_destroy();
							session_start();
							$_SESSION['AUTH'] = $instructor;
							$_SESSION['rolUser'] = 'maestro';

						$json_response = ["success" => true, "msg" => "Los cambios se han efectuado"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}else{
						$json_response = ["success" => false, "msg" => "No se han podido hacer los cambios"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}
				}	
			}

		}else{
			$json_response = ["success" => false, "msg" => "Faltan datos"];
    		header('Content-Type: application/json');
    		echo json_encode($json_response);
    		exit();
		}
	}


?>