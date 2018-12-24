<?

// this will email a reminder to the email address(es) set in config

// includes
require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('config.php');

// get language

require_once('languages/'.$custom->language.'.php');

header("Content-Type: text/html; charset=".$language->charset);

if (empty($custom->email_reminders_to)) {
	exit('<html><body>'.$language->messages["no_email"].'</body></html>');
}
else {
	$to = str_replace(" ","",$custom->email_reminders_to);
	$to = explode(",", $to);
}

// set up variables
$overdue_tasks = array();
$due_tasks = array();
$upcoming_tasks = array();
$priority_tasks = array();
$content = "";

// get overdue tasks
$result = mysql_query("SELECT ID FROM $database->table_name "
                     ."WHERE date_due < '".date('Y-m-d')."' "
                     ."AND date_due != '0000-00-00' "
                     ."AND status != '100' "
                     ."AND obsolete != '1' "
                     ."ORDER BY date_due, priority DESC"
                     );
while ($list_id = mysql_fetch_row($result)) {
	$overdue_tasks[] = $list_id[0];
}

// get due tasks
$result = mysql_query("SELECT ID FROM $database->table_name "
                     ."WHERE date_due = '".date('Y-m-d')."' "
                     ."AND status != '100' "
                     ."AND obsolete != '1'"
                     ."ORDER BY date_due, priority DESC"
                     );
while ($list_id = mysql_fetch_row($result)) {
	$due_tasks[] = $list_id[0];
}

// get upcoming tasks
$temp = mktime(0,0,0,date('m'),date('d'),date('Y')); 
$temp = $temp + ($custom->upcoming_days * 86400);
$temp = date("Y-m-d", $temp);
$result = mysql_query("SELECT ID FROM $database->table_name "
                     ."WHERE date_due > '".date('Y-m-d')."' "
                     ."AND date_due <= '".$temp."' "
                     ."AND status != '100' "
                     ."AND obsolete != '1'"
                     ."ORDER BY date_due, priority DESC"
                     );
while ($list_id = mysql_fetch_row($result)) {
	$upcoming_tasks[] = $list_id[0];
}

// get priority tasks
$result = mysql_query("SELECT ID FROM $database->table_name "
                     ."WHERE priority > '3' "
                     ."AND status != '100' "
                     ."AND obsolete != '1'"
                     ."ORDER BY priority DESC, status DESC"
                     );
while ($list_id = mysql_fetch_row($result)) {
	$priority_tasks[] = $list_id[0];
}

$tasks = array($language->email_reminders["overdue"] => $overdue_tasks
              ,$language->email_reminders["due"] => $due_tasks
              ,$language->email_reminders["upcoming"] => $upcoming_tasks
              ,$language->email_reminders["high_priority"] => $priority_tasks
              );

foreach ($tasks as $k => $v) {
	$content .= str_pad(($k." "), 50, "-")."\n\n";
	if (count($v) > 0) {
		$list = implode(",", $v);
		$result = mysql_query("SELECT ID, title, status, priority, date_due FROM $database->table_name "
		                     ."WHERE ID IN (".$list.") "
		                     ."AND obsolete != '1'"
		                     );
		while ($task = mysql_fetch_array($result)) {
			$content .= "   ".stripslashes($task["title"])."\n";
			$content .= "   ".$language->email_reminders["due"].": ".str_pad(get_relative_date_due($task["date_due"], 0),15," ")
			           .$language->email_reminders["status"].": "
			           .str_pad($task["status"],3," ",STR_PAD_LEFT).$language->email_reminders["complete"]."   "
			           .$language->email_reminders["priority"].": ".get_friendly_priority($task["priority"])."\n";
			$content .= "   ".$custom->tasks_URL."index.php?screen=focus&id=".$task["ID"]."\n";
			$content .= str_pad("   ",50,"-")."\n\n";
		}
	}
	else {
		$content .= "   ".$language->email_reminders["none"]."\n";
	}
	$content .= "\n\n";
}
$content .= "\n".str_pad("",50,"-")."\ntasks - http://www.alexking.org/software/tasks/\n";

$database->disconnect();

foreach ($to as $recipient) {
	mail($recipient
	    ,$language->email_reminders["subject"]
	    ,$content
	    ,'From: "tasks" <'.$recipient.'>'."\n"
	    .'Reply-To: "tasks" <'.$recipient.'>'."\n"
	    .'Date: '.date('r')."\n"
	    .'Content-Type: text/plain; charset='.$language->charset."\n"
	    );
}

print('<html><body>'.$language->messages["mail_sent"].'</body></html>');

?>
