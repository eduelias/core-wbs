<style>
td{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:13px;
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
body{
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
</style>
<?

	$bd = new bd();
	$pct = $_GET['pct'];
	$res = $bd->gera_array('tipo from v_rma_pct where idrmapct = '.$_GET['id']);
	if ($res[0][tipo] == '5') {
		#echo 'pct 5';
		include('modulos/mod_rma/sub_interno1/print_envio.php');
		exit();
	}
	
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
		$re_data = $bd->gera_array('data from v_rma_pct where idrmapct = '.$_GET['id']);
	#echo $bd->get_sql();
		$rev =  $re_data[0]['data'];
		$my_t=getdate(date("U"));
		$data =   $my_t[mday].'/'.$my_t[mon].'/'.$my_t[year];
	}
	
	 

	#echo $s;(select short_desc from v_rma_pct where tipo = 1 and idrmapct in (select idrmapct from v_rma_pctrma where v_rma_pctrma.idrma = id))
	
	$res = $bd->gera_array("@idrma:=idrma as id, (select v_rma_pct.idrmapct from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma_pct.tipo = 2 and v_rma_pctrma.idrma = @idrma) as pct, codprod_tcliente,(SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod_tcliente) as nomeprod,(IF(v_rma.tipo_prod='P','MAXXMICRO',(select nome from pedido,empresa where pedido.codped = v_rma.codped and empresa.codemp=pedido.codemp))) as emp,(select tipo_fab from codbarra where codbarra = v_rma.codbarra limit 1) as p_v, codbarra_tcliente as codbarra", "v_rma", $s);	
	
	$dbg = $bd->get_debug();
	if (count($dbg[mysqlerr])>0) {
		pre($dbg);
	}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%" align="left" valign="top"><h1>
      <?=GeraBarcode($_GET['id'])?>
    </h1></td>
    <td width="40%" align="center" valign="middle"><h1>
      TRANSFER&Ecirc;NCIA ESTOQUE</h1></td>
    <td width="30%" align="right" valign="top"><font size="3px"><b>DATA LIBERA&Ccedil;&Atilde;O<br />
      </b>
          <?=$re_data[0]['data']?>
          <br />
    </font></td>
  </tr>
</table>
<table width="100%" cellpadding="5px" cellspacing="0px" border="1" style="border-collapse:collapse">
<tr>
	<td class="td_bold td_center" width="30px">RMA</td>
    <td class="td_bold td_center" width="30px">PCT</td>
	<td class="td_bold td_center" width="30px">CODPROD</td>
	<td class="td_bold td_center">PRODUTO</td>
    <td class="td_bold td_center">EMPRESA</td>
    <td class="td_bold td_center" width="10px">TIPO</td>
    <td class="td_bold td_center" width="65px"><u>NOVO</u> NS</td>
</tr>
<? foreach ($res as $registro => $dados) { ?>
	<tr class='<?=($registro%2)?'tr_even':''?> td_caps'>
    <? foreach ($dados as $col => $val) { ?>
    	<? $out = ($col=='forn')?'<b>'.substr($val,0,25).'</b>':$val; ?>
        <? if (($col=='p_v') && ($out == '')) { $out = 'V';} ?>
        <? $out = ($col=='codbarra')?GeraBarcode($out):$out; ?>
        <? $span = ($col =='codbarra')?' rowspan = 2':''; ?>
		<td<?=$span?>><?=$out?></td>
    <? } ?>
	</tr>
    <tr class='<?=($registro%2)?'tr_even':''?> td_caps'>
    	<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
         <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
<? } ?>
</table>