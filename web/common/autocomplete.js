var instore = {};
			
/*API instore.Map*/
instore.Map = function() {
  this.keys = new Array();
  this.values = new Array();
};
instore.Map.prototype.put = function(k, v) {
  this.keys.push(k);
  this.values.push(v);
};
instore.Map.prototype.get = function(k) {
  var idx = this.keys.indexOf(k);
  if ( idx != -1 ) return this.values[idx];
};
instore.Map.prototype.reverseGet = function(v) {
  var idx = this.values.indexOf(v);
  if ( idx != -1 ) return this.keys[idx];
}

/*API instore.Autocompleter*/
instore.Autocompleter = function() {};
instore.Autocompleter.prototype.init = function(textFieldId, choicesMap) {
  this.choicesMap = choicesMap;
  
  var isIndexedProperty = (textFieldId.indexOf('[') != -1);
  var rootPropertyName = textFieldId;
  var propertyIndex = '';
  
  if ( isIndexedProperty ) {
    var idxOpen = textFieldId.indexOf('[');
    var idxClose = textFieldId.indexOf(']');
    rootPropertyName = textFieldId.substring(0, idxOpen);
    propertyIndex = textFieldId.substring(idxOpen, idxClose+1);  
  }  
  this.textField = $(rootPropertyName + '_v' + propertyIndex);
  
  if ( ! $(textFieldId) ) {
    this.hiddenField = document.createElement('INPUT');
    this.hiddenField.type = 'text';
    this.hiddenField.id   = this.textField.id;
    this.hiddenField.name = this.textField.name;
    this.textField.parentNode.appendChild(this.hiddenField);
  } else {
    this.hiddenField = $(textFieldId);
  }
  
  this.listField = document.createElement('DIV');
  this.listField.id = rootPropertyName + '_l' + propertyIndex;
  this.listField.className = 'languageList';
  this.textField.parentNode.appendChild(this.listField);
  
  this.autocompleter = new Autocompleter.Local(this.textField.id, this.listField.id, this.choicesMap.keys, {fullSearch: true});
  
  this.syncFields = function() {
    var hintField = $(this.hiddenField.id + '_hint');
    var v = choicesMap.get(this.textField.value);
    if (v) {
      this.hiddenField.value = choicesMap.get(this.textField.value);
      if ( hintField ) {
        hintField.removeChild(hintField.lastChild);
        hintField.appendChild(document.createTextNode(v));
      }
    } else { 
      this.hiddenField.value = this.textField.value;
      if ( hintField ) {
        hintField.removeChild(hintField.lastChild);
        hintField.appendChild(document.createTextNode(''));
      }
    }
  }
  
  this.reversSyncFields = function() {
    var hintField = $(this.hiddenField.id + '_hint');
    var k = choicesMap.reverseGet(this.hiddenField.value);
    if (k) {
      this.textField.value = choicesMap.reverseGet(this.hiddenField.value);
      if ( hintField ) {
        hintField.removeChild(hintField.lastChild);
        hintField.appendChild(document.createTextNode(this.hiddenField.value));
      }
    } else {
      this.textField.value = this.hiddenField.value;
      if ( hintField ) {
        hintField.removeChild(hintField.lastChild);
        hintField.appendChild(document.createTextNode(''));
      }
    }
    
  }
  
  var self = this;
  //Event.observe(this.textField, 'blur', function() { self.syncFields(); } );
}

