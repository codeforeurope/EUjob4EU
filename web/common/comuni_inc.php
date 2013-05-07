<?php 

include("env_vars_inc.php"); 

if ($_SERVER['HTTP_HOST']=="yourIPaddress") {
	//if https last 2 true true!!!
	session_set_cookie_params(3600, "/yourRootDirectory".$test_env, "yourPublicIPaddress", false, true);
}
session_start();
//session_regenerate_id();
//ini_set("display_errors","on");
error_reporting('E_ALL');
?>
<?php
mb_internal_encoding("UTF-8");
include("db_inc.php");
include("conn_inc.php");
include("functions_inc.php");
connect();

//filter malicious code
$input_post = array();

$VarsToInt = (array("a_id", "author_id", "c_o", "cv_id", "dir", "employer_id", "f_o", "id", "id", "img_dir", "i_o", "manager_id", "monthly_wage", "n_o", "n_vacancies_left", "n_vacancies", "o_o", "vacancy_id", "v_id", "e_id"));

foreach($_POST as $key => $input_post)
{
	if (in_array($key, $VarsToInt))
	{
		if ( (is_numeric($input_post)===true)&&((int)$input_post==$input_post))
		{
			$_POST[$key]=intval($input_post);
		} else {
			scrivilog(5, '1', "$a_id", "$a_user", $_SERVER['REMOTE_ADDR'], '0', "invalid value in post string $key $input_post " . $_SERVER['SCRIPT_NAME'], $tbl_logging);
?>
                <script language="javascript">
                alert('Please log back in!');
                parent.location='<?php echo $webaddress ?>';
                </script>
<?
		die("Errore");
		}
		
	} else {
	
			//$_POST[$key]=mysql_real_escape_string(htmlentities($input_post), $mySqlconn);
			$_POST[$key]=mysql_real_escape_string(htmlentities($input_post, ENT_NOQUOTES, "UTF-8"));
	}
	
	//$_POST[$key]=addslashes(htmlentities($input_post));
}		
//var_dump($_POST);
$input_get = array();

foreach($_GET as $key => $input_get)
{
	if (in_array($key, $VarsToInt))
	{
		if ( (is_numeric($input_get)===true)&&((int)$input_get==$input_get))
		{
			$_GET[$key]=intval($input_get);
		} else {
			scrivilog(5, '1', "$a_id", "$a_user", $_SERVER['REMOTE_ADDR'], '0', "invalid value in querystring $key $input_get", $tbl_logging);
?>
			<script language="javascript">
      alert('Please log back in!');
      parent.location='<?php echo $webaddress ?>';
      </script>
<?
			die("Errore");
			//echo "invalid value in querystring $key $input_get";
		}
		
	} else {
			$_GET[$key]=mysql_real_escape_string(htmlentities($input_get, ENT_NOQUOTES, "UTF-8"));
	
	}
	
	//$_POST[$key]=addslashes(htmlentities($input_post));
}		

/*foreach($_GET as $key => $input_get)
	$_GET[$key]=addslashes(htmlentities($input_get));*/
	

?>
<?php

$a_login_failed = "Wrong login data!";
$u_login_failed = "Wrong login data!";
$a_login_file = "../access/login_access.php";
$e_login_file = "../employer/employer_login.php";
$e_login_failed = "Wrong login data!";

$webaddress = "http://www.yourdomain_public";
$admin_webaddress = "http://www.yourdomain_admin";


?>
