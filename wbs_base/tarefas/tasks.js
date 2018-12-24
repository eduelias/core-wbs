function openTreeNode(id) {
	thisImage = document.getElementById('tree_icon_' + id);
	thisDiv = document.getElementById('task_children_' + id);
	thisSummary = document.getElementById('task_children_summary_' + id);
	
	if (thisDiv) {
		thisImage.src = "images/tree_open.gif";
		thisDiv.style.display = "block";
		thisSummary.style.display = "none";
	}
}

function closeTreeNode(id) {
	thisImage = document.getElementById('tree_icon_' + id);
	thisDiv = document.getElementById('task_children_' + id);
	thisSummary = document.getElementById('task_children_summary_' + id);
	
	if (thisDiv) {
		thisImage.src = "images/tree_closed.gif";
		thisDiv.style.display = "none";
		thisSummary.style.display = "block";
	}
}

function toggleTreeNode(id) {
	thisDiv = document.getElementById('task_children_' + id);
	
	if (thisDiv) {
		if (thisDiv.style.display == "none") {
			openTreeNode(id);
		}
		else {
			closeTreeNode(id);
		}
	}
}

function toggleTreeNodes(id, taskChildren) {
	formsDiv = document.getElementById('task_body_' + id);
//	formsImage = document.getElementById('forms_icon_' + id);
	
	if (formsDiv) {
		if (formsDiv.style.display == "none") {
			openTreeNode(id);
			openForm(id);
			for (i = 0; i < taskChildren.length; i++) {
				openForm(taskChildren[i]);
				theseChildren = document.getElementById('task_children_summary' + id);
				if (theseChildren) {
					openTreeNode(taskChildren[i]);
				}
			} 
//			formsImage.src = "images/forms_open.gif";
		}
		else {
			for (i = 0; i < taskChildren.length; i++) {
				closeForm(taskChildren[i]);
			} 
//			formsImage.src = "images/forms_closed.gif";
			closeTreeNode(id);
			closeForm(id);
		}
	}
}

function toggleForm(id) {
	thisDiv = document.getElementById('task_body_' + id);
	
	if (thisDiv) {
		if (thisDiv.style.display == "none") {
			openForm(id);
		}
		else {
			closeForm(id);
		}
	}
}

function toggleForms(id, taskChildren) {
	formsDiv = document.getElementById('task_body_' + id);
//	formsImage = document.getElementById('forms_icon_' + id);
	
	if (formsDiv) {
		if (formsDiv.style.display == "none") {
			openTreeNode(id);
			openForm(id);
			for (i = 0; i < taskChildren.length; i++) {
				openForm(taskChildren[i]);
				theseChildren = document.getElementById('task_children_summary' + id);
				if (theseChildren) {
					openTreeNode(taskChildren[i]);
				}
			} 
//			formsImage.src = "images/forms_open.gif";
		}
		else {
			for (i = 0; i < taskChildren.length; i++) {
				closeForm(taskChildren[i]);
			} 
//			formsImage.src = "images/forms_closed.gif";
			closeTreeNode(id);
			closeForm(id);
		}
	}
}

function openForm(id) {
	thisImage = document.getElementById('form_icon_' + id);
	thisDiv = document.getElementById('task_body_' + id);
	
	if (thisDiv) {
		thisDiv.style.display = "block";
		thisImage.src = "images/form_open.gif";
	}
}

function closeForm(id) {
	thisImage = document.getElementById('form_icon_' + id);
	thisDiv = document.getElementById('task_body_' + id);
	
	if (thisDiv) {
		thisDiv.style.display = "none";
		thisImage.src = "images/form_closed.gif";
	}
}

function hideCompletedTasks() {
	location.href = document.page.current.value + "&show_completed_tasks=0";
}

function showCompletedTasks() {
	location.href = document.page.current.value + "&show_completed_tasks=1";
}

function displayCompletedTasks(doThis) {
	if (doThis == "hide") {
		hideCompletedTasks();
	}
	else {
		showCompletedTasks();
	}
}

function increaseNotesHeight(thisTextarea, add) {
	if (thisTextarea) {
		newHeight = parseInt(thisTextarea.style.height) + add;
		thisTextarea.style.height = newHeight + "px";
	}
	if (document.getElementById('notes_height')) {
		document.getElementById('notes_height').value = newHeight;
	}
}

function decreaseNotesHeight(thisTextarea, subtract) {
	if (thisTextarea) {
		if ((parseInt(thisTextarea.style.height) - subtract) > 30) {
			newHeight = parseInt(thisTextarea.style.height) - subtract;
			thisTextarea.style.height = newHeight + "px";
		}
		else {
			newHeight = 30;
			thisTextarea.style.height = "30px";
		}			
	}
	if (document.getElementById('notes_height')) {
		document.getElementById('notes_height').value = newHeight;
	}
}

function save() {
	if (document.edit) {
		document.edit.submit();
	}
	else {
		alert(nothingToSave);
	}
}

function verifyParentIsSet() {
	if (document.edit.task_parent.value == "") {
		alert(parentRequired);
		return false;
	}
}

function markComplete(taskId, screen, rootId) {
	reason = prompt(completePrompt, ''); 
	if (reason && reason != '') {
		location.href = 'index.php?screen=' + screen + '&id=' + taskId + '&root=' + rootId + '&action=complete&reason=' + escape(reason);
	}
	else {
		if (confirm(completeConfirm)) {
			location.href = 'index.php?screen=' + screen + '&id=' + taskId + '&root=' + rootId + '&action=complete';
		}
	}
}

function viewTask(taskId) {
	var mode = taskId.substring(0,4);
	taskId = parseInt(taskId.substring(4));
	if (taskId > 0) {
		if (mode == "view") {
			location.href = "index.php?screen=focus&root=" + taskId;
		}
		else {
			location.href = "index.php?screen=edit&id=" + taskId + "&root=" + taskId;
		}
	}
}

function position_corner() {
	cornerImg = document.getElementById('edit_form_corner');
	editForm = document.getElementById('edit_form_div');
	cornerImg.style.top = editForm.offsetHeight - cornerImg.offsetHeight - 1;
	cornerImg.style.left = editForm.offsetWidth - cornerImg.offsetWidth - 1;
	cornerImg.style.visibility = "visible";
}

function update_breadcrumbs() {
	if (document.edit.task_title.value.length > 25) {
		escapedString = document.edit.task_title.value.substr(0,25) + "...";
	}
	else {
		escapedString = document.edit.task_title.value;
	}
	escapedString = escapedString.replace('&',"&amp;");
	escapedString = escapedString.replace('"',"&quot;");
	escapedString = escapedString.replace('<',"&lt;");
	escapedString = escapedString.replace('>',"&gt;");
	document.getElementById('current_breadcrumb').innerHTML = escapedString;
	document.title = "Tasks Jr.: " + escapedString;
}

function duplicateTask() {
	if (document.edit.root.value == document.edit.task_id.value) {
		document.edit.root.value = "";
		document.edit.task_id.value = "";
	}
	else {
		document.edit.task_id.value = "";
	}
	document.edit.submit();
}

function confirmNav(nav) {
	if (document.edit && document.edit.changed) {
		if (document.edit.changed.value == 1) {
			if (confirm(abandonChanges)) {
				eval(nav);
			}
		}
		else {
			eval(nav);
		}
	}
	else {
		eval(nav);
	}
}

function setConfirmNav() {
	if (document.edit && document.edit.changed) {
		document.edit.changed.value = 1;
	}
}

function uRailLoad(loadTaskId) {
	parent.document.getElementById('task_children_' + loadTaskId).innerHTML = document.body.innerHTML;
}

function uRailToggleTreeNode(taskId, color, root, screen, show, completed) {
	var URL = "u_rail.php?id=" + taskId + "&color=" + color + "&show=" + show + "&root=" + root + "&screen=" + screen + "&show_completed_tasks=" + completed;
	if (document.getElementById('task_children_' + taskId).innerHTML == loadingText) {
		document.getElementById('uRail').src = URL;
// for some reason, using multiple iframes causes refresh problems
// the browser seems to forget that the client side expanded tree nodes 
// have been expanded after it loads a second level branch.
// this is seen on IE and *zilla
// because of this, we have to allow only one train at a time on the underground railroad
//		document.getElementById('uRail').innerHTML = document.getElementById('uRail').innerHTML + '<iframe src="' + URL + '" height="1" width="1"></iframe>';
	}
	toggleTreeNode(taskId);
}

function annotate() {
	now = new Date;
	if (now.getMinutes() < 10) { 
		var minutes = "0" + now.getMinutes();
	}
	else {
		var minutes = now.getMinutes();
	}
	if (now.getHours() < 10) { 
		var hours = "0" + now.getHours();
	}
	else {
		var hours = now.getHours();
	}
	var add = "-----  " + dateFormat + " @ " + hours + ":" + minutes + 
	          "  ---------------------\n\n\n\n----------------------------------------------------\n\n";
	document.edit.task_notes.value = add + document.edit.task_notes.value;
	document.edit.task_notes.focus();
	if (document.edit.task_notes.selectionStart || 
	    document.edit.task_notes.selectionStart == '0') {
		document.edit.task_notes.selectionStart = 50;
		document.edit.task_notes.selectionEnd = 50;
	}
}

function pickParent(taskId, target) {
	if (target == "edit") {
		window.opener.document.edit.task_parent.value = taskId;
		window.opener.setConfirmNav();
		window.close();
	}
	else if (target == "search") {
		window.opener.document.search.search_parent.value = taskId;
		window.close();
	}
}

function showPicker(type, date) {
// date is expected in YYYY-MM-DD format
	var URL;
	var stats;
	URL = "picker.php?type=" + type + "&date=" + date;

	if (type.indexOf("parent") != -1) {
		stats = "height=500, width=450, scrollbars=yes, toolbar=no, location=no, status=yes";
	}
	else if (type.indexOf("date") != -1) {
		stats = "height=565, width=315, scrollbars=yes, toolbar=no, location=no, status=yes";
	}
	else {
		stats = "height=500, width=500, scrollbars=yes, toolbar=no, location=no, status=yes";
	}
	window.open(URL, "picker", stats);
}

function pickDate(thisYear, thisMonth, thisDay, target) {
	if (target == "edit") {
		setSelectToValue(window.opener.document.edit.task_month, thisMonth);
		setSelectToValue(window.opener.document.edit.task_day, thisDay);
		setSelectToValue(window.opener.document.edit.task_year, thisYear);
		window.opener.setConfirmNav();
		window.close();
	}
	else if (target == "search_date_due") {
		setSelectToValue(window.opener.document.search.search_date_due_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_due_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_due_year, thisYear);
		window.close();
	}
	else if (target == "search_date_due_before") {
		setSelectToValue(window.opener.document.search.search_date_due_before_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_due_before_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_due_before_year, thisYear);
		window.close();
	}
	else if (target == "search_date_due_after") {
		setSelectToValue(window.opener.document.search.search_date_due_after_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_due_after_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_due_after_year, thisYear);
		window.close();
	}
	else if (target == "search_date_modified") {
		setSelectToValue(window.opener.document.search.search_date_modified_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_modified_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_modified_year, thisYear);
		window.close();
	}
	else if (target == "search_date_modified_before") {
		setSelectToValue(window.opener.document.search.search_date_modified_before_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_modified_before_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_modified_before_year, thisYear);
		window.close();
	}
	else if (target == "search_date_modified_after") {
		setSelectToValue(window.opener.document.search.search_date_modified_after_month, thisMonth);
		setSelectToValue(window.opener.document.search.search_date_modified_after_day, thisDay);
		setSelectToValue(window.opener.document.search.search_date_modified_after_year, thisYear);
		window.close();
	}
}

function selectedDate(formName, prefix) {
	var selectedYear;
	var selectedMonth;
	var selectedDay;
	eval("selectedYear = document." + formName + "." + prefix + "_year.options[document." + formName + "." + prefix + "_year.selectedIndex].value;");
	eval("selectedMonth = document." + formName + "." + prefix + "_month.options[document." + formName + "." + prefix + "_month.selectedIndex].value;");
	eval("selectedDay = document." + formName + "." + prefix + "_day.options[document." + formName + "." + prefix + "_day.selectedIndex].value;");
	if ((selectedYear == "" || selectedMonth == "" || selectedDay == "") && (selectedYear != "" || selectedMonth != "" || selectedDay != "")) {
		return "";
	}
	else {
		return selectedYear + "-" + selectedMonth + "-" + selectedDay;
	}
}

function toggleGroupBackground(thisDiv, prefix) {
	var i;
	for (i = 0; document.getElementById(prefix + i); i++) {
		document.getElementById(prefix + i).className = "group";
	}
	thisDiv.className = "groupActive";
}

function validateSearchCriteria() {
	var errors = new Array();
	var day;
	var month;
	var year;
	if (document.search.search_ID.value && (isNaN(document.search.search_ID.value) || document.search.search_ID.value < 0)) {
		errors[errors.length] = errSearchIdInvalid;
	}
	if (document.search.search_parent.value && (isNaN(document.search.search_parent.value) || document.search.search_parent.value < 0)) {
		errors[errors.length] = errSearchParentInvalid;
	}
	if (document.search.search_status[0].value == "range" && document.search.search_status[0].checked == true) {
		if (document.search.search_status_more.value && (isNaN(document.search.search_status_more.value) || document.search.search_status_more.value > 100 || document.search.search_status_more.value < 0)) {
			errors[errors.length] = errSearchStatusMore;
		}
		if (document.search.search_status_less.value && (isNaN(document.search.search_status_less.value) || document.search.search_status_less.value > 100 || document.search.search_status_less.value < 0)) {
			errors[errors.length] = errSearchStatusLess;
		}
		if ((document.search.search_status_more.value && !isNaN(document.search.search_status_more.value)) && (document.search.search_status_less.value && !isNaN(document.search.search_status_less.value)) && document.search.search_status_more.value > document.search.search_status_less.value) {
			errors[errors.length] = errSearchStatusRange;
		}
	}
	else {
		if (document.search.search_status_exact.value && (isNaN(document.search.search_status_exact.value) || document.search.search_status_exact.value > 100 || document.search.search_status_exact.value < 0)) {
			errors[errors.length] = errSearchStatusExact;
		}
	}
	if (document.search.search_date_due[0].value == "range" && document.search.search_date_due[0].checked == true) {
		day = document.search.search_date_due_after_day[document.search.search_date_due_after_day.selectedIndex].value;
		month = document.search.search_date_due_after_month[document.search.search_date_due_after_month.selectedIndex].value;
		year = document.search.search_date_due_after_year[document.search.search_date_due_after_year.selectedIndex].value;
		if (day != "" || month != "" || year != "") {
			var validDateAfter = new Date(parseFloat(year), parseFloat(month)-1, parseFloat(day));
			if (validDateAfter.getDate() != day || validDateAfter.getMonth() != (month - 1) || validDateAfter.getFullYear() != year) {
				errors[errors.length] = errSearchDateAfter;
			}
		}
		day = document.search.search_date_due_before_day[document.search.search_date_due_before_day.selectedIndex].value;
		month = document.search.search_date_due_before_month[document.search.search_date_due_before_month.selectedIndex].value;
		year = document.search.search_date_due_before_year[document.search.search_date_due_before_year.selectedIndex].value;
		if (day != "" || month != "" || year != "") {
			var validDateBefore = new Date(parseFloat(year), parseFloat(month)-1, parseFloat(day));
			if (validDateBefore.getDate() != day || validDateBefore.getMonth() != (month - 1) || validDateBefore.getFullYear() != year) {
				errors[errors.length] = errSearchDateBefore;
			}
		}
		if (validDateAfter && validDateBefore && (validDateAfter >= validDateBefore)) {
			errors[errors.length] = errSearchDateRange;
		}
	}
	else {
		day = document.search.search_date_due_day[document.search.search_date_due_day.selectedIndex].value;
		month = document.search.search_date_due_month[document.search.search_date_due_month.selectedIndex].value;
		year = document.search.search_date_due_year[document.search.search_date_due_year.selectedIndex].value;
		if (day != "" || month != "" || year != "") {
			var exactDate = new Date(parseFloat(year), parseFloat(month)-1, parseFloat(day));
			if (exactDate.getDate() != day || exactDate.getMonth() != (month - 1) || exactDate.getFullYear() != year) {
				errors[errors.length] = errSearchDateExact;
			}
		}
	}

	if (errors.length > 0) {
		var errorString = errSearchErrors;
		for (i = 0; i < errors.length; i++) {
			errorString += errors[i] + "\n";
		}
		return errorString;
	}
	else {
		return true;
	}
}

function validateEditData() {
	var day = document.edit.task_day[document.edit.task_day.selectedIndex].value;
	var month = document.edit.task_month[document.edit.task_month.selectedIndex].value;
	var year = document.edit.task_year[document.edit.task_year.selectedIndex].value;
	if (day != "" || month != "" || year != "") {
		var editDate = new Date(parseFloat(year), parseFloat(month)-1, parseFloat(day));
// editDate = new Date(parseFloat(document.edit.task_year[document.edit.task_year.selectedIndex].value), parseFloat(document.edit.task_month[document.edit.task_month.selectedIndex].value)-1, parseFloat(document.edit.task_day[document.edit.task_day.selectedIndex].value));alert(editDate.getDate());
		if (editDate.getDate() != day || editDate.getMonth() != (month - 1) || editDate.getFullYear() != year) {
			return errEditDate;
		}
		else {
			return true;
		}
	}
	else {
		return true;
	}
}

function b2Post(URL) {
	URL += "?task_title=" + escape(document.edit.task_title.value) + "&task_notes=" + escape(document.edit.task_notes.value);
	setSelectToValue(document.edit.task_status, '100');
	window.open(URL, 'b2_post', 'height=550, width=500, scrollbars=yes, toolbar=no, location=no, status=yes');
}

function WPPost(URL) {
	URL += "?post_title=" + escape(document.edit.task_title.value) + "&content=" + escape(document.edit.task_notes.value);
	setSelectToValue(document.edit.task_status, '100');
	window.open(URL, 'WP_post', 'height=550, width=500, scrollbars=yes, toolbar=no, location=no, status=yes');
}

function MTPost(URL) {
	URL += "?is_bm=1&bm_show=allow_comments,convert_breaks,category,keywords,excerpt,text_more&__mode=view&_type=entry&link_title=&link_href=&title=" + escape(document.edit.task_title.value) + "&text=" + escape(document.edit.task_notes.value);
	setSelectToValue(document.edit.task_status, '100');
	window.open(URL, 'mt_post', 'height=550, width=500, scrollbars=yes, toolbar=no, location=no, status=yes');
}

function toggleFormattingToolbar() {
	if (document.getElementById('format_toolbar') && document.getElementById('formatting_toolbar')) {
		if (document.getElementById('format_toolbar').style.display == "block") {
			document.getElementById('formatting_toolbar').value = 1;
		}
		else {
			document.getElementById('formatting_toolbar').value = 0;
		}
	}
}

function sortRootTasks(order) {
	location.href = 'index.php?home_sort_order=' + order;
}
