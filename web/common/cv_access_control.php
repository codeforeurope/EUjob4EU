<?php
//echo $_SERVER['HTTP_REFERER'];
if (strrpos($_SERVER['HTTP_REFERER'],"http://85.18.173.19/yourfirsteuresjob")===false){
	exit;
}
session_regenerate_id(true);
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

?>