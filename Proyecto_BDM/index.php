<?php 

session_start();
if(!isset($_SESSION["AUTH"])){
	include_once "./views/dashboard.php"; //No hay sesión
}else{
    require_once "./views/dashboard.php";
}
