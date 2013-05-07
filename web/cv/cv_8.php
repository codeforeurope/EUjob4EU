<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

//get the cv for editing
$query = "SELECT * FROM $tbl_cv WHERE id = '".$_SESSION['cv_id'] . "'";
$res_edit = query($query);
$row_edit = mysql_fetch_assoc($res_edit);

//creiamo il nome immagine
/*$img_name = str_replace(" ","",$row_edit['date_created']);
$img_name = str_replace("-","",$img_name);
$img_name = str_replace(":","",$img_name);
$img_name .= $_SESSION['cv_id'];
*/
//$img_name = str_replace(" ","",$row_edit['date_created']);
//$img_name = str_replace("-","",$img_name);
//$img_name = str_replace(":","",$img_name);
//$img_name .= $_SESSION['cv_id'];
//echo $row_edit['date_created'].$_SESSION['cv_id'].$row_edit['firstname'];
$img_name = sha1($row_edit['date_created'].$_SESSION['cv_id'].$row_edit['firstname']);
//echo $img_name;exit;

if (isset($_POST['submitcv7'])){
	$query = "UPDATE $tbl_cv_questionnaire SET 
	i='".$_POST['i_c']."',
	o='".$_POST['o_c']."',
	c='".$_POST['c_c']."',
	n='".$_POST['n_c']."',
	f='".$_POST['f_c']."' 
	WHERE cv_id = ".$_SESSION['cv_id'];
	insquery($query);
}

//caricamento foto
if (isset($_POST['upload_image'])&&($_FILES['img[0]']!=="")){ 
	//current higher directory for images?
	$query = "select dir from $tbl_img_dir";
	$res_dir = query($query);
	$row_dir = mysql_fetch_assoc($res_dir);
	$dir = $row_dir['dir'];
	//echo $dir;
	//count how many files in such directory
	$dh  = opendir("../img/".$dir);
	while (false !== ($filename = readdir($dh)))
		if (strlen($filename)>5)
			$n_files += 1;
	
	//echo substr(sprintf('%o', fileperms("../img/".$dir)), -4);
	//echo "n_files:".$n_files;exit;

	//if more than 250 files, create a new directory (to speed up filesystem search time)
	if ( $n_files>250 ) {
		$dir += 1;
		@mkdir("../img/".$dir, 0777);
		$query = "UPDATE $tbl_img_dir SET dir =".$dir; 
		insquery($query);
	}
	
	list($width, $height, $type, $attr) = getimagesize($_FILES['img']['tmp_name']);
	//echo $type.$attr; //exit;
	if (/*($type!=1) && (*/$type!=2/*) && ($type!=3)*/) {
		$do_upload = "no";
		//$msg="GIF, JPG or PNG only!\n";
		//$msg="JPG only!\n";
	}
	
	if ($do_upload=="no"){?>
		<script language="javascript">
			alert('JPG only!');
			window.location.href='cv_8.php';
        </script>
    <?php	
        exit;
	} else {
	
	}
		
	if ($do_upload!="no"){
		if ($type==1)
			$ext=".gif";
		if ($type==2)
			$ext=".jpg";
		if ($type==3)
			$ext=".png";
	}
	$w = 150;
	$h = 150;
	
	//$old = umask(0);	$_FILES['img']['tmp_name']$_FILES['img']['img_name']
	
	//echo "<br />".substr(sprintf('%o', fileperms("../img/".$dir)), -4);
	//chmod("/var/www/yorfirsteuresjob/img/".$dir, 0777);
	//echo "<br />/var/www/yorfirsteuresjob/img/".$dir."/";
	//echo "<br />".substr(sprintf('%o', fileperms("../img/".$dir)), -4);
	//echo "<br />".substr(sprintf('%o', fileperms("/var/www/yorfirsteuresjob/img/".$dir)), -4);
	//chmod("../img/".$dir."/".$img_name.$ext, 0777);
	
	if (copy($_FILES['img']['tmp_name'], "../img/".$dir."/".$img_name.$ext) or $log .= "<br><br><b>ATTENZIONE</b> Impossibile copiare l'immagine sul server, riprovare in un altro momento.<br>"){
	
	ridimensionala($w,$h,$width,$height,$type,$_FILES['img']['tmp_name'],"../img/".$dir."/".$img_name.$ext);
	
	//chmod("../img/".$dir, 0755);
	//chmod("../img/".$dir."/".$img_name.$ext, 0755);
	//umask($old);
	$query = "update $tbl_cv set img_dir =".$dir.", img_ext='".$ext."' where id=".$_SESSION['cv_id'];
	insquery($query);
	//$log .= "<br><br><b>BENE</b> L'immagine è stata caricata con successo.<br>";
	?>
			<script language="javascript">
			window.location.href='cv_8.php';
      </script>
	<?php
	}
}

//eliminazione foto
/*if ($_GET[elimina_foto]=="1"){
	if(unlink("../img_banchetto/$_REQUEST[cat_id]/$_GET[id].jpg")){
		$query = "DELETE FROM banchetto_img WHERE id=$_GET[id]";
		mysql_query($query);
	}else{
		$log.="Impossibile cancellare l'immagine, riprovare.<br>";
	}
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include('../includes/metatags.php'); ?>
  <?php include('../includes/title.php'); ?>

  <title>Europass CV</title>
  
  <link rel="stylesheet" type="text/css" href="../common/application.css" />  
  <link rel="stylesheet" type="text/css" href="../common/menu.css" />  
  
  <script type="text/javascript" src="../common/total.js"></script>
  <script type="text/javascript" src="../common/application.js"></script>
  <script type="text/javascript" src="../common/mm.js"></script>
  <script type="text/javascript" src="../common/menu.js"></script>
  <script language="javascript">
  
  </script>
</head>

<body>
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>PERSONAL IMAGE AND ADDITIONAL INFORMATION</h1>
      <p> Upload - optionally - your personal image and enter any other relevant information and/or list documents annexed to your CV. <br />
      You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
      <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
       <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Upload a picture - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="30%" class="cv_left"><label for="mlang">Choose the picture to upload <em>(.jpg only)</em></label></td>
                <td width="70%" class="cv_right"><div id="floatleft">
                    <input type="file" name="img" id="img" />
                  </div>
                  <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_1" alt="Example" onClick="showTip(1,'example')" onKeyPress="showTip(1,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_2" alt="Help" onClick="showTip(2,'help')" onKeyPress="showTip(2,'help')" /> </div>
                  </td>
              </tr>
              <tr>
                <td class="cv_left">&nbsp;</td>
                <td class="cv_leftline"><input type="submit" value="Upload" name="upload_image" id="upload_image" onClick="" /></td>
              </tr>
              <tr id="TIP_1" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Chose an image file for your CV. <br />
                  Make sure it is a <strong>jpeg</strong> file type.                </td>
              </tr>
              <tr id="TIP_2" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  Uploading an image will replace, if present, the previous one. </td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title"><div style="float:left;"> <b>Your picture </b> </div></td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_list">
                <?php if (intval($row_edit['img_dir'])!=0){ ?>
                <img src="../img/<?php echo $row_edit['img_dir'] ?>/<?php echo $img_name.$row_edit['img_ext'] ?>?<?php echo time(); ?>" width="150" />
                <?php }else{?>
                ...no picture yet...
                <?php }?>
                </td>
              </tr>
              <tr id="TIP_100">
                <td colspan="2" class="cv_leftline">&nbsp;                                 </td>
              </tr>
            </tbody>
          </table>
        </form>  
        <form autocomplete="off" action="cv_9.php" method="post" name="cvform" id="cvform">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Additional information and annexes">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Additional information and annexes - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr valign="top">
                <td class="cv_left" width="30%"><label for="additionalInfo">Additional information<br />
                (max 500)</label></td>
                <td class="cv_right" width="70%"><div id="floatleft">
                    <textarea name="cv8_additionalinfo" cols="38" rows="4" id="cv8_additionalinfo" onKeyUp="javascript:limitText(this, 500)"><?php echo $row_edit['additionalinfo'] ?></textarea>
                  </div>
                    <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_3" alt="Example" onClick="showTip(3,'example')" onKeyPress="showTip(3,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_4" alt="Help" onClick="showTip(4,'help')" onKeyPress="showTip(4,'help')" /> </div></td>
              </tr>
              <tr id="TIP_3" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> State here any other information which you think relevant (publications or research; membership of professional organisations, military information [if you judge it important to specify that you have completed military service], marital status [if you judge it important to specify], contact persons or referees [name, job title, contact address, see note below]), e.g.:
                  <blockquote><b>Publication</b><br />
                    Article: Molecular characterisation of a H3o-loaded brain cell, Immunology Quarterly, New York, 02/2002 </blockquote></td>
              </tr>
              <tr id="TIP_4" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b>
                    <ul>
                      <li> Do not give the address of a contact person without obtaining his/her formal agreement; it is preferable to state ‘References supplied on request’ in order not to overload the curriculum vitae; </li>
                      <li> Where appropriate, provide a brief description of your publications or research; specify the type of document (thesis, article, report, etc.). </li>
                    </ul></td>
                </tr>
                <tr class="application_cv_list">
                    <td colspan="2" class="cv_title"><div align="right">&nbsp;</div>
                    </td>
                </tr>
            </tbody>
          </table><br />
          <div align="right">
   <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onClick="javascript:window.open('cv_full.php', 'blank');" />
   <input name="gotocv1" type="button" value="&lt;&lt; Prev" onClick="window.location.href='cv_7.php'"  />
   <input name="submitcv8" type="submit" value="Save/Next &gt;&gt;" />
   </div>
   </form>
      </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

