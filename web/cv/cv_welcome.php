<?php include('../common/comuni_inc.php'); ?>

<?php 

if ($_SESSION['a_id']!="")
	$a_id = $_SESSION['a_id'];
else
	$a_id = 0;

$user = $_POST['firstname']." ".$_POST['lastname'];
//cv invoked by retrieval code
if (isset($_POST['viewcv'])){
	$query = "SELECT (`date_editable` - NOW()) as is_editable,TIMEDIFF(`date_editable`, NOW()) as edit_time_left,$tbl_cv.* FROM $tbl_cv WHERE firstname ='".trim($_POST['firstname'])."' AND lastname = '".trim($_POST['lastname'])."' AND retrievalcode = '".trim($_POST['retrievalcode'])."' AND status <> '0'";
	//echo $query;exit;
	$res_edit = query($query);
	if (mysql_num_rows($res_edit)==0){
	
	//system log
	//scrivilog($log_severity, $log_is_relevant, $log_user_id, $log_username, $log_request_ip, $log_success, $log_event_description, $log_table)
	scrivilog(1, '1', $a_id, $user, $_SERVER['REMOTE_ADDR'], '0', "modifica cv fallito ".$_POST['retrievalcode'], $tbl_logging);
		?>
        <script>
        alert('No match found!\nPlease verify your data and try again.');
        parent.location='<?php echo $webaddress ?>';
        </script>
        <?php
		//echo "sdfsfsdf";
		exit;
	}else{
		$row_edit = mysql_fetch_assoc($res_edit);
		$cv_name = $row_edit['lastname']." ".$row_edit['firstname'];
		$cv_id = $row_edit['id'];
		$is_editable = ((int)($row_edit['is_editable'])>0)?"1":"0";
		$edit_time_left=$row_edit['edit_time_left'];
		//iframe header
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

		$_SESSION['cv_id']=$cv_id;
		$_SESSION['cv_name']=$cv_name;
		$_SESSION['u_ok']="1";
		$_SESSION['edit_by_user']="1";
		$_SESSION['is_editable']=$is_editable;
		$_SESSION['edit_time_left']=$edit_time_left;

		//system event log
		//scrivilog($log_severity, $log_is_relevant, $log_user_id, $log_username, $log_request_ip, $log_success, $log_event_description, $log_table)
		scrivilog(0, '0', $a_id, $user, $_SERVER['REMOTE_ADDR'], '1', "modifica cv $cv_name", $tbl_logging);
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include('../includes/metatags.php'); ?>
  <?php include('../includes/title.php'); ?>
  
  <link rel="stylesheet" type="text/css" href="../common/application.css" />  
  <link rel="stylesheet" type="text/css" href="../common/menu.css" />  
  
  <script type="text/javascript" src="../common/total.js"></script>
  <script type="text/javascript" src="../common/application.js"></script>
  <script type="text/javascript" src="../common/mm.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  
</head>

<body>
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application"> 
<link rel="stylesheet" type="text/css" href="../common/application.css" />
<?php include("../includes/sections.php"); ?>
<h1>&nbsp;</h1>
<h1>SYSTEM ACCESS<br />

  
    Candidate: <strong><?php	echo $cv_name ?></strong></h1>
<p>
Push the buttons below to view/edit your CV.<br />
<?php if ($is_editable=="1"){ ?>
You may edit your CV within the next <?php echo $edit_time_left ?> (hh:mm:ss) hours.
<?php }?>
</p>
<form target="_self" method="post" name="managecv" id="managecv">
<?php if ($is_editable=="1"){ ?>
  <input name="gotocv1" type="button" value="Edit CV" onClick="window.location.href='cv_1.php'"  />
<?php }else{?>
  <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onClick="javascript:window.open('cv_full.php', 'blank');" />
<?php }?>
</form>   </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>
