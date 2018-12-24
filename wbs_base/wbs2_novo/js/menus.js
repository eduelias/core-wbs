var activeMenu = null;
var activeButton = null;
var menuTimer = 0;
// 2 funstions are from http://forums.devshed.com/t40400/s.html
function getRealLeft(el) {
    xPos = el.offsetLeft;
    tempEl = el.offsetParent;
    while (tempEl != null) {
        xPos += tempEl.offsetLeft;
        tempEl = tempEl.offsetParent;
    }
    return xPos;
}

function getRealTop(el) {
    yPos = el.offsetTop;
    tempEl = el.offsetParent;
    while(tempEl != null){
        yPos += tempEl.offsetTop;
        tempEl = tempEl.offsetParent;
    }
    return yPos;
}

function shadeForms(){
	for(i=0; i<document.forms.length;i++){
		f = document.forms[i];
		for(j=0; j<f.elements.length; j++){
			el = f.elements[j];
			el.disabled = true;
			//if(el.type=="select-one"){
			//	el.style.visibility = "hidden";
			//}
		}
	}
}

function unShadeForms(){
	for(i=0; i<document.forms.length;i++){
		f = document.forms[i];
		for(j=0; j<f.elements.length; j++){
			el = f.elements[j];
			el.style.visibility = "visible";
			el.disabled = false;
		}
	}
}


//////////////////////////
//show top menu item
function onTopButton(button){
	//"unpress" active button if exists
	if(activeButton != null) activeButton.className = "topButtonOff";
	//hide active menu if exists
	if(activeMenu != null) activeMenu.style.visibility = "hidden";
	clearTimeout(menuTimer);
	//set new button to active
	activeButton = button;
	//and press it
	activeButton.className = "topButtonOn";
	//get menu for this button
	activeMenu = document.getElementById(activeButton.id + 'Items');
	//if menu here - show it
	if(activeMenu != null){
		activeMenu.style.left = getRealLeft(button);
		activeMenu.style.top = getRealTop(button) + 70;
		activeMenu.style.visibility="visible";
		//shadeForms();
	}
}

function offTopButton(){
	menuTimer = setTimeout("hideMenu()", 1500);
}

function hideMenu(){
	if(activeButton != null) activeButton.className = "topButtonOff";
	if(activeMenu != null) activeMenu.style.visibility = "hidden";
	activeButton = null;
	activeMenu = null;
	window.status = "WBS" ;
}

///////////////////////////////
//Menu items functions
function onTopMenuItem(item){
	clearTimeout(menuTimer);
	item.className = "topMenuItemOn";
	window.status = "WBS: " + item.statustext;
}

function offTopMenuItem(item){
	item.className = "topMenuItemOff";
	menuTimer = setTimeout("hideMenu()", 2000);
}

function gotoTopMenuItem(url){
	document.location = url;
}

////////////////////////////////
//Quick links menus
function onQuickLink(item){
	item.className = item.active=="yes"?"quickLinkActiveOn":"quickLinkOn";
	window.status = "WBS: " + item.statustext;
}
function offQuickLink(item){
	item.className = item.active=="yes"?"quickLinkActiveOff":"quickLinkOff";
	window.status = "WBS";
}
function gotoQuickLinkItem(url){
	document.location = url;
}



//////////////////////////////////////
// check is window resized to relocate active menu
function relocateMenu(){
	if(activeMenu != null && activeButton != null){
		onTopButton(activeButton);
	}
}
