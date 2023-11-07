<?php
class Category{
    public function addCategory($_mysqli, $_name, $_description, $_userOwner){
        $query = "CALL addCategory(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_name, $_description, $_userOwner); // Enlaza los parámetros con bind_param
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

    public function addProductInCategory($_mysqli, $_idProduct, $_idCaegory){
        $query = "CALL addProductInCategory(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_idProduct, $_idCaegory); // Enlaza los parámetros con bind_param
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

    public function modifyCategory($_mysqli, $_id, $_name, $_description, $_isEnable){
        $query = "CALL modifyCategory(?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssss", $_id, $_name, $_description, $_isEnable); // Enlaza los parámetros con bind_param
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

    public function getAllCategories(){
        $query = "CALL getAllCategories();";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $categories = array();
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
            return $categories;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function getProductByCategory($_mysqli, $_id){
        $query = "CALL getProductByCategory(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $categories = array();
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
            return $categories;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }
}
?>