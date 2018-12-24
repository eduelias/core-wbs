<?
	#header("Accept-Encoding: gzip, deflate");
	session_start();
	$login = new login($_SESSION);
	$path = realpath($_GET['path']);
	svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS,1);
	svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, SVN_USER);
	svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, SVN_PASSWORD);
	
	@$wc_novos = svn_status($path);
	
	if ($_GET['atualiza']) {
		foreach ($wc_novos as $k){
			svn_add($k['path']);
			$inc[] = $k['path'];
		}
		@svn_commit('COMMIT VIA WBS', $inc);	
	}
	
	if ($_GET['update']){
		@svn_update($path);
	}
	
	$a['atualizados'] = $wc_novos;
	$a['erro'] = ($login->checklogin())?0:1;
	$st = @svn_status(realpath($_GET['path']), svn::SHOW_UPDATES);
	$a['totalRecords'] = count($st);
	$a['records'] = $st;
	
	$n = json($a);
	echo $n;
?>