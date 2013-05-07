<?php include('../common/comuni_inc.php'); ?>
<?php //include('../common/login_inc.php');//uncomment it to create administrators after logging in as a manager ?>

<?php 
if (isset($_POST['createadmin'])){
	$query="INSERT INTO yfej_admin (a_firstname, a_lastname, a_user, a_email, a_tel1, a_address, a_password, a_manager, a_level) VALUES (
	'".ucwords(trim($_POST['a_firstname']))."', 
	'".ucwords(trim($_POST['a_lastname']))."', 
	'".strtolower(trim($_POST['a_user']))."', 
	'".strtolower(trim($_POST['a_email']))."', 
	'".trim($_POST['a_tel1'])."', 
	'".trim($_POST['a_address'])."', 
	sha2('".trim($_POST['a_password'])."', 256), 
	'".$_POST['a_manager']."', 
	'".$_POST['a_level']."' 
	)";
	

	insquery($query);
	

}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="create_admin">
<input name="a_firstname" type="text" size="30" onkeyup="javascript:document.getElementById('createadmin').value='Create admin '+this.value;" />&nbsp;first name<br />
<input name="a_lastname" type="text" size="30" onkeyup="javascript:document.getElementById('createadmin').value='Create admin '+' '+this.value;" />&nbsp;last name<br />
<input name="a_user" type="text" size="30" />&nbsp;username<br />
<input name="a_email" type="text" size="30" />&nbsp;email<br />
<input name="a_tel1" type="text" size="30" />&nbsp;tel<br />
<input name="a_address" type="text" size="30" />&nbsp;address<br />
<input name="a_password" type="text" size="30" />&nbsp;password<br />
<input name="a_manager" type="text" size="1" />&nbsp;manager<br />
<input name="a_level" type="text" size="1" />&nbsp;level<br /><br />

<input name="createadmin" type="submit" id="createadmin" value="Create the admin profile" />
</form>
</body>
</html>
