<?

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
			$aux = explode('_',$v['id']);
			//print_r($v);
			SetCookie("PHPSESSID", $v['id'] , time()-3600, "/", "http://wbs.maxxmicro.com.br", 0);
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
	}
?>