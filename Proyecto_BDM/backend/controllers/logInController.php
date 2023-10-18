<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once "../utils/dbConnection.php";
    require_once "../model/user.php";
	
	if(isset($_POST['identity']) && isset($_POST['password'])){
		$identity = $_POST['identity'];
		$password = $_POST['password'];

		$mysqli = dbConnection::connect();

		$user = new User();
		if($user->checkOneUserExists($mysqli, $identity)['response'] == 'ALREADY EXISTS'){
			if($user->checkOneUserEnabled($mysqli, $identity)['response'] == 'ENABLED'){
				$userlogged = $user->selectOneUser($mysqli, $identity);
				if($userlogged != null){
					if(password_verify($password, $userlogged['user_password'])){
						session_start();
						$_SESSION['AUTH'] = $userlogged;
						$json_response = ["success" => true, "msg" => "Se ha iniciado sesión", "data" => json_encode($userlogged)];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}else{
						$json_response = ["success" => false, "msg" => "Contraseña incorrecta, intente de nuevo"];
            			header('Content-Type: application/json');
            			echo json_encode($json_response);
            			exit();
					}					
				}else{
					$json_response = ["success" => false, "msg" => "Falló el inicio de sesión, intente de nuevo más tarde"];
            		header('Content-Type: application/json');
            		echo json_encode($json_response);
            		exit();
				}
			}else{
				$json_response = ["success" => false, "msg" => "Usuario inhabilitado, favor de contactarse con un administrador"];
            	header('Content-Type: application/json');
            	echo json_encode($json_response);
            	exit();
			}
		}else{
			$json_response = ["success" => false, "msg" => "Usuario inexistente, por favor crea una cuenta"];
            header('Content-Type: application/json');
            echo json_encode($json_response);
            exit();
		}
	}else{
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
/* if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once "./../../backend/utils/dbConnection.php";
	require_once "./../../backend/model/instructor.php";
	require_once "./../../backend/model/alumno.php";
	require_once "./../../backend/model/admin.php";

	if(isset($_POST['email']) && isset($_POST['pass'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$mysqli = dbConnection::connect();

		$admin = new Admin();
		$instructor = new Instructor();
		$alumno = new Alumno();

		$auxAdmin = $admin->getUserAdminByEmail($mysqli, $email);
		if(count($auxAdmin) == 0){
			$auxInstructor = $instructor->findInstructorByEmail($mysqli, $email);
			if($auxInstructor == "Inexistente"){
				$auxAlumno = $alumno->findAlumnoByEmail($mysqli, $email);
				if($auxAlumno == "Inexistente"){
					$json_response = ["success" => false, "msg" => "El correo no está registrado, favor de Registrarse"];
    				header('Content-Type: application/json');
    				echo json_encode($json_response);
    				exit();	
				}else{
					if($auxAlumno == "Deshabilitado"){
						$json_response = ["success" => false, "msg" => "El usuario Alumno está deshabilitado, favor de contactarse con el administrador"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
					}else{
						if(password_verify($pass, $auxAlumno['pass_userestudiante'])){
							session_start();
							$_SESSION['AUTH'] = $auxAlumno;
							$_SESSION['rolUser'] = 'alumno';
							$json_response = ["success" => true, "msg" => "Se ha iniciado sesión"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}else{
							$auxCounter = intval($auxAlumno['counter_userestudiante']);	
							if($auxCounter === 2){
    							if($alumno->disableAlumno($mysqli, $email)){
    								$json_response = ["success" => false, "msg" => "Cuenta deshabilitada, favor de comunicarse con el administrador"];
    								header('Content-Type: application/json');
    								echo json_encode($json_response);
    								exit();	
    							}
    							
    						}else{
    							$alumno->incrementAttemptsAlumno($mysqli, $email);
    							$auxCounter = $auxCounter + 1;
    							$json_response = ["success" => false, "msg" => "Contrasenia incorrecta -". $auxCounter . "/3 intentos-"];
    							header('Content-Type: application/json');
    							echo json_encode($json_response);
    							exit();
    						}		
							
						}
					}
				}

			}else{				
				if($auxInstructor == "Deshabilitado"){
					$json_response = ["success" => false, "msg" => "El usuario Instructor está deshabilitado, favor de contactarse con el administrador"];
    				header('Content-Type: application/json');
    				echo json_encode($json_response);
				}else{
					if(password_verify($pass, $auxInstructor['pass_userInstructor'])){
						session_start();
						$_SESSION['AUTH'] = $auxInstructor;
						$_SESSION['rolUser'] = 'maestro';
						$json_response = ["success" => true, "msg" => "Se ha iniciado sesión"];
    					header('Content-Type: application/json');
    					echo json_encode($json_response);
    					exit();
					}else{
						$auxCounter = intval($auxInstructor['counter_userInstructor']);
						if($auxCounter === 2){
							if($instructor->disableInstructor($mysqli, $email)){
								$json_response = ["success" => false, "msg" => "Cuenta deshabilitada, favor de comunicarse con el administrador"];
    							header('Content-Type: application/json');
    							echo json_encode($json_response);
    							exit();	
							}
						}else{
							$instructor->incrementAttemptsInstructor($mysqli, $email);
							$auxCounter = $auxCounter + 1;
							$json_response = ["success" => false, "msg" => "Contrasenia incorrecta -". $auxCounter. "/3 intentos-"];
    						header('Content-Type: application/json');
    						echo json_encode($json_response);
    						exit();
						}
						
																	
					}					
				}
			}
		}else{
			if($pass === $auxAdmin[0]["Pass"]){
				session_start();
				$_SESSION['AUTH'] = $auxAdmin;
				$_SESSION['rolUser'] = 'admin';
				$json_response = ["success" => true, "msg" => "Se ha iniciado sesión"];
    			header('Content-Type: application/json');
    			echo json_encode($json_response);
    			exit();
			}else{
				$json_response = ["success" => false, "msg" => "Contrasenia incorrecta"];
    			header('Content-Type: application/json');
    			echo json_encode($json_response);
    			exit();
			}
			
		}
	}else{
		$json_response = ["success" => false, "msg" => "Faltan datos"];
    	header('Content-Type: application/json');
    	echo json_encode($json_response);
    	exit();
	}	
}
 */
?>