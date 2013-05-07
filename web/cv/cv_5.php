<?php include('../common/comuni_inc.php'); ?>
<?php include('../common/cv_access_control.php'); ?>
<?php 

//education level
if (isset($_POST['submitcv4'])){
	$query="UPDATE $tbl_cv SET highesteducation=".intval($_POST['cv4_highesteducation'])." WHERE id=".$_SESSION['cv_id'];
	insquery($query);
}

//erase language
if ($_GET['task']=="del_lang"){
	$query = "DELETE FROM $tbl_lang WHERE id = ".$_GET['lang_id'];
	insquery($query);
}

// native language
if (isset($_POST['save_mt']) && $_POST['cv5_motherlanguage']!=""){

	$query = "INSERT INTO `$tbl_lang` (`id`, `cv_id`, `foreignlanguage`, `mothertongue`) VALUES ('', ".$_SESSION['cv_id'].",  '".$_POST['cv5_motherlanguage']."', '1')";

	$querychk = "SELECT * FROM $tbl_lang WHERE cv_id = ".$_SESSION['cv_id']." AND foreignlanguage = '".$_POST['cv5_motherlanguage']."'";
	//echo $querychk;exit;
	$res_dup = query($querychk);
	$dup = mysql_num_rows($res_dup);

	if ($dup==0){insquery($query);}

}

// other languages
if (isset($_POST['save']) && $_POST['cv5_foreignlanguage']!=""){

	$query = "INSERT INTO `$tbl_lang` (`id`, `cv_id`, `foreignlanguage`, `listeninglevel`, `readinglevel`, `spokeninteractionlevel`, `spokenproductionlevel`, `writinglevel`) VALUES ('', ".$_SESSION['cv_id'].",  '".$_POST['cv5_foreignlanguage']."', '".$_POST['cv5_listeninglevel']."', '".$_POST['cv5_readinglevel']."', '".$_POST['cv5_spokeninteractionlevel']."', '".$_POST['cv5_spokenproductionlevel']."', '".$_POST['cv5_writinglevel']."')";

	$querychk = "SELECT * FROM $tbl_lang WHERE cv_id = ".$_SESSION['cv_id']." AND foreignlanguage = '".$_POST['cv5_foreignlanguage']."'";
	//echo $querychk;exit;
	$res_dup = query($querychk);
	$dup = mysql_num_rows($res_dup);

	if ($dup==0){insquery($query);}

}

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
    <td valign="top" class="application"><link rel="stylesheet" type="text/css" href="css/application.css" />
		<?php include("../includes/sections.php"); ?>
		<h1>&nbsp;</h1>
			<h1>LANGUAGE(S)</h1>
              <p> Describe your language skills as follows: 
              <ol>
              <li><b>Mother tongue(s):</b> enter your mother tongue(s). </li>
            <li><b>Other language(s):</b> for every language you want to describe, enter the language's name, fill in the level fields and click on &quot;Save&quot;.<br />
                <br />
                View the detail for each entry by clicking on the &quot;Wiew/Print&quot; button below.</li>
              </ol>
               You may use the icons <img src="../img/icons/bulb_on.png" alt="Example" width="24" height="24" border="0" align="absmiddle" id="IMAGE_" longdesc="./" />(<em>Example</em>) and <img src="../img/icons/info_on.png" alt="Help" width="24" height="24" border="0" align="absmiddle" id="IMAGE_2" longdesc="./" />(<em>Help</em>) below for instructions.</p>
  <script type="text/javascript" src="/instruments/js/autocomplete.js"></script>
        <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/lib/prototype.js"></script>
        <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/src/scriptaculous.js"></script>
        <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/src/controls.js"></script>
        <script type="text/javascript" src="/instruments/js/isoMLang.jsp"></script>
        <script type="text/javascript">
function validateOtherTongueInternal(form,fieldA,errorMsg) {
	var langcodefield=form[fieldA];
  if ( !langcodefield ) {
		alert(errorMsg);
  	return false;
  }
	var langcode= trim( langcodefield.value );
	if ( langcode == "" ) { 
		alert(errorMsg);
		return false;
	}
	return true;
}
function validateOtherTongue(form) {
	return validateOtherTongueInternal(form,'step5.foreignLanguage.languageCode','Please select a language');
}
function init() {
  var mlang = new instore.Autocompleter();
  mlang.init('mlang', mLanguageMap);
  mlang.reversSyncFields();
  
}
//Event.observe(window, 'load', init);
      </script>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="langform" id="langform">
		  <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Language(s) - <?php echo $_SESSION['cv_name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="30%" class="cv_left"><label for="mlang">Enter mother tongue(s)</label></td>
                <td width="70%" class="cv_right"><div id="floatleft">
                    <input type="text" name="cv5_motherlanguage" id="cv5_motherlanguage" size="40" />
                  </div>
                    <div id="mlang_hint" class="hint">&nbsp;</div>
                  <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_200" alt="Example" onclick="showTip(200,'example')" onkeypress="showTip(200,'example')" /> <img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_100" alt="Help" onclick="showTip(100,'help')" onkeypress="showTip(100,'help')" /> </div>
                  </td>
              </tr>
              <tr>
                <td class="cv_left">&nbsp;</td>
                <td class="cv_leftline"><input type="submit" value="Save" name="save_mt" title="Save" onclick="" /></td>
              </tr>
              <tr id="TIP_200" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Specify mother tongue(s), e.g.:
                  <blockquote>English</blockquote></td>
              </tr>
              <tr id="TIP_100" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>NB:</b><br />
                  If you grew up with more than one language and feel you are equally proficient in all of them, list them all as mother tongues. </td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title"><div style="float:left;"> <b>Your mother language(s)</b> </div></td>
              </tr>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_list">
				<ul>
				<?php //languages
				$query = "SELECT * FROM $tbl_lang WHERE cv_id = ".$_SESSION['cv_id']." AND mothertongue = '1'";
				$res_mt = query($query);
				while ($row_mt = mysql_fetch_assoc($res_mt)){?>
					<li><?php echo $row_mt['foreignlanguage'] ?>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?lang_id=<?php echo $row_mt['id'] ?>&task=del_lang"><img src="../img/icons/delete.png" alt="Delete" width="24" height="24" border="0" align="absmiddle" /></a></li>
				<?php 
				}?>
				</ul> 				</td>
              </tr>
              
              <tr id="TIP_100">
                <td colspan="2" class="cv_leftline">&nbsp;                                 </td>
              </tr>
            </tbody>
          </table>
          <br />
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Other language(s)   -   Self-assessment">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Other language(s)   -   Self-assessment</td>
              </tr>
            </thead>
            <tbody>
              <script type="text/javascript" src="/instruments/js/autocomplete.js"></script>
              <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/lib/prototype.js"></script>
              <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/src/scriptaculous.js"></script>
              <script type="text/javascript" src="/instruments/js/scriptaculous-js-1.7.0/src/controls.js"></script>
              <script type="text/javascript" src="/instruments/js/isoLang.jsp"></script>
              <script type="text/javascript">
function setLevel(name, value) {
  var options = document.cvform['step5.foreignLanguage.' + name + 'Level'].options;
  for ( var i = 0; i<options.length; i++ ) 
    options[i].selected = (options[i].value == value);
}



function init2() {
  var languageCode = new instore.Autocompleter();
  languageCode.init('languageCode', languageMap);
  languageCode.reversSyncFields();
  
}

//Event.observe(window, 'load', init2);
      </script>
              <tr valign="top">
                <td class="cv_left">Enter a language</td>
                <td class="cv_right"><div class="field">
                    <input type="text" name="cv5_foreignlanguage" size="40" value="" id="cv5_foreignlanguage" />
                  </div>
                    </td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><font color="#000000">Understanding</font></td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="listeningLevel">Listening</label></td>
                <td class="cv_right"><div id="floatleft">
                    <select name="cv5_listeninglevel" onchange="this.form.cv5_readinglevel.focus();" id="cv5_listeninglevel">
                      <option value="" selected="selected"></option>
                      <option value="a1">Basic User (A1)</option>
                      <option value="a2">Basic User (A2)</option>
                      <option value="b1">Independent user (B1)</option>
                      <option value="b2">Independent user (B2)</option>
                      <option value="c1">Proficient user (C1)</option>
                      <option value="c2">Proficient user (C2)</option>
                    </select>
                  </div>
                    <div id="floatright"><img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_101" alt="Help" onclick="showTip(101,'help')" onkeypress="showTip(101,'help')" /> </div></td>
              </tr>
              <tr id="TIP_101" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>Understanding</b>
                    <blockquote>Listening </blockquote>
                  <ul>
                      <li><a onclick="setLevel('listening','a1')" href="#">A1</a>: I can understand familiar words and very basic phrases concerning myself, my family and immediate surroundings when people speak slowly and clearly. </li>
                    <li><a onclick="setLevel('listening','a2')" href="#">A2</a>: I can understand phrases and the highest frequency vocabulary related to areas of most immediate personal relevance (e.g. very basic personal and family information, shopping, local area, employment). I can catch the main points in short, clear, simple messages and announcements. </li>
                    <li><a onclick="setLevel('listening','b1')" href="#">B1</a>: I can understand the main points of clear standard speech on familiar matters regularly encountered in work, school, leisure, etc. I can understand the main points of many radio or TV programmes on current affairs or topics of personal or professional interest when the delivery is relatively slow and clear. </li>
                    <li><a onclick="setLevel('listening','b2')" href="#">B2</a>: I can understand extended speech and lectures and follow even complex lines of argument provided the topic is reasonably familiar. I can understand most TV news and current affairs programmes. I can understand the majority of films in standard dialect. </li>
                    <li><a onclick="setLevel('listening','c1')" href="#">C1</a>: I can understand extended speech even when it is not clearly structured and when relationships are only implied and not signalled explicitly. I can understand television programmes and films without too much effort. </li>
                    <li><a onclick="setLevel('listening','c2')" href="#">C2</a>: I have no difficulty in understanding any kind of spoken language, whether live or broadcast, even when delivered at fast native speed, provided I have some time to get familiar with the accent. </li>
                  </ul></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="readingLevel">Reading</label></td>
                <td class="cv_right"><div id="floatleft">
                    <select name="cv5_readinglevel" onchange="this.form.cv5_spokeninteractionlevel.focus();" id="cv5_readinglevel">
                      <option value="" selected="selected"></option>
                      <option value="a1">Basic User (A1)</option>
                      <option value="a2">Basic User (A2)</option>
                      <option value="b1">Independent user (B1)</option>
                      <option value="b2">Independent user (B2)</option>
                      <option value="c1">Proficient user (C1)</option>
                      <option value="c2">Proficient user (C2)</option>
                    </select>
                  </div>
                    <div id="floatright"><img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_102" alt="Help" onclick="showTip(102,'help')" onkeypress="showTip(102,'help')" /> </div></td>
              </tr>
              <tr id="TIP_102" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>Understanding</b>
                    <blockquote>Reading </blockquote>
                  <ul>
                      <li><a href="#" onclick="setLevel('reading','a1')">A1</a>: I can understand familiar names, words and very simple sentences, for example on notices and posters or in catalogues. </li>
                    <li><a href="#" onclick="setLevel('reading','a2')">A2</a>: I can read very short, simple texts. I can find specific, predictable information in simple everyday material such as advertisements, prospectuses, menus and timetables and I can understand short simple personal letters. </li>
                    <li><a href="#" onclick="setLevel('reading','b1')">B1</a>: I can understand texts that consist mainly of high frequency everyday or job-related language. I can understand the description of events, feelings and wishes in personal letters. </li>
                    <li><a href="#" onclick="setLevel('reading','b2')">B2</a>: I can read articles and reports concerned with contemporary problems in which the writers adopt particular attitudes or viewpoints. I can understand contemporary literary prose. </li>
                    <li><a href="#" onclick="setLevel('reading','c1')">C1</a>: I can understand long and complex factual and literary texts, appreciating distinctions of style. I can understand specialised articles and longer technical instructions, even when they do not relate to my field. </li>
                    <li><a href="#" onclick="setLevel('reading','c2')">C2</a>: I can read with ease virtually all forms of the written language, including abstract, structurally or linguistically complex texts such as manuals, specialised articles and literary works. </li>
                  </ul></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><font color="#000000">Speaking</font></td>
                <td class="cv_right">&nbsp;</td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="spokenInteractionLevel">Spoken interaction</label></td>
                <td class="cv_right"><div id="floatleft">
                  <select name="cv5_spokeninteractionlevel" onchange="this.form.cv5_spokenproductionlevel.focus();" id="cv5_spokeninteractionlevel">
                    <option value="" selected="selected"></option>
                    <option value="a1">Basic User (A1)</option>
                    <option value="a2">Basic User (A2)</option>
                    <option value="b1">Independent user (B1)</option>
                    <option value="b2">Independent user (B2)</option>
                    <option value="c1">Proficient user (C1)</option>
                    <option value="c2">Proficient user (C2)</option>
                  </select>
                </div>
                    <div id="floatright"><img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_103" alt="Help" onclick="showTip(103,'help')" onkeypress="showTip(103,'help')" /> </div></td>
              </tr>
              <tr id="TIP_103" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>Speaking</b>
                    <blockquote>Spoken interaction </blockquote>
                  <ul>
                      <li><a onclick="setLevel('spokenInteraction','a1')" href="#">A1</a>: I can interact in a simple way provided the other person is prepared to repeat or rephrase things at a slower rate of speech and help me formulate what I'm trying to say. I can ask and answer simple questions in areas of immediate need or on very familiar topics. </li>
                    <li><a onclick="setLevel('spokenInteraction','a2')" href="#">A2</a>: I can communicate in simple and routine tasks requiring a simple and direct exchange of information on familiar topics and activities. I can handle very short social exchanges, even though I can't usually understand enough to keep the conversation going myself. </li>
                    <li><a onclick="setLevel('spokenInteraction','b1')" href="#">B1</a>: I can deal with most situations likely to arise whilst travelling in an area where the language is spoken. I can enter unprepared into conversation on topics that are familiar, of personal interest or pertinent to everyday life (e.g. family, hobbies, work, travel and current events). </li>
                    <li><a onclick="setLevel('spokenInteraction','b2')" href="#">B2</a>: I can interact with a degree of fluency and spontaneity that makes regular interaction with native speakers quite possible. I can take an active part in discussion in familiar contexts, accounting for and sustaining my views. </li>
                    <li><a onclick="setLevel('spokenInteraction','c1')" href="#">C1</a>: I can express myself fluently and spontaneously without much obvious searching for expressions. I can use language flexibly and effectively for social and professional purposes. I can formulate ideas and opinions with precision and relate my contribution skilfully to those of other speakers. </li>
                    <li><a onclick="setLevel('spokenInteraction','c2')" href="#">C2</a>: I can take part effortlessly in any conversation or discussion and have a good familiarity with idiomatic expressions and colloquialisms. I can express myself fluently and convey finer shades of meaning precisely. If I do have a problem I can backtrack and restructure around the difficulty so smoothly that other people are hardly aware of it. </li>
                  </ul></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><label for="spokenProductionLevel">Spoken production</label></td>
                <td class="cv_right"><div id="floatleft">
                    <select name="cv5_spokenproductionlevel" onchange="this.form.cv5_writinglevel.focus();" id="cv5_spokenproductionlevel">
                      <option value="" selected="selected"></option>
                      <option value="a1">Basic User (A1)</option>
                      <option value="a2">Basic User (A2)</option>
                      <option value="b1">Independent user (B1)</option>
                      <option value="b2">Independent user (B2)</option>
                      <option value="c1">Proficient user (C1)</option>
                      <option value="c2">Proficient user (C2)</option>
                    </select>
                  </div>
                    <div id="floatright"><img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_104" alt="Help" onclick="showTip(104,'help')" onkeypress="showTip(104,'help')" /> </div></td>
              </tr>
              <tr id="TIP_104" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>Speaking</b>
                    <blockquote>Spoken production </blockquote>
                  <ul>
                      <li><a onclick="setLevel('spokenProduction','a1')" href="#">A1</a>: I can use simple phrases and sentences to describe where I live and people I know. </li>
                    <li> <a onclick="setLevel('spokenProduction','a2')" href="#">A2</a>: I can use a series of phrases and sentences to describe, in simple terms, my family and other people, living conditions, my educational background and my present or most recent job. </li>
                    <li><a onclick="setLevel('spokenProduction','b1')" href="#">B1</a>: I can connect phrases in a simple way in order to describe experiences and events, my dreams, hopes and ambitions. I can briefly give reasons and explanations for opinions and plans. I can narrate a story or relate the plot of a book or film and describe my reactions. </li>
                    <li><a onclick="setLevel('spokenProduction','b2')" href="#">B2</a>: I can present clear, detailed descriptions on a wide range of subjects related to my field of interest. I can explain a viewpoint on a topical issue giving the advantages and disadvantages of various options. </li>
                    <li><a onclick="setLevel('spokenProduction','c1')" href="#">C1</a>: I can present clear, detailed descriptions of complex subjects integrating sub-themes, developing particular points and rounding off with an appropriate conclusion. </li>
                    <li><a onclick="setLevel('spokenProduction','c2')" href="#">C2</a>: I can present a clear, smoothly-flowing description or argument in a style appropriate to the context and with an effective logical structure which helps the recipient to notice and remember significant points. </li>
                  </ul></td>
              </tr>
              <tr valign="top">
                <td class="cv_left"><font color="#000000">
                  <label for="writingLevel">Writing</label>
                </font></td>
                <td class="cv_right"><div id="floatleft">
                    <select name="cv5_writinglevel" onchange="" id="cv5_writinglevel">
                      <option value="" selected="selected"></option>
                      <option value="a1">Basic User (A1)</option>
                      <option value="a2">Basic User (A2)</option>
                      <option value="b1">Independent user (B1)</option>
                      <option value="b2">Independent user (B2)</option>
                      <option value="c1">Proficient user (C1)</option>
                      <option value="c2">Proficient user (C2)</option>
                    </select>
                  </div>
                    <div id="floatright"><img longdesc="./" src="../img/icons/info_on.png" width="24" height="24" border="0" id="IMAGE_105" alt="Help" onclick="showTip(105,'help')" onkeypress="showTip(105,'help')" /> </div></td>
              </tr>
              <tr id="TIP_205" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><br />                </td>
              </tr>
              <tr id="TIP_105" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"><b>Writing</b>
                    <ul>
                      <li><a href="#" onclick="setLevel('writing','a1')">A1</a>: I can write a short, simple postcard, for example sending holiday greetings. I can fill in forms with personal details, for example entering my name, nationality and address on a hotel registration form. </li>
                      <li><a href="#" onclick="setLevel('writing','a2')">A2</a>: I can write short, simple notes and messages. I can write a very simple personal letter, for example thanking someone for something. </li>
                      <li><a href="#" onclick="setLevel('writing','b1')">B1</a>: I can write simple connected text on topics which are familiar or of personal interest. I can write personal letters describing experiences and impressions. </li>
                      <li><a href="#" onclick="setLevel('writing','b2')">B2</a>: I can write clear, detailed text on a wide range of subjects related to my interests. I can write an essay or report, passing on information or giving reasons in support of or against a particular point of view. I can write letters highlighting the personal significance of events and experiences. </li>
                      <li><a href="#" onclick="setLevel('writing','c1')">C1</a>: I can express myself in clear, well-structured text, expressing points of view at some length. I can write about complex subjects in a letter, an essay or a report, underlining what I consider to be the salient issues. I can select a style appropriate to the reader in mind. </li>
                      <li><a href="#" onclick="setLevel('writing','c2')">C2</a>: I can write clear, smoothly-flowing text in an appropriate style. I can write complex letters, reports or articles which present a case with an effective logical structure which helps the recipient to notice and remember significant points. I can write summaries and reviews of professional or literary works. </li>
                    </ul></td>
              </tr>
              <tr>
                <td colspan="2" class="cv_leftline"><input type="submit" value="Save" name="save" title="Save" onclick="" /></td>
              </tr>
            </tbody>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv_list" summary="List of your other languages" width="100%">
            <tr>
              <td colspan="2" class="cv_title"><div style="float:left;"> <b>List of your other languages</b> </div></td>
            </tr>
            <tr>
              <td colspan="2" class="cv_list">
				<ul>
				<?php //riportiamo le esperienze lavorative inserite
				$query = "SELECT * FROM $tbl_lang WHERE cv_id = ".$_SESSION['cv_id']." AND mothertongue <> '1'";
				$res_lang = query($query);
				while ($row_lang = mysql_fetch_assoc($res_lang)){?>
					<li><?php echo $row_lang['foreignlanguage'] ?>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?lang_id=<?php echo $row_lang['id'] ?>&task=del_lang"><img src="../img/icons/delete.png" alt="Delete" width="24" height="24" border="0" align="absmiddle" /></a></li>
				<?php 
				}?>
				</ul> 			  </td>
            </tr>
          </table>
        </form>
      <br />
      <form autocomplete="off" action="cv_6.php" method="post" name="cvform" id="cvform">
          <table border="0" cellpadding="0" cellspacing="0" class="application_cv" summary="Language(s)">
            <thead>
              <tr class="application_cv_list">
                <td colspan="2" class="cv_title">Language training option / Geographic area of interest</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="cv_left"><label for="mlang">Are you willing to take free language training? *</label></td>
                <td class="cv_right"><div id="floatleft">
                <?php 
				$query = "SELECT langtraining,areas FROM $tbl_cv WHERE id = ".$_SESSION['cv_id']." limit 1";
				//echo $query;exit;
				$res_edit = query($query);
				$row_edit = mysql_fetch_assoc($res_edit); ?>
                  <input type="radio" name="cv5_langtraining" id="cv5_langtraining_0" value="0" <?php if ($row_edit['langtraining']=="0"){ ?> checked="checked" <?php }?> />
                  <em>no</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="cv5_langtraining" id="cv5_langtraining_1" value="1" <?php if ($row_edit['langtraining']=="1"){ ?> checked="checked" <?php }?> />
                  <em>yes</em></div>
              <tr>
                <td width="30%" class="cv_left"><label for="mlang">Geographic area of interest</label></td>
                <td width="70%" class="cv_right"><div id="floatleft">
                    <input type="text" name="cv5_areas" id="cv5_areas" size="40" value="<?php echo $row_edit['areas'] ?>" />
                  </div>
                    <div id="mlang_hint" class="hint">&nbsp;</div>
                  <div id="floatright"> <img longdesc="./" src="../img/icons/bulb_on.png" width="24" height="24" border="0" id="IMAGE_106" alt="Example" onclick="showTip(106,'example')" onkeypress="showTip(106,'example')" /> </div></td>
              </tr>
              <tr id="TIP_106" style="display:none;">
                <td>&nbsp;</td>
                <td class="comment"> Specify the EU state(s) or the geographic area in EU in which you would like to work, e.g.:
                  <blockquote>Northern Europe</blockquote></td>
              </tr>
        <tr class="application_cv_list">
    		<td colspan="2" class="cv_title"><div align="right">&nbsp;</div>
    		</td>
    	</tr>
            </tbody>
          </table><br />
  		<div align="right">
	    <input type="hidden" name="cv_id" value="<?php echo $_SESSION['cv_id'] ?>" />
        <input type="button" name="print_cv" id="print_cv" value="View/Print CV" onclick="javascript:window.open('cv_full.php', 'blank');" />
        <input name="gotocv1" type="button" value="&lt;&lt; Prev" onclick="window.location.href='cv_4.php'"  />
        <input name="submitcv5" type="submit" value="Save/Next &gt;&gt;" />
      	</div>
      </form>
      </td>
  </tr>
</table>
</body>
</html>
<?php include('../common/bot.php'); ?>

