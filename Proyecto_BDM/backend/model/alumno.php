<?php

class Alumno{
    public function insertEstudiante($_mysqli,  $_name, $_lastName, $_gender, $_birthday, $_imagen, $_email, $_pass){
        $query = "CALL agregarEstudiante(?, ?, ?, ?, ?, ?, ?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_name, $_lastName, $_gender, $_birthday, $_imagen, $_email, $_pass));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateEstudiante($_mysqli, $_name, $_lastName, $_gender, $_birthday, $_imagen, $_email, $_pass){
        $query = "CALL modificarEstudiante(?, ?, ?, ?, ?, ?, ?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_name, $_lastName, $_gender, $_birthday, $_imagen, $_email, $_pass));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
    }

    public function findAlumnoByEmail($_mysqli, $_email){
        $sql = "CALL obtenerEstudianteEmail(?);";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute(array($_email));
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                if (array_key_exists('message', $row)){
                    return "Deshabilitado";
                }else if (array_key_exists('notExist', $row)){
                    return "Inexistente";
                }else{
                    return $row;
                }
            }
            return null;
        }catch(Exception $e){
            $response = (object)array("status"=>500,"message"=>"Instructor".$e->getMessage());
            echo json_encode($response);
            return null;
        }
    }

    public function findAllActiveAlumno($_mysqli){
        $sql = "CALL obtenerEstudiantesActivos();";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $instructors = array();
            while($row = $result->fetch_assoc()){
                $instructors[] = $row;
            }
            $result->free();
            return $instructors;
        }catch(Exception $e){
            $response = (object)array("status"=>500,"message"=>"Instructor".$e->getMessage());
            echo json_encode($response);
            return null;
        }
    }

    public function incrementAttemptsAlumno($_mysqli, $_email){
        $query = "CALL incrementarIntentosEstudiante(?);";
         try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_email));
            $stmt->close();
            return true;
        }catch(Exception $e){
            $response = (object)array("status"=>500,"message"=>"Instructor".$e->getMessage());
            echo json_encode($response);
            return false;
        }
    }

    public function disableAlumno($_mysqli, $_email){
        $sql = "CALL deshabilitarEstudiante(?);";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute(array($_email));
            $stmt->close();
            return true;
        }catch(Exception $e){
            $response = (object)array("status"=>500,"message"=>"Instructor".$e->getMessage());
            echo json_encode($response);
            return false;
        }
    }

}
/*class Alumno{
	private $id;
    private $name;
    private $lastname;
    private $gender;
    private $birthday;
    private $picture;
    private $email;
    private $password;
    private $lastDate;
    private $isEnable;

    public function __construct($name, $lastname, $gender, $birthday, $picture, $email, $password) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->picture = $picture;
        $this->email = $email;
        $this->password = $password;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getLastDate() {
        return $this->lastDate;
    }

    public function getIsEnable() {
        return $this->isEnable;
    }

    // Setter methods
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setPicture($picture) {
        $this->picture = $picture;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setLastDate($lastDate) {
        $this->lastDate = $lastDate;
    }

    public function setIsEnable($isEnable) {
        $this->isEnable = $isEnable;
    }

    static public function parseJson($_json) {
        $user =  new Alumno(
            isset($_json["name_userestudiante"]) ? $_json["name_userestudiante"] : "",
            isset($_json["lastname_userestudiante"]) ? $_json["lastname_userestudiante"] : "",
            isset($_json["gender_userestudiante"]) ? $_json["gender_userestudiante"] : "",
            isset($_json["birthday_userestudiante"]) ? $_json["birthday_userestudiante"] : "",
            isset($_json["picture_userestudiante"]) ? $_json["picture_userestudiante"] : "",
            isset($_json["email_userestudiante"]) ? $_json["email_userestudiante"] : "",
            isset($_json["pass_userestudiante"]) ? $_json["pass_userestudiante"] : ""
        );
        if(isset($_json["id"]))
            $user->setId((int)$_json["id"]);
        return $user;
    }

    public function insertEstudiante($_mysqli,  $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass) {    
    	$query = "CALL insertEstudiante(?, ?, ?, ?, ?, ?, ?)";
    	try {
    	    $stmt = $_mysqli->prepare($query);
    	    //$stmt->bind_param("ssssbss", $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass);
    	    $stmt->execute(array($_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass));
    	    $this->id = (int)$stmt->insert_id;
    	    $stmt->close();
    	    return true;
    	    /*$response = (object)array("status"=>200,"message"=>"Estudiante creado exitosamente.");
    	    echo json_encode($response);/
    	} catch(Exception $e) {
    	    $response = (object)array("status"=>500,"message"=>$e->getMessage());
    	    echo json_encode($response);
    	    return false;
    	}
    	return false;
	}

	public function updateEstudiante($_mysqli, $_id, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass, $_isEnable) {
    	$query = "CALL updateEstudiante(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    	try {
    	    $stmt = $_mysqli->prepare($query);
    	    $stmt->bind_param("issssbssi", $_id, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass, $_isEnable);
    	    $stmt->execute();
    	    $stmt->close();
    	    return true;
    	} catch(Exception $e) {
    	    $response = (object)array("status"=>500,"message"=>$e->getMessage());
    	    echo json_encode($response);
    	    return false;
    	}
    	return false;
	}

	public function deleteEstudiante($_mysqli) {
    	$query = "CALL deleteEstudiante(?)";
    	try {
    	    $stmt = $_mysqli->prepare($query);
    	    $stmt->bind_param("i", $this->id);
    	    $stmt->execute();
    	    $stmt->close();
    	    return true;
    	    /*$response = (object)array("status"=>200,"message"=>"Estudiante eliminado exitosamente.");
    	    echo json_encode($response);/
    	} catch(Exception $e) {
    	    $response = (object)array("status"=>500,"message"=>$e->getMessage());
    	    echo json_encode($response);
    	    return false;
    	}
    	return false;
	}

	public static function findAlumnoByEmail($_mysqli, $_email){
        try {
            $sql = "CALL get_Estudiante_By_Email(?)";
            $stmt = $_mysqli->prepare($sql);
            $stmt->bind_param("s", $_email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            while ($row = $result->fetch_assoc()) {
              if (array_key_exists('message', $row)) { // estudiante deshabilitado
                   return "Deshabilitado";
              }
              if (array_key_exists('notExist', $row)) {
                return "Inexistente";
              } else { // estudiante habilitado
                  return $row;
              }
            }   
            return null;
        } catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>"Alumno".$e->getMessage());
            echo json_encode($response);
            return false;
        }
    	
	}
	public static function findAlumnoByID($_mysqli, $_id){
        $sql = "CALL getEstudianteById(?)";
        $stmt = $_mysqli->prepare($sql);
        $stmt->bind_param("i", $_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $students = array();
        while ($row = $result->fetch_assoc()) {
            $student = Alumno::parseJson($row);
            array_push($students, $student);
        }

        return $students;
    }


    public static function getAllAlumnos($_mysqli) {
        $sql = "CALL getAllEstudiantes()";
        $stmt = $_mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $students = array();
        while ($row = $result->fetch_assoc()) {
            $student = Alumno::parseJson($row);
            $students[] = $student;
        }
        return $students;
    }

    public static function getAllEnabledAlumnos($_mysqli) {
        $sql = "CALL get_all_enabled_alumnos()";
        $stmt = $_mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $students = array();
        while ($row = $result->fetch_assoc()) {
            $student = Alumno::parseJson($row);
            $students[] = $student;
        }
        return $students;
    }


    public static function updateLoginAttemptsCounter($_mysqli, $_email) {
     try {
            $sql = "CALL increment_userEstudiante_counter(?)";
            $stmt = $_mysqli->prepare($sql);
            $stmt->bind_param("s", $_email);
            $stmt->execute();
            $stmt->close();
            return true;
            /*$response = (object)array("status"=>200,"message"=>"Instructor eliminado exitosamente.");
            echo json_encode($response);/
        } catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }     
       return false;

    }

}*/

?>