<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

//echo addslashes($_POST['cv1_skype']);exit;
$bdate = $_POST['cv1_bdateyear']."-".$_POST['cv1_bdatemonth']."-".$_POST['cv1_bdateday'];

$cv_status = "1";//cv valid by default

//created by an operator
if (isset($_SESSION['a_id'])){$manager_id=$_SESSION['a_id'];}else{$manager_id=0;}

if (isset($_POST['submitcv1'])&&$_POST['cv1_lastname']!=""&&$_POST['cv1_firstname']!=""){

if (!validate_email($_POST['cv1_email']))
{
	$_SESSION['invalidEmail']=true;
	header("location: cv_1.php");
}

$cv_id = -1;

	//new cv
	$query = "INSERT INTO $tbl_cv (`bdate`, `lastname`, `firstname`, `referred_by`, `address`, `city`, `postalcode`, `country`, `telephone`, `mobile`, `fax`, `email`, `skype`, `other_messaging`, `nationality`, `gender`, `status`, `manager_id`, `date_created`, `date_editable`) VALUES ( 
	'".$bdate."', 
	'".trim($_POST['cv1_lastname'])."', 
	'".trim($_POST['cv1_firstname'])."', 
	'".$_POST['referred_by']."', 
	'".$_POST['cv1_address']."', 
	'".$_POST['cv1_city']."', 
	'".$_POST['cv1_postalcode']."', 
	'".$_POST['cv1_country']."', 
	'".$_POST['cv1_telephone']."', 
	'".$_POST['cv1_mobile']."', 
	'".$_POST['cv1_fax']."', 
	'".$_POST['cv1_email']."',
	'".$_POST['cv1_skype']."', 
	'".$_POST['cv1_other_messaging']."', 
	'".$_POST['cv1_nationality']."', 
	'".$_POST['cv1_gender']."',
	'".$cv_status."',
	".$manager_id.",
	NOW(), DATE_ADD( NOW(), INTERVAL ".$cv_edit_hours." HOUR))"; 

	//editing?
	$retrievalcode = $_POST['cv1_retrievalcode'];
	
	$querychk = "SELECT * FROM $tbl_cv WHERE retrievalcode = '".$retrievalcode."' AND lastname = '".$_POST['cv1_lastname']."' AND firstname = '".$_POST['cv1_firstname']."'";
	//echo $querychk;exit;
	$res_dup = query($querychk);
	
	$dup = mysql_num_rows($res_dup);
	//echo "dup: ".$dup;exit;
	if ($dup==0){ // if it's a new cv
	
		//duplication attempt?
		$querychk = "SELECT * FROM $tbl_cv WHERE bdate = '".$bdate."' AND lastname = '".$_POST['cv1_lastname']."' AND firstname = '".$_POST['cv1_firstname']."'";
		//echo $querychk;exit;
		$res_dup = query($querychk);
		$dup2 = mysql_num_rows($res_dup);
		
		if ($dup2>0)
		{//already in the database
		
			$cv_name = $_POST['cv1_firstname']." ".$_POST['cv1_lastname'];
			//write the duplication attempt in the log
			//if a manager is trying to duplicate
			scrivilog(2, '1', $manager_id, $cv_name, $_SERVER['REMOTE_ADDR'], '0', "CV duplication attempt", $tbl_logging);
			?>
			<script language="javascript">
			alert('Is seems you are already registered in the system!');
			parent.location='../cv/cv_1.php';
			</script>
			<?php
			exit;
		}
		
		insquery($query);
		$cv_id = mysql_insert_id();
		
		//if the retrieval code is not present.... 
		$query = "SELECT retrievalcode, email FROM $tbl_cv WHERE id =".$cv_id;
		//echo $query;exit;
		$res = query($query);
		$row = mysql_fetch_assoc($res);
		$retrievalcode = $row['retrievalcode'];
		$email_cv = $row['email'];
	//echo $retrievalcode.$email_cv;exit;
	//echo $cv_id;
		//...we create it
		$inviaemail = "";
		if (trim($retrievalcode)=="")
		{	
			$retrievalcode = time().$cv_id;
			$query = "UPDATE $tbl_cv SET retrievalcode = '" .$retrievalcode. "' WHERE id = ".$cv_id;
			$inviaemail = "1";
			insquery($query);
		}	

		include_once("Mail.php"); 
		$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
		//$To = "marcellozini@hotmail.com <marcellozini@hotmail.com>"; 
		$To = $email_cv;
		$Subject = "EUJob4EU - your CV retrieval code"; 
		
		$Message = "Your application for admission to the Your First Eures Job - Recruitment of young European mobile workers project has been correctly registered in the EUJob4EU data management tool.\n
We inform you that your CV may be modified, within the next $cv_edit_hours hours, by using the access info below the line. We remind you that, in order to enable the matching routine between your profile and the job requests, you have to describe you professional profile for which you intend to apply using all three description levels in the DESIRED EMPLOYMENT / OCCUPATIONAL FIELD page of the CV creation tool.

Keep in mind that your CV, in order to be suitable for job matching, must be completed in all its parts and that the description of your professional profile must be coherent with your education and/or your work experience. 

Thank you
EUJob4EU - Ufficio Monitoraggio e Progetti Europei
==================================================
URL: http://www.yourfirsteuresjob.eu/eujob4eu
Push the button 'Access your CV'

Retrieval code: ".$retrievalcode."
First name: ".$_POST['cv1_firstname']."
Last name: ".$_POST['cv1_lastname'];
		
				
		$Host = "mail.provincia.roma.it"; 
		$Username = $smtp_user; 
		$Password = $smtp_pw; 
		
		$msg="";
		$mostrainvio="";
		
		if ( $inviaemail=="1"||( isset($_POST['resendemail'])&&$_POST['resendemail']=="1") )
		{
			// email	
			if ($_SERVER['HTTP_HOST']=="127.0.0.1") 
			{ //local server
					$msg = "local - Email message succesfully sent!"; 
			} 
			else 
			{
				
				//production server
				$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
				$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
				'username' => $Username, 'password' => $Password)); 
			
			
				$mail = $SMTP->send($To, $Headers, $Message); 
					
				if (PEAR::isError($mail)){ 
					$msg = $mail->getMessage(); 
				} 
				else 
				{ 
					$msg = "Please take note of your retrieval code: ".$retrievalcode.".\\nUse it in conjunction with your name to edit your CV within the next ".$cv_edit_hours." hours.\\nAn email message with your CV access credentials has just been succesfully sent.\\nPlease remember to check your spam/junk mail folder and, eventually, mark the message as safe."; 
					scrivilog(0, '0', $cv_id, $cv_name, $_SERVER['REMOTE_ADDR'], '1', "Retrieval code sent", $tbl_logging);
				} 
			}	
			//end email script
		} 
		else 
		{
			$mostrainvio = "1";
		}

		//the questionnaire entry
		$query="INSERT INTO $tbl_cv_questionnaire set cv_id=".$cv_id;
		insquery($query);
		
		$cv_name = $_POST['cv1_firstname']." ".$_POST['cv1_lastname'];
		$_SESSION["cv_name"] = $cv_name;
		$_SESSION["cv_id"] = $cv_id;
		
		//new cv registration event log
		scrivilog(0, '0', $cv_id, $cv_name, $_SERVER['REMOTE_ADDR'], '1', "CV created by candidate", $tbl_logging);

	} elseif ($dup>0) {
	
//} elseif ( ($_SESSION['task']=="edit")&&(isset($_POST['submitcv1'])) ){//è una modifica
		$tmp = mysql_fetch_array($res_dup);
		$_SESSION['cv_id'] = $tmp['id'];

		scrivilog(0, '0', $cv_id, $cv_name, $_SERVER['REMOTE_ADDR'], '0', "CV already exist " . $_POST['cv1_lastname'] . " " . $_POST['cv1_firstname'], $tbl_logging);

		$query = "UPDATE $tbl_cv SET 
		`bdate`='$bdate', 
		`lastname`='".$_POST['cv1_lastname']."', 
		`firstname`='".$_POST['cv1_firstname']."', 
		`referred_by`='".$_POST['referred_by']."', 
		`address`='".$_POST['cv1_address']."', 
		`city`='".$_POST['cv1_city']."',
		`postalcode`='".$_POST['cv1_postalcode']."', 
		`country`='".$_POST['cv1_country']."', 
		`telephone`='".$_POST['cv1_telephone']."',  
		`mobile`='".$_POST['cv1_mobile']."', 
		`fax`='".$_POST['cv1_fax']."', 
		`email`='".$_POST['cv1_email']."',
		`skype`='".$_POST['cv1_skype']."',
		`other_messaging`='".$_POST['cv1_other_messaging']."',
		`nationality`='".$_POST['cv1_nationality']."',
		`gender`='".$_POST['cv1_gender']."'
		WHERE id = ".$_SESSION['cv_id'];
		//echo $query;exit;
		query($query);
	}
} 
if (isset($_SESSION['cv_id']))
	$cv_id=$_SESSION['cv_id'];
else
	$cv_id=$cv_id;

//search script
if (isset($_POST['isco_selection'])) {//select isco
	$isco_found = $_POST['isco_found'];
	$isco_key = trim($_POST['isco_key']);
	if(isset($_POST['isco_search'])){
		
		$isco_found = array();
		$query = "select code, description from $tbl_isco where description like '%".$isco_key."%'";
		//echo $query;
		$res_isco_found=query($query);
		
		//2 arrays with the same index
		$isco_code_found[]=array();
		$isco_desc_found[]=array();
		$i=0;
		if (mysql_num_rows($res_isco_found)>0){
			while($row_isco_found=mysql_fetch_array($res_isco_found)){
				$isco_code_found[$i]=$row_isco_found['code'];
				$isco_desc_found[$i]=$row_isco_found['description'];
				$i++;
			}
			$isco_found_size = count($isco_code_found);
		}else{
			$isco_found_size = 0;
			$msg = "no result found";
		}
		
		//print_r ($isco_code_found);
		//print_r ($isco_desc_found);
	}else{
		$isco_1 = $_POST['isco_1'];
		$isco_2 = $_POST['isco_2'];
		$isco_3 = $_POST['isco_3'];
	}
	
	//if we chose among the first set of results
	if (isset($_POST['isco_found'])){
		if ($_POST['isco_found']!='0'){
			$isco_1 = substr($_POST['isco_found'],0,2);
			$isco_2 = substr($_POST['isco_found'],0,3);
			$isco_3 = substr($_POST['isco_found'],0,4);
		}
	}
} else {
	$query = "select * from $tbl_cv_isco where cv_id=".$cv_id." limit 1";
	$res_isco=query($query);
	while($row_isco=mysql_fetch_assoc($res_isco)){
		$isco_1 = $row_isco['cv_isco_1'];
		$isco_2 = $row_isco['cv_isco_2'];
		$isco_3 = $row_isco['cv_isco_3'];
	}
}
//echo $_POST['isco_found'];
//end search script

/*if (isset($_POST['isco_selection'])) {//stiamo selezionando le select isco
	$isco_1 = $_POST['isco_1'];	
	$isco_2 = $_POST['isco_2'];	
	$isco_3 = $_POST['isco_3'];	
} 
*///}
/*?>else {?>
<script>
	location.href('cv_1.php');
</script>
<?php }<?php */
//per valorizzare le isco select vediamo se c'è già un record



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
<h1>DESIRED EMPLOYMENT / OCCUPATIONAL FIELD</h1>
  <?php
	if ($_SESSION['cv_name']!=""){
		$cv_name = $_SESSION['cv_name'];
	}else{
		$cv_name = $_POST['cv1_firstname']." ".$_POST['cv1_lastname'];
	} 
	?>
  <p>Choose you desired employment/occupational field.<br />
    You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
   <form autocomplete="off" name="addoccupationalfield" id="addoccupationalfield" method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
  <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Desired employment / Occupational field">
    <thead>
      <tr class="application_cv_list">
        <td colspan="3" class="cv_title">Desired employment / Occupational field - <?php echo $cv_name ?></td>
      </tr>
    </thead>
    <tbody>
      <tr valign="top">
        <td colspan="3" class="cv_left"><div align="left"> Type  in the text field below then click the &quot;Search&quot; button to perform a keyword - based search</div></td>
        <tr valign="top">
          <td colspan="3" class="cv_right"><div align="cv_left">
              <input type="text" name="isco_key" id="isco_key" value="<?php echo $isco_key ?>" />
            &nbsp;
            <input type="submit" value="Search" name="isco_search" id="isco_search" title="Search" onClick="" />
            &nbsp;
            <input type="button" value="Clear search results" name="isco_clear" id="isco_clear" title="Clear search results" onClick="javascript:
        document.getElementById('isco_key').value='';
        document.forms[0].submit();" />
          </div></td>
        <tr valign="top" id="found_row" style="display:<?php echo ($isco_found_size>0)?"block":"none";?>;">
          <td colspan="3" class="cv_left" id="found_row_info" ><div align="left"> Select one of the search result below to load the corresponding data into the profile requested drop-down lists</div></td>
        <tr valign="top" id="found_row" style="display:<?php echo ($isco_found_size>0)?"block":"none";?>;">
          <td colspan="3" class="cv_right"><?php //echo $isco_found_size ?>
              <select name="isco_found" id="isco_found" onChange="document.forms[0].submit();" >
                <option value="0">-- search result --</option>
                <?php for ($i=0;$i<$isco_found_size;$i++){	?>
                <?php if ($isco_found_size>0){ ?>
                <option value="<?php echo $isco_code_found[$i] ?>" <?php if ($isco_code_found[$i]==$_POST['isco_found']){ ?> selected="selected" <?php }?>><?php echo $isco_desc_found[$i] ?></option>
                <?php }?>
                <?php } ?>
            </select></td>
        <tr valign="top">
        <td colspan="3" class="cv_left" ><div align="left">Choose your professional profile 
(based on <a href="http://www.ilo.org/public/english/bureau/stat/isco/isco08/" target="_blank">ISCO Standards</a> / <a href="http://ec.europa.eu/eures/home.jsp?lang=en" target="_blank">EURES</a> tables)*<br />
You may add additional information further ahead<br />
<br />
<em>Start from the topmost drop-down list, then proceed with the others</em>;
use <em><strong>all three drop-down lists</strong></em>, if available</div></td>
        <tr valign="top">
        <td colspan="3" >
          <select name="isco_1" id="isco_1" onChange="javascript:
           document.getElementById('isco_2').disabled=true;
           document.getElementById('isco_3').disabled=true;
           document.forms[0].submit();
           ">
            <option value="0">-- choose a profile --</option>
            <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=2 ORDER BY id ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?>
            <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$isco_1){ ?> selected="selected" <?php }?> > <?php echo $row_list['description']; ?></option>
            <?php 
				}?>
          </select><br />
          <br />
              <select name="isco_2" id="isco_2" onChange="javascript:document.forms[0].submit();">
                <option value="0">-- choose a profile --</option>
                <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=3 AND SUBSTRING(code,1,2)='".$isco_1."' ORDER BY id ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?>
                <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$isco_2){ ?> selected="selected" <?php }?> > <?php echo $row_list['description']; ?></option>
                <?php 
				}?>
              </select><br /><br />
              <select name="isco_3" id="isco_3" onChange="javascript:document.forms[0].submit();">
                <option value="0">-- choose a profile --</option>
                <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=4 AND SUBSTRING(code,1,3)='".$isco_2."' ORDER BY id ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?>
                <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$isco_3){ ?> selected="selected" <?php }?> > <?php echo $row_list['description']; ?></option>
                <?php 
				}?>
              </select><br /><br />


<div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_200" alt="Example" onClick="showTip(200,'example')" onKeyPress="showTip(200,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_100" alt="Help" onClick="showTip(100,'help')" onKeyPress="showTip(100,'help')" /> </div>              </td>
      <tr id="TIP_200" style="display:none;">
        <td colspan="3"> Specify your job target or occupational field in subsequent steps, <span class="comment">e.g.:</span><br />
          <br />
          Computing,engineering and science professional<br />
            Computing professional<br />
            Computer system designers and analysts</td>
        </tr>
      <tr id="TIP_100" style="display:none;">
        <td colspan="3"><b>NB:</b><br />
          This entry gives an immediate overview of your profile by focusing on your core competences </td>
        </tr>
        <tr class="application_cv_list">
    		<td colspan="4" class="cv_title"><div align="right">&nbsp;</div>    		</td>
    	</tr>
    </tbody>
  </table>
  <input name="isco_selection" type="hidden" value="1" id="isco_selection" />
  </form>
  <div align="right">
<form autocomplete="off" action="cv_3.php" method="post" name="cvform" id="cvform" onSubmit="javascript:
  if ( 	(document.getElementById('isco_1').value=='0')||
  			(document.getElementById('isco_2').value=='0') )
        {
        	alert('Please select your profile!');
          return false;
        }">
  <input type="hidden" name="cv_id" value="<?php echo $cv_id ?>" />
  <input type="hidden" name="isco_1" value="<?php echo $isco_1 ?>" />
  <input type="hidden" name="isco_2" value="<?php echo $isco_2 ?>" />
  <input type="hidden" name="isco_3" value="<?php echo $isco_3 ?>" />
 <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onClick="javascript:window.open('cv_full.php', 'blank');" />
  <input name="gotocv1" type="button" value="&lt;&lt; Prev" onClick="window.location.href='cv_1.php'" />
 <input name="submitcv2" type="submit" value="Save/Next &gt;&gt;" />
</form>
</div></td>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

