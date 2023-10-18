<?php
    class dbConnection {
        static public function connect() {
            $host = "localhost";
            $db = "bytesandbits";
            $user = "root";
            $pass = "";
            try {
                $mysqli = new mysqli($host,$user,$pass,$db);
                if ($mysqli->connect_errno) {
                    $response = (object)array("status"=>500,"message"=>$mysqli->connect_error);
                    echo json_encode($response);
                    die("Error de conexión: " . $mysqli->connect_error);
                }

            } catch(Exception $e) {
                $response = (object)array("status"=>500,"message"=>"Error a conectarse a la base de datos.");
                echo json_encode($response);
                exit;
            }
            return $mysqli;
        }
      
    }
?>