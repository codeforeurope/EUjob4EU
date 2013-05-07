<?php include('../common/comuni_inc.php'); ?>
<?php //include('../common/cv_access_control.php'); ?>
<?php 

if ($_SESSION['a_id']!="")
	$a_id = $_SESSION['a_id'];
else
	$a_id = 0;

//if cv invoked by retrieval code
if (isset($_POST['viewcv'])){
	$query = "SELECT * FROM $tbl_cv WHERE firstname ='".$_POST['firstname']."' AND lastname = '".$_POST['lastname']."' AND retrievalcode = '".$_POST['retrievalcode']."'";
	$res_edit = query($query);
	if (mysql_num_rows($res_edit)==0){
	
	//system log entry
	//scrivilog($log_severity, $log_is_relevant, $log_user_id, $log_username, $log_request_ip, $log_success, $log_event_description, $log_table)
	scrivilog(1, '1', $a_id, $a_user, $_SERVER['REMOTE_ADDR'], '0', "stampa cv ".$_POST['retrievalcode'], $tbl_logging);
		?>
        <script>
        alert('No match found!\nPlease verify your data and try again.');
        parent.location='<?php echo $webaddress ?>';
        </script>
        <?php
		//echo "sdfsfsdf";
		exit;
	}else{
		$row_edit = mysql_fetch_assoc($res_edit);
		$cv_name = $row_edit['lastname']." ".$row_edit['firstname'];
		$cv_id = $row_edit['id'];
		//session_register('cv_name');
		//session_register('cv_id');
		
		//scrivilog($log_severity, $log_is_relevant, $log_user_id, $log_username, $log_request_ip, $log_success, $log_event_description, $log_table)
		scrivilog(0, '0', $a_id, $a_user, $_SERVER['REMOTE_ADDR'], '1', "stampa cv $cv_name", $tbl_logging);
	}
}

//see where the request comes from
if (isset($_SESSION['cv_id'])){
	$cv_id = $_SESSION['cv_id']; //admin edit
} 
if ($_GET['task'] == "adminview"){ //admin cv list
	$cv_id = $_GET['cv_id'];
} 

//we have the id, pull it out for printing
$query = "SELECT * FROM $tbl_cv WHERE id = ".$cv_id;

$res_edit = query($query);
$row_edit = mysql_fetch_assoc($res_edit);

/*$img_name = str_replace(" ","",$row_edit['date_created']);
$img_name = str_replace("-","",$img_name);
$img_name = str_replace(":","",$img_name);
$img_name .= $cv_id;
*/
//echo $row_edit['date_created'].$cv_id.trim($row_edit['firstname']);
//image filename
$img_name = sha1($row_edit['date_created'].$cv_id.$row_edit['firstname']);

?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>Europass Curriculum Vitae</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>PHT</o:Author>
  <o:LastAuthor>MZ</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>1</o:TotalTime>
  <o:LastPrinted>2005-09-22T14:04:00Z</o:LastPrinted>
  <o:Created>2008-07-14T13:16:00Z</o:Created>
  <o:LastSaved>2008-07-14T13:16:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>504</o:Words>
  <o:Characters>2873</o:Characters>
  <o:Company>MZ</o:Company>
  <o:Lines>23</o:Lines>
  <o:Paragraphs>6</o:Paragraphs>
  <o:CharactersWithSpaces>3371</o:CharactersWithSpaces>
  <o:Version>11.9999</o:Version>
 </o:DocumentProperties>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:DrawingGridHorizontalSpacing>0 pt</w:DrawingGridHorizontalSpacing>
  <w:DrawingGridVerticalSpacing>0 pt</w:DrawingGridVerticalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery>
  <w:DisplayVerticalDrawingGridEvery>0</w:DisplayVerticalDrawingGridEvery>
  <w:UseMarginsForDrawingGridOrigin/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DrawingGridHorizontalOrigin>0 pt</w:DrawingGridHorizontalOrigin>
  <w:DrawingGridVerticalOrigin>0 pt</w:DrawingGridVerticalOrigin>
  <w:Compatibility>
   <w:NoLeading/>
   <w:SpaceForUL/>
   <w:BalanceSingleByteDoubleByteWidth/>
   <w:DoNotLeaveBackslashAlone/>
   <w:ULTrailSpace/>
   <w:DoNotExpandShiftReturn/>
   <w:AdjustLineHeightInTable/>
   <w:SelectEntireFieldWithStartOrEnd/>
   <w:UseWord2002TableStyleRules/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
 </w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" LatentStyleCount="156">
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Arial Narrow";
	panose-1:2 11 6 6 2 2 2 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:647 2048 0 0 159 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan no-line-numbers;
	mso-hyphenate:none;
	tab-stops:center 216.0pt right 432.0pt;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
a:link, span.MsoHyperlink
	{mso-style-parent:"WW-Default Paragraph Font";
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;
	text-underline:single;}
span.FootnoteCharacters
	{mso-style-name:"Footnote Characters";
	mso-style-parent:"";}
span.EndnoteCharacters
	{mso-style-name:"Endnote Characters";
	mso-style-parent:"";}
span.WW-DefaultParagraphFont
	{mso-style-name:"WW-Default Paragraph Font";
	mso-style-parent:"";}
p.TableContents, li.TableContents, div.TableContents
	{mso-style-name:"Table Contents";
	mso-style-parent:"Corpo del testo";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	mso-pagination:widow-orphan no-line-numbers;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.TableHeading, li.TableHeading, div.TableHeading
	{mso-style-name:"Table Heading";
	mso-style-parent:"Table Contents";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	text-align:center;
	mso-pagination:widow-orphan no-line-numbers;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	font-style:italic;}
p.CVTitle, li.CVTitle, div.CVTitle
	{mso-style-name:"CV Title";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:14.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	letter-spacing:.5pt;
	mso-ansi-language:FR;
	mso-fareast-language:AR-SA;
	font-weight:bold;}
p.CVHeading1, li.CVHeading1, div.CVHeading1
	{mso-style-name:"CV Heading 1";
	mso-style-next:Normale;
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.CVHeading2, li.CVHeading2, div.CVHeading2
	{mso-style-name:"CV Heading 2";
	mso-style-parent:"CV Heading 1";
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVHeading2-FirstLine, li.CVHeading2-FirstLine, div.CVHeading2-FirstLine
	{mso-style-name:"CV Heading 2 - First Line";
	mso-style-parent:"CV Heading 2";
	mso-style-next:"CV Heading 2";
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVHeading3, li.CVHeading3, div.CVHeading3
	{mso-style-name:"CV Heading 3";
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVHeading3-FirstLine, li.CVHeading3-FirstLine, div.CVHeading3-FirstLine
	{mso-style-name:"CV Heading 3 - First Line";
	mso-style-parent:"CV Heading 3";
	mso-style-next:"CV Heading 3";
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVHeadingLanguage, li.CVHeadingLanguage, div.CVHeadingLanguage
	{mso-style-name:"CV Heading Language";
	mso-style-parent:"CV Heading 2";
	mso-style-next:"Level Assessment - Code";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.LevelAssessment-Code, li.LevelAssessment-Code, div.LevelAssessment-Code
	{mso-style-name:"Level Assessment - Code";
	mso-style-next:"Level Assessment - Description";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:1.4pt;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:9.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.LevelAssessment-Description, li.LevelAssessment-Description, div.LevelAssessment-Description
	{mso-style-name:"Level Assessment - Description";
	mso-style-parent:"Level Assessment - Code";
	mso-style-next:"Level Assessment - Code";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:1.4pt;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:9.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.SmallGap, li.SmallGap, div.SmallGap
	{mso-style-name:"Small Gap";
	mso-style-next:Normale;
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:5.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVHeadingLevel, li.CVHeadingLevel, div.CVHeadingLevel
	{mso-style-name:"CV Heading Level";
	mso-style-parent:"CV Heading 3";
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	text-align:right;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-style:italic;
	mso-bidi-font-style:normal;}
p.LevelAssessment-Heading1, li.LevelAssessment-Heading1, div.LevelAssessment-Heading1
	{mso-style-name:"Level Assessment - Heading 1";
	mso-style-parent:"Level Assessment - Code";
	margin-top:0cm;
	margin-right:2.85pt;
	margin-bottom:0cm;
	margin-left:2.85pt;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.LevelAssessment-Heading2, li.LevelAssessment-Heading2, div.LevelAssessment-Heading2
	{mso-style-name:"Level Assessment - Heading 2";
	margin-top:0cm;
	margin-right:2.85pt;
	margin-bottom:0cm;
	margin-left:2.85pt;
	margin-bottom:.0001pt;
	text-align:center;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:9.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.LevelAssessment-Note, li.LevelAssessment-Note, div.LevelAssessment-Note
	{mso-style-name:"Level Assessment - Note";
	mso-style-parent:"Level Assessment - Code";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:9.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-style:italic;
	mso-bidi-font-style:normal;}
p.CVMajor, li.CVMajor, div.CVMajor
	{mso-style-name:"CV Major";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.CVMajor-FirstLine, li.CVMajor-FirstLine, div.CVMajor-FirstLine
	{mso-style-name:"CV Major - First Line";
	mso-style-parent:"CV Major";
	mso-style-next:"CV Major";
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.CVMedium, li.CVMedium, div.CVMedium
	{mso-style-name:"CV Medium";
	mso-style-parent:"CV Major";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.CVMedium-FirstLine, li.CVMedium-FirstLine, div.CVMedium-FirstLine
	{mso-style-name:"CV Medium - First Line";
	mso-style-parent:"CV Medium";
	mso-style-next:"CV Medium";
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.CVNormal, li.CVNormal, div.CVNormal
	{mso-style-name:"CV Normal";
	mso-style-parent:"CV Medium";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVSpacer, li.CVSpacer, div.CVSpacer
	{mso-style-name:"CV Spacer";
	mso-style-parent:"CV Normal";
	margin-top:0cm;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:2.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVNormal-FirstLine, li.CVNormal-FirstLine, div.CVNormal-FirstLine
	{mso-style-name:"CV Normal - First Line";
	mso-style-parent:"CV Normal";
	mso-style-next:"CV Normal";
	margin-top:3.7pt;
	margin-right:5.65pt;
	margin-bottom:0cm;
	margin-left:5.65pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;}
p.CVFooterLeft, li.CVFooterLeft, div.CVFooterLeft
	{mso-style-name:"CV Footer Left";
	margin:0cm;
	margin-bottom:.0001pt;
	text-align:right;
	text-indent:18.0pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:8.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:EN-US;
	mso-fareast-language:AR-SA;
	mso-bidi-font-weight:bold;}
p.CVFooterRight, li.CVFooterRight, div.CVFooterRight
	{mso-style-name:"CV Footer Right";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-hyphenate:none;
	font-size:8.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial Narrow";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:DE;
	mso-fareast-language:AR-SA;
	mso-bidi-font-weight:bold;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("CVTemplate_en_GB_file/header.htm") fs;
	mso-footnote-continuation-separator:url("CVTemplate_en_GB_file/header.htm") fcs;
	mso-endnote-separator:url("CVTemplate_en_GB_file/header.htm") es;
	mso-endnote-continuation-separator:url("CVTemplate_en_GB_file/header.htm") ecs;
	mso-footnote-position:beneath-text;
	mso-footnote-numbering-restart:each-page;
	mso-endnote-numbering-style:arabic;}
@page Section1
	{size:595.25pt 841.85pt;
	margin:42.55pt 1.0cm 50.15pt 1.0cm;
	mso-header-margin:36.0pt;
	mso-footer-margin:36.0pt;
	mso-footer:url(../info/CVTemplate_en_GB_file/header.htm) f1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;
	mso-footnote-position:beneath-text;
	mso-footnote-numbering-restart:each-page;
	mso-endnote-numbering-style:arabic;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Tabella normale";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman";
	mso-ansi-language:#0400;
	mso-fareast-language:#0400;
	mso-bidi-language:#0400;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050">
  <o:colormenu v:ext="edit" fillcolor="none [4]" strokecolor="none [1]"
   shadowcolor="none [2]"/>
 </o:shapedefaults></xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body bgcolor=white lang=IT link=blue vlink=purple style='tab-interval:36.0pt;
line-break:strict'>

<div class=Section1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-padding-alt:2.0pt 0cm 2.0pt 0cm'>
 <tr style='mso-yfti-irow:2;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVTitle><span lang=EN-GB style='mso-ansi-language:EN-GB'>Europass<o:p></o:p></span></p>
  <p class=CVTitle><span lang=EN-GB style='mso-ansi-language:EN-GB'>Curriculum
  Vitae<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal>&nbsp;</p>  </td>
 </tr>
 <tr style='mso-yfti-irow:3;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:4;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Personal information<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>
  <?php if (trim($row_edit['img_ext'])!=""){ ?>
  <img src="../img/<?php echo $row_edit['img_dir'] ?>/<?php echo $img_name.".jpg"; ?>?<?php echo time(); ?>" width="150" />
  <?php }?>
  </o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:5;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>First name / Surname 
      <o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVMajor-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><?php echo $row_edit['firstname'] ?> <?php echo $row_edit['lastname'] ?> </span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:6;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Address(es)<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['address'] ?>, <?php echo $row_edit['postcode'] ?> <?php echo $row_edit['city'] ?> / <?php echo $row_edit['country'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:7;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Telephone(s)<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:340.65pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><?php echo $row_edit['telephone'] ?>&nbsp;&nbsp;&nbsp;Mobile: <?php echo $row_edit['mobile'] ?></span></span></p>    </td>
  </tr>
 <tr style='mso-yfti-irow:8;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Fax(es)<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><?php echo $row_edit['fax'] ?>
    <o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:9;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>E-mail<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['email'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:10;page-break-inside:avoid'>
   <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'><p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Skype id
           <o:p></o:p>
   </span></p></td>
   <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'><p class=CVNormal><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['skype'] ?></span></p></td>
   </tr>
 
 <tr style='mso-yfti-irow:10;page-break-inside:avoid'>
   <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'><p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Other messaging application
         <o:p></o:p>
   </span></p></td>
   <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'><p class=CVNormal><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['other_messaging'] ?></span></p></td>
  </tr>
 <tr style='mso-yfti-irow:11;page-break-inside:avoid'>
   <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'><p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'>
       <o:p>&nbsp;</o:p>
   </span></p></td>
   <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'><p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'>
       <o:p>&nbsp;</o:p>
   </span></p></td>
   </tr>
 <tr style='mso-yfti-irow:11;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Nationality<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['nationality'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:12;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:13;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Date of birth<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB">
  <?php echo substr($row_edit['bdate'],8,2)."-".substr($row_edit['bdate'],5,2)."-".substr($row_edit['bdate'],0,4); ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:15;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Gender<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['gender'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:16;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:17;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Desired employment / Occupational field<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <!--<p class=CVMajor-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>--> 
 <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'> 
 <?php //list desired occupation 
 $query = "SELECT * FROM $tbl_cv_isco WHERE cv_id = ".$cv_id." limit 1";
 $res_occ = query($query);
 while($row_occ = mysql_fetch_assoc($res_occ)){?>
 <?php echo retval("description",$tbl_isco,"code",$row_occ['cv_isco_1']); ?><br>
 <?php echo retval("description",$tbl_isco,"code",$row_occ['cv_isco_2']); ?><br>
 <?php echo retval("description",$tbl_isco,"code",$row_occ['cv_isco_3']); ?><br>
 <?php 
 }?> 
  <o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:18;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:19;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Work experience<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span>  </p>  </td>
 </tr>
 <tr style='mso-yfti-irow:20;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <!--list of work experiences -->
 <?php //list work experiences
 $query = "SELECT * FROM $tbl_wrkexp WHERE cv_id = ".$cv_id." ORDER BY wrkfrom DESC";

 $res_wrkexp = query($query);
 while($row_wrkexp = mysql_fetch_assoc($res_wrkexp)){
 ?>
 <tr style='mso-yfti-irow:21;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Dates<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><?php echo $row_wrkexp['wrkfrom'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_wrkexp['wrkto'] ?>  <o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:22;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Occupation
  or position held<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_wrkexp['position'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:23;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Main
  activities and responsibilities<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_wrkexp['activities'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:24;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Name and
  address of employer<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_wrkexp['employer'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:25;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Type of
  business or sector<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_wrkexp['sector'] ?></o:p></span></p><br /><br />  </td>  </td>
 </tr>
 <?php }?>
 <!--end list of work experiences -->
 <tr style='mso-yfti-irow:26;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:27;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Education and training<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <!--list of education entries -->
 <?php //list work experiences
 $query = "SELECT * FROM $tbl_edu WHERE cv_id = ".$cv_id." ORDER BY edufrom DESC";
 
 $res_edu = query($query);
 while($row_edu = mysql_fetch_assoc($res_edu)){
 ?>
 <tr style='mso-yfti-irow:29;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Dates<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><?php echo $row_edu['edufrom'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_edu['eduto'] ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:30;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Title of
  qualification awarded<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_edu['title'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:31;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Principal
  subjects/occupational skills covered<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_edu['skills'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:32;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Name and
  type of organisation providing education and training<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p><?php echo $row_edu['organisation'] ?></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:33;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading3><span lang=EN-GB style='mso-ansi-language:EN-GB'>Level in
  national or international classification<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><?php echo $row_edu['level'] ?><o:p></o:p></span></p>  </td>
 </tr>
 <?php }?>
 <!--end list of education entries -->
 <tr style='mso-yfti-irow:34;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:35;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Personal skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:36;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:37;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Mother tongue(s)<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVMedium-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>
 <?php //mother tongue
 $query = "SELECT foreignlanguage FROM $tbl_lang WHERE cv_id = ".$cv_id." AND mothertongue = '1' LIMIT 1";
 $res_lang = query($query);
 while($row_lang = mysql_fetch_assoc($res_lang)){?>
 	<?php echo $row_lang['foreignlanguage'];
 } ?> 
  </span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:38;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:39;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Other language(s)<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVMedium-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:40;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2><span lang=EN-GB style='mso-ansi-language:EN-GB'>Self-assessment<o:p></o:p></span></p>  </td>
  <td width=120 valign=top style='width:7.0pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span></p>  </td>
  <td colspan=5 valign=top style='width:150.25pt;border:solid black 1.0pt;
  border-right:none;mso-border-top-alt:solid black .1pt;mso-border-left-alt:
  solid black .1pt;mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading1><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Understanding<o:p></o:p></span></p>  </td>
  <td colspan=5 valign=top style='width:150.25pt;border:solid black 1.0pt;
  border-right:none;mso-border-top-alt:solid black .1pt;mso-border-left-alt:
  solid black .1pt;mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading1><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Speaking<o:p></o:p></span></p>  </td>
  <td colspan=2 valign=top style='width:75.25pt;border:solid black 1.0pt;
  mso-border-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading1><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Writing<o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:41;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeadingLevel><span lang=EN-GB style='mso-ansi-language:EN-GB'>European
  level (*)<o:p></o:p></span></p>  </td>
  <td width=120 valign=top style='width:7.0pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=2 valign=top style='width:75.1pt;border-top:none;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:
  none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading2><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Listening<o:p></o:p></span></p>  </td>
  <td colspan=3 valign=top style='width:75.15pt;border-top:none;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:
  none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading2><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Reading<o:p></o:p></span></p>  </td>
  <td colspan=2 valign=top style='width:75.05pt;border-top:none;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:
  none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading2><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Spoken interaction<o:p></o:p></span></p>  </td>
  <td colspan=3 valign=top style='width:75.2pt;border-top:none;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:
  none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading2><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Spoken production<o:p></o:p></span></p>  </td>
  <td colspan=2 valign=top style='width:75.25pt;border:solid black 1.0pt;
  border-top:none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:
  solid black .1pt;mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Heading2><span lang=EN-GB style='mso-ansi-language:
  EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <!-- list other languages -->
  <?php //mother tongue
 $query = "SELECT * FROM $tbl_lang WHERE cv_id = ".$cv_id." AND mothertongue = 0";
 $res_lang = query($query);
 while($row_lang = mysql_fetch_assoc($res_lang)){?>
 <tr style='mso-yfti-irow:42;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeadingLanguage><span lang=EN-GB style='mso-ansi-language:EN-GB'>Language<o:p></o:p></span></p>  </td>
  <td width=120 valign=top style='width:7.0pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo $row_lang['foreignlanguage'] ?></p>  </td>
  <td width=72 style='width:14.15pt;border:solid black 1.0pt;border-top:none;
  mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Code><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo $row_lang['listeninglevel'] ?></p>  </td>
  <td width=81 style='width:60.95pt;border:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Description><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>
    <o:p><?php echo lang_desc($row_lang['listeninglevel']) ?></o:p>
  </span></p>  </td>
  <td width=34 style='width:14.15pt;border:solid black 1.0pt;border-top:none;
  mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Code><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo $row_lang['readinglevel'] ?></p>  </td>
  <td colspan=2 style='width:61.0pt;border:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Description><span lang=EN-GB style='mso-ansi-language:
  EN-GB'><o:p><?php echo lang_desc($row_lang['readinglevel']) ?></o:p></span></p>  </td>
  <td width=72 style='width:14.1pt;border:solid black 1.0pt;border-top:none;
  mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Code><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo $row_lang['spokeninteractionlevel'] ?></p>  </td>
  <td width=81 style='width:60.95pt;border:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Description><span lang=EN-GB style='mso-ansi-language:
  EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo lang_desc($row_lang['spokeninteractionlevel']) ?></p>  </td>
  <td colspan=2 style='width:14.15pt;border:solid black 1.0pt;
  border-top:none;mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:
  solid black .1pt;mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Code><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo $row_lang['spokenproductionlevel'] ?></p>  </td>
  <td width=81 style='width:61.05pt;border:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Description><span lang=EN-GB style='mso-ansi-language:
  EN-GB'><o:p></o:p></span><span style="mso-ansi-language:
  EN-GB"><?php echo lang_desc($row_lang['spokenproductionlevel']) ?></span></p>  </td>
  <td width=56 style='width:14.05pt;border:solid black 1.0pt;border-top:none;
  mso-border-left-alt:solid black .1pt;mso-border-bottom-alt:solid black .1pt;
  mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Code><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span><?php echo $row_lang['writinglevel'] ?></p>  </td>
  <td width=83 style='width:61.2pt;border-top:none;border-left:none;border-bottom:
  solid black 1.0pt;border-right:solid black 1.0pt;mso-border-bottom-alt:solid black .1pt;
  mso-border-right-alt:solid black .1pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=LevelAssessment-Description><span lang=EN-GB style='mso-ansi-language:
  EN-GB'><o:p>&nbsp;</o:p>
  </span><?php echo lang_desc($row_lang['writinglevel']) ?></p>  </td>
 </tr>
 <?php }?>
 <!-- end list other languages-->
 
 <tr style='mso-yfti-irow:44;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:0cm 0cm 5.65pt 0cm'>
  <p class=LevelAssessment-Note><span lang=EN-GB style='mso-ansi-language:EN-GB'><br>
    (*)
  Common European Framework of Reference for Languages<o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:45;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:46;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Social skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><?php echo $row_edit['socialskills'] ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:47;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:48;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Organisational skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'><?php echo $row_edit['organisationalskills'] ?><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:49;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:50;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Technical skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['technicalskills'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:51;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:52;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Computer skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['computerskills'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:53;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:54;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Artistic skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['artisticskills'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:55;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:56;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Other skills and competences<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['otherskills'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:57;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:58;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading2-FirstLine style='margin-top:0cm'><span lang=EN-GB
  style='mso-ansi-language:EN-GB'>Driving licence<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['drivinglicences'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:59;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:60;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVHeading1 style='margin-top:0cm'><span lang=EN-GB style='mso-ansi-language:
  EN-GB'>Additional information<o:p></o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVNormal-FirstLine style='margin-top:0cm'><span style="mso-ansi-language:EN-GB"><?php echo $row_edit['additionalinfo'] ?></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:61;page-break-inside:avoid'>
  <td colspan=2 valign=top style='width:155.85pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-alt:solid black .1pt;
  padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
  <td colspan=13 valign=top style='width:382.75pt;padding:2.0pt 0cm 2.0pt 0cm'>
  <p class=CVSpacer><span lang=EN-GB style='mso-ansi-language:EN-GB'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=192 style='border:none'></td>
  <td width=31 style='border:none'></td>
  <td width=120 style='border:none'></td>
  <td width=72 style='border:none'></td>
  <td width=81 style='border:none'></td>
  <td width=34 style='border:none'></td>
  <td width=31 style='border:none'></td>
  <td width=50 style='border:none'></td>
  <td width=72 style='border:none'></td>
  <td width=81 style='border:none'></td>
  <td width=31 style='border:none'></td>
  <td width=79 style='border:none'></td>
  <td width=81 style='border:none'></td>
  <td width=56 style='border:none'></td>
  <td width=83 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=CVNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>

<?php include('../common/bot.php'); ?>