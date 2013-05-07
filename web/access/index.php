<?php include('../common/comuni_inc.php'); ?>
<?php 
//session_unset();
//session_destroy();
   //session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
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
<h1>WELCOME TO EUJob4EU <br />
    </h1>
    <p><em>The <strong>Your First Eures Job</strong> project web based data management tool</em><br />
      <br />
      <em> <a href="http://www.yourfirsteuresjob.eu/disclaimer" target="_blank">(Please read our condition of service page)</a></em> <p>Recruitment of young European mobile workers<br />

    <strong><em>Financial support for mobile workers' integration</em></strong></p>
 <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>Employers</strong></div>
              </td>
            </tr>
			<tr class="application_cv_list">
              <td class="cv_leftline" ><div align="left">  
        <ul>
   	<li>
    <p>
     Register to be part of the <strong><em>Your First Eures Job</em></strong> mobile workers' integration programme, making your company available as a potential host for qualified workers and eligible for financial support if your request matches those in our constantly updated database of selected and qualified profiles.<br />
     <br />

     You may <!--find additional information <a href="http://www.portafuturo.it/servizi/your-first-eures-job" title="Porta Futuro - Your First EURES Job info page" target="_blank">here</a>; you may, alternatively,-->  <a href="mailto:eures.employer@provincia.roma.it">ask a question</a> to a <em><strong>Your First Eures Job</strong></em> representative. </p>
   	</li>
    </ul>
</div></td>
	</tr>
   <tr class="application_cv_list">
    <td class="cv_title">&nbsp;</td>
   </tr>
</tbody>
</table><br />
   <div align="right">
   <input name="register" type="button" value="Register" onclick="javascript:location.href='../employer/employer_register.php';" />&nbsp;
         <input name="view_profiles" type="button" value="Log in" onclick="javascript:location.href='../employer/employer_login.php';" />
       </div>
<br />
<br /><br />

    
    <table border="0" cellpadding="0" cellspacing="0" class="application_cv">
          <tbody>
            <tr class="application_cv_list">
              <td class="cv_title"><div align="left"><strong>Job seekers</strong></div>
              </td>
            </tr>
			<tr class="application_cv_list">
              <td class="cv_leftline" ><div align="left">  
        <ul>
   	<li>
    <p>
	Create your <em>Europass CV</em> and apply for a job in another EU member state; should your profile be chosen, based upon your qualifications e/o your working experience, you will be contacted by a <em><strong>Your First Eures Job</strong></em> representative. Furthermore, you will be able to download a printable version of your <em>Europass CV</em> at any time.<br /><br />

You may <!--find additional information <a href="http://www.portafuturo.it/servizi/your-first-eures-job" title="Porta Futuro - Your First EURES Job info page" target="_blank">here</a>; you may, alternatively,--> <a href="mailto:euresjob@provincia.roma.it">ask a question</a> to a <em><strong>Your First Eures Job</strong></em> representative.</p>
    </li>
   </ul>
</div></td>
</tr>
   <tr class="application_cv_list">
    <td class="cv_title">&nbsp;</td>
   </tr>
</tbody>
</table><br />

  	    <div align="right">&nbsp;
  	      <input name="create_cv" type="button" value="Create your CV" onclick="javascript:location.href='../cv/cv_1.php';" />&nbsp;&nbsp;
  	      <input name="edit_cv" type="button" value="Access your CV" onclick="javascript:location.href='../cv/cv_retrieve.php';" />
	      </div>

   </li>
 </ul></td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>



