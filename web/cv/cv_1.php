<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 
if ($_GET['cv_id']!=""){
	//cv edit
 	$cv_id = $_GET['cv_id']; 
  	$_SESSION["cv_id"] = $cv_id;
	$query = "SELECT * FROM $tbl_cv WHERE id = ".$_GET['cv_id'];
	$res_edit = query($query);
	$row_edit = mysql_fetch_assoc($res_edit);  
	$cv_name = $row_edit['firstname']." ".$row_edit['lastname'];
	$_SESSION["cv_name"] = $cv_name;
	$task=$_GET['task'];
	$_SESSION["task"] = $task;

} elseif ($_SESSION['cv_id']!=""){//coming from another cv page
	$query = "SELECT * FROM $tbl_cv WHERE id = ".$_SESSION['cv_id'];
	$res_edit = query($query);
	$row_edit = mysql_fetch_assoc($res_edit);
	$cv_name = $row_edit['lastname']." ".$row_edit['firstname'];
	$_SESSION["cv_name"] = $cv_name;

} 
$msg="";
if (isset($_SESSION['invalidEmail'])&&$_SESSION['invalidEmail']){
	$msg="Invalid email address supplied!";
}

if ($_GET['task']=="createcv"){
	$task=$_GET['task'];
	$_SESSION["task"] = $task;
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
<h1>&nbsp;</h1>
<h1>PERSONAL INFORMATION<br />
  </h1>
  <p>Keep in mind that when you will close the internet browser you will not be able to modify your CV data by yourself but you will need to contact a Your First Eures Job representative.<br />
    You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
  <form autocomplete="off" name="cvform" method="post" action="cv_2.php" enctype="multipart/form-data" onSubmit="return checkcv1()" >
 <table border="0" cellpadding="0" cellspacing="0" class="application_cv"
        summary='Personal information'>
  <thead>
   <tr class="application_cv_list">
    <td colspan="2" class="cv_title">Personal information - <?php echo $row_edit['firstname']." ".$row_edit['lastname']; ?>
    <?php if (!empty($msg)) echo "<br/>".$msg; ?>&nbsp;    </td>
   </tr>
  </thead>
  <tbody>
   <tr>
    <td width="30%" class="cv_left">
     <label for="date">
      Date of birth* </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
		<select name="cv1_bdateday" onChange="javascript:document.getElementById('cv1_bdatemonth').disabled=false;document.getElementById('cv1_bdateyear').value='';" id="cv1_bdateday"><option value="">DD</option>
		<?php for ($i=1;$i<=31;$i++){?>
		<option value="<?php echo $i ?>" <?php if(($i)==(int)(substr($row_edit['bdate'],8)))echo "selected" ?>><?php echo $i ?></option>
		<?php }?>
		</select>
		<select name="cv1_bdatemonth" onChange="javascript:document.getElementById('cv1_bdateyear').disabled=false;document.getElementById('cv1_bdateyear').value='';" id="cv1_bdatemonth" <?php if ($row_edit['bdate']=="0000-00-00"){ ?>disabled="disabled"<?php }?>>
		<option value="">MM</option>
		<?php for ($i=1;$i<=12;$i++){?>
		<option value="<?php echo $i ?>" <?php if(($i)==(int)(substr($row_edit['bdate'],5,7)))echo "selected" ?>><?php echo $i ?></option>
		<?php }?>
		</select>

      <select name="cv1_bdateyear" id="cv1_bdateyear" <?php if ($row_edit['bdate']=="0000-00-00"){ ?>disabled="disabled"<?php }?> onChange="javascript:
      if ( 
      	(this.value<<?php echo date('Y')-31; ?>)||
        ((this.value==<?php echo date('Y')-31; ?>)&&(document.getElementById('cv1_bdatemonth').value<<?php echo date('n'); ?>))||
        ((this.value==<?php echo date('Y')-31; ?>)&&(document.getElementById('cv1_bdatemonth').value==<?php echo date('n'); ?>)&&(document.getElementById('cv1_bdateday').value<<?php echo date('j'); ?>))
        )
        {
        	alert('Sorry, you must be under 31 to apply!');
            document.getElementById('cv1_bdateday').value='';
            document.getElementById('cv1_bdatemonth').value='';
            document.getElementById('cv1_bdateyear').value='';
            document.getElementById('cv1_bdatemonth').disabled=true;
            document.getElementById('cv1_bdateyear').disabled=true;
        };">
   
	  <option value="">YYYY</option>
		<?php for ($i=date('Y');$i>=date('Y')-31;$i--){?>
		<option value="<?php echo $i ?>" <?php if(($i)==(int)(substr($row_edit['bdate'],0,4)))echo "selected" ?>><?php echo $i ?></option>
		<?php }?>
		</select>
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_1" alt="Example" onClick="showTip(1,'example')" onKeyPress="showTip(1,'example')"></div>      </td>
   </tr>
   
    <tr id="TIP_1" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      
	Give your date of birth (dd/mm/yyyy), e.g.: <blockquote>02.04.1983 </blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">
      Surname(s)*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_lastname" size="40" value="<?php echo $row_edit['lastname'] ?>" onChange="" id="cv1_lastname">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_2" alt="Example" onClick="showTip(2,'example')" onKeyPress="showTip(2,'example')">
       
      <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_3" alt="Help" onClick="showTip(3,'help')" onKeyPress="showTip(3,'help')">     </div>    </td>
   </tr>
   
    <tr id="TIP_2" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      
	State your surname(s), e.g.: <blockquote>SMITH </blockquote>in conformity with the rules that apply in your country.     </td>
    </tr>
   
   
    <tr id="TIP_3" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      <b>NB:</b><br />If you have more than one surname, start with the one you usually use.     </td>
    </tr>
   
   <tr valign="top">
    <td class="cv_left">
     <label for="firstname">
      First name(s)*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_firstname" size="40" value="<?php echo $row_edit['firstname'] ?>" onChange="" id="cv1_firstname">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_4" alt="Example" onClick="showTip(4,'example')" onKeyPress="showTip(4,'example')">
       
      <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_5" alt="Help" onClick="showTip(5,'help')" onKeyPress="showTip(5,'help')">     </div>    </td>
   </tr>
   
    <tr id="TIP_4" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      
	State your first name(s), e.g.: <blockquote>John Andrew </blockquote>in conformity with the rules that apply in your country.     </td>
    </tr>
   
   
    <tr id="TIP_5" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      <b>NB:</b><br>
if you have more than one first name, start with the one you usually use.     </td>
    </tr>
   <tr valign="top">
     <td class="cv_left">How did you hear about<br />
Your First Eures Job*       </td>
     <td class="cv_right"><strong>
       <select name="referred_by_list" id="referred_by_list" onChange="javascript:
            document.getElementById('referred_by').value+= '| '+this.value+' ';
            document.getElementById('referred_by').focus();">
         <option value="">-- select an option --</option>
         <option value="PES (CPI)">PES (CPI)</option>
         <option value="Porta Futuro">Porta Futuro</option>
         <option value="HUSCIE">HUSCIE</option>
         <option value="Asset Camera">Asset Camera</option>
         <option value="Io Lavoro - Agenzia Piemonte Lavoro">Io Lavoro - Agenzia Piemonte Lavoro</option>
         <option value="European Union">European Union</option>
         <option value="media">Media</option>
         <option value="">Other (please specify)</option>
       </select>
       <input name="referred_by_reset" type="button" value="Reset" onClick="javascript:
       document.getElementById('referred_by').value='';
       document.getElementById('referred_by_list').value='';
       " />
     </strong></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Other sources</td>
     <td class="cv_right">
       <textarea name="referred_by" cols="40" rows="3" id="referred_by"><?php echo $row_edit['referred_by'] ?></textarea>     </td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
      <b><em>Address:</em></b>    </td>
    <td class="cv_right">
		<div id="floatright">
			<img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_6" alt="Help" onClick="showTip(6,'help')" onKeyPress="showTip(6,'help')">		</div>	</td>
    </tr>
    
    <tr id="TIP_6" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      <b>NB:</b>


	State the residence which refers to the place  card or other equivalent legal document.</td>
    </tr>
   
   <tr valign="top">
    <td class="cv_left">
     <label for="address">
      Street / Street number*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_address" size="40" value="<?php echo $row_edit['address'] ?>" onChange="" id="cv1_address">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_7" alt="Example" onClick="showTip(7,'example')" onKeyPress="showTip(7,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_7" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      State street and street number of contact address, e.g.: <blockquote>12, High Street</blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="municipality">
      City / Country*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_city" size="40" value="<?php echo $row_edit['city'] ?>" onChange="" id="cv1_city">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_8" alt="Example" onClick="showTip(8,'example')" onKeyPress="showTip(8,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_8" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      State name of City / Country of your contact address, e.g.: 
        <blockquote>London / UK</blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="postalcode">
     Postal code*      </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_postalcode" size="40" value="<?php echo $row_edit['postalcode'] ?>" onChange="" id="cv1_postalcode">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_9" alt="Example" onClick="showTip(9,'example')" onKeyPress="showTip(9,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_9" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      State postal code of contact address, e.g.: <blockquote>SW1P 3AT</blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="country">
     Country<br />
(as indicated<br />in your ID)*</label>    </td>
    <td class="cv_right">
     <div id="floatleft">
     <select name="cv1_country" id="cv1_country">
       <option value="">- select -</option>
       <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
       <option value="<?php echo $row_eu['code'] ?>" <?php if ($row_edit['country']==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
     	<?php 
		}?>
     </select>
     </div>
    <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_10" alt="Example" onClick="showTip(10,'example')" onKeyPress="showTip(10,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_10" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      Select your country from the drop-down list  as indicated in your ID (it may be different from the Country of your contact address), e.g. 
        <blockquote>Italy</blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
	   <td class="cv_left"></td><td class="cv_right"></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="telephone">
      Telephone(s)*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_telephone" size="40" value="<?php echo $row_edit['telephone'] ?>" onChange="" id="cv1_telephone">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_11" alt="Example" onClick="showTip(11,'example')" onKeyPress="showTip(11,'example')">
       
      <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_12" alt="Help" onClick="showTip(12,'help')" onKeyPress="showTip(12,'help')">     </div>    </td>
   </tr>
   
    <tr id="TIP_11" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
       State the telephone number(s) where you wish to be contacted;<br />
if necessary, give specific days and times when it is possible to reach you (so that you can be contacted quickly), e.g.:<br />
         <blockquote>+44 20 80123456</blockquote>       </td>
    </tr>
   
   
    <tr id="TIP_12" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      <b>NB:</b>

	Give the country prefix and any regional prefix in brackets. These two prefixes should be joined by a hyphen, e.g.: +44 20 80123456 for a number in London.</td>
    </tr>
   
        
   <tr valign="top">
    <td class="cv_left">
     <label for="mobile">
      Mobile     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_mobile" size="40" value="<?php echo $row_edit['mobile'] ?>" onChange="" id="cv1_mobile">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_13" alt="Example" onClick="showTip(13,'example')" onKeyPress="showTip(13,'example')">
       
      <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_14" alt="Help" onClick="showTip(14,'help')" onKeyPress="showTip(14,'help')">     </div>    </td>
   </tr>
   
    <tr id="TIP_13" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      Write your mobile phone number, using the same rules as for your fixed-line telephone number(s) e.g.:
<blockquote>
   +39 345 1234567</blockquote>     </td>
    </tr>
   
   
    <tr id="TIP_14" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      <b>NB:</b>
Give the country prefix and any regional prefix in brackets. These two prefixes should be joined by a hyphen, e.g.: +44 20 80123456 for a number in London.</td>
    </tr>
   

   <tr valign="top">
    <td class="cv_left">
     <label for="fax">
      Fax     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_fax" size="40" value="<?php echo $row_edit['fax'] ?>" onChange="" id="cv1_fax">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_15" alt="Example" onClick="showTip(15,'example')" onKeyPress="showTip(15,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_15" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      Write your fax number(s), using the same rules as for your telephone number(s) e.g.:
<blockquote>+44 20 80123456</blockquote>     </td>
    </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="email">
      E-mail*     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="text" name="cv1_email" size="40" value="<?php echo $row_edit['email'] ?>" onChange="" id="cv1_emai">
     </div>
     <div id="floatright">
      <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_16" alt="Example" onClick="showTip(16,'example')" onKeyPress="showTip(16,'example')"></div>    </td>
   </tr>
   
    <tr id="TIP_16" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      
	Write your e-mail address(es) in full, specifying if it is your personal or professional address, e.g.: <blockquote>bragov@whaoo.com </blockquote>     </td>
    </tr>
    <tr valign="top">
      <td class="cv_left"><label for="fax"> Skype id</label>      </td>
      <td class="cv_right"><div id="floatleft">
          <input type="text" name="cv1_skype" size="40" value="<?php echo $row_edit['skype'] ?>" onChange="" id="cv1_skype" />
        </div>
          <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_17" alt="Example" onClick="showTip(17,'example')" onKeyPress="showTip(17,'example')" /></div></td>
    </tr>
    <tr id="TIP_17" style="display:none;">
      <td>&nbsp;</td>
      <td class="comment"> Write your skype id (it shall be used for job interviews) e.g.:
        <blockquote>john.andrew</blockquote></td>
    </tr>
    
    <tr valign="top">
      <td class="cv_left"><label for="fax"> Other messaging application</label>      </td>
      <td class="cv_right"><div id="floatleft">
          <input type="text" name="cv1_other_messaging" size="40" value="<?php echo $row_edit['other_messaging'] ?>" onChange="" id="cv1_other_messaging" />
        </div>
          <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_18" alt="Example" onClick="showTip(18,'example')" onKeyPress="showTip(18,'example')" /></div></td>
    </tr>
    <tr id="TIP_18" style="display:none;">
      <td>&nbsp;</td>
      <td class="comment"> Write your other/favourite messaging application id e.g.:
        <blockquote>MSN Live Messenger: john.andrew@hotmail.com</blockquote></td>
    </tr>
    
    <tr valign="top">
      <td class="cv_left"><label for="email">Nationality<br />
      (only EU citizens can apply)*</label>      </td>
      <td class="cv_right"><div id="floatleft">
      <select name="cv1_nationality" id="cv1_nationality" >
        <option value="">- select -</option>
        <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
        <option value="<?php echo $row_eu['code'] ?>" <?php if ($row_edit['nationality']==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
        <?php 
		}?>
      </select> <?php echo (strlen(trim($row_edit['nationality']))>2)?$row_edit['nationality']:""; ?>
      </div>
          <div id="floatright"><img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_19" alt="Example" onClick="showTip(19,'example')" onKeyPress="showTip(19,'example')" /></div></td>
    </tr>
   
   
    <tr id="TIP_19" style="display:none;">
     <td>&nbsp;</td>
     <td class="comment">
      
	Write your nationality, e.g.: <blockquote>Irish </blockquote>
	<b>NB: (</b>to add a nationality, click on the link &quot;Add nationality&quot; and write it.     </td>
    </tr>
   
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="gender">
      Gender*     </label>    </td>
    <td class="cv_right">
     <input type="radio" name="cv1_gender" value="m" onChange="" style="border:0" id="gender" <?php if ($row_edit['gender']=="m")echo "checked=\"checked\""; ?>>
     M
     <input name="cv1_gender" type="radio" id="gender" style="border:0" onChange="" value="f" <?php if ($row_edit['gender']=="f")echo "checked=\"checked\""; ?>>
     F      </td>
   </tr>
   <tr class="application_cv_list">
    <td colspan="2" class="cv_title">&nbsp;</td>
   </tr>
  </tbody>
 </table>
 <br />
 <div align="right"><input type="button" name="print_cv" id="print_cv" value="View/Print CV" onClick="javascript:window.open('cv_full.php', 'blank');" />
      <input name="submitcv1" type="submit" value="Save/Next &gt;&gt;" /></div>
 
   <input type="hidden" name="cv1_retrievalcode" id="cv1_retrievalcode" value="<?php echo $row_edit['retrievalcode'] ?>" />
</form>    </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

