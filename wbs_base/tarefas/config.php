<?

$custom = new custom;  // new "custom" instance
$custom->init();       // sets date ranges

/* ##### Edit these settings as needed ##### */

$custom->language =                 "brazilian";
// language you want to see tasks in - the following languages are included:
//
//   brazilian
//   catalan
//   danish
//   dutch
//   english
//   french
//   german
//   greek
//   italian
//   japanese
//   japanese.shift_JIS
//   korean
//   russian
//   spanish
//   spanish2
//   swedish
//   traditional_chinese
//
// to use one of these languages, make sure you copy-paste the name exactly

$custom->language_mobile =          "brazilian";
// language you want to see the tasks PDA version in, some languages (like Japanese)
// require a different language file for cell phones

$custom->tasks_URL =                "http://wbs.ipasoft.com.br/tarefas/";
// http URL to tasks

$custom->home_sort_order =          "title";
// set this to one of the following values:
//
//  title
//  title_rev
//  priority
//  priority_rev

$custom->upcoming_days =            7;    
// number of days ahead to show tasks in the "upcoming" screen and email reminders

$custom->date_format =              "d/m/y";
// put these in the order you want to see them.
// you can use any separator you want: slashes (/), dashes (-), periods (.), etc.

$custom->date_picker_months =       3;
// how many months to show in the date picker

$custom->server_time_difference =   0; 
// hours ahead or behind you are from your server

$custom->show_deleted_in_history =  1;
// set to 0 to NOT show deleted tasks in the History view

$custom->live_breadcrumbs = 		1; 
// set to 1 to update the page title and breadcrumbs as you type

$custom->check_for_updates =        1;
// set to 1 to enable checking for new versions

$custom->use_beta =                 1;         
// set to 1 to enable checking for beta versions from the about page


/* ##### iCalendar integration settings ##### */

$custom->ical_enable =              1;      
// set to 1 to enable iCalendar integration

$custom->ical_include_todo =        1;
// set to 1 to include undated tasks in iCalendar integration as VTODO items

$custom->ical_export_type =         "event"; 
// default is "event" exports as untimed events, set to "todo" to export all tasks as VTODO items

$custom->ical_days_before =         30; 
// days before the current date to export

$custom->ical_days_after =          90; 
// days after the current date to export

$custom->ical_URL =                 "http://wbs.ipasoft.com.br/tarefas/phpicalendar/";
// actual URL to PHP iCalendar


/* ##### email reminder settings ##### */

$custom->email_reminders_to =       "";
// email address "yourname@example.com" or list of addresses separated by commas (no spaces)
// "yourname@example.com,yourothername@example.com"


/* ##### blog integration settings ##### */

$custom->formatting_toolbar =		0;
// show the HTML formatting toolbar, useful for inserting HTML code into task notes

// b2 integration settings, edit as needed if you use b2

$custom->b2_enable =                0; 
// turn on posting to a b2 blog (http://www.cafelog.com/) from tasks

$custom->b2_post_URL =              "http://www.example.com/b2/b2tasks_post.php";
// actual URL of b2tasks_post.php in your b2 directory


// WordPress integration settings, edit as needed if you use WordPress

$custom->wp_enable =                0; 
// turn on posting to a WordPress blog (http://www.wordpress.org/) from tasks

$custom->wp_post_URL =              "http://www.example.com/wordpress/wp-admin/b2bookmarklet.php";
// actual URL of wp-bookmarklet.php in your blog/wp-admin/ directory


// Moveable Type integration settings, edit as needed if you use b2

$custom->mt_enable =                0; 
// turn on posting to a Moveable Type blog (http://www.moveabletype.org/) from tasks

$custom->mt_post_URL =              "http://www.example.com/mt/mt.cgi";
// actual URL of mt.cgi in your Moveable Type directory

?>
