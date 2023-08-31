<?php

class Admin {  

  function  getUserAdminByEmail($_mysqli, $_email) {

  	$query = "CALL obtenerAdminEmail(?)";     
    try{
      $stmt = $_mysqli->prepare($query);
      $stmt->execute(array($_email));
      $result = $stmt->get_result();
      $admin = array();
      
      while ($row = $result->fetch_assoc()) {  
        $auxAdmin = array(
          "Nombre" => $row["name_userAdmin"],
          "Correo" => $row["email_userAdmin"],
          "Pass" => $row["pass_userAdmin"]
        ); 
        array_push($admin, $auxAdmin);
      }
      return $admin;
    }catch(Exception $e){
      $response = (object)array("status"=>500,"message"=>$e->getMessage());
      echo json_encode($response);
      return false;
    }  	
	}

}

?>