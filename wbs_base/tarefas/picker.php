<?

// include library files
require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('config.php');

// include language file
require_once('languages/'.$custom->language.'.php');

header("Content-Type: text/html; charset=".$language->charset);

?>
<html>
<head>
<title>tasks</title>
<link rel="stylesheet" href="main.css" type="text/css" />
<link rel="stylesheet" href="tasks.css" type="text/css" />
<script src="main.js" type="text/javascript"></script>
<script src="tasks.js" type="text/javascript"></script>
<script src="calendar.js" type="text/javascript"></script>
<script language="JavaScript">
<!--

var month_of_year = new Array(<? print($language->picker["months"]); ?>);
var day_of_week = new Array(<? print($language->picker["days"]); ?>);
var strPrevious = "<? print($language->picker["date_previous"]); ?>";
var strNext = "<? print($language->picker["date_next"]); ?>";
var strGo = "<? print($language->picker["date_go"]); ?>";
var strToday = "<? print($language->picker["date_today"]); ?>";
var strKeyToday = "<? print($language->picker["date_key_today"]); ?>";
var strKeySelected = "<? print($language->picker["date_key_selected"]); ?>";

//-->
</script>
</head>

<body onload="self.focus();">
<?
switch ($_REQUEST["type"]) {
	case "parent":
?>
<div class="groupBorder">
<div class="groupHeader"><? print($language->picker["parent_title"]); ?></div>
<?
$query = mysql_query("SELECT ID, title, parent FROM $database->table_name WHERE "
					."obsolete != '1' AND "
					."("
					."  status != '100' OR"
					."  container = '1' "
					.")"
					."ORDER BY title"
					);
$tasks = array();
while(list($id, $title, $parent) = mysql_fetch_array($query)) {
	$tasks[] = array($id, $title, $parent);
}
print_parent_picker_tree($tasks, 0, 0, 0);
?>
</div>
<?
		break;
	case "parent_search":
?>
<div class="groupBorder">
<div class="groupHeader"><? print($language->picker["parent_title"]); ?></div>
<?
$query = mysql_query("SELECT ID, title, parent FROM $database->table_name WHERE "
					."obsolete != '1' AND "
					."("
					."  status != '100' OR"
					."  container = '1' "
					.")"
					."ORDER BY title"
					);
$tasks = array();
while(list($id, $title, $parent) = mysql_fetch_array($query)) {
	$tasks[] = array($id, $title, $parent);
}
print_parent_picker_tree($tasks, 0, 0, 0, "search");
?>
</div>
<?
		break;
	case "date":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"edit");

//-->
</script>
<?
		break;
	case "date_search":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_due");

//-->
</script>
<?
		break;
	case "date_search_before":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_due_before");

//-->
</script>
<?
		break;
	case "date_search_after":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_due_after");

//-->
</script>
<?
		break;
	case "date_modified_search":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_modified");

//-->
</script>
<?
		break;
	case "date_modified_search_before":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_modified_before");

//-->
</script>
<?
		break;
	case "date_modified_search_after":
		if (empty($_REQUEST["date"]) || $_REQUEST["date"] == "--") {
			$date = "";
			$month = date("n");
			$year = date("Y");
		}
		else {
			$date = $_REQUEST["date"];
			$month = ltrim(substr($_REQUEST["date"], 5, 2), "0");
			$year = substr($_REQUEST["date"], 0, 4);
		}
?>
<center><div id="cal" style="width: 275px;"></div></center>
<script language="JavaScript">
<!--

showMonths(<? print($custom->date_picker_months); ?>, <? print($month); ?>, <? print($year); ?>, '<? print($date); ?>',"search_date_modified_after");

//-->
</script>
<?
		break;
}
?>
</body>
</html>
