<?php 
//echo "HTTP_HOST".$_SERVER['HTTP_HOST'];
//echo "SERVER_NAME".$_SERVER['SERVER_NAME'];
//exit;
	
if ($_SERVER['SERVER_NAME']=="127.0.0.1") {

	$host="localhost";
	$dbMySql="yfej";
	$userMySql="root";
	$pwMySql="";

} else {
	$host="localhost";
	$dbMySql="dbName".$test_env;
	$userMySql="dbUser";
	$pwMySql="dbPW";
	

}
?>
