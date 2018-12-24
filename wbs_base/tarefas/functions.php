<?php

// functions

function get_unique_id() {
	$id = microtime();
	$id = str_replace(" ", "_", $id);
	$id = str_replace(".", "_", $id);
	return $id;
}

function get_friendly_timestamp($timestamp) {
	global $custom;
	
	$timestamp = str_replace(array(' ',':','-'), array('','',''), $timestamp);

	$year = substr($timestamp, 0, 4);
	$month = substr($timestamp, 4, 2);
	$day = substr($timestamp, 6, 2);
	$hour = substr($timestamp, 8, 2);
	$min = substr($timestamp, 10, 2);
	$sec = substr($timestamp, 12, 2);
	
	$date = mktime($hour, $min, $sec, $month, $day, $year);
	
	$date = $date + (3600 * $custom->server_time_difference);
	
	$temp = custom_date(date("Y", $date), date("m", $date), date("d",$date))." ".date("H", $date).":".$min.":".$sec;
	return $temp;
}

function print_friendly_timestamp($timestamp) {
	print(get_friendly_timestamp($timestamp));
}

function custom_date($year, $month, $day) {
	global $custom;
	$date = str_replace("y", $year, $custom->date_format);
	$date = str_replace("m", $month, $date);
	$date = str_replace("d", $day, $date);
	
	return $date;
}

function html($temp) {
	$temp = str_replace('&', '&amp;', $temp);
	$temp = str_replace('"', '&quot;', $temp);
	$temp = str_replace('<', '&lt;', $temp);
	$temp = str_replace('>', '&gt;', $temp);
	return $temp;
}	

function print_HTML($temp) {
	print(html($temp));
}	

function delete_task($task, $delete_type = "") {
	switch ($delete_type) {
		case "recursive":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				delete_task($child, "recursive");
			}
			break;
		case "orphan":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				$child->parent = "";
				$child->add_slashes();
				$child->update();
			}
			break;
		case "remove_generation":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				$child->parent = $task->parent;
				$child->add_slashes();
				$child->update();
			}
			break;
	}
	$task->obsolete();
	set_parent_task_status($task->id);
}

function complete_task($task, $complete_type = "", $reason = "") {
	switch ($complete_type) {
		case "recursive":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				complete_task($child, $complete_type, $reason);
			}
			break;
		case "orphan":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				$child->parent = "";
				$child->add_slashes();
				$child->update();
			}
			break;
		case "remove_generation":
			foreach ($task->children as $child_id) {
				$child = new task;
				$child->retrieve($child_id);
				$child->parent = $task->parent;
				$child->add_slashes();
				$child->update();
			}
			break;
	}
	$task->status = 100;
	if (!empty($reason)) {
		$reason = html(stripslashes($reason));
		$task->notes = "-----  ".date("m-d-Y")." @ ".date("H:i")."  ---------------------\n\n"."Closed with reason: ".$reason."\n\n----------------------------------------------------\n\n".$task->notes;
	}
	$task->add_slashes();
	$task->update();
	set_parent_task_status($task->id);
}

function set_parent_task_status($task_id) {
	global $database;
	$task = new task;
	$task->retrieve($task_id);
	if (!empty($task->parent)) {
		$task->lineage = $task->find_lineage();
		foreach ($task->lineage as $parent_id) {
			$parent = new task;
			$parent->retrieve($parent_id);
			if (count($parent->children) > 0) {
				$result = mysql_query("SELECT status FROM $database->table_name WHERE parent = '$parent_id' AND obsolete != '1'");
				$child_status_total = 0;
				while ($temp = mysql_fetch_row($result)) {
					$child_status_total = $child_status_total + $temp[0];
				}
				$parent->status = $child_status_total / count($parent->children);
				$parent->add_slashes();
				$parent->update();
			}
		}
	}
	else {
		return false;
	}
}

function get_task_status($task_id) {
	global $database;
	$task = new task;
	$task->retrieve($task_id);
	if (count($task->children) > 0) {
		$result = mysql_query("SELECT status FROM $database->table_name WHERE parent = '$task_id' AND obsolete != '1'");
		$child_status_total = 0;
		while ($temp = mysql_fetch_row($result)) {
			$child_status_total = $child_status_total + $temp[0];
		}
		$task->status = $child_status_total / count($task->children);
		return $task->status;
	}
	else {
		return $task->status;
	}
}

function set_task_status($task_id) {
	global $database;
	$task = new task;
	$task->retrieve($task_id);
	if (count($task->children) > 0) {
		$result = mysql_query("SELECT status FROM $database->table_name WHERE parent = '$task_id' AND obsolete != '1'");
		$child_status_total = 0;
		while ($temp = mysql_fetch_row($result)) {
			$child_status_total = $child_status_total + $temp[0];
		}
		$task->status = $child_status_total / count($task->children);
		$task->add_slashes();
		$task->update();
	}
	else {
		$task->add_slashes();
		$task->update();
	}
}

function get_notes_height($task) {
	if (strlen($task->notes) <= 200 && substr_count($task->notes, "\n") < 2) {
		$height = "30px";
	}
	elseif (strlen($task->notes) < 400 && substr_count($task->notes, "\n") < 5) {
		$height = "60px";
	}
	else {
		$height = "100px";
	}
	return $height;
}

function print_task_view($task) {
	global $language;
	$notes_HTML = html($task->notes);
	print("					<table width=\"100%\" cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n");
	if ($task->notes != "") {
		print("						<tr valign=\"top\">\n");
		print("							<td width=\"1%\" align=\"center\"><span class=\"label\">".$language->form["notes"]."</span><br><nobr><img src=\"images/icon_notes_increase.gif\" height=\"16\" width=\"16\" onclick=\"increaseNotesHeight(document.getElementById('task_notes_".$task->id."'), 50);\" class=\"hand\" alt=\"".$language->icons["notes_bigger"]."\" title=\"".$language->icons["notes_bigger"]."\"><img src=\"images/icon_notes_decrease.gif\" height=\"16\" width=\"16\" onclick=\"decreaseNotesHeight(document.getElementById('task_notes_".$task->id."'), 50);\" class=\"hand\" alt=\"".$language->icons["notes_smaller"]."\" title=\"".$language->icons["notes_smaller"]."\"></nobr></td>\n");
		$height = get_notes_height($task);
		print("							<td><textarea id=\"task_notes_".$task->id."\" cols=\"40\" class=\"one_pixel_border\" style=\"height: ".$height."; width: 100%;\" wrap=\"virtual\" readonly>".$notes_HTML."</textarea></td>\n");
		print("						</tr>\n");
	}
	if (($task->URL_1 != "") ||	($task->URL_2 != "") || ($task->URL_3 != "")) {
		print("						<tr valign=\"top\">\n");
		print("							<td width=\"1%\" align=\"right\"><span class=\"label\">".$language->form["urls"]."</span></td>\n");
		print("							<td>\n");
		if ($task->URL_1 != "") {
			print("									<a href=\"".$task->URL_1."\" target=\"_blank\">".trim_add_elipsis($task->URL_1, 75)."</a>\n");
			print("									<br><img src=\"images/clear.gif\" width=\"1\" height=\"3\"><br>\n");
		}
		if ($task->URL_2 != "") {
			print("									<a href=\"".$task->URL_2."\" target=\"_blank\">".trim_add_elipsis($task->URL_2, 75)."</a>\n");
			print("									<br><img src=\"images/clear.gif\" width=\"1\" height=\"3\"><br>\n");
		}
		if ($task->URL_3 != "") {
			print("									<a href=\"".$task->URL_3."\" target=\"_blank\">".trim_add_elipsis($task->URL_3, 75)."</a>\n");
			print("									<br><img src=\"images/clear.gif\" width=\"1\" height=\"3\"><br>\n");
		}
		print("							</td>\n");
		print("						</tr>\n");
	}
	print("						<tr valign=\"top\">\n");
	print("							<td colspan=\"2\">\n");
	print("								<span class=\"label\">".$language->form["date_entered"]."</span> ");
	print_friendly_timestamp($task->date_entered);
	print("<br>\n");
	print("								<span class=\"label\">".$language->form["date_modified"]."</span> ");
	print_friendly_timestamp($task->date_modified);
	print("\n");
	print("							</td>\n");
	print("						</tr>\n");
	print("					</table>\n");
	print("\n");
}

function print_task_edit($task, $height = 250) {
	global $_SERVER, $_REQUEST, $custom, $language, $root;
	if (!empty($root) && $root != 0) {
		$screen = "focus";
	}
	else {
		$screen = "home";
	}
	$title_HTML = html($task->title);
	$notes_HTML = html($task->notes);
	print('			<div class="header">'."\n");
	if (empty($task->id)) {
		print($language->form["form_title_new"]);
	}
	else {
		print($language->form["form_title_edit"]);
	}
	print('			</div>'."\n");
	print('			<div id="edit_form_div" class="form" style="position: relative;'."\n");
// hack to handle weird spacing with IE and mozilla
	if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), "msie") != false) {
		print(" width: 100%;");
	}
	print('">'."\n");
	ob_start();
		print('					<table width="100%" cellpadding="0" cellspacing="1" border="0" class="form_toolbar">'."\n");
		print('						<tr>'."\n");
		print('							<td width="1%">&nbsp;</td>'."\n");
		print('							<td width="1%" class="hand"><table class="form_button" onclick="document.edit.submit();" title="'.$language->toolbar["save_alt"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td style="padding-left: 3px;"><img src="images/icon_save.gif" border="0" height="16" width="16" alt="'.$language->toolbar["save_alt"].'" /></td><td><nobr>'.$language->toolbar["save"].'&nbsp;</nobr></td></tr></table>'."\n");
		if (!empty($task->id) && $task->id != 0) {
			print('							<td width="1%" class="hand"><table class="form_button" onclick="duplicateTask();" title="'.$language->toolbar["save_as_new"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td><img src="images/clear.gif" border="0" height="16" width="1" alt="'.$language->toolbar["save_as_new"].'"/></td><td><nobr>'.$language->toolbar["save_as_new"].'&nbsp;</nobr></td></tr></table>'."\n");
			print('							<td width="1%" class="hand"><table class="form_button" onclick="location.href=\'index.php?screen=edit&parent='.$task->id.'&root='.$root.'\';" title="'.$language->toolbar["new_sub"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td style="padding-left: 3px;"><img src="images/icon_new_child.gif" border="0" height="16" width="16" alt="'.$language->toolbar["new_sub"].'" /></td><td><nobr>'.$language->toolbar["new_sub"].'&nbsp;</nobr></td></tr></table>'."\n");
			print('							<td width="1%" class="hand"><table class="form_button" onclick="if (document.edit.task_id.value != \'\' ) { if (confirm(\''.$language->variable($language->messages["confirm_delete"],addslashes($title_HTML)).'\')) { location.href=\'index.php?screen='.$screen.'&root='.$root.'&id='.$task->id.'&action=delete\'; } }" title="'.$language->toolbar["delete"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td style="padding-left: 3px;"><img src="images/icon_delete.gif" border="0" height="16" width="16" alt="'.$language->toolbar["delete"].'" /></td><td><nobr>'.$language->toolbar["delete"].'&nbsp;</nobr></td></tr></table>'."\n");
		}
		print('							<td width="1%" class="hand"><table class="form_button" onclick="annotate();" title="'.$language->toolbar["date_time_tip"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td style="padding-left: 3px;"><img src="images/icon_annotate.gif" border="0" height="16" width="16" alt="'.$language->toolbar["date_time"].'" /></td><td><nobr>'.$language->toolbar["date_time"].'&nbsp;</nobr></td></tr></table>'."\n");
		print('							<td width="100%">&nbsp;</td>'."\n");
		if ($custom->b2_enable == 1 && !empty($custom->b2_post_URL)) {
			print('							<td width="1%" class="hand"><table class="form_button" onclick="b2Post(\''.$custom->b2_post_URL.'\');" title="'.$language->toolbar["b2_tip"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td><img src="images/icon_b2.gif" border="0" height="16" width="16" alt="'.$language->toolbar["b2_tip"].'" /></td></tr></table>'."\n");
		}
		if ($custom->wp_enable == 1 && !empty($custom->wp_post_URL)) {
			print('							<td width="1%" class="hand"><table class="form_button" onclick="WPPost(\''.$custom->wp_post_URL.'\');" title="'.$language->toolbar["wp_tip"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td><img src="images/icon_wp.gif" border="0" height="16" width="16" alt="'.$language->toolbar["wp_tip"].'" /></td></tr></table>'."\n");
		}
		if ($custom->mt_enable == 1 && !empty($custom->mt_post_URL)) {
			print('							<td width="1%" class="hand"><table class="form_button" onclick="MTPost(\''.$custom->mt_post_URL.'\');" title="'.$language->toolbar["mt_tip"].'" onmouseover="this.className=\'form_button_on\';" onmousedown="this.className=\'form_button_down\';" onmouseup="this.className=\'form_button_on\';" onmouseout="this.className=\'form_button\';"><tr><td><img src="images/icon_mt.gif" border="0" height="16" width="16" alt="'.$language->toolbar["mt_tip"].'" /></td></tr></table>'."\n");
		}
		print('							<td width="1%">&nbsp;</td>'."\n");
		print('						</tr>'."\n");
		print('					</table>'."\n");
	$toolbar = ob_get_contents();
	ob_end_clean();
	print($toolbar);
	print('					<table width="100%" cellpadding="0" cellspacing="0" border="0">'."\n");
	print('						<tr valign="top">'."\n");
	print('							<td style="padding-bottom: 0px; padding-left: 10px; padding-right: 5px; padding-top: 5px;">');
	print($language->form["after_save"].' ');
	if (empty($_REQUEST["post_save_nav"])) {
		print('<input type="radio" name="post_save_nav" value="view" checked>');
	}
	else {
		print('<input type="radio" name="post_save_nav" value="view">');
	}
	print(' <span class="hand" onclick="setSelectedRadioButton(document.edit.post_save_nav, \'view\');">'.$language->form["view_tree"].'</span>');
	print('&nbsp;&nbsp;');
	if (isset($_REQUEST["post_save_nav"]) && $_REQUEST["post_save_nav"] == "continue") {
		print('<input type="radio" name="post_save_nav" value="continue" checked>');
	}
	else {
		print('<input type="radio" name="post_save_nav" value="continue">');
	}
	print(' <span class="hand" onclick="setSelectedRadioButton(document.edit.post_save_nav, \'continue\');">'.$language->form["stay_here"].'</span>');
	print('&nbsp;&nbsp;');
	if (isset($_REQUEST["post_save_nav"]) && $_REQUEST["post_save_nav"] == "new") {
		print('<input type="radio" name="post_save_nav" value="new" checked>');
	}
	else {
		print('<input type="radio" name="post_save_nav" value="new">');
	}
	print(' <span class="hand" onclick="setSelectedRadioButton(document.edit.post_save_nav, \'new\');">'.$language->form["new_task"].'</span>');
	print("</td>\n");
	print("						</tr>\n");
	print("					</table>\n");
	print('					<table width="100%" cellpadding="0" cellspacing="10" border="0">'."\n");
	print("						<tr valign=\"top\">\n");
	print("							<td colspan=\"3\" style=\"background: #ff6;\"><img src=\"images/clear.gif\" height=\"1\" width=\"1\" alt=\"\"></td>\n");
	print("						</tr>\n");
	print("						<tr valign=\"top\">\n");
	print("							<td width=\"1%\" align=\"right\"><div class=\"label\">".$language->form["title"]."</div></td>\n");
	print("							<td colspan=\"2\"><input type=\"text\" name=\"task_title\" class=\"one_pixel_border\" style=\"width: 100%;\" value=\"".$title_HTML."\"");
	if ($custom->live_breadcrumbs == 1) {
		print(" onkeyup=\"update_breadcrumbs();\"");
	}
	print(" onchange=\"setConfirmNav();\"></td>\n");
	print("						</tr>\n");
	print("						<tr valign=\"top\">\n");
	print("							<td width=\"1%\" align=\"right\">");
	print("<div class=\"label\">".$language->form["notes"]."</div><nobr><img src=\"images/icon_notes_increase.gif\" height=\"16\" width=\"16\" onclick=\"increaseNotesHeight(document.edit.task_notes, 50);position_corner();\" class=\"hand\" title=\"".$language->icons["notes_bigger"]."\"><img src=\"images/icon_notes_decrease.gif\" height=\"16\" width=\"16\" onclick=\"decreaseNotesHeight(document.edit.task_notes, 50);position_corner();\" class=\"hand\" title=\"".$language->icons["notes_smaller"]."\"></nobr>");
	print("							<td>");
	if ($custom->formatting_toolbar == 1) {
		include("editor.php");
	}
	print("<textarea name=\"task_notes\" id=\"task_notes\" class=\"one_pixel_border\" cols=\"40\" style=\"height: ".$height."px; width: 100%;\" wrap=\"virtual\" onchange=\"setConfirmNav();\">".$notes_HTML."</textarea></td>\n");
	print("							<td width=\"10%\">\n");
	if (count($task->children) == 0) {
		print("								<span class=\"label\">".$language->form["status"]."</span><br>\n");
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
		print_dropdown("task_status", $temp, $task->status, 'width: 100%', 'onchange="setConfirmNav();"');
	}
	else {
		print("								".$task->status."% Complete\n");
		print('								<input type="hidden" name="task_status" value="'.$task->status.'">'."\n");
	}
	print("								<br><img src=\"images/clear.gif\" height=\"5\" width=\"100\"><br>\n");
	print("								<span class=\"label\">".$language->form["priority"]."</span><br>\n");
	$temp = array(array(5
	                   ,get_friendly_priority(5)
	                   )
	             ,array(4
	                   ,get_friendly_priority(4)
	                   )
	             ,array(3
	                   ,get_friendly_priority(3)
	                   )
	             ,array(2
	                   ,get_friendly_priority(2)
	                   )
	             ,array(1
	                   ,get_friendly_priority(1)
	                   )
	             );
	print_dropdown("task_priority", $temp, $task->priority, 'width: 100%', 'onchange="setConfirmNav();"');
	print("								<br><img src=\"images/clear.gif\" height=\"5\" width=\"1\"><br>\n");
	print("								<span class=\"label\">".$language->form["parent"]."</span><br>\n");
	if ($task->parent == 0) {
		$task->parent = "";
	}
	print("											<input name=\"task_parent\" type=\"text\" value=\"".$task->parent."\" class=\"one_pixel_border\" style=\"width: 50;\" onchange=\"setConfirmNav();\">\n");
	print(" <img src=\"images/icon_lookup.gif\" height=\"16\" width=\"16\" align=\"absbottom\" alt=\"".$language->icons["parent_picker"]."\" title=\"".$language->icons["parent_picker"]."\" class=\"hand\" onclick=\"showPicker('parent',document.edit.task_parent);\"><br>\n");
	print("<img src=\"images/clear.gif\" height=\"5\" width=\"1\">");
	print("<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n");
	print("									<tr>\n");
	print("										<td width=\"1%\">");
	print('<input type="checkbox" name="task_container" value="1"');
	if ($task->container == 1) {
		print(" checked");
	}
	print(" onchange=\"setConfirmNav();\">");
	print("</td>\n");
	print("										<td width=\"1%\"><nobr>&nbsp;");
	print("<img src=\"images/icon_container.gif\" class=\"hand\" onclick=\"toggleCheckbox(document.edit.task_container);\"></nobr>\n");
	print("</td>\n");
	print("										<td class=\"label hand\" onclick=\"toggleCheckbox(document.edit.task_container);\">&nbsp;<nobr>".$language->form["sticky"]."</nobr></td>\n");
	print("									</tr>\n");
	print("								</table>\n");
	print("							</td>\n");
	print("						</tr>\n");
	print("						<tr valign=\"top\">\n");
	print("							<td align=\"right\"><div class=\"label\"><nobr>".$language->form["date_due"]."</nobr></div></td>\n");
	print("							<td>\n");
	$temp = array(array("",""));
	for ($i = 1; $i < 13; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	$month = get_dropdown("task_month", $temp, substr($task->date_due, 5, 2),"", 'onchange="setConfirmNav();"');
	$temp = array(array("",""));
	for ($i = 1; $i < 32; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	$day = get_dropdown("task_day", $temp, substr($task->date_due, 8, 2),"", 'onchange="setConfirmNav();"');
	$temp = array(array("",""));
	global $custom;
	if (substr($task->date_due, 0, 4) > 0 && substr($task->date_due, 0, 4) < $custom->year_min) {
		$custom->year_min = substr($task->date_due, 0, 4);
	}
	for ($i = $custom->year_min; $i <= $custom->year_max; $i++) {
		$temp[] = array($i
		               ,$i
		               );
	}
	$year = get_dropdown("task_year", $temp, substr($task->date_due, 0, 4),"", 'onchange="setConfirmNav();"');
	for ($i = 0; $i < strlen($custom->date_format); $i++) {
		$temp = substr($custom->date_format, $i, 1);
		switch ($temp) {
			case "y":
				print($year);
				break;
			case "m":
				print($month);
				break;
			case "d":
				print($day);
				break;
		}
	}
	print('<input type="button" value="'.$language->form["choose_date"].'" onclick="showPicker(\'date\',selectedDate(\'edit\',\'task\'));">'."\n");
	print('<input type="button" value="'.$language->form["clear_date"].'" onclick="setSelectToValue(document.edit.task_month, \'\'); setSelectToValue(document.edit.task_day, \'\'); setSelectToValue(document.edit.task_year, \'\');">'."\n");
	print("							</td>\n");
	print("							<td></td>\n");
	print("						</tr>\n");
	print("						<tr valign=\"top\">\n");
	print("							<td></td>\n");
	print("							<td>\n");

	$now = mktime() + ($custom->server_time_difference * 3600);

	print('<input type="button" value="'.$language->form["today"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $now).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $now).'\'); setSelectToValue(document.edit.task_year, \''.date("Y", $now).'\');">'."\n");
	$temp = $now + 86400;
	print('<input type="button" value="'.$language->form["tomorrow"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $temp).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $temp).'\'); setSelectToValue(document.edit.task_year, \''.date("Y", $temp).'\');">'."\n");
	$temp = $now + 604800;
	print('<input type="button" value="'.$language->form["1_week"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $temp).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $temp).'\'); setSelectToValue(document.edit.task_year, \''.date("Y", $temp).'\');">'."\n");
	$temp = $now + 2592000;
	print('<input type="button" value="'.$language->form["30_days"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $temp).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $temp).'\'); setSelectToValue(document.edit.task_year, \''.date("Y", $temp).'\');">'."\n");
	$temp = $now + 7776000;
	print('<input type="button" value="'.$language->form["90_days"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $temp).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $temp).'\'); setSelectToValue(document.edit.task_year, \''.date("Y", $temp).'\');">'."\n");
	print('<input type="button" value="'.$language->form["1_year"].'" onclick="setSelectToValue(document.edit.task_month, \''.date("m", $now).'\'); setSelectToValue(document.edit.task_day, \''.date("d", $now).'\'); setSelectToValue(document.edit.task_year, \''.(date("Y", $now) + 1).'\');">'."\n");
	print("							</td>\n");
	print("							<td></td>\n");
	print("						</tr>\n");
	print("						<tr valign=\"top\">\n");
	print("							<td align=\"right\"><div class=\"label\">".$language->form["urls"]."</div></td>\n");
	print("							<td>\n");
	print("								<input type=\"text\" name=\"task_URL_1\" class=\"one_pixel_border\" style=\"width: 100%;\" value=\"".$task->URL_1."\" onchange=\"setConfirmNav();\">");
	print("<br><img src=\"images/clear.gif\" width=\"1\" height=\"3\"><br>");
	print("<input type=\"text\" name=\"task_URL_2\" class=\"one_pixel_border\" style=\"width: 100%;\" value=\"".$task->URL_2."\" onchange=\"setConfirmNav();\">");
	print("<br><img src=\"images/clear.gif\" width=\"1\" height=\"3\"><br>");
	print("<input type=\"text\" name=\"task_URL_3\" class=\"one_pixel_border\" style=\"width: 100%;\" value=\"".$task->URL_3."\" onchange=\"setConfirmNav();\">\n");
	print("							</td>\n");
	print("							<td></td>\n");
	print("						</tr>\n");
	if (!empty($task->id)) {
		print("						<tr valign=\"top\">\n");
		print("							<td colspan=\"3\">\n");
		print("								<span class=\"label\">".$language->form["date_entered"]."</span> ");
		print_friendly_timestamp($task->date_entered);
		print("<br>\n");
		print("								<span class=\"label\">".$language->form["date_modified"]."</span> ");
		print_friendly_timestamp($task->date_modified);
		print("\n");
		print("							</td>\n");
		print("						</tr>\n");
	}
	if (count($task->children) > 0) {
		if (count($task->open_children) == 1) {
			$subtask_label = $language->variable($language->tree["open_sub_task"], count($task->children));
		}
		else {
			$subtask_label = $language->variables($language->tree["open_sub_tasks"], array(count($task->open_children), count($task->children)));
		}
		print("						<tr valign=\"top\">\n");
		print("							<td colspan=\"2\">\n");
		print("								<div id=\"task_children_summary_".$task->id."\" class=\"task_background_odd\" style=\"padding: 3px;\">".$subtask_label."</div>\n");
		print("							</td>\n");
		print("						</tr>\n");
	}
	print("					</table>\n");
	print('				<img src="images/edit_form_corner.gif" id="edit_form_corner" style="position:absolute; z-index:100; visibility:hidden;">'."\n");
	print('			</div>'."\n");
}

function print_task_level($task, $color = 0, $show = 0, $root = 0, $screen = "", $show_completed_tasks = 0, $levels = 0) {
	global $language, $action;
	$title_HTML = html($task->title);
	if ($color == 0) {
		$child_color = 1;
		$task_class = "task_background_odd";
		$task_child_class = "task_background_even";
		$hr_color = "#fff";
	}
	else {
		$child_color = 0;
		$task_class = "task_background_even";
		$task_child_class = "task_background_odd";
		$hr_color = "#ddd";
	}
	if ($task->id == $show) {
		$task_class = "task_background_focus";
	}
	$tree_display_task = new task;
	if ($show == $task->id) {
		$tree_display_task = $task;
	}
	else if ($show != 0) {
		$tree_display_task->retrieve($show);
	}
	if ($root != 0) {
		$screen = "focus";
	}
	else {
		$screen = "home";
	}
	if ($show_completed_tasks == 1) {
		$displayed_children = $task->children;
	}
	else {
		$displayed_children = $task->open_children;
	}
	print("<div id=\"task_div_".$task->id."\" class=\"".$task_class."\">\n");
	print("	<a name=\"".$task->id."\"></a>\n");
/* not needed unless using the expand all functionality
	print("	<script language=\"JavaScript\">\n");
	print("	<!--\n");
	print("	var task_children_".$task->id." = Array(");
	for ($i = 0; $i < count($displayed_children); $i++) {
		print($displayed_children[$i]);
		if ($i + 1 < count($displayed_children)) {
			print(",");
		}
	}
	print(");\n");
	print("	//-->\n");
	print("	</script>\n");
*/
	print("	<table width=\"100%\" cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n");
	print("		<tr valign=\"top\">\n");
	if (($show_completed_tasks == 1 && count($task->children) > 0) || ($show_completed_tasks == 0 && count($task->open_children) > 0)) {
		if ((count($tree_display_task->lineage) > 0 && in_array($task->id, $tree_display_task->lineage)) || $task->id == $root) {
			if ($levels < 1) {
				$levels = 1;
			}
			print("			<td width=\"1%\"><a href=\"javascript:uRailToggleTreeNode('".$task->id."',".$child_color.",".$root.",'".$screen."',".$show.",".$show_completed_tasks.");\"><img src=\"images/tree_open.gif\" border=\"0\" id=\"tree_icon_".$task->id."\" alt=\"".$language->icons["tree_toggle"]."\" title=\"".$language->icons["tree_toggle_tip"]."\"></a></td>\n");
		}
		else {
			print("			<td width=\"1%\"><a href=\"javascript:uRailToggleTreeNode('".$task->id."',".$child_color.",".$root.",'".$screen."',".$show.",".$show_completed_tasks.");\"><img src=\"images/tree_closed.gif\" border=\"0\" id=\"tree_icon_".$task->id."\" alt=\"".$language->icons["tree_toggle"]."\" title=\"".$language->icons["tree_toggle_tip"]."\"></a></td>\n");
		}
	}
	else {
		print("			<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"16\"></td>\n");
	}
	print("			<td>\n");
	print("				<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n");
	print("					<tr>\n");
	print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"3\"></td>\n");
	print("						<td width=\"1%\" valign=\"top\"><img src=\"images/icon_priority_".$task->priority.".gif\" height=\"16\" width=\"14\" alt=\"".$language->variable($language->icons["priority"], get_friendly_priority($task->priority))."\" title=\"".$language->variable($language->icons["priority"], get_friendly_priority($task->priority))."\"></td>\n");
	if ($task->container == 1) {
		print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"1\"></td>\n");
		print("						<td width=\"1%\" valign=\"top\"><img src=\"images/icon_container.gif\" height=\"16\" width=\"13\" title=\"".$language->icons["sticky"]."\"></td>\n");
	}
	print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"1\"></td>\n");
	if ($task->obsolete == 1) {
		$obsolete = "style=\"color: black; text-decoration: line-through;\"";
	}
	else {
		$obsolete = "";
	}
	print("						<td width=\"79%\">");
	print("<a href=\"index.php?screen=focus&root=".$task->id."&id=".$task->id."\" ".$obsolete.">");
	if ($task->status == "100") {
		print($title_HTML);
	}
	else {
		print("<b>".$title_HTML."</b>");
	}
	print("</a>");
	if ($task->date_due != "0000-00-00" || ($task->status != 0 && $task->status != 100)) {
		print("<br>");
		if ($task->status != 0 && $task->status != 100) {
			print($language->variable($language->tree["status"], $task->status));
		}
		if ($task->date_due != "0000-00-00" && $task->status != 100) {
			print(" - ".$language->tree["due"]." ");
			print_relative_date_due($task->date_due);
		}
	}
	print("</td>\n");
	print("						<td width=\"10%\" align=\"right\" nowrap>".$language->tree["id"]." ".$task->id."</td>\n");
	if ($task->obsolete != 1) {
		print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"5\"></td>\n");
	// edit
		print("						<td width=\"1%\"><a href=\"index.php?screen=edit&id=".$task->id."&root=".$root."\"><img src=\"images/icon_edit.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"edit_icon_".$task->id."\" alt=\"".$language->icons["edit"]."\" title=\"".$language->icons["edit"]."\"></a></td>\n");
		print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"5\"></td>\n");
	// new child
		print("						<td width=\"1%\"><a href=\"index.php?screen=edit&parent=".$task->id."&root=".$root."\"><img src=\"images/icon_new_child.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"new_child_icon_".$task->id."\" alt=\"".$language->icons["new_sub_task"]."\" title=\"".$language->icons["new_sub_task"]."\"></a></td>\n");
		print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"5\"></td>\n");
	// complete
		if ($task->status == 100) {
			print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"complete_icon_".$task->id."\" alt=\"".$language->icons["completed"]."\" title=\"".$language->icons["completed"]."\"></td>\n");
		}
		else {
			print("						<td width=\"1%\"><a href=\"javascript:markComplete(".$task->id.", '".$screen."', ".$root.");\"><img src=\"images/icon_complete.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"complete_icon_".$task->id."\" alt=\"".$language->icons["mark_complete"]."\" title=\"".$language->icons["mark_complete"]."\"></a></td>\n");
		}
		print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"5\"></td>\n");
	// delete
		print("						<td width=\"1%\"><a href=\"javascript:if (confirm('".$language->variable($language->messages["confirm_delete"],addslashes($title_HTML))."')) { location.href='index.php?screen=".$screen."&root=".$root."&id=".$task->id."&action=delete'; }\"><img src=\"images/icon_delete.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"delete_icon_".$task->id."\" alt=\"".$language->icons["delete"]."\" title=\"".$language->icons["delete"]."\"></a></td>\n");
	}
	print("						<td width=\"1%\"><img src=\"images/clear.gif\" height=\"1\" width=\"5\"></td>\n");
	if ($task->id == $show) {
		print("						<td width=\"1%\"><a href=\"javascript:toggleForm('".$task->id."');\"><img src=\"images/form_open.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"form_icon_".$task->id."\" alt=\"".$language->icons["hide_show"]."\" title=\"".$language->icons["hide_show_tip"]."\"></a></td>\n");
	}
	else {
		print("						<td width=\"1%\"><a href=\"javascript:toggleForm('".$task->id."');\"><img src=\"images/form_closed.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"form_icon_".$task->id."\" alt=\"".$language->icons["hide_show"]."\" title=\"".$language->icons["hide_show_tip"]."\"></a></td>\n");
	}
//	print("						<td width=\"1%\"><a href=\"javascript:toggleForms('".$task->id."', task_children_".$task->id.");");
//	print("\"><img src=\"images/forms_closed.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"forms_icon_".$task->id."\"></a></td>\n");
	print("					</tr>\n");
	print("				</table>\n");
	if ($task->id == $show) {
		$temp_display = "block";
	}
	else {
		$temp_display = "none";
	}
	print("				<div id=\"task_body_".$task->id."\" style=\"display: ".$temp_display."\">\n");
	print("					<div style=\"background: ".$hr_color."; margin-top: 5px;\"><img src=\"images/clear.gif\" height=\"1\" width=\"1\"></div>\n");
	print_task_view($task);
	if (count($task->children) > 0) {
		if (count($task->open_children) == 1) {
			$subtask_label = $language->variable($language->tree["open_sub_task"], count($task->children));
		}
		else {
			$subtask_label = $language->variables($language->tree["open_sub_tasks"], array(count($task->open_children), count($task->children)));
		}
		if ((count($tree_display_task->lineage) > 0 && in_array($task->id, $tree_display_task->lineage)) || $task->id == $root) {
			$temp_display = "none";
		}
		else {
			$temp_display = "block";
		}
		print("				<div id=\"task_children_summary_".$task->id."\" class=\"".$task_child_class."\" style=\"display: ".$temp_display."; padding: 3px;\">".$subtask_label."</div>\n");
	}
	print("				</div>\n");
	if (count($task->children) > 0) {
		if (((count($tree_display_task->lineage) > 0 && in_array($task->id, $tree_display_task->lineage)) || $task->id == $root) && (count($task->open_children) > 0 || $show_completed_tasks == 1)) {
			$temp_display = "block";
		}
		else {
			$temp_display = "none";
		}
		print("				<div id=\"task_children_".$task->id."\" style=\"display: ".$temp_display."; color: #666;\">");
		if ($levels > 0) {
			for ($i = 0; $i < count($displayed_children); $i++) {
				$child = new task;
				$child->retrieve($displayed_children[$i]);
				if ($color == 0) {
					$new_color = 1;
				}
				else {
					$new_color = 0;
				}
				print_task_level($child, $new_color, $show, $root, $screen, $show_completed_tasks, $levels - 1);
			}
		}
		else {
			print($language->tree["loading"]);
		}
		print("</div>\n");
	}
	print("			</td>\n");
	print("		</tr>\n");
	print("	</table>\n");
	print("</div>");
}


function print_task_list($list = array(), $title, $screen = "confirm", $sorted_by = "", $return_query = "", $banner = "", $show_edit = 1, $show_complete = 1, $show_delete = 1, $show_new_child = 1, $show_duplicate = 0) {
	global $database, $language;
	if (count($list) > 0) {
		$list_string = implode(",", $list);
	}
	else {
		$list_string = "";
	}
	$icon_sort_up = '<img src="images/icon_sort_up.gif" alt="" height="6" width="11">';
	$icon_sort_down = '<img src="images/icon_sort_down.gif" alt="" height="6" width="11">';
	print("<div class=\"groupBorder\"");
// hack to handle weird spacing with IE and mozilla
	if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), "msie") != false) {
		print(" style=\"width: 100%;\"");
	}
	print(">\n");
	print("<div class=\"groupHeader\">\n");
	print("		".$title."\n");
	print("</div>\n");
	print("<table width=\"100%\" cellpadding=\"2\" cellspacing=\"1\">\n");
		if (count($list) > 0) {
			print('	<tr valign="top">'."\n");
			if ($banner == "") {
				print('		<td colspan="10">'.$language->variable($language->list["banner"], count($list)).'</td>'."\n");
			}
			else {
				print('		<td colspan="10">'.str_replace("#", count($list), $banner).'</td>'."\n");
			}
			print('	</tr>'."\n");
		}
	print('	<tr class="rowHeader">'."\n");
	print('		<td width="5%">'.$language->list["id"].'</td>'."\n");
	print('		<td width="1%"><img src="images/clear.gif" height="1" width="13" border="0" alt=""></td>'."\n");
	switch ($sorted_by) {
		case "title":
			$sort_string = "title";
			break;
		case "title_rev":
			$sort_string = "title DESC";
			break;
		case "date_due":
			$sort_string = "date_due, title";
			break;
		case "date_due_rev":
			$sort_string = "date_due DESC, title";
			break;
		case "date_modified":
			$sort_string = "date_modified DESC";
			break;
		case "priority":
			$sort_string = "priority DESC, title";
			break;
		case "priority_rev":
			$sort_string = "priority, title";
			break;
		case "status":
			$sort_string = "status DESC, title";
			break;
		case "status_rev":
			$sort_string = "status, title";
			break;
		default:
			$sorted_by = "title";
			$sort_string = "title";
			break;
	}
	if ($sorted_by == "title") {
		print('		<td><a href="index.php?screen='.$screen.'&sort=title_rev&list='.$list_string.$return_query.'">'.$language->list["title"].'</a> '.$icon_sort_up.'</td>'."\n");
	}
	elseif ($sorted_by == "title_rev") {
		print('		<td><a href="index.php?screen='.$screen.'&sort=title&list='.$list_string.$return_query.'">'.$language->list["title"].'</a> '.$icon_sort_down.'</td>'."\n");
	}
	else {
		print('		<td><a href="index.php?screen='.$screen.'&sort=title&list='.$list_string.$return_query.'">'.$language->list["title"].'</a></td>'."\n");
	}

	if ($sorted_by == "date_due") {
		print('		<td width="10%"><nobr><a href="index.php?screen='.$screen.'&sort=date_due_rev&list='.$list_string.$return_query.'">'.$language->list["date_due"].'</a> '.$icon_sort_up.'</nobr></td>'."\n");
	}
	elseif ($sorted_by == "date_due_rev") {
		print('		<td width="10%"><nobr><a href="index.php?screen='.$screen.'&sort=date_due&list='.$list_string.$return_query.'">'.$language->list["date_due"].'</a> '.$icon_sort_down.'</nobr></td>'."\n");
	}
	else {
		print('		<td width="10%"><nobr><a href="index.php?screen='.$screen.'&sort=date_due&list='.$list_string.$return_query.'">'.$language->list["date_due"].'</a></nobr></td>'."\n");
	}

	if ($sorted_by == "status") {
		print('		<td width="5%" align="center" width="1%"><nobr><a href="index.php?screen='.$screen.'&sort=status_rev&list='.$list_string.$return_query.'">'.$language->list["status"].'</a> '.$icon_sort_down.'</nobr></td>'."\n");
	}
	elseif ($sorted_by == "status_rev") {
		print('		<td width="5%" align="center" width="1%"><nobr><a href="index.php?screen='.$screen.'&sort=status&list='.$list_string.$return_query.'">'.$language->list["status"].'</a> '.$icon_sort_up.'</nobr></td>'."\n");
	}
	else {
		print('		<td width="5%" align="center" width="1%"><nobr>&nbsp;<a href="index.php?screen='.$screen.'&sort=status&list='.$list_string.$return_query.'">'.$language->list["status"].'</a>&nbsp;</nobr></td>'."\n");
	}

	if ($sorted_by == "priority") {
		print('		<td width="5%" align="center" width="1%"><nobr><a href="index.php?screen='.$screen.'&sort=priority_rev&list='.$list_string.$return_query.'">'.$language->list["priority"].'</a> '.$icon_sort_down.'</nobr></td>'."\n");
	}
	elseif ($sorted_by == "priority_rev") {
		print('		<td width="5%" align="center" width="1%"><nobr><a href="index.php?screen='.$screen.'&sort=priority&list='.$list_string.$return_query.'">'.$language->list["priority"].'</a> '.$icon_sort_up.'</nobr></td>'."\n");
	}
	else {
		print('		<td width="5%" align="center" width="1%"><nobr>&nbsp;<a href="index.php?screen='.$screen.'&sort=priority&list='.$list_string.$return_query.'">'.$language->list["priority"].'</a>&nbsp;</nobr></td>'."\n");
	}
	if ($show_edit == 1) {
		print('		<td width="1%"><img src="images/clear.gif" height="1" width="16" alt="" /></td>'."\n");
	}
/*
	if ($show_duplicate == 1) {
		print('		<td width="1%"><img src="images/clear.gif" height="1" width="16" alt="" /></td>'."\n");
	}
*/
	if ($show_complete == 1) {
		print('		<td width="1%"><img src="images/clear.gif" height="1" width="16" alt="" /></td>'."\n");
	}
	if ($show_delete == 1) {
		print('		<td width="1%"><img src="images/clear.gif" height="1" width="16" alt="" /></td>'."\n");
	}
	if ($show_new_child == 1) {
		print('		<td width="1%"><img src="images/clear.gif" height="1" width="16" alt="" /></td>'."\n");
	}
	print("	</tr>\n");
	if (count($list) == 0) {
		print('	<tr valign="top" class="rowOdd">'."\n");
		print('		<td colspan="10">'.$language->list["no_items"].'</td>'."\n");
		print('	</tr>'."\n");
	}
	else {
		$result = mysql_query("SELECT parent, status FROM $database->table_name "
		                     ."WHERE parent != '0' "
		                     ."AND obsolete != '1' "
		                     );
		$parents = array();
		$parents_open = array();
		while (list($parent,$status) = mysql_fetch_array($result)) {
			if ($status != 100) {
				$parents_open[] = $parent;
			}
			$parents[] = $parent;
		}
		$result = mysql_query("SELECT ID, title, notes, status, priority, date_due, container, obsolete FROM $database->table_name "
		                     ."WHERE ID IN (".$list_string.") "
		                     ."ORDER BY ".$sort_string
		                     );
		$i = 0;
		while (list($id,$title,$notes,$status,$priority,$date_due,$container,$obsolete) = mysql_fetch_array($result)) {
			$task = new task;
			$task->id = $id;
			$task->title = $title;
			$task->notes = $notes;
			$task->status = $status;
			$task->priority = $priority;
			$task->date_due = $date_due;
			$task->container = $container;
			$task->obsolete = $obsolete;
			
			$children = array_count_values($parents);
			if (array_key_exists($task->id, $children)) {
				$children = $children[$task->id];
			}
			else {
				$children = 0;
			}
			$open_children = array_count_values($parents_open);
			if (array_key_exists($task->id, $open_children)) {
				$open_children = $open_children[$task->id];
			}
			else {
				$open_children = 0;
			}
			$title_HTML = html($task->title);
			$row_color = "rowEven";
			if ($i % 2 == 0 || $i == 0) {
				$row_color = "rowOdd";
			}
			$obsolete = "";
			if ($task->obsolete == 1) {
				$obsolete = " style=\"color: black; text-decoration: line-through;\"";
			}
			print('	<tr valign="top" class="'.$row_color.'">'."\n");
			print("		<td><a href=\"index.php?screen=focus&root=".$task->id."&id=".$task->id."\"".$obsolete.">".$task->id."</a></td>\n");
			print("		<td>");
			if ($task->container == 1) {
				print("<img src=\"images/icon_container.gif\" height=\"16\" width=\"13\" border=\"0\" alt=\"".$language->icons["sticky"]."\" title=\"".$language->icons["sticky"]."\">");
			}
			else {
				print("&nbsp;");
			}
			print("</td>\n");
			if ($children > 0) {
				if ($open_children == 1) {
					$subtask_label = $language->variable($language->tree["open_sub_task"], $children);
				}
				else {
					$subtask_label = $language->variables($language->tree["open_sub_tasks"], array($open_children, $children));
				}
				$temp = "<br>".$subtask_label."\n";
			}
			else {
				$temp = "";
			}
			if ($task->status == 100) {
				print("		<td><a href=\"index.php?screen=focus&root=".$task->id."&id=".$task->id."\" title=\"".trim_add_elipsis(html($task->notes),100)."\" ".$obsolete.">".$title_HTML."</a>".$temp."</td>\n");
			}
			else {
				print("		<td><a href=\"index.php?screen=focus&root=".$task->id."&id=".$task->id."\" title=\"".trim_add_elipsis(html($task->notes),100)."\" ".$obsolete."><b>".$title_HTML."</b></a>".$temp."</td>\n");
			}
			if ($task->obsolete == 1) {
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
				print("		<td>&nbsp;</td>\n");
			}
			else {
				if ($task->date_due != "0000-00-00") {
					print("		<td>");
					$bold = 0;
					if ($task->status != 100) {
						$bold = 1;
					}
					print_relative_date_due($task->date_due, $bold);
					print("</td>\n");
				}
				else {
					print("		<td>&nbsp;</td>\n");
				}
				if ($task->status == 100) {
					print("		<td align=\"center\">".$language->list["done"]."</td>\n");
				}
				else {
					print("		<td align=\"center\">".$task->status."%</td>\n");
				}
				print("		<td align=\"center\"><img src=\"images/icon_priority_".$task->priority.".gif\" height=\"16\" width=\"14\" alt=\"".$language->variable($language->icons["priority"], get_friendly_priority($task->priority))."\" title=\"".$language->variable($language->icons["priority"], get_friendly_priority($task->priority))."\"></td>\n");
				if ($show_edit == 1) {
					print("		<td align=\"center\"><a href=\"index.php?screen=edit&id=".$task->id."\"><img src=\"images/icon_edit.gif\" height=\"16\" width=\"16\" border=\"0\" alt=\"".$language->icons["edit"]."\" title=\"".$language->icons["edit"]."\"></a></td>\n");
				}
				if ($show_new_child == 1) {
					print("		<td align=\"center\"><a href=\"index.php?screen=edit&parent=".$task->id."\"><img src=\"images/icon_new_child.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"new_child_icon_".$task->id."\" alt=\"".$language->icons["new_sub_task"]."\" title=\"".$language->icons["new_sub_task"]."\"></a></td>\n");
				}
				if ($show_complete == 1) {
					if ($task->status == 100) {
						print("		<td align=\"center\"><img src=\"images/clear.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"complete_icon_".$task->id."\" alt=\"".$language->icons["completed"]."\" title=\"".$language->icons["completed"]."\"></td>\n");
					}
					else {
						print("		<td align=\"center\"><a href=\"javascript:markComplete(".$task->id.", '".$screen."');\"><img src=\"images/icon_complete.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"complete_icon_".$task->id."\" alt=\"".$language->icons["mark_complete"]."\" title=\"".$language->icons["mark_complete"]."\"></a></td>\n");
					}
				}
				if ($show_delete == 1) {
					print("		<td align=\"center\"><a href=\"javascript:if (confirm('".$language->variable($language->messages["confirm_delete"],addslashes($title_HTML))."')) { location.href='index.php?screen=".$screen."&id=".$task->id."&action=delete'; }\"><img src=\"images/icon_delete.gif\" height=\"16\" width=\"16\" border=\"0\" id=\"delete_icon_".$task->id."\" alt=\"".$language->icons["delete"]."\" title=\"".$language->icons["delete"]."\"></a></td>\n");
				}
			}
			print("	</tr>\n");
			$i++;
		}
	}
	print("</table>\n");
	print("</div>\n");
}

function trim_add_elipsis($string, $limit = 100) {
	if (strlen($string) > $limit) {
		$string = substr($string, 0, $limit)."...";
	}
	return $string;
}

function get_breadcrumbs($id) {
	global $language;
	$task = new task;
	$task->retrieve($id);
	$breadcrumbs = "<a href=\"javascript:confirmNav('location.href=\'index.php?screen=home\'');\">".$language->breadcrumbs["home"]."</a>";
	for ($i = (count($task->lineage) - 1); $i >= 0; $i--) {
		$temp = new task;
		$temp->retrieve($task->lineage[$i]);
		$temp_title = trim_add_elipsis($temp->title, 25);
		$temp_title = html($temp_title);
		$breadcrumbs = $breadcrumbs." &gt; <a href=\"javascript:confirmNav('location.href=\'index.php?screen=focus&root=".$temp->id."\'');\">".$temp_title."</a>";
	}
	$temp_title = trim_add_elipsis($task->title, 25);
	$temp_title = html($temp_title);
	$breadcrumbs = $breadcrumbs.' &gt; <span id="current_breadcrumb">'.$temp_title.'</span>';
	return $breadcrumbs;
}

function get_breadcrumbs_for_new_task($id) {
	$task = new task;
	$task->retrieve($id);
	$breadcrumbs = "<a href=\"javascript:confirmNav('location.href=\'index.php?screen=home\'');\">Home</a>";
	for ($i = (count($task->lineage) - 1); $i >= 0; $i--) {
		$temp = new task;
		$temp->retrieve($task->lineage[$i]);
		$temp_title = trim_add_elipsis($temp->title, 25);
		$temp_title = html($temp_title);
		$breadcrumbs = $breadcrumbs." &gt; <a href=\"javascript:confirmNav('location.href=\'index.php?screen=focus&root=".$temp->id."\'');\"><nobr>".$temp_title."</nobr></a>";
	}
	$temp_title = trim_add_elipsis($task->title, 25);
	$temp_title = html($temp_title);
	$breadcrumbs = $breadcrumbs." &gt; <a href=\"javascript:confirmNav('location.href=\'index.php?screen=focus&root=".$task->id."\'');\"><nobr>".$temp_title."</nobr></a>";
	return $breadcrumbs;
}

function get_dropdown($select_name, $options, $key, $style = "width: 100%;", $extra = "") {
	$temp = "<select name=\"".$select_name."\" class=\"one_pixel_border\" style=\"".$style."\" ".$extra.">\n";
	for ($i = 0; $i < count($options); $i++) {
		if ($key == $options[$i][0]) {
			$temp .="	<option value=\"".$options[$i][0]."\" selected>".$options[$i][1]."</option>\n";
		}
		else {
			$temp .= "	<option value=\"".$options[$i][0]."\">".$options[$i][1]."</option>\n";
		}
	}
	$temp .= "</select>\n";
	return $temp;
}

function print_dropdown($select_name, $options, $key, $style = "width: 100%;", $extra = "") {
	print(get_dropdown($select_name, $options, $key, $style, $extra));
}

function get_relative_date_due($date, $bold = 1) {
	global $language, $custom;
	$now = mktime() + ($custom->server_time_difference * 3600);
	if (!empty($date) && $date != "0000-00-00") {
		if ($date == date("Y-m-d", $now)) {
			$friendly = $language->data["rel_date_today"];
		}
		elseif ($date == date("Y-m-d", $now + 86400)) {
			$friendly = $language->data["rel_date_tomorrow"];
		}
		elseif ($date == date("Y-m-d", $now + 172800)) {
			$friendly = $language->variable($language->data["rel_date_days"], "2");
		}
		elseif ($date == date("Y-m-d", $now + 259200)) {
			$friendly = $language->variable($language->data["rel_date_days"], "3");
		}
		elseif ($date == date("Y-m-d", $now + 345600)) {
			$friendly = $language->variable($language->data["rel_date_days"], "4");
		}
		elseif ($date == date("Y-m-d", $now + 432000)) {
			$friendly = $language->variable($language->data["rel_date_days"], "5");
		}
		elseif ($date == date("Y-m-d", $now + 518400)) {
			$friendly = $language->variable($language->data["rel_date_days"], "6");
		}
		elseif ($date == date("Y-m-d", $now + 604800)) {
			$friendly = $language->data["rel_date_week"];
		}
		elseif ($date == date("Y-m-d", $now - 86400)) {
			$friendly = $language->data["rel_date_yesterday"];
		}
		elseif ($date == date("Y-m-d", $now - 172800)) {
			$friendly = $language->variable($language->data["rel_date_days_ago"], "2");
		}
		elseif ($date == date("Y-m-d", $now - 259200)) {
			$friendly = $language->variable($language->data["rel_date_days_ago"], "3");
		}
		elseif ($date == date("Y-m-d", $now - 345600)) {
			$friendly = $language->variable($language->data["rel_date_days_ago"], "4");
		}
		elseif ($date == date("Y-m-d", $now - 432000)) {
			$friendly = $language->variable($language->data["rel_date_days_ago"], "5");
		}
		elseif ($date == date("Y-m-d", $now - 518400)) {
			$friendly = $language->variable($language->data["rel_date_days_ago"], "6");
		}
		elseif ($date == date("Y-m-d", $now - 604800)) {
			$friendly = $language->data["rel_date_week_ago"];
		}
		else {
			$friendly = custom_date(substr($date, 0, 4), substr($date, 5, 2), substr($date, 8, 2));
			$friendly = $language->variable($language->data["rel_date"], $friendly);
		}
		if ($bold == 1 && $date <= date("Y-m-d", $now)) {
			$friendly = "<b>".$friendly."</b>";
		}
	}
	else {
		$friendly = "";
	}
	return $friendly;
}

function print_relative_date_due($date, $bold = 1) {
	print(get_relative_date_due($date, $bold));
}

function redirect_to_mobile() {
	$small_browsers = array("Elaine/3.0"
						   ,"Palm"
						   ,"EudoraWeb"
						   ,"Blazer"
						   ,"AvantGo"
						   ,"Windows CE"
						   ,"Cellphone"
						   ,"Small"
						   ,"MMEF20"
						   ,"Danger"
						   ,"hiptop"
						   ,"Proxinet"
						   ,"Newt"
						   ,"PalmOS"
						   ,"NetFront"
						   ,"SEC-SGHS105"
						   ,"SHARP-TQ-GX10"
						   ,"SonyEricsson"
						   );
	foreach ($small_browsers as $browser) {
		if (strstr($_SERVER["HTTP_USER_AGENT"], $browser) != false) {
			$URL = 'mobile.php';
			header("Location: $URL".$_SERVER["QUERY_STRING"]);
		}
	}
}

function get_friendly_priority($priority) {
	global $language;
	return $language->data["priority_".$priority];
}

function print_parent_picker_tree($tasks, $level = 0, $color = 0, $parent, $target = "edit") {
	if ($level == 0) {
		$pre = "<b>";
		$post = "</b>";
	}
	else {
		$pre = "";
		$post = "";
	}
	$indent = "";	
	for ($i = 0; $i < $level; $i++) {
		$indent = $indent."&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	foreach ($tasks as $task) {
		if ($task[2] == $parent) {
			if ($color == 0 || ($color % 2 == 0)) {
				$class = "rowEven";
			}
			else {
				$class = "rowOdd";
			}
			print("<div class='$class' style='padding: 3px;'><nobr>".$indent
			     ."<a href=\"javascript:pickParent('".$task[0]."','".$target."');\">".$pre.html(trim_add_elipsis($task[1],50)).$post."</a>"
			     ." (ID: <a href=\"javascript:pickParent('".$task[0]."','".$target."');\">".$task[0]."</a>)"
			     ."</nobr></div>\n");
			$color += 1;
			$color = print_parent_picker_tree($tasks, $level + 1, $color, $task[0], $target);
		}
	}
	return $color;
}

function microtime_diff($a, $b) {
   list($a_dec, $a_sec) = explode(" ", $a);
   list($b_dec, $b_sec) = explode(" ", $b);
   return $b_sec - $a_sec + $b_dec - $a_dec;
}

function get_leaf_tasks($limit = 100) {
	global $database;
	if ($limit > 0) {
		$limit = " LIMIT ".$limit;
	}
	else {
		$limit = "";
	}
	$result = mysql_query("SELECT DISTINCT (parent) FROM $database->table_name");
	$tasks = "";
	while ($parent_id = mysql_fetch_row($result)) {
		$tasks .= $parent_id[0].",";
	}
	$tasks = substr($tasks, 0, (strlen($tasks) - 1));
	$query = "SELECT ID FROM $database->table_name "
			."WHERE obsolete != '1' "
			."AND (status != '100' OR container = '1') "
			."AND ID NOT IN (".$tasks.") " // a child id
			.$limit
			;
	$result = mysql_query($query);
	$tasks = array();
	if ($result != false) {
		while ($list_id = mysql_fetch_array($result)) {
			$tasks[] = $list_id[0];
		}
	}
	return $tasks;
}

function strip_HTML($string) {
	return preg_replace("/<.*?>/", "", $string);
}

?>