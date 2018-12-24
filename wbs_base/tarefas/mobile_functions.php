<?php

function get_breadcrumbs_m($id) {
	global $language;
	$task = new task;
	$task->retrieve($id);
	$breadcrumbs = '<a href="index.php?screen=home">'.$language->breadcrumbs["home"].'</a>';
	for ($i = (count($task->lineage) - 1); $i >= 0; $i--) {
		$temp = new task;
		$temp->retrieve($task->lineage[$i]);
		$title = html(trim_add_elipsis($temp->title, 25));
		$breadcrumbs .= " &gt; <a href=\"index.php?screen=focus&root=".$temp->id."\">".$title."</a>";
	}
	$title = html(trim_add_elipsis($task->title, 25));
	$breadcrumbs = $breadcrumbs.' &gt; <span id="current_breadcrumb">'.$title.'</span>';
	return $breadcrumbs;
}

function get_breadcrumbs_for_new_task_m($id) {
	global $language;
	$task = new task;
	$task->retrieve($id);
	$breadcrumbs = '<a href="index.php?screen=home">'.$language->breadcrumbs["home"].'</a>';
	for ($i = (count($task->lineage) - 1); $i >= 0; $i--) {
		$temp = new task;
		$temp->retrieve($task->lineage[$i]);
		$title = html(trim_add_elipsis($temp->title, 25));
		$breadcrumbs .= " &gt; <a href=\"index.php?screen=focus&root=".$temp->id."\"><nobr>".$title."</nobr></a>";
	}
	$title = html(trim_add_elipsis($task->title, 25));
	$breadcrumbs = $breadcrumbs." &gt; <a href=\"index.php?screen=focus&root=".$task->id."\"><nobr>".$title."</nobr></a>";
	return $breadcrumbs;
}

function get_task_level_m($task, $color = 0, $show = 0, $root = 0, $screen = "", $show_completed_tasks = 0, $levels = 0, $indent = 0) {
	global $language;
	$title_HTML = html(trim_add_elipsis($task->title, 25));
	$screen = "home";
	if ($root != 0) {
		$screen = "focus";
	}
	$displayed_children = $task->open_children;
	if ($show_completed_tasks == 1) {
		$displayed_children = $task->children;
	}
	$item = '';
	$item_indent = '';
	for ($i = 0; $i < $indent; $i++) {
		$item_indent .= '&nbsp;&nbsp;';
	}
	$item .= '<p>'.$item_indent;
	if (count($displayed_children) > 0) {
		if ($levels > 0) {
			$item .= '[-]';
		}
		else {
			$item .= '[<a href="mobile.php?screen=focus&root='.$task->id.'&id='.$task->id.'">+</a>]';
		}
	}
	$item .= '<nobr>';
	if ($task->container == 1) {
		$item .= '*';
	}
	$item .= '<a href="mobile.php?screen=view&root='.$task->id.'&id='.$task->id.'">';
	if ($task->status == "100") {
		$item .= $title_HTML;
	}
	else {
		$item .= '<b>'.$title_HTML.'</b>';
	}
	$item .= '</a></nobr><br><nobr>';

	$item .= $item_indent.'<a href="mobile.php?screen=edit&id='.$task->id.'">'.$language->toolbar["edit"].'</a> | <a href="mobile.php?screen=edit&parent='.$task->id.'">'.$language->toolbar["new_sub_m"].'</a>';
	if ($task->status != '100') {
		$item .= ' | <a href="mobile.php?screen=confirm&action=complete&id='.$task->id.'">'.$language->toolbar["mark_complete_m"].'</a>';
	}
	if ($task->obsolete != 1) {
		$item .= ' | <a href="mobile.php?screen=confirm&action=delete&id='.$task->id.'">'.$language->toolbar["delete"].'</a>';
	}
	$item .= '</nobr></p>'."\n";

	if ($levels > 0) {
		if (count($displayed_children) > 0) {
			foreach ($displayed_children as $temp) {
				$child = new task;
				$child->retrieve($temp);
				$item .= get_task_level_m($child, 0, 0, $root, $screen, $show_completed_tasks, $level - 1, $indent + 1);
			}
		}
	}

	return $item;
}

function print_task_level_m($task, $color = 0, $show = 0, $root = 0, $screen = "", $show_completed_tasks = 0, $levels = 0, $indent = 0) {
	print(get_task_level_m($task, $color, $show, $root, $screen, $show_completed_tasks, $levels, $indent));
}

function print_task_edit_m($task, $screen = "focus") {
	global $_REQUEST, $root, $language;
	$title_HTML = html($task->title);
	$notes_HTML = html($task->notes);
	$edit = '<p><input type="submit" value="'.strip_HTML($language->toolbar["save"]).'" /> ';
	if (isset($_REQUEST["post_save_nav"])) {
		$value = $_REQUEST["post_save_nav"];
	}
	else {
		$value = "view";
	}
	$temp = array(array("view"
					   ,$language->form["view_tree"]
					   )
				 ,array("parent"
					   ,$language->form["view_parent"]
					   )
				 ,array("continue"
					   ,$language->form["stay_here"]
					   )
				 ,array("home"
					   ,$language->form["return_home"]
					   )
				 );
	$edit .= get_dropdown("post_save_nav", $temp, $value, "");
	$edit .= '<br><a href="mobile.php?screen=edit&parent='.$task->id.'">'.$language->toolbar["new_sub"].'</a> | <a href="mobile.php?screen=confirm&action=delete&id='.$task->id.'">'.$language->toolbar["delete"].'</a>';
	$edit .= '<p>'.$language->form["title"].'<br><input type="text" name="task_title" size="25" value="'.$title_HTML.'"></p>'."\n";
	$edit .= '<p>'.$language->form["notes"].'<br><textarea name="task_notes" class="one_pixel_border" cols="25" rows="5" wrap="virtual">'.$notes_HTML.'</textarea></p>'."\n";
	$edit .= '<nobr>'.$language->form["status"].' ';
	if (count($task->children) == 0) {
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
		$edit .= get_dropdown("task_status", $temp, $task->status, "");
	}
	else {
		$edit .= $task->status;
	}
	$edit .= '</nobr></p>'."\n";
	$temp = array(array(1
	                   ,"Lowest"
	                   )
	             ,array(2
	                   ,"Low"
	                   )
	             ,array(3
	                   ,"Medium"
	                   )
	             ,array(4
	                   ,"High"
	                   )
	             ,array(5
	                   ,"Highest"
	                   )
	             );
	$edit .= '<p><nobr>'.$language->form["priority"].' '.get_dropdown("task_priority", $temp, $task->priority, "").'</nobr></p>';
	if ($task->parent == 0) {
		$display_parent = "";
	}
	else {
		$display_parent = $task->parent;
	}
	$edit .= '<p>'.$language->form["parent"].' <input name="task_parent" type="text" value="'.$display_parent.'" size="5"></p>'."\n";
	$edit .= '<nobr><input type="checkbox" name="task_container" value="1"';
	if ($task->container == 1) {
		$edit .= " checked";
	}
	$edit .= '> '.$language->form["sticky"].'</nobr></p>'."\n";
	$edit .= '<p>'.$language->form["date_due"].' ';
	if (empty($task->id)) {
		$task->date_due = date("Y-m-d", mktime() + ($custom->server_time_difference * 3600));
	}
	$temp = array(array("",""));
	for ($i = 1; $i < 13; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	$month = get_dropdown("task_month", $temp, substr($task->date_due, 5, 2), "");
	$temp = array(array("",""));
	for ($i = 1; $i < 32; $i++) {
		$temp[] = array(substr($i+100,1)
		               ,$i
		               );
	}
	$day = get_dropdown("task_day", $temp, substr($task->date_due, 8, 2),"");
	$temp = array(array("",""));
	global $custom;
	for ($i = $custom->year_min; $i <= $custom->year_max; $i++) {
		$temp[] = array($i
		               ,$i
		               );
	}
	$year = get_dropdown("task_year", $temp, substr($task->date_due, 0, 4),"");
	
	for ($i = 0; $i < strlen($custom->date_format); $i++) {
		$temp = substr($custom->date_format, $i, 1);
		switch ($temp) {
			case "y":
				$edit .= $year.' ';
				break;
			case "m":
				$edit .= $month.' ';
				break;
			case "d":
				$edit .= $day.' ';
				break;
		}
	}

	$edit .= '</nobr></p>';
	$edit .= '<p>'.$language->form["urls"].'<br>'."\n";
	$edit .= '<input type="text" name="task_URL_1" size="25" value="'.$task->URL_1.'"><br>'."\n";
	$edit .= '<input type="text" name="task_URL_2" size="25" value="'.$task->URL_2.'"><br>'."\n";
	$edit .= '<input type="text" name="task_URL_3" size="25" value="'.$task->URL_3.'"></p>'."\n";
	if (count($task->children) > 0) {
		$edit .= '<p>';
		if (count($task->open_children) == 1) {
			$edit .= $language->variable(strip_HTML($language->tree["open_sub_task"]),count($task->children));
		}
		else {
			$edit .= $language->variables(strip_HTML($language->tree["open_sub_tasks"])
                                         ,array(count($task->open_children)
                                               ,count($task->children)
                                               )
                                         );
		}
		$edit .= '</p>'."\n";
	}

	print($edit);
	
}

function print_task_list_m($list, $title, $screen = "confirm", $banner = "(#)", $show_edit = 1, $show_complete = 1, $show_delete = 1, $show_new_child = 1, $show_duplicate = 0) {
	global $language, $mb_languages;
	if ($banner != "" && count($list) > 0) {
		$banner = str_replace("#", count($list), $banner);
	}
	else {
		$banner = str_replace("#", 0, $banner);
	}
	$string = '<p><b>'.$title.'</b> '.$banner.'</p>'."\n";
	if (count($list) == 0) {
		$string .= '<p>'.$language->list["no_items"].'</p>'."\n";
	}
	else {
		$row_color = 1;
		foreach ($list as $id) {
			$task = new task;
			$task->retrieve($id);
			if (in_array($language->charset, $mb_languages)) {
				switch ($language->charset) {
					case "Shift_JIS":
						$this = convert_task_encoding($this, 'UTF-8', 'SJIS');
						break;
				}
			}
			$title_HTML = html(trim_add_elipsis($task->title, 25));

			if (count($task->children) > 0) {
				$temp = " (".count($task->open_children)."/".count($task->children).")\n";
			}
			else {
				$temp = "";
			}
			if (count($task->open_children) > 0) {
				$tree = '[<a href="mobile.php?screen=focus&root='.$task->id.'&id='.$task->id.'">+</a>]';
			}
			else {
				$tree = '';
			}

			$tools = '<a href="mobile.php?screen=edit&id='.$task->id.'">'.$language->toolbar["edit"].'</a> | <a href="mobile.php?screen=edit&parent='.$task->id.'">'.$language->toolbar["new_sub_m"].'</a>';
			if ($task->status != '100') {
				$tools .= ' | <a href="mobile.php?screen=confirm&action=complete&id='.$task->id.'">'.$language->toolbar["mark_complete_m"].'</a>';
			}
			if ($task->obsolete != 1) {
				$tools .= ' | <a href="mobile.php?screen=confirm&action=delete&id='.$task->id.'">'.$language->toolbar["delete"].'</a>';
			}

			$URL = 'mobile.php?screen=view&root='.$task->id.'&id='.$task->id;
			$string .= '<p>';
			if ($task->status = 100) {
				$string .= $tree.'<a href="'.$URL.'">'.$title_HTML.'</a>'.$temp.'<br>'.$tools;
			}
			else {
				$string .= $tree.'<a href="'.$URL.'"><b>'.$title_HTML.'</b></a>'.$temp.'<br>'.$tools;
				if ($task->date_due != "0000-00-00") {
					$string .= " ".$task->status."% - ".get_relative_date_due($task->date_due);
				}
				else {
					$string .= " ".$task->status."%";
				}
			}
			$string .= '</p>'."\n";
		}
	}
	print($string);
}

function print_task_view_m($task, $screen = "focus") {
	global $_REQUEST, $root, $language;
	$title_HTML = html($task->title);
	if ($task->container == 1) {
		$title_HTML = '* '.$title_HTML;
	}
	$view = '<p>'.$title_HTML.'<br>'."\n";
	$view .= '<a href="mobile.php?screen=edit&id='.$task->id.'">'.$language->toolbar["edit"].'</a> | <a href="mobile.php?screen=edit&parent='.$task->id.'">'.$language->toolbar["new_sub_m"].'</a> | <a href="mobile.php?screen=confirm&action=complete&id='.$task->id.'">'.$language->toolbar["mark_complete_m"].'</a> | <a href="mobile.php?screen=confirm&action=delete&id='.$task->id.'">'.$language->toolbar["delete"].'</a></p>';
	$view .= '<p>'.$language->form["notes"].'<br>'.str_replace("\n", "<br>", html($task->notes)).'</p>'."\n";
	$view .= '<p>'.$language->form["status"].' '.$task->status.'</nobr></p>'."\n";
	$view .= '<p>'.$language->form["priority"].' '.get_friendly_priority($task->priority);
	if ($task->parent != 0) {
		$view .= '<p>'.$language->form["parent"].' '.$task->parent.'</p>';
	}
	if (!empty($task->date_due) && $task->date_due != '0000-00-00') {
		$view .= '<p>'.$language->form["date_due"].' '.custom_date(substr($task->date_due, 0, 4), substr($task->date_due, 5, 2), substr($task->date_due, 8, 2)).'</p>';
	}
	if (($task->URL_1 != "") ||	($task->URL_2 != "") || ($task->URL_3 != "")) {
		$view .= '<p>'.$language->form["urls"].'<br>'."\n";
		if ($task->URL_1 != "") {
			$view .= '<a href="'.$task->URL_1.'">'.trim_add_elipsis($task->URL_1, 50).'</a>'."<br>\n";
		}
		if ($task->URL_2 != "") {
			$view .= '<a href="'.$task->URL_2.'">'.trim_add_elipsis($task->URL_2, 50).'</a>'."<br>\n";
		}
		if ($task->URL_3 != "") {
			$view .= '<a href="'.$task->URL_3.'">'.trim_add_elipsis($task->URL_3, 50).'</a>'."\n";
		}
		$view .= '</p>';
	}
	if (count($task->children) > 0) {
		$view .= '<p><a href="mobile.php?screen=focus&root='.$task->id.'">';
		if (count($task->open_children) == 1) {
			$view .= $language->variable(strip_HTML($language->tree["open_sub_task"])
			                            ,count($task->children)
			                            );
		}
		else {
			$view .= $language->variables(strip_HTML($language->tree["open_sub_tasks"])
                                         ,array(count($task->open_children)
                                               ,count($task->children)
                                               )
                                         );
		}
		$view .= '</a></p>'."\n";
	}

	print($view);

}



?>