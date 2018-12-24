<?

// create the .ics file

require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('config.php');

// get data

$tasks = array();

$strings = array(","
				,'"'
				,"\r\n"
				,"\n"
				,"\r"
				,'Ÿ'
                ,'Š'
                ,'š'
				);
$escaped_strings = array("\,"
						,'\"'
						,"\\n"
						,"\\n"
						,"\\n"
						,'Ã¼'
                        ,'Ã¤'
                        ,'Ã¶'
						);	

$from = mktime() - ($custom->ical_days_before * 86400);
$to = mktime() + ($custom->ical_days_after * 86400);

$result = mysql_query("SELECT ID, title, notes, priority, date_due, status, date_modified "
                     ."FROM $database->table_name "
                     ."WHERE obsolete != '1' "
                     ."AND date_due >= '".date("Y-m-d", $from)."' "
                     ."AND date_due <= '".date("Y-m-d", $to)."' "
                     ."ORDER BY date_due"
                     );

if ($result != false) {
	while ($temp = mysql_fetch_array($result)) {
		$tasks[] = $temp;
	}
}

// create output

$output = "BEGIN:VCALENDAR\n";
$output .= "CALSCALE:GREGORIAN\n";

include("version.inc");
if (isset($this_version)) {
	$output .= "PRODID:-//alexking.org//tasks ".$this_version."//EN\n";
}
else {
	$output .= "PRODID:-//alexking.org//tasks//EN\n";
}

$output .= "X-WR-CALNAME;VALUE=TEXT:tasks\n";
$output .= "VERSION:2.0\n";
foreach ($tasks as $task) {
	if ($task[5] == 100) {
		$date = mktime(0,0,0,substr($task[6],4,2),substr($task[6],6,2),substr($task[6],0,4));
		if (date("Y-m-d", $date) != $task[4]) {
			$task[1] = $task[1]." (Done, DUE: ".$task[4].")";
		}
		else {
			$task[1] = $task[1]." (Done)";
		}
	}
	else {
		$date = mktime(0,0,0,substr($task[4],5,2),substr($task[4],8,2),substr($task[4],0,4));
		if ($date < mktime(0,0,0,date("m"),date("d"),date("Y"))) {
			$date = mktime();
			$task[1] = $task[1]." (".$task[5]."%, ".get_friendly_priority($task[3]).", OVERDUE: ".$task[4].")";
		}
		else {
			$task[1] = $task[1]." (".$task[5]."%, ".get_friendly_priority($task[3]).", DUE: ".$task[4].")";
		}
	}
/* 

// these options would enable showing a task duration from it's due date to it's completion date
// would need to use $date_start and $date_end in the output

	if ($task[5] == 100) {
		$date_start = mktime(0,0,0,substr($task[6],4,2),substr($task[6],6,2),substr($task[6],0,4));
		$date_end = $date_start + 86400;
		if (date("Y-m-d", $date_start) != $task[4]) {
			$task[1] = $task[1]." (DUE: ".$task[4].")";
		}
	}
	else {
		$date_start = mktime(0,0,0,substr($task[4],5,2),substr($task[4],8,2),substr($task[4],0,4));
		if ($date_start < mktime(0,0,0,date("m"),date("d"),date("Y"))) {
			$date_end = mktime() + 86400;
			$task[1] = $task[1]." (OVERDUE: ".$task[4].")";
		}
		else {
			$date_end = $date_start + 86400;
		}
	}
*/
	
	switch ($custom->ical_export_type) {
		case "event":
			$output .= "BEGIN:VEVENT\n";
			$output .= "UID:".md5(microtime())."\n";  // quasi-GUID
			$output .= "SUMMARY:".str_replace($strings, $escaped_strings, $task[1])."\n"; // title
			$output .= "DESCRIPTION:".str_replace($strings, $escaped_strings, $task[2])."\n"; 
			$priority = 6 - $task[3];
			$output .= "PRIORITY:".$priority."\n"; // priority
			$output .= "URL;VALUE=URI:".$custom->tasks_URL."index.php?screen=focus&root=".$task[0]."\n"; // task URL
			$output .= "DTSTART;VALUE=DATE:".date("Ymd", $date)."\n"; // due date
			$output .= "DTEND;VALUE=DATE:".date("Ymd", $date + 86400)."\n"; // due date + 1 day
			$output .= "END:VEVENT\n";
			break;
		case "todo":
			$output .= "BEGIN:VTODO\n";
			$output .= "UID:".md5(microtime())."\n";  // quasi-GUID
			$output .= "SUMMARY:".str_replace($strings, $escaped_strings, $task[1])."\n"; // title
			$output .= "DESCRIPTION:".str_replace($strings, $escaped_strings, $task[2])."\n"; // notes
			$priority = 6 - $task[3];
			$output .= "PRIORITY:".$priority."\n"; // priority
			if ($task[5] == 0) {
				$status = "NEEDS-ACTION";
			}
			else {
				$status = "IN-PROCESS";
			}
			$output .= "STATUS:".$status."\n"; // priority
			$output .= "URL;VALUE=URI:".$custom->tasks_URL."index.php?screen=focus&root=".$task[0]."\n"; // task URL
			$output .= "DTSTART;VALUE=DATE:".date("Ymd", $date)."\n"; // due date
			$output .= "DUE;VALUE=DATE:".date("Ymd", $date)."\n"; // due date
			$output .= "END:VTODO\n";
			break;
	}
}
if ($custom->ical_include_todo == 1) {
	$leaf = get_leaf_tasks(-1);
	$in = "";
	foreach ($leaf as $temp) {
		$in .= $temp.",";
	}
	$in = substr($in, 0, (strlen($in) - 1));

	$result = mysql_query("SELECT ID, title, notes, priority, date_due, status, date_modified "
	                     ."FROM $database->table_name "
	                     ."WHERE obsolete != '1' "
	                     ."AND date_due = '0000-00-00' "
	                     ."AND status != '100' "
	                     ."AND ID IN (".$in.") "
	                     ."ORDER BY title");
	$tasks = array();
	if ($result != false) {
		while ($temp = mysql_fetch_array($result)) {
			$tasks[] = $temp;
		}
	}
	foreach ($tasks as $task) {
		$output .= "BEGIN:VTODO\n";
		$output .= "UID:".md5(microtime())."\n";  // quasi-GUID
		$output .= "SUMMARY:".str_replace($strings, $escaped_strings, $task[1])."\n"; // title
		$output .= "DESCRIPTION:".str_replace($strings, $escaped_strings, $task[2])."\n"; 		
		$priority = 6 - $task[3];
		$output .= "PRIORITY:".$priority."\n"; // priority
		if ($task[5] == 0) {
			$status = "NEEDS-ACTION";
		}
		else {
			$status = "IN-PROCESS";
		}
		$output .= "STATUS:".$status."\n"; // priority
		$output .= "DTSTART;VALUE=DATE:".date("Ymd")."\n"; // date
		$output .= "URL;VALUE=URI:".$custom->tasks_URL."index.php?screen=focus&root=".$task[0]."\n"; // task URL
		$output .= "END:VTODO\n";
	}
}
$output .= "END:VCALENDAR\n";
$database->disconnect();

?>