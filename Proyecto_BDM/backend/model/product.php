<?php
class Product{
    public function insertProduct($_mysqli, $_name, $_description, $_image, $_quotation, $_price, $_quantityAvailable, $_user)
    {
        $query = "CALL insertProduct(?,?,?,?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sssssss", $_name, $_description, $_image, $_quotation, $_price, $_quantityAvailable, $_user); // Enlaza los parámetros con bind_param
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

    public function insertImage($_mysqli, $_image, $_product)
    {
        $query = "CALL insertImage(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_image, $_product); // Enlaza los parámetros con bind_param
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

    public function insertVideo($_mysqli, $_video, $_product)
    {
        $query = "CALL insertImage(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_video, $_product); // Enlaza los parámetros con bind_param
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

    public function selectOneProduct($_mysqli, $_id)
    {
        $query = "CALL selectOneProduct(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id); // Enlaza los parámetros con bind_param
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

    public function searchProduct($_mysqli, $_search)
    {
        $query = "CALL searchProduct(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_search); // Enlaza los parámetros con bind_param
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

    public function getAverageProductRatings($_mysqli, $_productId)
    {
        $query = "SELECT getAverageProductRatings(?) AS avgRating;";

        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("i", $_productId); 
            $stmt->execute();

            
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $stmt->close();

            return $row['avgRating'];
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
    }

    public function isProductInCart($_mysqli, $_userId, $_productId)
    {
        $query = "SELECT productInCart(?, ?) AS isInCart;";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ii", $_userId, $_productId);
            $stmt->execute();
    
            
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            $stmt->close();
    
            return $row['isInCart'] == 1;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
    }

}
?>