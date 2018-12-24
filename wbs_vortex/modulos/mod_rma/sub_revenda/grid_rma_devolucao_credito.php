<script>
YAHOO.widget.DataTable.prototype.formatInfocredito = function (e,r,c,d){

	var oTable = this;
	var status = r.getData('idstatus');
	
	switch (status) {
	case '9': {
		var markup = '<div class="icon-traco">&nbsp;</div>';

		e.innerHTML = markup;

		var _hand = {
			success:function(o){
				oTable.requery();
			},
			failure:function(o){

			},
			timeout:2000
		}

		YAHOO.util.Event.addListener(e, "click", function(ev, oSelf) {

			if(confirm("A NOTA COM A DEVOLUCAO \r\n DESTE PRODUTO CHEGOU?",'SIM','NAO')){

				var id = r.getData('idrma');
				var set = 11;

				var url = "ajax_html.php?file=<?=encode('ajax_altera.php')?>&tabela=v_rma&id="+id+"&keyfield=idrma&field=idstatus&val="+set;

				WBS.conn.asyncRequest('GET',url,_hand,null);

			} else {

			}

		},e);
	}break;
	case '11':{
		e.innerHTML = "<div class='rma_2'>&nbsp;</div>";
	}break;
	case '21':{
		e.innerHTML = "<div class='rma_3'>&nbsp;</div>";

	}break;
	default:{

	}
	}
}
</script>
<h1>PRODUTOS AGUARDANDO NF DE DEVOLU&Ccedil;&Atilde;O</h1>
<?php

$camp = "v_rma.idrma as idrma,
			 v_rma.idrma as ida,
			 v_rma.idstatus,
			 CONCAT(\'R$ \',preco_in) as preco_in,
			 CONCAT(preco_ipi,\'%\') as ipi,
			 CONCAT(preco_icms,\'%\') as icms,
			 flag_garantia,
			 idstatus as ids,
			 laudo_rma,
			 produtos.codprod as codprod,
			 CONCAT(LEFT(nomeprod,20),\' [...] \',RIGHT(nomeprod,10)) AS nomeprod,
			 DATE_FORMAT((select MAX(data) from v_rma_hstatus where v_rma_hstatus.idstatus = ids and v_rma_hstatus.idrma = ida),\'%d/%m/%Y\') as datasts,
			 clientenovo.nome as revenda,
			 DATE_FORMAT(data,\'%d/%m/%Y %h:%i\') as data,
			 (select descr from v_rma_status where v_rma_status.idstatus = v_rma.idstatus) as sts";

$tabelas = "v_rma,(select idrma,short_desc from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and tipo = 2) as pct2,clientenovo,produtos";

$condicao = "v_rma.codprod = produtos.codprod AND pct2.idrma = v_rma.idrma AND pct2.short_desc = clientenovo.codcliente AND (idstatus = 11 or idstatus = 9 or idstatus = 21) AND flag_credito";

require_once('include/classes/grid.class.php');
$grid = new grid('rma_revenda', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'credito',maxw=>850,chave=>"'idrma'"));

$grid->AddColuna("idrma", "", "20", "String");
$grid->AddColuna("data","DATA",100,"Date","className:'td_center'");
$grid->AddColuna("revenda", "REVENDA", "170", "String","className:'td_bold'");
$grid->AddColuna("codprod","CPRD",30,"Number");
$grid->AddColuna("nomeprod","PRODUTO",170,"String");
$grid->AddColuna('preco_in','PRECO',60,'Number',"className:'td_center td_bold'");
$grid->AddColuna(" ","NT",15,'String', "formatter:YAHOO.widget.DataTable.prototype.formatInfocredito");
$grid->AddCampo('idstatus');


$config = array(
sortedBy => array('key'=>"idrma",'dir'=>"desc"),
formatRow=>'WBS.modulo.rowFormatter',
initialLoad => true,
paginator => true,
dynamicData => true,
MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
);

$grid->AddPesquisa('clientenovo.nome','Revenda');
$grid->AddPesquisa('produtos.nomeprod','produto');
#$grid->AddPesquisa('revenda','Revenda',2);

$grid->SetConfigs($config);
$grid->loadGrid();

$grid->imprime();

?>