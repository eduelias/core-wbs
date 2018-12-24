<?

require_once('objects.php');
require_once('database.php');
require_once('config.php');

$URL = $custom->ical_URL."month.php?cal=".urlencode($custom->tasks_URL
      .'ics.php')."&getdate=".date("Ymd");

// if you are putting the tasks iCalendar into the $list_webcals value in your 
// PHP iCalendar config.inc.php file, remove the '//' before this next line

// $URL = $custom->ical_URL."month.php?getdate=".date("Ymd");


header("Location: ".$URL);

?>