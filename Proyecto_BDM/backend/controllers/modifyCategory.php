<?php
require_once "../utils/dbConnection.php";

class CategoryController
{
    public function modifyCategory($id, $name, $description, $isEnable)
    {
        $mysqli = dbConnection::connect();
        $stmt = $mysqli->prepare("CALL modifyCategory(?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $name, $description, $isEnable);
        
        if ($stmt->execute()) {
            $stmt->close();
            return ["success" => true, "msg" => "Categoría modificada con éxito"];
        } else {
            $stmt->close();
            return ["success" => false, "msg" => "Error al modificar la categoría"];
        }
    }
}
?>