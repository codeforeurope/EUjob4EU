<?php 
//language level description function
function lang_desc($code)
{
	if ($code=="a1"||$code=="a2")$desc="Basic User";
	if ($code=="b1"||$code=="b2")$desc="Independent User";
	if ($code=="c1"||$code=="c2")$desc="Proficient User";
	return $desc;
}
 
////////////////////////////////funzione paginatore
//$offset=$_GET[offset]; //param 1
//$item_perpage = 2;//param 2
//$query = "SELECT * FROM $tbl_foto WHERE id_a = $_SESSION[a_id]";//param 3
//$querytotal = "SELECT Count(*) FROM $tbl_foto WHERE id_a = $_SESSION[a_id]";//param 4
//$extraparam = "";//param 5

/*function parseQueryString($str) { 
    $op = array(); 
    $pairs = explode("&", $str); 
    foreach ($pairs as $pair) { 
        list($k, $v) = array_map("urldecode", explode("=", $pair)); 
        $op[$k] = $v; 
    } 
    return $op; 
} 
*/

//pager
function paginatore($offset,$item_perpage,$querypag,$querytotalpag,$prev,$next,$extraparam)
{
	$script=$_SERVER['SCRIPT_NAME']; 
	global $prev,$next,$offset,$item_perpage,$querypag,$querytotalpag,$currentpage,$pages,$pagemap,$totalrecords,$res,$lang;
	$offset+=0;
	$prev= $offset-$item_perpage; 
	$next= $offset+$item_perpage; 
	$total=mysql_num_rows(query($querypag));
	$querypag.=" LIMIT $offset, $item_perpage";//echo $querypag." ".$querytotalpag;
	$currentpage = (int) ($offset / $item_perpage)+1;	
	$pages = (int) ($total / $item_perpage); 
	if ($total % $item_perpage) {$pages++;} 
	for ($a=1;$a<=$pages;$a++) { 
		if ($a==$currentpage){
			//$map[$a] = "&nbsp;".$a."&nbsp;";
			$map[$a] = "<option value='".$a."' selected='selected'>".$a."</option>";
		} else {
			
			//$map[$a] ="<a href=\"$script?offset=$offset2$extraparam\">$a</a>";
			$map[$a] ="<option value=$offset2>".$a."</option>";
		}
		$offset2+=$item_perpage; 
	} 
	
	if ($map>0){
		//$pagemap=implode(" ",$map);
		$pagemap="<form style=\"margin-bottom:0;\"  name=\"pagerform\" id=\"pagerform\" method=\"get\" action=\"\">";
		$pagemap.="<a href=\"#\">Page:</a> ";
		$pagemap.="<select name=\"offset\" id=\"offset\" onchange=\"javascript:document.getElementById('pagerform').submit();\" >";
		$pagemap.=implode(" ",$map);
		$pagemap.="</select>";
		$pagemap.=" <a href=\"#\">of $pages</a>";
		//parse_str($extraparam);
		parse_str($extraparam, $get_vars_array);
		//print_r($
		foreach($get_vars_array as $k => $v){
			$pagemap.="<input type='hidden' name='$k' value='$v'>";
		}
		$pagemap.="</form>";
	}
	
	if ($prev < 0) {$prev="";} 
	else {$prev= "<a href=\"$script?offset=$prev$extraparam\">";
	$prev.= "&laquo;&laquo; ";
	$prev.= "prev"." ".$item_perpage."</a>";}
	if ($total > $next) {$next="<a href=\"$script?offset=$next$extraparam\">";
	$next.= "next"." ".$item_perpage;
	$next.= " &raquo;&raquo;</a>";} 
	else {$next="";}
	
	if ($map>0){
		$totalrecords = $total;
	}
	$res = query($querypag);
	return $total;
}

////////////////////////////////end pager

//echo "tbl_logging".$tbl_logging;
//echo "tbl_logging".$tbl_logging;

function euDate($usDate){
	return substr($usDate,8,2)."/".substr($usDate,5,2)."/".substr($usDate,0,4)." ".substr($usDate,11); 
}

//write log function
function scrivilog($log_severity, $log_is_relevant, $log_user_id, $log_username, $log_request_ip, $log_success, $log_event_description, $log_table)
{
	if (empty($log_user_id))
		$log_user_id = -1;
		$query = "insert into $log_table (log_date, severity, is_relevant, user_id, username, request_ip, success, event_description) values (
			NOW(), ".$log_severity.", '".$log_is_relevant."', ".mysql_real_escape_string(htmlentities($log_user_id, ENT_COMPAT, "UTF-8")).", '".mysql_real_escape_string(htmlentities($log_username, ENT_COMPAT, "UTF-8"))."', '".$log_request_ip."', '".$log_success."', '".mysql_real_escape_string(htmlentities($log_event_description, ENT_COMPAT, "UTF-8"))."')";
		insquery($query);
}
//end write log function

////////////////////////////////image resize function
function ridimensionala($w,$h,$imagesize_x,$imagesize_y,$type,$img,$img_name)
{
	global $orientation;
	$max_width = $w;
	$max_height = $h;
//	$image_details = getimagesize($img);
//	$imagesize_x = $image_details[0];
//	$imagesize_y = $image_details[1];
	if ( ($imagesize_y>100)&&($imagesize_y>=$imagesize_x) ){
		$orientation = "v";
		$final_height=$max_height;
		$final_width=(int)($max_height*$imagesize_x)/$imagesize_y;
	}
	
	if ( ($imagesize_x>100)&&($imagesize_x>=$imagesize_y) ){
		$orientation = "o";
		$final_width=$max_width;
		$final_height=(int)($max_width*$imagesize_y)/$imagesize_x;
	}
//imagecreatetruecolor
	$destimg=imagecreatetruecolor($final_width,$final_height) or die("Impossibile creare l'immagine"); 

//	if ($type==1)
//		$srcimg=imagecreatefromgif($img) or die("Impossibile aprire l'immagine sorgente"); 
	
	if ($type==2)
		$srcimg=imagecreatefromjpeg($img) or die("Impossibile aprire l'immagine sorgente"); 

	//if ($type==3)
//		$srcimg=imagecreatefrompng($img) or die("Impossibile aprire l'immagine sorgente"); 
	
//ImageCopyResampled	
	imagecopyresampled($destimg,$srcimg,0,0,0,0,$final_width,$final_height,ImageSX($srcimg),ImageSY($srcimg)) or die("Impossibile ridimensionare"); 
//	if ($type==1)
//		imagegif($destimg,$img_name) or die("Impossibile salvare");	
		
	if ($type==2)
		imagejpeg($destimg,$img_name) or die("Impossibile salvare $destimg $img_name");
	
//	if ($type==3)
//		imagepng($destimg,$img_name) or die("Impossibile salvare");

	imagedestroy($srcimg);
	imagedestroy($destimg);
	//imagedestroy($canvas_img);

}
////////////////////////////////end image resize function

////////////////////////////////la funzione filigrana
function WatermarkImage($CanvasImage, $WatermarkImage, $DestImage, $Opacity, $Quality)
{
	// create true color canvas image:
	$canvas_src = imagecreatefromjpeg($CanvasImage);
	$canvas_w = ImageSX($canvas_src);
	$canvas_h = ImageSY($canvas_src);
	$canvas_img = imagecreatetruecolor($canvas_w, $canvas_h);
	imagecopy($canvas_img, $canvas_src, 0,0,0,0, $canvas_w, $canvas_h);
	imagedestroy($canvas_src);    // no longer needed
	
	// create true color overlay image:
	$overlay_src = imagecreatefrompng($WatermarkImage);
	$overlay_w = ImageSX($overlay_src);
	$overlay_h = ImageSY($overlay_src);
	$overlay_img = imagecreatetruecolor($overlay_w, $overlay_h);
	imagecopy($overlay_img, $overlay_src, 0,0,0,0, $overlay_w, $overlay_h);
	imagedestroy($overlay_src);    // no longer needed
	
	// setup transparent color (pick one):
	$traspcolor = imagecolorallocate($overlay_img, 0x80, 0x80, 0x80);
	// and use it here:
	imagecolortransparent($overlay_img, $traspcolor);
	
	//piazziamolo al centro dell'immagine
	$dst_x = ($canvas_w/2)-($overlay_w/2);	 
	$dst_y = ($canvas_h/2)-($overlay_h/2);	   
				
	// copy and merge the overlay image and the canvas image:
	imagecopymerge($canvas_img, $overlay_img, $dst_x,$dst_y,0,0, $overlay_w, $overlay_h, $Opacity);
	// output:
	//header("Content-type: image/jpeg");
	imagejpeg($canvas_img, $DestImage, $Quality);

	
	//imagedestroy($overlay_src);
	//imagedestroy($canvas_src);
	imagedestroy($overlay_img);
	imagedestroy($canvas_img);

}
////////////////////////////////fine funzione filigrana

////////////////////////////////funzine per determinare il ricarico percentuale di stock in funzione del prezzo deciso dal fotografo: $percstock=50 significa + 50%
/*function percentuale($prezzo){ 
	if ($prezzo<=50){$percstock=50;}
	if ( ($prezzo>50)&&($prezzo<=100) ){$percstock=40;}
	if ( ($prezzo>100)&&($prezzo<=200) ){$percstock=30;}
	if ( ($prezzo>200)&&($prezzo<=300) ){$percstock=20;}
	if ( ($prezzo>300)&&($prezzo<=400) ){$percstock=15;}
	if ( ($prezzo>400)&&($prezzo<=500) ){$percstock=10;}
	if ( ($prezzo>500)&&($prezzo<=600) ){$percstock=8;}
	if ( ($prezzo>600)&&($prezzo<=700) ){$percstock=5;}
	if ($prezzo>700){$percstock=4;}
	
	return $percstock;
}
*/
function forceDownload($file) {
	/**
	 * Function forceDownload:
	 *	download any type of file if it exists and is readable
	 * -------------------------------------
	 * @author		Andrea Giammarchi
	 * @date		18/01/2005 [17/05/2006]
	 * @compatibility	PHP >= 4.3.0
	 */
	if(file_exists($file) && is_readable($file)) {
		$filename = basename($file);
		if(strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), 'MSIE') !== false && strpos($filename, '.') !== false) {
			$parsename = explode('.', $filename);
			$last = count($parsename) - 1;
			$filename = implode('%2E', array_slice($parsename, 0, $last));
			$filename .= '.'.$parsename[$last];
		}
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Content-Length:'.filesize($file));
		header('Content-Transfer-Encoding: binary');
		if(@$file = fopen($file, "rb")) {
			while(!feof($file))
				echo fread($file, 8192);
			fclose($file);
		}
		exit(0);
	}
}


//validate email address
function validate_email($email)
{

   // Create the syntactical validation regular expression
   $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

   // Presume that the email is invalid
   $valid = 0;

   // Validate the syntax
   if (eregi($regexp, $email))
   {
      list($username,$domaintld) = split("@",$email);
      // Validate the domain
      if (getmxrr($domaintld,$mxrecords))
         $valid = 1;
   } else {
      $valid = 0;
   }

   return $valid;

}

?>
