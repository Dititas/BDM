<?php
session_start(); // Iniciamos la sesión

// Eliminamos todas las variables de sesión
$_SESSION = array();

// Destruimos la sesión
session_destroy();

// Redireccionamos al usuario a la página de inicio de sesión
header("Location: ./../../index.php");
exit;
?>