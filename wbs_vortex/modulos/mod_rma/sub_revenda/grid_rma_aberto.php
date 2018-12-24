<?
    require_once('include/classes/grid.class.php');	
	require_once('include/classes/formatter.class.php');
	
	$header_t = "() {
		WBS.modulo.identifica_revenda(2)
	}";
	$header_b = "() {
		WBS.modulo.identifica_revenda(1)
	}";
	
	$fmt_delete = new formatter(array(tipo=>"delete", arquivo=>encode("modulos/libraries/exclui_por_id.php"), args=>array('campo'=>'idrmapct', tamanho=>15)));
	
	$ft_chck = "{

		elCell.innerHTML = '<input type=\"checkbox\" id=\"'+oRecord.getId()+\"\\\" name='\"+oRecord.getData('idrma')+\"'></input>\";
		var oTable = this;
		YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {
			
			if (elCell.firstChild.checked) {
				oTable.selectRow(oRecord);
			} else {
				oTable.unselectRow(oRecord);
			}
			
		},elCell.firstChild);
	}";
	
	$campos='idrma,preco_in,preco_icms,preco_ipi,idrma as id,v.codprod as codprod, (IFNULL((SELECT nomeprod FROM produtos WHERE produtos.codprod = v.codprod),laudo_rma)) as nomeprod,v.codbarra as cb,descr as status';
	$obj="v_rma as v,v_rma_status as vs";
	$cond="v.idstatus=vs.idstatus AND (v.idstatus=14 or v.idstatus=1 or v.idstatus=13)";
	
	$grid = new grid('rma_aberto', "ajax_json.php?campos=".$campos."&obj=".$obj."&condicao=".$cond,array(idname=>'abertos',maxw=>970));
	
	$grid->AddColuna('idrma', 'RMA', 15, 'Number','formatter:'.$grid->addFormatter('checks',$ft_chck));
	$grid->AddColuna('codprod','PRO',30,'Number',"className:'td_bold'");
	$grid->AddColuna('nomeprod','PRODUTO',445,'String');
	$grid->AddColuna('cb','NS',200,'String');
	$grid->AddColuna('status','STATUS',100,'String');
	$grid->AddColuna('preco_in','PREÇO',50,"Number");
	$grid->AddColuna('preco_icms','ICMS',50,"Number");
	$grid->AddColuna('preco_ipi','IPI',50,"Number");
	$grid->AddColuna('id','',19,'Number','formatter:'.$grid->addFormatter_dpr($fmt_delete->getNewFmt('delete')));
	
	$grid->AddHeader("modulos/mod_rma/images/act_pct_blue.png",'TRANSP');	
	$grid->AddHeader("modulos/mod_rma/images/act_pct_green.png",'BALCAO');
	
	$grid->AddFuncao('empacota_t',$header_t);
	$grid->AddFuncao('empacota_b',$header_b);
	
	$config = array(
		sortedBy => array('key'=>"idrma",'dir'=>"desc"),
		formatRow=>'WBS.modulo.rowFormatter',
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'",
		_tablename=>"'v_rma'",
		_campochave=>"'idrma'"
	);
	$grid->SetConfigs($config);
	$grid->loadGrid();
	
	$grid->imprime();
?>