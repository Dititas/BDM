<?php 

session_start();
if(!isset($_SESSION["AUTH"])){
	include_once "./views/dashboard.php";
}else{
	/*echo "<pre>";
    print_r($_SESSION["AUTH"]);
    echo "</pre>";
	$activeSesion = $_SESSION['AUTH'];
	echo $activeSession;*/
	require_once "./views/dashboard.php";	
}
