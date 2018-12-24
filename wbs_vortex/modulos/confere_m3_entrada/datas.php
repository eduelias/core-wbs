<option value="-1" disabled="disabled" selected="selected">--- SELECIONE ---</option>
<?php

	$bd = new bd;
	
	/*if (!isset($ar)) $ar = $bd->gera_array('DATE_FORMAT(datacompra, "%Y%m") as datag, DATE_FORMAT(datacompra, "%m/%Y") as data_show, CONCAT(DATE_FORMAT(datacompra, "%Y-%m-"),"01") as datacompra','oc','codemp = 14 GROUP BY datag ORDER BY datag ASC');*/
	
	if (!isset($ar)) $ar = $bd->gera_array('DATE_FORMAT(datanf, "%Y%m") as datag, DATE_FORMAT(datanf, "%m/%Y") as data_show, CONCAT(DATE_FORMAT(datanf, "%Y-%m-"),"01") as datacompra','ocprod','codemp = 14 GROUP BY datag ORDER BY datag ASC');

	foreach ($ar as $p => $v) {
?>
	<option value="<?=$v['datacompra']?>"><?=$v['data_show']?></option>
<?php } ?>