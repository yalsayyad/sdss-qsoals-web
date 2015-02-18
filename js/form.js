function spaceDropdown(value){
  if (value == 'full'){
    hideElement('search_space_info');
  }
  else {
    unhideElement('search_space_info');
  }
}
function fieldCheck(fieldInfo) {
    fieldName = fieldInfo['attribute'];
    descriptiveName = fieldInfo['name'];
    type = fieldInfo['type'];
    table = fieldInfo['table'];
    formField = document.getElementById(fieldName + '_form');
    if (document.getElementById(fieldName).checked) {
        if (formField == null){
          formField = document.createElement("div");
          formField.id = fieldName + '_form';
          formField.className = 'optional';
          var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              formField.innerHTML = xmlhttp.responseText;
            }
          }
          if(type == 'options'){
            urlString = "_form.php?attribute=" + fieldName + "&name="
                + descriptiveName + "&type=" + type + "&table=" + table +
                "&options=" + fieldInfo['options'];
          }
          else {
            urlString = "_form.php?attribute=" + fieldName + "&name="
                + descriptiveName + "&type=" + type + "&table=" + table;
          }
          xmlhttp.open("GET", urlString, true);
          xmlhttp.send();
          formField.innerHTML += "Loading form for " + descriptiveName;
          document.getElementById('form_fields').appendChild(formField);
        }
        unhideElement(fieldName + '_form');
    } else {
        hideElement(fieldName + '_form');
    }
}

function unhideElement(elementName){
  document.getElementById(elementName).style.display = 'inline';
}

function hideElement(elementName){
  document.getElementById(elementName).style.display = 'none';
}

function toggleHideElement(elementName){
    currentState = document.getElementById(elementName).style.display;
    if (!currentState || currentState == 'none'){
      unhideElement(elementName);
    } else {
      hideElement(elementName);
    }
}

function displayFields(fieldName){
    if (document.getElementById(fieldName + '_drop').value == 'between'){
        document.getElementById(fieldName + '_extra').style.visibility = 'visible';
    } else {
         document.getElementById(fieldName + '_extra').style.visibility = 'hidden';
    }
}
