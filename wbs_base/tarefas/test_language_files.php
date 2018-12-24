<html>
<style>
body, p, h2 {
	font-family: verdana;
}
p {
	font-size: 11px;
}
p code {
	font-size: 12px;
}
</style>
<body>
<?

require("objects.php");
require("functions.php");

function get_language_vars() {
	include("languages/english.php");
	$test = array("name" => 			$language->name
				 ,"author" => 			$language->author
				 ,"author_email" => 	$language->author_email
				 ,"author_web" => 		$language->author_web
				 ,"charset" => 			$language->charset
				 ,"about" => 			$language->about
				 ,"accesskey" => 		$language->accesskey
				 ,"breadcrumbs" => 		$language->breadcrumbs
				 ,"confirm" => 			$language->confirm
				 ,"data" => 			$language->data
				 ,"email_reminders" => 	$language->email_reminders
				 ,"form" => 			$language->form
				 ,"home" => 			$language->home
				 ,"icons" => 			$language->icons
				 ,"list" => 			$language->list
				 ,"list_titles" => 		$language->list_titles
				 ,"menu" => 			$language->menu
				 ,"messages" => 		$language->messages
				 ,"misc" => 			$language->misc
				 ,"picker" => 			$language->picker
				 ,"resolve" => 			$language->resolve
				 ,"search" => 			$language->search
				 ,"toolbar" => 			$language->toolbar
				 ,"tree" => 			$language->tree
				 );

	$vars = array();
	foreach ($test as $k => $v) {
		if (!is_array($v)) {
			$vars[$k] = $k;
		}
		else {
			$temp = array();
			foreach ($v as $key => $val) {
				$temp[$key] = $key;
			}
			$vars[$k] = $temp;
		}
	}
	return $vars;
}

function show_errors() {
	global $language;
	$language_vars = get_language_vars();
	foreach ($language_vars as $key => $var) {
		if (!is_array($var)) {
			eval("\$test = \$language->".$var.";");
			if (empty($test)) {
				print("<p><b>Error:</b> no value for <code>\$language->".$key."['".$array_var."']</code>");
			}
		}
		else {
			foreach ($var as $array_var) {
				eval("\$test = \$language->".$key."['".$array_var."'];");
				if (empty($test)) {
					print("<p><b>Error:</b> no value for <code>\$language->".$key."['".$array_var."']</code>");
				}
			}
		}
	}
}

print('<h2>Languages</h2>');

$path = "languages/";
if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") { 
			if (is_file($path.$file) && strtolower(substr($file, -4, 4)) == ".php") {
				ob_start();
				include($path.$file);
				ob_end_clean();
				print("<h3>Starting ".$file."</h3>");
				show_errors();
				print("<p>Done with ".$file."<br />&nbsp;</p>");
			}
		}
	}
}

print('<h2>Orphaned Languages</h2>');

$path = "orphaned_languages/";
if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") { 
			if (is_file($path.$file) && strtolower(substr($file, -4, 4)) == ".php") {
				ob_start();
				include($path.$file);
				ob_end_clean();
				print("<h3>Starting ".$file."</h3>");
				show_errors();
				print("<p>Done with ".$file."<br />&nbsp;</p>");
			}
		}
	}
}

?>
</body>
</html>