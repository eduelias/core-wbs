<pre><?
	echo $_SERVER['DOCUMENT_ROOT'];
	//svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS,1);
	//svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, 'eduardo');
	//svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, 'yf8mtfq2');
	
	//shell_exec('rm -rf wbs_vortex');
	//svn_checkout('https://svn.maxxmicro.com.br/wbs/wbs_vortex','wbs_vortex');
	
	//shell_exec('find /tmp -type d -exec chmod 775 {} +');
	//shell_exec('find /tmp -type f -exec chmod 664 {} +');
	exec('ls -l /tmp',$rs);
	foreach($rs as $k=>$v){
		$aux[$k] = explode(' ',$v);
		$z = $aux[$k];
		$tams[$k] = array('tamanho'=>$aux[$k][count($z)-6],'id'=>$aux[$k][count($z)-1]);
		
	}
	array_shift($tams);
	array_shift($tams);
	print_r($tams);
	foreach ($tams as $k => $v) {
		
		if (($v['tamanho'] < 900)&&($v['tamanho'] > 0)){
			$aux = explode('_',$v['id']);
			$n = file('/tmp/sess_'.$aux[1]);
			$a_files[$k] = $n;
/*			$aux_2 = explode(';', $n[0]);
			$aux_3 = explode(':',$aux_2[3]);
			$user = $aux_3[2];
			$usuarios[] = $user;*/
			$usuarios = $a_files;
		} else if ($v['id'] == $_GET['id']) {
			$aux = explode('_',$v['id']);
			//print_r($v);
			SetCookie("PHPSESSID", $v['id'] , time()-3600, "/", "http://wbs-teste.maxxmicro.com.br", 0);
			$_COOKIE['PHPSESSID'] = $aux[1];
			//echo $v['id'];//."<br>".$v['id'];
			//@session_name($v['id']);
			//session_name('WBS');
			session_start();
			//echo "<pre>";
			//print_r($_SESSION);
			//echo "</pre>";
			session_destroy();
			session_unset();
		} else if ($v['tamanho'] == 464){
			print_r(file('/tmp/'.$v['id']));
		}
		//SetCookie("PHPSESSID", 'tj02kre06at5465mak6pljoc62' , time()-3600, "/", "http://wbs-teste.maxxmicro.com.br", 0);
		//$_COOKIE['PHPSESSID'] = 'tj02kre06at5465mak6pljoc62';
	}
?>


<?=print_r($usuarios)?>
<?=print_r($rs)?>
</pre>