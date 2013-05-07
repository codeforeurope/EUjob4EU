<?php
if ( (isset($_POST['login'])) || ($_SESSION['a_ok']!="1") ){

	$a_user = $_POST["a_user"];
	$a_password = $_POST["a_password"];	
	$query = "SELECT * FROM $tbl_admin WHERE a_user = '".$a_user."' AND a_password = sha2('".$a_password."', 256) AND a_status = '1' AND a_failed_login < 4";
	//echo $query;exit;
	$res = query($query);
	
	$num = mysql_num_rows($res); 
	
	if ( $num !== 0 ) {
		
		while( $row = mysql_fetch_assoc($res) ){
			
			session_regenerate_id(true);
			
			$a_id = $row['a_id'];
			//echo 			$a_id;exit;
			$a_firstname = $row['a_firstname'];
			$a_lastname = $row['a_lastname'];
			$a_user = $row['a_user'];
			$a_manager = $row['a_manager'];
			$a_level = $row['a_level'];
			$login_msg = "&nbsp;";
		}
		
		$a_ok = "1";//logged flag
		
		//if in iframe
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

		$_SESSION["a_ok"] = $a_ok;
		$_SESSION["a_id"] = $a_id;
		$_SESSION["a_firstname"] = $a_firstname;
		$_SESSION["a_lastname"] = $a_lastname;
		$_SESSION["a_user"] = $a_user;
		$_SESSION["login_msg"] = $login_msg;
		$_SESSION["a_manager"] = $a_manager;
		$_SESSION["a_level"] = $a_level;
		
		//log entry
		scrivilog(0, '0', $a_id, $a_user, $_SERVER['REMOTE_ADDR'], '1', "admin login", $tbl_logging);
		
	} else {
	
		$login_msg = $a_login_failed;
		$_SESSION["login_msg"] = $login_msg;
		
		//counter increase
		$query="update $tbl_admin set a_failed_login = a_failed_login+1 where a_user ='".$a_user."'";
		query($query);
		
		//log
		scrivilog(1, '1', 0, $a_user, $_SERVER['REMOTE_ADDR'], '0', "admin login failure", $tbl_logging);

		//echo $query;
		?>
		<script language="javascript">
		alert('Wrong login data!');
		parent.location='<?php echo $admin_webaddress ?>';
    </script>
		<?php
		//include($a_login_file);
		
		//server side
		exit;
	}
}
?>