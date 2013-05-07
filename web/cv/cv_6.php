<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

if (isset($_POST['submitcv5'])){
	$query = "UPDATE $tbl_cv SET 
	langtraining='".$_POST['cv5_langtraining']."',
	areas='".$_POST['cv5_areas']."'
	WHERE id = ".$_SESSION['cv_id'];
	//echo $query;exit;
	insquery($query);
}

//if ($_SESSION['task']=="edit"){
	//get the cv for editing
	$query = "SELECT * FROM $tbl_cv WHERE id = ".$_SESSION['cv_id'];
	//echo $query;
	$res_edit = query($query);
	$row_edit = mysql_fetch_assoc($res_edit);
//} 

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
	<h1>PERSONAL SKILLS AND COMPETENCES</h1>
	  <p> Describe your personal skills and competences by filling in the fields below.<br />
    <strong>This section is fundamental and may constitute the basis on which you might be chosen over other candidates.<br />
	We invite you to fill up this section whith attention.</strong><br />
      You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
	<form autocomplete="off" action="cv_7.php" method="post" name="cvform" id="cvform">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Personal skills and competences">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Personal skills and competences - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr valign="top">
                <td class="cv_left" width="30%"><label for="socialSkills">Social skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right" width="70%"><div id="floatleft">
                    <textarea name="cv6_socialskills" cols="38" rows="4" id="cv6_socialskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['socialskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_200" alt="Example" onclick="showTip(200,'example')" onkeypress="showTip(200,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_100" alt="Help" onclick="showTip(100,'help')" onkeypress="showTip(100,'help')" /> </div></td>
              </tr>
              <tr id="TIP_200" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Describe your social skills and competences, e.g.:
                  <blockquote>Team spirit; </blockquote>
                  <blockquote>Good ability to adapt to multicultural environments, gained through my work experience abroad; </blockquote>
                  <blockquote>Good communication skills gained through my experience as sales manager. </blockquote>
                  Specify in what context they were acquired (through training, work, seminars, voluntary or leisure activities, etc.). </td>
              </tr>
              <tr id="TIP_100" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>What are we talking about?</b><br />
                  Social skills and competences refer to living and working with other people, in positions where communication is important and situations where teamwork is essential (for example culture and sports), in multicultural environments, etc. </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="organisationalSkills">Organisational skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_organisationalskills" cols="38" rows="4" id="cv6_organisationalskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['organisationalskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_201" alt="Example" onclick="showTip(201,'example')" onkeypress="showTip(201,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_101" alt="Help" onclick="showTip(101,'help')" onkeypress="showTip(101,'help')" /> </div></td>
              </tr>
              <tr id="TIP_201" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Describe your organisational skills and competences, e.g.:
                  <blockquote>Leadership (currently responsible for a team of 10 people); </blockquote>
                  <blockquote>Sense of organisation (experience in logistics); </blockquote>
                  <blockquote>Good experience in project or team management. </blockquote>
                  and say in what context they were acquired (through training, work, seminars, voluntary or leisure activities, etc.). </td>
              </tr>
              <tr id="TIP_101" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>What are we talking about?</b><br />
                  Organisational skills and competences refer to coordination and administration of people, projects and budgets; at work, in voluntary work (for example culture and sports) and at home, etc. </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="technicalSkills">Technical skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_technicalskills" cols="38" rows="4" id="cv6_technicalskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['technicalskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_202" alt="Example" onclick="showTip(202,'example')" onkeypress="showTip(202,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_102" alt="Help" onclick="showTip(102,'help')" onkeypress="showTip(102,'help')" /> </div></td>
              </tr>
              <tr id="TIP_202" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Describe your technical skills and competences, e.g.:
                  <blockquote>Good command of quality control processes (I was responsible for the implementation of quality audit in my dept).</blockquote>
                  Specify in what context they were acquired (through training, work, seminars, voluntary or leisure activities, etc.). </td>
              </tr>
              <tr id="TIP_102" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>What are we talking about?</b><br />
                  Technical skills and competences refer to mastery of specific kinds of equipment, machinery, etc. other than computers, or to technical skills and competences in a specialised field (manufacturing industry, health, banking, etc.). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="computerSkills">Computer skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_computerskills" cols="38" rows="4" id="cv6_computerskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['computerskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_203" alt="Example" onclick="showTip(203,'example')" onkeypress="showTip(203,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_103" alt="Help" onclick="showTip(103,'help')" onkeypress="showTip(103,'help')" /> </div></td>
              </tr>
              <tr id="TIP_203" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Describe your computer skills and competences, e.g.:
                  <blockquote> Good command of Microsoft Office™ tools  (Word™, Excel™  and PowerPoint™); </blockquote>
                  <blockquote> Basic knowledge of graphic design applications (Adobe Illustrator™, PhotoShop™). </blockquote></td>
              </tr>
              <tr id="TIP_103" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>What are we talking about?</b><br />
                  Computer skills and competences refer to word processing and other applications, database searching, acquaintance with Internet, advanced skills (programming etc.). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="artisticSkills">Artistic skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_artisticskills" cols="38" rows="4" id="cv6_artisticskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['artisticskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_204" alt="Example" onclick="showTip(204,'example')" onkeypress="showTip(204,'example')" /></div></td>
              </tr>
              <tr id="TIP_204" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State here your artistic skills and competences which are an asset (music; writing; design, etc.) e.g.:
                  <blockquote> Carpentry </blockquote>
                  Specify in what context they were acquired (through training, work, seminars, voluntary or leisure activities, etc.). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="otherSkills">Other skills and competences<br />
                (max 500)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_otherskills" cols="38" rows="4" id="cv6_otherskills" onkeyup="javascript:limitText(this, 500)"><?php echo $row_edit['otherskills'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_205" alt="Example" onclick="showTip(205,'example')" onkeypress="showTip(205,'example')" /></div></td>
              </tr>
              <tr id="TIP_205" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State here any other skill(s) and competence(s) which are an asset and are not mentioned under earlier headings (hobbies; sports, positions of responsibility in voluntary organisations), e.g.:
                  <blockquote> Trekking </blockquote>
                  Specify in what context they were acquired (through training, work, voluntary or leisure activities, etc.). </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="drivingLicences">Driving licence(s)<br />
                (max 255)</label></td>
                <td class="cv_right"><div id="floatleft">
                    <textarea name="cv6_drivinglicences" cols="38" rows="4" id="cv6_drivinglicences" onkeyup="javascript:limitText(this, 255)"><?php echo $row_edit['drivinglicences'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_206" alt="Example" onclick="showTip(206,'example')" onkeypress="showTip(206,'example')" /></div></td>
              </tr>
              <tr id="TIP_206" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State here whether you hold a driving licence and, if so, for which category of vehicle, e.g.:
                  <blockquote> Category B </blockquote></td>
              </tr>
                <tr class="application_cv_list">
                    <td colspan="2" class="cv_title"><div align="right">&nbsp;</div>
                    </td>
                </tr>
            </tbody>
          </table><br />
  	<div align="right">
   <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
   <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_5.php'"  />
   <input name="submitcv6" type="submit" value="Save/Next &gt;&gt;" />
	</div>
</form>
     </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

