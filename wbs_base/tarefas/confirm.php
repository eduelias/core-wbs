<?
if (in_array("show_delete_options", $page->flags)) { // task has children
?>
<div class="header"><? print($language->confirm["delete_title"]); ?></div>
<div class="form">
	<table width="100%" cellpadding="0" cellspacing="8">
		<tr>
			<td><? print($language->variable($language->confirm["delete_instructions"],count($task->open_children))); ?></td>
		</tr>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=delete&delete_type=recursive&id=<? print($task->id); ?>"><? print($language->confirm["delete_recursive"]); ?></a></td>
		</tr>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=delete&delete_type=orphan&id=<? print($task->id); ?>"><? print($language->confirm["delete_orphan"]); ?></a></td>
		</tr>
<?
	if (!empty($task->parent)) {
?>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=delete&delete_type=remove_generation&id=<? print($task->id); ?>"><? print($language->confirm["delete_remove"]); ?></a></td>
		</tr>
<?
	}
?>
	</table>
</div>
<?
}
if (in_array("show_complete_options", $page->flags)) { // task has children
?>
<div class="header"><? print($language->confirm["complete_title"]); ?></div>
<div class="form">
	<table width="100%" cellpadding="0" cellspacing="8">
		<tr>
			<td><? print($language->variable($language->confirm["complete_instructions"],count($task->open_children))); ?></td>
		</tr>
<?
	if (!empty($_REQUEST["reason"])) {
		$temp = "&reason=".urlencode($_REQUEST["reason"]);
	}
	else {
		$temp = "";
	}
?>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=complete&complete_type=recursive&id=<? print($task->id); print($temp); ?>"><? print($language->confirm["complete_recursive"]); ?></a></td>
		</tr>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=complete&complete_type=orphan&id=<? print($task->id); ?>"><? print($language->confirm["complete_orphan"]); ?></a></td>
		</tr>
<?
	if (!empty($task->parent)) {
?>
		<tr>
			<td><a href="index.php?screen=<? print($page->target); ?>&action=complete&complete_type=remove_generation&id=<? print($task->id); ?>"><? print($language->confirm["complete_remove"]); ?></a></td>
		</tr>
<?
	}
?>
	</table>
</div>
<?
}
if (!empty($page->return_link)) {
	print($page->return_link);
}
?>