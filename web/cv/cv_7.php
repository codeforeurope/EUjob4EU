<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

if (isset($_POST['submitcv6'])){
	$query = "UPDATE $tbl_cv SET 
	socialskills='".$_POST['cv6_socialskills']."',
	organisationalskills='".$_POST['cv6_organisationalskills']."',
	technicalskills='".$_POST['cv6_technicalskills']."',
	computerskills='".$_POST['cv6_computerskills']."',
	artisticskills='".$_POST['cv6_artisticskills']."',
	otherskills='".$_POST['cv6_otherskills']."',
	drivinglicences='".$_POST['cv6_drivinglicences']."' WHERE id = ".$_SESSION['cv_id'];
	insquery($query);
}

//if ($_SESSION['task']=="edit"){
	//get the cv for editing
	$query = "SELECT * FROM $tbl_cv_questionnaire WHERE cv_id = ".$_SESSION['cv_id'];
	$res_q = query($query);
	$row_q = mysql_fetch_assoc($res_q);
	

//} 

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
  <script type="text/javascript">
  

function limitareas(area,radio1,radio2,radio3){
	countareas();
	if ( n_areas > 3 ){
		alert('You can\'t choose more than 3 areas!');
		area.checked=false;
		radio1.disabled=true;
		radio2.disabled=true;
		radio3.disabled=true;
	}
	//alert(n_areas);
}

function moreareas(){
	countareas();
	if ( n_areas < 3 ){
		alert('You should choose 3 areas!');
		return false;
	}
	
	
	
	return true;
	//alert(n_areas);
}


function countareas(){
	n_areas=0;
	i1_c=document.getElementById('i1_c');
	i2_c=document.getElementById('i2_c');
	i3_c=document.getElementById('i3_c');
	
	o1_c=document.getElementById('o1_c');
	o2_c=document.getElementById('o2_c');
	o3_c=document.getElementById('o3_c');
	
	c1_c=document.getElementById('c1_c');
	c2_c=document.getElementById('c2_c');
	c3_c=document.getElementById('c3_c');

	n1_c=document.getElementById('n1_c');
	n2_c=document.getElementById('n2_c');
	n3_c=document.getElementById('n3_c');

	f1_c=document.getElementById('f1_c');
	f2_c=document.getElementById('f2_c');
	f3_c=document.getElementById('f3_c');

	if (document.getElementById('i').checked){
		n_areas++;
		i1_c.disabled=false;
		i2_c.disabled=false;
		i3_c.disabled=false;
	}else{
		i1_c.checked=false;
		i1_c.disabled=true;
		i2_c.checked=false;
		i2_c.disabled=true;
		i3_c.checked=false;
		i3_c.disabled=true;
	}
	
	if (document.getElementById('o').checked){
		n_areas++;
		o1_c.disabled=false;
		o2_c.disabled=false;
		o3_c.disabled=false;
	}else{
		o1_c.checked=false;
		o1_c.disabled=true;
		o2_c.checked=false;
		o2_c.disabled=true;
		o3_c.checked=false;
		o3_c.disabled=true;
	}
	
	if (document.getElementById('c').checked){
		n_areas++;
		c1_c.disabled=false;
		c2_c.disabled=false;
		c3_c.disabled=false;
	}else{
		c1_c.checked=false;
		c1_c.disabled=true;
		c2_c.checked=false;
		c2_c.disabled=true;
		c3_c.checked=false;
		c3_c.disabled=true;
	}
	
	if (document.getElementById('n').checked){
		n_areas++;
		n1_c.disabled=false;
		n2_c.disabled=false;
		n3_c.disabled=false;
	}else{
		n1_c.checked=false;
		n1_c.disabled=true;
		n2_c.checked=false;
		n2_c.disabled=true;
		n3_c.checked=false;
		n3_c.disabled=true;
	}
	
	if (document.getElementById('f').checked){
		n_areas++;
		f1_c.disabled=false;
		f2_c.disabled=false;
		f3_c.disabled=false;
	}else{
		f1_c.checked=false;
		f1_c.disabled=true;
		f2_c.checked=false;
		f2_c.disabled=true;
		f3_c.checked=false;
		f3_c.disabled=true;
	}
	
	return n_areas;
}

function countsubareas(){
	n_subareas=0;
	i1_c=document.getElementById('i1_c');
	i2_c=document.getElementById('i2_c');
	i3_c=document.getElementById('i3_c');
	
	o1_c=document.getElementById('o1_c');
	o2_c=document.getElementById('o2_c');
	o3_c=document.getElementById('o3_c');
	
	c1_c=document.getElementById('c1_c');
	c2_c=document.getElementById('c2_c');
	c3_c=document.getElementById('c3_c');

	n1_c=document.getElementById('n1_c');
	n2_c=document.getElementById('n2_c');
	n3_c=document.getElementById('n3_c');

	f1_c=document.getElementById('f1_c');
	f2_c=document.getElementById('f2_c');
	f3_c=document.getElementById('f3_c');

	if (i1_c.checked||i2_c.checked||i3_c.checked){
		n_subareas++;
	}
	if (o1_c.checked||o2_c.checked||o3_c.checked){
		n_subareas++;
	}
	if (c1_c.checked||c2_c.checked||c3_c.checked){
		n_subareas++;
	}
	if (n1_c.checked||n2_c.checked||n3_c.checked){
		n_subareas++;
	}
	if (f1_c.checked||f2_c.checked||f3_c.checked){
		n_subareas++;
	}
	
	if (n_subareas<3){
		alert('You should choose 3 areas!')
		return false;
	}
	//alert(n_subareas);
	return true;
}

	</script>
</head>

<body>
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>SELF EVALUATION</h1>
	  <p>Position yourself in the following areas by checking, eventually, each sentence.</p>
	<form autocomplete="off" action="cv_8.php" method="post" name="cvform" id="cvform" onsubmit="return countsubareas();moreareas();">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Personal skills and competences">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Self evaluation - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr class="application_cv_list">
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i")); ?></em></td>
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i")); ?>">
                  <input type="checkbox" name="i" id="i" value="1" <?php if (intval($row_q['i'])>0){ ?> checked="checked" <?php }?> onclick="javascript:
                  limitareas(this, 
                  	document.getElementById('i1_c'),
					document.getElementById('i2_c'),
					document.getElementById('i3_c'));"
                     />
                 </td>
              </tr>
              <tr class="application_cv_list">
                <td width="94%" class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i1")); ?></td>
                <td width="6%" class="cv_right"><input type="radio" name="i_c" id="i1_c" value="1" <?php if ($row_q['i']=="1"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i2")); ?>                </td>
                <td class="cv_right"><input type="radio" name="i_c" id="i2_c" value="2" <?php if ($row_q['i']=="2"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?>/>
                </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i3")); ?></td>
                <td class="cv_right"><input type="radio" name="i_c" id="i3_c" value="3" <?php if ($row_q['i']=="3"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?>/>
                </td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o")); ?></em></td>
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o")); ?>">
                <input type="checkbox" name="o" id="o" value="1" <?php if (intval($row_q['o'])>0){ ?> checked="checked" <?php }?>  onclick="javascript:
                  limitareas(this, 
                  	document.getElementById('o1_c'),
					document.getElementById('o2_c'),
					document.getElementById('o3_c'));"
                     />
                </td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o1")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="o_c" id="o1_c" value="1" <?php if ($row_q['o']=="1"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o2")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="o_c" id="o2_c" value="2" <?php if ($row_q['o']=="2"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o3")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="o_c" id="o3_c" value="3" <?php if ($row_q['o']=="3"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                </td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c")); ?></em></td>
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c")); ?>">
                  <input type="checkbox" name="c" id="c" value="1" <?php if (intval($row_q['c'])>0){ ?> checked="checked" <?php }?> onclick="javascript:
                  limitareas(this, 
                  	document.getElementById('c1_c'),
					document.getElementById('c2_c'),
					document.getElementById('c3_c'));" 
					 />
                
                  </td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c1")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="c_c" id="c1_c" value="1" <?php if ($row_q['c']=="1"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c2")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="c_c" id="c2_c" value="2" <?php if ($row_q['c']=="2"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?>/>
                </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c3")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="c_c" id="c3_c" value="3" <?php if ($row_q['c']=="3"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?>/>
                </td>
              </tr>
              
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n")); ?></em></td>
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n")); ?>"><input type="checkbox" name="n" id="n" value="1" <?php if (intval($row_q['n'])>0){ ?> checked="checked" <?php }?> onclick="javascript:
                  limitareas(this, 
                  	document.getElementById('n1_c'),
					document.getElementById('n2_c'),
					document.getElementById('n3_c'));" 
					 />
                
                </td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n1")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="n_c" id="n1_c" value="1" <?php if ($row_q['n']=="1"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n2")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="n_c" id="n2_c" value="2" <?php if ($row_q['i']=="2"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n3")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="n_c" id="n3_c" value="3" <?php if ($row_q['n']=="3"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f")); ?></em></td>
                <td class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f")); ?>"><input type="checkbox" name="f" id="f" value="1" <?php if (intval($row_q['f'])>0){ ?> checked="checked" <?php }?> onclick="javascript:
                  limitareas(this, 
                  	document.getElementById('f1_c'),
					document.getElementById('f2_c'),
					document.getElementById('f3_c'));" 
                     />

                </td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f1")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="f_c" id="f1_c" value="1" <?php if ($row_q['f']=="1"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                    </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f2")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="f_c" id="f2_c" value="2" <?php if ($row_q['f']=="2"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                </td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f3")); ?></td>
                <td width="6%" class="cv_right">
                <input type="radio" name="f_c" id="f3_c" value="3" <?php if ($row_q['f']=="3"){ ?> checked="checked" <?php }else{?> disabled="disabled" <?php }?> />
                </td>
              </tr>
                <tr >
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr class="application_cv_list">
                    <td colspan="2" class="cv_title"><div align="right">&nbsp;</div>                    </td>
                </tr>
            </tbody>
          </table>
        <br />
  	<div align="right">
   <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
   <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_6.php'"  />
   <input name="submitcv7" type="submit" value="Save/Next &gt;&gt;" />
	</div>
</form>
     </td>
  </tr>
</table>
 </body>
</html>
<?php include('../common/bot.php'); ?>

