<?php
class Product
{
    public function insertProduct($_mysqli, $_name, $_description, $_image, $_quotation, $_price, $_quantityAvailable, $_user)
    {
        $query = "CALL insertProduct(?,?,?,?,?,?,?);";

        try {
            $stmt = $_mysqli->prepare($query);

            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $_mysqli->error);
            }

            $stmt->bind_param("sssssss", $_name, $_description, $_image, $_quotation, $_price, $_quantityAvailable, $_user);

            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }

            // Verificar el número de filas afectadas
            $rowsAffected = $stmt->affected_rows;

            $stmt->close();

            if ($rowsAffected > 0) {
                return true; // Éxito
            } else {
                return false; // No se insertaron filas, posible error
            }
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage(), "quotation", $_quotation, " name", $_name);
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
