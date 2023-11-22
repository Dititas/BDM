<?php
require_once "../utils/dbConnection.php";
require_once "../model/conversation.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idConversation'])) {
        $idConversation = $_POST['idConversation'];

        $mysqli = dbConnection::connect();

        $conversationModel = new Conversation();
        $result = $conversationModel->getAllMessages($mysqli, $idConversation);

        if ($result !== null) {
            $json_response = ["success" => true, "messages" => $result];
        } else {
            $json_response = ["success" => false, "msg" => "Error al obtener los mensajes"];
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
