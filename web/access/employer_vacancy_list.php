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
include_once("Mail.php");
//send notification to evaluation team script
if ($_GET['task']=="notify"){
	if (retval("notified",$tbl_vacancy,"id",$_GET['v_id'])=="0"){
		$query="update $tbl_vacancy set notified ='1' where id=".$_GET['v_id'];
		
		if (insquery($query)){
			 
			//send notification to evaluation team/////////////////////////////////////////////
			$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
			//$To = $new_event_email;
			$To = "$new_event_email_op1,$new_event_email_op2,$new_event_email_op3, $new_event_email";
			$Subject = "EUJob4EU - New vacancy to be evaluated!"; 
			
			$vacancy_protocol = substr(str_replace("-","",retval("date_created",$tbl_vacancy,"id",$_GET['v_id'])),0,8).$_GET['v_id'];
			$employer_name = retval("companyname",$tbl_employers,"id",$_GET['employer_id']);
			//echo $employer_name;exit;
			$Message = "Dear Match Evaluation Team, 
			
the vacancy profile prot. ".$vacancy_protocol." from employer ".$employer_name." is ready to be evaluated!
			
Thank you
			
EUJob4EU - Ufficio Monitoraggio e Progetti Europei
==================================================
URL: http://www.yourfirsteuresjob.eu/eujob4eu-admin
			";
			//echo $Message;exit;
			$Host = "mail.provincia.roma.it"; 
			$Username = $smtp_user; 
			$Password = $smtp_pw; 
			$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
			$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
			'username' => $Username, 'password' => $Password)); 
			$mail = $SMTP->send($To, $Headers, $Message); 
			if (PEAR::isError($mail)){$msg = $mail->getMessage();} 
			//end send notification to evaluation team script//////////////////////////////////////////////////////////
		}
	
	}
}
//update papers status
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
        Employers <em><strong>must</strong></em> print, sign and send each and every vacancy request to:
  
    <ul>
  <li><strong>Provincia di Roma</strong> - <strong><em>Your First EURES Job<br />
  </em></strong>Via Raimondo Scintu
    106<br />
    00173 - Roma (Italy)<br />
    by Fax: +39 06 6766 8475<br />
    by email: <a href="mailto:eures.employer@provincia.roma.it">eures.employer@provincia.roma.it</a>  (<em>please scan the signed document</em>)</li>
  </ul>
  
  Click on the corresponding icon:<br />
  <br />

 
    <div class="blue"><a href="../access/financial_support.php?vacancy_id=<?php echo $row_list['vacancy_id'] ?>&amp;e_id=<?php echo $row_list['employer_id'] ?>" title="View vacancy detail" target="_blank"><img src="../img/icons/doc.png" alt="View vacancy detail" width="24" height="24" border="0" align="absmiddle" /></a> to open the printable document;<br />
    <img src="../img/icons/exclamation.png" title="Papers not received" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/check.png" title="Papers received, up for match" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/delete.png" title="Vacancy deleted" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/ok.png" title="Vacancy fulfilled, waiting contracts" width="24" height="24" border="0" align="absmiddle" /> 
    <img src="../img/icons/pen.png" title="Contracts signed" width="24" height="24" border="0" align="absmiddle" /> 
    to toggle the status of the vacancy to: papers not received (the vacancy is editable), paper received, vacancy deleted, vacancy fulfilled, contracts signed;<br />
    <?php if ($_SESSION['a_manager']=="1"){?>
    <img src="../img/icons/megaphone.png" alt="Notify match evaluation team" width="24" height="24" border="0" align="absmiddle" /> to notify the match evaluation team to work on the vacancy;
    <?php }?>
    <img src="../img/icons/pencil.png" alt="Edit CV" width="24" height="24" border="0" align="absmiddle" /> to edit the vacancy data.<br />
    </div>
    </p>
    <!--tabella elenco vacancy inserita-->
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tbody>
			<?php 
			$offset=$_GET['offset'];
			$item_perpage = 10;
			
			$querypag = "SELECT distinct v.id as vacancy_id, e.id as employer_id, e.companyname as companyname, v.n_vacancies as n_vacancies, v.n_vacancies_left as n_vacancies_left, v.isco_1 as isco_1, v.isco_2 as isco_2, v.isco_3 as isco_3, v.papers as papers, v.notified as notified 
			FROM $tbl_vacancy v, $tbl_employers e
					WHERE v.employer_id = e.id AND v.employer_id =".$_GET['employer_id']."
					ORDER BY v.papers ";
			

			$total = paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);

			?>
            <tr>
              <td class="cv_title" colspan="4" ><strong><?php echo $total ?></strong> vacancy profiles found</td>
            </tr>
              <tr class="application_cv_list">
                <td class="cv_title"><div align="left"><strong>Employer</strong></div></td>
    						<td class="cv_title"><div align="left"><strong>Profiles requested</strong></div></td>
                <td class="cv_title"><div align="left"><strong>Vacancy(ies)</strong></div></td>
                <td class="cv_title"><div align="left"><strong>Papers</strong></div></td>
              </tr>
			<?php
			//$res=query($query);
			while ($row_list = mysql_fetch_assoc($res)){
			?>

              <tr class="application_cv_list" <?php if($row_list['papers']=="2"){?>style="background-color:#CCC"<?php }?>>
                <td class="cv_leftline"><?php echo $row_list['companyname'] ?></td>
                <td class="cv_leftline"><div align="left"><?php /*?><a href="../access/financial_support.php?vacancy_id=<?php echo $row_list['vacancy_id'] ?>&e_id=<?php echo $row_list['employer_id'] ?>" target="_blank"><?php */?>
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_1']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_2']); ?><br />
				<?php echo retval("description",$tbl_isco,"code",$row_list['isco_3']); ?>
				</div></td>
                <td class="cv_leftline"><div align="left"><?php echo $row_list['n_vacancies_left'] ?> of <?php echo $row_list['n_vacancies'] ?></div></td>
                <td class="cv_leftline">
                <a href="../access/financial_support.php?vacancy_id=<?php echo $row_list['vacancy_id'] ?>&e_id=<?php echo $row_list['employer_id'] ?>" title="View vacancy detail" target="_blank"><img src="../img/icons/doc.png" alt="View vacancy detail" width="24" height="24" border="0" /></a>
                <?php  //show icons only to level 5
				if ($_SESSION['a_level']==5){
                	if ($row_list['papers']=="0"){
                		?><img src="../img/icons/exclamation.png" title="Vacancy not yet validated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="1"){
                		?><img src="../img/icons/check.png" title="Vacancy validated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="2"){
                		?><img src="../img/icons/delete.png" title="Vacancy eliminated" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="3"){
                		?><img src="../img/icons/ok.png" title="All position fulfilled, waiting contracts" width="24" height="24" border="0" /><?php 
					}elseif($row_list['papers']=="4"){
                		?><img src="../img/icons/pen.png" title="Contracts signed" width="24" height="24" border="0" /><?php 
					}
				}
				
				if ($_SESSION['a_manager']=="1"){ //manager has edit privilege?>
					<?php //notification email?>
					<?php if ($row_list['notified']=="0"){?>
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>?task=notify&v_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $row_list['employer_id'] ?>"><img src="../img/icons/megaphone.png" width="24" height="24" border="0" title="Notify" /></a>
                    <?php }?>    
                    <?php //end notification email ?>    
				<?php if ($row_list['papers']=="0"){?>
        				<a href="../access/employer_editvacancy.php?task=recall&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>" title="edit vacancy detail"><img src="../img/icons/pencil.png" width="24" height="24" border="0" /></a>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=1&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>"><img src="../img/icons/exclamation.png" alt="Papers not received" width="24" height="24" border="0" /></a>
				<?php }elseif ($row_list['papers']=="1"){?>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=2&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>"><img src="../img/icons/check.png" alt="Papers received" width="24" height="24" border="0" /></a>
				<?php }elseif ($row_list['papers']=="2"){?>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=3&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>"><img src="../img/icons/delete.png" alt="Vacancy deleted" width="24" height="24" border="0" /></a>
				<?php }elseif ($row_list['papers']=="3"){?>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=4&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>"><img src="../img/icons/ok.png" alt="Vacancy fulfilled, waiting contracts" width="24" height="24" border="0" /></a>
				<?php }elseif ($row_list['papers']=="4"){?>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?papers=0&vacancy_id=<?php echo $row_list['vacancy_id'] ?>&employer_id=<?php echo $_GET['employer_id'] ?>"><img src="../img/icons/pen.png" alt="Contract signed" width="24" height="24" border="0" /></a>
				<?php }?>  
				<?php 
				}?>            
                </td>
              </tr>
			  <?php 
			  }?>
               </tbody>
          </table>    
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
            <tr class="application_cv_list">
              <td class="cv_title">
              <div style="text-align:left;"><?php echo $prev; ?></div></td>
              <td class="cv_title">
              <div style="text-align:center;"><?php echo $pagemap ?></div></td>
              <td class="cv_title">
              <div style="text-align:right;"><?php echo $next; ?></div></td>
            </tr>
		</table>          </td>
  </tr>
</table>

<!--fine tabella elenco vacancy inserite-->

</body>
</html>
<?php include('../common/bot.php'); ?>

