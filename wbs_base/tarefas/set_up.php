<?

if (isset($_REQUEST["phpinfo"]) && $_REQUEST["phpinfo"] == 1) {
	phpinfo();
	die();
}

// check config.php settings for errors
if (!strstr($custom->date_format, "y") ||
    !strstr($custom->date_format, "m") ||
    !strstr($custom->date_format, "d")) {
	$page->msgs[] = $language->variable($language->messages["err_date_format"], $custom->date_format);
}

if ($custom->ical_enable == 1 && 
    $custom->ical_export_type != "event" && 
    $custom->ical_export_type != "todo") {
	$page->msgs[] = $language->variable($language->messages["err_event_type"], $custom->ical_export_type);
}

$mb_languages = array("Shift_JIS");

if (in_array($language->charset, $mb_languages) && !function_exists('mb_convert_encoding')) {
	die("Error, PHP must be compiled with '--enable-mbstring' to use the ".$language->charset." charset. More from <a href='http://www.php.net/manual/en/ref.mbstring.php'>php.net</a>");
}

?>