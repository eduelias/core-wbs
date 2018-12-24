<script language="JavaScript">
<!--

function email(a, b, c, d, show) { // try to avoid spam trollers, intentionally complex
	if (!show) {
		show = a + b + c + d;
	}
	e_string = "<a href=\"ma" + "ilto:" + a + b + c + d + "\">" + show + "</a>";
	document.write(e_string);
}

//-->
</script>
<table width="100%" cellpadding="0" cellspacing="7">
	<tr valign="top">
		<td align="center">
			<img src="images/clear.gif" width="1" height="50">
			<br>
			<img src="images/tasks_title.gif" alt="Tasks Jr." width="250" height="100">
			<br>
			<img src="images/clear.gif" width="1" height="20">
			<br>
			<span style="color: #999;"><? print($language->about["tagline"]); ?></span>
			<br>
			<img src="images/clear.gif" width="1" height="70">
			<br>
<?
$URL = 'http://www.kingdesign.net/tasks-jr/documentation/';
if (file_exists('documentation/index.html')) {
	$URL = 'documentation/';
}
?>	
			<a href="<?=$URL?>" target="_blank"><? print($language->about["documentation"]); ?></a> |
<?
$URL = 'http://www.kingdesign.net/tasks-jr/README.txt';
if (file_exists('README.txt')) {
	$URL = 'README.txt';
}
?>	
			<a href="<?=$URL?>" target="_blank"><? print($language->about["read_me"]); ?></a> | 
<?
$URL = 'http://www.kingdesign.net/tasks-jr/LICENSE.txt';
if (file_exists('LICENSE.txt')) {
	$URL = 'LICENSE.txt';
}
?>	
			<a href="<?=$URL?>" target="_blank"><? print($language->about["license"]); ?></a>
			<br><img src="images/clear.gif" width="1" height="10"><br>
<?

include("version.inc");
if (isset($this_version)) {
	print("			".$language->variable($language->about["this_version"],$this_version)."\n");
	print("			<br><img src=\"images/clear.gif\" width=\"1\" height=\"10\"><br>\n");
}
if ($custom->check_for_updates == 1) {
	$file = @fopen("http://www.kingdesign.net/tasks-jr/version.php?type=release".$this_version, "r");
	if ($file) {
		while (!feof ($file)) {
			$release_version = fgets($file, 50);
		}
		if ($this_version != $release_version) {
			print("			".$language->variable($language->about["latest_version"],$release_version)." (<a href=\"http://www.kingdesign.net/tasks-jr/download/tasks_jr.tar.gz\">".$language->about["download"]."</a>)");
		}
		else {
			print("			".$language->about["using_latest"]."\n");
		}
	}
	if ($custom->use_beta == 1) {
		print("			<br><img src=\"images/clear.gif\" width=\"1\" height=\"10\"><br>\n");
		$file = @fopen("http://www.kingdesign.net/tasks-jr/version.php?type=beta", "r");
		if ($file) {
			while (!feof ($file)) {
				$beta_version = fgets($file, 50);
			}
			if ($this_version != $beta_version) {
				$temp = str_replace(" ", "", $beta_version);
				print("			".$language->variable($language->about["beta_version"],$beta_version)." (<a href=\"http://www.kingdesign.net/tasks-jr/download/beta/tasks_jr.tar.gz\">".$language->about["download"]."</a>)");
			}
			else {
				print("			".$language->about["using_beta"]."\n");
			}
		}
		print("			<br><img src=\"images/clear.gif\" width=\"1\" height=\"10\"><br>\n");
	}
}
?>
			<br><img src="images/clear.gif" width="1" height="10"><br>
			<? print($language->about["feedback"]); ?> <script language="JavaScript">email("supp","ort@","kingde","sign.net");</script>
			<br><img src="images/clear.gif" width="1" height="10"><br>
			<? print($language->about["web"]); ?> <a href="http://www.kingdesign.net/tasks-jr/" target="_blank">http://www.kingdesign.net/tasks-jr/</a>
		</td>
		<td width="200" valign="bottom">
			<img src="images/clear.gif" width="1" height="70">
			<p class="credits_title"><? print($language->about["credits"]); ?></p>
			
			<p class="credits"><? print($language->about["main_credit"]); ?></p>

<?
$temp = $language;

$path = "languages/";
if ($handle = opendir($path)) {
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") { 
			if (is_file($path.$file) && strtolower(substr($file, -4, 4)) == ".php") {
				ob_start(); // hack to keep some weird char? from starting output in spanish.php
				include($path.$file);
				ob_end_clean();
				print('			<p class="credits"><b>'.$language->name.'</b>');
				print('<br>by '.$language->author);
				if (!empty($language->author_email) || !empty($language->author_web)) {
					print('<br>');
					print('<a href="'.$language->author_web.'" target="_blank">'.$language->about["web_site"].'</a> ');

					$i = floor(strlen($language->author_email) / 4);
					$a = substr($language->author_email, ($i * 0), $i);
					$b = substr($language->author_email, ($i * 1), $i);
					$c = substr($language->author_email, ($i * 2), $i);
					$d = substr($language->author_email, ($i * 3), ($i + strlen($language->author_email) % 4));

					print(' <script language="JavaScript">email("'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$language->about["email"].'");</script>');
				}
				print('</p>'."\n");
			}
		}
	}
}
closedir($handle);

$language = $temp;
?>
		</td>
	</tr>
</table>
