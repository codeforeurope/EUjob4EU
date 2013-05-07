<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>

<?php 
	$query = "SELECT * FROM $tbl_employers WHERE id =".$_GET['employer_id'];
	$res=query($query);
	$row=mysql_fetch_assoc($res);
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
  <tr >
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
<h1>EMPLOYER INFO - <?php echo $row['companyname'] ?></h1>
  <p>&nbsp;</p>
  
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tbody>
           <tr class="application_cv_list">
            <td colspan="2" class="cv_title">&nbsp;</td>
           </tr>
          </thead>
          <tbody>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left" width="50%"><em><strong>Company info:</strong></em></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><span class="cv_right">status:</span></td>
     <td class="cv_right"><?php if ($row['status']=='1'){ ?>
       approved
         <?php }else{ ?>
         not approved
         <?php }?></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="lastname">Company name</label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <?php echo $row['companyname'] ?>     </div>     </td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left"><label for="label">Registration number</label>     </td>
     <td class="cv_right"><div id="floatleft3">
         <?php echo $row['pivacf'] ?>
     </div></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="firstname">Legal representative</label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <?php echo $row['legal_representative'] ?>     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Address of legal representative</td>
     <td class="cv_right"><?php echo $row['legal_address'] ?></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="municipality">
      Head office address     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
       <?php echo $row['address'] ?>     </div>     </td>
   </tr>
   
   
   <tr valign="top">
     <td class="cv_left">Country</td>
     <td class="cv_right"><?php echo retval("name",$tbl_eu_member,"code",$row['country']); ?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">City</td>
     <td class="cv_right"><?php echo $row['city'] ?></td>
   </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="postalcode">
     Postal code      </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <?php echo $row['postalcode'] ?>     </div>     </td>
   </tr>
   
   
   <tr valign="top">
    <td class="cv_left">
     <label for="country">
     Business area    </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <?php echo $row['businessarea'] ?>     </div>    </td>
   </tr>
   
   
   <tr valign="top">
	   <td class="cv_left"></td><td class="cv_right"></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Phone </label>     </td>
     <td class="cv_right"><div id="floatleft5">
         <?php echo $row['phone1'] ?>
     </div></td>
   </tr>
   
        
   <tr valign="top">
     <td class="cv_left"><label for="label"> E-mail </label>     </td>
     <td class="cv_right"><div id="floatleft4">
         <?php echo $row['email'] ?>
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Workforce</td>
     <td class="cv_right"><?php if ($row['workforce']=="0"){ ?><em>less than 250</em><?php }?>
         <?php if ($row['workforce']=="1"){ ?><em>more than 250</em><?php }?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><em><strong>Contact info:</strong></em></td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="firstname"> Contact/refernt name</label>     </td>
     <td class="cv_right"><div id="floatleft5">
         <?php echo $row['referent'] ?>
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="mobile"> Position held / Title</label>     </td>
     <td class="cv_right"><div id="floatleft6">
         <?php echo $row['position'] ?>
     </div></td>
   </tr>
   <tr valign="top">
     <td class="cv_left"><label for="label2"> E-mail</label>     </td>
     <td class="cv_right"><div id="floatleft7">
         <?php echo $row['email_r'] ?>
     </div></td>
   </tr>
   
    <tr valign="top">
      <td class="cv_left"><label for="mobile"> Phone </label>      </td>
      <td class="cv_right"><div id="floatleft2">
          <?php echo $row['phone2'] ?>
      </div></td>
    </tr>
   <tr valign="top">
    <td class="cv_left">
     <label for="fax">
      Fax     </label>    </td>
    <td class="cv_right">
     <div id="floatleft">
      <?php echo $row['fax'] ?>     </div>     </td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Skype id</td>
     <td class="cv_right"><?php echo $row['skype'] ?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Linkedin</td>
     <td class="cv_right"><?php echo $row['linkedin'] ?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Facebook</td>
     <td class="cv_right"><?php echo $row['facebook'] ?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">Website</td>
     <td class="cv_right"><?php echo $row['website'] ?></td>
   </tr>
   
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
   <tr valign="top">
     <td class="cv_left">How did you hear about this project?</td>
     <td class="cv_right"><?php echo $row['infoproject'] ?></td>
   </tr>
   <tr valign="top">
     <td class="cv_left">&nbsp;</td>
     <td class="cv_right">&nbsp;</td>
   </tr>
	<tr class="application_cv_list">
    	<td colspan="2" class="cv_title">&nbsp;</td>
   </tr>  
  </tbody>
 </table>
 <p>&nbsp;</p>
 <p>&nbsp;
   
 </p>
   </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

