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
<?php
//workexperience summary
if (isset($_POST['saveworkexperience'])){
	$query="UPDATE $tbl_cv SET workexperience=".intval($_POST['workexperience'])." WHERE id=".$_GET['cv_id'];
	insquery($query);
}

//add a new entry
if (isset($_POST['savelog'])) {
	$query = "insert into $tbl_cv_dossier (date, author_id, cv_id, log) values 
	(NOW(), ".$_SESSION['a_id'].", ".$_POST['cv_id'].", '".trim($_POST['new_log'])."')"; 
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
	<h1>DOSSIER: CANDIDATE
	  <?php echo trim(retval("lastname",$tbl_cv,"id",$_GET['cv_id']));?> 
	  <?php echo trim(retval("firstname",$tbl_cv,"id",$_GET['cv_id']));?> 
    </h1>
	  <p> You may add a log entry</p>
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
	<tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>date</strong></div></td>
              <td class="cv_title"><div align="left"><strong>author</strong></div></td>
              <td class="cv_title"><div align="right"><strong>&nbsp;</strong></div></td>
             </tr>
            <?php
			$query = "	SELECT d.date as date, d.author_id as author_id, d.log as log, a.a_user as a_user
						FROM $tbl_cv_dossier d, $tbl_admin a 
						WHERE d.author_id = a.a_id
						AND cv_id = ".$_GET['cv_id']."
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
    <form autocomplete="off" method="post" action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>" enctype="multipart/form-data" onSubmit="javascript:if(document.getElementById('new_log').value.length<2){alert('you must add a text log!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
        <tr class="application_cv_list">
        <td class="cv_title"><div align="left"><strong>text</strong> (<em>maximum 250 charachters each log</em>)</div></td>
        </tr>
        
        <tr class="application_cv_list" >
        <td class="cv_rightline"> 
        <textarea name="new_log" cols="70" rows="5" id="new_log" onkeypress="javascript:if(this.value.length>250){alert('Too long!');}"></textarea>
        <input name="savelog" type="submit" value="Save" />        </td>
        </tr>
       <tr class="application_cv_list">
        <td class="cv_title">&nbsp;</td>
       </tr>
	</table>
	<input type="hidden" name="cv_id" id="cv_id" value="<?php echo $_GET['cv_id'] ?>" />
   <input type="hidden" name="a_id" id="a_id" value="<?php echo $_SESSION['a_id'] ?>" />
</form>

<form action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>" method="post" name="cvform" id="cvform" onsubmit="javascript:
        if( (document.getElementById('workexperience').value=='0')||(document.getElementById('workexperience').value=='2') ){
        	alert('Select the degree of workexperience from the list!');
        	return false;
          document.document.getElementById('workexperience').focus();
        }">
    		<table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td class="cv_title">Work experience (summary)</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="60%" class="cv_right"><div id="floatleft">
                <?php $workexperience=intval(retval("workexperience",$tbl_cv,"id",$_GET['cv_id']));?>
                candidate work experience*
                <select name="workexperience" id="workexperience">
                  <option value="0" <?php echo ($workexperience==0)?"selected=\"selected\"":""; ?>>-- select --</option>
                  <option value="1" <?php echo ($workexperience==1)?"selected=\"selected\"":""; ?>>First job (inexperienced job applicants)</option>
                  <option value="2" <?php echo ($workexperience==2)?"selected=\"selected\"":""; ?>>Experienced (select below)</option>
                  <option value="3" <?php echo ($workexperience==3)?"selected=\"selected\"":""; ?>>Low skilled</option>
                  <option value="4" <?php echo ($workexperience==4)?"selected=\"selected\"":""; ?>>Skilled</option>
                  <option value="5" <?php echo ($workexperience==5)?"selected=\"selected\"":""; ?>>Highly skilled</option>
                </select>
                <input name="saveworkexperience" type="submit" value="Save" />
                  </div>
                    </td>
              </tr>
            <tr class="application_cv_list">
                <td colspan="2" class="cv_title"><div align="right">&nbsp;</div></td>
            </tr>
            </tbody>
          </table>
    </form>
<br />


     </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

