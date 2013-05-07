<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

$cv_id = $_POST['cv_id'];


if (isset($_POST['submitcv8'])){
	$query = "UPDATE $tbl_cv SET additionalinfo='".$_POST['cv8_additionalinfo']."' WHERE id = ".$cv_id;
	insquery($query);

}

if ( isset($_POST['sendcode']) ){

	//check if the code is present
	$query = "SELECT retrievalcode, email FROM $tbl_cv WHERE id = ".$cv_id; 
	//echo "kjh".$query;die();
	$res = query($query);
	$row = mysql_fetch_assoc($res);
	$retrievalcode = $row['retrievalcode'];
	$email_cv = $row['email'];
	//$email_cv = "m.zini@provincia.roma.it";//test 
	
	//a new code if not present
//	$inviaemail = "";
//	if (trim($retrievalcode)==""){	
//		$retrievalcode = time().$cv_id;
//		$query.= ", retrievalcode = '" .$retrievalcode. "'";
//		$inviaemail = "1";
//	}	
	
	//scrivi l'evento di finalizzazione cv nei log
	//scrivilog(0, '0', $cv_id, $cv_name, $_SERVER['REMOTE_ADDR'], '1', "CV retrieval code created", $tbl_logging);

	
	include_once("Mail.php"); 
	$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
	$To = $email_cv;
	$Subject = "EUJob4EU - your CV retrieval code"; 
	$Message = "The retrieval code $retrievalcode has been associated to this CV.
			Use it in conjunction with your name, ".$_SESSION['cv_name'].", to edit your CV within ".$cv_edit_hours." hours from its creation or to view / print it in the future.\n
			You may contact a Your First Eures Job representative for further info by visiting our project web page at:\n
			http://www.portafuturo.it/servizi/your-first-eures-job";
	$Host = "mail.provincia.roma.it"; 
	$Username = $smtp_user; 
	$Password = $smtp_pw; 
	
	$msg="";
	$mostrainvio="";
	
	if ( isset($_POST['resendemail'])&&$_POST['resendemail']=="1" )
	{
		//send email	
		if ($_SERVER['HTTP_HOST']=="127.0.0.1") { //local server
				$msg = "local - Email message succesfully sent!"; 
		} else {
			//production server
			$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
			$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
			'username' => $Username, 'password' => $Password)); 
		
		
			$mail = $SMTP->send($To, $Headers, $Message); 
				
			if (PEAR::isError($mail)){ 
				$msg = $mail->getMessage(); 
			} else { 
				$msg = "Email message succesfully sent!"; 
				scrivilog(0, '0', $cv_id, $cv_name, $_SERVER['REMOTE_ADDR'], '1', "Retrieval code sent", $tbl_logging);
			} 
		}	
		//end send email
	} else {
		$mostrainvio = "1";
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
<?php if ($msg!=""){ //email sent?>
	<script language="javascript">alert('<?php echo $msg ?>');</script>
<?php }?>
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>THE CV DATA HAS BEEN SAVED.</h1> <strong><?php echo $msg ?></strong><br /><br />

<?php if ( $inviaemail == "1"||isset($_POST['resendemail']) ){ ?>
	An email message has been sent to <?php echo $email_cv ?> with the retrieval code,  
<strong><?php echo $retrievalcode ?></strong>, associated to this CV; use it in conjunction with your name, <strong><?php echo $_SESSION['cv_name'] ?></strong>, to edit within <?php echo $cv_edit_hours ?> hours or to view / print your EU CV in the future.<br />
<br />
        Keep in mind that when you will close the internet browser you will not be able to modify your CV data by yourself but you will need to <a href="mailto:euresjob@provincia.roma.it">contact</a> a <em><strong>Your First Eures Job representative</strong></em>.<br />
<br />
<?php } else { ?>

<?php }?>
<br />
      <div align="right">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="inviaemail" id="inviaemail">
      <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_8.php'"  />
      <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
<input type="hidden" name="resendemail" id="resendemail" value="1" />
<input type="hidden" name="cv_id" id="cv_id" value="<?php echo $_POST['cv_id'] ?>" />
<?php if ( $mostrainvio == "1"&&$_SESSION['a_ok']=="1" ){ ?>
  <input type="submit" name="sendcode" id="sendcode" value="Send code to <?php echo $email_cv ?>" />
<?php } ?>
</form>     
      </div>
       </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

