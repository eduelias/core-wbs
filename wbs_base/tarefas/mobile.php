<?

// include library files
require_once('objects.php');
require_once('database.php');
require_once('functions.php');
require_once('mobile_functions.php');
require_once('config.php');
require_once('compatibility.php');
require_once('set_up.php');

// session
session_start();
$_SESSION["mode"] = "mobile";

// set page variables
$page = new page;
$task = new task;

$page->add_flag("mobile");
$debug = 0; 								// set to 1 to display debug messages
$current_page = "index.php?current_page=1";	// initialize string
$reload_task = 1; 							// when this gets set to 0, it stops the save from happening

// get language
require_once('languages/'.$custom->language_mobile.'.php');
header("Content-Type: text/html; charset=".$language->charset);

require_once('engine.php');

?>
<html>
<head>
<title><?=$page->title?></title>
<meta name="HandheldFriendly" value="true" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<style>
<!--
body, p, td, div, span, input, select, textarea {
	font-family: verdana, arial, helvetica, san-serif;
	font-size: 10px;
}
//-->
</style>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<p>
<a href="mobile.php"><img src="images/icon_home.gif" border="0" height="16" width="16" alt="<?=strip_HTML($language->menu["home"])?>" /></a> &nbsp;
<a href="mobile.php?screen=edit"><img src="images/icon_new.gif" border="0" height="16" width="16" alt="<?=strip_HTML($language->menu["new_task"])?>" /></a> &nbsp;
<a href="mobile.php?screen=search"><img src="images/icon_search.gif" border="0" height="16" width="16" alt="<?=strip_HTML($language->menu["search"])?>" /></a> &nbsp;
<a href="mobile.php?screen=upcoming"><img src="images/icon_upcoming.gif" border="0" height="16" width="16" alt="<?=strip_HTML($language->menu["upcoming"])?>" /></a> &nbsp;
<a href="mobile.php?screen=recent"><img src="images/icon_recent.gif" border="0" height="16" width="16" alt="<?=strip_HTML($language->menu["history"])?>" /></a>
</p>

<?
if (!empty($page->breadcrumbs)) {
	print("<p>".str_replace("index.php", "mobile.php", $page->breadcrumbs)."</p>\n");
}
if (count($page->msgs) > 0) {
	print("<p><b>".$language->messages["title"].":</b><br>\n");
	foreach ($page->msgs as $temp) {
		print($temp."<br>\n");
	}
	print("</p>");
}

require_once('mobile_screens.php');

?>
<p>&nbsp;</p>



<p><?=$language->misc["copyright"]?> &copy; 2002<? date("Y") != "2002" ? print("-".date("Y")) : print(""); ?> <a class="legalText" href="http://www.alexking.org/software/tasks/" target="_blank">alexking.org</a>.<br>
<?=$language->misc["all_rights_reserved"]?> <a href="mobile.php?screen=about">about tasks</a><br>
<?
include("version.inc");
if (isset($this_version)) {
		print($language->variable($language->misc["version"], $this_version)."\n");
}
$database->disconnect();
?>

</body>
</html>