<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/login_inc.php'); ?>

<?php 
//update rating
if (isset($_POST['save_ratings'])){
	$i_o = 0+$_POST['i_o'];
	$o_o = 0+$_POST['o_o'];
	$c_o = 0+$_POST['c_o'];
	$n_o = 0+$_POST['n_o'];
	$f_o = 0+$_POST['f_o'];
	
	$query = "UPDATE $tbl_cv_questionnaire SET 
	i_o=".$i_o.",
	o_o=".$o_o.",
	c_o=".$c_o.",
	n_o=".$n_o.",
	f_o=".$f_o."
	WHERE cv_id = ".$_GET['cv_id'];
	
	insquery($query);
}
?>
<?php 
	$query = "SELECT * FROM $tbl_cv_questionnaire WHERE cv_id = ".$_GET['cv_id'];
	$res_q = query($query);
	$row_q = mysql_fetch_assoc($res_q);

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
  function calculatescore(){
	document.getElementById('score').value=10*
	( parseInt(document.getElementById('i_o').value)+
	parseInt(document.getElementById('o_o').value)+
	parseInt(document.getElementById('c_o').value)+
	parseInt(document.getElementById('n_o').value)+
	parseInt(document.getElementById('f_o').value) )  
  }
  </script>
</head>

<body onload="javascript: calculatescore();">


<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application">
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1> EVALUATION - <?php echo retval("firstname",$tbl_cv,"id",$_GET['cv_id']) ?> <?php echo retval("lastname",$tbl_cv,"id",$_GET['cv_id'])?></h1>
	  <p>The flag <span class="cv_rightline"><img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" /></span> shows the choice made by the candidate.<br />
	  Rate each flagged voice   as <strong><em>Basic</em></strong>, <strong><em>Medium</em></strong> or <strong><em>High</em></strong>
      </p>
<form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>?cv_id=<?php echo $_GET['cv_id'] ?>" method="post" name="questionnaireform" id="questionnaireform">
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Personal skills and competences">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Evaluation</td>
              </tr>
            </thead>
            <tbody>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i")); ?></em></td>
              </tr>
              <tr class="application_cv_list">
                <td width="94%" class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i1")); ?>
                  <?php if ($row_q['i']=="1"){ ?>
                  &nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
                <?php }?></td>
                <td width="6%" class="cv_right">
                <select name="i_o" id="i_o" <?php if ($row_q['i']!="1"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['i_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['i_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['i_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['i_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i2")); ?>                
				<?php if ($row_q['i']=="2"){ ?>
                  &nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
                <?php }?></td>
                <td class="cv_right">
                <select name="i_o" id="i_o" <?php if ($row_q['i']!="2"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['i_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['i_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['i_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['i_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","i3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","i3")); ?>
                  <?php if ($row_q['i']=="3"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="i_o" id="i_o" <?php if ($row_q['i']!="3"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['i_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['i_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['i_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['i_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                </select></td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o")); ?></em></td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o1")); ?>
                  <?php if ($row_q['o']=="1"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="o_o" id="o_o" <?php if ($row_q['o']!="1"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['o_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['o_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['o_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['o_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o2")); ?>
                  <?php if ($row_q['o']=="2"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="o_o" id="o_o"<?php if ($row_q['o']!="2"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['o_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['o_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['o_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['o_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","o3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","o3")); ?>
                  <?php if ($row_q['o']=="3"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="o_o" id="o_o"<?php if ($row_q['o']!="3"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['o_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['o_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['o_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['o_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c")); ?></em></td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c1")); ?>
                  <?php if ($row_q['c']=="1"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="c_o" id="c_o" <?php if ($row_q['c']!="1"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['c_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['c_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['c_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['c_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c2")); ?>
                  <?php if ($row_q['c']=="2"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="c_o" id="c_o" <?php if ($row_q['c']!="2"){ ?> disabled="disabled" <?php }?>onchange="javascript: calculatescore();" >
                  <option value="0" <?php if (intval($row_q['c_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['c_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['c_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['c_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","c3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","c3")); ?>
                  <?php if ($row_q['c']=="3"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right">
                <select name="c_o" id="c_o" <?php if ($row_q['c']!="3"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['c_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['c_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['c_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['c_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n")); ?></em></td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n1")); ?>
                  <?php if ($row_q['n']=="1"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="n_o" id="n_o" <?php if ($row_q['n']!="1"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['n_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['n_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['n_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['n_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n2")); ?>
                  <?php if ($row_q['n']=="2"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="n_o" id="n_o" <?php if ($row_q['n']!="2"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['n_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['n_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['n_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['n_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","n3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","n3")); ?>
                  <?php if ($row_q['n']=="3"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="n_o" id="n_o" <?php if ($row_q['n']!="3"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['n_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['n_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['n_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['n_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline">&nbsp;</td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f")); ?>"><em><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f")); ?></em></td>
              </tr>
              <tr class="application_cv_list">
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f1")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f1")); ?>
                  <?php if ($row_q['f']=="1"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="f_o" id="f_o" <?php if ($row_q['f']!="1"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['f_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['f_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['f_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['f_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f2")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f2")); ?>
                  <?php if ($row_q['f']=="2"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="f_o" id="f_o" <?php if ($row_q['f']!="2"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['f_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['f_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['f_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['f_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
              <tr>
                <td class="cv_rightline" title="<?php echo htmlentities(retval("desc_it",$tbl_questionnaire,"code","f3")); ?>"><?php echo htmlentities(retval("desc_en",$tbl_questionnaire,"code","f3")); ?>
                  <?php if ($row_q['f']=="3"){ ?>
&nbsp;<img src="../img/icons/check.png" alt="Checked by the candidate" width="12" height="12" border="0" />
<?php }?></td>
                <td class="cv_right"><select name="f_o" id="f_o" <?php if ($row_q['f']!="3"){ ?> disabled="disabled" <?php }?> onchange="javascript: calculatescore();">
                  <option value="0" <?php if (intval($row_q['f_o'])==0){?> selected="selected" <?php }?> title="-">-</option>
                  <option value="1" <?php if (intval($row_q['f_o'])==1){?> selected="selected" <?php }?> title="basic">basic</option>
                  <option value="2" <?php if (intval($row_q['f_o'])==2){?> selected="selected" <?php }?> title="medium">medium</option>
                  <option value="3" <?php if (intval($row_q['f_o'])==3){?> selected="selected" <?php }?> title="high">high</option>
                  </select></td>
              </tr>
                <tr >
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr class="application_cv_list">
                    <td colspan="2" class="cv_title"><div align="right">Registered score:&nbsp;
                        <input name="score" id="score" type="text" size="3" readonly="true" />
                  </div>                    </td>
                </tr>
            </tbody>
          </table>
        <br />
  	<div align="right">
   <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
   <input name="save_ratings" type="submit" value="Save" />
	</div>
</form>
     </td>
  </tr>
</table>
 </body>
</html>
<?php include('../common/bot.php'); ?>

