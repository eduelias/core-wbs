<?
	#if (strlen($_GET['codbarra']) >= 4 ){
	
	#$codbarra = (isset($_GET['codbarra']))?' LIKE "%'.$_GET['codbarra'].'%"':'= "'.$_GET['id'].'"';
	$codbarra = (strlen($_GET['codbarra']) >= 4)?' LIKE "%'.$_GET['codbarra'].'%"':'= "'.$_GET['id'].'"';
	#pre($_GET);
	$bd = new bd();
	
	
	$res = $bd->gera_array("codprod,(select nomeprod from produtos where codprod = codbarra.codprod) as nomeprod,(select nome from fornecedor where fornecedor.codfor = (select codfor from oc where oc.codoc = codbarra.codoc)) as forn,codbarra,(select numnf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 0,1) as nf,(select DATE_FORMAT(datanf,'%d/%m/%Y') from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 0,1) as dtnf, codoc, (select pcu from ocprod where ocprod.codprod = codbarra.codprod and ocprod.codoc = codbarra.codoc limit 0,1) as preco,(select descr from v_rma_laudos where idlaudo = (select idlaudo from v_rma where v_rma.codbarra = codbarra.codbarra)) as laudo, (select nome from empresa where codemp = codbarra.codemp) as empo,DATE_FORMAT(DATE_ADD((select datanf from ocprod where ocprod.codoc = codbarra.codoc and ocprod.codprod = codbarra.codprod limit 0,1), INTERVAL (select garantia from ocprod WHERE ocprod.codprod = codbarra.codprod AND codoc = codbarra.codoc limit 0,1 ) MONTH),'%d/%m/%Y') as garantia from codbarra where codbarra ".$codbarra." GROUP BY codbarra ");
	 
	#echo $bd->get_sql();
	
	$arr = $res; 
	
	#}
	
	#pre($arr); 
	
	if (is_array($arr)) {
?>

    <table width="100%" border="0" style="border-collapse:collapse" cellpadding="2px">
        <tr>
        	<th align="center" class="yui-dt-asc"><b>CODPROD</b></td>
            <th align="center" class="yui-dt-asc"><b>PRODUTO</b></td>
            <th align="center" class="yui-dt-asc"><b>FORNECEDOR</b></td>
            <th align="center" class="yui-dt-asc"><b>NS</b></td>
            <th align="center" class="yui-dt-asc"><b>NF</b></td>
            <th align="center" class="yui-dt-asc"><b>DATA NF</b></td>
            <th align="center" class="yui-dt-asc"><b>#OC</b></td>
            <th align="center" class="yui-dt-asc"><b>VALOR</b></td>
            <th align="center" class="yui-dt-asc"><b>LAUDO</b></td>
            <th align="center" class="yui-dt-asc"><b>CLIENTE</b></td>
            <th align="center" class="yui-dt-asc"><b>GARANTIA</b></td>
        </tr>
        <? foreach ($arr as $k => $ar){ ?>
            <tr class="<?=(($k%2)?'odd':'even')?>">
            <? foreach($ar as $k => $v) { ?>
                <td><?=$v?></td>
            <? } ?>
            </tr>
        <? } ?>
    </table>
<? } else { ?>

	<h1>PRODUTO NÃO ENCONTRADO</h1>
	<?=$bd->get_sql()?>
<? } ?>   
 