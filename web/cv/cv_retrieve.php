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
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">  
<?php include("../includes/sections.php"); ?>
<h1>&nbsp;</h1>
<h1>VIEW/PRINT/EDIT YOUR CV</h1> 
<p>Submitted CVs may be modified within <?php echo $cv_edit_hours ?> hours since its creation. <br />
After that, you will still be able to print your CV. </p>
<?php echo $msg ?></p>
<form name="loginform" method="post" action="../cv/cv_welcome.php" enctype="multipart/form-data" onsubmit="" autocomplete="off" >
 <table border="0" cellpadding="0" cellspacing="0" class="application_cv"
        summary='Personal information'>
  <thead>
   <tr class="application_cv_list">
    <td colspan="3" class="cv_title"><div align="left"><em>&nbsp;</em></div></td>
   </tr>
  </thead>
  <tbody>
      
   <!-- adress break start -->
   
   <tr valign="top">
    <td class="cv_left">
     <label for="address">
      Your retrieval code     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <input type="password" name="retrievalcode" size="40" onchange="" id="retrievalcode">
     </div>     </td>
   </tr>
   <!-- adress break end -->
   <tr valign="top">
     <td class="cv_left"><label for="fax"> First name</label>     </td>
     <td class="cv_right"><div id="floatleft4">
       <input type="text" name="firstname" size="40" onchange="" id="firstname" />
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="fax"> Last name</label>     </td>
     <td class="cv_right"><div id="floatleft2">
         <input type="text" name="lastname" size="40" onchange="" id="lastname" />
     </div></td>
   </tr>
	<tr class="application_cv_list">
    	<td colspan="2" class="cv_title">&nbsp;</td>
   </tr>    </tbody>
 </table>
 <br />
 <div align="right">
   <input name="viewcv" type="submit" value="Access your CV" id="viewcv" />
   </div>
</form>    
		</td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

