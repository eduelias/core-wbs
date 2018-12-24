// General Functions

function toggleDiv(divName) {
	thisDiv = document.getElementById(divName);
	if (thisDiv) {
		if (thisDiv.style.display == "none") {
			thisDiv.style.display = "block";
		}
		else {
			thisDiv.style.display = "none";
		}
	}
	else {
		errorString = "Error: Could not locate div with id: " + divName;
		alert(errorString);
	}
}

function toggleCheckbox(thisCheckbox) {
	if (thisCheckbox.checked == true) {
		thisCheckbox.checked = false;
	}
	else {
		thisCheckbox.checked = true;
	}
}

function setSelectedRadioButton(radioArray, radioValue) {
	for (i = 0; radioArray[i]; i++) {
		if (radioArray[i].value == radioValue) {
			radioArray[i].checked = true;
		}
	}
}

function setSelectToValue(thisSelect, thisValue) {
	for (i = 0; thisSelect[i]; i++) {
		if (thisSelect[i].value == thisValue) {
			thisSelect[i].selected = true;
		}
	}
}

function getSelectOptionOfThisValue(thisSelect, thisValue) { // select the specified option
	success = 0;
	for (i = 0; thisSelect[i]; i++) {
		if (thisSelect[i].value == thisValue) {
			success = 1;
			return i;
		}
	}
	if (success == 0) {
		return false;
	}
}

function zero(thisString, thisLength) {
	thisString = thisString.toString();
	if (thisString.length < thisLength) {
		var padding = "";
		for (i = 0; i < (thisLength - thisString.length); i++) {
			padding += "0";
		}
		thisString = padding + thisString;
	}
	return thisString;
}
