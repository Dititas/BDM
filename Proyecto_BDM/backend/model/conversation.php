<?php
class Conversation{
    public function addConversation($_mysqli, $_seller, $_buyer, $_product){
        $query = "CALL addConversation(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_seller, $_buyer, $_product); // Enlaza los parámetros con bind_param
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

    public function addMessage($_mysqli, $_text, $_conversation, $_sender){
        $query = "CALL addMessage(?,?,?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("sss", $_text, $_conversation, $_sender); // Enlaza los parámetros con bind_param
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

    public function getConversationsSeller($_mysqli, $_seller){
        $query = "CALL getConversationsSeller(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_seller); // Enlaza el parámetro con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $conversations = array();
            while ($row = $result->fetch_assoc()) {
                $conversations[] = $row;
            }
            return $conversations;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function getConversationsBuyer($_mysqli, $_buyer){
        $query = "CALL getConversationsBuyer(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_buyer); // Enlaza el parámetro con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $conversations = array();
            while ($row = $result->fetch_assoc()) {
                $conversations[] = $row;
            }
            return $conversations;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }

    public function getAllMessages($_mysqli, $_idConversation){
        $query = "CALL getAllMessages(?);";
        try {
            $stmt = $_mysqli->prepare($query);
            $stmt->bind_param("s", $_idConversation); // Enlaza el parámetro con bind_param
            $stmt->execute(); // No se pasan argumentos a execute
            $result = $stmt->get_result();
            $stmt->close();
            $messages = array();
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
            return $messages;
        } catch (Exception $e) {
            $response = (object)array("status" => 500, "message" => $e->getMessage());
            echo json_encode($response);
            return null;
        }
        return null;
    }
}
?>