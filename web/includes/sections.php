<?php /*?><!--we are loggede, hide exit link--> <?php */?>
<?php if ($_SESSION['a_ok']=="1"){?>
  <b><a href="../access/login_access.php" title="Log out" target="_self">Log out</a></b> 
<?php } elseif ($_SESSION['e_ok']=="1"){?>
  <b><a href="../access/" title="Log out" target="_self">Log out</a></b>  
<?php } elseif (!isset($_SESSION['a_ok'])&&isset($_SESSION['cv_id'])){?>
  <b><a href="../access/" title="Log out" target="_self">Log out</a></b> 
<?php }
/*?><?php if (!(isset($_SESSION['a_ok']))){ ?> 
<b><a href="../access/login_access.php" title="Administrators" target="_self">Administrators</a></b> |
<?php }?>
<?php */
?>
<?php /*?><!--operators menu--><?php */?> 
<?php if ( ($_SESSION['a_ok']=="1") || ($a_ok=="1") ){ ?>
  | <b><a href="../access/cv_list.php" title="CV list" target="_self">CV list</a></b> 
	<?php if ($_SESSION['a_level']>=3){ ?>
  |  <b><a href="../access/employers_list.php" title="Employer list" target="_self">Employer list</a></b> 
	<?php }?>
<?php } ?>

<?php /*?><!--admin menu--><?php */?> 
<?php if ( ($_SESSION['a_manager']=="1") || ($a_manager=="1") || ($_SESSION['a_level']>=5) ){ ?>
  | <b><a href="../access/cv_search.php" title="CV search" target="_self">CV search</a></b> 
  | <b><a href="../access/matches.php" title="Matches" target="_self">Matches</a></b>
  | <b><a href="../access/matchesNew.php" title="Matches" target="_self">MatchesNew</a></b>
  | <b><a href="../access/employers_vacancies.php" title="Vacancies" target="_self">Vacancies</a></b> 
<?php } ?>

<?php if ( ($_SESSION['a_manager']=="1") || ($a_manager=="1") ){ ?>
  | <b><a href="../access/stats.php" title="Usage statistics" target="_self">Stats</a></b> 
<?php } ?>

<?php /*?><!--employer menu--><?php */?>
<?php if ( ($_SESSION['e_ok']=="1") || ($e_ok=="1") ){ ?>
  | <b><a href="../employer/employer_vacancies.php" title="Vacancies" target="_self">Vacancies</a></b> 
  | <b><a href="../employer/employer_addvacancy.php" title="Add a vacancy" target="_self">Add vacancy</a></b> 
  | <b><a href="../employer/employer_editprofile.php" title="Edit profile" target="_self">Edit profile</a></b>
<?php } ?>
