<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/employer_login_inc.php'); ?>
<?php 
unset($_SESSION['cv_name']);
unset($cv_name); 
unset($_SESSION['cv_id']);
unset($cv_id); 
unset($_SESSION['task']);
unset($task); 
?>
<?php 
//is it an edit session?
$vacancy_id=0;
$edit="0";
$recall="0";
if( isset($_GET['vacancy_id'])&&intval($_GET['vacancy_id'])>0 ){
	$edit="1";
	$vacancy_id = $_GET['vacancy_id'];
	
	if( $_GET['task']=="recall" ){
		$recall="1";
		$query="select * from $tbl_vacancy where id=".$vacancy_id." and employer_id=".$_SESSION['e_id']." and papers='0'";
		$res_vacancy=query($query);
		$row_vacancy=mysql_fetch_assoc($res_vacancy);
		$vacancy_id=$row_vacancy['id'];
	}
}
//$_POST vars
$induction_training=($recall=="0")?$_POST['induction_training']:$row_vacancy['induction_training'];
$language_training=($recall=="0")?$_POST['language_training']:$row_vacancy['language_training'];
$technical_training=($recall=="0")?$_POST['technical_training']:$row_vacancy['technical_training'];
$business_visits=($recall=="0")?$_POST['business_visits']:$row_vacancy['business_visits'];
$mentoring_support=($recall=="0")?$_POST['mentoring_support']:$row_vacancy['mentoring_support'];
$other_1=($recall=="0")?$_POST['other_1']:$row_vacancy['other_1'];
$other_2=($recall=="0")?$_POST['other_2']:$row_vacancy['other_2'];
$activities=($recall=="0")?$_POST['activities']:$row_vacancy['activities'];
$n_vacancies=($recall=="0")?$_POST['n_vacancies']:$row_vacancy['n_vacancies'];

//search
$isco_found=$_POST['isco_found'];
$isco_key=trim($_POST['isco_key']);
if( isset($_POST['isco_search']) ){
	
	$isco_found = array();
	$query = "select code, description from $tbl_isco where description like '%".$isco_key."%'";
	//echo $query;
	$res_isco_found=query($query);
	
	//2 array with the same index
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
	$isco_1 = ($recall=="0")?$_POST['isco_1']:$row_vacancy['isco_1'];
	$isco_2 = ($recall=="0")?$_POST['isco_2']:$row_vacancy['isco_2'];
	$isco_3 = ($recall=="0")?$_POST['isco_3']:$row_vacancy['isco_3'];

}

//if we have chosen among the first result set
if (isset($_POST['isco_found'])){
	if ($_POST['isco_found']!='0'){
		$isco_1 = substr($_POST['isco_found'],0,2);
		$isco_2 = substr($_POST['isco_found'],0,3);
		$isco_3 = substr($_POST['isco_found'],0,4);
	}
}
//echo $_POST['isco_found'];
//end search 

$job_title = ($recall=="0")?$_POST['job_title']:$row_vacancy['job_title'];
$job_description = ($recall=="0")?$_POST['job_description']:$row_vacancy['job_description'];
$startdate_y = ($recall=="0")?$_POST['startdate_y']:substr($row_vacancy['start_date'],0,4);
$startdate_m = ($recall=="0")?$_POST['startdate_m']:substr($row_vacancy['start_date'],5,2);
$startdate_d = ($recall=="0")?$_POST['startdate_d']:substr($row_vacancy['start_date'],8,2);
$startdate = $startdate_y."-".$startdate_m."-".$startdate_d; //data combinata per insert
$sixmonths = ($recall=="0")?$_POST['sixmonths']:$row_vacancy['sixmonths'];
$monthly_wage = ($recall=="0")?$_POST['monthly_wage']:$row_vacancy['monthly_wage'];
$employment_form = ($recall=="0")?$_POST['employment_form']:$row_vacancy['employment_form'];
$employment_contract = ($recall=="0")?$_POST['employment_contract']:$row_vacancy['employment_contract'];
$training_location = ($recall=="0")?$_POST['training_location']:$row_vacancy['training_location'];

if (isset($_POST['savevacancy'])){
	
	//server side form check
	$msg = "";
	//if ( $isco_1=="0"||$isco_2=="0" ){$msg .= "Please select the profile detail you are requesting from the drop-down list!\\n\\n";}
	if ( strlen($job_title)<4||strlen($job_description)<5 ){$msg .= "Please complete the job title/description fields!\\n\\n";}
	if (!(is_numeric($n_vacancies))||intval($n_vacancies)<1){$msg .= "Please enter the number of job vacancies available!\\n\\n";}
	
	//induction training
	if ($induction_training!=""){
		$n_training=0;
		$n_training+=($language_training!="")?1:0;
		$n_training+=($technical_training!="")?1:0;
		$n_training+=($business_visits!="")?1:0;
		$n_training+=($mentoring_support!="")?1:0;
	}
	if ( ($induction_training=="")||( $induction_training!=""&&$n_training==0 ) ){$msg .= "Please complete the induction training section!\\n\\n";}
	if ( $induction_training=="0"&&$n_training==0 ){$msg .= "Please select the training activity you are offering!\\n\\n";}
	if ( $induction_training=="0"&&$n_training>1 ){$msg .= "If you offer more than one training activity, please choose \"Comprehensive induction training\"!\\n\\n";}
	if ( $induction_training=="1"&&$n_training==0 ){$msg .= "Please select the training activity you offer with \"Comprehensive induction training\"!\\n\\n";}
	if ( $induction_training=="1"&&$n_training==1 ){$msg .= "If you offer just one training activity, please choose \"Basic induction training\"!\\n\\n";}
	
	if ( strlen($activities)<5 ){$msg .= "Please describe the integration programme activities!\\n\\n";}
	if ( !is_numeric($startdate_y)||!is_numeric($startdate_m)||!is_numeric($startdate_d) ){$msg .= "Please enter the work starting date!\\n\\n";}
	if ( intval($monthly_wage)==0 ){$msg .= "Please enter a value for the monthly wage!\\n\\n";}
	if ( strlen($training_location)<5 ){$msg .= "Please enter the location of the induction training!\\n\\n";}
	
		//intval($startdate_y)>2011&&
		//is_numeric($startdate_m)&&
		//is_numeric($startdate_d)&&
		//strlen($training_location)>3 ) {
	if(trim($msg=="")){	
		if ($recall=="0"&&$edit=="0"){		
			$query = "INSERT INTO $tbl_vacancy (employer_id, isco_1, isco_2, isco_3, job_title, job_description, induction_training, language_training, technical_training, business_visits,  mentoring_support, other_1, other_2, activities, n_vacancies, n_vacancies_left, start_date, sixmonths, monthly_wage, employment_form, employment_contract, training_location, date_created) VALUES (
			".$_SESSION['e_id'].",
			'".$isco_1."',
			'".$isco_2."',
			'".$isco_3."',
			'".$job_title."',
			'".$job_description."',
			'".$induction_training."',
			'".$language_training."',
			'".$technical_training."',
			'".$business_visits."',
			'".$mentoring_support."',
			'".$other_1."',
			'".$other_2."',
			'".$activities."',
			".$n_vacancies.",
			".$n_vacancies.",
			'".$startdate."',
			'".$sixmonths."',
			".$monthly_wage.",
			'".$employment_form."',
			'".$employment_contract."',
			'".$training_location."',
			NOW())";
			
			include_once("Mail.php"); 

			//notify the head office/////////////////////////////////////////////
			$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
			//$To = $new_event_email;
			$To = "$new_event_email";
			$Subject = "EUJob4EU - New vacancy!"; 
			$Message = "A new vacancy profile has just been created in the EUJob4EU system!
			Thank you
			
			EUJob4EU - Ufficio Monitoraggio e Progetti Europei
			==================================================
			URL: http://www.yourfirsteuresjob.eu/eujob4eu-admin
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
			
	//		echo $query;
	//		exit;
		}else{
			$query = "UPDATE $tbl_vacancy SET 
			isco_1='".$isco_1."',
			isco_2='".$isco_2."',
			isco_3='".$isco_3."',
			job_title='".$job_title."', 
			job_description='".$job_description."', 
			induction_training='".$induction_training."', 
			language_training='".$language_training."', 
			technical_training='".$technical_training."', 
			business_visits='".$business_visits."',  
			mentoring_support='".$mentoring_support."', 
			other_1='".$other_1."', 
			other_2='".$other_2."', 
			activities='".$activities."', 
			n_vacancies=".$n_vacancies.", 
			n_vacancies_left=".$n_vacancies.", 
			start_date='".$startdate."', 
			sixmonths='".$sixmonths."', 
			monthly_wage=".$monthly_wage.", 
			employment_form='".$employment_form."', 
			employment_contract='".$employment_contract."', 
			training_location='".$training_location."' 
			WHERE id=".$vacancy_id;//echo $query;
		}
		if(insquery($query)){
			include('../employer/employer_profilecreated.php');
			exit;
		}else{
			$msg .= "- Please fill up the registration form";
		}
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
  <script type="text/javascript">
  	function checkinteger(val){
			if( isNaN(val.value)||val.value.indexOf('.')!=-1||val.value=='0' ){
				alert('Please enter an integer number for the monthly wage!');
				val.focus();val.value='';
			}		
		}
  </script>
</head>

<body>
<?php
if ($msg!=""){
//echo $msg;?>
	<script language="javascript">
		alert('<?php echo $msg; ?>');
  </script>
<?php	
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application"> 
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>VACANCY/PROFILE MANAGEMENT SECTION <br />
<em>(fill up one form for each unique profile)</em></h1>
<p>Recruitment of young European mobile workers - <em>Financial support for a mobile worker(s) integration programme</em></p>
<p><strong>Complete one form for each request related to the same profile.</strong></p>
Upon compilation - while the entered data is being processed - you <em><strong>must</strong></em> print, sign and send each request to:

<ul>
  <li><strong>Provincia di Roma</strong> - <strong><em>Your First EURES Job<br />
  </em></strong>Via Raimondo Scintu
    106<br />
    00173 - Roma (Italy)<br />
    by Fax: +39 06 6766 8475<br />
    by email: <a href="mailto:eures.employer@provincia.roma.it">eures.employer@provincia.roma.it</a>  (<em>please scan the signed document</em>)</li>
  </ul>
  
<a name="formtop" id="formtop"></a>
<form autocomplete="off" name="addvacancy" method="post" action="<?php $_SERVER['PHP_SELF'];?>?vacancy_id=<?php echo $vacancy_id ?>" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
  <thead>
   <tr class="application_cv_list">
    <td colspan="3" class="cv_title"><div align="left"><em>Profile requested - fields marked with &quot;*&quot; are required</em> </div></td>
   </tr>
  </thead>
  <tbody>
   <tr valign="top">
     <td colspan="3" class="cv_left"><div align="left"> Type  in the text field below then click the &quot;Search&quot; button to perform a keyword - based search</div></td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_right"><div align="cv_left">
        <input type="text" name="isco_key" id="isco_key" value="<?php echo $isco_key ?>" />
        &nbsp;
        <input type="submit" value="Search" name="isco_search" id="isco_search" title="Search" onclick="" />
        &nbsp;
        <input type="button" value="Clear search results" name="isco_clear" id="isco_clear" title="Clear search results" onclick="javascript:
        document.getElementById('isco_key').value='';
        document.forms[0].submit();" />
        </div></td>
     </tr>
   <tr valign="top">
     <td colspan="3" id="found_row_info" class="cv_left" style="display:<?php echo ($isco_found_size>1)?"block":"none";?>;"><div align="left"> Select one of the search result below to load the corresponding data into the profile requested drop-down lists</div></td>
   </tr>
   <tr valign="top" id="found_row" style="display:<?php echo ($isco_found_size>0)?"block":"none";?>;">
     <td colspan="3" class="cv_right"><?php //echo $isco_found_size ?>
     <select name="isco_found" id="isco_found" onchange="document.forms[0].submit();" >
       <option value="0">-- search result --</option>
       <?php for ($i=0;$i<$isco_found_size;$i++){	?>
       	<?php if ($isco_found_size>0){ ?>
       <option value="<?php echo $isco_code_found[$i] ?>" <?php if ($isco_code_found[$i]==$isco_found){ ?> selected="selected" <?php }?>><?php echo $isco_desc_found[$i] ?></option>
       	<?php }?>
       <?php } ?>
     </select></td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_left"><div align="left">Profile detail 
(based on <a href="http://www.ilo.org/public/english/bureau/stat/isco/isco08/" target="_blank">ISCO Standards</a> / <a href="http://ec.europa.eu/eures/home.jsp?lang=en" target="_blank">EURES</a>) -
Use <em><strong>all three drop-down lists</strong></em>, if available, to choose the profile closer to the one you actually need.<br />
Should the profile you are requesting not be available, just leave the drop-down list blank and write an accurate description of the position you are offering in the 'Job description' field below. In any case, you will be contacted by a <strong><em>Your First Eures Job</em></strong> consultant which will assist you troughout the process of creating the vacancy profile.</div></td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_right">
           <select name="isco_1" id="isco_1" onchange="javascript:
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
                <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$isco_1){ ?> selected="selected" <?php }?>><?php echo $row_list['description']; ?></option>
                <?php 
				}?>
            </select></td>
     </tr>
   <tr valign="top">
     <td colspan="3" class="cv_right"><select name="isco_2" id="isco_2" onchange="javascript:document.forms[0].submit();">
         <option value="0">-- choose a profile --</option>
         <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=3 AND SUBSTRING(code,1,2)='".$isco_1."' ORDER BY id ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?>
         <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$isco_2){ ?> selected="selected" <?php }?> > <?php echo $row_list['description']; ?></option>
         <?php 
				}?>
          </select>          </td>
     </tr>
   <tr valign="top">
     <td colspan="3" class="cv_right"><select name="isco_3" id="isco_3">
         <option value="0">-- choose a profile --</option>
         <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=4 AND SUBSTRING(code,1,3)='".$isco_2."' ORDER BY id ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?><option value="<?php echo $row_list['code']; ?>" <?php if ($row_list['code']==$isco_3){ ?> selected="selected" <?php }?>><?php echo trim($row_list['description']); ?></option>
         <?php 
				}?>
          </select></td>
     </tr>
   
   <tr valign="top"  >
     <td class="cv_left">&nbsp;</td>
     <td colspan="2" class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top"  >
     <td class="cv_left">Job title*</td>
     <td colspan="2" class="cv_right"><input type="text" name="job_title" id="job_title" value="<?php echo $job_title ?>" /></td>
   </tr>
   <tr valign="top"  >
     <td class="cv_left"><label for="label"> Job description*</label>     </td>
     <td colspan="2" class="cv_right"><textarea name="job_description" id="job_description" cols="45" rows="5"><?php echo $job_description ?></textarea></td>
   </tr>
   <tr valign="left">
     <td colspan="3" class="cv_left">&nbsp;</td>
   </tr>
   <tr valign="left" class="application_cv_list">
     <td colspan="3" class="cv_title"><div align="left"><strong><em>Training and support activities:</em></strong></div></td>
   </tr>
   <tr valign="top"  >
     <td class="cv_left">&nbsp;</td>
     <td colspan="2" class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top"  >
     <td class="cv_left"><label for="label"> Number of job vacancy(ies)*</label>     </td>
     <td colspan="2" class="cv_right"><input type="text" name="n_vacancies" size="2" onchange="" id="n_vacancies" value="<?php echo ($n_vacancies == "" ? "0" : $n_vacancies) ?>" />
         <div id="floatleft2"></div></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">Basic induction training<br /> 
     <em>(one of the 
			following<br /> 
     		training modules)*</em></label>        </td>
    <td colspan="2" class="cv_right"> <div id="floatleft"><input name="induction_training" id="induction_training_0" type="radio" value="0" <?php if ($induction_training=="0"){ ?> checked="checked" <?php }?> /></div>     </td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">Comprehensive induction<br /> 
     training <em>(at least two of the<br /> 
     following training modules)*</em></label> </td>
    <td colspan="2" class="cv_right"><div id="floatleft"><input name="induction_training" id="induction_training_1" type="radio" value="1" <?php if ($induction_training=="1"){ ?> checked="checked" <?php }?> />
     </div>     </td>
   </tr>
   
   
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td colspan="2" class="cv_right">&nbsp;</td>
     </tr>
   <tr valign="top" class="application_cv_list">
     <td class="cv_left">&nbsp;</td>
     <td width="122" class="cv_right"><strong><em>Individual</em></strong></td>
     <td width="141" class="cv_right"><strong><em>Group</em></strong></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="municipality">
      Language training*    </label>    </td>
    <td class="cv_right"><input type="radio" name="language_training" id="language_training_0" value="0" <?php if ($language_training=="0"){ ?> checked="checked" <?php }?> />
     <div id="floatleft"></div>     </td>
    <td class="cv_right"><input type="radio" name="language_training" id="language_training_1" value="1" <?php if ($language_training=="1"){ ?> checked="checked" <?php }?> /></td>
   </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="postalcode">
     Technical training*     </label>    </td>
    <td class="cv_right"><input type="radio" name="technical_training" id="technical_training_0" value="0" <?php if ($technical_training=="0"){ ?> checked="checked" <?php }?> />
     <div id="floatleft"></div>     </td>
    <td class="cv_right"><input type="radio" name="technical_training" id="technical_training_1" value="1" <?php if ($technical_training=="1"){ ?> checked="checked" <?php }?> /></td>
   </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="country">
     Business visits*   </label>    </td>
    <td class="cv_right"><input type="radio" name="business_visits" id="business_visits_0" value="0" <?php if ($business_visits=="0"){ ?> checked="checked" <?php }?> />
     <div id="floatleft"></div>    </td>
    <td class="cv_right"><input type="radio" name="business_visits" id="business_visits_1" value="1" <?php if ($business_visits=="1"){ ?> checked="checked" <?php }?> /></td>
   </tr>
   
   
   <tr valign="top">
	   <td class="cv_left"></td><td colspan="2" class="cv_right"></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Mentoring support*</td>
     <td class="cv_right"><input type="radio" name="mentoring_support" id="mentoring_support_0" value="0" <?php if ($mentoring_support=="0"){ ?> checked="checked" <?php }?> />
         <div id="floatleft"></div></td>
     <td class="cv_right"><input type="radio" name="mentoring_support" id="mentoring_support_1" value="1" <?php if ($mentoring_support=="1"){ ?> checked="checked" <?php }?> /></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><em>reset induction training section</em></td>
     <td class="cv_right"><input type="button" name="training_reset" id="training_reset" value="Reset" onclick="javascript:
     document.getElementById('language_training_0').checked=false;
     document.getElementById('language_training_1').checked=false;
     document.getElementById('technical_training_0').checked=false;
     document.getElementById('technical_training_1').checked=false;
     document.getElementById('business_visits_0').checked=false;
     document.getElementById('business_visits_1').checked=false;
     document.getElementById('mentoring_support_0').checked=false;
     document.getElementById('mentoring_support_1').checked=false;
     " /></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Other <em>(please specify)</em></td>
     <td colspan="2" class="cv_right"left><div id="floatleft"><textarea name="other_1" id="other_1" cols="45" rows="5"><?php echo $other_1 ?></textarea></div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td colspan="2" class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top" class="application_cv_list">
     <td colspan="3" class="cv_title"><div align="left"><strong><em>Administrative support and settlement facilitation (both for basic and comprehensive induction trainings)</em></strong></div></td>
     </tr>
   
   <tr valign="top">
     <td colspan="3" class="cv_left"><div align="left">It  can include one or more of the following support items (<em>residence registration, work permit, relocation, assistance to find housing,  assistance to obtain recognition of qualifications, children's schooling, etc)</em></div></td>
     </tr>
   <tr valign="top">
     <td class="cv_left"><label for="firstname"> Please specify</label>     </td>
     <td colspan="2" class="cv_right"><div id="floatleft"><textarea name="other_2" id="other_2" cols="45" rows="5"><?php echo $other_2 ?></textarea>
       </div></td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_left">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_left"><div align="left">Brief description of the integration programme activities, notably training content<em></em></div></td>
     </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile">Please specify*</label>     </td>
     <td colspan="2" class="cv_right"><div id="floatleft">
       <textarea name="activities" id="activities" cols="45" rows="8"><?php echo $activities ?></textarea>
     </div></td>
   </tr>
   <tr valign="top">
     <td colspan="3" class="cv_left">&nbsp;</td>
     </tr>
   <tr valign="top">
     <td colspan="3" class="cv_left"><div align="left">Provisional duration of the training module(s) <em>(training hours or days per thematic module)</em>:</div></td>
     </tr>
   <tr valign="top">
    <td rowspan="3" class="cv_left">
     <label for="mobile">
      Work starting date<br /> 
      <em>(yyyy / mm / dd)</em>*   </label>    </td>
    <td colspan="2" class="cv_right">
    <select name="startdate_y" id="startdate_y">
	  <option value="">YYYY</option>
		<?php for ($i=date('Y');$i<date('Y')+2;$i++){?>
		<option value="<?php echo $i ?>" <?php if ($i==$startdate_y){ ?> selected="selected" <?php }?>><?php echo $i ?></option>
		<?php }?>
		</select>
      <em>year (yyyy)</em>&nbsp;      </td>
   </tr>
   <tr valign="top">
     <td colspan="2" class="cv_right">
     
     <select name="startdate_m" id="startdate_m">
		<option value="">MM</option>
		<?php for ($i=1;$i<=12;$i++){?>
		<option value="<?php echo substr("0".$i,-2) ?>" <?php if(substr("0".$i,-2)==$startdate_m){?> selected="selected" <?php }?>><?php echo substr("0".$i,-2) ?></option>
		<?php }?>
		</select><em>month (mm)</em>        </td>
   </tr>
   <tr valign="top">
     <td colspan="2" class="cv_right">
	<select name="startdate_d" id="cv1_bdateday">
    <option value="">DD</option>
		<?php for ($i=1;$i<=31;$i++){?>
		<option value="<?php echo substr("0".$i,-2) ?>" <?php if(substr("0".$i,-2)==$startdate_d){ ?> selected="selected" <?php }?>><?php echo substr("0".$i,-2) ?></option>
		<?php }?>
		</select>     
       <em>day (dd)</em></td>
   </tr>
    <tr valign="top">
      <td class="cv_left">&nbsp;</td>
      <td colspan="2" class="cv_right">&nbsp;</td>
      </tr>
    <tr valign="top">
      <td class="cv_left">Form of employment*</td>
      <td class="cv_right"><input type="radio" name="employment_form" id="employment_form_1" value="1" <?php if ($employment_form=="1"){ ?> checked="checked" <?php }?> />
        <em>full time</em>        
 <div id="floatleft"></div></td>
      <td class="cv_right"><input type="radio" name="employment_form" id="employment_form_0" value="0" <?php if ($employment_form=="0"){ ?> checked="checked" <?php }?> />
        <em>part time</em></td>
    </tr>
    <tr valign="top">
      <td class="cv_left">Type of contract*</td>
      <td class="cv_right"><input type="radio" name="employment_contract" id="employment_contract_0" value="0" <?php if ($employment_contract=="0"){ ?> checked="checked" <?php }?> />
          <em>fixed term</em>
          <div id="floatleft"></div></td>
      <td class="cv_right"><input type="radio" name="employment_contract" id="employment_contract_1" value="1" <?php if ($employment_contract=="1"){ ?> checked="checked" <?php }?> />
          <em>permanent</em></td>
    </tr>
    <tr valign="top">
      <td class="cv_left">Contract duration*</td>
      <td colspan="2" class="cv_right"><input type="checkbox" name="sixmonths" id="sixmonths" value="1" <?php if (intval($sixmonths)==1){ ?> checked="checked" <?php }?> />
        <em>six months or longer</em></td>
    </tr>
    <tr valign="top">
      <td class="cv_left">Gross monthly<br />
							wage(Euro)*</td>
      <td colspan="2" class="cv_right"><input type="text" onkeyup="javascript:checkinteger(this)" name="monthly_wage" size="4"  
      id="monthly_wage" value="<?php echo ($monthly_wage == "" ? "0" : $monthly_wage) ?>" />        </td>
    </tr>
    <tr valign="top">
      <td class="cv_left">&nbsp;</td>
      <td colspan="2" class="cv_right">&nbsp;</td>
    </tr>
    <tr valign="top">
      <td class="cv_left"><label for="mobile"> Location(s) of the<br /> 
      induction training(s)</label>      </td>
      <td colspan="2" class="cv_right"><div id="floatleft">
        <textarea name="training_location" id="training_location" cols="45" rows="8"><?php echo $training_location ?></textarea>
      </div></td>
    </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td colspan="2" class="cv_right">&nbsp;</td>
   </tr>
	<tr class="application_cv_list">
    	<td colspan="3" class="cv_title">&nbsp;</td>
   </tr>  
  </tbody>
 </table>
<br />
<div align="right">
<input name="savevacancy" type="submit" value="Save" />
</div>
</form>	</td>
  </tr>
</table>
<?php //echo "recall: ".$recall." edit= ".$edit." vacid=".intval($_GET['vacancy_id']) ; ?>
</body>
</html>
<?php include('../common/bot.php'); ?>

