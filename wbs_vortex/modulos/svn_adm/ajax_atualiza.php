<?

$res['GET'] = $_GET;
foreach($_GET as $k=>$v){	
	$res[$k] = $v; 
	
	svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS,1);
	svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, SVN_USER);
	svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, SVN_PASSWORD);
	
	$res[] = svn_update($v);
	//shell_exec('chmod 664 '.$v);
	//shell_exec('find . -type d -exec chmod 775 {} +');
}

pre($res);
?>