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
<?php 
//compose vacancy protocol number

$vacancy_prot=substr(str_replace("-","",retval("date_created",$tbl_vacancy,"id",$_GET['vacancy_id'])),0,8).$_GET['vacancy_id'];
//the current match status
$query = "select max(id) from $tbl_match where cv_id = ".$_GET['cv_id']." and employer_id = ".$_GET['e_id']. " and vacancy_id = ".$_GET['vacancy_id'];

$res_match_status=query($query);
$row_match_status = mysql_fetch_assoc($res_match_status);
$last_log_id = trim($row_match_status['max(id)']);
if ($last_log_id!=""){
	$query = "select status from $tbl_match where id = ".$last_log_id;
	$res_match_status = query($query);
	$row_match_status = mysql_fetch_assoc($res_match_status);
	$before_match_status = $row_match_status['status'];
	
} else {
	$before_match_status = "0";
}

//see if we're changing the status
if (intval($before_match_status)!=intval($_POST['match_status'])){
	$change_of_status = 1; //useful to replicate the log on the cv and tu update the vacancies
	
	//build log string
	$new_log_status_changed = "vacancy <strong>".$vacancy_prot."</strong>: status updated from <strong>".retval("description",$tbl_match_status,"id",$before_match_status)."</strong> to <strong>".retval("description",$tbl_match_status,"id",$_POST['match_status'])."</strong>, employer <strong>".retval("companyname",$tbl_employers,"id",$_GET['e_id'])."</strong>, candidate <strong>".retval("lastname",$tbl_cv,"id",$_GET['cv_id'])."</strong>"; 
} else {
	$new_log_status_changed = "vacancy <strong>".$vacancy_prot."</strong>: ";
}

//echo "status corrente".$before_match_status;
//echo "status futuro".$_POST['match_status'];


if (isset($_POST['savelog_match'])){

	
	//update, eventually, the cv status if it is not employed/employed to make the candidate not available anymore
	if (intval($_POST['match_status'])>3){
		$query = "update $tbl_cv set status ='".$_POST['match_status']."' where id = ".$_GET['cv_id'];
		insquery($query);
	}
	
	//if a status change has been made
	if ($change_of_status == 1){
	
		//if we set the status to 6/employed, we reduce the available positions for that vacancy
		if (intval($_POST['match_status'])==6){
			if ($before_match_status!=intval($_POST['match_status'])){
//echo "before ".$before_match_status." post: ".$_POST['match_status']." change: ".$change_of_status;///////////////////////////////////////////////
				//positions before update
				$before_vacancies_left = intval(retval("n_vacancies_left",$tbl_vacancy,"id",$_GET['vacancy_id']));

				//update available positions
				$query="update $tbl_vacancy set n_vacancies_left=(n_vacancies_left-1) where id=".$_GET['vacancy_id'];
				insquery($query);
				//exit;
				
				//write it on the log
				$new_log_status_changed .= "vacancies reduced from ".$before_vacancies_left." to ".($before_vacancies_left-1)." - ";
			}
		}
	
		//if the status has changed, we write on the candidate log as well
		$query = "insert into $tbl_cv_dossier (date, author_id, cv_id, log) values 
		(NOW(), ".$_SESSION['a_id'].", ".$_GET['cv_id'].",'" 
		.addslashes($new_log_status_changed).trim($_POST['new_log_match'])."')"; 
		insquery($query);
		
		//we also write on the employer log if the new status is from CV sent to employer on
		if (intval($_POST['match_status'])>=3){
			$query = "insert into $tbl_employer_dossier (date, author_id, employer_id, log) values 
			(NOW(), ".$_SESSION['a_id'].", ".$_GET['e_id'].", '"
			.trim(addslashes($new_log_status_changed).$_POST['new_log_match'])."')"; 
			insquery($query);
		}
		
		//update the status in the page scope
		$before_match_status = $_POST['match_status'];
	}
	
	//add a new match entry
	//compose the interview code
	$interview_phone=($_POST['interview_phone']=="1")?"1":"0";
	$interview_skype=($_POST['interview_skype']=="1")?"1":"0";
	$interview_email=($_POST['interview_email']=="1")?"1":"0";
	$interview_presence=($_POST['interview_presence']=="1")?"1":"0";

	$interview = $interview_phone.$interview_skype.$interview_email.$interview_presence;
	
	//post recruitment
	if ( intval($_POST['post_duration'])<1 ){
		$_POST['post_duration']=0;	
	}
	if ( intval($_POST['post_wage'])<1 ){
		$_POST['post_wage']=0;	
	}
	$query = "insert into $tbl_match (date, cv_id, employer_id, vacancy_id, author_id, interview, status, post_contract_type, post_employment_form, post_duration, post_wage, log) values 
	(NOW(), 
	".$_GET['cv_id'].",
	".$_GET['e_id'].",
	".$_GET['vacancy_id'].",
	".$_SESSION['a_id'].",
	'".$interview."',
	'".$_POST['match_status']."',
	'".$_POST['post_contract_type']."',
	'".$_POST['post_employment_form']."',
	".$_POST['post_duration'].",
	".$_POST['post_wage'].",
	'".addslashes($new_log_status_changed).trim($_POST['new_log_match'])."'
	)"; 
	//echo $query;exit;
	insquery($query);
	
}

//add a new candidate log entry
if (isset($_POST['savelog_cv'])) {
	$query = "insert into $tbl_cv_dossier (date, author_id, cv_id, log) values 
	(NOW(), ".$_SESSION['a_id'].", ".$_POST['cv_id'].", '".trim($_POST['new_log_cv'])."')"; 
	//echo $query;exit;
	insquery($query);
}

//add a new employer log entry
if (isset($_POST['savelog_employer'])) {
	$query = "insert into $tbl_employer_dossier (date, author_id, employer_id, log) values 
	(NOW(), ".$_SESSION['a_id'].", ".$_GET['e_id'].", '".trim($_POST['new_log_employer'])."')"; 
	//echo $query;exit;
	insquery($query);
}

//write workexperience summary

if (isset($_POST['saveworkexperience'])){
	$query="UPDATE $tbl_cv SET workexperience=".intval($_POST['workexperience'])." WHERE id=".$_GET['cv_id'];
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
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
    	<h1> MATCH: <br />
		CANDIDATE
	  <?php echo trim(retval("lastname",$tbl_cv,"id",$_GET['cv_id']));?> 
	  <?php echo trim(retval("firstname",$tbl_cv,"id",$_GET['cv_id']));?><br />
      	EMPLOYER <?php echo trim(retval("companyname",$tbl_employers,"id",$_GET['e_id']));?>      </h1> 
	  <p> 
      <em>- desired employment:</em> <br />
      <?php //the jobseeker offer
	  $query = "select cv_isco_1, cv_isco_2, cv_isco_3 from $tbl_cv_isco where cv_id =".$_GET['cv_id'];
	  //echo $query;
	  $res_cv_isco=query($query);
	  while($row_cv_isco=mysql_fetch_assoc($res_cv_isco)){?>
      	<?php echo retval("description",$tbl_isco,"code",$row_cv_isco['cv_isco_1']); ?><br />
      	<strong><?php echo retval("description",$tbl_isco,"code",$row_cv_isco['cv_isco_2']); ?></strong><br />
      	<?php echo retval("description",$tbl_isco,"code",$row_cv_isco['cv_isco_3']); ?>
      <?php 
	  }?>
       </p>
	  <p> 
      <em>- profile requested: vacancy</em> 
      <a href="../access/financial_support.php?vacancy_id=<?php echo $_GET['vacancy_id'] ?>&e_id=<?php echo $_GET['e_id'] ?>" target="_blank"><strong><?php echo $vacancy_prot ?></strong></a><br />
      <?php //the employer vacancy profile offered
	  $query = "select isco_1, isco_2, isco_3 from $tbl_vacancy where id =".$_GET['vacancy_id'];
	  //echo $query;
	  $res_isco=query($query);
	  while($row_isco=mysql_fetch_assoc($res_isco)){?>
      	<?php echo retval("description",$tbl_isco,"code",$row_isco['isco_1']); ?><br />
      	<strong><?php echo retval("description",$tbl_isco,"code",$row_isco['isco_2']); ?></strong><br />
      	<?php echo retval("description",$tbl_isco,"code",$row_isco['isco_3']); ?>
      <?php 
	  }?>
       </p>
    <p>Use this section to log any info related to this single match.<br />
The entries which change the status of this match will be automatically duplicated in the dossier specific to both the candidate and the employer involved.</p>
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
	<tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>date</strong></div></td>
              <td class="cv_title"><div align="left"><strong>author</strong></div></td>
              <td class="cv_title"><div align="right"><strong>&nbsp;</strong></div></td>
          </tr>
            <?php
			$query = "	SELECT *
						FROM $tbl_match 
						WHERE cv_id = ".$_GET['cv_id']."
						AND employer_id = ".$_GET['e_id']."
						AND vacancy_id = ".$_GET['vacancy_id']."
						ORDER BY date DESC";
						$res=query($query);
			while ($row_list = mysql_fetch_assoc($res)){
				//patch added vacancy_prot
				if (stripos($row_list['log'],$vacancy_prot)==false){
					$query="update $tbl_match set log = 'vacancy <strong>".$vacancy_prot."</strong>: ".addslashes($row_list['log'])."' 
							WHERE cv_id = ".$_GET['cv_id']."
							AND employer_id = ".$_GET['e_id']."
							AND vacancy_id = ".$_GET['vacancy_id'];
		 //echo $query;exit;
					insquery($query);
				}
				
			?>
            <tr class="application_cv_list" >
              <td class="cv_leftline"> 
              <div align="left"><?php echo $row_list['date']; ?></div>              </td>
              <td class="cv_leftline"><div align="left">
              <?php echo retval("a_user",$tbl_admin,"a_id",$row_list['author_id']);?></div>              </td>
              <td class="cv_leftline"><div align="left"><?php echo $row_list['log']; ?></div>              </td>
            </tr>
            <?php 
			}?>
        </tbody>
      </table>
    <form autocomplete="off" method="post" action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>&e_id=<?php echo $_GET['e_id'] ?>&vacancy_id=<?php echo $_GET['vacancy_id'] ?>" enctype="multipart/form-data" onSubmit="javascript:if(document.getElementById('new_log_match').value.length<2){alert('you must add a text log!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
        <tr class="application_cv_list">
          <td class="cv_title"><div align="left"><strong> status of 
          	<?php echo trim(retval("lastname",$tbl_cv,"id",$_GET['cv_id']));?> 
	  		<?php echo trim(retval("firstname",$tbl_cv,"id",$_GET['cv_id']));?>
            on this match:
              <?php 
			$query = "select * from $tbl_match_status order by id asc";
			if ( ($_SESSION['a_level']==5)&&($before_match_status<3) ){
				$query .= " limit 3";			
			} elseif ( ($_SESSION['a_level']==5)&&($before_match_status>=3) ){
				$display_status_only = 1;
			}
			
			if ($display_status_only==1){
				echo retval("description",$tbl_match_status,"id",$before_match_status);
			} else {
				$res_match_status=query($query);
				?>
				<select name="match_status" id="match_status">
                <?php
				while ($row_match_status=mysql_fetch_assoc($res_match_status)){
				?>
				  <option value="<?php echo $row_match_status['id'] ?>" <?php if ($before_match_status==$row_match_status['id']){ ?> selected="selected"<?php }?>><?php echo $row_match_status['description'] ?></option>
				  <?php 
				}?>
				</select>
            <?php
            }
			?>
          </strong></div></td>
        </tr>
        
<tr class="application_cv_list">
          <td class="cv_title"><div align="left"><strong>interview(s):</strong></div>
            <?php 
			$query = "	SELECT interview, post_contract_type, post_employment_form, post_duration, post_wage
						FROM $tbl_match 
						WHERE cv_id = ".$_GET['cv_id']."
						AND employer_id = ".$_GET['e_id']."
						ORDER BY date DESC LIMIT 1";
			$res=query($query);
			$row_last_match=mysql_fetch_assoc($res);
			$interview_phone=substr($row_last_match['interview'],0,1);
			$interview_skype=substr($row_last_match['interview'],1,1);
			$interview_email=substr($row_last_match['interview'],2,1);
			$interview_presence=substr($row_last_match['interview'],3,1);
			$post_contract_type=$row_last_match['post_contract_type'];
			$post_employment_form=$row_last_match['post_employment_form'];
			$post_duration=$row_last_match['post_duration'];
			$post_wage=$row_last_match['post_wage'];
			?><br />

            phone<input name="interview_phone" id="interview_phone" type="checkbox" value="1" 
			<?php if ($interview_phone=='1'){ ?>checked="checked"<?php ;}?> />;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            skype<input name="interview_skype" id="interview_skype" type="checkbox" value="1"
            <?php if ($interview_skype=='1'){ ?>checked="checked"<?php ;}?> />;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            email<input name="interview_email" id="interview_email" type="checkbox" value="1"
            <?php if ($interview_email=='1'){ ?>checked="checked"<?php ;}?> />;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            physical presence<input name="interview_presence" id="interview_presence" type="checkbox" value="1"
            <?php if ($interview_presence=='1'){ ?>checked="checked"<?php ;}?> /> 
          </td>
        </tr>
                
		<tr class="application_cv_list">
          <td class="cv_title">
          <?php 
		  $n_vacancies = intval(retval("n_vacancies",$tbl_vacancy,"id",$_GET['vacancy_id']));
		  $n_vacancies_left = intval(retval("n_vacancies_left",$tbl_vacancy,"id",$_GET['vacancy_id']));
		  ?>
          <div align="left"><strong> vacancy(ies) requested: <?php echo $n_vacancies ?>    
          - still available: <?php echo $n_vacancies_left ?>
          </strong></div>          
          </td>     
        </tr>
        <?php //post recruitment ?>
   		<?php if( (intval($before_match_status)==6)&&($_SESSION['a_level']=="7") ){ ?>
        <tr class="application_cv_list">
          <td class="cv_title"><div align="left"><strong>post recruitment notes</strong> <em>(employed status only)</em></div>
           <br />
            contract type:
            <select name="post_contract_type" id="post_contract_type">
              <option selected="selected" value="NULL">select</option>
              <option value="0" <?php if ($post_contract_type=="0"){ ?> selected="selected" <?php }?>>fixed term</option>
              <option value="1" <?php if ($post_contract_type=="1"){ ?> selected="selected" <?php }?>>permanent</option>
            </select>;&nbsp;&nbsp;&nbsp;&nbsp;
            form of employment:
            <select name="post_employment_form" id="post_employment_form">
              <option selected="selected" value="NULL">select</option>
              <option value="0" <?php if ($post_employment_form=="0"){ ?> selected="selected" <?php }?>>part time</option>
              <option value="1" <?php if ($post_employment_form=="1"){ ?> selected="selected" <?php }?>>full time</option>
            </select>;&nbsp;&nbsp;&nbsp;&nbsp;
            contract duration:
            <input name="post_duration" id="post_duration" type="text" size="2" maxlength="2" value="<?php echo $post_duration ?>" /> months;&nbsp;&nbsp;&nbsp;&nbsp;
            gross monthly wage(Euro):
            <input name="post_wage" id="post_wage" type="text" size="4" maxlength="4" value="<?php echo $post_wage ?>" />;
            </td>
        </tr>   
        <?php }?>
        <?php //end post recuitmenti ?>
        <tr class="application_cv_list">
        <td class="cv_title"><div align="left"><strong>text</strong> (<em>maximum 250 charachters each log</em>)</div></td>
        </tr>
        <tr class="application_cv_list" >
        <td class="cv_rightline"> 
        <textarea name="new_log_match" cols="70" rows="5" id="new_log_match" onkeypress="javascript:if(this.value.length>250){alert('Too long!');}"></textarea>
        <input name="savelog_match" type="submit" value="Save" />        </td>
        </tr>
       <tr class="application_cv_list">
        <td class="cv_title">&nbsp;</td>
       </tr>
	</table>
</form>
<br />
    <a name="candidate" id="candidate"></a><br />

    
	<h1>DOSSIER: CANDIDATE
	  <?php echo trim(retval("lastname",$tbl_cv,"id",$_GET['cv_id']));?> 
	  <?php echo trim(retval("firstname",$tbl_cv,"id",$_GET['cv_id']));?></h1> 
	  <p> You may add a text entry </p>
    
    
      <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
	<tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>date</strong></div></td>
              <td class="cv_title"><div align="left"><strong>author</strong></div></td>
              <td class="cv_title"><div align="right"><strong>&nbsp;</strong></div></td>
          </tr>
            <?php
			$query = "	SELECT d.date as date, d.author_id as author_id, d.log as log, a.a_user as a_user
						FROM $tbl_cv_dossier d, $tbl_admin a 
						WHERE d.author_id = a.a_id
						AND cv_id = ".$_GET['cv_id']."
						ORDER BY d.date DESC";
						$res=query($query);
			while ($row_list = mysql_fetch_assoc($res)){
			?>
            <tr class="application_cv_list" >
              <td class="cv_leftline"> 
              <div align="left"><?php echo $row_list['date']; ?></div>              </td>
              <td class="cv_leftline"><div align="left">
              <?php echo $row_list['a_user'];?></div>              </td>
              <td class="cv_leftline"><div align="left"><?php echo $row_list['log']; ?></div>              </td>
            </tr>
            <?php 
			}?>
        </tbody>
      </table>
    <form autocomplete="off" method="post" action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>&e_id=<?php echo $_GET['e_id'] ?>&vacancy_id=<?php echo $_GET['vacancy_id'] ?>#candidate" enctype="multipart/form-data" onSubmit="javascript:if(document.getElementById('new_log_cv').value.length<2){alert('you must add a text log!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
        <tr class="application_cv_list">
        <td class="cv_title"><div align="left"><strong>text</strong> (<em>maximum 250 charachters each log</em>)</div></td>
        </tr>
        <tr class="application_cv_list" >
        <td class="cv_rightline"> 
        <textarea name="new_log_cv" cols="70" rows="5" id="new_log_cv" onkeypress="javascript:if(this.value.length>250){alert('Too long!');}"></textarea>
        <input name="savelog_cv" type="submit" value="Save" /></td>
        </tr>
       <tr class="application_cv_list">
        <td class="cv_title">&nbsp;</td>
       </tr>
	</table>
	<input type="hidden" name="cv_id" id="cv_id" value="<?php echo $_GET['cv_id'] ?>" />
   <input type="hidden" name="a_id" id="a_id" value="<?php echo $_SESSION['a_id'] ?>" />
</form>
<form action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>&e_id=<?php echo $_GET['e_id'] ?>&vacancy_id=<?php echo $_GET['vacancy_id'] ?>" method="post" name="cvform" id="cvform" onsubmit="javascript:
        if( (document.getElementById('workexperience').value=='0')||(document.getElementById('workexperience').value=='2') ){
        	alert('Select the degree of workexperience from the list!');
        	return false;
          document.document.getElementById('workexperience').focus();
        }">
    		<table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td class="cv_title">Work experience (summary)</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="60%" class="cv_title"><div id="floatleft">
                <?php $workexperience=intval(retval("workexperience",$tbl_cv,"id",$_GET['cv_id']));?>
                candidate work experience*
                <select name="workexperience" id="workexperience">
                  <option value="0" <?php echo ($workexperience==0)?"selected=\"selected\"":""; ?>>-- select --</option>
                  <option value="1" <?php echo ($workexperience==1)?"selected=\"selected\"":""; ?>>First job (inexperienced job applicants)</option>
                  <option value="2" <?php echo ($workexperience==2)?"selected=\"selected\"":""; ?>>Experienced (select below)</option>
                  <option value="3" <?php echo ($workexperience==3)?"selected=\"selected\"":""; ?>>Low skilled</option>
                  <option value="4" <?php echo ($workexperience==4)?"selected=\"selected\"":""; ?>>Skilled</option>
                  <option value="5" <?php echo ($workexperience==5)?"selected=\"selected\"":""; ?>>Highly skilled</option>
                </select>
                <input name="saveworkexperience" type="submit" value="Save" />
                  </div>
                    </td>
              </tr>
            <tr class="application_cv_list">
                <td colspan="2" class="cv_title"><div align="right">&nbsp;</div></td>
            </tr>
            </tbody>
          </table>
    </form>
<a name="employer" id="employer"></a><br />
<h1>DOSSIER: EMPLOYER <?php echo trim(retval("companyname",$tbl_employers,"id",$_GET['e_id']));?></h1> 
	  <p> You may add a text entry </p>
    
      <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
	<tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>date</strong></div></td>
              <td class="cv_title"><div align="left"><strong>author</strong></div></td>
              <td class="cv_title"><div align="right"><strong>&nbsp;</strong></div></td>
          </tr>
            <?php
			$query = "	SELECT d.date as date, d.author_id as author_id, d.log as log, a.a_user as a_user
						FROM $tbl_employer_dossier d, $tbl_admin a 
						WHERE d.author_id = a.a_id
						AND employer_id = ".$_GET['e_id']."
						ORDER BY d.date DESC";
						$res=query($query);
			while ($row_list = mysql_fetch_assoc($res)){
			?>
            <tr class="application_cv_list">
              <td class="cv_leftline"> 
              <div align="left"><?php echo $row_list['date']; ?></div>              </td>
              <td class="cv_leftline"><div align="left">
              <?php echo $row_list['a_user'];?></div>              </td>
              <td class="cv_leftline"><div align="left"><?php echo $row_list['log']; ?></div>  </td>
            </tr>
            <?php 
			}?>
        </tbody>
      </table>
      <form autocomplete="off" method="post" action="<?php $_SERVER['PHP_SELF']?>?cv_id=<?php echo $_GET['cv_id'] ?>&e_id=<?php echo $_GET['e_id'] ?>&vacancy_id=<?php echo $_GET['vacancy_id'] ?>#employer" enctype="multipart/form-data" onSubmit="javascript:if(document.getElementById('new_log_employer').value.length<2){alert('you must add a text log!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
        <tr class="application_cv_list">
        <td class="cv_title"><div align="left"><strong>text</strong> (<em>maximum 250 charachters each log</em>)</div></td>
        </tr>
        <tr class="application_cv_list" >
        <td class="cv_rightline"> 
        <textarea name="new_log_employer" cols="70" rows="5" id="new_log_employer" onkeypress="javascript:if(this.value.length>250){alert('Too long!');}"></textarea>
        <input name="savelog_employer" type="submit" value="Save" /></td>
        </tr>
       <tr class="application_cv_list">
        <td class="cv_title">&nbsp;</td>
       </tr>
	</table>
    <br />
	<input type="hidden" name="employer_id" id="employer_id" value="<?php echo $_GET['employer_id'] ?>" />
   <input type="hidden" name="a_id" id="a_id" value="<?php echo $_SESSION['a_id'] ?>" />
</form>    </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

