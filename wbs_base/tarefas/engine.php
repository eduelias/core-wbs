<?

// set up screen variables
$screen = "home";
if (isset($_REQUEST["screen"])) {
	$screen = html($_REQUEST["screen"]);
}

if (isset($_REQUEST["show_completed_tasks"]) && $_REQUEST["show_completed_tasks"] == 1) {
	$page->add_flag("show_completed_tasks");
}
if (isset($_REQUEST["resolve"]) && $_REQUEST["resolve"] == 1) {
	$page->add_flag("resolve");
}

// set id, root & parent
$id = 0;
if (isset($_REQUEST["id"])) {
	$id = intval($_REQUEST["id"]);
}
$root = $id;
if (isset($_REQUEST["root"])) {
	$root = intval($_REQUEST["root"]);
}
if (isset($_REQUEST["parent"])) {
	$parent = intval($_REQUEST["parent"]);
}

if (isset($_REQUEST["action"])) {
	switch ($_REQUEST["action"]) {
		case "save":
			if (isset($_REQUEST["task_modified"])) {
				$task->date_modified = $_REQUEST["task_modified"];
			}
			if (isset($_REQUEST["task_title"])) {
				$task->title = $_REQUEST["task_title"];
			}
			if (isset($_REQUEST["task_notes"])) {
				$task->notes = $_REQUEST["task_notes"];
			}
			if (isset($_REQUEST["task_status"])) {
				$task->status = $_REQUEST["task_status"];
			}
			if (isset($_REQUEST["task_priority"])) {
				$task->priority = $_REQUEST["task_priority"];
			}
			if (isset($_REQUEST["task_parent"])) {
				$task->parent = $_REQUEST["task_parent"];
			}
			if (empty($task->parent)) {
				$task->parent = 0;
			}
			if (isset($_REQUEST["task_container"])) {
				$task->container = $_REQUEST["task_container"];
			}
			if (isset($_REQUEST["task_URL_1"])) {
				$task->URL_1 = $_REQUEST["task_URL_1"];
			}
			if (isset($_REQUEST["task_URL_2"])) {
				$task->URL_2 = $_REQUEST["task_URL_2"];
			}
			if (isset($_REQUEST["task_URL_3"])) {
				$task->URL_3 = $_REQUEST["task_URL_3"];
			}
// construct due date
			if (!empty($_REQUEST["task_year"])) {
				$task->date_due = $_REQUEST["task_year"];
			}
			else {
				$task->date_due = "0000";
			}
			if (!empty($_REQUEST["task_month"])) {
				$task->date_due = $task->date_due."-".$_REQUEST["task_month"];
			}
			else {
				$task->date_due = $task->date_due."-00";
			}
			if (!empty($_REQUEST["task_day"])) {
				$task->date_due = $task->date_due."-".$_REQUEST["task_day"];
			}
			else {
				$task->date_due = $task->date_due."-00";
			}
// due date is now set
// valid date, set the $task->date_due value
			if ($task->date_due != "0000-00-00" && !checkdate(substr($task->date_due,5,2),substr($task->date_due,8,2),substr($task->date_due,0,4))) {
				$page->msgs[] = $language->messages["err_invalid_date"];
				$screen = "edit";
				$reload_task = 0;
				$task->title = stripslashes($task->title);
				$task->notes = stripslashes($task->notes);
			}
			if (!empty($_REQUEST["task_id"])) { // check for data stompage
				$task->id = $_REQUEST["task_id"];
				$changed_task = new task;
				$changed_task->retrieve($task->id);
// check to see if the task has been updated by another user
// if it has, show options
				if ($task->date_modified != $changed_task->date_modified && !in_array("resolve", $page->flags)) {
// check fields for differences
// title, notes, priority, parent, container, date_due, URL 1-3
					if ($task->title != $changed_task->title || 
					    $task->notes != $changed_task->notes || 
					    $task->priority != $changed_task->priority || 
					    $task->parent != $changed_task->parent || 
					    $task->container != $changed_task->container || 
					    $task->date_due != $changed_task->date_due || 
					    $task->URL_1 != $changed_task->URL_1 || 
					    $task->URL_2 != $changed_task->URL_2 || 
					    $task->URL_3 != $changed_task->URL_3) {
						$page->msgs[] = $language->variables($language->messages["err_conflict"]
						                                    ,array(get_friendly_timestamp($task->date_modified)
						                                          ,get_friendly_timestamp($changed_task->date_modified)
						                                          )
						                                    );
						$screen = "resolve";
					}
				}
				if ($task->parent != $changed_task->parent) {
					$root = $task->parent;
					$page->msgs[] = $language->variables($language->messages["parent_changed"]
					                                    ,array($changed_task->parent
					                                          ,$task->parent
					                                          )
					                                    );
					$page->add_flag("update_status");
					if ($changed_task->parent != 0) {
						$page->add_flag("update_old_status");
					}
				}
				if ($task->status != $changed_task->status) {
					$page->add_flag("update_status");
				}
			}
			if (!empty($task->parent)) { // check to make sure parent exists
				$temp = mysql_query("SELECT date_entered FROM $database->table_name WHERE ID = '$task->parent'");
				$temp = @mysql_result($temp, 0);
				if ($temp == false) {
					$page->msgs[] = $language->variable($language->messages["err_invalid_parent"], $task->parent);
					$screen = "edit";
					$reload_task = 0;
				}
				else {
					$task->lineage = $task->find_lineage();
					if (!in_array($root, $task->lineage)) {
						$root = $task->parent;
					}
					if (isset($task->id) && $task->parent == $task->id) {
						$page->msgs[] = $language->messages["err_own_parent"];
						$screen = "edit";
						$reload_task = 0;
					}
					elseif (count($task->lineage) > 0 && in_array($task->id, $task->lineage)) {
						$page->msgs[] = $language->messages["err_loop"];
						$screen = "edit";
						$reload_task = 0;
					}
				}
			}
			if ($screen != "resolve" && $reload_task != 0) {
// save the new data
				if (!empty($task->id)) {
					$task->update();
					if (in_array("update_status", $page->flags)) {
						set_parent_task_status($task->id);
					}
				}
				else {
					$task->store();
					$task->id = mysql_insert_id();
					set_parent_task_status($task->id);
				}
				if (in_array("update_old_status", $page->flags)) {
					set_task_status($changed_task->parent);
					set_parent_task_status($changed_task->parent);
				}
				$title_HTML = html(trim_add_elipsis(stripslashes($task->title),25));
				$page->msgs[] = $language->variables($language->messages["saved"], array($task->id, $title_HTML, date("g:i:s a, F j, Y")));
				$parent = ''; // initialize for redirect string
				switch ($_REQUEST["post_save_nav"]) {
					case "continue":
						$screen = "edit";
						$id = $task->id;
						break;
					case "view":
						$screen = "focus";
						$id = $task->id;
						break;
					case "parent":
						$screen = "focus";
						$id = $task->id;
						$root = $task->parent;
						break;
					case "new":
						$screen = "edit";
						$parent = $task->parent;
						$root = $task->parent;
						$id = '';
						$task = new task;
						break;
					case "home":
						$screen = "home";
						break;
				}
				if ($root == 0) {
					$root = $task->id;
				}
				$_SESSION["messages"] = $page->msgs;
				if ($_SESSION["mode"] == "mobile") {
					$filename = 'mobile.php';
				}
				else {
					$filename = 'index.php';
				}
				header('Location: '.$custom->tasks_URL
				      .$filename.'?screen='.$screen.'&id='.$id.'&root='.$root.'&parent='.$parent
				      .'&post_save_nav='.$_REQUEST["post_save_nav"]
				      .'&notes_height='.$_REQUEST["notes_height"]
				      .'&formatting_toolbar='.$_REQUEST["formatting_toolbar"]
				      );
				die();
			}
			break;
		case "delete":
			$task->retrieve($id);
			$title_HTML = html($task->title);
			if (isset($_REQUEST["delete_type"])) {
				switch ($_REQUEST["delete_type"]) {
					case "recursive":
						delete_task($task, $_REQUEST["delete_type"]);
						$page->msgs[] = $language->variables($language->messages["delete_recursive"]
						                                    ,array($title_HTML
						                                          ,$task->id
						                                          )
						                                    );
						break;
					case "orphan":
						delete_task($task, $_REQUEST["delete_type"]);
						$page->msgs[] = $language->variables($language->messages["delete_orphan"]
						                                    ,array($title_HTML
						                                          ,$task->id
						                                          )
						                                    );
						break;
					case "remove_generation":
						delete_task($task, $_REQUEST["delete_type"]);
						$page->msgs[] = $language->variables($language->messages["delete_remove"]
						                                    ,array($title_HTML
						                                          ,$task->id
						                                          ,$task->parent
						                                          )
						                                    );
						break;
					default:
						$page->msgs[] = "<b>Error:</b> the &quot;delete_type&quot; value did not match expected values.";
				}
					
			}
			elseif (count($task->children) > 0) {
// prompt for options
				$page->msgs[] = $language->variables($language->messages["delete_instructions"]
						                            ,array($task->id
						                                  ,count($task->children)
						                                  ,count($task->open_children)
						                                  )
						                            );
				$page->add_flag("show_delete_options");
				$page->target = $screen;
				$screen = "confirm";
			}
			elseif ($screen != "confirm") {
				delete_task($task);
				$page->msgs[] = $language->variables($language->messages["deleted"]
						                            ,array($title_HTML
						                                  ,$task->id
						                                  )
						                            );
			}
			if ($screen == "focus" && ($root == 0 || $root == $task->id)) {
				$screen = "home";
			}
			break;
		case "complete":
			$task->retrieve($id);
			$title_HTML = html($task->title);
			if (isset($_REQUEST["complete_type"])) { // options have been chosen (below), now do work
				if (!empty($_REQUEST["reason"])) {
					$temp = $_REQUEST["reason"];
				}
				else {
					$temp = "";
				}
				switch ($_REQUEST["complete_type"]) {
					case "recursive":
						complete_task($task, $_REQUEST["complete_type"], $temp);
						$page->msgs[] = $language->variables($language->messages["complete_recursive"]
								                            ,array($title_HTML
								                                  ,$task->id
								                                  )
								                            );
						break;
					case "orphan":
						complete_task($task, $_REQUEST["complete_type"], $temp);
						$page->msgs[] = $language->variables($language->messages["complete_orphan"]
								                            ,array($title_HTML
								                                  ,$task->id
								                                  )
								                            );
						break;
					case "remove_generation":
						complete_task($task, $_REQUEST["complete_type"], $temp);
						$page->msgs[] = $language->variables($language->messages["complete_orphan"]
								                            ,array($title_HTML
								                                  ,$task->id
								                                  ,$task->parent
								                                  )
								                            );
						break;
					default:
						$page->msgs[] = "<b>Error:</b> the &quot;complete_type&quot; value did not match expected values.";
				}
			}
			elseif (count($task->open_children) > 0) { // show complete options
// prompt for options
				$page->msgs[] = $language->variables($language->messages["complete_instructions"]
						                            ,array($task->id
						                                  ,count($task->children)
						                                  ,count($task->open_children)
						                                  )
						                            );
				$page->add_flag("show_complete_options");
				$page->target = $screen;
				$screen = "confirm";
			}
			elseif ($screen != "confirm") { // no children, mark the task complete
				if (!empty($_REQUEST["reason"])) {
					complete_task($task, "", $_REQUEST["reason"]);
					$temp = html(stripslashes($_REQUEST["reason"]));
					$page->msgs[] = $language->variables($language->messages["completed_reason"]
							                            ,array($title_HTML
							                                  ,$task->id
							                                  ,stripslashes($_REQUEST["reason"])
							                                  )
							                            );
				}
				else {
					complete_task($task);
					$page->msgs[] = $language->variables($language->messages["completed"]
							                            ,array($title_HTML
							                                  ,$task->id
							                                  )
							                            );
				}
				if (!empty($task->parent)) {
					$page->return_link = '<p><a href="index.php?screen=focus&root='.$task->id.'">'
					                    .$language->messages["completed_task_link"]
					                    .'</a><p><a href="index.php?screen=focus&root='.$task->parent.'">'
					                    .$language->messages["completed_task_parent_link"]
					                    .'</a>';
				}
			}
			if ($screen == "focus" && ($root == 0 || $root == $task->id)) {
				$screen = "home";
			}
			break;
	}
}

if (in_array("show_completed_tasks", $page->flags)) {
	$temp = "";
}
else {
	$temp = "AND (status != '100' OR container = '1' ) ";
}
if (empty($_SESSION["home_sort_order"])) {
	$_SESSION["home_sort_order"] = $custom->home_sort_order;
}
switch ($_SESSION["home_sort_order"]) {
	case "title":
		$sort = "title";
		break;
	case "title_rev":
		$sort = "title DESC";
		break;
	case "priority":
		$sort = "priority DESC, title";
		break;
	case "priority_rev":
		$sort = "priority, title";
		break;
	default:
		$sort = "title";
		$page->msgs[] = "Error, the 'home_sort_order' value was '".$_SESSION["home_sort_order"]."' which is not an expected value. Sorting by title.";
		break;
}

$query = "SELECT ID, title, status, container FROM $database->table_name "
        ."WHERE (parent IS NULL OR parent = '0') "
        .$temp
        ."AND obsolete != '1' "
        ."ORDER BY $sort;";
$result = mysql_query($query);
$root_tasks = array();
$root_tasks_id = array();
if ($result != false) {
	while (list($list_id, $temp, $status, $container) = mysql_fetch_row($result)) {
		if ($status != '100' || $container == 1) {
			$root_tasks[] = array($list_id, $temp);
		}
		$root_tasks_id[] = $list_id;
	}
}

$query = "SELECT ID, title FROM $database->table_name "
        ."WHERE obsolete != '1' "
        ."ORDER BY date_modified DESC "
        ."LIMIT 10;";
$result = mysql_query($query);
$recent_tasks = array();
if ($result != false) {
	while (list($list_id, $temp) = mysql_fetch_row($result)) {
		$recent_tasks[] = array($list_id, $temp);
	}
}

$current_page = $current_page."&screen=".$screen;

switch($screen) {
	case "home":
		$tasks = $root_tasks_id;
		$page->breadcrumbs = $language->breadcrumbs["home"];
		$page->title = "Tasks Jr.";
		break;
	case "focus":
		if (isset($root) && $root != 0) {
			$task->retrieve($root);
			if (in_array("mobile", $page->flags)) {
				$page->breadcrumbs = get_breadcrumbs_m($task->id);
			}
			else {
				$page->breadcrumbs = get_breadcrumbs($task->id);
			}
		}
		else {
			$page->msgs[] = $language->messages["err_no_root"];
		}
		break;
	case "view":
		if (isset($root) && $root != 0) {
			$task->retrieve($root);
			if (in_array("mobile", $page->flags)) {
				$page->breadcrumbs = get_breadcrumbs_m($task->id);
			}
			else {
				$page->breadcrumbs = get_breadcrumbs($task->id);
			}
		}
		else {
			$page->msgs[] = $language->messages["err_no_root"];
		}
		break;
	case "edit":
		if (isset($id) && $id != 0 && $reload_task == 1) {
			$task->retrieve($id);
			if ($task->obsolete == 1) {
				$page->msgs[] = $language->messages["warn_deleted"];
			}
			if (in_array("mobile", $page->flags)) {
				$page->breadcrumbs = get_breadcrumbs_m($task->id);
			}
			else {
				$page->breadcrumbs = get_breadcrumbs($task->id);
			}
			$page->init_string = "document.edit.task_notes.focus();";
		}
		elseif (isset($parent) && $parent != 0) {
			$task->parent = $parent;
			if (in_array("mobile", $page->flags)) {
				$page->breadcrumbs = get_breadcrumbs_for_new_task_m($parent);
			}
			else {
				$page->breadcrumbs = get_breadcrumbs_for_new_task($parent);
			}
			$page->breadcrumbs = $page->breadcrumbs.' &gt; <span id="current_breadcrumb">'.$language->breadcrumbs["new_task"].'</span>';
			$page->init_string = "document.edit.task_title.focus();";
		}
		else {
			if (in_array("mobile", $page->flags)) {
				$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; <span id="current_breadcrumb">'.$language->breadcrumbs["new_task"].'</span>';
			}
			else {
				$page->breadcrumbs = '<a href="javascript:confirmNav(location.href=\'index.php\');">'.$language->breadcrumbs["home"].'</a> &gt; <span id="current_breadcrumb">'.$language->breadcrumbs["new_task"].'</span>';
			}
			$page->init_string = "document.edit.task_title.focus();";
		}
		$page->init_string .= " position_corner();";
		$page->resize_string = "position_corner();";
		break;
	case "recent":
		if (isset($_REQUEST["sort"])) {
			$sorted_by = $_REQUEST["sort"];
		}
		else {
			$sorted_by = "date_modified";
		}
		if ($custom->show_deleted_in_history == 1) {
			$obsolete = "";
		}
		else {
			$obsolete = "WHERE obsolete != '1' ";
		}	
		$result = mysql_query("SELECT ID FROM $database->table_name "
		                     .$obsolete
		                     ."ORDER BY date_modified DESC LIMIT 25"
		                     );
		$tasks = array();
		while ($list_id = mysql_fetch_row($result)) {
			$tasks[] = $list_id[0];
		}
		$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; '.$language->breadcrumbs["history"];
		$page->title = 'Tasks Jr.: '.$language->breadcrumbs["history"];
		break;
	case "sort":
		$sorted_by = "priority";
		if (isset($_REQUEST["sort"])) {
			$sorted_by = $_REQUEST["sort"];
		}
		if (isset($_REQUEST["list"])) {
			$query = "SELECT ID FROM $database->table_name"
			        ." WHERE obsolete != '1'"
			        ." AND ID IN (".$_REQUEST["list"].")"
			        ." LIMIT 100"
			        ;
			$result = mysql_query($query);
			$tasks = array();
			while ($list_id = mysql_fetch_row($result)) {
				$tasks[] = $list_id[0];
			}
		}
		else {
			$tasks = get_leaf_tasks();
		}
		$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; '.$language->breadcrumbs["sortable"];
		$page->title = 'Tasks Jr.: '.$language->breadcrumbs["sortable"];
		break;
	case "upcoming":
		if (isset($_REQUEST["sort"])) {
			$sorted_by = $_REQUEST["sort"];
		}
		else {
			$sorted_by = "date_due";
		}
// get this week's tasks
		$now = mktime() + ($custom->server_time_difference * 3600);
		$upcoming = $now + ($custom->upcoming_days * 86400);
		$result = mysql_query("SELECT ID FROM $database->table_name "
		                     ."WHERE date_due >= '".date('Y-m-d', $now)."' "
		                     ."AND date_due <= '".date("Y-m-d", $upcoming)."' "
		                     ."AND date_due != '0000-00-00' "
		                     ."AND status != '100' "
		                     ."AND obsolete != '1'"
		                     );
		$tasks = array();
		while ($list_id = mysql_fetch_row($result)) {
			$tasks[] = $list_id[0];
		}
// get overdue tasks
		$result = mysql_query("SELECT ID FROM $database->table_name "
		                     ."WHERE date_due < '".date('Y-m-d', $now)."' "
		                     ."AND date_due != '0000-00-00' "
		                     ."AND status != '100' "
		                     ."AND obsolete != '1'"
		                     );
		$overdue_tasks = array();
		while ($list_id = mysql_fetch_row($result)) {
			$overdue_tasks[] = $list_id[0];
		}
		$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; '.$language->breadcrumbs["upcoming"];
		$page->title = 'Tasks Jr.: '.$language->breadcrumbs["upcoming"];
		break;
	case "search":
		$tasks = array(); // here so that I don't get the undefined var warning in windows at the default error level
		$return_query = ""; // here so that I don't get the undefined var warning in windows at the default error level
		$page->init_string = $page->init_string."document.search.text_query.focus();";
		if ((!isset($_REQUEST["action"]) || (isset($_REQUEST["action"]) && $_REQUEST["action"] != "search")) && empty($_REQUEST["list"])) {
			$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; '.$language->breadcrumbs["search"];
		}
		else {
			if (isset($_REQUEST["list"])) {
				$query = "SELECT ID FROM $database->table_name "
				        ."WHERE obsolete != '1' "
				        ."AND ID IN (".$_REQUEST["list"].") "
				        ."LIMIT 100"
				        ;
				$result = mysql_query($query);
				$tasks = array();
				if ($result != false) {
					while ($list_id = mysql_fetch_row($result)) {
						$tasks[] = $list_id[0];
					}
				}
			}
			else {
				if (!isset($_REQUEST["text_query"])) {
					$text_query = "";
				}
				$text_query = explode(" ", $_REQUEST["text_query"]);
				$query = "SELECT ID FROM $database->table_name WHERE (";
				for ($i = 0; $i < count($text_query); $i++) {
					$query .= "(title LIKE '%".$text_query[$i]."%' OR notes LIKE '%".$text_query[$i]."%')";
					if (($i + 1) != count($text_query)) {
						$query .= " AND ";
					}
				}
				if (isset($_REQUEST["search_priority_lowest"]) || isset($_REQUEST["search_priority_low"]) || isset($_REQUEST["search_priority_medium"]) || isset($_REQUEST["search_priority_high"]) || isset($_REQUEST["search_priority_highest"])) {
					$query .= " AND (";
					$sub_query = array();
					if (isset($_REQUEST["search_priority_lowest"]) && $_REQUEST["search_priority_lowest"] == 1) {
						$sub_query[] = "priority = '1'";
					}
					if (isset($_REQUEST["search_priority_low"]) && $_REQUEST["search_priority_low"] == 1) {
						$sub_query[] = "priority = '2'";
					}
					if (isset($_REQUEST["search_priority_medium"]) && $_REQUEST["search_priority_medium"] == 1) {
						$sub_query[] = "priority = '3'";
					}
					if (isset($_REQUEST["search_priority_high"]) && $_REQUEST["search_priority_high"] == 1) {
						$sub_query[] = "priority = '4'";
					}
					if (isset($_REQUEST["search_priority_highest"]) && $_REQUEST["search_priority_highest"] == 1) {
						$sub_query[] = "priority = '5'";
					}
					for ($i = 0; $i < count($sub_query); $i++) {
						$query .= $sub_query[$i];
						if ($i + 1 < count($sub_query)) {
							$query .= " OR ";
						}
					}
					$query .= ")";
				}
				if (!empty($_REQUEST["search_ID"])) {
					$query .= " AND ID = '".$_REQUEST["search_ID"]."'";
				}
				if (!empty($_REQUEST["search_parent"])) {
					$query .= " AND parent = '".$_REQUEST["search_parent"]."'";
				}
				if (!empty($_REQUEST["search_URL"])) {
					$query .= " AND ("
					         ." URL_1 LIKE '%".$_REQUEST["search_URL"]."%' OR"
					         ." URL_2 LIKE '%".$_REQUEST["search_URL"]."%' OR"
					         ." URL_3 LIKE '%".$_REQUEST["search_URL"]."%'"
					         .") ";
				}
				if (!empty($_REQUEST["search_container"])) {
					if ($_REQUEST["search_container"] == "yes") {
						$query .= " AND container = '1'";
					}
					else {
						$query .= " AND container = '0'";
					}
				}
				if (isset($_REQUEST["search_date_due"]) &&
						$_REQUEST["search_date_due"] == "exact" && 
						!empty($_REQUEST["search_date_due_month"]) && 
						!empty($_REQUEST["search_date_due_day"]) && 
						!empty($_REQUEST["search_date_due_year"])) {
					if (checkdate($_REQUEST["search_date_due_month"]
					             ,$_REQUEST["search_date_due_day"]
					             ,$_REQUEST["search_date_due_year"])) {
						$query .= " AND date_due = '".$_REQUEST["search_date_due_year"]."-".$_REQUEST["search_date_due_month"]."-".$_REQUEST["search_date_due_day"]."'";
					}
					else {
						$page->msgs[] = $language->messages["err_search_date_exact"];
					}
				} 
				else if (isset($_REQUEST["search_date_due"]) &&
							$_REQUEST["search_date_due"] == "range" && 
							(
								(!empty($_REQUEST["search_date_due_after_month"]) &&
								 !empty($_REQUEST["search_date_due_after_day"]) && 
								 !empty($_REQUEST["search_date_due_after_year"])
								) || 
								(!empty($_REQUEST["search_date_due_before_month"]) && 
								 !empty($_REQUEST["search_date_due_before_day"]) && 
								 !empty($_REQUEST["search_date_due_before_year"])
								)
							)) {
					if (!empty($_REQUEST["search_date_due_after_month"]) && 
						!empty($_REQUEST["search_date_due_after_day"]) && 
						!empty($_REQUEST["search_date_due_after_year"])) {
						if (checkdate($_REQUEST["search_date_due_after_month"]
				                     ,$_REQUEST["search_date_due_after_day"]
							         ,$_REQUEST["search_date_due_after_year"])) {
							$query .= " AND date_due >= '".$_REQUEST["search_date_due_after_year"]."-".$_REQUEST["search_date_due_after_month"]."-".$_REQUEST["search_date_due_after_day"]."'";
						}
						else {
							$page->msgs[] = $language->messages["err_search_date_after"];
						}
					}
					if (!empty($_REQUEST["search_date_due_before_month"]) && 
						!empty($_REQUEST["search_date_due_before_day"]) && 
						!empty($_REQUEST["search_date_due_before_year"])) {
						if (checkdate($_REQUEST["search_date_due_before_month"]
						             ,$_REQUEST["search_date_due_before_day"]
						             ,$_REQUEST["search_date_due_before_year"])) {
							$query .= " AND date_due != '0000-00-00' AND date_due <= '".$_REQUEST["search_date_due_before_year"]."-".$_REQUEST["search_date_due_before_month"]."-".$_REQUEST["search_date_due_before_day"]."'";
						}
						else {
							$page->msgs[] = $language->messages["err_search_date_before"];
						}
					}
				} 
				if (isset($_REQUEST["search_date_modified"]) &&
						$_REQUEST["search_date_modified"] == "exact" && 
						!empty($_REQUEST["search_date_modified_month"]) && 
						!empty($_REQUEST["search_date_modified_day"]) && 
						!empty($_REQUEST["search_date_modified_year"])) {
					if (checkdate($_REQUEST["search_date_modified_month"]
					             ,$_REQUEST["search_date_modified_day"]
					             ,$_REQUEST["search_date_modified_year"])) {
						$query .= " AND date_modified = '".$_REQUEST["search_date_modified_year"]."-".$_REQUEST["search_date_modified_month"]."-".$_REQUEST["search_date_modified_day"]."'";
					}
					else {
						$page->msgs[] = $language->messages["err_search_date_exact"];
					}
				} 
				else if (isset($_REQUEST["search_date_modified"]) &&
							$_REQUEST["search_date_modified"] == "range" && 
							(
								(!empty($_REQUEST["search_date_modified_after_month"]) &&
								 !empty($_REQUEST["search_date_modified_after_day"]) && 
								 !empty($_REQUEST["search_date_modified_after_year"])
								) || 
								(!empty($_REQUEST["search_date_modified_before_month"]) && 
								 !empty($_REQUEST["search_date_modified_before_day"]) && 
								 !empty($_REQUEST["search_date_modified_before_year"])
								)
							)) {
					if (!empty($_REQUEST["search_date_modified_after_month"]) && 
						!empty($_REQUEST["search_date_modified_after_day"]) && 
						!empty($_REQUEST["search_date_modified_after_year"])) {
						if (checkdate($_REQUEST["search_date_modified_after_month"]
				                     ,$_REQUEST["search_date_modified_after_day"]
							         ,$_REQUEST["search_date_modified_after_year"])) {
							$query .= " AND date_modified >= '".$_REQUEST["search_date_modified_after_year"]."-".$_REQUEST["search_date_modified_after_month"]."-".$_REQUEST["search_date_modified_after_day"]."'";
						}
						else {
							$page->msgs[] = $language->messages["err_search_date_after"];
						}
					}
					if (!empty($_REQUEST["search_date_modified_before_month"]) && 
						!empty($_REQUEST["search_date_modified_before_day"]) && 
						!empty($_REQUEST["search_date_modified_before_year"])) {
						if (checkdate($_REQUEST["search_date_modified_before_month"]
						             ,$_REQUEST["search_date_modified_before_day"]
						             ,$_REQUEST["search_date_modified_before_year"])) {
							$query .= " AND date_modified != '0000-00-00' AND date_modified <= '".$_REQUEST["search_date_modified_before_year"]."-".$_REQUEST["search_date_modified_before_month"]."-".$_REQUEST["search_date_modified_before_day"]."'";
						}
						else {
							$page->msgs[] = $language->messages["err_search_date_before"];
						}
					}
				} 
				if (isset($_REQUEST["search_status"]) &&
					$_REQUEST["search_status"] == "exact" && 
					!empty($_REQUEST["search_status_exact"])) {
					$query .= " AND status = '".$_REQUEST["search_status_exact"]."'";
				} 
				else if (isset($_REQUEST["search_status"]) &&
						$_REQUEST["search_status"] == "range" && 
						(!empty($_REQUEST["search_status_more"]) || 
						 !empty($_REQUEST["search_status_less"]))) {
					if (!empty($_REQUEST["search_status_more"])) {
						$query .= " AND status >= '".$_REQUEST["search_status_more"]."'";
					}
					if (!empty($_REQUEST["search_status_less"])) {
						$query .= " AND status <= '".$_REQUEST["search_status_less"]."'";
					}
					else if (empty($_REQUEST["include_completed"]) || $_REQUEST["include_completed"] != 1) {
						$query .= " AND status != '100'";
					}
				} 
				else if (empty($_REQUEST["include_completed"]) || $_REQUEST["include_completed"] != 1) {
					$query .= " AND status != '100'";
				}
				$query .= " AND obsolete != '1') LIMIT 100";
				$result = mysql_query($query);
				$tasks = array();
				while ($id = mysql_fetch_row($result)) {
					$tasks[] = $id[0];
				}
			}
// set return query string
			$return_query = "";
			if (!empty($_REQUEST["text_query"])) {
				$return_query .= "&text_query=".urlencode($_REQUEST["text_query"]);
			}
			if (!empty($_REQUEST["search_status"])) {
				$return_query .= "&search_status=".urlencode($_REQUEST["search_status"]);
			}
			if (!empty($_REQUEST["search_status_more"])) {
				$return_query .= "&search_status_more=".urlencode($_REQUEST["search_status_more"]);
			}
			if (!empty($_REQUEST["search_status_less"])) {
				$return_query .= "&search_status_less=".urlencode($_REQUEST["search_status_less"]);
			}
			if (!empty($_REQUEST["search_status_exact"])) {
				$return_query .= "&search_status_exact=".urlencode($_REQUEST["search_status_exact"]);
			}
			if (!empty($_REQUEST["search_parent"])) {
				$return_query .= "&search_parent=".urlencode($_REQUEST["search_parent"]);
			}
			if (!empty($_REQUEST["search_ID"])) {
				$return_query .= "&search_ID=".urlencode($_REQUEST["search_ID"]);
			}
			if (!empty($_REQUEST["search_container"])) {
				$return_query .= "&search_container=".urlencode($_REQUEST["search_container"]);
			}
			if (!empty($_REQUEST["search_URL"])) {
				$return_query .= "&search_URL=".urlencode($_REQUEST["search_URL"]);
			}
			if (isset($_REQUEST["search_priority_lowest"]) && $_REQUEST["search_priority_lowest"] == 1) {
				$return_query .= "&search_priority_lowest=1";
			}
			if (isset($_REQUEST["search_priority_low"]) && $_REQUEST["search_priority_low"] == 1) {
				$return_query .= "&search_priority_low=1";
			}
			if (isset($_REQUEST["search_priority_medium"]) && $_REQUEST["search_priority_medium"] == 1) {
				$return_query .= "&search_priority_medium=1";
			}
			if (isset($_REQUEST["search_priority_high"]) && $_REQUEST["search_priority_high"] == 1) {
				$return_query .= "&search_priority_high=1";
			}
			if (isset($_REQUEST["search_priority_highest"]) && $_REQUEST["search_priority_highest"] == 1) {
				$return_query .= "&search_priority_highest=1";
			}
			if (!empty($_REQUEST["search_date_due"])) {
				$return_query .= "&search_date_due=".urlencode($_REQUEST["search_date_due"]);
			}
			if (!empty($_REQUEST["search_date_due_month"])) {
				$return_query .= "&search_date_due_month=".urlencode($_REQUEST["search_date_due_month"]);
			}
			if (!empty($_REQUEST["search_date_due_day"])) {
				$return_query .= "&search_date_due_day=".urlencode($_REQUEST["search_date_due_day"]);
			}
			if (!empty($_REQUEST["search_date_due_year"])) {
				$return_query .= "&search_date_due_year=".urlencode($_REQUEST["search_date_due_year"]);
			}
			if (!empty($_REQUEST["search_date_due_after_month"])) {
				$return_query .= "&search_date_due_after_month=".urlencode($_REQUEST["search_date_due_after_month"]);
			}
			if (!empty($_REQUEST["search_date_due_after_day"])) {
				$return_query .= "&search_date_due_after_day=".urlencode($_REQUEST["search_date_due_after_day"]);
			}
			if (!empty($_REQUEST["search_date_due_after_year"])) {
				$return_query .= "&search_date_due_after_year=".urlencode($_REQUEST["search_date_due_after_year"]);
			}
			if (!empty($_REQUEST["search_date_due_before_month"])) {
				$return_query .= "&search_date_due_before_month=".urlencode($_REQUEST["search_date_due_before_month"]);
			}
			if (!empty($_REQUEST["search_date_due_before_day"])) {
				$return_query .= "&search_date_due_before_day=".urlencode($_REQUEST["search_date_due_before_day"]);
			}
			if (!empty($_REQUEST["search_date_due_before_year"])) {
				$return_query .= "&search_date_due_before_year=".urlencode($_REQUEST["search_date_due_before_year"]);
			}
			if (count($tasks) == 100) {
				$page->msgs[] = "This search returned more than 100 results, only the first 100 are shown here.";
			}
			$page->breadcrumbs = '<a href="index.php">'.$language->breadcrumbs["home"].'</a> &gt; <a href="index.php?screen=search">'.$language->breadcrumbs["search"].'</a> &gt; '.$language->breadcrumbs["search_results"];
		}
		$page->title = 'Tasks Jr.: '.$language->breadcrumbs["search"];
		break;
	case "confirm":
		$page->title = "Tasks Jr.";
		break;
	case "resolve":
		$page->title = "Tasks Jr.";
		$task->remove_slashes();
		break;
	case "about":
		$page->title = "Tasks Jr.";
		break;
}

// set current page

$current_page = $current_page."&root=".$root."&id=".$id;

if ($page->title == "") {
	if ($task->title != "") {
		$page->title = "Tasks Jr.: ".trim_add_elipsis($task->title, 25);
	}
	else {
		$page->title = "Tasks Jr.";
	}
}

?>