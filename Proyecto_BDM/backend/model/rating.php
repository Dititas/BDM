<?php
class Rating{
    public function addRating($_mysqli, $_score, $_comment, $_product, $_user){
        $query = "CALL addRating(?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ssss", $_score, $_comment, $_product, $_user); // Enlaza los parámetros con bind_param
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

    public function modifyRating($_mysqli, $_idRating, $_score, $_comment, $_isEnable, $_user){
        $query = "CALL modifyRating(?,?,?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sssss", $_idRating, $_score, $_comment, $_isEnable, $_user); // Enlaza los parámetros con bind_param
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

    public function getRatingByUser($_mysqli, $_user){
        $query = "CALL getRatingByUser(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_user); // Enlaza los parámetros con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $ratings = array();
            while ($row = $result->fetch_assoc()) {
                $ratings[] = $row;
            }
            return $ratings;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

}
?>