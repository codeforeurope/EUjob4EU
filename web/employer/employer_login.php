<?php include('../common/comuni_inc.php'); ?>
<?php 
//session_unset();
//session_destroy();
   //session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
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
    <td width="999" valign="top" class="application"> 
<link rel="stylesheet" type="text/css" href="../common/application.css" />
<?php include("../includes/sections.php"); ?>
<h1>&nbsp;</h1>
<h1>LOGIN FORM</h1> 
<p><?php echo $msg ?></p>
  
<form autocomplete="off" target="_self" name="loginform" method="post" action="../employer/employer_welcome.php" enctype="multipart/form-data" onsubmit="">
 <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <tr class="application_cv_list">
              <td class="cv_title" colspan="2"><div align="left"><strong>&nbsp;</strong></div>
              </td>
            </tr>
			<tr class="application_cv_list">
              <td width="43%" class="cv_leftline" >
              <label for="address">
              Registration number/VAT Number    
              </label>    
              </td>
    		<td width="57%" class="cv_leftline">
     <div id="floatleft">
      <input type="text" name="e_pivacf" size="40" onchange="" id="e_pivacf">
     </div>     </td>
   </tr>
   <tr class="application_cv_list">
     <td class="cv_leftline" ><label for="fax"> Password</label>
     </td>
     <td class="cv_leftline">
     <div id="floatleft">
       <input type="password" name="e_password" size="40" onchange="" id="e_password" />
       </div>
     </td>
   </tr>
   <tr class="application_cv_list">
    <td colspan="2" class="cv_title">&nbsp;</td>
   </tr>
  </tbody>
 </table><br />
<div align="right">
   <input name="login" type="submit" value="Log in" />
   </div>
</form>    
</td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

