
function checkcv1() {
	if ( document.getElementById('cv1_bdateday').value=='' ){
			alert('Please specify your birth date!');
			return false;
		}
	if ( document.getElementById('cv1_lastname').value=='' ){
			alert('Please specify your last name!');
			return false;
		}
	if ( document.getElementById('cv1_firstname').value=='' ){
			alert('Please specify your first name!');
			return false;
		}
	if ( document.getElementById('referred_by').value=='' ){
			alert('Please tell us how you heard about us!');
			return false;
		}
	if ( document.getElementById('cv1_country').value=='' ){
			alert('Please select your country from the drop-down list!');
			return false;
		}
	if ( document.getElementById('cv1_nationality').value=='' ){
			alert('Please specify your nationality!');
			return false;
		}
		
		
		
}
function checkFilled(field) {
  if ( field.options ) { //we have a select field
    if ( field.options[ field.options.selectedIndex].value != '' ) {
      field.style.backgroundColor = '#EFF5FA';
    } else {
      field.style.backgroundColor = '#FFFFFF';
    }
  } else {
    if (  trim( field.value ) != '' ) {
      field.style.backgroundColor = '#EFF5FA';
    } else {
      field.style.backgroundColor = '#FFFFFF';
    }
  }
}
var modulePath = "../";

function moduleLink( path ) {
  var href = '';
  var idx = modulePath.indexOf(';jsessionid=');
  if ( idx > 0 ) {
    href = modulePath.substr( 0, idx )
         + path
         + modulePath.substr( idx );
  } else {
    href = modulePath + path;
  }
  return href;
}

function limitText(limitField, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
		alert(limitNum + ' character maximum!');
	} 
}


// open help and example tips
////////////////////////////////////////////////////////////////////////
var curHelp;
var curExample;
var curDefault;

function showTip(Id, tip) {

  if (tip == "help") {
	  
    var img_open = "icons/info_on.png";
    var img_close = "icons/info_off.png";
    var current = curHelp;
  } else if (tip == "example") {
    var img_open = "icons/bulb_on.png";
    var img_close = "icons/bulb_off.png";
    var current = curExample;
  } else {
    var img_open = "icons/bulb_on.png";
    var img_close = "icons/bulb_off.png";
    var current = curDefault;
	
    //var img_open = "small_help.gif";
//    var img_close = "small_help_selected.gif";
//    var current = curHelp;
//  } else if (tip == "example") {
//    var img_open = "small_idea.gif";
//    var img_close = "small_idea_selected.gif";
//    var current = curExample;
//  } else {
//    var img_open = "small_open.gif";
//    var img_close = "small_close.gif";
//    var current = curDefault;
	
  }
  
  var tr = document.getElementById('TIP_' + Id);
  var img = document.getElementById('IMAGE_'+Id);
  var display = tr.style.display;
  if (display == 'none') { // I open it
    tr.style.display = '';
    img.src = modulePath + 'img/'+img_close;
		if (current) {
			current.style.display = 'none';
			var count = current.id.substring(4);
      document.getElementById('IMAGE_' + count).src = modulePath + 'img/'+img_open;
		}
		current = tr;
  } else { // I close it
    tr.style.display = 'none';
    img.src = modulePath + 'img/' + img_open;
    img.style.visibility = 'visible';
		if (current == tr) current = null;
  }
	
	if (tip == "help") {
    curHelp = current;
  } else if (tip == "example") {
    curExample = current;
  } else {
    curDefault = current;
  }
}           


