<?php

class Instructor{
    public function insertInstructor($_mysqli, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass){
        $query = "CALL agregarInstructor(?, ?, ?, ?, ?, ?, ?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateInstructor($_mysqli, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass){
        $query = "CALL modificarInstructor(?, ?, ?, ?, ?, ?, ?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function findInstructorByEmail($_mysqli, $_email){
        $sql = "CALL obtenerInstructorEmail(?);";
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

    public function findAllActiveInstructor($_mysqli){
        $sql = "CALL obtenerInstructoresActivos();";
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

    public function incrementAttemptsInstructor($_mysqli, $_email){
        $query = "CALL incrementarIntentosInstructor(?);";
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

    public function disableInstructor($_mysqli, $_email){
        $sql = "CALL deshabilitarInstructor(?);";
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

/*


class Instructor{
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



    public function getIdUserInstructor() {
        return $this->id_userInstructor;
    }

    public function setIdUserInstructor($id_userInstructor) {
        $this->id_userInstructor = $id_userInstructor;
    }

    public function getNameUserInstructor() {
        return $this->name_userInstructor;
    }

    public function setNameUserInstructor($name_userInstructor) {
        $this->name_userInstructor = $name_userInstructor;
    }

    public function getLastnameUserInstructor() {
        return $this->lastname_userInstructor;
    }

    public function setLastnameUserInstructor($lastname_userInstructor) {
        $this->lastname_userInstructor = $lastname_userInstructor;
    }

    public function getGenderUserInstructor() {
        return $this->gender_userInstructor;
    }

    public function setGenderUserInstructor($gender_userInstructor) {
        $this->gender_userInstructor = $gender_userInstructor;
    }

    public function getBirthdayUserInstructor() {
        return $this->birthday_userInstructor;
    }

    public function setBirthdayUserInstructor($birthday_userInstructor) {
        $this->birthday_userInstructor = $birthday_userInstructor;
    }

    public function getPictureUserInstructor() {
        return $this->picture_userInstructor;
    }

    public function setPictureUserInstructor($picture_userInstructor) {
        $this->picture_userInstructor = $picture_userInstructor;
    }

    public function getEmailUserInstructor() {
        return $this->email_userInstructor;
    }

    public function setEmailUserInstructor($email_userInstructor) {
        $this->email_userInstructor = $email_userInstructor;
    }

    public function getPassUserInstructor() {
        return $this->pass_userInstructor;
    }

    public function setPassUserInstructor($pass_userInstructor) {
        $this->pass_userInstructor = $pass_userInstructor;
    }

    public function getLastDateUserInstructor() {
        return $this->lastDate_userInstructor;
    }

    public function setLastDateUserInstructor($lastDate_userInstructor) {
        $this->lastDate_userInstructor = $lastDate_userInstructor;
    }

    public function getIsEnableUserInstructor() {
        return $this->isEnable_userInstructor;
    }

    public function setIsEnableUserInstructor($isEnable_userInstructor) {
        $this->isEnable_userInstructor = $isEnable_userInstructor;
    }

    static public function parseJson($_json) {
        $user =  new Instructor(
            isset($_json["name_userInstructor"]) ? $_json["name_userInstructor"] : "",
            isset($_json["lastname_userInstructor"]) ? $_json["lastname_userInstructor"] : "",
            isset($_json["gender_userInstructor"]) ? $_json["gender_userInstructor"] : "",
            isset($_json["birthday_userInstructor"]) ? $_json["birthday_userInstructor"] : "",
            isset($_json["picture_userInstructor"]) ? $_json["picture_userInstructor"] : "",
            isset($_json["email_userInstructor"]) ? $_json["email_userInstructor"] : "",
            isset($_json["pass_userInstructor"]) ? $_json["pass_userInstructor"] : ""
        );
        if(isset($_json["id"]))
            $user->setId((int)$_json["id"]);
        return $user;
    }

    public function insertInstructor($_mysqli, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass) {    
    	$query = "CALL insert_instructor(?, ?, ?, ?, ?, ?, ?)";
    	try {
        	$stmt = $_mysqli->prepare($query);
        	//$stmt->bind_param("ssssbss", $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass);
        	$stmt->execute(array($_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass));
           
        	$this->id = (int)$stmt->insert_id;
        	$stmt->close();
        	
        	/*$response = (object)array("status"=>200,"message"=>"Instructor creado exitosamente.");
        	echo json_encode($response);/
            return true;
    	} catch(Exception $e) {
        	$response = (object)array("status"=>500,"message"=>$e->getMessage());
        	echo json_encode($response);
        	return false;
    	}
    	return false;
	}

	public function updateInstructor($_mysqli, $_id, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass, $_isEnable) {
    	$query = "CALL update_instructor(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    	try {
    	    $stmt = $_mysqli->prepare($query);
    	    $stmt->bind_param("issssbssi", $_id, $_name, $_lastName, $_gender, $_birtdhay, $_imagen, $_email, $_pass, $_isEnable);
    	    $stmt->execute();
    	    $stmt->close();
    	    return true;
    	    /*$response = (object)array("status"=>200,"message"=>"Instructor actualizado exitosamente.");
    	    echo json_encode($response);*
    	} catch(Exception $e) {
    	    $response = (object)array("status"=>500,"message"=>$e->getMessage());
    	    echo json_encode($response);
    	    return false;
    	}
    	return false;
    }

    public function deleteInstructor($_mysqli) {
        $query = "CALL delete_instructor(?)";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("i", $this->id);
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

    public static function findInstructorByEmail($_mysqli, $_email){
        try{
          $sql = "CALL get_instructor_by_email(?)";
         $stmt = $_mysqli->prepare($sql);
         $stmt->bind_param("s", $_email);
         $stmt->execute();
         $result = $stmt->get_result();
    
         while ($row = $result->fetch_assoc()) {
           if (array_key_exists('message', $row)) { // instructor deshabilitado
               return "Deshabilitado";
           }
           else if (array_key_exists('notExist', $row)) { // instructor deshabilitado
               return "Inexistente";
           }    
           else { // instructor habilitado              
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

/*    public static function findInstructorByEmail($_mysqli, $_email){
        $sql = "CALL get_instructor_by_email(?)";
        $stmt = $_mysqli->prepare($sql);
        $stmt->bind_param("s", $_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $instructors = array();
    
        while ($row = $result->fetch_assoc()) {
          if (array_key_exists('message', $row)) { // instructor deshabilitado
              array_push($instructors, $row);
          } else { // instructor habilitado
              $instructor = Instructor::parseJson($row);
              array_push($instructors, $instructor);
          }
        }
        return $instructors;
    }
    public static function findInstructorByID($_mysqli, $_id){
        $sql = "CALL get_instructor_by_id(?)";
        $stmt = $_mysqli->prepare($sql);
        $stmt->bind_param("i", $_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $instructors = array();
        while ($row = $result->fetch_assoc()) {
            $instructor = Instructor::parseJson($row);
            array_push($instructors, $instructor);
        }
        
        return $instructors;
    }

    public static function getAllInstructors($_mysqli) {
        $sql = "CALL get_all_instructors()";
        $stmt = $_mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $instructors = array();
        while ($row = $result->fetch_assoc()) {
            $instructor = Instructor::parseJson($row);
            $instructors[] = $instructor;
        }
        return $instructors;
    }

    public static function getAllEnabledInstructors($_mysqli) {
        $sql = "CALL get_all_enabled_instructors()";
        $stmt = $_mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $instructors = array();
        while ($row = $result->fetch_assoc()) {
            $instructor = Instructor::parseJson($row);
            $instructors[] = $instructor;
        }
        return $instructors;
    }

    public static function updateLoginAttemptsCounter($_mysqli, $_email) {
     try {
            $sql = "CALL increment_userInstructor_counter(?)";
            $stmt = $_mysqli->prepare($sql);
            $stmt->bind_param("s", $_email);
            $stmt->execute();
            $stmt->close();
            return true;
            /*$response = (object)array("status"=>200,"message"=>"Instructor eliminado exitosamente.");
            echo json_encode($response);
        } catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }     
       return false;

    }

}*/


?>