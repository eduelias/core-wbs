<script>
YAHOO.widget.DataTable.prototype.formatprod = function(cell,rec,col,data) {
	if (rec.getData('cbp')!=null) {
		cell.innerHTML = '<b>'+rec.getData('codnovo')+' - '+rec.getData('pnovo')+'</b><br><a href="../wbs_base/restrito.php?Action=list&codprod=&codpedselect='+rec.getData('cbp')+'&desloc=0&palavrachave=&operador=OR&pagina=&codprodpesq=&retlogin=1&connectok=&pg=105&hist=0&menu_not=1&impressao=1" target="_blank">'+rec.getData('codantigo')+' - '+rec.getData('pantigo')+'</a>';
	} else {
		cell.innerHTML = '<b>'+rec.getData('codnovo')+' - '+rec.getData('pnovo')+'</b><br>'+rec.getData('codantigo')+' - '+rec.getData('pantigo');
	}
}
YAHOO.widget.DataTable.prototype.formatarrow = function(cell,rec,col,data) {
	cell.innerHTML = '<div class="db_arrow">&nbsp;</div>';
}
YAHOO.widget.DataTable.prototype.formatcb = function(cell,rec,col,data) {
	cell.innerHTML = '<b>'+rec.getData('cbt')+'</b><br>'+rec.getData('cb');
}

</script>
<?
    include('include/classes/grid.class.php');
	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;  
		
	
	$camp = " v.idrma as ID,
		 descr,
		 pct2.idrmapct as pac2,
		 LEFT(UPPER(clientenovo.nome),25) as revenda,
		 v.codprod_tcliente as codnovo,
		 v.codprod as codantigo,
		 v.codbarra as cb,
		 v.codbarra_tcliente as cbt,
		 LEFT(IFNULL((select nomeprod from produtos where produtos.codprod = v.codprod_tcliente),IF(v.flag_credito,\'* * DEVOLUCAO E CREDITO * *\',\'PRODUTO NÃO NOSSO\')),42) as pnovo,
		 LEFT(IFNULL((select nomeprod from produtos where produtos.codprod = v.codprod),laudo_rma),43) as pantigo,
		 pct2.nf_e as nf2,
		 DATE_FORMAT(pct2.data, \'%d/%m/%Y\') as data2,
		 pct4.idrmapct as pac4,
		 pct4.nf_e as nf4,
		 (select codbarra from pedido where codped = v.codped) as cbp,
	 DATE_FORMAT(pct4.data, \'%d/%m/%Y\') as data4";

	$tabelas = "v_rma as v,
		 v_rma_status,
		 clientenovo,
		 (select idrma,v_rma_pct.idrmapct,short_desc,data,nf_e from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and tipo = 2) as pct2,
		 (select idrma,v_rma_pct.idrmapct,data,nf_e from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and tipo = 4) as pct4";
	
	$condicao = "(v.idstatus = 9) and v.idstatus = v_rma_status.idstatus AND pct2.idrma = v.idrma and pct4.idrma = v.idrma AND pct2.short_desc = clientenovo.codcliente";	
	
	$grid = new grid('rma_historico_revenda', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'rma_historico',maxw=>900,chave=>"'idrma'"));
	
	$grid->AddColuna("ID", "RMA", "20", "String");
	$grid->AddColuna("revenda", "REVENDA", "150", "String");
	$grid->AddColuna(" ", "", "4", "String","formatter:YAHOO.widget.DataTable.prototype.formatarrow");
	$grid->AddColuna("pnovo", "PRODUTO", "300", "String", "formatter:YAHOO.widget.DataTable.prototype.formatprod");
	$grid->AddColuna("cb", "NS", "100", "String", "formatter:YAHOO.widget.DataTable.prototype.formatcb");
	$grid->AddColuna("pac2", "ENT", "20", "String");
	$grid->AddColuna("nf2", "<center>NF<br>PCT ENT</center>", "40", "String");
	$grid->AddColuna("data2", "<center>DATA<br>PCT</center>", "60", "String");
	$grid->AddColuna("pac4", "<center>PCT<br>SDA</center>", "20", "String");
	$grid->AddColuna("nf4", "<center>NF<br>SAIDA</center>", "40", "String");
	$grid->AddColuna("data4", "<center>DATA<br>PCT SAIDA</center>", "60", "String");
	$grid->AddCampo('pantigo');
	$grid->AddCampo('codnovo');
	$grid->AddCampo('codantigo');
	$grid->AddCampo("cbp");
	$grid->AddCampo("cbt");
	$grid->AddPesquisa('ID','RMA','having');
	$grid->AddPesquisa('revenda','REVENDA','having');
	$grid->AddPesquisa('nf2','NF DE ENTRADA','having');
	$grid->AddPesquisa('nf4','NF DE SAIDA','having');
	
	$config = array(
		sortedBy => array('key'=>"pac2",'dir'=>"desc"),
		initialLoad => true,
		paginator => true,
		dynamicData => true,
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
	);
	
	$grid->SetConfigs($config);
	$grid->loadGrid();
	
	$grid->imprime();
?>