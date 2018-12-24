<?php

// include library files
require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('config.php');
require_once('compatibility.php');

// get language
ob_start();
require_once('languages/'.$custom->language.'.php');
ob_end_clean();

header("Content-Type: text/html; charset=".$language->charset);

?>
<html>
<head>
<title>uRail</title>
<script src="tasks.js" type="text/javascript"></script>
</head>

<?
if (!empty($_REQUEST["id"])) {
?>
<body onload="uRailLoad('<? print($_REQUEST["id"]); ?>');">
<?

$task = new task;
$task->retrieve($_REQUEST["id"]);

if ($_REQUEST["show_completed_tasks"] == 0) {
	$tasks = $task->open_children;
}
else {
	$tasks = $task->children;
}
foreach ($tasks as $temp) {
	$child = new task;
	$child->retrieve($temp);
	print_task_level($child, $_REQUEST["color"], 0, $_REQUEST["root"], $_REQUEST["screen"], $_REQUEST["show_completed_tasks"]);
}

?>
</body>
<?
}
?>
</html>
