<?php 	
include_once("Mail.php"); 
$From = "EUJob4EU - Ufficio Monitoraggio e Progetti Europei  <$smtp_user>"; 
//$To = "marcellozini@hotmail.com <marcellozini@hotmail.com>"; 
$Subject = "EUJob4EU - your CV retrieval/edit code"; 
$Host = "mail.provincia.roma.it"; 
$Username = $smtp_user; 
$Password = $smtp_pw; 
$msg="";
//recordset
$query="select distinct id,firstname, lastname, email, retrievalcode, date_editable from $tbl_cv";
$res=query($query);
while($row=mysql_fetch_array($res)){
	$To = $row['email'];
	
/*	The retrieval code ".$row['retrievalcode']." has been associated to this CV.
			Use it in conjunction with your name, ".$row['firstname']." ".$row['lastname'].", to view / print it in the future.\n
			You may contact a Your First Eures Job representative for further info by visiting our project web page at:\n
			http://www.portafuturo.it/servizi/your-first-eures-job";*/
	
	//////////////////////////////////////////
	$Message = "Your application for admission to the Your First Eures Job - Recruitment of young European mobile workers project has been correctly registered in the EUJob4EU data management tool.<br />
We inform you that your CV may be modified before ".euDate($row['date_editable'])." by using the access info below the line. We remind you that, in order to enable the matching routine between your profile and the job requests, you have to describe you professional profile for which you intend to apply using all three description levels in the DESIRED EMPLOYMENT / OCCUPATIONAL FIELD page of the CV creation tool.<br /><br />

Thank you
EUJob4EU - Ufficio Monitoraggio e Progetti Europei<br />
==================================================<br />
URL: http://www.yourfirsteuresjob.eu/eujob4eu<br />
Push the button 'Access your CV'<br /><br />

Retrieval code: ".$row['retrievalcode']."<br />
First name: ".$row['firstname']."<br />
Last name: ".$row['lastname']."<br />";
	//////////////////////////////
	
	//siamo in produzione, inviamo l'email
	//$Headers = array ('From' => $From, 'To' => $To, 'Subject' => $Subject); 
//	$SMTP = Mail::factory('smtp', array ('host' => $Host, 'auth' => true, 
//	'username' => $Username, 'password' => $Password)); 
//	
//	$mail = $SMTP->send($To, $Headers, $Message); 
	
	//invio a stefano
	//$mail = $SMTP->send("s.iacobucci@provincia.roma.it", $Headers, $Message); 
	//
//	if (PEAR::isError($mail)){ 
//		$msg .= $mail->getMessage(); 
//	} else { 
//		$msg .= "mail inviata a ".$row['id']." - ".$To."<br />"; 
//	} 
	$msg.= $row['email']."<br /><br />".$Message."<br />";
}
echo $msg;
//fine recordset?>
