<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/employer_login_inc.php'); ?>
<?php 
$employer_id = intval($_SESSION['e_id']);//id is already a session variable
include("../includes/employer_editprofile_inc.php"); ?>

