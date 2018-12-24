<div class="groupBorder"<? 
if (strstr(strtolower($HTTP_SERVER_VARS["HTTP_USER_AGENT"]), "msie") != false) {
	print(" style=\"width: 100%;\"");
}
?>>
<div class="groupHeader"><? print($language->resolve["form_title"]) ?></div>
<table width="100%" cellpadding="5" cellspacing="0">
<form name="edit" action="index.php" method="post">
<input type="hidden" name="action" value="save">
<input type="hidden" name="root" value="<? print($root); ?>">
<input type="hidden" name="post_save_nav" value="view">
<input type="hidden" name="task_id" value="<? print($task->id); ?>">
<input type="hidden" name="task_modified" value="<? print($task->date_modified); ?>">
<input type="hidden" name="resolve" value="1">
	<tr valign="top" class="rowHeader">
		<td width="1%">&nbsp;</td>
		<td width="50%"><b><? print($language->resolve["your_data"]) ?></b></td>
		<td width="1%">&nbsp;</td>
		<td width="50%"><b><? print($language->resolve["current_version"]) ?></b></td>
	</tr>
<?
$row_color = 1;
function print_row_class($row_color) {
	if ($row_color % 2 == 0) {
		print("rowEven");
	}
	else {
		print("rowOdd");
	}
}
if ($task->title != $changed_task->title) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["title"]) ?></td>
		<td>
			<input type="text" name="task_title" class="one_pixel_border" style="width: 100%;" value="<? print(html($task->title)); ?>">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('title','use');">&lt;- <? print($language->resolve["use"]); ?></a>
			<br>
			<a href="javascript:resolve('title','append');">&lt;- <? print($language->resolve["append"]); ?></a>
		</td>
		<td><? print(html($changed_task->title)); ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_title" value="<? print(html($task->title)); ?>">
<?
}
if ($task->notes != $changed_task->notes) {
?>
	<tr valign="top" class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["notes"]) ?><br><nobr><img src="images/icon_notes_decrease.gif" onclick="decreaseNotesHeight(document.edit.task_notes, 50);" class="hand" alt="<? print($language->icons["notes_smaller"]); ?>" title="<? print($language->icons["notes_smaller"]); ?>"><img src="images/icon_notes_increase.gif" onclick="increaseNotesHeight(document.edit.task_notes, 50);" class="hand" alt="<? print($language->icons["notes_bigger"]); ?>" title="<? print($language->icons["notes_bigger"]); ?>"></nobr></td>
		<td>
			<textarea name="task_notes" class="one_pixel_border" style="height: 50px; width: 100%;" wrap="virtual"><? print(html($task->notes)); ?></textarea>
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('notes','use');">&lt;- <? print($language->resolve["use"]); ?></a>
			<br>
			<a href="javascript:resolve('notes','append');">&lt;- <? print($language->resolve["append"]); ?></a>
		</td>
		<td>
			<textarea name="changed_task_notes" class="one_pixel_border" style="height: 50px; width: 100%; background: #e8e8e8;" wrap="virtual" readonly><? print(html($changed_task->notes)); ?></textarea>
		</td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_notes" value="<? print(html($task->notes)); ?>">
<?
}
if ($task->status != $changed_task->status && count($changed_task->children) == 0) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><nobr><? print($language->form["status"]) ?></nobr></td>
		<td>
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
	print_dropdown("task_status", $temp, $task->status);
?>
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('status','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? print($changed_task->status); print($language->form["status_label"]) ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_status" value="<? print($task->status); ?>">
<?
}
if ($task->priority != $changed_task->priority) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["priority"]) ?></td>
		<td>
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
	print_dropdown("task_priority", $temp, $task->priority);
?>
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('priority','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td>
<? 
	foreach ($temp as $option) {
		if ($option[0] == $changed_task->priority) {
			print($option[1]);
		}
	}
?>
		</td>
	</tr>
<?
	$row_color++;
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
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["parent"]) ?></td>
		<td>
			<input name="task_parent" type="text" value="<? print($task->parent); ?>" class="one_pixel_border" style="width: 100%;">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('parent','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? print($changed_task->parent); ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_parent" value="<? print($task->parent); ?>">
<?
}
if ($task->container != $changed_task->container) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><nobr><? print($language->form["sticky_label"]) ?></nobr></td>
		<td>
			<input type="checkbox" name="task_container" value="1"<? if ($task->container == 1) { print(" checked"); } ?>>
			<img src="images/icon_container.gif" class="hand" onclick="toggleCheckbox(document.edit.task_container);">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('container','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td>
			<input type="checkbox" value="1" disabled<? if ($changed_task->container == 1) { print(" checked"); } ?>>
			<img src="images/icon_container.gif">
		</td>
	</tr>
<?
	$row_color++;
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
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><nobr><? print($language->form["date_due"]) ?></nobr></td>
		<td>
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
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('date_due','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? $changed_task->date_due != "0000-00-00" ? print($changed_task->date_due) : print($language->resolve["none"]); ?></td>
	</tr>
<?
	$row_color++;
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
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["url_1"]) ?></td>
		<td>
			<input type="text" name="task_URL_1" class="one_pixel_border" style="width: 100%;" value="<? print($task->URL_1); ?>">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('URL_1','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? print(html($changed_task->URL_1)); ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_URL_1" value="<? print(addslashes($task->URL_1)); ?>">
<?
}
if ($task->URL_2 != $changed_task->URL_2) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["url_2"]) ?></td>
		<td>
			<input type="text" name="task_URL_2" class="one_pixel_border" style="width: 100%;" value="<? print($task->URL_2); ?>">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('URL_2','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? print(html($changed_task->URL_2)); ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_URL_2" value="<? print(addslashes($task->URL_2)); ?>">
<?
}
if ($task->URL_3 != $changed_task->URL_3) {
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td align="right"><? print($language->form["url_3"]) ?></td>
		<td>
			<input type="text" name="task_URL_3" class="one_pixel_border" style="width: 100%;" value="<? print($task->URL_3); ?>">
		</td>
		<td align="center" nowrap>
			<a href="javascript:resolve('URL_3','use');">&lt;- <? print($language->resolve["use"]); ?></a>
		</td>
		<td><? print(html($changed_task->URL_3)); ?></td>
	</tr>
<?
	$row_color++;
}
else {
?>
<input type="hidden" name="task_URL_3" value="<? print(addslashes($task->URL_3)); ?>">
<?
}
?>
	<tr class="<? print_row_class($row_color); ?>">
		<td colspan="4"><input type="submit" value="<? print($language->resolve["save"]) ?>"></td>
	</tr>
</table>
</div>