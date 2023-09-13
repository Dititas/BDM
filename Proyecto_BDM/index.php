<?php 
/*
session_start();
if(!isset($_SESSION["AUTH"])){
	include_once "./views/dashboard.php";
}else{
	require_once "./views/dashboard.php";
}
*/
header("Location: views/login.php");
exit;
?>
