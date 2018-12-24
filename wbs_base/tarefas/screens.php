<?

switch ($screen) {
	case "home":
		foreach ($tasks as $temp) {
			$task = new task;
			$task->retrieve($temp);
			print_task_level($task, 0, 0, 0, $screen, $page->check_flag("show_completed_tasks"));
		}
		break;
	case "focus":
		print_task_level($task, 0, $id, $root, $screen, $page->check_flag("show_completed_tasks"), 1);
		break;
	case "edit":
?>
<table width="100%" cellpadding="0" cellspacing="0">
	<form name="edit" action="index.php" method="post">
		<input type="hidden" name="action" value="save">
		<input type="hidden" name="changed" value="0">
<?
if (isset($root)) {
?>
		<input type="hidden" name="root" value="<? print($root); ?>">
<?
}
?>
		<input type="hidden" name="task_id" value="<? print($task->id); ?>">
		<input type="hidden" name="task_modified" value="<? print($task->date_modified); ?>">
<?
$height = 250;
if (isset($_REQUEST["notes_height"])) {
	$height = $_REQUEST["notes_height"];
}
$formatting_toolbar = 0;
if (isset($_REQUEST["formatting_toolbar"])) {
	$formatting_toolbar = $_REQUEST["formatting_toolbar"];
}
?>
		<input type="hidden" id="notes_height" name="notes_height" value="<? print($height); ?>">
		<input type="hidden" id="formatting_toolbar" name="formatting_toolbar" value="<? print($formatting_toolbar); ?>">
	<tr valign="top">
		<td>
<?
print_task_edit($task, $height);
?>
			<input type="submit" style="visiblity: hidden; height: 1px; width: 1px; position: absolute; top: -2000px; left: -2000px;" />
		</td>
	</tr>
	</form>
</table>
<script language="JavaScript">var edCanvas = document.edit.task_notes;</script>
<?
		break;
	case "search":
		require('search.php');
		break;
	case "upcoming":
		if (count($overdue_tasks) > 0) {
			print_task_list($overdue_tasks, $language->list_titles["overdue"], $screen, $sorted_by);
			print('<p>');
		}
		print_task_list($tasks, $language->list_titles["upcoming"], $screen, $sorted_by);
		break;
	case "recent":
		print_task_list($tasks, $language->list_titles["history"], $screen, $sorted_by);
		break;
	case "sort":
		print_task_list($tasks, $language->list_titles["sortable"], $screen, $sorted_by);
		break;
	case "resolve":
		require('resolve.php');
		break;
	case "confirm":
		require('confirm.php');
		break;
	case "about":
		require('about.php');
		break;
	default:
		print("Error: The variable &quot;screen&quot; was not set or was not an expected value.");
		break;
}

?>