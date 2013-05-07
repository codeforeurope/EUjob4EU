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
	<h1>EMPLOYERS LIST</h1>
      <p> Click on the icon in each column to perform the following tasks: 
			
			
<div class="blue">
	<p><em>Point the mouse cursor over any of the icons right below to view its function:</em></p>
	<img src="../img/icons/doc.png" alt="View" width="24" height="24" border="0" align="absmiddle" title="to view  info about the subject" />
	<img src="../img/icons/pencil.png" alt="Edit" width="24" height="24" border="0" align="absmiddle" title="to <?php if ($_SESSION['a_level']=='7'){ ?>approve the employer and <?php }?>edit the data related to the employer" /> 		
	<img src="../img/icons/notes.png" alt="Dossier" width="24" height="24" border="0" align="absmiddle" title="to view the dossier and add a text log related to the employer" />
	<img src="../img/icons/people.png" alt="Vacancies" width="24" height="24" border="0" align="absmiddle" title="to view/edit the vacancy profiles added by the employer" />
	<img src="../img/icons/exclamation.png" alt="Company not yet validated" width="24" height="24" border="0" align="absmiddle" title="status icon - employer not yet validated" />
	<img src="../img/icons/check.png" alt="Company validated" width="24" height="24" border="0" align="absmiddle" title="status icon - company validated" />
	<img src="../img/icons/delete.png" alt="Company deleted" width="24" height="24" border="0" align="absmiddle" title="status icon - company deleted" />
</div>  

    
        </p>
  <br />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tbody>
              <tr class="application_cv_list">
                <td class="cv_title"><div align="left"><strong>Company name</strong></div></td>
                <td class="cv_title"><div align="left"><strong>Business area</strong></div></td>
               <td class="cv_title"><div align="left"><strong>&nbsp;</strong></div></td>
              </tr>
<?php 
			$offset=$_GET[offset];
			$item_perpage = 10;
			$extraparam = "";
			$querypag = "SELECT distinct * FROM $tbl_employers ";
			//if ($_SESSION['a_manager']=="0") $query .= "WHERE status = '0' ";echo
			$querypag .= "ORDER BY status, companyname ASC";
			$querytotalpag = "SELECT distinct Count(*) FROM $tbl_employers ";
			paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);
			  
			  //$query = "SELECT * FROM $tbl_employers ";
			  //$query .= "ORDER BY status ASC";
			  //$res_list = query($query);
			while ($row_list = mysql_fetch_assoc($res)){
				//see vacancies
				$query="SELECT * FROM $tbl_vacancy WHERE employer_id=".$row_list['id'];
				$res_n_vacancy=query($query);
				$n_vacancy=mysql_num_rows($res_n_vacancy);
			  ?>
              <tr class="application_cv_list" <?php if($row_list['status']=="2"){?>style="background-color:#CCC"<?php }?>>
                <td class="cv_leftline"><div align="left"><?php echo $row_list['companyname'] ?></div></td>
                <td class="cv_leftline"><div align="left"><?php echo $row_list['businessarea'] ?></div></td>
                <td class="cv_leftline">
                <?php if( $n_vacancy!=0&&$_SESSION['a_level']>=5 ){?>
                <a href="../access/employer_vacancy_list.php?employer_id=<?php echo $row_list['id'] ?>" title="<?php echo $n_vacancy ?> profiles"><img src="../img/icons/people.png" alt="" width="24" height="24" border="0" /></a>
								<?php }?>
                                <?php if ($_SESSION['a_level']>=3){ ?>
              <a href="../access/employer_view.php?employer_id=<?php echo $row_list['id'] ?>" title="view employer detail"><img src="../img/icons/doc.png" alt="View Company info" width="24" height="24" border="0" /></a>
              					<?php }?>
              <?php if (($_SESSION['a_level']==3)||($_SESSION['a_manager']==1)){  ?>
              <a href="../access/employer_detail.php?employer_id=<?php echo $row_list['id'] ?>" title="Edit company info" ><img src="../img/icons/pencil.png" alt="Edit Employer info" width="24" height="24" border="0" /></a> 
              <a href="../access/employer_dossier.php?employer_id=<?php echo $row_list['id'] ?>" title="Dossier"><img src="../img/icons/notes.png" alt="Employer dossier / annotations" width="24" height="24" border="0" /></a>
              <?php }?>
				<?php if( $row_list['status']=="0" ){?>
                	<img src="../img/icons/exclamation.png"  title="Status: not validated" width="24" height="24" border="0" />
				<?php }elseif( $row_list['status']=="1" ){?>
                	<img src="../img/icons/check.png" title="Status: validated" width="24" height="24" border="0" />
				<?php }elseif( $row_list['status']=="2" ){?>
                	<img src="../img/icons/delete.png" title="Status: deleted" width="24" height="24" border="0" />
                <?php }?>
                </td>
              </tr>
			  <?php 
			  }?>
            </tbody>
          </table>
            <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
                <tr class="application_cv_list">
                    <td class="cv_title"><div style="text-align:left;"><?php echo $prev; ?></div></td>
                    <td class="cv_title"><div style="text-align:center;"><?php echo $pagemap; ?></div></td>
                    <td class="cv_title"><div style="text-align:right;"><?php echo $next; ?></div></td>
                </tr>
            </table>
        </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

