<?php
// tasks
//
// Copyright (c) 2002-2004 Alex King
// http://www.alexking.org/software/tasks/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// *****************************************************************

// suppress Notice messages
error_reporting(0);

$timer = microtime(); // start page timer

// make config changes in "config.php"

// includes
require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('compatibility.php');
require_once('config.php');
ob_start(); // hack to keep some weird char? from starting output in spanish.php
require_once('languages/'.$custom->language.'.php');
ob_end_clean();

// set page variables
$page = new page;
$task = new task;

require_once('set_up.php');

// session
session_start();
if (!empty($_REQUEST["home_sort_order"])) {
	$_SESSION["home_sort_order"] = $_REQUEST["home_sort_order"];
}
if (empty($_SESSION["mode"])) {
	$_SESSION["mode"] = "standard";
}
if (!isset($_SESSION["messages"])) {
	$_SESSION["messages"] = array();
}

$debug = 0; 								// set to 1 to display debug messages
$current_page = "index.php?current_page=1";	// initialize string
$reload_task = 1; 							// when this gets set to 0, it stops the save from happening

header("Content-Type: text/html; charset=".$language->charset);

// check for mobile user
redirect_to_mobile();

// not mobile? we'll use the standard interface
$_SESSION["mode"] = "standard";

if ($debug == 1) {
	print_r($_REQUEST);
}

require_once('engine.php');

?>
<html>
<head>
<title><?=$page->title?></title>
<link href="favicon.ico" rel="SHORTCUT ICON">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="tasks.css" rel="stylesheet" type="text/css">
<?php
if (strstr($_SERVER["HTTP_USER_AGENT"], 'Safari/125')) {
?>
<link href="safari_1.2.css" rel="stylesheet" type="text/css">
<?php
}
if (!empty($language->font_size)) {
?>
<style>
<!--
body, p, li, td, span, input, textarea, select, button { 
	font-size: <?=$language->font_size?>;
}
//-->
</style>
<?
}
?>
<script src="main.js" type="text/javascript"></script>
<script src="tasks.js" type="text/javascript"></script>
<script language="JavaScript">
<!--

<?

// print js strings

print('var abandonChanges = "'.$language->messages["js_abandon_changes"].'";'."\n");
print('var completeConfirm = "'.$language->messages["js_complete_confirm"].'";'."\n");
print('var completePrompt = "'.$language->messages["js_complete_prompt"].'";'."\n");
print('var dateFormat = "'.custom_date(date("Y"), date("m"), date("d")).'";'."\n");
print('var errEditDate = "'.$language->messages["js_err_edit_date"].'";'."\n");
print('var errSearchDateAfter = "'.$language->messages["js_err_search_date_after"].'";'."\n");
print('var errSearchDateBefore = "'.$language->messages["js_err_search_date_before"].'";'."\n");
print('var errSearchDateExact = "'.$language->messages["js_err_search_date_exact"].'";'."\n");
print('var errSearchDateRange = "'.$language->messages["js_err_search_date_range"].'";'."\n");
print('var errSearchErrors = "'.$language->messages["js_err_search_errors"].'";'."\n");
print('var errSearchIdInvalid = "'.$language->messages["js_err_search_id_invalid"].'";'."\n");
print('var errSearchParentInvalid = "'.$language->messages["js_err_search_parent_invalid"].'";'."\n");
print('var errSearchStatusExact = "'.$language->messages["js_err_search_status_exact"].'";'."\n");
print('var errSearchStatusLess = "'.$language->messages["js_err_search_status_less"].'";'."\n");
print('var errSearchStatusMore = "'.$language->messages["js_err_search_status_more"].'";'."\n");
print('var errSearchStatusRange = "'.$language->messages["js_err_search_status_range"].'";'."\n");
print('var loadingText = "'.$language->messages["js_loading_text"].'";'."\n");
print('var nothingToSave = "'.$language->messages["js_nothing_to_save"].'";'."\n");
print('var parentRequired = "'.$language->messages["js_parent_required"].'";'."\n");

if ($screen == "resolve") {
?>
function resolve(field, action) {
	switch (field) {
		case "title":
			if (action == "use") {
				document.edit.task_title.value = "<?=str_replace('"', '\"', $changed_task->title)?>";
			}
			else if (action == "append") {
				document.edit.task_title.value += "<?=str_replace('"', '\"', $changed_task->title)?>";
			}
			break;
		case "notes":
			if (action == "use") {
				document.edit.task_notes.value = document.edit.changed_task_notes.value;
			}
			else if (action == "append") {
				document.edit.task_notes.value += document.edit.changed_task_notes.value;
			}
			break;
		case "status":
			setSelectToValue(document.edit.task_status, "<?=$changed_task->status?>");
			break;
		case "priority":
			setSelectToValue(document.edit.task_priority, "<?=$changed_task->priority?>");
			break;
		case "parent":
<?
	if ($changed_task->parent == 0) {
		$changed_task->parent = "";
	}
?>
			document.edit.task_parent.value = "<?=$changed_task->parent?>";
			break;
		case "container":
			changed_task_container = <?=$changed_task->container?>;
			if (changed_task_container == 1) {
				if (!document.edit.task_container.checked) {
					toggleCheckbox(document.edit.task_container);
				}
			}
			else {
				if (document.edit.task_container.checked) {
					toggleCheckbox(document.edit.task_container);
				}
			}
			break;
		case "date_due":
<?
	if ($changed_task->date_due == "0000-00-00") {
		$changed_task->date_due = "";
	}
?>
			setSelectToValue(document.edit.task_month, '<?=substr($changed_task->date_due,5,2)?>');
			setSelectToValue(document.edit.task_day, '<?=substr($changed_task->date_due,8,2)?>');
			setSelectToValue(document.edit.task_year, '<?=substr($changed_task->date_due,0,4)?>');
			break;
		case "URL_1":
			document.edit.task_URL_1.value = "<?=$changed_task->URL_1?>";
			break;
		case "URL_2":
			document.edit.task_URL_2.value = "<?=$changed_task->URL_2?>";
			break;
		case "URL_3":
			document.edit.task_URL_3.value = "<?=$changed_task->URL_3?>";
			break;
	}
}
<?
}
?>

//-->
</script>
</head>
<body onload="<? print($page->init_string); ?>" onresize="<? print($page->resize_string); ?>" onunload="<? print($page->unload_string); ?>" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<form name="page">
	<input type="hidden" name="current" value="<? print($current_page); ?>">
</form>

<table width="100%" height="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td width="100" rowspan="2" style="background: #999;">
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php\'');" title="<? print($language->menu["home_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_home.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["home"]?></span></td>
				</tr>
			</table>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php?screen=edit\'');" title="<? print($language->menu["new_task_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_new.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["new_task"]?></span></td>
				</tr>
			</table>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php?screen=search\'');" title="<? print($language->menu["search_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_search.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["search"]?></span></td>
				</tr>
			</table>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php?screen=upcoming\'');" title="<? print($language->menu["upcoming_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_upcoming.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["upcoming"]?></span></td>
				</tr>
			</table>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php?screen=sort\'');" title="<? print($language->menu["sortable_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_sort.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["sortable"]?></span></td>
				</tr>
			</table>
<?
if ($custom->ical_enable == 1) {
?>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="window.open('calendar.php','tasks_calendar');" title="<? print($language->menu["calendar_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_calendar.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["calendar"]?></span></td>
				</tr>
			</table>
<?
}
?>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="4" class="hand" onclick="confirmNav('location.href=\'index.php?screen=recent\'');" title="<? print($language->menu["history_tip"]); ?>">
				<tr>
					<td width="16"><img src="images/icon_recent.gif" width="16" height="16"></td>
					<td><span class="menuText"><?=$language->menu["history"]?></span></td>
				</tr>
			</table>
			<div class="menuHR"><img src="images/clear.gif" height="1" width="1"></div>
			<table width="100%" cellpadding="0" cellspacing="5">
				<form name="quick_search" action="index.php" method="get">
				<input type="hidden" name="sort" value="title">
				<input type="hidden" name="screen" value="search">
				<input type="hidden" name="action" value="search">
				<tr>
					<td><input type="text" class="one_pixel_border" style="width: 90px; border-color: #ccc;" name="text_query" value="<?=$language->misc["quick_search"]?>" onclick="this.value='';" /></td>
				</tr>
				</form>
			</table>
			<table width="100%" cellpadding="0" cellspacing="4">
				<tr>
					<td width="16" class="infoText">&nbsp;</td>
				</tr>
<?
// get count of tasks
$query = "SELECT COUNT(ID) FROM $database->table_name WHERE obsolete != '1'";
$result = mysql_query($query)
	or die("Couldn't get count of tasks. ".mysql_error());
$count = mysql_result($result,0);
?>
				<tr>
					<td class="infoText"><? print($language->variable($language->misc["count_total"], $count)); ?></td>
				</tr>
<?
// get count of tasks that are open
$query = "SELECT COUNT(ID) FROM $database->table_name WHERE obsolete != '1' AND status != '100'";
$result = mysql_query($query)
	or die("Couldn't get count of open tasks. ".mysql_error());
$count = mysql_result($result,0);
?>
				<tr>
					<td class="infoText"><? print($language->variable($language->misc["count_open"], $count)); ?></td>
				</tr>
			</table>
			<img src="images/side_tasks_text.gif" width="100" height="250">
		</td>
		<td width="1" rowspan="2" class="menuSideBorder"><img src="images/clear.gif" height="1" width="1"></td>
		<td style="padding: 10px;">
<?
if (!empty($page->breadcrumbs)) {
?>
			<table width="100%" cellpadding="5" cellspacing="0" class="breadcrumbs">
				<tr>
					<td><?
	print($page->breadcrumbs);
?></td>
<?
	switch ($screen) {
		case "home":
?>
					<td width="1%" valign="top">
<?
			$temp = array(array("title"
			                   ,$language->home["sort_title"]
			                   )
			             ,array("title_rev"
			                   ,$language->home["sort_title_rev"]
			                   )
			             ,array("priority"
			                   ,$language->home["sort_priority"]
			                   )
			             ,array("priority_rev"
			                   ,$language->home["sort_priority_rev"]
			                   )
			             );
			print_dropdown("home_sort_order", $temp, $_SESSION["home_sort_order"], '', 'onchange="sortRootTasks(this.options[this.selectedIndex].value);"');
?>
					</td>
<?
			break;
		case "focus":
?>
					<td width="1%" valign="top">
						<select class="one_pixel_border" onchange="displayCompletedTasks(this.options[this.selectedIndex].value);">
<?
			if (in_array("show_completed_tasks", $page->flags)) {
?>
							<option value="hide"><? print($language->misc["hide_completed"]); ?></option>
							<option value="show" selected><? print($language->misc["show_completed"]); ?></option>
<?
			}
			else {
?>
							<option value="hide" selected><? print($language->misc["hide_completed"]); ?></option>
							<option value="show"><? print($language->misc["show_completed"]); ?></option>
<?
			}
?>
						</select>
					</td>
<?
			break;
	}
?>
					<td width="1%" valign="top">
						<select class="one_pixel_border" onchange="temp=this.options[this.selectedIndex].value;confirmNav('viewTask(temp)');">
							<option value="0" selected><? print($language->misc["jump_to"]); ?></option>
<?
foreach ($root_tasks as $root_task) {
	print('							<option value="view'.$root_task[0].'"> - '.html(trim_add_elipsis($root_task[1], 25)).'</option>'."\n");
}
?>
							<option value="0">------------------</option>
<?
foreach ($recent_tasks as $recent_task) {
	print('							<option value="edit'.$recent_task[0].'"> - '.html(trim_add_elipsis($recent_task[1], 25)).'</option>'."\n");
}
?>
						</select>
					</td>
				</tr>
			</table>
			<img src="images/clear.gif" height="10" width="1">
<?
}
$page->msgs = array_merge($_SESSION["messages"], $page->msgs);
$_SESSION["messages"] = array();
if (count($page->msgs) > 0) {
	print("			<div class=\"messages\">\n");
	print("			<div class=\"messages_title\">".$language->messages["title"]."</div>\n");
	print("				<table width=\"100%\" cellpadding=\"0\" cellspacing=\"4\">\n");
	foreach ($page->msgs as $temp) {
		print("					<tr>\n");
		print("						<td>".$temp."</td>\n");
		print("					</tr>\n");
	}
	print("				</table>\n");
	print("			</div>\n");
	print("			<img src=\"images/clear.gif\" height=\"10\" width=\"1\">\n");
}

require_once('screens.php');
$database->disconnect();
?>
		</td>
	</tr>
	<tr valign="bottom">
		<td style="padding: 7px;">
			<span class="legalText"><?=$language->misc["copyright"]?> &copy; 2002-<? print(date("Y")); ?> <a class="legalText" href="http://www.kingdesign.net/tasks-jr/" target="_blank">King Design</a>. <? print($language->misc["all_rights_reserved"]); ?> <a class="legalText" href="index.php?screen=about">About Tasks Jr.</a></span>
			<br>
<?
include("version.inc");
if (isset($this_version)) {
		print("			<span class=\"legalText\">".$language->variable($language->misc["version"], $this_version)."</span><br />\n");
}
$timer = microtime_diff($timer, microtime());
$timer = sprintf("%0.3f", $timer);
print('			<span class="legalText">'.$language->variable($language->misc["timer"], $timer).'</span>');
?>
		</td>
	</tr>
</table>

<div id="hidden" style="width: 1; height: 1; position: absolute; top: -200; left: -200; overflow: hidden">
<? /*	<div id="uRail"></div> */ ?>
	<iframe src="empty.html" name="uRail" id="uRail"></iframe>
    <button accesskey="<? print($language->accesskey["home"]); ?>" onclick="confirmNav('location.href=\'index.php\'');">Home (h)</button>
    <button accesskey="<? print($language->accesskey["new_task"]); ?>" onclick="confirmNav('location.href=\'index.php?screen=edit\'');">New Task (t)</button>
    <button accesskey="<? print($language->accesskey["search"]); ?>" onclick="confirmNav('location.href=\'index.php?screen=search\'');">Search (a)</button>
    <button accesskey="<? print($language->accesskey["upcoming"]); ?>" onclick="confirmNav('location.href=\'index.php?screen=upcoming\'');">Upcoming Tasks (u)</button>
    <button accesskey="<? print($language->accesskey["sortable"]); ?>" onclick="confirmNav('location.href=\'index.php?screen=sort\'');">Sortable Task List (b)</button>
    <button accesskey="<? print($language->accesskey["history"]); ?>" onclick="confirmNav('location.href=\'index.php?screen=recent\'');">Recent Tasks (y)</button>
<?
if ($custom->ical_enable == 1) {
?>
    <button accesskey="<? print($language->accesskey["calendar"]); ?>" onclick="window.open('calendar.php','tasks_calendar');">Calendar (c)</button>
<?
}
?>
    <button accesskey="<? print($language->accesskey["save"]); ?>" onclick="save();">Save (s)</button>
    <button accesskey="<? print($language->accesskey["title"]); ?>" onclick="if (document.edit && document.edit.task_title) { document.edit.task_title.focus(); }">Title (e)</button>
</div>

</body>
</html>