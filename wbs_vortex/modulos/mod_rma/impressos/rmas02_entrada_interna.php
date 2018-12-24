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
		$rev =  $re_data[0]['data'];
		$my_t=getdate(date("U"));
		$data =   $my_t[mday].'/'.$my_t[mon].'/'.$my_t[year];

	}

	$res = $bd->gera_array("v_rma.codcb as cocb, v_rma.idrma,v_rma_pct.idrmapct,v_rma.codprod,nomeprod,empresa.nome as name,v_rma.tipo_prod,descr,(select nome from codbarra,oc,fornecedor where codbarra.codoc = oc.codoc and oc.codfor = fornecedor.codfor and codbarra.codcb = cocb) as fornecedor", " v_rma_pct,v_rma_pctrma,v_rma,produtos,v_rma_laudos,empresa,codbarra", 'v_rma.codprod = produtos.codprod and v_rma.idrma = v_rma_pctrma.idrma and v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma.codcb_ent = codbarra.codcb and codbarra.codemp = empresa.codemp and v_rma.idlaudo = v_rma_laudos.idlaudo and v_rma_pct.idrmapct ='.$_GET[id]);	
		
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
      RMA INTERNO
    </h1></td>
    <td width="30%" align="right" valign="top"><font size="3px"><b>DATA ENTRADA<br />
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
    <td class="td_bold td_center">FORNECEDOR</td>
</tr>
<? foreach ($res as $k => $dados) { ?>
<tr>
	<td class="td_center <?=($registro%2)?'tr_even':''?> td_caps" width="30px"><?=$dados[idrma]?></td>
    <td class="td_center <?=($registro%2)?'tr_even':''?> td_caps" width="30px"><?=$dados[idrmapct]?></td>
	<td class="td_center <?=($registro%2)?'tr_even':''?> td_caps" width="30px"><?=$dados[codprod]?></td>
	<td class="td_bold td_center <?=($registro%2)?'tr_even':''?> td_caps"><?=$dados[nomeprod]?></td>
    <td class="td_center <?=($registro%2)?'tr_even':''?> td_caps"><?=$dados[name]?></td>
    <td class="td_center <?=($registro%2)?'tr_even':''?> td_caps" width="10px"><?=$dados[tipo_prod]?></td>
    <td class="td_bold td_center <?=($registro%2)?'tr_even':''?> td_caps"><?=$dados[fornecedor]?></td>
</tr>
<? } ?>
</table>