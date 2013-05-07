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
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>CV LIST</h1>
      <p> Manage an existing CV <br />
Click on the icon in each column to perform the following tasks: 




<?php /*?>    <div class="blue">
        <img src="../img/icons/doc.png" alt="View" width="24" height="24" border="0" align="absmiddle" /> to view the info about the subject;        <img src="../img/icons/pencil.png" alt="Edit" width="24" height="24" border="0" align="absmiddle" /> to edit the data related to the candidate; <img src="../img/icons/notes.png" alt="Dossier" width="24" height="24" border="0" align="absmiddle" /> to view the dossier and add a text log related to the candidate;<br />
            <?php if ($_SESSION['a_level']>=5){ ?>
	<img src="../img/icons/heart.png" alt="Matches" width="24" height="24" border="0" align="absmiddle" /> to manage the matches for the candidate; <img src="../img/icons/question_on.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" /> to view/rate the questionnaire;            <img src="../img/icons/question_off.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" /> status icon - questionnaire evaluated;<br />
            <?php }?>
        <img src="../img/icons/key.png" alt="Send code / Manage edit time window" width="24" height="24" border="0" align="absmiddle" /> to send the retrieval code and make the CV editable; <img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" /> status icon - candidate may still edit his CV (hh:mm:ss left);<br />
    <img src="../img/icons/exclamation_red.png" alt="No basic education" width="24" height="24" border="0" align="absmiddle" /> no education;&nbsp; <img src="../img/icons/exclamation_green.png" alt="No skills" width="24" height="24" border="0" align="absmiddle" /> no skills;&nbsp; <img src="../img/icons/exclamation_blue.png" alt="No work experience" width="24" height="24" border="0" align="absmiddle" /> no work experience; <img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" align="absmiddle" /> status icon - candidate sent for interview;<br />
            <img src="../img/icons/attention.png" alt="Back from interview, not employed" width="24" height="24" border="0" align="absmiddle" /> status icon - candidate sent for interview but not employed; <img src="../img/icons/bag.png" alt="Sucessfully employed, not available" width="24" height="24" border="0" align="absmiddle" /> status icon - candidate successfully employed, not available.<br />
</div>      
<?php */?>

    <div class="blue">
		<p><em>Point the mouse cursor over any of the icons right below to view its function:</em></p>
        <img src="../img/icons/doc.png" alt="View" width="24" height="24" border="0" align="absmiddle" title="view the info about the subject" /> 
				<img src="../img/icons/pencil.png" alt="Edit" width="24" height="24" border="0" align="absmiddle" title="edit the data related to the candidate" /> 
				<img src="../img/icons/notes.png" alt="Dossier" width="24" height="24" border="0" align="absmiddle" title="view the dossier and add a text log related to the candidate" />
				<?php if ($_SESSION['a_level']>=5){ ?>
				<img src="../img/icons/heart.png" alt="Matches" width="24" height="24" border="0" align="absmiddle" title="manage the matches for the candidate" /> 
				<img src="../img/icons/heart_off.png" width="24" height="24" border="0" align="absmiddle" title="candidate excluded from matches - CV incomplete" /> 
				<img src="../img/icons/question_on.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" title="view/rate the questionnaire" /> 
				<img src="../img/icons/question_off.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" title="status icon - questionnaire evaluated" />
				<?php }?>
        <img src="../img/icons/key.png" alt="Send code / Manage edit time window" width="24" height="24" border="0" align="absmiddle" title="send the retrieval code and make the CV editable" /> <img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" title="status icon - candidate may still edit his CV (hh:mm:ss left)" /> 
				<img src="../img/icons/exclamation_red.png" alt="No basic education" width="24" height="24" border="0" align="absmiddle" title="no education" /> 
				<img src="../img/icons/exclamation_green.png" alt="No skills" width="24" height="24" border="0" align="absmiddle" title="no skills" /> 
				<img src="../img/icons/exclamation_blue.png" alt="No work experience" width="24" height="24" border="0" align="absmiddle" title="no work experience" /> 
				<img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" align="absmiddle" title="status icon - candidate sent for interview" /> 
				<img src="../img/icons/attention.png" alt="Back from interview, not employed" width="24" height="24" border="0" align="absmiddle" title="status icon - candidate sent for interview but not employed" /> 
				<img src="../img/icons/bag.png" alt="Sucessfully employed, not available" width="24" height="24" border="0" align="absmiddle" title="status icon - candidate successfully employed, not available" />
</div>      



        </p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data" name="searchcv" target="_self">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
    	<tr>
      <td class="blue">First name:
      <input name="search_firstname" type="text" id="search_firstname" size="10" maxlength="20" value="<?php echo $_GET['search_firstname'] ?>" /></td>
      <td class="blue">Last name:
      <input name="search_lastname" type="text" id="search_lastname" size="10" maxlength="20"  value="<?php echo $_GET['search_lastname'] ?>"/></td>
    	<td class="blue">Retrieval code:
      <input name="search_retrievalcode" type="text" id="search_retrievalcode" size="20" maxlength="20" value="<?php echo $_GET['search_retrievalcode'] ?>" /></td>
    	<td valign="bottom">
      <input type="submit" value="Search" name="cv_search" id="cv_search" title="Search" onClick="" />
      </td>
    	</tr>
    </table>
    </form>
        <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <?php 
			if (isset($_GET['cv_search'])){
				if (isset($_GET['search_firstname']))$searchparam.=" and firstname like '%".trim($_GET['search_firstname'])."%' ";			
				if (isset($_GET['search_lastname']))$searchparam.=" and lastname like '%".trim($_GET['search_lastname'])."%' ";		
				if (isset($_GET['search_retrievalcode']))$searchparam.=" and retrievalcode like '%".trim($_GET['search_retrievalcode'])."%'";			
			}else{
				$searchparam = "";
			}
			
			$extraparam = "&search_firstname=".$_GET['search_firstname']."&search_lastname=".$_GET['search_lastname']."&search_retrievalcode=".$_GET['search_retrievalcode']."&cv_search=".$_GET['cv_search'];
			
			$offset=$_GET['offset'];
			$item_perpage = 10;
			
			$querypag = "SELECT (`date_editable` - NOW()) as is_editable,TIMEDIFF(`date_editable`, NOW()) as edit_time_left,$tbl_cv.* FROM $tbl_cv ";
			$querypag .= " where status <> '0' ".$searchparam;
			$querypag .= " ORDER by id desc";
			$total = paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);
			?>
            <tr>
              <td class="cv_title" colspan="5" ><strong><?php echo $total ?></strong> CVs found (including <strong><?php echo retval("count(*)", $tbl_cv, "match_status", "0"); ?></strong> incomplete and excluded from match) + <strong><?php echo retval("count(*)", $tbl_cv, "status", "0"); ?> </strong>canceled</td>
            </tr>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>Last name</strong></div></td>
              <td align="left" class="cv_title"><strong>First name</strong></td>
              <td align="left" class="cv_title"><strong>Birth date</strong> (d/m/y) </td>
              <td class="cv_title"><div align="left"><strong>Retrieval code</strong></div></td>
              <td class="cv_title"><div align="left"><strong>&nbsp;</strong></div></td>
            </tr>
			<?php
			while ($row_list = mysql_fetch_assoc($res)){
				//calculate the score
				$cv_score = 10*retval("sum(i_o+o_o+c_o+n_o+f_o)",$tbl_cv_questionnaire,"cv_id",$row_list['id']);
				
				//any matches?
				$query="SELECT DISTINCT COUNT( $tbl_cv_isco.cv_id ) AS n_matches
								FROM $tbl_cv_isco, $tbl_vacancy, $tbl_cv, $tbl_employers
								WHERE $tbl_cv_isco.cv_isco_2 = $tbl_vacancy.isco_2
								AND $tbl_cv_isco.cv_id = $tbl_cv.id
								AND $tbl_employers.id = $tbl_vacancy.employer_id
								AND $tbl_vacancy.n_vacancies_left > 0
								AND $tbl_vacancy.papers =  '1'
								AND $tbl_cv.status <> '0'
								AND $tbl_employers.country <> $tbl_cv.country
								AND $tbl_employers.status = '1'
								AND $tbl_cv.id=".$row_list['id'];
				$res_n_matches=query($query);//echo $query;
				$row_n_matches=mysql_fetch_assoc($res_n_matches);
				
			?>
            <tr class="application_cv_list">
              <td class="cv_leftline" ><div align="left"><?php echo ucwords(strtolower($row_list['lastname'])) ?><br />
              <?php if ((int)($row_list['is_editable'])>0){ ?>
              	<img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" />              (<?php echo $row_list['edit_time_left'] ?>)<br />
              <?php } ?>
              </div></td>
              <td class="cv_leftline"><div align="left"><?php echo ucwords(strtolower($row_list['firstname'])) ?><br />
                      <?php if ( intval(retval("id",$tbl_edu,"cv_id",$row_list['id']))==0){  ?>
                      <img src="../img/icons/exclamation_red.png" alt="no education" width="24" height="24" border="0" title="No education" />
                      <?php }?>
					  <?php $skills=$row_list['socialskills'].$row_list['organisationalskills'].$row_list['technicalskills'].$row_list['computerskills'].$row_list['artisticskills'].$row_list['otherskills'];
					  if ( trim($skills)=="" ){?>
                      <img src="../img/icons/exclamation_green.png" width="24" height="24" border="0" title="No skills" />
                      <?php } ?>                      
                      <?php if ( intval(retval("id",$tbl_wrkexp,"cv_id",$row_list['id']))==0){  ?>
                      <img src="../img/icons/exclamation_blue.png" alt="no work experience" width="24" height="24" border="0" title="No work experience" />
                      <?php }?>
                      <?php if ( intval($row_n_matches['n_matches'])>0&&intval($_SESSION['a_level']>=5) ){ ?>
                      <a href="../access/matches.php?task=filter_cv&cv_id=<?php echo $row_list['id'] ?>" target="_self" title="Matches for this candidate (<?php echo $row_n_matches['n_matches']; ?>)"><img src="../img/icons/heart<?php echo ($row_list['match_status']=="0")?"_off":"";?>.png" width="24" height="24" border="0" /></a>
                      <?php }?>
                      <br />
                      <strong><?php echo intval(retval("Count(*)",$tbl_lang,"cv_id",$row_list['id'])); ?></strong> languages <br />
              </div></td>
              <td class="cv_leftline"><div align="left"><?php echo substr($row_list['bdate'],8,2)."-".substr($row_list['bdate'],5,2)."-".substr($row_list['bdate'],0,4); ?></div></td>
              <td class="cv_leftline"><div align="left">
              Created:<?php echo eudate($row_list['date_created']) ?><br />
              <?php if ($row_list['time_extensions']>0){ ?>extended <?php echo $row_list['time_extensions'] ?> times<br /><?php }?>
              <a href="../access/cv_send_code.php?cv_id=<?php echo $row_list['id'] ?>" target="_self"><img src="../img/icons/key.png" alt="Make it editable" width="24" height="24" border="0" align="absmiddle" /></a><?php echo $row_list['retrievalcode'] ?></div></td>
              <td class="cv_leftline"><div align="left">
              <a href="../cv/cv_full.php?task=adminview&cv_id=<?php echo $row_list['id'] ?>" title="view CV" target="_blank"><img src="../img/icons/doc.png" alt="View CV" width="24" height="24" border="0" /></a>
              <a href="../cv/cv_1.php?task=edit&cv_id=<?php echo $row_list['id'] ?>" title="edit CV"><img src="../img/icons/pencil.png" alt="Edit CV" width="24" height="24" border="0" /></a> 

              <a href="../access/cv_dossier.php?cv_id=<?php echo $row_list['id'] ?>" title="Dossier"><img src="../img/icons/notes.png" alt="CV Dossier / annotations" width="24" height="24" border="0" /></a>
              <?php if ($_SESSION['a_level']>=5){ ?>
                <a href="../access/cv_questionnaire.php?cv_id=<?php echo $row_list['id'] ?>"><img src="../img/icons/question_<?php echo ($cv_score>=30)?"off":"on";?>.png" alt="<?php echo $cv_score ?>" width="24" height="24" border="0" /></a>
              <?php } ?>
							<?php if (intval($row_list['status'])==4){ ?>
                <img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" />
							<?php }?>
							<?php if (intval($row_list['status'])==5){ ?>
                <img src="../img/icons/attention.png" alt="Not employed" width="24" height="24" border="0" />
							<?php }?>
							<?php if (intval($row_list['status'])==6){ ?>
                <img src="../img/icons/bag.png" alt="Employed" width="24" height="24" border="0" />
							<?php }?>
              </div></td>
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
        </table>	</td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

