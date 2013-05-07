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

<table width="100%" border="0" cellpadding="0" cellspacing="0" id="externalTable" summary="table layout">
  <tr>
    <td valign="top" class="application"> 
	<?php include("../includes/sections.php"); ?>
	<h1>&nbsp;</h1>
	<h1>SYSTEM USAGE STATISTICS</h1>
<p>
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=12" target="_self">n° vacancies/workers requested/country</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=13" target="_self">n° vacancies/workers requested/business size</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=18" target="_self">n° vacancies/workers requested/business size/ISCO2</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=19" target="_self">n° vacancies/workers requested/ISCO2</a><br />

<br />

<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=14" target="_self">n° workers recruited/country</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=15" target="_self">n° workers recruited/gender </a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=16" target="_self">n° workers recruited/highest education</a> <br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=20" target="_self">n° workers recruited/ISCO 2</a> <br />

<br />

<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=1" target="_self">n° CV/nationality</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=2" target="_self">n° CV/country</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=3" target="_self">n° CV/ISCO 2</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=4" target="_self">n° CV/gender</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=5" target="_self">n° CV/age</a><br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=6" target="_self">n° CV/referred by</a> <br />

<br />

<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=9" target="_self">n° CV questionnaires evaluated</a> <br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=10" target="_self">n° matches evaluated</a> <br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=11" target="_self">n° jobseekers evaluated</a> <br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=17" target="_self">n° evaluation interviews</a> <br />

<br />

<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=7" target="_self">n° employers/referred by</a> <br />
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?display=8" target="_self">n° employers/country</a> <br />
</p>
<?php if ($_GET['display']=="1"){ //n° CV/Nationality ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° CV</div></td>
     <td class="cv_title">&nbsp;</td>
     <td class="cv_title">nationality</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, cv.nationality as nationality, eu.name as countryname
				FROM  `yfej_cv` cv, yfej_eu_member eu
				WHERE cv.nationality = eu.code
				AND cv.status <>  '0'
				GROUP BY  nationality 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['nationality'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['countryname'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total; ?>
     
     </td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="2"){ //n° CV/Country ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° CV</div></td>
     <td class="cv_title">&nbsp;</td>
     <td class="cv_title">country</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, cv.country as country, eu.name as countryname
				FROM  `yfej_cv` cv, yfej_eu_member eu
				WHERE cv.country = eu.code
				AND cv.status <>  '0'
				GROUP BY country
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['country'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['countryname'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?> 

<?php if ($_GET['display']=="3"){ //n cv/isco_2 ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td width="7%" class="cv_title"><div align="right">n° CV</div></td>
     <td width="11%" class="cv_title"><div align="right">code</div></td>
     <td width="82%" class="cv_title">ISCO description</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, yfej_cv_isco.cv_isco_2 AS iscoCode, yfej_isco.description
				FROM yfej_cv,  `yfej_cv_isco` , yfej_isco
				WHERE yfej_cv.id = yfej_cv_isco.cv_id
				AND yfej_cv_isco.cv_isco_2 = yfej_isco.code
				AND yfej_cv.status <>  '0'
				GROUP BY yfej_cv_isco.cv_isco_2
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="right"><?php echo $row['iscoCode'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['description'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?>
 
<?php if ($_GET['display']=="4"){ //n° CV/gender ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° CV</div></td>
     <td class="cv_title">gender</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, cv.`gender` 
				FROM  `yfej_cv` cv
				WHERE cv.status <>  '0'
				GROUP BY cv.`gender` 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['gender'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?> 

<?php if ($_GET['display']=="5"){ //n° CV/Age ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° CV</div></td>
     <td class="cv_title">age</td>
     <td class="cv_title">year of birth</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, (
				YEAR( NOW( ) ) - YEAR( cv.`bdate` )
				) AS eta, YEAR( cv.`bdate` ) AS annoNascita
				FROM  `yfej_cv` cv
				WHERE cv.status <>  '0'
				GROUP BY YEAR( cv.`bdate` ) 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['eta'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['annoNascita'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="6"){ //n° CV/referred by ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td width="31%" class="cv_title"><div align="right"> n° CV</div></td>
     <td width="69%" class="cv_title">referred by</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, 
				ltrim(replace(referred_by, '|', '')) as ref
				FROM  `yfej_cv` cv
				WHERE cv.status <>  '0'
				GROUP BY ref
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['ref'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="7"){ //n° Employer/referred by ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td width="31%" class="cv_title"><div align="right">n° employers</div></td>
     <td width="69%" class="cv_title">referred by</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, LTRIM( REPLACE( infoproject,  '|',  '' ) ) AS ref
				FROM yfej_employer
				WHERE STATUS =  '1'
				GROUP BY ref
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['ref'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="8"){ //n° employers/country ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° employers</div></td>
     <td class="cv_title">&nbsp;</td>
     <td class="cv_title">country</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, country, eu.name as countryname
				FROM  `yfej_employer` e, yfej_eu_member eu
				WHERE e.country = eu.code
				AND e.status =  '1'
				GROUP BY country 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="right"><?php echo $row['country'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['countryname'] ?></div></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="9"){ //n° employers/country ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° questionnaires evaluated</div></td>
   </tr>
		<?php 
			$query="SELECT COUNT( * ) as n
					FROM  `yfej_cv_questionnaire` 
					WHERE  `i_o` <>  ''
					OR  `o_o` <>  ''
					OR  `c_o` <>  ''
					OR  `n_o` <>  ''
					OR  `f_o` <>  '' ";
			$res=query($query);
			while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="10"){ //n° Matches evaluated ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° matches evaluated</div></td>
   </tr>
		<?php 
			$query="SELECT COUNT( DISTINCT cv_id, employer_id ) AS n
					FROM  `yfej_match` ";
			$res=query($query);
			while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="11"){ //n° jobseekers evaluated ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° jobseekers evaluated</div></td>
   </tr>
		<?php 
			$query="SELECT COUNT( DISTINCT cv_id ) AS n
					FROM  `yfej_match`  ";
			$res=query($query);
			while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="12"){ //n° vacancies/n° vorkers/country ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° vacancies created</div></td>
     <td class="cv_title"><div align="right">n° workers requested</div></td>
     <td class="cv_title"><div align="right">country</div></td>
   </tr>
	<?php 
        $query="SELECT COUNT( yfej_vacancy.id ) AS n_vacancies, SUM( yfej_vacancy.n_vacancies ) AS n_positions, yfej_employer.country AS country
        FROM  `yfej_vacancy` , yfej_employer
        WHERE yfej_vacancy.employer_id = yfej_employer.id
        GROUP BY yfej_employer.country";
        $res=query($query);
        while($row=mysql_fetch_assoc($res)){?>
    
       <tr valign="top">
         <td class="cv_left"><?php echo $row['n_vacancies']?></td>
         <td class="cv_left"><?php echo $row['n_positions']?></td>
         <td class="cv_left"><?php echo $row['country']?></td>
       </tr>
    <?php
    }?>
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select count(*) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div>
     </td>
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select sum(n_vacancies) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div></td>
      <td class="cv_title">&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="13"){ //n° vacancies/Workers/Business size ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° vacancies created</div></td>
     <td class="cv_title"><div align="right">n° workers requested</div></td>
     <td class="cv_title"><div align="right">business size</div></td>
   </tr>
	<?php 
        $query="SELECT COUNT( yfej_vacancy.id ) AS n_vacancies, SUM( yfej_vacancy.n_vacancies ) AS n_positions, yfej_employer.workforce AS sme
				FROM  `yfej_vacancy` , yfej_employer
				WHERE yfej_vacancy.employer_id = yfej_employer.id
				GROUP BY yfej_employer.workforce";
        $res=query($query);
        while($row=mysql_fetch_assoc($res)){?>
    
       <tr valign="top">
         <td class="cv_left"><?php echo $row['n_vacancies']?></td>
         <td class="cv_left"><?php echo $row['n_positions']?></td>
         <td class="cv_left"><?php echo ($row['sme']=="0")?"SME":"Large"; ?></td>
       </tr>
    <?php
    }?>
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select count(*) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div>
     </td>
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select sum(n_vacancies) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div></td>
      <td class="cv_title">&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="18"){ //n° vacancies/Workers/Business size/ISCO2 ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° vacancies created</div></td>
     <td class="cv_title"><div align="right">n° workers requested</div></td>
     <td class="cv_title"><div align="right">business size</div></td>
     <td class="cv_title"><div align="left">ISCO 2</div></td>
   </tr>
	<?php 
        $query="SELECT COUNT( yfej_vacancy.id ) AS n_vacancies, SUM( yfej_vacancy.n_vacancies ) AS n_positions, yfej_employer.workforce AS sme, 
					yfej_employer.country AS country, yfej_isco.description AS isco_description
					FROM  `yfej_vacancy` , yfej_employer, yfej_isco
					WHERE yfej_vacancy.employer_id = yfej_employer.id
					AND yfej_vacancy.isco_2 = yfej_isco.code
					GROUP BY yfej_isco.description, yfej_employer.workforce ";
        $res=query($query);
        while($row=mysql_fetch_assoc($res)){?>
    
       <tr valign="top">
         <td class="cv_left"><?php echo $row['n_vacancies']?></td>
         <td class="cv_left"><?php echo $row['n_positions']?></td>
         <td class="cv_left"><?php echo ($row['sme']=="0")?"SME":"Large"; ?></td>
         <td class="cv_left"><div align="left"><?php echo $row['isco_description']?></div></td>
       </tr>
    <?php
    }?>
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select count(*) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div>
     </td>
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select sum(n_vacancies) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div></td>
      <td class="cv_title">&nbsp;</td>
      <td class="cv_title">&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="19"){ //n° vacancies/Workers/ISCO2 ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">n° vacancies created</div></td>
     <td class="cv_title"><div align="right">n° workers requested</div></td>
     <td class="cv_title"><div align="left">ISCO 2</div></td>
   </tr>
	<?php 
        $query="SELECT COUNT( yfej_vacancy.id ) AS n_vacancies, SUM( yfej_vacancy.n_vacancies ) AS n_positions, 
					yfej_employer.country AS country, yfej_isco.description AS isco_description
					FROM  `yfej_vacancy` , yfej_employer, yfej_isco
					WHERE yfej_vacancy.employer_id = yfej_employer.id
					AND yfej_vacancy.isco_2 = yfej_isco.code
					GROUP BY yfej_isco.description ";
        $res=query($query);
        while($row=mysql_fetch_assoc($res)){?>
    
       <tr valign="top">
         <td class="cv_left"><?php echo $row['n_vacancies']?></td>
         <td class="cv_left"><?php echo $row['n_positions']?></td>
         <td class="cv_left"><div align="left"><?php echo $row['isco_description']?></div></td>
       </tr>
    <?php
    }?>
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select count(*) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div>
     </td>
     <td class="cv_title"><div align="right">
     <?php 
	 $query="select sum(n_vacancies) as n from yfej_vacancy";
	 $res=query($query);
	 $row=mysql_fetch_assoc($res);
	 echo $row['n'];
	  ?></div></td>
      <td class="cv_title">&nbsp;</td>
   </tr>
  </table>
<?php }?>


<?php if ($_GET['display']=="14"){ //n° workers recuited/country ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° workers recruited</div></td>
     <td class="cv_title">&nbsp;</td>
     <td class="cv_title">country</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, cv.country as country, eu.name as countryname
				FROM  `yfej_cv` cv, yfej_eu_member eu
				WHERE cv.country = eu.code
				AND cv.status = '6'
				GROUP BY country
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="right"><?php echo $row['country'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['countryname'] ?></div></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?> 

<?php if ($_GET['display']=="15"){ //n° workers recruited/gender ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° workers recruited</div></td>
     <td class="cv_title">gender</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, cv.`gender` 
				FROM  `yfej_cv` cv
				WHERE cv.status = '6'
				GROUP BY cv.`gender` 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $row['gender'] ?></div></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?> 

<?php if ($_GET['display']=="16"){ //n° workers recruited/highest education ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° workers recruited</div></td>
     <td class="cv_title">education</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, highesteducation
				FROM  `yfej_cv` 
				WHERE status = '6'
				GROUP BY  highesteducation 
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php 
			 $he = $row['highesteducation'];
			 if ($he==1){echo 'basic education';}
			 if ($he==2){echo 'secondary education';}
			 if ($he==3){echo 'higher education';}
			 ?></div></td>
           </tr>
		<?php
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >&nbsp;</td>
   </tr>
  </table>
<?php }?>

<?php if ($_GET['display']=="20"){ //n workers recruited/profilo isco_2 ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td width="7%" class="cv_title"><div align="right">n° workers recruited</div></td>
     <td width="11%" class="cv_title"><div align="right">code</div></td>
     <td width="82%" class="cv_title">ISCO description</td>
   </tr>
		<?php 
		$query="SELECT COUNT( * ) AS n, yfej_cv_isco.cv_isco_2 AS iscoCode, yfej_isco.description
				FROM yfej_cv,  `yfej_cv_isco` , yfej_isco
				WHERE yfej_cv.id = yfej_cv_isco.cv_id
				AND yfej_cv_isco.cv_isco_2 = yfej_isco.code
				AND yfej_cv.status =  '6'
				GROUP BY yfej_cv_isco.cv_isco_2
				ORDER BY n DESC ";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){?>
        
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="right"><?php echo $row['iscoCode'] ?></div></td>
             <td class="cv_left"><div align="left"><?php echo $row['description'] ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right">total: <?php echo $total ?></div></td>
     <td class="cv_title">&nbsp;</td>
     <td class="cv_title">&nbsp;</td>
   </tr>
  </table>
<?php }?>


<?php if ($_GET['display']=="17"){ //n° evaluation interviews ?>  
<table border="0" cellpadding="0" cellspacing="0" class="application_cv">
   <tr class="application_cv_list">
     <td class="cv_title"><div align="right"> n° interviews</div></td>
     <td class="cv_title">type(s)</td>
   </tr>
		<?php 
		$query="SELECT COUNT( interview ) as n, interview
				FROM  `yfej_match` 
				WHERE  `interview` <>  '0000'
				AND id
				IN (
				SELECT MAX( id ) 
				FROM  `yfej_match` 
				WHERE  `interview` <>  '0000'
				GROUP BY  `cv_id` , vacancy_id
				ORDER BY cv_id, vacancy_id
				)
				GROUP BY interview
				ORDER BY cv_id, vacancy_id";
		$res=query($query);
		while($row=mysql_fetch_assoc($res)){
			$interview_type="";
        	$interview_type=(substr($row['interview'],0,1)=="1"?"phone ":"");
        	$interview_type.=(substr($row['interview'],1,1)=="1"?"skype ":"");
        	$interview_type.=(substr($row['interview'],2,1)=="1"?"email ":"");
        	$interview_type.=(substr($row['interview'],3,1)=="1"?"physical presence":"");
		?>
           <tr valign="top">
             <td class="cv_left"><?php echo $row['n']?></td>
             <td class="cv_left"><div align="left"><?php echo $interview_type ?></div></td>
           </tr>
		<?php
		$total+=$row['n'];
		}?>
   <tr class="application_cv_list">
     <td class="cv_title" colspan="3" >total: <?php echo $total ?></td>
   </tr>
  </table>
<?php }?> 

		</td>
	</tr>
</table> 
</body>
</html>
<?php include('../common/bot.php'); // ?>

