<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/employer_login_inc.php'); ?>
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
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application"> 
	<?php include("../includes/sections.php"); ?>
    <h1>&nbsp;</h1>
	<h1>LIST OF VACANCIES/PROFILES</h1>
    You may view the detail for each request already added by clicking on the document icon below, and edit the vacancy data while the pencl is still available.<br /> 
        Once the pencil has disappeared - you <em><strong>must</strong></em> print, sign and send each request to:
  
        <ul>
  <li><strong>Provincia di Roma</strong> - <strong><em>Your First EURES Job<br />
  </em></strong>Via Raimondo Scintu
    106<br />
    00173 - Roma (Italy)<br />
    by Fax: +39 06 6766 8475<br />
    by email: <a href="mailto:eures.employer@provincia.roma.it">eures.employer@provincia.roma.it</a>  (<em>please scan the signed document</em>)</li>
  </ul>

    </p>
    <!--tabella elenco vacancy inserita-->
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tbody>
              <tr class="application_cv_list">
    			<td class="cv_title">Profiles already requested</td>
                <td class="cv_title">Vacancy(ies)</td>
              </tr>
			<?php 
            $query = "SELECT * FROM $tbl_vacancy where employer_id=".$_SESSION['e_id'];
            $res_list = query($query);
            while ($row_list = mysql_fetch_assoc($res_list)){
            ?>
              <tr class="application_cv_list" <?php /*?>onclick="javascript:window.open('employer_financial_support.php?vacancy_id=<?php echo html_entity_decode($row_list['id'], ENT_NOQUOTES, "UTF-8") ?>', '_blank')" style="cursor:hand"<?php */?>>
                <td class="cv_leftline"><div align="left">
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_1']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_2']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_3']); ?>
				</div></td>
                <td class="cv_leftline">
								<?php if ( $row_list['papers']==0 ){ ?>
                <a href="../employer/employer_addvacancy.php?task=recall&vacancy_id=<?php echo $row_list['id'] ?>" title="edit vacancy detail"><img src="../img/icons/pencil.png" alt="Edit CV" width="24" height="24" border="0" /></a>
                <?php } ?>
                <a href="../employer/employer_financial_support.php?vacancy_id=<?php echo $row_list['id'] ?>" title="Print vacancy detail" target="_blank"><img src="../img/icons/doc.png" alt="Print vacancy detail" width="24" height="24" border="0" /></a>
								<?php echo $row_list['n_vacancies'] ?></td>
              </tr>
			  <?php 
			  }?>
                <tr class="application_cv_list">
                    <td colspan="2" class="cv_title">&nbsp;</td>
               </tr>            
               </tbody>
          </table>    </td>
  </tr>
</table>
<!--fine tabella elenco vacancy inserite-->

</body>
</html>
<?php include('../common/bot.php'); ?>

