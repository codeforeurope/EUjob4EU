<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>
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
	<?php include("../includes/sections.php"); ?>
	<?php include_once("Mail.php"); 

//rescue the cv 
$query = "SELECT * FROM $tbl_cv WHERE id = ".$_GET['cv_id'];
$res = query($query);
$row = mysql_fetch_assoc($res);

if (isset($_POST['send_code'])){

	if (intval($_POST['edit_task'])>0){
		$query="update $tbl_cv set date_editable = DATE_ADD( NOW(), INTERVAL ".intval($_POST['edit_task'])." HOUR ),
		time_extensions = time_extensions+1 where id=".$_GET['cv_id'];
		insquery($query);
	}

	$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
	$Subject = "EUJob4EU - your CV retrieval/edit code"; 
	$Host = "mail.provincia.roma.it"; 
	$Username = $smtp_user; 
	$Password = $smtp_pw; 
	$msg="";
	$query="select distinct id, firstname, lastname, email, retrievalcode, date_editable from $tbl_cv where id =".$_GET['cv_id'];
	$res=query($query);
	$To = $row['email'];
	
	//////////////////////////////////////////
	$Message = "Your application for admission to the Your First Eures Job - Recruitment of young European mobile workers project has been correctly registered in the EUJob4EU data management tool.<br />
We inform you that your CV may be modified before ".euDate($row['date_editable'])." by using the access info below the line. We remind you that, in order to enable the matching routine between your profile and the job requests, you have to describe you professional profile for which you intend to apply using all three description levels in the DESIRED EMPLOYMENT / OCCUPATIONAL FIELD page of the CV creation tool.<br /><br />
	
	Thank you<br /><br />
	EUJob4EU - Ufficio Monitoraggio e Progetti Europei<br />
	==================================================<br />
	URL: http://www.yourfirsteuresjob.eu/eujob4eu<br />
	Push the button 'Access your CV'<br /><br />
	
	Retrieval code: ".$row['retrievalcode']."<br />
	First name: ".$row['firstname']."<br />
	Last name: ".$row['lastname']."<br />";
	//////////////////////////////
	
	//send email
	$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
	$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
	'username' => $Username, 'password' => $Password)); 
	
	$mail = $SMTP->send($To, $Headers, str_replace("<br />", "\n", $Message)); 
	
		
	if (PEAR::isError($mail)){ 
		$msg .= $mail->getMessage(); 
	} else { 
		$msg .= "<br /><br /><br />E-mail succesfully sent to ".$row['firstname']." ".$row['lastname']."<br /><br />You may (eventually) copy all the text below the line and send it to <a href=\"mailto:".$To."\">".$To."</a>"; 
	} 
	$msg.= "<br /><br />==================================================<br /><br />".$Message."<br />";
	?>
	<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
    	<tr>
        <td class="application">
	<?php echo $msg;?>
				</td>
			</tr>
	</table>
	<?php
} else {

?>
	<h1>&nbsp;</h1>
	<h1>CV EDIT WINDOW MANAGEMENT<br />
Candidate: <?php echo $row['firstname']." ".$row['lastname']; ?></h1>
      <p> Choose the task to perform with the drop-down menu and push the 'Send code to <?php echo $row['email'] ?>' button:      </p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?cv_id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data" name="sendcode" target="_self">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
    	<tr>
        <td class="blue">Task:
        <select name="edit_task">
          <option value="0">send code</option>
          <option value="24">send code and make the CV editable for 24 hours</option>
          <option value="48">send code and make the CV editable for 48 hours</option>
          <option value="96">send code and make the CV editable for 96 hours</option>
        </select>
        </td>
      </tr>
      <tr>
        <td valign="bottom">
        <div align="right">
        <input name="gotolist" type="button" value="&lt;&lt; Back" onclick="window.location.href='cv_list.php'" />
        <input type="submit" value="Send code to <?php echo $row['email'] ?>" name="send_code" id="send_code" title="Search" onClick="" />
        </div>
        </td>
    	</tr>
    </table>
    </form>
<?php }?>
      </td>
  </tr>
</table>

</body>
</html>
<?php include('../common/bot.php'); ?>

