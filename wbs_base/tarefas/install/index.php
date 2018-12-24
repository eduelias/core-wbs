<?php

require_once('../objects.php');
require_once('../database.php');

if (isset($_REQUEST["install"]) && $_REQUEST["install"] == 1) {

	require_once('../functions.php');
	require_once('../config.php');
	
	$create = mysql_query('CREATE TABLE '.$database->table_name.'( ID int( 11 ) NOT NULL auto_increment, parent int( 11 ) default NULL , title text, notes text, `status` int( 11 ) default NULL , priority int( 11 ) default \'3\', URL_1 text, URL_2 text, URL_3 text, date_due date default NULL , date_modified timestamp( 14 ) NOT NULL , date_entered timestamp( 14 ) NOT NULL , obsolete smallint( 6 ) default \'0\', container smallint( 6 ) default \'0\', `type` smallint( 6 ) NOT NULL default \'0\', user_date_1 datetime NOT NULL default \'0000-00-00 00:00:00\', user_date_2 datetime NOT NULL default \'0000-00-00 00:00:00\', user_text_1 text NOT NULL , user_text_2 text NOT NULL , user_int_1 int( 11 ) NOT NULL default \'0\', user_int_2 int( 11 ) NOT NULL default \'0\', PRIMARY KEY ( ID ) )');
	
	if ($create != false) {
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (1, 0, '* Welcome to Tasks Jr!', 'I hope you find this software useful. \r\n\r\nIf you have questions or comments, post them on the forums - the URL is below.', 0, 5, 'http://www.kingdesign.net/forums/', '', '', '0000-00-00', 20030116231922, 20021213093728, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (2, 0, 'Sample Task with Sub-Tasks', '', 0, 3, '', '', '', '0000-00-00', 20030101154920, 20021213093932, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (3, 2, 'Sub-Task with later due date', '', 0, 3, '', '', '', '".date("Y-m-d", mktime() + (3600 * 24 * 7))."', 20030101155022, 20021213093957, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (4, 2, 'Sub-Task with due date', 'notes here if needed', 50, 3, '', '', '', '".date("Y-m-d", mktime() + (3600 * 24 * 2))."', 20030101155002, 20021213094036, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (5, 0, 'Donate to alexking.org if you like and use this software.', 'If you do like and use this software, please consider making a donation.', 0, 3, 'http://www.alexking.org/donate/', '', '', '0000-00-00', 20030116231549, 20021213094228, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (6, 0, 'Need multi-user functionality? Check out Tasks Pro!', 'Tasks Pro is the a multi-user version of Tasks. It has lots of great features like e-mail notifications, RSS feeds, preference screens and per user settings in the application instead of editing a config file, and much much more. Check it out!', 0, 3, 'http://www.taskspro.com/', '', '', '0000-00-00', 20040405010101, 20040405010101, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");
	
		$insert = mysql_query("INSERT INTO ".$database->table_name." (ID, parent, title, notes, status, priority, URL_1, URL_2, URL_3, date_due, date_modified, date_entered, obsolete, container, type, user_date_1, user_date_2, user_text_1, user_text_2, user_int_1, user_int_2) VALUES (7, 0, 'Upgrade to Tasks', 'This is the upgrade to Tasks Jr.! It brings a huge preformance improvement, the ability to upload files and attach them to tasks, configuration settings through settings screens in the application, built-in security, recurring tasks, task templates, RSS feeds, and much much more!', 0, 3, 'http://www.kingdesign.net/tasks/', '', '', '0000-00-00', 20040405010101, 20040405010101, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0)");

		$title = 'Success';
		$body = 'Installation was successful, you should be able to <a href="../index.php">use Tasks Jr. now</a>.';
		$form = '';

	}
	else {
		$title = 'Installation Failed';
		$body = 'Installation was <strong>not</strong> successful, please check your settings in database.php and make sure you have already created the database specified there. Also make sure that your database user has permission to create tables.';
		$form = 'Once you have resolved any problems, click below to try again.';
	}

}
else {
	$title = 'Installation';
	$body = 'If you have created your MySQL database and entered your MySQL information in the database.php file, click the button below to install Tasks Jr.';
	$form = ' ';
}

?>
<html>
<head>
<title>Tasks Jr. Installation</title>
<style>
	@import url(install.css);
</style>
</head>
<body>

<div id="content">

<h1>Tasks Jr.</h1>

<div id="body">

<h2><?php print($title); ?></h2>

<?php print($body); ?>

<?php
if (!empty($form)) {
?>
<form name="install" action="index.php" method="get">

	<input type="hidden" name="install" value="1" />

<?php print($form); ?>

	<p id="next"><input type="submit" value="Install Tasks Jr." name="submit" /></p>

</form>
<?php
}
?>

</div>

<div id="footer">
	Copyright &copy; 2002-<?=date("Y")?> <a href="http://www.kingdesign.net/" target="_blank">King Design</a>. All rights reserved. 
</div>

</div>

</body>
</html>
