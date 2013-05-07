<?php
if ( (isset($_POST['login'])) || ($_SESSION['e_ok']!="1") ){

	$e_pivacf = $_POST["e_pivacf"];
	$e_password = $_POST["e_password"];	

	$query = "SELECT * FROM $tbl_employers WHERE pivacf = '".$e_pivacf."' AND password = sha2('".$e_password.$e_pivacf."', 256) AND status = '1' AND failed_login < 4";
	//echo $query;exit;
	$res = query($query);
	
	$num = mysql_num_rows($res); 
	
	if ( $num !== 0 ) {
		
		session_regenerate_id(true);

		while( $row = mysql_fetch_assoc($res) ){
		
			$e_id = $row['id'];
		
		}
		
		$e_ok = "1";//logged flag
		
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
		
		$_SESSION["e_ok"] = $e_ok;
		$_SESSION["e_id"] = $e_id;
		
		//access logs
		scrivilog(0, '0', $a_id, $e_id, $_SERVER['REMOTE_ADDR'], '1', "employer login", $tbl_logging);
	
	} else {
	
		$login_msg = $e_login_failed;
		$_SESSION["login_msg"] = $login_msg;
		
		//failed attempts counter
		$query="update $tbl_employers set failed_login = failed_login+1 where pivacf ='".$e_pivacf."'";
		query($query);
		//include($e_login_file);
		
		//access log entry
		scrivilog(1, '1', 0, $e_pivacf, $_SERVER['REMOTE_ADDR'], '0', "employer login failure", $tbl_logging);
		?>
		<script language="javascript">
		alert('Wrong login data!');
		parent.location='<?php echo $webaddress ?>';
		</script>
		<?php
		//server side safe
		exit;
	}
}
?>