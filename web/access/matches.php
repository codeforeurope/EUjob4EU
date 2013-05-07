<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>
<?php 
unset($_SESSION['cv_name']);
unset($cv_name); 
unset($_SESSION['cv_id']);
unset($cv_id); 
unset($_SESSION['task']);
unset($task); 
include_once("Mail.php"); 
//echo "jjj".$_GET['closed_matches'];
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
	<h1>CURRENT MATCHES CV / PROFILE</h1>
      <p> Click on the icon in each column to perform the following tasks:</p>
			
<div class="blue">
	<p><em>Point the mouse cursor over any of the icons right below to view its function:</em></p>
	<img src="../img/icons/doc.png" alt="View" width="24" height="24" border="0" align="absmiddle" title="view the info about the subject" />  
	<img src="../img/icons/pencil.png" alt="Edit" width="24" height="24" border="0" align="absmiddle" title="edit the data related to the subject" /> 
	<img src="../img/icons/notes.png" alt="Dossier" width="24" height="24" border="0" align="absmiddle" title="edit the dossier of the corresponding subject" />
	<img src="../img/icons/not_available.png" alt="Validated but not available" width="24" height="24" border="0" align="absmiddle" title="validated but not available" />
	<img src="../img/icons/available.png" alt="Validated and available" width="24" height="24" border="0" align="absmiddle" title="validated and available" />
	<img src="../img/icons/envelope.png" alt="CV sent to employer" width="24" height="24" border="0" align="absmiddle" title="CV sent to employer" />
	<img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" align="absmiddle" title="sent for interview" />
	<img src="../img/icons/attention.png" alt="Not employed" width="24" height="24" border="0" align="absmiddle" title="not employed" />
	<img src="../img/icons/bag.png" alt="Eemployed" width="24" height="24" border="0" align="absmiddle" title="employed" />    
	<img src="../img/icons/exclamation.png" alt="Match dossier / annotations" width="24" height="24" border="0" align="absmiddle" title="validate the corresponding match" />  
	<img src="../img/icons/question_on.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" title="view/rate the questionnaire" /> 			
	<?php if ($_SESSION['a_level']>=5){ ?>
	<img src="../img/icons/question_off.png" alt="Questionnaire" width="24" height="24" border="0" align="absmiddle" title="status icon - questionnaire evaluated" /> 
	<?php }?>
	<img src="../img/icons/heart.png" alt="Filtered matches" width="24" height="24" border="0" align="absmiddle" title="filter the matches of the corrisponding subject" /> 
	<img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" title="status icon - candidate may still edit his CV (hh:mm:ss left)" /> 
	<img src="../img/icons/exclamation_red.png" alt="No basic education" width="24" height="24" border="0" align="absmiddle" title="no education" /> 
	<img src="../img/icons/exclamation_green.png" alt="No skills" width="24" height="24" border="0" align="absmiddle" title="no skills" />  
	<img src="../img/icons/exclamation_blue.png" alt="No work experience" width="24" height="24" border="0" align="absmiddle" title="no work experience" />  
</div>


    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <?php 
			//$query_filter = "";
			//filter by cv
			if ($_GET['task']=="filter_cv"){
				$query_filter = " AND c.id=".intval($_GET['cv_id']);
				//$allitems_perpage = 100000;
			}
			
			//filter by employer
			if ($_GET['task']=="filter_employer"){
				$query_filter = " AND v.employer_id=".intval($_GET['employer_id']);
			}
			
			
			if( isset($_POST['filter_status']) ){
				$filter_status = intval($_POST['filter_status']);
			}else{
				$filter_status = intval($_GET['filter_status']);
			}
			if ( $filter_status>0 ){
				$add_status=1;
			}
			
/*			if( isset($_GET['closed_matches'])&&$_GET['closed_matches']=="1" ){
				$closed_matches=$_GET['closed_matches'];
			}elseif( isset($_POST['closed_matches'])&&$_POST['closed_matches']=="1" ){
				$closed_matches=$_POST['closed_matches'];
			}
*/
			if( isset($_GET['closed_matches'])||isset($_POST['closed_matches']) ){
				$closed_matches=intval($_GET['closed_matches'])+intval($_POST['closed_matches']);	
				if(intval($closed_matches)>1){
					$closed_matches=1;
				}
			}
						
			$offset=$_GET['offset'];
			//$item_perpage = 10+$allitems_perpage;
			if( isset($_POST['filter_status']) ){
				$offset="";	
			}
			$item_perpage = 10;
			//$extraparam = "&task=".$_GET['task']."&cv_id=".intval($_GET['cv_id'])."&employer_id=".intval($_GET['employer_id'])."&filter_status=".$filter_status;
			
			$extraparam = "&task=".$_GET['task'];
			if (intval($_GET['cv_id'])>0){$extraparam.="&cv_id=".intval($_GET['cv_id']);} 
			if (intval($_GET['employer_id'])>0){$extraparam.="&employer_id=".intval($_GET['employer_id']);} 
			$extraparam.="&filter_status=".$filter_status;
			$extraparam.="&closed_matches=".$closed_matches;
			
			$querypag = "SELECT distinct c.id as cv_id, c.firstname, c.lastname, c.email as cv_email, c.socialskills, c.organisationalskills, c.technicalskills, c.computerskills, c.artisticskills, c.otherskills, c.time_extensions, c.retrievalcode as retrievalcode, v.id as vacancy_id, v.employer_id as e_id, v.isco_1 as isco_1, v.isco_2 as isco_2, v.isco_3 as isco_3, v.n_vacancies as n_vacancies, v.n_vacancies_left as n_vacancies_left, v.date_created as vacancy_date_created, e.companyname as companyname, c.country as cv_country, c.status as cv_status, e.country as e_country, c.date_created, (`date_editable` - NOW()) as is_editable,TIMEDIFF(`date_editable`, NOW()) as edit_time_left ";
			if($add_status==1){$querypag.=" , m.status as match_status ";} 
			$querypag.=" FROM $tbl_cv c, $tbl_vacancy v, $tbl_cv_isco i, $tbl_employers e ";
			if($add_status==1){$querypag.=", yfej_match m ";}
			$querypag.=" WHERE c.id = i.cv_id
							AND v.isco_2 = i.cv_isco_2
							AND e.id = v.employer_id 
							";
			if($add_status==1){
				$querypag.=" and m.id = (select max(id) from yfej_match where cv_id = c.id) AND m.status ='".$filter_status."' ";
			}
			$querypag.=" AND e.status = '1'
						AND c.status <> '0' ";

			if( $closed_matches!="1" ){//standard, active matches
				$querypag.=" AND c.match_status = '1' ";
				$querypag.=" AND n_vacancies_left > 0 ";
				$querypag.=" AND v.papers = '1' ";
			} else {//old and obsolete matches
				$querypag.=" AND v.papers <> '0' ";
			}
			$querypag.=" AND e.country <> c.country ".$query_filter;
						 //exit;
			//if ($_SESSION['a_manager']=="0") $query .= "WHERE status = '0' ";
			//$querypag .= " GROUP BY c.id, e.id ";
			$querypag .= " ORDER BY c.id ASC, cv_status ASC";
//echo $querypag;
			$total = paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);
			//$res = query($querypag);
			$reset_link = "- <strong><a href=\"".$_SERVER['SCRIPT_NAME']."\" target=\"_self\">reset</a></strong>";
			?>
            <tr>
              <td class="cv_title" colspan="3" ><strong><?php echo $total ?></strong> matches found  <?php echo (intval($_GET['employer_id'])>0)?" for employer <strong>".retval("companyname",$tbl_employers,"id",$_GET['employer_id'])."</strong> ".$reset_link:""; ?><?php echo (intval($_GET['cv_id'])>0)?" for candidate <strong>".retval("firstname",$tbl_cv,"id",$_GET['cv_id'])." ".retval("lastname",$tbl_cv,"id",$_GET['cv_id'])."</strong> ".$reset_link:""; ?>
<br /><br />

<form target="_self" name="filteremployerform" id="filteremployerform" action="<?php echo $_SERVER['PHP_SELF'] ?>?<?php echo $_SERVER['QUERY_STRING'] ?>" enctype="multipart/form-data" method="get" style="margin-bottom:5px;">filter by employer: 
              	<select name="employer_id" id="employer_id" onChange="javascript:
                document.getElementById('filteremployerform').submit();">
                	<option value="0">all</option>
                    <?php 
					$query="select id, companyname from $tbl_employers where status='1' order by companyname asc";
					$res_employer=query($query);
					while ($row_employer=mysql_fetch_assoc($res_employer)){
					?>
                	<option value="<?php echo $row_employer['id'] ?>" <?php if($_GET['employer_id']==$row_employer['id']){?>selected="selected"<?php }?>><?php echo $row_employer['companyname'] ?></option>
                    <?php 
					}?>
                    
                </select>
                <input type="hidden" name="task" value="filter_employer" />
              	</form>
                
              <form target="_self" name="filterstatusform" id="filterstatusform" action="<?php echo $_SERVER['PHP_SELF'] ?>?<?php echo $_SERVER['QUERY_STRING'] ?>" enctype="multipart/form-data" method="post" style="margin-bottom:5px;">filter by match status: 
              	<select name="filter_status" id="filter_status" onChange="javascript:
                document.getElementById('filterstatusform').submit();">
                	<option value="0">all</option>
                	<option value="1" <?php if($filter_status=="1"){?>selected="selected"<?php }?>>Validated but not available</option>
                	<option value="2" <?php if($filter_status=="2"){?>selected="selected"<?php }?>>Validated and available</option>
                	<option value="3" <?php if($filter_status=="3"){?>selected="selected"<?php }?>>CV sent to employer</option>
                	<option value="4" <?php if($filter_status=="4"){?>selected="selected"<?php }?>>Sent for interview</option>
                	<option value="5" <?php if($filter_status=="5"){?>selected="selected"<?php }?>>Not employed</option>
                	<option value="6" <?php if($filter_status=="6"){?>selected="selected"<?php }?>>Employed</option>
                </select>
              	<?php if ($filter_status=="1"){ ?>
                  <img src="../img/icons/not_available.png" alt="Validated but not available" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($filter_status=="2"){ ?>
                  <img src="../img/icons/available.png" alt="Validated and available" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($filter_status=="3"){?>
                  <img src="../img/icons/envelope.png" alt="CV sent to employer" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($filter_status=="4"){?>
                  <img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($filter_status=="5"){?>
                <img src="../img/icons/attention.png" alt="Not employed" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($filter_status=="6"){?>
                <img src="../img/icons/bag.png" alt="Employed" width="24" height="24" border="0" align="absmiddle" />
				<?php }?>
                &nbsp;&nbsp;closed matches/old vacancies&nbsp;
                <input name="closed_matches" type="checkbox" value="1" <?php if ( $closed_matches=="1" ){ ?> checked="checked"<?php }?> onChange="javascript:
                if( this.checked==false ){window.location.href='<?php echo $_SERVER['SCRIPT_NAME'] ?>';
                }else{document.getElementById('filterstatusform').submit();}" />
                </form>              
                </td>
            </tr>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>Candidate</strong></div></td>
              <td class="cv_title"><div align="left"><strong>Match</strong></div></td>
              <td class="cv_title"><div align="left"><strong>Company</strong></div></td>
             </tr>
      <?php
			
			while ($row_list = mysql_fetch_assoc($res)){
				//validation score
				$cv_score = 10*retval("sum(i_o+o_o+c_o+n_o+f_o)",$tbl_cv_questionnaire,"cv_id",$row_list['cv_id']);
				
				$full_profile = trim(retval("description",$tbl_isco,"code",$row_list['isco_1']));
				$full_profile .= "\n".trim(retval("description",$tbl_isco,"code",$row_list['isco_2']));
				$full_profile .= "\n".trim(retval("description",$tbl_isco,"code",$row_list['isco_3']));
				//echo $cv_score;
				?>
            <tr class="application_cv_list" >
              <td class="cv_leftline"> 
              <div align="left">
              <?php if ((int)($row_list['is_editable'])>0){ ?>
              	<img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" />
                (<?php echo $row_list['edit_time_left'] ?>)<br />
              <?php }?>
              <a href="../access/cv_list.php?search_retrievalcode=<?php echo $row_list['retrievalcode'] ?>&cv_search=Search" title="All CV info" target="_self"><?php echo ucwords(strtolower($row_list['firstname']." ".$row_list['lastname'])); ?></a><br />
              <a href="../cv/cv_full.php?task=adminview&cv_id=<?php echo $row_list['cv_id'] ?>" title="View CV" target="_blank"><img src="../img/icons/doc.png" alt="View CV" width="24" height="24" border="0" /></a>
              <a href="../cv/cv_1.php?task=edit&cv_id=<?php echo $row_list['cv_id']; ?>" title="Edit CV"><img src="../img/icons/pencil.png" alt="Edit CV" width="24" height="24" border="0" /></a>
              <a href="../access/cv_dossier.php?cv_id=<?php echo $row_list['cv_id'] ?>" title="Candidate dossier"><img src="../img/icons/notes.png" alt="CV Dossier / annotations" width="24" height="24" border="0" /></a>
<?php /*?><a href="../access/cv_questionnaire.php?cv_id=<?php echo $row_list['cv_id'] ?>" title="Questionnaire"><img src="../img/icons/question_on.png" alt="Questionnaire" width="24" height="24" border="0" /></a><?php */?>
              <?php if ($_SESSION['a_level']>=5){ ?>
              <a href="../access/cv_questionnaire.php?cv_id=<?php echo $row_list['cv_id'] ?>" title="<?php echo $cv_score ?>">
              <img src="../img/icons/question_<?php echo ($cv_score>=30)?"off":"on";?>.png" alt="<?php echo $cv_score ?>" width="24" height="24" border="0" />
              </a>
              <?php } ?>
 
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?task=filter_cv&cv_id=<?php echo $row_list['cv_id'] ?>&filter_status=<?php echo $filter_status ?>" title="All matches for this candidate"><img src="../img/icons/heart.png" alt="All matches for this candidate" width="24" height="24" border="0" /></a>						

						<?php if (intval($row_list['cv_status'])==4){ ?>
                        <img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" />
                        <?php }?>
						<?php if (intval($row_list['cv_status'])==5){ ?>
                        <img src="../img/icons/attention.png" alt="Not employed" width="24" height="24" border="0" />
                        <?php }?>
                        <?php if (intval($row_list['cv_status'])==6){ ?>
                        <img src="../img/icons/bag.png" alt="Employed" width="24" height="24" border="0" />
                        <?php }?><br />
                      <?php if ( intval(retval("id",$tbl_edu,"cv_id",$row_list['cv_id']))==0){
						  		$send_reminder=1;  ?>
                      <img src="../img/icons/exclamation_red.png" width="24" height="24" border="0" title="No education" align="absmiddle" />
                      <?php }else{
						  		$send_reminder=0; 
						 	}?>
                      <?php 
					  $skills=$row_list['socialskills'].$row_list['organisationalskills'].$row_list['technicalskills'].$row_list['computerskills'].$row_list['
artisticskills'].$row_list['otherskills'];
					  if ( trim($skills)=="" ){
						  $send_reminder+=1; ?>
                      <img src="../img/icons/exclamation_green.png" width="24" height="24" border="0" title="No skills" align="absmiddle" />
                      <?php } ?>                      
					  <?php if ( intval(retval("id",$tbl_wrkexp,"cv_id",$row_list['cv_id']))==0){  ?>
                      <img src="../img/icons/exclamation_blue.png" width="24" height="24" border="0" title="No work experience" align="absmiddle" />
                      <?php }?>
                      <strong><?php echo intval(retval("Count(*)",$tbl_lang,"cv_id",$row_list['cv_id'])); ?></strong> languages

			</div>
            <?php //exclude from match id cv incomplete and obsolete
			if( intval($send_reminder)>0&&$row_list['time_extensions']>=3&&(int)($row_list['is_editable'])<0 ){
				$query = "update $tbl_cv set match_status = '0' where id =".$row_list['cv_id'];
				query($query);
			}
			?>
            
            <?php //send email if education or skills are missing
			$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
			$Subject = "EUJob4EU - your CV retrieval code"; 
			$Host = "mail.provincia.roma.it"; 
			$Username = $smtp_user; 
			$Password = $smtp_pw; 
//echo "*".$row_list['time_extensions']."*".$row_list['is_editable'];
			if( intval($send_reminder)>0&&$row_list['time_extensions']<3&&(int)($row_list['is_editable'])<0 ){
				echo "email just sent";
				$query="update $tbl_cv set date_editable = DATE_ADD( NOW(), INTERVAL 48 HOUR ),
				time_extensions = time_extensions+1 where id=".$row_list['cv_id'];
				insquery($query);

				if( $test_env=="_test" ){
					//echo $row_list['cv_email'];
					$To = "marcellozini@hotmail.com"; 
				}else{
					//echo "kkkkkkkkkkkkkkkkk";
					$To = $row_list['cv_email'];
				}
				/*Keep in mind that your CV, in order to be suitable for job matching, must be completed
				in all its parts and that the description of your professional profile must be coherent with your education and/or your work experience.*/ 
				$date_created = euDate($row_list['date_created']);
				$Message = "We inform you that your profile, based on the CV created on $date_created, may be potentially compatible with one or more job offers. In order to proceed to the next step, you must complete the fundamental sections of your profile, including EDUCATION AND TRAINING and PERSONAL SKILLS AND COMPETENCES.\n

Your CV should be finalised within the next 48 hours by following the instructions below.
				
				
				Thank you
				EUJob4EU - Ufficio Monitoraggio e Progetti Europei
				==================================================
				URL: http://www.yourfirsteuresjob.eu/eujob4eu
				Push the button 'Access your CV' in the 'Job seekers' section and enter your credentials:
				
				Retrieval code: ".$row_list['retrievalcode']."
				First name: ".$row_list['firstname']."
				Last name: ".$row_list['lastname'];
				$msg="";

				//send email
				$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
				$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
				'username' => $Username, 'password' => $Password)); 
			
				$mail = $SMTP->send($To, $Headers, $Message); 
					
				if (PEAR::isError($mail)){ 
					$msg = $mail->getMessage(); 
				}else{
					//re-open cv for 48 hours
						
				} 

			}
			?>            
            </td>
              <td class="cv_leftline" title="<?php echo $full_profile ?>"><div align="left"> <strong>
              <?php /*$zzz=" ";$zzz=intval($zzz);echo "r".$zzz."r";*/?>             
			  <?php echo trim(retval("description",$tbl_isco,"code",$row_list['isco_2']));?></strong><br />
			  <strong><?php echo $row_list['n_vacancies'] ?></strong> vacancy(ies), <strong><?php echo $row_list['n_vacancies_left'] ?></strong> still available<br />
              Status:<strong>
               <?php 
			   	//patch multiple vacancy handling
			   	$query = "select * from $tbl_match where cv_id = ".$row_list['cv_id']." and employer_id = ".$row_list['e_id'];
			   	$res_match_patch=query($query);
			   	while ( $row_match_patch = mysql_fetch_assoc($res_match_patch) ){
			   		$match_patch=trim($row_match_patch['vacancy_id']);
					$match_patch_id = $row_match_patch['id'];
			   //echo "x".$match_patch.$query;
			   		if( $match_patch!=""&&intval($match_patch)==0 ){
						$query="update $tbl_match set vacancy_id=".$row_list['vacancy_id']." where id=".$match_patch_id;
						//echo "z".$match_patch.$query;
						insquery($query);
					}
				}
			   
				//see the current status of the match
				$query = "select max(id) from $tbl_match where cv_id = ".$row_list['cv_id']." and employer_id = ".$row_list['e_id']." and vacancy_id = ".$row_list['vacancy_id'];
				$res_match_status=query($query);
				$row_match_status = mysql_fetch_assoc($res_match_status);
				$last_log_id = trim($row_match_status['max(id)']);
				if ($last_log_id!=""){
					$query = "select status from $tbl_match where id = ".$last_log_id;
					$res_match_status=query($query);
					$row_match_status = mysql_fetch_assoc($res_match_status);
					$match_status = $row_match_status['status'];
					//echo "y".$match_status.$last_log_id."y";
					echo retval("description",$tbl_match_status,"id",$match_status);
				}
			  
			  ?></strong><a href="../access/match_dossier.php?cv_id=<?php echo $row_list['cv_id'] ?>&e_id=<?php echo $row_list['e_id'] ?>&vacancy_id=<?php echo $row_list['vacancy_id'] ?>" title="Match dossier">
              <?php if ($last_log_id==""||$match_status=="0"){ ?>
              <img src="../img/icons/exclamation.png" alt="Match dossier / annotations" width="24" height="24" border="0" align="absmiddle" />
              <?php }else{ ?>
              	<?php if ($match_status=="1"){ ?>
                  <img src="../img/icons/not_available.png" alt="Validated but not available" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($match_status=="2"){ ?>
                  <img src="../img/icons/available.png" alt="Validated and available" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($match_status=="3"){?>
                  <img src="../img/icons/envelope.png" alt="CV sent to employer" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($match_status=="4"){?>
                  <img src="../img/icons/talk.png" alt="Sent for interview" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($match_status=="5"){?>
                <img src="../img/icons/attention.png" alt="Not employed" width="24" height="24" border="0" align="absmiddle" />
                <?php }elseif($match_status=="6"){?>
                <img src="../img/icons/bag.png" alt=Employed" width="24" height="24" border="0" align="absmiddle" />
				<?php }?>
              <?php }?>
              </a>
             
               </div>              </td>
              <td class="cv_leftline"><div align="left"><?php echo $row_list['companyname'] ?><br />
              vacancy: 
              <strong><a href="../access/financial_support.php?vacancy_id=<?php echo $row_list['vacancy_id'] ?>&e_id=<?php echo $row_list['e_id'] ?>" target="_blank"><?php echo substr(str_replace("-","",$row_list['vacancy_date_created']),0,8).$row_list['vacancy_id']; ?></a></strong> <br />
              <?php if ( (intval($_SESSION['a_manager']==1)) || ($_SESSION['a_level']==3) ){  ?>
              <a href="../access/employer_view.php?employer_id=<?php echo $row_list['e_id'] ?>" title="Employer detail"><img src="../img/icons/doc.png" alt="View Company info" width="24" height="24" border="0" /></a>
              <a href="../access/employer_detail.php?employer_id=<?php echo $row_list['e_id'] ?>" title="Employer info"><img src="../img/icons/pencil.png" alt="Edit Employer info" width="24" height="24" border="0" /></a> 
              <?php }?>
              <a href="../access/employer_dossier.php?employer_id=<?php echo $row_list['e_id'] ?>" title="Employer dossier"><img src="../img/icons/notes.png" alt="Employer dossier / annotations" width="24" height="24" border="0" /></a>
              <a href="<?php echo $_SERVER['PHP_SELF'] ?>?task=filter_employer&employer_id=<?php echo $row_list['e_id'] ?>&filter_status=<?php echo $filter_status ?>" title="All matches for this company"><img src="../img/icons/heart.png" alt="All matches for this company" width="24" height="24" border="0" /></a>
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
            </table>
      </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

