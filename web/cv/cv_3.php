<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

//coming from cv2
if (isset($_POST['submitcv2'])&&trim($_POST['isco_1'])!=""){
	//eliminate previous isco records
	$query = "delete from $tbl_cv_isco where cv_id =".$_SESSION['cv_id'];
	insquery($query);
	
	//insert the new one
	$query = "INSERT INTO $tbl_cv_isco (cv_id, cv_isco_1, cv_isco_2, cv_isco_3) values ( 
	".$_SESSION['cv_id'].",
	'".$_POST['isco_1']."', 
	'".$_POST['isco_2']."', 
	'".$_POST['isco_3']."')"; 
	insquery($query);
}

//erase the experience
if ($_GET['task']=="del_exp"){
	$query = "DELETE FROM $tbl_wrkexp WHERE id = ".$_GET['wrkexp_id'];
	insquery($query);
}
// create work experience
if (isset($_POST['save'])&&$_POST['cv3_position']!=""){

	$posdate = $_POST['cv3_posdateyear']."-".$_POST['cv3_posdatemonth']."-".$_POST['cv3_posdateday'];
	$posdateto = $_POST['cv3_posdateyearto']."-".$_POST['cv3_posdatemonthto']."-".$_POST['cv3_posdatedayto'];

	$query = "INSERT INTO `$tbl_wrkexp` (`id`, `cv_id`, `wrkfrom`, `wrkto`, `position`, `activities`, `employer`, `sector`) VALUES ('', ".$_SESSION['cv_id'].", '$posdate', '$posdateto', '".$_POST['cv3_position']."', '".$_POST['cv3_activities']."', '".$_POST['cv3_employer']."', '".$_POST['cv3_sector']."')";

	$querychk = "SELECT * FROM $tbl_wrkexp WHERE cv_id = ".$_SESSION['cv_id']." AND wrkfrom = '$posdate' AND wrkto = '$posdateto' AND employer = '".$_POST['cv3_employer']."'";
	//echo $querychk;exit;
	$res_dup = query($querychk);
	$dup = mysql_num_rows($res_dup);

	if ($dup==0){insquery($query);}

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
	<h1>WORK EXPERIENCE</h1>
	  <p> Describe your work experience, starting from the most recent, by filling in the fields below. Save every experience by clicking on &quot;Save&quot;; view the detail for each entry by clicking on the &quot;Wiew/Print&quot; button below.<br />
       You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
  <script type="text/javascript">
function validateFormAddWork(form) {
	if ( !checkDate(form,'step3.from','From','Invalid date format') ) {
		return false;
	}
	if ( !checkDate(form,'step3.to','To','Invalid date format') ) {
		return false;
	}
	if ( !compareDates(form,'step3.from','step3.to','From','To','must be less than or equal to') ) {
		return false;
	}	
	if ( isEmpty(form,'step3.from','Can`t save or add an empty form') ) { 
		return false;
	}
	if ( isNotAPeriod(form, 'step3.from', 'step3.to', 'Can`t save or add an empty form') ) {
		return false;
	}
	return true;
}
function isEmpty(form,fieldA,errorMsg) {
	if ( (form["step3.position"].value == "") && (form["step3.activities"].value=="") && (form["step3.employer"].value == "") && (form["step3.sector"].value == "") ) {
		alert(errorMsg);
		return true;
	}
	return false;
}
function isNotAPeriod(form,fieldA,fieldB,errorMsg) {
	var yearAfield = form[fieldA + ".year"];
	var yearBfield = form[fieldB + ".year"];
 	if ( !yearAfield || !yearBfield ) {
		alert(errorMsg);
 		return true;
 	}
	var yearA = yearAfield.options[ yearAfield.options.selectedIndex ].value;
	var yearB = yearBfield.options[ yearBfield.options.selectedIndex ].value;
	if ( yearA == "" && yearB == "") {
		alert(errorMsg);
		return true;
	}
	return false;
}
      </script>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="wrkexpform" id="wrkexpform">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Work experience">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Work experience - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr valign="top">
                <td width="30%" class="cv_left"><label for="fromday">From</label></td>
                <td width="70%" class="cv_right"><select name="cv3_posdateday" onchange="" id="cv3_posdateday">
                  <option value="00">DD</option>
                    <?php for ($i=1;$i<=9;$i++){?>
                    <option value="0<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  <?php for ($i=10;$i<=31;$i++){?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php }?>
                </select>
                  <select name="cv3_posdatemonth" onchange="" id="cv3_posdatemonth">
                    <option value="00">MM</option>
                    <?php for ($i=1;$i<=9;$i++){?>
                    <option value="0<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                    <?php for ($i=10;$i<=12;$i++){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select>
                  <select name="cv3_posdateyear" onchange="" id="cv3_posdateyear">
                    <option value="0000">YYYY</option>
                    <?php for ($i=date('Y');$i>=date('Y')-80;$i--){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="today">To</label></td>
                <td class="cv_right"><select name="cv3_posdatedayto" onchange="" id="cv3_posdatedayto">
                  <option value="00">DD</option>
                    <?php for ($i=1;$i<=9;$i++){?>
                    <option value="0<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  <?php for ($i=10;$i<=31;$i++){?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php }?>
                </select>
                  <select name="cv3_posdatemonthto" onchange="" id="cv3_posdatemonthto">
                    <option value="00">MM</option>
                    <?php for ($i=1;$i<=9;$i++){?>
                    <option value="0<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                    <?php for ($i=10;$i<=12;$i++){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select>
                  <select name="cv3_posdateyearto" onchange="" id="cv3_posdateyearto">
                    <option value="0000">YYYY</option>
                    <?php for ($i=date('Y');$i>=date('Y')-80;$i--){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="position">Occupation<br />
                or position held<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <input type="text" name="cv3_position" size="40" value="" onkeyup="javascript:limitText(this, 255)" id="cv3_position" />
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_200" alt="Example" onclick="showTip(200,'example')" onkeypress="showTip(200,'example')" /></div></td>
              </tr>
              <tr id="TIP_200" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State your job title or the nature of your occupation, e.g.:
                  <blockquote>HGV mechanic, Maintenance technician, Receptionist </blockquote></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="activities">Main activities and responsibilities<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv3_activities" cols="38" rows="4" onkeyup="javascript:limitText(this, 500)" id="cv3_activities"></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_201" alt="Example" onclick="showTip(201,'example')" onkeypress="showTip(201,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_101" alt="Help" onclick="showTip(101,'help')" onkeypress="showTip(101,'help')" /> </div></td>
              </tr>
              <tr id="TIP_201" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State your main activities and responsibilities, e.g.:
                  <blockquote>Maintenance of computers </blockquote>
                  <b>or</b>
                    <blockquote>Relations with suppliers </blockquote>
                  <b>or</b>
                    <blockquote>Maintaining parks and gardens </blockquote></td>
              </tr>
              <tr id="TIP_101" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  If necessary, quantify your responsibilities (percentage of working time, length of time spent on each occupation, etc.). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="employer">Name and address of employer<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv3_employer" cols="38" rows="4" onkeyup="javascript:limitText(this, 255)" id="cv3_employer"></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_202" alt="Example" onclick="showTip(202,'example')" onkeypress="showTip(202,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_102" alt="Help" onclick="showTip(102,'help')" onkeypress="showTip(102,'help')" /> </div></td>
              </tr>
              <tr id="TIP_202" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State the name and address of the employer, e.g.:
                  <blockquote>Anderson and Dobbs Ltd., 12 Highland Road, Edinburgh EH3 4AB, United Kingdom </blockquote></td>
              </tr>
              <tr id="TIP_102" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  If relevant, add more information (telephone, fax, e-mail or internet address), e.g.:
                  <ul>
                      <li> Tel.: (44-31) 123 45 67 - Fax (44-31) 123 45 68 </li>
                    <li> E-mail: J.Robinson@andes.co.uk </li>
                    <li> Website: http://www.anderdobbs.co.uk </li>
                  </ul></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="sector">Type of business or sector<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <input type="text" name="cv3_sector" size="40" value="" onkeyup="javascript:limitText(this, 255)" id="cv3_sector" />
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_203" alt="Example" onclick="showTip(203,'example')" onkeypress="showTip(203,'example')" /></div></td>
              </tr>
              <tr id="TIP_203" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State the nature of the employer’s business or sector, e.g.:
                  <blockquote>Transport and logistics </blockquote>
                  <b>or</b>
                    <blockquote>Auditing </blockquote>
                  <b>or</b>
                    <blockquote>Manufacturer of motor vehicle parts </blockquote></td>
              </tr>
              <tr>
                <td colspan="2" class="cv_leftline"><input type="submit" value="Save" name="save" title="Save" onclick="" />                </td>
              </tr>
            </tbody>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv_list" summary="List of your work experience(s)" width="100%">
            <tr>
              <td colspan="2" class="cv_title"><div style="float:left;"> <b>List of your work experience(s)</b> </div></td>
            </tr>
            <tr>
              <td colspan="2" class="cv_list">
				<ul>
				<?php //riportiamo le esperienze lavorative inserite
				$query = "SELECT * FROM $tbl_wrkexp WHERE cv_id = ".$_SESSION['cv_id'];
				$res_wrkexp = query($query);
				while ($row_wrkexp = mysql_fetch_assoc($res_wrkexp)){?>
				  <li><?php echo $row_wrkexp['position']." for ".$row_wrkexp['employer'] ?>&nbsp;
                  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?wrkexp_id=<?php echo $row_wrkexp['id'] ?>&task=del_exp"><img src="../img/icons/delete.png" alt="Delete" width="24" height="24" border="0" align="absmiddle" /></a></li>
				<?php 
				}?>
				</ul> 			  
                </td>
            </tr>
          </table>
	 </form>
  
    <form action="cv_4.php" method="post" name="cvform" id="cvform" onsubmit="javascript:
        if( document.getElementById('cv3_workexperience').value=='0' ){
        	alert('Select your degree of workexperience from the list!');
        	return false;
          document.document.getElementById('cv3_workexperience').focus();
        }">
    		<table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Work experience (summary)</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="40%" class="cv_left"><label for="wrkex">Your work experience*</label></td>
                <td width="60%" class="cv_right"><div id="floatleft">
                <?php $workexperience=intval(retval("workexperience",$tbl_cv,"id",$_SESSION['cv_id']));?>
                <select name="cv3_workexperience" id="cv3_workexperience">
                  <option value="0" <?php echo ($workexperience==0)?"selected=\"selected\"":""; ?>>-- select --</option>
                  <option value="1" <?php echo ($workexperience==1)?"selected=\"selected\"":""; ?>>I have no work experience</option>
                  <option value="2" <?php echo (intval($workexperience)>=2)?"selected=\"selected\"":""; ?>>I have work experience</option>
                </select>
                  </div>
                    <div id="mlang_hint" class="hint">&nbsp;</div>
                  <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_106" alt="Example" onclick="showTip(106,'example')" onkeypress="showTip(106,'example')" /> </div></td>
              </tr>
              <tr id="TIP_106" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Select the degree of your work experience from on the list above, e.g.(if you have never had an occupation):
                  <blockquote>I have no work experience</blockquote></td>
              </tr>
        <tr class="application_cv_list">
    		<td colspan="2" class="cv_title"><div align="right">&nbsp;</div>    		</td>
    	</tr>
            </tbody>
          </table>
  		<br />  
	<div align="right">
       <input type="button" name="print_cv" id="print_cv" value="View/Print" onclick="javascript:window.open('cv_full.php', 'blank');" />
       <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_2.php'"  />
       <input name="submitcv3" type="submit" value="Save/Next &gt;&gt;" />
    </div>
    </form>
      </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

