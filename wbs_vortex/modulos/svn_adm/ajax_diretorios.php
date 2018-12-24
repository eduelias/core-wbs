<?
	$ret['path'] = $_GET['path'];
	exec('find '.$_GET['path'].'/  \( ! -regex \'.*/\\..*\' \) -maxdepth 1 -mindepth 1 -type d | sort',$arr);
	foreach ($arr as $k=>$v){
		$xpl = explode('/',$v);
		$new[$k]['label'] = $xpl[count($xpl)-1];
		$new[$k]['path'] = $v;
	}
	$ret = json($new);
	echo $ret;

?>
