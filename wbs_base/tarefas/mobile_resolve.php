<p><?=$language->messages["mobile_resolve_instructions"]?></p>
<form name="edit" action="mobile.php" method="post">
<input type="hidden" name="action" value="save">
<input type="hidden" name="root" value="<? print($root); ?>">
<input type="hidden" name="post_save_nav" value="view">
<input type="hidden" name="task_id" value="<? print($task->id); ?>">
<input type="hidden" name="task_modified" value="<? print($task->date_modified); ?>">
<input type="hidden" name="resolve" value="1">
<?
if ($task->title != $changed_task->title) {
?>
<p><b><?=$language->form["title"]?></b></p>
<p><? print($changed_task->title); ?></p>
<p><input type="text" name="task_title" size="25" value="<? print(html($task->title)); ?>"></p>
<?
}
else {
?>
<input type="hidden" name="task_title" value="<? print(addslashes($task->title)); ?>">
<?
}
if ($task->notes != $changed_task->notes) {
?>
<p><b><?=$language->form["notes"]?></b></p>
<p><?=str_replace("\n", "<br>", html($changed_task->notes))?></p>
<p><textarea name="task_notes" rows="4" cols="20" wrap="virtual"><? print(html($task->notes)); ?></textarea></p>
<?
}
else {
?>
<input type="hidden" name="task_notes" value="<? print(addslashes($task->notes)); ?>">
<?
}
if ($task->status != $changed_task->status && count($changed_task->children) == 0) {
?>
<p><b><?=$language->form["status"]?></b></p>
<p><?=$changed_task->status.$language->form["status_label"]?></p>
<p>
<?
	$temp = array(array(0
					   ,"0%"
					   )
				 ,array(25
					   ,"25%"
					   )
				 ,array(50
					   ,"50%"
					   )
				 ,array(75
					   ,"75%"
					   )
				 ,array(100
					   ,"100%"
					   )
				 );
	print_dropdown("task_status", $temp, $task->status, '');
?>
</p>
<?
}
else {
?>
<input type="hidden" name="task_status" value="<? print($task->status); ?>">
<?
}
if ($task->priority != $changed_task->priority) {
?>
<p><b><?=$language->form["priority"]?></b></p>
<?
	$temp = array(array(1
	                   ,get_friendly_priority(1)
	                   )
	             ,array(2
	                   ,get_friendly_priority(2)
	                   )
	             ,array(3
	                   ,get_friendly_priority(3)
	                   )
	             ,array(4
	                   ,get_friendly_priority(4)
	                   )
	             ,array(5
	                   ,get_friendly_priority(5)
	                   )
	             );
	foreach ($temp as $option) {
		if ($option[0] == $changed_task->priority) {
			print('<p>'.$option[1].'<p>');
		}
	}
	print('<p>'.get_dropdown("task_priority", $temp, $task->priority, '').'</p>');
}
else {
?>
<input type="hidden" name="task_priority" value="<? print($task->priority); ?>">
<?
}
if ($task->parent != $changed_task->parent) {
if ($changed_task->parent == 0) {
	$changed_task->parent = $language->resolve["none"];
}
if ($task->parent == 0) {
	$task->parent = "";
}
?>
<p><b><?=$language->form["parent"]?></b></p>
<p><?=$changed_task->parent?></p>
<p><input name="task_parent" type="text" value="<? print($task->parent); ?>" size="5"></p>
<?
}
else {
?>
<input type="hidden" name="task_parent" value="<? print($task->parent); ?>">
<?
}
if ($task->container != $changed_task->container) {
?>
<p><b><?=$language->form["sticky_label"]?></b></p>
<p><? $changed_task->container == 1 ? print("Sticky") : print("Not Sticky"); ?></p>
<p><input type="checkbox" name="task_container" value="1"<? if ($task->container == 1) { print(" checked"); } ?>> Sticky Task</p>
<?
}
else {
?>
<input type="hidden" name="task_container" value="<? print($task->container); ?>">
<?
}
if ($changed_task->date_due == "") {
	$changed_task->date_due = "0000-00-00";
}
if ($task->date_due != $changed_task->date_due) {
?>
<p><b><?=$language->form["date_due"]?></b></p>
<p><? $changed_task->date_due != "0000-00-00" ? print($changed_task->date_due) : print($language->resolve["none"]); ?></p>
<p>
<?
	$temp = array(array("",""));
	for ($i = 1; $i < 13; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	print_dropdown("task_month", $temp, substr($task->date_due, 5, 2),"");
	$temp = array(array("",""));
	for ($i = 1; $i < 32; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	print_dropdown("task_day", $temp, substr($task->date_due, 8, 2),"");
	$temp = array(array("",""));
	global $custom;
	for ($i = $custom->year_min; $i <= $custom->year_max; $i++) {
		$temp[] = array($i
		               ,$i
		               );
	}
	print_dropdown("task_year", $temp, substr($task->date_due, 0, 4),"");
?>
</p>
<?
}
else {
?>
<input type="hidden" name="task_year" value="<? print(substr($task->date_due,0,4)); ?>">
<input type="hidden" name="task_month" value="<? print(substr($task->date_due,5,2)); ?>">
<input type="hidden" name="task_day" value="<? print(substr($task->date_due,8,2)); ?>">
<?
}
if ($task->URL_1 != $changed_task->URL_1) {
?>
<p><b><?=$language->form["url_1"]?></b></p>
<p><?=html($changed_task->URL_1)?></p>
<p><input type="text" name="task_URL_1" size="25" value="<? print($task->URL_1); ?>"></p>
<?
}
else {
?>
<input type="hidden" name="task_URL_1" value="<? print(addslashes($task->URL_1)); ?>">
<?
}
if ($task->URL_2 != $changed_task->URL_2) {
?>
<p><b><?=$language->form["url_2"]?></b></p>
<p><?=html($changed_task->URL_2)?></p>
<p><input type="text" name="task_URL_2" size="25" value="<? print($task->URL_2); ?>"></p>
<?
}
else {
?>
<input type="hidden" name="task_URL_2" value="<? print(addslashes($task->URL_2)); ?>">
<?
}
if ($task->URL_3 != $changed_task->URL_3) {
?>
<p><b><?=$language->form["url_3"]?></b></p>
<p><?=html($changed_task->URL_3)?></p>
<p><input type="text" name="task_URL_3" size="25" value="<? print($task->URL_3); ?>"></p>
<?
}
else {
?>
<input type="hidden" name="task_URL_3" value="<? print(addslashes($task->URL_3)); ?>">
<?
}
?>
<p><input type="submit" value="<? print($language->resolve["save"]) ?>"></p>
