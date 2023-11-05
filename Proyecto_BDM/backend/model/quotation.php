<?php
class Quotation
{
    public function addQuotationBuyerRequest($_mysqli, $_specifications, $_product, $_user){
        $query = "CALL addQuotationBuyerRequest(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_specifications, $_product, $_user); // Enlaza los parámetros con bind_param
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

    public function modifyQuotationSellerResponse($_mysqli, $_id, $_expirationDate, $_priceAgreed){
        $query = "CALL modifyQuotationSellerResponse(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_id, $_expirationDate, $_priceAgreed); // Enlaza los parámetros con bind_param
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

    public function getAllQuotationOneBuyer($_mysqli, $_id){
        $query = "CALL getAllQuotationOneBuyer(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $quotations = array();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                $quotations[] = $row;
            }
            return $quotations;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function getAllQuotationOneSeller($_mysqli, $_id){
        $query = "CALL getAllQuotationOneSeller(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $quotations = array();
            $stmt->close();
            while ($row = $result->fetch_assoc()) {
                $quotations[] = $row;
            }
            return $quotations;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function deleteLogicalQuotation($_mysqli, $_id){
        $query = "CALL deleteLogicalQuotation(?);";
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