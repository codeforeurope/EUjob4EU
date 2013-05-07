<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>
<?php 
unset($_SESSION['cv_name']);
unset($cv_name); 
unset($_SESSION['cv_id']);
unset($cv_id); 
unset($_SESSION['task']);
unset($task); 
?>

<?php //add a new entry
if (isset($_POST['savelog'])) {
	$query = "insert into $tbl_employer_dossier (date, author_id, employer_id, log) values 
	(NOW(), ".$_SESSION['a_id'].", ".$_POST['employer_id'].", '".trim($_POST['new_log'])."')"; 
	//echo $query;exit;
	insquery($query);
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
	<h1>DOSSIER: EMPLOYER
	  <?php echo trim(retval("companyname",$tbl_employers,"id",$_GET['employer_id']));?> </h1>
	  <p>You may add a text entry </p>
    
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
	<tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>date</strong></div></td>
              <td class="cv_title"><div align="left"><strong>author</strong></div></td>
              <td class="cv_title"><div align="right"><strong>&nbsp;</strong></div></td>
             </tr>
            <?php
			$query = "	SELECT d.date as date, d.author_id as author_id, d.log as log, a.a_user as a_user
						FROM $tbl_employer_dossier d, $tbl_admin a 
						WHERE d.author_id = a.a_id
						AND employer_id = ".$_GET['employer_id']."
						ORDER BY d.date DESC";
						$res=query($query);
			while ($row_list = mysql_fetch_assoc($res)){
			?>
            <tr class="application_cv_list" >
              <td class="cv_leftline"> 
              <div align="left"><?php echo $row_list['date']; ?></div> 
              </td>
              <td class="cv_leftline"><div align="left">
              <?php echo $row_list['a_user'];?></div>
              </td>
              <td class="cv_leftline"><div align="left"><?php echo $row_list['log']; ?></div>
              </td>
            </tr>
            <?php 
			}?>
          </tbody>
        </table>    
        <form autocomplete="off" method="post" action="<?php $_SERVER['PHP_SELF']?>?employer_id=<?php echo $_GET['employer_id'] ?>" enctype="multipart/form-data" onSubmit="javascript:if(document.getElementById('new_log').value.length<2){alert('you must add a text log!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
        <tr class="application_cv_list">
        <td class="cv_title"><div align="left"><strong>text</strong> (<em>maximum 250 charachters each log</em>)</div></td>
        </tr>
        <tr class="application_cv_list" >
        <td class="cv_rightline"> 
        <textarea name="new_log" cols="70" rows="5" id="new_log"></textarea>
        <input name="savelog" type="submit" value="Save" />
        </td>
        </tr>
       <tr class="application_cv_list">
        <td class="cv_title">&nbsp;</td>
       </tr>
	</table><br />
   <input type="hidden" name="employer_id" id="employer_id" value="<?php echo $_GET['employer_id'] ?>" />
   <input type="hidden" name="a_id" id="a_id" value="<?php echo $_SESSION['a_id'] ?>" />
</form><br />
<br />


     </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

