<?php
class Cart{
    public function addCart($_mysqli, $_idUser){
        $query = "CALL addCart(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_idUser); // Enlaza los parámetros con bind_param
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

    public function addProductInCart($_mysqli, $_quantity, $_product, $_cart){
        $query = "CALL addProductInCart(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_quantity, $_product, $_cart); // Enlaza los parámetros con bind_param
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

    public function getCartByUser($_mysqli, $_idUser){
        $query = "CALL getCartByUser(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_idUser); // Enlaza el parámetro con bind_param
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

    public function getProductsInCart($_mysqli, $_idCart){
        $query = "CALL getProductsInCart(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_idCart); // Enlaza el parámetro con bind_param
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
}
?>