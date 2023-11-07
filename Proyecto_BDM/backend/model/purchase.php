<?php
class Purchase{
    public function addPurchase($_mysqli, $_productId, $_buyerId){
        $query = "CALL addPurchase(?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("ss", $_productId, $_buyerId); // Enlaza los parámetros con bind_param
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