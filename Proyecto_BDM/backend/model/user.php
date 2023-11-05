<?php
class User
{
    public function insertUser($_mysqli, $_email, $_username, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic, $_rol)
    {
        $query = "CALL insertUser(?,?,?,?,?,?,?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssssssssss", $_email, $_username, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic, $_rol); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $stmt->close();
            return true;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateUserByUser($_mysqli, $_id, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic)
    {
        $query = "CALL updateUserByUser(?,?,?,?,?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssssssss", $_id, $_password, $_name, $_lastName, $_birthdate, $_image, $_gender, $_isPublic); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $stmt->close();
            return true;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function updateUserByAdmin($_mysqli, $_id, $_isEnable)
    {
        $query = "CALL updateUserByAdmin(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ii", $_id, $_isEnable);
            $stmt->execute();
            $stmt->close();
            return true;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return false;
        }
        return false;
    }

    public function selectOneUser($_mysqli, $_identification)
    {
        $query = "CALL selectOneUser(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_identification); // Enlaza el parámetro con bind_param
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function checkOneUserExists($_mysqli, $_identification)
    {
        $query = "CALL checkOneUserExists(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_identification); // Enlaza el parámetro con bind_param
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function checkOneUserEnabled($_mysqli, $_identification)
    {
        $query = "CALL checkOneUserEnabled(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_identification); // Enlaza el parámetro con bind_param
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function selectAllUsers($_mysqli)
    {
        $query = "CALL selectAllUser();";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $users = array();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function searchUser($_mysqli, $_search)
    {
        $query = "CALL searchUser(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_search); // Enlaza el parámetro con bind_param
            $stmt->execute();
            $result = $stmt->get_result();
            $users = array();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }
}
