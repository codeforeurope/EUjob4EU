<?php 

//mySql connection
// mysql_close not necessary
function connect() {
	global $dbMySql,$host,$userMySql,$pwMySql;
	$mySqlconn = mysql_connect($host,$userMySql,$pwMySql);
	mysql_set_charset('utf8_general_ci',$mySqlconn); 
	mysql_select_db($dbMySql,$mySqlconn);
	return $mySqlconn;
}

//clean queries
function cleanQuery($string)
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  if (phpversion() >= '4.3.0')
  {
    $string = mysql_real_escape_string($string);
  }
  else
  {
    $string = mysql_escape_string($string);
  }
  return $string;
}

//query function
function query($query) {
	//global $DIRLOG;
	cleanQuery($query);
	$res = mysql_query($query);
	if ($res==false) {
/*			error_log (date('H:i:s')." ".$_SERVER["PHP_SELF"].", ".mysql_error()."\n ".
			$query."\n", 3,
			$DIRLOG.date('y-m-d')."_mysql.txt");
*/			?>
      <script language="javascript">
      alert('Please log in!');
			parent.location='../access/index.php';
      </script>
      <?php
			die("Please log in!");

			//error_log("You messed up!", 3, "/var/tmp/my-errors.log");
			return false;
	}
	else return $res;
}

//command function
function insquery($query) {
	//global $DIRLOG;
	cleanQuery($query);
	$insert = mysql_query($query);
	if ($insert==false) {
/*		error_log (date('H:i:s')." ".$_SERVER["PHP_SELF"].", ".mysql_error()."\n ".
			$query."\n", 3,
			$DIRLOG.date('y-m-d')."_mysql.txt");
*/			//error_log("You messed up!", 3, "/var/tmp/my-errors.log");
			?>
      <script language="javascript">
      alert('Please log in!');
			parent.location='../access/index.php';
      </script>
      <?php
			die("Please log in!");
	}
	return $insert;
}

//returns a single value
function retval($field,$tab,$where,$val){
	$query="SELECT $field FROM $tab WHERE $where = '$val'";
	cleanQuery($query);
	$res=query($query);
	$row=mysql_fetch_assoc($res);
	return $row[$field]; 
}

//connect();

$tbl_prefix = "yfej_";

$tbl_admin 						= $tbl_prefix."admin";
$tbl_cv 							= $tbl_prefix."cv";
$tbl_cv_dossier				= $tbl_prefix."cv_dossier";
$tbl_cv_isco 					= $tbl_prefix."cv_isco";
$tbl_cv_questionnaire = $tbl_prefix."cv_questionnaire";
$tbl_edu 							= $tbl_prefix."cv_edu";
$tbl_employers 				= $tbl_prefix."employer";
$tbl_employer_dossier	= $tbl_prefix."employer_dossier"; 
$tbl_eu_member				= $tbl_prefix."eu_member";
$tbl_img_dir 					= $tbl_prefix."img_dir";
$tbl_isco							= $tbl_prefix."isco";
$tbl_lang 						= $tbl_prefix."cv_lang";
$tbl_logging					= $tbl_prefix."logging";
$tbl_match						= $tbl_prefix."match";
$tbl_match_status			= $tbl_prefix."match_status";
$tbl_questionnaire 		= $tbl_prefix."questionnaire";
$tbl_vacancy 					= $tbl_prefix."vacancy";
$tbl_wrkexp 					= $tbl_prefix."cv_wrkexp";



?>
