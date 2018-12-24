<?

switch ($screen) {
	case "home":
		foreach ($tasks as $id) {
			$task = new task;
			$task->retrieve($id);
			print_task_level_m($task, 0, 0, 0, $screen, $page->check_flag("show_completed_tasks"));
		}
		break;
	case "focus":
		print_task_level_m($task, 0, 0, 0, $screen, $page->check_flag("show_completed_tasks"), 1);
		print("<p>");
		if ($page->check_flag("show_completed_tasks") == 1) {
?>
<a href="<? print(str_replace("index.php", "mobile.php", $current_page)."&show_completed_tasks=0"); ?>"><?=$language->misc["hide_completed"]?></a>
<?
		}
		else {
?>
<a href="<? print(str_replace("index.php", "mobile.php", $current_page)."&show_completed_tasks=1"); ?>"><?=$language->misc["show_completed"]?></a>
<?
		}
		print("</p>");
		break;
	case "view":
		print_task_view_m($task, $screen);
		break;
	case "edit":
?>
<form name="edit" action="mobile.php" method="post">
	<input type="hidden" name="action" value="save">
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
print_task_edit_m($task, $screen);
?>
</form>
<?
		break;
	case "search":
?>
<form name="search" action="mobile.php" method="post">
	<input type="text" name="text_query" value="<? if (isset($_REQUEST["text_query"])) { echo $_REQUEST["text_query"]; } ?>" size="20">
	<input type="submit" name="submit" value="<?=$language->search["search_button"]?>">
	<br>
	<input type="checkbox" name="include_completed" value="1" <? if (isset($_REQUEST["include_completed"]) && $_REQUEST["include_completed"] == 1) { echo "checked"; } ?>>
	<?=$language->search["include_completed"]?>
	<input type="hidden" name="screen" value="search">
	<input type="hidden" name="action" value="search">
</form>
<?
		if (isset($_REQUEST["text_query"])) {
			print_task_list_m($tasks, $language->search["results_title"]);
		}
		break;
	case "upcoming":
		if (count($overdue_tasks) > 0) {
			print_task_list_m($overdue_tasks, $language->list_titles["overdue"], $screen);
			print('<p>');
		}
		print_task_list_m($tasks, $language->list_titles["upcoming"], $screen);
		break;
	case "recent":
		foreach ($tasks as $id) {
			$task = new task;
			$task->retrieve($id);
			print('<p>');
			print_task_level_m($task, 0, 0, 0, $screen, $page->check_flag("show_completed_tasks"));
		}
		break;
	case "resolve":
		require('mobile_resolve.php');
		break;
	case "confirm":
		if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
			if (count($task->children) == 0) {
?>
<p><b><?=$language->confirm["delete_title_m"]?></b></p>
<form name="delete" action="mobile.php" method="POST">
<p><?=$language->confirm["delete_confirm"]?></p>
<input type="hidden" name="screen" value="home" />
<input type="hidden" name="id" value="<?=$task->id?>" />
<input type="hidden" name="action" value="delete" />
<p><input type="submit" name="submit" value="<?=$language->toolbar["delete"]?>" /></p>
</form>
<?
			}
			else {
?>
<p><b><?=$language->confirm["delete_title"]?></b></p>
<form name="delete" action="mobile.php" method="POST">
<p><?=$language->variable($language->confirm["delete_instructions"], count($task->open_children))?></p>
<p><input type="radio" name="delete_type" value="recursive" checked> <?=$language->confirm["delete_recursive"]?></p>
<p><input type="radio" name="delete_type" value="orphan"> <?=$language->confirm["delete_orphan"]?></p>
<?
				if (!empty($task->parent)) {
?>
<p><input type="radio" name="delete_type" value="remove_generation"> <?=$language->confirm["delete_remove"]?></p>
<?
				}
?>
<input type="hidden" name="screen" value="home" />
<input type="hidden" name="id" value="<?=$task->id?>" />
<input type="hidden" name="action" value="delete" />
<p><input type="submit" name="submit" value="<?=$language->toolbar["delete"]?>" /></p>
</form>
<?
			}
		}
		elseif (isset($_REQUEST["action"]) && $_REQUEST["action"] == "complete") {
			if (count($task->children) == 0) {
?>
<p><b><?=$language->confirm["complete_title"]?></b></p>
<form name="complete" action="mobile.php" method="POST">
<p><?=$language->confirm["complete_notes"]?></p>
<p><textarea rows="4" cols="20" name="reason"></textarea></p>
<input type="hidden" name="screen" value="home" />
<input type="hidden" name="id" value="<?=$task->id?>" />
<input type="hidden" name="action" value="complete" />
<p><input type="submit" name="submit" value="<?=$language->toolbar["mark_complete"]?>" /></p>
</form>
<?
			}
			else {
?>
<p><b><?=$language->confirm["complete_title"]?></b></p>
<form name="delete" action="mobile.php" method="POST">
<p><?=$language->variable($language->confirm["complete_instructions"], count($task->open_children))?></p>
<p><input type="radio" name="complete_type" value="recursive" checked> <?=$language->confirm["complete_recursive"]?></p>
<p><input type="radio" name="complete_type" value="orphan"> <?=$language->confirm["complete_orphan"]?></p>
<?
				if (!empty($task->parent)) {
?>
<p><input type="radio" name="complete_type" value="remove_generation"> <?=$language->confirm["complete_remove"]?></p>
<?
				}
?>
<p><textarea rows="4" cols="20" name="reason"></textarea></p>
<input type="hidden" name="screen" value="home" />
<input type="hidden" name="id" value="<?=$task->id?>" />
<input type="hidden" name="action" value="complete" />
<p><input type="submit" name="submit" value="<?=$language->toolbar["mark_complete"]?>" /></p>
</form>
<?
			}
		}
		if ($page->check_flag("show_delete_options") == 1) { // task has children
		}
		if (!empty($page->return_link)) {
			print($page->return_link);
		}
		break;
	case "about":
		require('about.php');
		break;
	default:
		print("Error: The variable &quot;screen&quot; was not set or was not an expected value.");
		break;
}

?>