<?

// for compatibility with PHP < 4.1.0, thanks Simon Jacquier

if (!$_REQUEST) {
	$_REQUEST = $HTTP_GET_VARS;
	$_REQUEST = array_merge($_REQUEST, $HTTP_POST_VARS);
	$_REQUEST = array_merge($_REQUEST, $HTTP_COOKIE_VARS);
}

if (!function_exists('array_key_exists')) {
	function array_key_exists($key, $search) {
		if (in_array($key, array_keys($search))) {
			return true;
		}
		else {
			return false;
		}
	}
}

// for compatibility if magic_quotes are disabled

function add_magic_quotes($array) {
	foreach ($array as $k => $v) {
		if (is_array($v)) {
			$array[$k] = add_magic_quotes($v);
		} else {
			$array[$k] = addslashes($v);
		}
	}
	return $array;
} 

if (!get_magic_quotes_gpc()) {
	$HTTP_GET_VARS    = add_magic_quotes($HTTP_GET_VARS);
	$HTTP_POST_VARS   = add_magic_quotes($HTTP_POST_VARS);
	$HTTP_COOKIE_VARS = add_magic_quotes($HTTP_COOKIE_VARS);
	$_REQUEST         = add_magic_quotes($_REQUEST);
}

set_magic_quotes_runtime(0);

?>