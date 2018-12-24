<?php

// objects

class task {
	var $id;
	var $parent;
	var $title;
	var $notes;
	var $status;
	var $priority;
	var $URL_1;
	var $URL_2;
	var $URL_3;
	var $date_due;
	var $date_modified;
	var $date_entered;
	var $obsolete;
	var $children;
	var $open_children;
	var $lineage;
	var $container;
	
	function task() {
		$this->id = "";
		$this->parent = "";
		$this->title = "";
		$this->notes = "";
		$this->status = 0;
		$this->priority = 3;
		$this->URL_1 = "";
		$this->URL_2 = "";
		$this->URL_3 = "";
		$this->date_due = "";
		$this->date_modified = "";
		$this->date_entered = "";
		$this->obsolete = 0;
		$this->children = array();
		$this->open_children = array();
		$this->lineage = array();
		$this->container = 0;
	}
	
	function add_slashes() {
		$this->title = addslashes($this->title);
		$this->notes = addslashes($this->notes);
	}
	function remove_slashes() {
		$this->title = stripslashes($this->title);
		$this->notes = stripslashes($this->notes);
	}
		
	function store() {
		global $database, $language, $mb_languages;
		if (in_array($language->charset, $mb_languages)) {
			switch ($language->charset) {
				case "Shift_JIS":
					$this->convert_encoding('UTF8', 'SJIS');
					break;
			}
		}
		$this->date_entered = date('YmdHis');
		$query = "INSERT into $database->table_name ( parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_entered, date_modified, container ) values ( '$this->parent', '$this->title', '$this->notes', '$this->status', '$this->priority', '$this->URL_1', '$this->URL_2', '$this->URL_3', '$this->date_due', '$this->date_entered', '$this->date_entered', '$this->container')";
		mysql_query($query)
			or die("MySQL error: ".mysql_error());
	}

	function update() {
		global $database, $language, $mb_languages;
		if (in_array($language->charset, $mb_languages)) {
			switch ($language->charset) {
				case "Shift_JIS":
					$this->convert_encoding('UTF8', 'SJIS');
					break;
			}
		}
		$this->date_modified = date('YmdHis');
		$query = "UPDATE $database->table_name set parent='$this->parent', title='$this->title', notes='$this->notes', status='$this->status', priority='$this->priority', URL_1='$this->URL_1', URL_2='$this->URL_2', URL_3='$this->URL_3', date_due='$this->date_due', container='$this->container', date_modified='$this->date_modified' WHERE ID = '$this->id'";
		mysql_query($query)
			or die("MySQL error: ".mysql_error());
	}

	function retrieve($id = -1) {
		global $database, $language, $mb_languages;
		if ($id == -1) {
			$id = $this->id;
		}
		$query = "SELECT * FROM $database->table_name WHERE ID = '$id'";
		$query = mysql_query($query)
			or die("MySQL error: ".mysql_error());
		$task = mysql_fetch_row($query);
// set variables
		$this->id = $task[0];
		$this->parent = $task[1];
		$this->title = $task[2];
		$this->notes = $task[3];
		$this->status = $task[4];
		$this->priority = $task[5];
		$this->URL_1 = $task[6];
		$this->URL_2 = $task[7];
		$this->URL_3 = $task[8];
		$this->date_due = $task[9];
		$this->date_modified = $task[10];
		$this->date_entered = $task[11];
		$this->obsolete = $task[12];
		$this->container = $task[13];
		$this->find_children();
		$this->lineage = $this->find_lineage();
		
		if (isset($mb_languages) && in_array($language->charset, $mb_languages)) {
			switch ($language->charset) {
				case "Shift_JIS":
					$this->convert_encoding('SJIS', 'UTF8');
					break;
			}
		}
	}
	
	function obsolete() {
		global $database;
		$this->date_modified = date('YmdHis');
		$query = "UPDATE $database->table_name set obsolete='1', date_modified='$this->date_modified' WHERE ID = '$this->id'";
		mysql_query($query)
			or die("MySQL error: ".mysql_error());
	}
	
	function find_children() {
		global $database;
		$children = array();
		$children_dated = array();
		$children_not_dated = array();
		$sorted_children = array();
		$this->children = array();
		$this->open_children = array();
		$query = "SELECT ID, status, date_due, container FROM $database->table_name WHERE (( parent = '".$this->id."' ) AND ( obsolete != '1' )) ORDER BY priority DESC, date_due, status DESC, title";
		$results = mysql_query($query)
			or die("MySQL error: ".mysql_error());
		while (list($id, $status, $date_due, $container) = mysql_fetch_array($results)) {
			$children[] = array($id, $status, $date_due, $container);
		}
		foreach ($children as $child) {
			if ($child[2] != "0000-00-00") {
				$children_dated[] = $child;
			}
			else {
				$children_not_dated[] = $child;
			}
		}
		$sorted_children = array_merge($children_dated, $children_not_dated);
		foreach ($sorted_children as $child) {
			$this->children[] = $child[0];
			if ($child[1] != "100" || $child[3] == '1') {
				$this->open_children[] = $child[0];
			}
		}
	}
		
	function find_lineage($lineage = array()) {
		if ($this->parent != 0 && $this->parent != "") {
			$parent = new task;
			$parent->retrieve($this->parent);
			if ($parent->obsolete != 1) {
				$lineage[] = $this->parent;
			}
			$lineage = $parent->find_lineage($lineage);
		}
		return $lineage;
	}
	
	function convert_encoding($from, $to) {
		if (function_exists('mb_convert_encoding')) {
			$this->title = mb_convert_encoding($this->title, $from, $to);
			$this->notes = mb_convert_encoding($this->notes, $from, $to);
		}
	}

}

class custom {
	var $b2_enable;
	var $b2_post_URL;
	var $check_for_updates;
	var $date_format;
	var $date_picker_months;
	var $email_reminders_to;
	var $formatting_toolbar;
	var $home_sort_order;
	var $ical_enable;
	var $ical_export_type;
	var $ical_include_todo;
	var $ical_days_after;
	var $ical_days_before;
	var $ical_URL;
	var $language;
	var $language_mobile;
	var $live_breadcrumbs;
	var $mt_enable;
	var $mt_post_URL;
	var $server_time_difference;
	var $show_deleted_in_history;
	var $tasks_URL;
	var $upcoming_days;
	var $use_beta;
	var $wp_enable;
	var $wp_post_URL;
	var $year_max;
	var $year_min;
	var $year_max_existing;
	
	function custom() {
		$this->b2_enable = 0;
		$this->b2_post_URL = "";
		$this->check_for_updates = 1;
		$this->date_format = "y-m-d";
		$this->date_picker_months = 3;
		$this->email_reminders_to = "";
		$this->formatting_toolbar = 0;
		$this->home_sort_order = "title";
		$this->ical_enable = 0;
		$this->ical_export_type = "event";
		$this->ical_include_todo = 0;
		$this->ical_days_after = 90;
		$this->ical_days_before = 30;
		$this->ical_URL = "http://localhost/tasks/phpicalendar/";
		$this->language = "english";
		$this->language_mobile = "english";
		$this->live_breadcrumbs = 1;
		$this->mt_enable = 0;
		$this->mt_post_URL = "";
		$this->server_time_difference = 0;
		$this->show_deleted_in_history = 1;
		$this->tasks_URL = "http://localhost/tasks/";
		$this->upcoming_days = 7;
		$this->use_beta = 0;
		$this->wp_enable = 0;
		$this->wp_post_URL = "";
	}
	function init() {
		global $database;
		$this->year_max = date("Y") + 10;
		$this->year_min = mysql_query("SELECT MIN(date_due) FROM $database->table_name WHERE date_due != '0000-00-00'");
		$this->year_min = substr(@mysql_result($this->year_min, 0), 0, 4);
		if ($this->year_min == 0000 || $this->year_min == "") {
			$this->year_min = date("Y");
		}
		$this->year_max_existing = mysql_query("SELECT MAX(date_due) FROM $database->table_name");
		$this->year_max_existing = substr(@mysql_result($this->year_max_existing, 0), 0, 4);
		if ($this->year_max_existing == 0000 || $this->year_max_existing == "") {
			$this->year_max_existing = date("Y");
		}
	}
}

class page {
	var $breadcrumbs;
	var $flags;
	var $init_string;
	var $msgs;
	var $resize_string;
	var $return_link;
	var $target;
	var $title;
	var $unload_string;
	
	function page() {
		$this->breadcrumbs = "";
		$this->flags = array();
		$this->init_string = "";
		$this->msgs = array();
		$this->resize_string = "";
		$this->return_link = "";
		$this->target = "home";
		$this->title = "";
		$this->unload_string = "";
	}
	function add_flag($flag) {
		if (!in_array($flag, $this->flags)) {
			$this->flags[] = $flag;
		}
	}
	function remove_flag($flag) {
		$temp_flags = array();
		foreach ($this->flags as $temp_flag) {
			if ($temp_flag != $flag) {
				$temp_flags[] = $flag;
			}
		}
		$this->flags = $temp_flags;
	}
	function check_flag($flag) {
		if (in_array($flag, $this->flags)) {
			return 1;
		}
		else {
			return 0;
		}
	}
}

class database_connection {
	var $connection;
	var $database_name;
	var $password;
	var $server;
	var $table_name;
	var $username;

	function connect() {
		$this->connection = mysql_connect($this->server, $this->username, $this->password)
			or die("Could not connect to server ".$this->server." as ".$this->username.".");
		mysql_select_db($this->database_name,$this->connection)
			or die("Could not select database. Reason: ".mysql_error());
	}
	function disconnect() {
		mysql_close($this->connection);
	}
}

class language {
	var $about;
	var $accesskey;
	var $author;
	var $author_email;
	var $author_web;
	var $breadcrumbs;
	var $charset;
	var $confirm;
	var $data;
	var $email_reminders;
	var $font_size;
	var $form;
	var $home;
	var $icons;
	var $list;
	var $list_titles;
	var $menu;
	var $messages;
	var $misc;
	var $picker;
	var $resolve;
	var $search;
	var $tree;
	var $toolbar;
		
	function variable($var, $var_string) {
		$var = str_replace("__0", $var_string, $var);
		return $var;
	}
	function variables($var, $var_array) {
		for ($i = 0; $i < count($var_array); $i++) {
			$var = str_replace("__".$i, $var_array[$i], $var);
		}
		return $var;
	}
}

?>