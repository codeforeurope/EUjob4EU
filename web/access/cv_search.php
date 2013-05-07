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
	<h1>CV ADVANCED SEARCH</h1>
      <p>
Find profiles in the CV database: 
      </p>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" enctype="multipart/form-data" name="searchisco" target="_self" onsubmit="javascript: 
      keywordfield=document.getElementById('keyword');
      iscofield=document.getElementById('isco_2');
      countryfield=document.getElementById('country');
      nationalityfield=document.getElementById('nationality');
      languagefield=document.getElementById('language');
      if( keywordfield.value.length>0&&keywordfield.value.length<3 ){alert('Keyword must be at least 3 characters long!');return false;}
      if( languagefield.value.length>0&&languagefield.value.length<3 ){alert('Language keyword must be at least 3 characters long!');return false;}      
      if( keywordfield.value.length==0&&iscofield.value=='0'&&countryfield.value==''&&nationalityfield.value==''&&languagefield.value=='' ){alert('You must enter some search parameter!');return false;}">
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
    	<tr>
      <td class="blue">Search by ISCO  (<em>based on the second level of ISCO chosen by the candidate</em>):<br />
        <select name="isco_2" id="isco_2" onChange="">
                <option value="0">-- choose a profile to search --</option>
                <?php 
				$query = "SELECT code,description FROM $tbl_isco WHERE char_length(code)=3 ORDER BY description ASC";
				$res = query($query);
				while ($row_list = mysql_fetch_assoc($res)){
				?>
                <option value="<?php echo $row_list['code'] ?>" <?php if ($row_list['code']==$_GET['isco_2']){ ?> selected="selected" <?php }?> > <?php echo substr($row_list['description'],0,81); ?></option>
                <?php 
				}?>
        </select>
        </td>
      </tr>
    	<tr>
    	  <td class="blue"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AND  --</em></td>
  	  </tr>
    	<tr>
    	  <td class="blue">Search by keyword (<em>based on the work experience(s) declared by the candidate</em>):<br />
<input name="keyword" type="text" id="keyword" size="40" maxlength="40" value="<?php echo $_GET['keyword'] ?>" /></td>
  	  </tr>
    	<tr>
    	  <td class="blue"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AND  --</em></td>
  	  </tr>
    	<tr>
    	  <td class="blue">Search by country of residence <em>(as declared by the candidate</em>):<br />
<select name="country" id="country">
       <option value="">- select -</option>
       <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
       <option value="<?php echo $row_eu['code'] ?>" <?php if ($_GET['country']==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
     	<?php 
		}?>
     </select>  	  </tr>
    	<tr>
    	  <td class="blue"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AND  --</em></td>
  	  </tr>
    	<tr>
    	  <td class="blue">Search by country of nationality (<em>as declared by the candidate</em>):<br />
  <select name="nationality" id="nationality" >
    <option value="">- select -</option>
    <?php 
	   $query = "SELECT * FROM $tbl_eu_member";
	   $res_eu=query($query);
	   while($row_eu=mysql_fetch_assoc($res_eu)){
	   ?>
    <option value="<?php echo $row_eu['code'] ?>" <?php if ($_GET['nationality']==$row_eu['code']){ ?> selected="selected" <?php }?>><?php echo $row_eu['name'] ?></option>
    <?php 
		}?>
    </select>
    	    </td>
  	  </tr>
    	<tr>
    	  <td class="blue"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- AND  --</em></td>
  	  </tr>
    	<tr>
    	  <td class="blue">Search language by keyword (<em>based on the language(s) declared by the candidate</em>):<br />
  <input name="language" type="text" id="language" size="40" maxlength="40" value="<?php echo $_GET['language'] ?>" /></td>
  	  </tr>
      
    	<tr>
    	  <td class="blue"><div align="right">
    	    <input type="button" value="Reset search parameters" name="search_reset" id="search_reset" title="Reset Search" onclick="
          javascript:
          document.getElementById('isco_2').value='0';
          document.getElementById('keyword').value='';
          document.getElementById('country').value='';
          document.getElementById('nationality').value='';
          document.getElementById('language').value='';
          " />
    	    <input type="submit" value="Search CV" name="isco_search" id="isco_search" title="Search CV" onclick="" /></div></td>
    	  </tr>
    </table>
</form>  <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <?php 
			//
			if (isset($_GET['isco_search'])){
				//$searchparam=" and firstname like '%".trim($_GET['search_firstname'])."%' ";	
				if ( $_GET['isco_2']!='0' ){
					$isco=1;
					$searchparam = " AND $tbl_cv.id=$tbl_cv_isco.cv_id AND $tbl_cv_isco.cv_isco_2 ='".$_GET['isco_2']."' ";
				}	//exit;	
				if ( strlen($_GET['keyword'])>2 ){
					$wrkexp=1;
					$searchparam .= " AND $tbl_cv.id=$tbl_wrkexp.cv_id AND ($tbl_wrkexp.position like '%".$_GET['keyword']."%' OR $tbl_wrkexp.activities like '%".$_GET['keyword']."%' OR $tbl_wrkexp.sector like '%".$_GET['keyword']."%') ";
				}
				//country
				if ( $_GET['country']!="" ){
					$searchparam .= " AND $tbl_cv.country ='".$_GET['country']."' ";	
				}
				//nationality
				if ( $_GET['nationality']!="" ){
					$searchparam .= " AND $tbl_cv.nationality ='".$_GET['nationality']."' ";	
				}
				//language
				if ( $_GET['language']!="" ){
					$lang=1;
					$searchparam .= " AND $tbl_cv.id=$tbl_lang.cv_id AND $tbl_lang.foreignlanguage like '%".$_GET['language']."%' ";	
				}
			}else{
				$searchparam = " AND $tbl_cv.id=-1 ";
			}
			$offset=$_GET['offset'];
			$item_perpage = 10;

			$extraparam="&keyword=".$_GET['keyword']."&isco_2=".$_GET['isco_2']."&country=".$_GET['country']."&nationality=".$_GET['nationality']."&isco_search=".$_GET['isco_search']."&language=".$_GET['language'];
			
			$querypag = "SELECT distinct (`date_editable` - NOW()) as is_editable,TIMEDIFF(`date_editable`, NOW()) as edit_time_left,$tbl_cv.* 
			FROM $tbl_cv ";
			if( $isco==1 )
				$querypag .= ", $tbl_cv_isco ";
				
			if( $wrkexp==1 )
				$querypag .= ", $tbl_wrkexp ";
				
			if( $lang==1 )
				$querypag .= ", $tbl_lang ";
			
			$querypag .= " WHERE status <> '0' ".$searchparam;
			$total = paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam);

			?>
            <tr>
              <td class="cv_title" colspan="5" ><strong><?php echo $total ?></strong> CVs found</td>
            </tr>
            <tr class="application_cv_list">
              <td width="20%" class="cv_title"><div align="left"><strong>Last name</strong></div></td>
              <td width="20%" class="cv_title"><div align="left"><strong>First name</strong></div></td>
              <td width="20%" class="cv_title"><div align="left"><strong>Birth date</strong> (d/m/a) </div></td>
              <td width="25%" class="cv_title"><div align="left"><strong>Retrieval code</strong></div></td>
              <td width="15%" class="cv_title"><div align="left"><strong>&nbsp;</strong></div></td>
            </tr>
			<?php
			while ($row_list = mysql_fetch_assoc($res)){
				if ( $searchparam=="" ){
					echo "";
				}else{
				//calculate the score
				$cv_score = 10*retval("sum(i_o+o_o+c_o+n_o+f_o)",$tbl_cv_questionnaire,"cv_id",$row_list['id']);
			?>
            <tr class="application_cv_list">
              <td class="cv_leftline" ><div align="left"><?php echo ucwords(strtolower($row_list['lastname'])) ?><br />
                      <?php if ((int)($row_list['is_editable'])>0){ ?>
                      <img src="../img/icons/time.png" alt="Still editable" width="24" height="24" border="0" align="absmiddle" /> (<?php echo $row_list['edit_time_left'] ?>)<br />
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
                      <a href="../access/matches.php?task=filter_cv&cv_id=<?php echo $row_list['id'] ?>" target="_self" title="Matches for this candidate (<?php echo $row_n_matches['n_matches']; ?>)"><img src="../img/icons/heart.png" width="24" height="24" border="0" /></a>
                      <?php }?>
                      <br />
                      <strong><?php echo intval(retval("Count(*)",$tbl_lang,"cv_id",$row_list['id'])); ?></strong> languages <br />
              </div></td>
              <td class="cv_leftline"><div align="left"><?php echo substr($row_list['bdate'],8,2)."-".substr($row_list['bdate'],5,2)."-".substr($row_list['bdate'],0,4); ?></div></td>
              <td class="cv_leftline"><div align="left"> Created:<?php echo eudate($row_list['date_created']) ?><br />
                      <?php if ($row_list['time_extensions']>0){ ?>
                extended <?php echo $row_list['time_extensions'] ?> times<br />
                <?php }?>
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
						}
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

