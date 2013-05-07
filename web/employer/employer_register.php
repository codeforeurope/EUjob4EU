<?php include('../common/comuni_inc.php'); ?>

<?php //registration
$companyname = $_POST['companyname'];

$pivacf = $_POST['pivacf'];

$legal_representative = $_POST['legal_representative'];
$legal_address = $_POST['legal_address'];

$address = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];

$postalcode = $_POST['postalcode'];
$businessarea = $_POST['businessarea'];
$workforce = $_POST['workforce'];
$referent = $_POST['referent'];
$position = $_POST['position'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$email_r = $_POST['email_r'];
$website = $_POST['website'];
$skype = $_POST['skype'];
$linkedin = $_POST['linkedin'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$other_contact = $_POST['other_contact'];
$infoproject = $_POST['infoproject'];
$password = $_POST['password'];

$msg = "";
if (isset($_POST['register'])) {
	if ( strlen($companyname)<3 )$msg.="<li>The company name is too short!</li>";
	if ( strlen($pivacf)<6 )$msg.="<li>The PIVA - Registration number is too short!</li>";
	if ( strlen($legal_representative)<6 )$msg.="<li>Please indicate the legal representative!</li>";
	if ( strlen($legal_address)<6 )$msg.="<li>Please indicate the address of the legal representative!</li>";
	if ( strlen($address)<6 )$msg.="<li>The address is too short!</li>";
	if ( strlen($country)!=2 )$msg.="<li>Please select your country!</li>";
	if ( strlen($city)<3 )$msg.="<li>Please indicate your city!</li>";
	if ( strlen($postalcode)<4 )$msg.="<li>The postalcode is too short!</li>";
	if ( strlen($businessarea)<4 )$msg.="<li>Please type your business area!</li>";
	if ( strlen($phone1)<5 )$msg.="<li>The telephone is too short!</li>";
	if ( validate_email($email)==0 ){
		$msg.="<li>Please enter a correct email address!</li>";
	}
	if ( strlen($workforce)<1 )$msg.="<li>Please select the workforce!</li>";
	if ( strlen($referent)<4 )$msg.="<li>The referent must be indicated!</li>";
	if ( strlen($position)<3 )$msg.="<li>The position is missing!</li>";
	if ( validate_email($email_r)==0 ){
		$msg.="<li>Please enter a correct referent email address!</li>";
	}
	
	if ( strlen($infoproject)<5 )$msg.="<li>Please tell us how you heard about the project!</li>";
	
	if (strlen($password)>11 ){
		if (!preg_match("#[0-9]+#", $password) ) {
			$msg .= "<li>Password must include at least one number!</li>";
		}
	}

	//already in the db	
	$query = "SELECT pivacf FROM $tbl_employers WHERE pivacf ='".$pivacf."'";
	$res=query($query); //echo $query;
	if ( (mysql_num_rows($res)==0)&&(trim($msg=="")) ){
		$query = "INSERT INTO $tbl_employers (companyname, referent, position, pivacf, legal_representative, legal_address, address, country, city, postalcode, businessarea, workforce, phone1, phone2, fax, email, email_r, skype, linkedin, facebook, website, twitter, other_contact, infoproject, password) VALUES (
		'".$companyname."',
		'".$referent."',
		'".$position."',
		'".$pivacf."',
		'".$legal_representative."',
		'".$legal_address."',
		'".$address."',
		'".$country."',
		'".$city."',
		'".$postalcode."',
		'".$businessarea."',
		'".$workforce."',
		'".$phone1."',
		'".$phone2."',
		'".$fax."',
		'".$email."',
		'".$email_r."',
		'".$skype."',
		'".$linkedin."',
		'".$facebook."',
		'".$website."',
		'".$twitter."',
		'".$other_contact."',
		'".$infoproject."',
		sha2('".$password.$pivacf."', 256))";
		//echo ($query);
		if(insquery($query)){
			include_once("Mail.php"); 

			//email employer/////////////////////////////////////////////
			$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
			$To = $email_r;
			$Subject = "EUJob4EU - Your access credentials"; 
			$Message = "You have been succesfully registered in the EUJob4EU system.
			Find below your access credentials.
			
			Thank you
			EUJob4EU - Ufficio Monitoraggio e Progetti Europei
			==================================================
			URL: http://www.portafuturo.it/eujob4eu
			Registration number / VAT Number: $pivacf
			Password: $password
			";
			$Host = "mail.provincia.roma.it"; 
			$Username = $smtp_user; 
			$Password = $smtp_pw; 
			$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
			$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
			'username' => $Username, 'password' => $Password)); 
			$mail = $SMTP->send($To, $Headers, $Message); 
			if (PEAR::isError($mail)){$msg = $mail->getMessage();} 
			//end email//////////////////////////////////////////////////////////
			
			//notify head office/////////////////////////////////////////////
			//$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
			$To = $new_event_email;
			$Subject = "EUJob4EU - New employer!"; 
			$Message = "The company $companyname has just registered in the EUJob4EU system as a prospective employer!
			Thank you
			
			EUJob4EU - Ufficio Monitoraggio e Progetti Europei
			==================================================
			URL: http://www.portafuturo.it/eujob4eu-admin
			";
			
			//$Host = "mail.provincia.roma.it"; 
			//$Username = $smtp_user; 
			//$Password = $smtp_pw; 
			$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
			$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
			'username' => $Username, 'password' => $Password)); 
			$mail = $SMTP->send($To, $Headers, $Message); 
			if (PEAR::isError($mail)){$msg = $mail->getMessage();} 
			//fine invio email//////////////////////////////////////////////////////////
			
			$_SESSION['e_id'] = mysql_insert_id();
			$_SESSION['e_ok'] = "1";
			include("../employer/employer_registered.php");
			exit;
		}else{
			$msg .= "<li>Your company has already been registered!</li>";
		}
	}else{
		$msg .= "<li>Please submit the registration form!</li>";
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
<?php include("../includes/sections.php"); ?>
<h1>REGISTRATION FORM</h1> 
<p>Fields marked with &quot;*&quot; are required </p>
<form autocomplete="off" name="registrationform" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?#" enctype="multipart/form-data" onsubmit="">
<table border="0" cellpadding="0" cellspacing="0" class="application_cv"
        summary='Personal information'>
  <thead>
   <tr class="application_cv_list">
    <td colspan="2" class="cv_title"><?php if (!empty($msg)) echo "<ul>".$msg."</ul>";	?>&nbsp;</td>
   </tr>
  </thead>
  <tbody>
   <tr>
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr>
    <td width="50%" class="cv_left"><span class="cv_right"><em><strong>Company info:</strong></em></span></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">Company name</label>
     *    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="companyname" size="40" value="<?php echo $companyname ?>" onchange="" id="companyname">
     </div>     </td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="address">
      Registration number / VAT Number*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="pivacf" size="40" value="<?php echo $pivacf ?>" onchange="" id="pivacf">
     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Legal representative *</td>
     <td class="cv_right"><input type="text" name="legal_representative" size="40" value="<?php echo $legal_representative?>" onchange="" id="legal_representative" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Address of legal representative *</td>
     <td class="cv_right"><input type="text" name="legal_address" size="40" value="<?php echo $legal_address?>" onchange="" id="legal_address" /></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="municipality">
      Head office address *    </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
       <input type="text" name="address" size="40" value="<?php echo $address ?>" onchange="" id="address" />
     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Country *</td>
     <td class="cv_right">
     <select name="country" id="country">
       <option value="">- select -</option>
       <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
       <option value="<?php echo $row_eu['code'] ?>"<?php if ($country==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
     	<?php 
		}?>
     </select>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">City *</td>
     <td class="cv_right"><input type="text" name="city" size="40" value="<?php echo $city ?>" onchange="" id="city" /></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="postalcode">
     Postal code *     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="postalcode" size="40" value="<?php echo $postalcode ?>" onchange="" id="postalcode">
     </div>     </td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="country">
     Business area    </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="businessarea" size="40" value="<?php echo $businessarea ?>" onchange="" id="businessarea">
     </div>    </td>
   </tr>
   
   
   <tr valign="top">
	   <td class="cv_left"></td><td class="cv_right"></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Phone * </label>     </td>
     <td class="cv_right"><div id="floatleft5">
         <input type="text" name="phone1" size="40" value="<?php echo $phone1 ?>" onchange="" id="phone1" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="email"> E-mail *</label>     </td>
     <td class="cv_right"><div id="floatleft6">
         <input type="text" name="email" size="40" value="<?php echo $email ?>" onchange="" id="email" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Workforce *</td>
     <td class="cv_right"> 
       <input type="radio" name="workforce" id="workforce_0" value="0" <?php if ($workforce=="0"){ ?>checked="checked"<?php }?> />
       <em>less than 250</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="radio" name="workforce" id="workforce_1" value="1" <?php if ($workforce=="1"){ ?>checked="checked"<?php }?> />
       <em>more than 250</em>       </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><span class="cv_right"><em><strong>Contact info:</strong></em></span></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="firstname"> Contact/referent name *</label>     </td>
     <td class="cv_right"><div id="floatleft">
         <input type="text" name="referent" size="40" value="<?php echo $referent ?>" onchange="" id="referent" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Position held / Title *</label>     </td>
     <td class="cv_right"><div id="floatleft">
         <input type="text" name="position" size="40" value="<?php echo $position ?>" onchange="" id="position" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="email_r"> E-mail *</label>     </td>
     <td class="cv_right"><div id="floatleft">
         <input type="text" name="email_r" size="40" value="<?php echo $email_r ?>" onchange="" id="email_r" />
     </div></td>
   </tr>
   
    <tr valign="top">
      <td class="cv_left"><label for="mobile"> Phone  </label>      </td>
      <td class="cv_right"><div id="floatleft">
          <input type="text" name="phone2" size="40" value="<?php echo $phone2 ?>" onchange="" id="phone2" />
      </div></td>
    </tr>
   

   <tr valign="top">
    <td class="cv_left">
     <label for="fax">
      Fax     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="fax" size="40" value="<?php echo $fax ?>" onchange="" id="fax">
     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Website</td>
     <td class="cv_right"><input type="text" name="website" size="40" value="<?php echo $website ?>" onchange="" id="website" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Skype id</td>
     <td class="cv_right"><input type="text" name="skype" size="40" value="<?php echo $skype ?>" onchange="" id="skype" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Linkedin</td>
     <td class="cv_right"><input type="text" name="linkedin" size="40" value="<?php echo $linkedin ?>" onchange="" id="linkedin" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Facebook</td>
     <td class="cv_right"><input type="text" name="facebook" size="40" value="<?php echo $facebook ?>" onchange="" id="facebook" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Twitter</td>
     <td class="cv_right"><input type="text" name="twitter" size="40" value="<?php echo $twitter ?>" onchange="" id="twitter" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Other</td>
     <td class="cv_right"><input type="text" name="other_contact" size="40" value="<?php echo $other_contact ?>" onchange="" id="other_contact" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">How did you hear about<br />
       Your First Eures Job </td>
     <td class="cv_right"><strong>
       <select name="referred_by_list" id="referred_by_list" onchange="javascript:
            document.getElementById('infoproject').value+= '| '+this.value+' ';
            document.getElementById('infoproject').focus();">
         <option value="">-- select an option --</option>
         <option value="PES (CPI)">PES (CPI)</option>
         <option value="Porta Futuro">Porta Futuro</option>
         <option value="HUSCIE Germany">HUSCIE Germany</option>
         <option value="HUSCIE Ireland">HUSCIE Ireland</option>
         <option value="HUSCIE Netherlands">HUSCIE Netherlands</option>
         <option value="HUSCIE Portugal">HUSCIE Portugal</option>
         <option value="HUSCIE Spain">HUSCIE Spain</option>
         <option value="HUSCIE Sweden">HUSCIE Sweden</option>
         <option value="Asset Camera">Asset Camera</option>
         <option value="Io Lavoro - Agenzia Piemonte Lavoro">Io Lavoro - Agenzia Piemonte Lavoro</option>
         <option value="European Union">European Union</option>
         <option value="media">Media</option>
         <option value="">Other (please specify)</option>
       </select>
       <input name="referred_by_reset" type="button" value="Reset" onclick="javascript:
       document.getElementById('infoproject').value='';
       document.getElementById('referred_by_list').value='';
       " />
     </strong></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Other sources</td>
     <td class="cv_right"><textarea name="infoproject" id="infoproject" cols="45" rows="5"><?php echo $infoproject ?></textarea></td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><span class="cv_right"><em><strong>Your access password:</strong></em></span></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="fax"> Type a password</label>     </td>
     <td class="cv_right"><div id="floatleft4">
       <input type="password" name="password" size="40" value="<?php echo $password ?>" onblur="javascript:
         if (this.value.length<12&&this.value.length>0){alert('The password must be at least 12 character long!');this.focus();}" id="password" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="email">Re-type password</label></td>
     <td class="cv_right"><div id="floatleft3">
         <input type="password" name="verifypassword" size="40" value="<?php echo $password2 ?>" onblur="javascript:
         if (document.registrationform.password.value != this.value && this.value.length>0){alert('The password fields don\'t match!');this.value='';this.focus();};" id="verifypassword" />
     </div></td>
   </tr>
   <tr>
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
<tr class="application_cv_list">
    <td colspan="2" class="cv_title">&nbsp;</td>
   </tr>  
   </tbody>
 </table>
<br />
	<div align="right">
   <input name="register" type="submit" value="Register" />
   </div>
</form>    
</td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

