<?

	include("../../include/var.php");
	include("../../include/class.php");
	include("../../include/functions.php");

	$bd = new bd();
	$res = $bd->gera_array('codvend, status, confianca, codfnc, CURTIME() as hora, (select nome from clientenovo where doc = cpf) as Nomextenso,(select `desc` from ponto_funcoes where codfnc = vendedor.codfnc) as funcao, (select hora from ponto_horafaixas,ponto_fnc_tem_faixa WHERE ponto_horafaixas.codfaixa = ponto_fnc_tem_faixa.codfaixa AND ponto_fnc_tem_faixa.codfnc = vendedor.codfnc AND ADDTIME(hora,tolerancia) > CURTIME() AND SUBTIME(hora,tolerancia) < CURTIME() LIMIT 1) as faixa, (select IF(CURTIME()<=(select ADDTIME(hora,tolerancia) from ponto_horafaixas,ponto_fnc_tem_faixa where ponto_horafaixas.codfaixa = ponto_fnc_tem_faixa.codfaixa AND ponto_fnc_tem_faixa.codfnc = vendedor.codfnc LIMIT 1),"true","false")) as entrada','vendedor','LEFT(CAST(HEX(MD5(codvend)) AS CHAR),12) LIKE  "%'.$_GET['id'].'%"');
	
	$tanafaixa = $res[0]['faixa'];
	$status = $res[0]['status'];
	$confianca = $res[0]['confianca'];
	$grupo = $res[0]['codfnc'];
	
	$res[0]['0']['entrada'] = ($res[0]['confianca']=='S')?'true':'false';

	
	$func['nome'] = $res[0]['nome'];
	$func['email'] = $res[0]['email'];
	$func['sql'] = $bd->get_sql();
	
	$res['sql'] = $bd->get_sql();
	
	$json = new Services_JSON();
	$data = $json->encode($res);
	
	echo $data;	
	//pre($res);
?>