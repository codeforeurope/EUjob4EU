<?php 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//we are admin
if (isset($_SESSION['e_id'])){$e_id = $_SESSION['e_id'];}else{$e_id = $_GET['e_id'];}
if (isset($_SESSION['vacancy_id'])){$vacancy_id = $_SESSION['vacancy_id'];}else{$vacancy_id = $_GET['vacancy_id'];}

// vacancy datas
$query = "SELECT * FROM $tbl_vacancy where employer_id=".$e_id." and id=".$vacancy_id;
$res_v = query($query);
$row_v = mysql_fetch_assoc($res_v);

// employer datas
$query = "SELECT * FROM $tbl_employers where id=".$e_id;
$res_e = query($query);
$row_e = mysql_fetch_assoc($res_e);

?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 14">
<meta name=Originator content="Microsoft Word 14">
<link rel=File-List href="../financial_support_file/filelist.xml">
<title>YOUR FIRST EURES JOB</title>
<link rel=themeData href="../financial_support_file/themedata.thmx">
<link rel=colorSchemeMapping
href="../financial_support_file/colorschememapping.xml">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:"Times New Roman Bold";
	panose-1:0 0 0 0 0 0 0 0 0 0;
	mso-font-alt:"Times New Roman";
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:auto;
	mso-font-signature:0 0 0 0 0 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
h1
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:"Text 1";
	margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:24.0pt;
	text-align:justify;
	text-indent:-24.0pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	mso-list:l24 level1 lfo1;
	tab-stops:list 24.0pt;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	font-variant:small-caps;
	mso-font-kerning:0pt;
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
h2
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Titolo 2 Carattere";
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:44.2pt;
	text-align:justify;
	text-indent:-30.0pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:2;
	mso-list:l24 level2 lfo1;
	tab-stops:list 44.2pt;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
h3
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:96.0pt;
	text-align:justify;
	text-indent:-42.0pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:3;
	mso-list:l24 level3 lfo1;
	tab-stops:list 96.0pt;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	font-weight:normal;
	font-style:italic;
	mso-bidi-font-style:normal;}
h4
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Titolo 4 Carattere";
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:174.0pt;
	text-align:justify;
	text-indent:-48.0pt;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:4;
	mso-list:l24 level4 lfo1;
	tab-stops:list 174.0pt;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	font-weight:normal;}
p.MsoToc1, li.MsoToc1, div.MsoToc1
	{mso-style-update:auto;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-next:Normale;
	margin-top:6.0pt;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:Calibri;
	text-transform:uppercase;
	mso-ansi-language:PL;
	mso-fareast-language:EN-US;
	font-weight:bold;}
p.MsoToc2, li.MsoToc2, div.MsoToc2
	{mso-style-update:auto;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:11.0pt;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman Bold","serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-ansi-language:PL;
	mso-fareast-language:EN-US;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
p.MsoToc3, li.MsoToc3, div.MsoToc3
	{mso-style-update:auto;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:24.0pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.MsoToc4, li.MsoToc4, div.MsoToc4
	{mso-style-update:auto;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-next:Normale;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;
	font-style:italic;
	mso-bidi-font-style:normal;}
p.MsoFootnoteText, li.MsoFootnoteText, div.MsoFootnoteText
	{mso-style-name:"Testo nota a piè di pagina\, Char1\,Footnote Text Char Char Char Char\,Footnote Text Char Char\,Footnote Text Char Char Char Char Char\,Footnote Text Char Char Char Char Char Char Char Char\,Footnote Text Char Char Char\,Footnote Text Char1\,footnot";
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-link:"Testo nota a piè di pagina Carattere\, Char1 Carattere\,Footnote Text Char Char Char Char Carattere\,Footnote Text Char Char Carattere\,Footnote Text Char Char Char Char Char Carattere\,Footnote Text Char Char Char Char Char Char Char Char Carattere";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:17.85pt;
	text-align:justify;
	text-indent:-17.85pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;}
p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
	{mso-style-noshow:yes;
	mso-style-unhide:no;
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-unhide:no;
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 8.0cm right 16.0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-unhide:no;
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 8.0cm right 16.0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
span.MsoFootnoteReference
	{mso-style-name:"Rimando nota a piè di pagina\,Footnote symbol\,Footnote reference number\,Times 10 Point\,Exposant 3 Point\,EN Footnote Reference\,note TESI\, BVI fnr\,Voetnootverwijzing\,Footnote Reference Superscript\,BVI fnr\,Odwołanie przypisu";
	mso-style-noshow:yes;
	mso-style-unhide:no;
	vertical-align:super;}
span.MsoCommentReference
	{mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;}
p.MsoListBullet, li.MsoListBullet, div.MsoListBullet
	{mso-style-unhide:no;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:14.15pt;
	text-align:justify;
	text-indent:-14.15pt;
	mso-pagination:widow-orphan;
	mso-list:l27 level1 lfo2;
	tab-stops:list 14.15pt;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;}
a:link, span.MsoHyperlink
	{mso-style-unhide:no;
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-unhide:no;
	color:purple;
	text-decoration:underline;
	text-underline:single;}
p
	{mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-unhide:no;
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.Text1, li.Text1, div.Text1
	{mso-style-name:"Text 1";
	mso-style-unhide:no;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:12.0pt;
	margin-left:24.1pt;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;}
p.ZCom, li.ZCom, div.ZCom
	{mso-style-name:Z_Com;
	mso-style-unhide:no;
	mso-style-next:Z_DGName;
	margin-top:0cm;
	margin-right:4.25pt;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	text-align:justify;
	mso-pagination:none;
	text-autospace:none;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
p.ZDGName, li.ZDGName, div.ZDGName
	{mso-style-name:Z_DGName;
	mso-style-unhide:no;
	margin-top:0cm;
	margin-right:4.25pt;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	text-autospace:none;
	font-size:8.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
span.Titolo2Carattere
	{mso-style-name:"Titolo 2 Carattere";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Titolo 2";
	mso-ansi-font-size:12.0pt;
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	mso-bidi-language:AR-SA;
	font-weight:bold;
	mso-bidi-font-weight:normal;}
span.citationjournal
	{mso-style-name:"citation journal";
	mso-style-unhide:no;}
span.reference-accessdate
	{mso-style-name:reference-accessdate;
	mso-style-unhide:no;}
span.z3988
	{mso-style-name:z3988;
	mso-style-unhide:no;}
span.pdflink
	{mso-style-name:pdflink;
	mso-style-unhide:no;}
span.Titolo4Carattere
	{mso-style-name:"Titolo 4 Carattere";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Titolo 4";
	mso-ansi-font-size:12.0pt;
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	mso-bidi-language:AR-SA;}
p.Default, li.Default, div.Default
	{mso-style-name:Default;
	mso-style-unhide:no;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	mso-layout-grid-align:none;
	text-autospace:none;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	color:black;
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-GB;}
span.TestonotaapidipaginaCarattere
	{mso-style-name:"Testo nota a piè di pagina Carattere\, Char1 Carattere\,Footnote Text Char Char Char Char Carattere\,Footnote Text Char Char Carattere\,Footnote Text Char Char Char Char Char Carattere\,Footnote Text Char Char Char Char Char Char Char Char Carattere";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Testo nota a piè di pagina\, Char1\,Footnote Text Char Char Char Char\,Footnote Text Char Char\,Footnote Text Char Char Char Char Char\,Footnote Text Char Char Char Char Char Char Char Char\,Footnote Text Char Char Char\,Footnote Text Char1\,footnot";
	mso-ansi-language:EN-GB;
	mso-fareast-language:EN-US;
	mso-bidi-language:AR-SA;}
p.ListDash1, li.ListDash1, div.ListDash1
	{mso-style-name:"List Dash 1";
	mso-style-unhide:no;
	margin-top:6.0pt;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:2.0cm;
	text-align:justify;
	text-indent:-14.15pt;
	mso-pagination:widow-orphan;
	mso-list:l37 level1 lfo33;
	tab-stops:list 2.0cm;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:EN-GB;
	mso-fareast-language:DE;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("financial_support_file/header.htm") fs;
	mso-footnote-continuation-separator:url("financial_support_file/header.htm") fcs;
	mso-endnote-separator:url("financial_support_file/header.htm") es;
	mso-endnote-continuation-separator:url("financial_support_file/header.htm") ecs;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:70.85pt 70.85pt 70.85pt 70.85pt;
	mso-header-margin:35.4pt;
	mso-footer-margin:35.4pt;
	mso-title-page:yes;
	mso-even-footer:url("../financial_support_file/header.htm") ef1;
	mso-footer:url("../financial_support_file/header.htm") f1;
	mso-first-footer:url("../financial_support_file/header.htm") ff1;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 @list l0
	{mso-list-id:-2;
	mso-list-type:simple;
	mso-list-template-ids:-1659838602;}
@list l0:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:*;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:0cm;
	text-indent:0cm;}
@list l1
	{mso-list-id:88620750;
	mso-list-type:hybrid;
	mso-list-template-ids:1084030016 -959779916 -959779916 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l1:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level2
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l1:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l1:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l1:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l1:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l2
	{mso-list-id:177621496;
	mso-list-type:hybrid;
	mso-list-template-ids:-509199282 134807553 -1773219666 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:63.0pt;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l2:level2
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:95.2pt;
	mso-level-number-position:left;
	margin-left:95.2pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l2:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:135.0pt;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l2:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:171.0pt;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l2:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:207.0pt;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l2:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:243.0pt;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l2:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:279.0pt;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l2:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:315.0pt;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l2:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:351.0pt;
	mso-level-number-position:left;
	margin-left:351.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l3
	{mso-list-id:178127824;
	mso-list-type:hybrid;
	mso-list-template-ids:-251350010 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:42.55pt;
	mso-level-number-position:left;
	margin-left:42.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l3:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l3:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l3:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l3:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l3:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l3:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l3:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l3:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l4
	{mso-list-id:207618226;
	mso-list-template-ids:1710528226;}
@list l4:level1
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l4:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l4:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l4:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l4:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l4:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l4:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l4:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l4:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l5
	{mso-list-id:236400327;
	mso-list-template-ids:-893192520;}
@list l5:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:63.0pt;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l5:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:99.0pt;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l5:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:135.0pt;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l5:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:171.0pt;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l5:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:207.0pt;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l5:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:243.0pt;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l5:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:279.0pt;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l5:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:315.0pt;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l5:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:351.0pt;
	mso-level-number-position:left;
	margin-left:351.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l6
	{mso-list-id:278534953;
	mso-list-type:hybrid;
	mso-list-template-ids:803217422 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l6:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:56.75pt;
	mso-level-number-position:left;
	margin-left:56.75pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l6:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l6:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l6:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l6:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l6:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l6:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l6:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l6:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l7
	{mso-list-id:297884878;
	mso-list-template-ids:412906866;}
@list l7:level1
	{mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level2
	{mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level3
	{mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level5
	{mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level6
	{mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level8
	{mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l7:level9
	{mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l8
	{mso-list-id:382943204;
	mso-list-template-ids:1506332654;}
@list l8:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:42.55pt;
	mso-level-number-position:left;
	margin-left:42.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l8:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l8:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l8:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l8:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l8:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l8:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l8:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l8:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l9
	{mso-list-id:560285957;
	mso-list-type:hybrid;
	mso-list-template-ids:801137078 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l9:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l9:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l9:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l9:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l9:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l9:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l9:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l9:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l9:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l10
	{mso-list-id:699429543;
	mso-list-type:hybrid;
	mso-list-template-ids:-1511651734 1350850212 827643512 1609316418 -851396168 1287701340 1420459340 1223723322 6331634 2080569378;}
@list l10:level1
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level2
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level3
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level4
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level5
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level6
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level7
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level8
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l10:level9
	{mso-level-number-format:bullet;
	mso-level-text:•;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";}
@list l11
	{mso-list-id:701712385;
	mso-list-type:hybrid;
	mso-list-template-ids:2084586212 -154659948 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l11:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:37.5pt;
	mso-level-number-position:left;
	margin-left:37.5pt;
	text-indent:-19.5pt;}
@list l11:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l11:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l11:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l11:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l11:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l11:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l11:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l11:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12
	{mso-list-id:710805737;
	mso-list-type:hybrid;
	mso-list-template-ids:511053770 134807575 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l12:level1
	{mso-level-number-format:alpha-lower;
	mso-level-text:"%1\)";
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l12:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l12:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l13
	{mso-list-id:716583932;
	mso-list-template-ids:-509199282;}
@list l13:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:63.0pt;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l13:level2
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:95.2pt;
	mso-level-number-position:left;
	margin-left:95.2pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l13:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:135.0pt;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l13:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:171.0pt;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l13:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:207.0pt;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l13:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:243.0pt;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l13:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:279.0pt;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l13:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:315.0pt;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l13:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:351.0pt;
	mso-level-number-position:left;
	margin-left:351.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l14
	{mso-list-id:769542204;
	mso-list-type:hybrid;
	mso-list-template-ids:1212944344 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l14:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:42.55pt;
	mso-level-number-position:left;
	margin-left:42.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l14:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l14:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l14:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l14:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l14:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l14:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l14:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l14:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l15
	{mso-list-id:790511113;
	mso-list-type:hybrid;
	mso-list-template-ids:1244062142 -959779916 -959779916 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l15:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l15:level2
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l15:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l15:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l15:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l15:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l15:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l15:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l15:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l16
	{mso-list-id:827214526;
	mso-list-type:hybrid;
	mso-list-template-ids:1073877774 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l16:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.4pt;
	mso-level-number-position:left;
	margin-left:60.4pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l16:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:89.85pt;
	mso-level-number-position:left;
	margin-left:89.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l16:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:125.85pt;
	mso-level-number-position:left;
	margin-left:125.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l16:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:161.85pt;
	mso-level-number-position:left;
	margin-left:161.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l16:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:197.85pt;
	mso-level-number-position:left;
	margin-left:197.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l16:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:233.85pt;
	mso-level-number-position:left;
	margin-left:233.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l16:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:269.85pt;
	mso-level-number-position:left;
	margin-left:269.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l16:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:305.85pt;
	mso-level-number-position:left;
	margin-left:305.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l16:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:341.85pt;
	mso-level-number-position:left;
	margin-left:341.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l17
	{mso-list-id:849300719;
	mso-list-type:hybrid;
	mso-list-template-ids:1640548048 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l17:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l17:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l17:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l17:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l17:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l17:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l17:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l17:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l17:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l18
	{mso-list-id:892623358;
	mso-list-type:hybrid;
	mso-list-template-ids:1216395714 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l18:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.4pt;
	mso-level-number-position:left;
	margin-left:60.4pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l18:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:89.85pt;
	mso-level-number-position:left;
	margin-left:89.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l18:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:125.85pt;
	mso-level-number-position:left;
	margin-left:125.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l18:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:161.85pt;
	mso-level-number-position:left;
	margin-left:161.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l18:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:197.85pt;
	mso-level-number-position:left;
	margin-left:197.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l18:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:233.85pt;
	mso-level-number-position:left;
	margin-left:233.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l18:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:269.85pt;
	mso-level-number-position:left;
	margin-left:269.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l18:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:305.85pt;
	mso-level-number-position:left;
	margin-left:305.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l18:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:341.85pt;
	mso-level-number-position:left;
	margin-left:341.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l19
	{mso-list-id:902064079;
	mso-list-type:hybrid;
	mso-list-template-ids:1908201360 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l19:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:59.2pt;
	mso-level-number-position:left;
	margin-left:59.2pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l19:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:99.0pt;
	mso-level-number-position:left;
	margin-left:99.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l19:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:135.0pt;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l19:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:171.0pt;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l19:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:207.0pt;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l19:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:243.0pt;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l19:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:279.0pt;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l19:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:315.0pt;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l19:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:351.0pt;
	mso-level-number-position:left;
	margin-left:351.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l20
	{mso-list-id:1059942221;
	mso-list-type:hybrid;
	mso-list-template-ids:1987371316 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l20:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l20:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l20:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l20:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l20:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l20:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l20:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l20:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l20:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l21
	{mso-list-id:1167786472;
	mso-list-type:hybrid;
	mso-list-template-ids:-1288803614 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l21:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:42.55pt;
	mso-level-number-position:left;
	margin-left:42.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l21:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l21:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l21:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l21:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l21:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l21:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l21:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l21:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l22
	{mso-list-id:1227569362;
	mso-list-type:hybrid;
	mso-list-template-ids:-430567772 -56229504 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l22:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l22:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l22:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l22:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l23
	{mso-list-id:1234046723;
	mso-list-type:hybrid;
	mso-list-template-ids:710849162 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l23:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:56.75pt;
	mso-level-number-position:left;
	margin-left:56.75pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l23:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l23:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l23:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l23:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l23:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l23:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l23:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l23:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l24
	{mso-list-id:1245914710;
	mso-list-template-ids:254712824;}
@list l24:level1
	{mso-level-style-link:"Titolo 1";
	mso-level-tab-stop:24.0pt;
	mso-level-number-position:left;
	margin-left:24.0pt;
	text-indent:-24.0pt;
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;}
@list l24:level2
	{mso-level-style-link:"Titolo 2";
	mso-level-text:"%1\.%2\.";
	mso-level-tab-stop:44.2pt;
	mso-level-number-position:left;
	margin-left:44.2pt;
	text-indent:-30.0pt;
	mso-ansi-font-weight:bold;
	mso-ansi-font-style:normal;}
@list l24:level3
	{mso-level-style-link:"Titolo 3";
	mso-level-text:"%1\.%2\.%3\.";
	mso-level-tab-stop:96.0pt;
	mso-level-number-position:left;
	margin-left:96.0pt;
	text-indent:-42.0pt;
	mso-ansi-font-style:normal;}
@list l24:level4
	{mso-level-style-link:"Titolo 4";
	mso-level-text:"%1\.%2\.%3\.%4\.";
	mso-level-tab-stop:174.0pt;
	mso-level-number-position:left;
	margin-left:174.0pt;
	text-indent:-48.0pt;
	mso-ansi-font-style:italic;}
@list l24:level5
	{mso-level-number-format:alpha-lower;
	mso-level-text:"\(%5\)";
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;}
@list l24:level6
	{mso-level-number-format:roman-lower;
	mso-level-text:"\(%6\)";
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	margin-left:108.0pt;
	text-indent:-18.0pt;}
@list l24:level7
	{mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;}
@list l24:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	margin-left:144.0pt;
	text-indent:-18.0pt;}
@list l24:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;}
@list l25
	{mso-list-id:1303802781;
	mso-list-type:hybrid;
	mso-list-template-ids:1607083488 -788114844 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l25:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:37.5pt;
	mso-level-number-position:left;
	margin-left:37.5pt;
	text-indent:-19.5pt;}
@list l25:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l25:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l25:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l25:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l25:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l25:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l25:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l25:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l26
	{mso-list-id:1339842308;
	mso-list-type:hybrid;
	mso-list-template-ids:-635404730 1894938990 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l26:level1
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:-;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	margin-left:72.0pt;
	text-indent:-18.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
@list l26:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	margin-left:108.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l26:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	margin-left:144.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l26:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	margin-left:180.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l26:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	margin-left:216.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l26:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	margin-left:252.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l26:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	margin-left:288.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l26:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	margin-left:324.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l26:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:360.0pt;
	mso-level-number-position:left;
	margin-left:360.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l27
	{mso-list-id:1421675500;
	mso-list-type:simple;
	mso-list-template-ids:1926689654;}
@list l27:level1
	{mso-level-number-format:bullet;
	mso-level-style-link:"Punto elenco";
	mso-level-text:;
	mso-level-tab-stop:14.15pt;
	mso-level-number-position:left;
	margin-left:14.15pt;
	text-indent:-14.15pt;
	mso-ascii-font-family:Symbol;
	mso-hansi-font-family:Symbol;}
@list l28
	{mso-list-id:1431049841;
	mso-list-type:hybrid;
	mso-list-template-ids:1533699570 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l28:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:64.4pt;
	mso-level-number-position:left;
	margin-left:64.4pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l28:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:93.85pt;
	mso-level-number-position:left;
	margin-left:93.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l28:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:129.85pt;
	mso-level-number-position:left;
	margin-left:129.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l28:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:165.85pt;
	mso-level-number-position:left;
	margin-left:165.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l28:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:201.85pt;
	mso-level-number-position:left;
	margin-left:201.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l28:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:237.85pt;
	mso-level-number-position:left;
	margin-left:237.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l28:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:273.85pt;
	mso-level-number-position:left;
	margin-left:273.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l28:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:309.85pt;
	mso-level-number-position:left;
	margin-left:309.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l28:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:345.85pt;
	mso-level-number-position:left;
	margin-left:345.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l29
	{mso-list-id:1436287794;
	mso-list-type:hybrid;
	mso-list-template-ids:1710528226 134807555 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l29:level1
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l29:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l29:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l29:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l29:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l29:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l29:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l29:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l29:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l30
	{mso-list-id:1439716383;
	mso-list-type:hybrid;
	mso-list-template-ids:-614812230 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l30:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l30:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l30:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l30:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l30:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l30:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l30:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l30:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l30:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l31
	{mso-list-id:1443959072;
	mso-list-type:hybrid;
	mso-list-template-ids:1506332654 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l31:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:64.4pt;
	mso-level-number-position:left;
	margin-left:64.4pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l31:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:93.85pt;
	mso-level-number-position:left;
	margin-left:93.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l31:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:129.85pt;
	mso-level-number-position:left;
	margin-left:129.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l31:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:165.85pt;
	mso-level-number-position:left;
	margin-left:165.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l31:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:201.85pt;
	mso-level-number-position:left;
	margin-left:201.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l31:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:237.85pt;
	mso-level-number-position:left;
	margin-left:237.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l31:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:273.85pt;
	mso-level-number-position:left;
	margin-left:273.85pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l31:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:309.85pt;
	mso-level-number-position:left;
	margin-left:309.85pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l31:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:345.85pt;
	mso-level-number-position:left;
	margin-left:345.85pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l32
	{mso-list-id:1476138287;
	mso-list-type:hybrid;
	mso-list-template-ids:-691365900 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l32:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l32:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l32:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l32:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l32:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l32:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l32:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l32:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l32:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l33
	{mso-list-id:1521970308;
	mso-list-type:hybrid;
	mso-list-template-ids:-1577949982 -340997280 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l33:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:37.5pt;
	mso-level-number-position:left;
	margin-left:37.5pt;
	text-indent:-19.5pt;}
@list l33:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l33:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l33:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l33:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l33:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l33:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l33:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l33:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l34
	{mso-list-id:1562980236;
	mso-list-type:hybrid;
	mso-list-template-ids:-1439811078 134807553 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l34:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l34:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l34:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l34:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l34:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l34:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l34:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l34:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l34:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l35
	{mso-list-id:1583105891;
	mso-list-type:hybrid;
	mso-list-template-ids:-346633070 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l35:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l35:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l35:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l35:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l35:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l35:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l35:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l35:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l35:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l36
	{mso-list-id:1605573588;
	mso-list-type:hybrid;
	mso-list-template-ids:-1408983684 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l36:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:60.55pt;
	mso-level-number-position:left;
	margin-left:60.55pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l36:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l36:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l36:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l36:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l36:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l36:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l36:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l36:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l37
	{mso-list-id:1655178284;
	mso-list-type:simple;
	mso-list-template-ids:-856552442;
	mso-list-name:Heading;}
@list l37:level1
	{mso-level-number-format:bullet;
	mso-level-reset-level:level1;
	mso-level-style-link:"List Dash 1";
	mso-level-text:–;
	mso-level-tab-stop:2.0cm;
	mso-level-number-position:left;
	margin-left:2.0cm;
	text-indent:-14.15pt;
	mso-ascii-font-family:"Times New Roman";
	mso-hansi-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
@list l38
	{mso-list-id:1679890586;
	mso-list-template-ids:-509199282;}
@list l38:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:63.0pt;
	mso-level-number-position:left;
	margin-left:63.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l38:level2
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:95.2pt;
	mso-level-number-position:left;
	margin-left:95.2pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l38:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:135.0pt;
	mso-level-number-position:left;
	margin-left:135.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l38:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:171.0pt;
	mso-level-number-position:left;
	margin-left:171.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l38:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:207.0pt;
	mso-level-number-position:left;
	margin-left:207.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l38:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:243.0pt;
	mso-level-number-position:left;
	margin-left:243.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l38:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:279.0pt;
	mso-level-number-position:left;
	margin-left:279.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l38:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:315.0pt;
	mso-level-number-position:left;
	margin-left:315.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l38:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:351.0pt;
	mso-level-number-position:left;
	margin-left:351.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l39
	{mso-list-id:1688945144;
	mso-list-type:hybrid;
	mso-list-template-ids:1381373838 -1 67895297 -47283022 -1 -1 -1 -1 -1 -1;}
@list l39:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l39:level2
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l39:level3
	{mso-level-start-at:0;
	mso-level-number-format:bullet;
	mso-level-text:—;
	mso-level-tab-stop:113.25pt;
	mso-level-number-position:left;
	margin-left:113.25pt;
	text-indent:-23.25pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
@list l39:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l39:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l39:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l39:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l39:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l39:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l40
	{mso-list-id:1706372134;
	mso-list-type:hybrid;
	mso-list-template-ids:-101018516 1335499352 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l40:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l40:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l40:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l40:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l41
	{mso-list-id:1868760415;
	mso-list-type:hybrid;
	mso-list-template-ids:-2091064896 -1773219666 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l41:level1
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:56.75pt;
	mso-level-number-position:left;
	margin-left:56.75pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l41:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:86.2pt;
	mso-level-number-position:left;
	margin-left:86.2pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l41:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:122.2pt;
	mso-level-number-position:left;
	margin-left:122.2pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l41:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:158.2pt;
	mso-level-number-position:left;
	margin-left:158.2pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l41:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:194.2pt;
	mso-level-number-position:left;
	margin-left:194.2pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l41:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:230.2pt;
	mso-level-number-position:left;
	margin-left:230.2pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l41:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:266.2pt;
	mso-level-number-position:left;
	margin-left:266.2pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l41:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:302.2pt;
	mso-level-number-position:left;
	margin-left:302.2pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l41:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:338.2pt;
	mso-level-number-position:left;
	margin-left:338.2pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l42
	{mso-list-id:1901015177;
	mso-list-type:hybrid;
	mso-list-template-ids:2125741164 134807555 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l42:level1
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l42:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l42:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l42:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l42:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l42:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l42:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l42:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l42:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l43
	{mso-list-id:1933779225;
	mso-list-type:hybrid;
	mso-list-template-ids:1305898496 311694948 134807577 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l43:level1
	{mso-level-text:"%1\)";
	mso-level-tab-stop:35.85pt;
	mso-level-number-position:left;
	margin-left:35.85pt;
	text-indent:-18.0pt;}
@list l43:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:71.85pt;
	mso-level-number-position:left;
	margin-left:71.85pt;
	text-indent:-18.0pt;}
@list l43:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:107.85pt;
	mso-level-number-position:right;
	margin-left:107.85pt;
	text-indent:-9.0pt;}
@list l43:level4
	{mso-level-tab-stop:143.85pt;
	mso-level-number-position:left;
	margin-left:143.85pt;
	text-indent:-18.0pt;}
@list l43:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:179.85pt;
	mso-level-number-position:left;
	margin-left:179.85pt;
	text-indent:-18.0pt;}
@list l43:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:215.85pt;
	mso-level-number-position:right;
	margin-left:215.85pt;
	text-indent:-9.0pt;}
@list l43:level7
	{mso-level-tab-stop:251.85pt;
	mso-level-number-position:left;
	margin-left:251.85pt;
	text-indent:-18.0pt;}
@list l43:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:287.85pt;
	mso-level-number-position:left;
	margin-left:287.85pt;
	text-indent:-18.0pt;}
@list l43:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:323.85pt;
	mso-level-number-position:right;
	margin-left:323.85pt;
	text-indent:-9.0pt;}
@list l44
	{mso-list-id:1944611550;
	mso-list-type:hybrid;
	mso-list-template-ids:-1117506636 134807567 -1773219666 134807579 134807567 134807577 134807579 134807567 134807577 134807579;}
@list l44:level1
	{mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l44:level2
	{mso-level-number-format:bullet;
	mso-level-text:–;
	mso-level-tab-stop:68.2pt;
	mso-level-number-position:left;
	margin-left:68.2pt;
	text-indent:-14.2pt;
	font-family:"Times New Roman","serif";}
@list l44:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l44:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l44:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l44:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l44:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l44:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l44:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l45
	{mso-list-id:1978756924;
	mso-list-type:hybrid;
	mso-list-template-ids:-735540282 1295960302 135659545 135659547 135659535 135659545 135659547 135659535 135659545 135659547;}
@list l45:level1
	{mso-level-text:"\(%1\)";
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l45:level4
	{mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l45:level7
	{mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l45:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l46
	{mso-list-id:2036687396;
	mso-list-type:hybrid;
	mso-list-template-ids:-1965101496 135659521 135659523 135659525 135659521 135659523 135659525 135659521 135659523 135659525;}
@list l46:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l46:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l46:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l46:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l46:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l46:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l46:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l46:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l46:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l47
	{mso-list-id:2067876499;
	mso-list-type:hybrid;
	mso-list-template-ids:-2142632738 -959779916 134807555 134807557 134807553 134807555 134807557 134807553 134807555 134807557;}
@list l47:level1
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:36.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l47:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:72.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l47:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:108.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l47:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:144.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l47:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:180.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l47:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:216.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l47:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:252.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l47:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:288.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l47:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:324.0pt;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l48
	{mso-list-id:2137136369;
	mso-list-template-ids:2125741164;}
@list l48:level1
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:54.0pt;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l48:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:90.0pt;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l48:level3
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:126.0pt;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l48:level4
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:162.0pt;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l48:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:198.0pt;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l48:level6
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:234.0pt;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l48:level7
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:270.0pt;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l48:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:306.0pt;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l48:level9
	{mso-level-number-format:bullet;
	mso-level-text:;
	mso-level-tab-stop:342.0pt;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l0:level1 lfo16
	{mso-level-numbering:continue;
	mso-level-text:;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	mso-level-legacy:yes;
	mso-level-legacy-indent:14.2pt;
	mso-level-legacy-space:0cm;
	margin-left:0cm;
	text-indent:0cm;
	font-family:Symbol;}
ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
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
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
table.MsoTableGrid
	{mso-style-name:"Griglia tabella";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin-top:0cm;
	mso-para-margin-right:0cm;
	mso-para-margin-bottom:12.0pt;
	mso-para-margin-left:0cm;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=IT link=blue vlink=purple style='tab-interval:36.0pt;'>

<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=EN-GB style='color:black'>YOUR FIRST EURES JOB<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'>Recruitment of young European mobile workers</span><span
lang=EN-GB style='font-size:13.0pt;mso-bidi-font-size:12.0pt;color:black'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><i style='mso-bidi-font-style:
normal'><span lang=EN-GB style='color:black'>FINANCIAL SUPPORT FOR A<o:p></o:p></span></i></p>

<p class=MsoNormal align=center style='text-align:center'><i style='mso-bidi-font-style:
normal'><span lang=EN-GB style='color:black'><span
style='mso-spacerun:yes'> </span>MOBILE WORKER(S)' INTEGRATION PROGRAMME<o:p></o:p></span></i></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'><o:p><br>
  <br>
</o:p>
</span></p>
<div align="right">
<?php /*?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">Upon compilation - while the entered data is being processed - you <em><strong>must</strong></em> print, sign and send the present document to:</td>
    </tr>
  <tr>
    <td width="66">&nbsp;</td>
    <td width="646">&nbsp;</td>
    <td width="230">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Provincia di Roma</strong> - <strong><em>Your First EURES Job</em></strong> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Via Raimondo Scintu
  106<br />
00173 - Roma (Italy) </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>by Fax: +39 06 6766 8475</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> by email: eures.employer@provincia.roma.it<br />
    (<em>please scan the signed document</em>)</td>
    <td>&nbsp;</td>
  </tr>
   
</table><?php */?>
</div>


    <p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'>
      <o:p>        &nbsp;</o:p>
    </span></p>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Ref n°: <strong><?php echo substr(str_replace("-","",$row_v['date_created']),0,8).$row_v['id']; ?></strong><span style='mso-tab-count:6'></span>
    <o:p></o:p></span></p>

<p class=MsoNormal style='tab-stops:396.0pt'><span lang=EN-GB style='color:
black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Business name:
<strong><?php echo $row_e['companyname'] ?></strong><o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Address of the head
office: <strong><?php echo $row_e['address'] ?></strong><o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>City: <strong><?php echo $row_e['city'] ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country: <strong><?php echo retval("name",$tbl_eu_member,"code",$row_e['country']); ?></strong>
<o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Phone n.:
    <strong><?php echo $row_e['phone1'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: <strong><?php echo $row_e['email'] ?></strong>
  <o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>VAT / Registration number:
    <strong><?php echo $row_e['pivacf'] ?></strong>
  <o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Legal representative:
    <strong><?php echo $row_e['legal_representative'] ?></strong>
  <o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Address of the legal
representative: <strong><?php echo $row_e['legal_address'] ?></strong>
<o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Name and position of
the contact person: <strong><?php echo $row_e['referent'].", ".$row_e['position']; ?></strong>
<o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Email address: <strong><?php echo $row_e['email_r'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone n.: <strong><?php echo $row_e['phone2'] ?></strong>
  <o:p></o:p></span></p>
<br>
Profile requested:
<strong>
<?php  	$full_profile = "<br />".trim(retval("description",$tbl_isco,"code",$row_v['isco_1']));
				$full_profile .= "<br />".trim(retval("description",$tbl_isco,"code",$row_v['isco_2']));
				$full_profile .= "<br />".trim(retval("description",$tbl_isco,"code",$row_v['isco_3']));
				
				echo $full_profile;
 ?>
 </strong>
<br>
<br>
Job title:<br>

<strong><?php echo $row_v['job_title'] ?></strong><br><br>

Job description: <br>
<strong><?php echo $row_v['job_description'] ?></strong><br><br>
<br>



<p class=MsoNormal><span lang=EN-GB style='color:black'>INTEGRATION PROGRAMME -
List of training and support activities
</span><br>
<br>
</p>
Type of training: <strong>
<?php if(intval($row_v['induction_training'])==1){echo "comprehensive induction training";}else{echo "basic induction training";} ?>
</strong><br><br>


<?php if ($row_v['language_training']!=""){?>
Language training:
	<strong> 
	<?php if(intval($row_v['language_training'])==1){echo "group training";}else{echo "individual training";} ?>
    </strong><br>
<?php }?>

<?php if ($row_v['technical_training']!=""){?>
Technical training:
<strong><?php 
	if(intval($row_v['technical_training'])==1){echo "group training";}else{echo "individual training";} 
?></strong><br>
<?php }?>

<?php if ($row_v['business_visits']!=""){?>
Business visits: <strong>
<?php 
	if(intval($row_v['business_visits'])==1){echo "group training";}else{echo "individual training";} 
?>
</strong><br>
<?php }?>

<?php if ($row_v['mentoring_support']!=""){?>
Mentoring support: <strong>
<?php 
	if(intval($row_v['mentoring_support'])==1){echo "group training";}else{echo "individual training";} 
?>
</strong><br>
<?php }?>

<?php if ($row_v['other_1']!=""){?>
Other: <strong>
<?php echo $row_v['other_1'] ?>
</strong> <br>
<?php }?>

         


<p>
Administrative support and settlement facilitation (<i
style='mso-bidi-font-style:normal'>both for basic and comprehensive induction
trainings</i>)<o:p></o:p></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'>It can include one or more of the following support items (<i
style='mso-bidi-font-style:normal'>residence registration, work permit, relocation,
assistance to find housing, assistance to obtain recognition of qualifications,
children's schooling, etc)</i><span style='mso-tab-count:1'> </span><span
style='mso-spacerun:yes'>                  </span><i style='mso-bidi-font-style:
normal'><o:p></o:p></i></span></p>

<p class=MsoNormal><i style='mso-bidi-font-style:normal'>(<span class=GramE>as specified</span></i><span
lang=EN-GB style='font-size:10.0pt;color:black'>)</span></p>
<p class=MsoNormal><strong><?php echo $row_v['other_2'] ?></strong></p>
<p class=MsoNormal>&nbsp;</p>
<p class=MsoNormal><span lang=EN-GB style='color:black'>Brief description of
the integration programme activities, notably training content:<o:p></o:p></span></p>

<p class=MsoNormal><strong><?php echo $row_v['activities'] ?></strong></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Provisional duration of
the training module(s) <i style='mso-bidi-font-style:normal'>(training hours or
days per thematic module):</i><o:p></o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Job <span class=GramE>vacancy(</span>ies)
concerned: 
    <o:p></o:p></span><strong><?php echo $row_v['n_vacancies'] ?></strong></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Number of recruited
workers:<o:p></o:p></span><strong>
<?php if(intval($row_e['workforce'])==1){echo "more than 250";}else{echo "less than 250";} ?>
</strong></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Work starting date: 
  <o:p></o:p></span><strong><?php echo substr($row_v['start_date'],8,2)."-".substr($row_v['start_date'],5,2)."-".substr($row_v['start_date'],0,4); ?></strong></p>


<p class=MsoNormal><span lang=EN-GB style='color:black'>Form of employment: 
  <o:p></o:p></span><strong><?php 
  if (intval($row_v['employment_form'])==1){?>full time<?php }else{?>part time<?php }?>
  </strong></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Type of contract: 
  <o:p></o:p></span><strong><?php 
  if (intval($row_v['employment_contract'])==0){?>fixed term<?php }else{?>permanent<?php }?>
  </strong> <em>(at least 6 months)</em></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'>Gross monthly wage (Euro): 
  <o:p></o:p></span><strong><?php 
  echo $row_v['monthly_wage'];?>
  </strong></p><br>


<p class=MsoNormal><span lang=EN-GB style='color:black'>Location of the
induction training(s):<o:p></o:p></span></p>

<p class=MsoNormal><strong><?php echo $row_v['training_location'] ?></strong></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-GB style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'>I<span style='mso-spacerun:yes'> </span>the undersigned
legal representative
    <input name="" type="checkbox" value="">&nbsp;&nbsp;&nbsp;  
executive officer<span style='mso-spacerun:yes'><input type="checkbox" name="checkbox" id="checkbox"> 
</span><i style='mso-bidi-font-style:normal'>(please tick the appropriate
option)</i> of the company <strong><?php echo $row_e['companyname'] ?></strong> confirm that the newly
recruited mobile worker(s) under project reference <strong><?php echo substr(str_replace("-","",$row_v['date_created']),0,8).$row_v['id']; ?></strong> above will benefit
from a <?php if(intval($row_v['induction_training'])==1){echo "comprehensive induction training";}else{echo "basic induction training";} ?> as from the first month of work.
<o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'>I am also aware that <span class=GramE><i style='mso-bidi-font-style:
normal'>Your</i></span><i style='mso-bidi-font-style:normal'> first EURES job</i>
financial support for the costs of the integration programme will be released
after the worker(s) has/have commenced work. I have been informed of both the
procedure and the supporting documents for claiming funding. <o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'>Name of legal representative / executive officer: <strong><?php echo $row_e['legal_representative'] ?></strong><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><span style='mso-spacerun:yes'>      </span>Date<span
style='mso-tab-count:8'>                                                                                              </span>Signature<o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
style='color:black'>___/___/___<span
style='mso-spacerun:yes'>                                </span><span
style='mso-spacerun:yes'>                           </span>……………………………………..…….</span></p>

</div>

</body>

</html>
