<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

// workexperience summary
if (isset($_POST['submitcv3'])){
	$query="UPDATE $tbl_cv SET workexperience=".intval($_POST['cv3_workexperience'])." WHERE id=".$_SESSION['cv_id'];
	insquery($query);
}


//erase experience
if ($_GET['task']=="del_edu"){
	$query = "DELETE FROM $tbl_edu WHERE id = ".$_GET['edu_id'];
	insquery($query);
}

// create work experience entry
if (isset($_POST['save'])&&$_POST['cv4_title']!=""){

	$edudate = $_POST['cv4_edudateyear']."-".$_POST['cv4_edudatemonth']."-".$_POST['cv4_edudateday'];
	$edudateto = $_POST['cv4_edudateyearto']."-".$_POST['cv4_edudatemonthto']."-".$_POST['cv4_edudatedayto'];

	$query = "INSERT INTO `$tbl_edu` (`id`, `cv_id`, `edufrom`, `eduto`, `title`, `skills`, `organisation`, `level`) VALUES ('', ".$_SESSION['cv_id'].", '".$edudate."', '".$edudateto."', '".$_POST['cv4_title']."', '".$_POST['cv4_skills']."', '".$_POST['cv4_organisation']."', '".$_POST['cv4_level']."')";

	$querychk = "SELECT * FROM $tbl_edu WHERE cv_id = ".$_SESSION['cv_id']." AND edufrom = '$edudate' AND eduto = '$edudateto' AND title = '".$_POST['cv4_title']."'";
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
	 <h1>EDUCATION AND TRAINING</h1>
	    <p> Describe your education and training, starting from the most recent, by filling in the fields below. Save every education or training by clicking on &quot;Save&quot;; view the detail for each entry by clicking on the &quot;Wiew/Print&quot; button below.<br />
         You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
    <script type="text/javascript">
function validateFormEducation(form) {
	if ( !checkDate(form,'step4.from','From*','Invalid date format') ) {
		return false;
	}
	if ( !checkDate(form,'step4.to','To*','Invalid date format') ) {
		return false;
	}
	if ( !compareDates(form,'step4.from','step4.to','From*','To*','must be less than or equal to') ) {
		return false;
	}	
	if ( isEmpty(form,'step4.from','Can`t save or add an empty form') ) { 
		return false;
	}
	if ( isNotAPeriod(form, 'step4.from', 'step4.to', 'Can`t save or add an empty form') ) {
		return false;
	}
	return true;
}
function isEmpty(form,fieldA,errorMsg) {
	if ( (form["step4.title"].value == "") && (form["step4.skills"].value=="") && (form["step4.organisation"].value == "") && (form["step4.level"].value == "") ) {
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
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="eduform" id="eduform">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Education and training">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Education and training - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr valign="top">
                <td width="30%" class="cv_left"><label for="fromday">From</label></td>
                <td width="70%" class="cv_right"><select name="cv4_edudateday" onchange="" id="cv4_edudateday">
                  <option value="00">DD</option>
                  <?php for ($i=1;$i<=31;$i++){?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php }?>
                </select>
                  <select name="cv4_edudatemonth" onchange="" id="cv4_edudatemonth">
                    <option value="00">MM</option>
                    <?php for ($i=1;$i<=12;$i++){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select>
                  <select name="cv4_edudateyear" onchange="" id="cv4_edudateyear">
                    <option value="0000">YYYY</option>
                    <?php for ($i=date('Y');$i>=date('Y')-20;$i--){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="today">To</label></td>
                <td class="cv_right"><select name="cv4_edudatedayto" onchange="" id="cv4_edudatedayto">
                  <option value="00">DD</option>
                  <?php for ($i=1;$i<=31;$i++){?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php }?>
                </select>
                  <select name="cv4_edudatemonthto" onchange="" id="cv4_edudatemonthto">
                    <option value="00">MM</option>
                    <?php for ($i=1;$i<=12;$i++){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select>
                  <select name="cv4_edudateyearto" onchange="" id="cv4_edudateyearto">
                    <option value="0000">YYYY</option>
                    <?php for ($i=date('Y');$i>=date('Y')-80;$i--){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                  </select></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="title">Title of qualification awarded<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <input type="text" name="cv4_title" size="40" value="" onkeyup="javascript:limitText(this, 255)" id="cv4_title" />
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_200" alt="Example" onclick="showTip(200,'example')" onkeypress="showTip(200,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_100" alt="Help" onclick="showTip(100,'help')" onkeypress="showTip(100,'help')" /> </div></td>
              </tr>
              <tr id="TIP_200" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Write the exact title of the qualification awarded, e.g.:
                  <blockquote> National Vocational Qualification (NVQ) Level 2: Bakery Service </blockquote></td>
              </tr>
              <tr id="TIP_100" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  avoid using abbreviations on their own (e.g. NVQ). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="skills">Principal subjects / occupational skills covered<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv4_skills" cols="38" rows="4" onkeyup="javascript:limitText(this, 500)" id="cv4_skills"></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_201" alt="Example" onclick="showTip(201,'example')" onkeypress="showTip(201,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_101" alt="Help" onclick="showTip(101,'help')" onkeypress="showTip(101,'help')" /> </div></td>
              </tr>
              <tr id="TIP_201" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Summarise the main subjects or occupational skills taught during the course in question, grouping them together if necessary for the sake of brevity, e.g.: <br />
                    <b>General</b>
                    <blockquote> English language, Welsh language, mathematics, foreign language (Spanish) </blockquote>
                  <blockquote> Physical education and sports </blockquote>
                  <b>Occupational</b>
                    <blockquote> occupational techniques (making of standard breads, fancy breads, cakes and pastries) </blockquote>
                  <blockquote> science applied to food and equipment (microbiology, biochemistry, hygiene) </blockquote>
                  <blockquote> occupational technology (basic principles, hygiene and safety) </blockquote>
                  <blockquote>knowledge of business and its economic, legal and social context</blockquote></td>
              </tr>
              <tr id="TIP_101" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  Combine items, and focus on the occupational skills which would be an asset if you were appointed. </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="organisation">Name and type of organisation providing education and training<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv4_organisation" cols="38" rows="4" onkeyup="javascript:limitText(this, 255)" id="cv4_organisation"></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_202" alt="Example" onclick="showTip(202,'example')" onkeypress="showTip(202,'example')" /></div></td>
              </tr>
              <tr id="TIP_202" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State the name (and if appropriate, the address) and type of the institution attended, e.g.:
                  <blockquote> South Wales Technical College<br />
                    Glamorgan Place<br />
                    Cardiff CF1 2AB<br />
                  </blockquote></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="level">Level in national or international classification<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <input type="text" name="cv4_level" size="40" value="" onkeyup="javascript:limitText(this, 255)" id="cv4_level" />
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_203" alt="Example" onclick="showTip(203,'example')" onkeypress="showTip(203,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_103" alt="Help" onclick="showTip(103,'help')" onkeypress="showTip(103,'help')" /> </div></td>
              </tr>
              <tr id="TIP_203" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> If the level of the qualification corresponds to an existing national or international classification system, state the level within the classification concerned (national classification, ISCED, etc.), e.g.:
                  <blockquote> ISCED 4 </blockquote></td>
              </tr>
              <tr id="TIP_103" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  if necessary, ask the body which awarded the qualification. <br />
                  For more information on ISCED (International Standard Classification of Education) devised by UNESCO, consult:
                  <blockquote>www.uis.unesco.org/TEMPLATE/pdf/isced/ISCED_A.pdf </blockquote></td>
              </tr>
              <tr>
                <td colspan="2" class="cv_leftline"><input type="submit" value="Save" name="save" title="Save" onclick="" /></td>
              </tr>
            </tbody>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv_list" summary="List of your education and training" width="100%">
            <tr>
              <td colspan="2" class="cv_title"><div style="float:left;"> <b>List of your education and training</b> </div></td>
            </tr>
            <tr>
              <td colspan="2" class="cv_list">
				<ul>
				<?php //work experiences
				$query = "SELECT * FROM $tbl_edu WHERE cv_id = ".$_SESSION['cv_id'];
				$res_edu = query($query);
				while ($row_edu = mysql_fetch_assoc($res_edu)){?>
					<li><?php echo $row_edu['title'] ?> in <?php echo $row_edu['skills'] ?> at <?php echo $row_edu['organisation'] ?><a href="<?php echo $_SERVER['PHP_SELF'] ?>?edu_id=<?php echo $row_edu['id'] ?>&task=del_edu"><img src="../img/icons/delete.png" alt="Delete" width="24" height="24" border="0" align="absmiddle" /></a></li>
				<?php 
				}?>
				</ul> 			  
                </td>
            </tr>
          </table>
        </form>
        <form action="cv_5.php" method="post" name="cvform" id="cvform" onsubmit="javascript:
        if( document.getElementById('cv4_highesteducation').value=='0' ){
        	alert('Select your highest education level from the list!');
        	return false;
          document.document.getElementById('cv4_highesteducation').focus();
        }">
    		<table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Education level (summary)</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="40%" class="cv_left"><label for="mlang">Your highest education level*</label></td>
                <td width="60%" class="cv_right"><div id="floatleft">
                <?php $highesteducation=intval(retval("highesteducation",$tbl_cv,"id",$_SESSION['cv_id']));?>
                <select name="cv4_highesteducation" id="cv4_highesteducation">
                  <option value="0" <?php echo ($highesteducation==0)?"selected=\"selected\"":""; ?>>-- select --</option>
                  <option value="1" <?php echo ($highesteducation==1)?"selected=\"selected\"":""; ?>>basic education</option>
                  <option value="2" <?php echo ($highesteducation==2)?"selected=\"selected\"":""; ?>>secondary education</option>
                  <option value="3" <?php echo ($highesteducation==3)?"selected=\"selected\"":""; ?>>higher education</option>
                </select>
                  </div>
                    <div id="mlang_hint" class="hint">&nbsp;</div>
                  <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_106" alt="Example" onclick="showTip(106,'example')" onkeypress="showTip(106,'example')" /> </div></td>
              </tr>
              <tr id="TIP_106" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Select the highest education level based on the list above, e.g.(if your highest title is a High school degree):
                  <blockquote>secondary education</blockquote></td>
              </tr>
        <tr class="application_cv_list">
    		<td colspan="2" class="cv_title"><div align="right">&nbsp;</div>    		</td>
    	</tr>
            </tbody>
          </table>
  		<br />  
  		<div align="right">
        <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
        <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_3.php'"  />
        <input name="submitcv4" type="submit" value="Save/Next &gt;&gt;" />
      </div>
      </form>
      </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

