<style>
td{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:9px;
}
.td_bold {
	font-weight:bold;
}

.td_center{
	text-align:center;
}

.tr_even{
	background:#EDEDED;
}

.td_caps{
	text-transform:uppercase;
}
</style>
<?

	$bd = new bd();
	$pct = $_GET['pct'];
		$my_t=getdate(date("U"));
	$data =   $my_t[mday].'/'.$my_t[mon].'/'.$my_t[year];
	if (!$pct) { 
		$ids = $_GET;
		
		array_shift($ids);
		
		$s1 = ' ';
		
		foreach ($ids as $k=>$v) {
		
			
				$s .= $s1.'idrma = '.$v;
				
				$s1 = ' OR ';
		
		}
	}else{
		$s = "idrma in (select idrma from v_rma_pctrma where idrmapct = ".$_GET['id'].")";
		$re_data = $bd->gera_array('short_desc, DATE_FORMAT(data,"%d/%m/%Y %H:%i") as data, (select nome from clientenovo where codcliente = short_desc limit 1) as nome from v_rma_pct where idrmapct = '.$_GET['id']);
		#echo $bd->get_sql();
		$rev =  $re_data[0]['nome'];
		//pre($re_data);

		
	}
		?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="30%" align="left" valign="top"><?=GeraBarcode($_GET['id'])?></td>
                <td width="40%" align="center" valign="middle"><h1><?=$rev?></h1></td>
                <td width="30%" align="right" valign="top"><font size="3px"><?=$re_data[0]['data']?></font></td>
            </tr>
        </table>
        <?
	#echo $s;
	
	$res = $bd->gera_array("idrma, codprod,IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma) as nomeprod, codbarra,  (select tipo_fab from codbarra where codbarra = v_rma.codbarra limit 1) as p_v, (IF(v_rma.tipo_prod='P','MAXXMICRO',(select nome from pedido,empresa where pedido.codped = v_rma.codped and empresa.codemp=pedido.codemp))) as buscar, codforn as forn, DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = v_rma.codoc and ocprod.codprod = v_rma.codprod limit 0,1), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = v_rma.codprod AND codoc = v_rma.codoc limit 0,1 ) MONTH),'%m/%Y') as garantia,(IF(flag_nosso,IF(flag_garantia,IF(flag_disponivel,'EM SEPARACAO','INDISPONIVEL'),'SEM GARANTIA'),'NÃO É NOSSO') ) as obs", "v_rma", $s);	
	
	#echo $bd->get_sql();
?>
<table width="100%" cellpadding="5px" cellspacing="0px" border="1" style="border-collapse:collapse">
<tr>
	<td class="td_bold td_center" width="10px">RMA</td>
	<td class="td_bold td_center" width="30px">CODPROD</td>
	<td class="td_bold td_center">PRODUTO</td>
    <td class="td_bold td_center">NS</td>
    <td class="td_bold td_center" width="10px">TIPO</td>
    <td class="td_bold td_center" width="10px">BUSCAR<br /> ESTOQUE</td>
    <td class="td_bold td_center">FORNECEDOR</td>
    <td class="td_bold td_center">GARANTIA<br />FORNECEDOR</td>    
    <td class="td_bold td_center">OBSERVAÇÃO</td>
</tr>
<? foreach ($res as $registro => $dados) { ?>
	<tr class='<?=($registro%2)?'tr_even':''?> td_caps'>
    <? foreach ($dados as $col => $val) { ?>
    	<? $out = ($col=='forn')?'<b>'.substr($val,0,25).'</b>':$val; ?>
        <? if (($col=='p_v') && ($out == '')) { $out = 'V';} ?>
		<td><?=$out?></td>
    <? } ?>
	</tr>
<? } ?>
</table>
<br />
<hr />
<br />
<?

$res = $bd->gera_array("idrma,codprod,IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),CONCAT('<b>PRODUTO NAO NOSSO:</b> ',laudo_rma)) as nomeprod, DATE_FORMAT(garantia,'%d/%m/%Y') as data_garantia, codbarra", "v_rma", $s);	

	#echo $bd->get_sql();
	#echo '<div style="float:left">'.GeraBarcode($_GET['id']).'</div><center><font size="3px"><b>PEDIDO RMA</b></font><br>['.$data.']<br><br></center>';
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="30%" align="left" valign="top"><?=GeraBarcode($_GET['id'])?></td>
        <td width="40%" align="center" valign="middle"><h1>RMA MAXXMICRO</h1><b>REVENDA: </b> <?=$rev?></td>
        <td width="30%" align="right" valign="top"><font size="3px"><?=$re_data[0]['data']?></font></td>
    </tr>
</table>
<table width="100%" cellpadding="5px" cellspacing="0px" border="1" style="border-collapse:collapse">
<tr>
	<td class="td_bold td_center" width="2%">RMA</td>
	<td class="td_bold td_center" width="10%">CODPROD</td>
	<td class="td_bold td_center" width="80%">PRODUTO</td>
    <td class="td_bold td_center">GARANTIA </td>
    <td class="td_bold td_center">NS</td>
</tr>
<? foreach ($res as $registro => $dados) { ?>
	<tr class='<?=($registro%2)?'tr_even':''?> td_caps'>
    <? foreach ($dados as $col => $val) { ?>
    	<? $out = ($col=='codbarra')?GeraBarcode($val):$val; ?>
        <? $span = ($col=='codbarra')?' rowspan = 2':''; ?>
        <? if (($col=='p_v') && ($out == '')) { $out = 'V';} ?>
		<td><?=$out?></td>
    <? } ?>
	</tr>
<? } ?>
</table>