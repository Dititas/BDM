<?php
class User{
    public function insertUser($_mysqli, $_email, $_username, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic, $_rol){
        $query = "CALL insertUser(?,?,?,?,?,?,?,?,?,?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_email, $_username, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic, $_rol));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateUserByUser($_mysqli, $_id, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic){
        $query = "CALL updateUserByUser(?,?,?,?,?,?,?,?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_id, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateUserByAdmin($_mysqli, $_id, $_isEnable){
        $query = "CALL updateUserByAdmin(?,?);";
        try{
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(array($_id, $_isEnable));
            $stmt->close();
            return true;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function selectOneUser($_mysqli, $_identification){
        $query = "CALL selectOneUser(?);";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute(array($_identification));
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                return $row;
            }
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null
    }

    public function checkOneUserExists($_mysqli, $_identification){
        $query = "CALL checkOneUserExists(?);";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute(array($_identification));
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                return $row;
            }
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null
    }

    public function checkOneUserEnabled($_mysqli, $_identification){
        $query = "CALL checkOneUserEnabled(?);";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute(array($_identification));
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                return $row;
            }
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null
    }

    public function selectAllUsers(){
        $query = "CALL selectAllUser();";
        try{
            $stmt = $_mysqli->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $users = array();
            while($row = $result->fetch_assoc()){
                $users[] = $row;
            }
            return $users;
        }catch(Exception $e) {
            $response = (object)array("status"=>500,"message"=>$e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null
    }
}
?>