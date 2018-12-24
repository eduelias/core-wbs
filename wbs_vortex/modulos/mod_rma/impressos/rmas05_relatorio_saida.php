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
            <td width="30%" align="left" valign="top"><h1>
              <?=GeraBarcode($_GET['id'])?>
            </h1></td>
            <td width="40%" align="center" valign="middle"><h1>
              <?=$rev?>
            </h1></td>
            <td width="30%" align="right" valign="top"><font size="3px"><b>DATA LIBERA&Ccedil;&Atilde;O<br />
              </b>
                  <?=$re_data[0]['data']?>
              <br />
            </font></td>
          </tr>
        </table>
       
          <?
	#echo $s;
	
	$res = $bd->gera_array("@idrma:=idrma as idrma, (select idrmapct from v_rma_pct where tipo = 2 and idrmapct in (select idrmapct from v_rma_pctrma where idrma = @idrma)) as pct1, CONCAT('<b>',codprod,'</b>-',IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v_rma.codprod),laudo_rma),'<br><b>NS:</b>', codbarra) as pvelho,(select CONCAT('<b>',codprod_tcliente,'</b>-',(select nomeprod from produtos where produtos.codprod = v_rma.codprod_tcliente),'<br><b>NS:</b>',codbarra_tcliente)) as pnovo, (select @arg:=tipo_fab from codbarra where codbarra = v_rma.codbarra limit 1) as p_v, (select nome from pedido,empresa where pedido.codped = v_rma.codped and empresa.codemp=pedido.codemp) as buscar, (IF(flag_nosso,IF(flag_garantia,IF(flag_disponivel,'OK','INDISPONIVEL'),'SEM GARANTIA'),'NÃO É NOSSO') ) as obs", "v_rma", $s);	
	
	#echo $bd->get_sql();
?>

  <table width="100%" cellpadding="5px" cellspacing="0px" border="1" style="border-collapse:collapse">
<tr>
	<td class="td_bold td_center" width="4%">RMA</td>
    <td class="td_bold td_center" width="4%">PCT ENTRADA</td>
	<td class="td_bold td_center" width="40%">PRODUTO COM DEFEITO</td>
    <td class="td_bold td_center" width="40%">PRODUTO NOVO</td>
    <td class="td_bold td_center" width="4%">TIPO</td>
    <td class="td_bold td_center" width="4%">ESTOQUE</td>  
    <td class="td_bold td_center" width="4%">OBS</td>
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