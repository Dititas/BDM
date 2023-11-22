<?php
require_once "../utils/dbConnection.php";
require_once "../model/conversation.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['seller'])) {
        $seller = $_POST['seller'];

        $mysqli = dbConnection::connect();

        $conversationModel = new Conversation();
        $result = $conversationModel->getConversationsSeller($mysqli, $seller);

        if ($result !== null) {
            $json_response = ["success" => true, "conversations" => $result];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener las conversaciones"];
        }

        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    } else {
        $json_response = ["success" => false, "msg" => "Verifique sus datos, están corruptos"];
        header('Content-Type: application/json');
        echo json_encode($json_response);
        exit();
    }
}
?>
