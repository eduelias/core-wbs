<option value="-1" disabled="disabled" selected="selected">--- SELECIONE ---</option>
<?php

	$bd = new bd;
	
	if (!isset($ar)) $ar = $bd->gera_array('DATE_FORMAT(dataped, "%Y%m") as datapedg, DATE_FORMAT(dataped, "%m/%Y") as data_show, CONCAT(DATE_FORMAT(dataped,"%Y-%m-"),"01") as dataped','pedido','codemp = 14 GROUP BY datapedg');

	foreach ($ar as $p => $v) {
?>
	<option value="<?=$v['dataped']?>"><?=$v['data_show']?></option>
<?php } ?>