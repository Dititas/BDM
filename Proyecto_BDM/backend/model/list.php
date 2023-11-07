<?php
class List{
    public function addList($_mysqli, $_name, $_description, $_isPublic, $_userOwner){
        $query = "CALL addList(?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssss", $_name, $_description, $_isPublic, $_userOwner); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
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

    public function addImageList($_mysqli, $_image, $_id){
        $query = "CALL addImageList(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_image, $_id); // Enlaza los parámetros con bind_param
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

    public function addProductToList($_mysqli, $_idList, $_idProduct){
        $query = "CALL addProductToList(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_idList, $_idProduct); // Enlaza los parámetros con bind_param
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

    public function modifyList($_mysqli, $_id, $_name, $_description, $_isPublic){
        $query = "CALL modifyList(?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssss", $_id, $_name, $_description, $_isPublic); // Enlaza los parámetros con bind_param
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

    public function getListByName($_mysqli, $_name){
        $query = "CALL getListByName(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_name); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $products = array();
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function getListByUser($_mysqli, $_id){
        $query = "CALL getListByUser(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $products = array();
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function deleteLogicalList($_mysqli, $_id){
        $query = "CALL deleteLogicalList(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id); // Enlaza los parámetros con bind_param
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
}
?>