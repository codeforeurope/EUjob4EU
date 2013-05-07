<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>
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
<link rel="stylesheet" type="text/css" href="../common/application.css" />
<?php include("../includes/sections.php"); ?>
<h1>&nbsp;</h1>
<h1>SYSTEM ACCESS -
  
    Operator: <strong><?php
	if ($_SESSION['a_user']!=""){
	 	echo $_SESSION['a_user'];
	}else{
	 	echo $_POST['a_user'];
	} 
        
        ?></strong>
</h1>
<p>
Enter the sections using the menu above.</p>
   </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>
