<?php

if (isset($_POST['savechanges'])){

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
	$skype = $_POST['skype'];
	$linkedin = $_POST['linkedin'];
	$facebook = $_POST['facebook'];
	$website = $_POST['website'];
	$twitter = $_POST['twitter'];
	$other_contact = $_POST['other_contact'];
	$infoproject = $_POST['infoproject'];

	$msg = "";


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
	if (trim($msg)==""){	
		$query = "UPDATE $tbl_employers SET 
		companyname ='".$companyname."',
		referent='".$referent."',
		position='".$position."',
		pivacf='".$pivacf."',
		legal_representative='".$legal_representative."',
		legal_address='".$legal_address."',
		address='".$address."',
		country='".$country."',
		city='".$city."',
		postalcode='".$postalcode."',
		businessarea='".$businessarea."',
		workforce='".$workforce."',
		phone1='".$phone1."',
		phone2='".$phone2."',
		fax='".$fax."',
		email='".$email."',
		email_r='".$email_r."',
		skype='".$skype."',
		linkedin='".$linkedin."',
		facebook='".$facebook."',
		website='".$website."',
		twitter='".$twitter."',
		other_contact='".$other_contact."',
		infoproject='".$infoproject."'
		WHERE id = ".$employer_id;

		if(insquery($query))
			$msg = "The company details have been succesfully modified.";
	}	
}
if (isset($_POST['changestatus'])){
	if ($_POST['currentstatus'] == '1')
		$newstatus = '0';
	else
		$newstatus = '1';
		 
	$query = "UPDATE $tbl_employers SET status = '".$newstatus."' WHERE id = ". $employer_id;
	if(insquery($query))
		$msg = "The status has been succesfully modified.";
}	

if (isset($_POST['deleteemployer'])){
		$newstatus = '2';
		 
	$query = "UPDATE $tbl_employers SET status = '".$newstatus."' WHERE id = ". $employer_id;
	if(insquery($query))
		$msg = "The employer status has been set to deleted.";
}	

?>

<?php 
$query = "SELECT * FROM $tbl_employers WHERE id =".$employer_id;
$res=query($query);
$row=mysql_fetch_assoc($res);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="Description" content="Europass brings together into a single framework several existing tools for the transparency of diplomas, certificates and competences. Helping citizens to better communicate and present their qualifications and skills throughout Europe, Europass will promote both occupational mobility, between countries as well as across sectors, and mobility for learning purposes." />
	<meta name="Keywords" content="cv, europe, europass, documents, portfolio, language, passport, mobility, certificate, diploma, cedefop" />
	<meta name="Author" content="Quality &amp; Reliability s.a." />

  <title>Europass CV</title>
  
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
    <td width="999" valign="top" class="application"> 
<?php include("../includes/sections.php"); ?>
<h1>&nbsp;</h1>
<h1>EDIT DETAILS</h1>
<p>Edit the information by typing into the form fields</p>
  
<form autocomplete="off" name="employerdetailsform" method="post" action="<?php $_SERVER['PHP_SELF']?>?employer_id=<?php echo $row['id'] ?>" enctype="multipart/form-data" onSubmit="">
<table border="0" cellpadding="0" cellspacing="0" class="application_cv"
        summary='Personal information'>
  <thead>
   <tr class="application_cv_list">
    <td colspan="2" class="cv_title"><?php if (!empty($msg)) echo "<ul>".$msg."</ul>"; ?>&nbsp;</td>
   </tr>
  </thead>
  <tbody>
   
   
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><em><strong>Company info:</strong></em></td>
     <td class="cv_right"><strong>Status</strong>: 
     <?php if ($row['status']=='1'){ ?>approved<?php }else{ ?>not approved <?php }?>     </td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">Company name</label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="companyname" size="40" value="<?php echo $row['companyname'] ?>" onChange="" id="companyname">
     </div>     </td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left"><label for="label">Registration number</label>     </td>
     <td class="cv_right"><div id="floatleft3">
         <input type="text" name="pivacf" size="40" value="<?php echo $row['pivacf'] ?>" onChange="" id="pivacf" />
     </div></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="firstname">Legal representative</label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="legal_representative" size="40" value="<?php echo $row['legal_representative'] ?>" onChange="" id="legal_representative">
     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Address of legal representative</td>
     <td class="cv_right"><input type="text" name="legal_address" size="40" value="<?php echo $row['legal_address'] ?>" onChange="" id="legal_address" /></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="municipality">
      Head office address     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
       <input type="text" name="address" size="40" value="<?php echo $row['address'] ?>" onChange="" id="address" />
     </div>     </td>
   </tr>
   
   
   <tr valign="top">
     <td class="cv_left">Country</td>
     <td class="cv_right">
     <select name="country" id="country">
       <option value="">- select -</option>
       <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
       <option value="<?php echo $row_eu['code'] ?>" <?php if ($row['country']==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
     	<?php 
		}?>
     </select>
   </tr>
   <tr valign="top">
     <td class="cv_left">City</td>
     <td class="cv_right"><input type="text" name="city" size="40" value="<?php echo $row['city'] ?>" onChange="" id="city" /></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="postalcode">
     Postal code      </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="postalcode" size="40" value="<?php echo $row['postalcode'] ?>" onChange="" id="postalcode">
     </div>     </td>
   </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="country">
     Business area    </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="businessarea" size="40" value="<?php echo $row['businessarea'] ?>" onChange="" id="businessarea">
     </div>    </td>
   </tr>
   
   
   <tr valign="top">
	   <td class="cv_left"></td><td class="cv_right"></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Phone </label>     </td>
     <td class="cv_right"><div id="floatleft5">
         <input type="text" name="phone1" size="40" value="<?php echo $row['phone1'] ?>" onChange="" id="phone1" />
     </div></td>
   </tr>
   
        
   <tr valign="top">
     <td class="cv_left"><label for="label"> E-mail </label>     </td>
     <td class="cv_right"><div id="floatleft4">
         <input type="text" name="email" size="40" value="<?php echo $row['email'] ?>" onChange="" id="email" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Workforce</td>
     <td class="cv_right"><input type="radio" name="workforce" id="workforce_0" value="0" <?php if ($row['workforce']=="0"){ ?>checked="checked"<?php }?> />
         <em>less than 250</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" name="workforce" id="workforce_1" value="1" <?php if ($row['workforce']=="1"){ ?>checked="checked"<?php }?> />
         <em>more than 250</em> </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><em><strong>Contact info:</strong></em></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="firstname"> Contact/refernt name</label>     </td>
     <td class="cv_right"><div id="floatleft5">
         <input type="text" name="referent" size="40" value="<?php echo $row['referent'] ?>" onChange="" id="referent" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Position held / Title</label>     </td>
     <td class="cv_right"><div id="floatleft6">
         <input type="text" name="position" size="40" value="<?php echo $row['position'] ?>" onChange="" id="position" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="label2"> E-mail</label>     </td>
     <td class="cv_right"><div id="floatleft7">
         <input type="text" name="email_r" size="40" value="<?php echo $row['email_r'] ?>" onChange="" id="email_r" />
     </div></td>
   </tr>
   
    <tr valign="top">
      <td class="cv_left"><label for="mobile"> Phone </label>      </td>
      <td class="cv_right"><div id="floatleft2">
          <input type="text" name="phone2" size="40" value="<?php echo $row['phone2'] ?>" onChange="" id="phone2" />
      </div></td>
    </tr>
   

   <tr valign="top">
    <td class="cv_left">
     <label for="fax">
      Fax     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="fax" size="40" value="<?php echo $row['fax'] ?>" onChange="" id="fax">
     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Skype id</td>
     <td class="cv_right"><input type="text" name="skype" size="40" value="<?php echo $row['skype'] ?>" onChange="" id="skype" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Linkedin</td>
     <td class="cv_right"><input type="text" name="linkedin" size="40" value="<?php echo $row['linkedin'] ?>" onChange="" id="linkedin" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Facebook</td>
     <td class="cv_right"><input type="text" name="facebook" size="40" value="<?php echo $row['facebook'] ?>" onChange="" id="facebook" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Website</td>
     <td class="cv_right"><input type="text" name="website" size="40" value="<?php echo $row['website'] ?>" onChange="" id="website" /></td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left">Twitter</td>
     <td class="cv_right"><input type="text" name="twitter" size="40" value="<?php echo $row['twitter'] ?>" onChange="" id="twitter" /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Other</td>
     <td class="cv_right"><input type="text" name="other_contact" size="40" value="<?php echo $row['other_contact'] ?>" onChange="" id="other_contact" /></td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left">How did you hear about this project?</td>
     <td class="cv_right"><textarea name="infoproject" id="infoproject" cols="45" rows="5"><?php echo $row['infoproject'] ?></textarea></td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left"><strong>&nbsp;</strong></td>
     <td class="cv_right"><div id="seepw" title="<?php //echo $row['password'] ?>"></div></td>
   </tr>
	<tr class="application_cv_list">
    	<td colspan="2" class="cv_title">&nbsp;</td>
   </tr>  
   </tbody>
  </tbody>
 </table>
<br />
<div align="right">
	<?php if ($_SESSION['a_level']=='7'){ //solo agli amministratori?>
   <input name="changestatus" type="submit" value="Change status" />&nbsp;
   <input name="deleteemployer" type="submit" value="Delete employer" />
   <?php }?>
   <input name="savechanges" type="submit" value="Save changes" />
   <input type="hidden" name="currentstatus" value="<?php echo $row['status'] ?>" />
   </div>
</form>    
	</td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

