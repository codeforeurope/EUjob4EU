<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>
<?php if ($_SESSION['a_level']<5){exit;}?>
<?php 
unset($_SESSION['cv_name']);
unset($cv_name); 
unset($_SESSION['cv_id']);
unset($cv_id); 
unset($_SESSION['task']);
unset($task); 
?>
<?php 
//update paper status
if (isset($_GET['papers'])){
	$query="update $tbl_vacancy set papers ='".$_GET['papers']."' where id =".$_GET['vacancy_id'];
	//echo $query;
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
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application"> 
	<?php include("../includes/sections.php"); ?>
    <h1>&nbsp;</h1>
	<h1>LIST OF VACANCIES/PROFILES</h1>
    You may view the detail for each request added by the registered employers by clicking on the profile heading below.<br />
    Employers <em><strong>must</strong></em> print, sign and send each and every vacancy request to:
  
    <ul>
  <li><strong>Provincia di Roma</strong> - <strong><em>Your First EURES Job<br />
  </em></strong>Via Raimondo Scintu
    106<br />
    00173 - Roma (Italy)<br />
    by Fax: +39 06 6766 8475<br />
    by email: <a href="mailto:eures.employer@provincia.roma.it">eures.employer@provincia.roma.it</a>  (<em>please scan the signed document</em>)</li>
  </ul>
    <div class="blue">click on the icons 
    <img src="../img/icons/exclamation.png" title="Papers not received" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/check.png" title="Papers received, up for match" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/delete.png" title="Vacancy deleted" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/ok.png" title="Vacancy fulfilled, waiting contracts" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/pen.png" title="Contracts signed" width="24" height="24" border="0" align="absmiddle" /> 
    o toggle the status of the vacancy to: papers not received (the vacancy is editable), paper received, vacancy deleted, vacancy fulfilled, contracts signed;<br />
    </div>
    </p>
    <!--tabella elenco vacancy inserita-->
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tbody>
              <tr class="application_cv_list">
                <td class="cv_title">Employer</td>
    			<td class="cv_title">Profiles requested</td>
                <td class="cv_title">Vacancy(ies)</td>
                <td class="cv_title">Papers</td>
              </tr>
			<?php 
			$offset=$_GET[offset];
			$item_perpage = 10;
			$extraparam = "";
			$querypag = "SELECT distinct v.id as vacancy_id, e.id as employer_id, e.companyname as companyname, v.n_vacancies as n_vacancies, v.n_vacancies_left as n_vacancies_left, v.isco_1 as isco_1, v.isco_2 as isco_2, v.isco_3 as isco_3, v.papers as papers 
			FROM $tbl_vacancy v, $tbl_employers e
					WHERE v.employer_id = e.id ";
			//if ($_SESSION['a_manager']=="0") $query .= "WHERE status = '0' ";
			$querypag .= "ORDER by v.papers, e.companyname ASC";
			$querytotalpag = "SELECT Count(*) FROM $tbl_vacancy v, $tbl_employers e
								WHERE v.employer_id = e.id";
			paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);
			//$res_list = query($query);
			
			while ($row_list = mysql_fetch_assoc($res)){
			?>

              <tr class="application_cv_list" <?php if($row_list['papers']=="2"){?>style="background-color:#CCC"<?php }?>>
                <td class="cv_leftline"><?php echo $row_list['companyname'] ?></td>
                <td class="cv_leftline"><div align="left"><a href="../access/financial_support.php?vacancy_id=<?php echo $row_list['vacancy_id'] ?>&e_id=<?php echo $row_list['employer_id'] ?>" target="_blank">
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_1']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_2']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_3']); ?></a>
				</div></td>
                <td class="cv_leftline"><div align="left"><?php echo $row_list['n_vacancies_left'] ?> of <?php echo $row_list['n_vacancies'] ?></div></td>
                <td class="cv_leftline">
                <?php //level 5 show icons only
				if ($_SESSION['a_level']==5){
                	if ($row_list['papers']=="0"){
                		?><img src="../img/icons/exclamation.png" title="Vacancy not yet validated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="1"){
                		?><img src="../img/icons/check.png" title="Vacancy validated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="2"){
                		?><img src="../img/icons/delete.png" title="Vacancy eliminated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="3"){
                		?><img src="../img/icons/ok.png" title="Vacancy fullfilled" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="4"){
                		?><img src="../img/icons/pen.png" title="Contracts signed" width="24" height="24" border="0" /><?php 
					}
				}
				if ($_SESSION['a_manager']=="1"){ //the manager edits
					if ($row_list['papers']=="0"){?>
					<a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=1&vacancy_id=<?php echo $row_list['vacancy_id'] ?>"><img src="../img/icons/exclamation.png" alt="Papers not received" width="24" height="24" border="0" /></a>
					<?php }elseif ($row_list['papers']=="1"){?>
					<a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=2&vacancy_id=<?php echo $row_list['vacancy_id'] ?>"><img src="../img/icons/check.png" alt="Papers received" width="24" height="24" border="0" /></a>
					<?php }elseif ($row_list['papers']=="2"){?>
					<a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=3&vacancy_id=<?php echo $row_list['vacancy_id'] ?>"><img src="../img/icons/delete.png" alt="vacancy deleted" width="24" height="24" border="0" /></a>
					<?php }elseif ($row_list['papers']=="3"){?>
					<a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=4&vacancy_id=<?php echo $row_list['vacancy_id'] ?>"><img src="../img/icons/ok.png" alt="vacancy fulfilled, waiting contract" width="24" height="24" border="0" /></a>
					<?php }elseif ($row_list['papers']=="4"){?>
					<a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=0&vacancy_id=<?php echo $row_list['vacancy_id'] ?>"><img src="../img/icons/pen.png" alt="contracts signed" width="24" height="24" border="0" /></a>
					<?php }
				}?>                
                    </td>
              </tr>
			  <?php 
			  }?>
               </tbody>
          </table>    
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tr class="application_cv_list">
                <td class="cv_title"><div style="text-align:left;"><?php echo $prev; ?></div></td>
                <td class="cv_title"><div style="text-align:center;"><?php echo $pagemap ?></div></td>
                <td class="cv_title"><div style="text-align:right;"><?php echo $next; ?></div></td>
            </tr>
		</table>          </td>
  </tr>
</table>

<!--fine tabella elenco vacancy inserite-->

</body>
</html>
<?php include('../common/bot.php'); ?>

