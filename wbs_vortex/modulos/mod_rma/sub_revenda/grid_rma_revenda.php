<script type="text/javascript">
<!--
	WBS.sendf = function(ob) {
	WBS.sendSTDForm(ob);
	WBS.modulo.rma_revenda.dt.requery();
	return false;
}
//-->
</script>
<?
    require_once('include/classes/grid.class.php');
	$grp = (($_SESSION['grupo']==2)||($_SESSION['grupo']==51))?true:false;  
	
	$ft_arr = "{
		elCell.innerHTML = '<div class=\"db_arrow\"> </div>';
	}";
	$ft_codp = "{
		elCell.innerHTML = '<b>'+oRecord.getData('codnovo')+'</b><br><font color=990000>'+oRecord.getData('codantigo');
	}";
	$ft_nomep = "{
		elCell.innerHTML = '<b>'+oRecord.getData('novo')+'</b><br><font color=990000>'+oRecord.getData('antigo');
	}";
	$ft_codbarra = "{
		elCell.innerHTML = '<b>'+oRecord.getData('codbarra_tcliente')+'</b><br><font color=990000>'+oRecord.getData('codbarra');
	}";
	
	$ft_mark = "{
		elCell.innerHTML = '<div class=\"rma_'+oRecord.getData('alerta')+'\" title='+oRecord.getData('data')+'></div>';

	}";
	
	$ft_gar = "{
		var set,sta,cla,url,id;
		var idst = oRecord.getData('idstatus');
		var markup = '';
		if ((oData != 2)&&((idst==12)||(idst==4)||(idst==14)||(idst==10))) {
			set = oData;
			var oTable = this;
			elCell.innerHTML = '<div class=\"flag_'+oData+'\"></div>';
	
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				elCell.innerHTML = '...';
				var cnovo = oRecord.getData('codnovo');
				var cantigo = oRecord.getData('codantigo');
				if ( oData==1 ) { set = 0; sta = 14; cla = 'SEM GARANTIA';} else { set = 1; sta = 4; cla = 'AG SEPARACAO'; };
				var _hande = {
					success:function(o){
						oRecord.setData('flag_garantia', set);
						oRecord.setData('status', cla);
						oRecord.setData('idstatus', sta);
						oTable.refreshView();
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				id = oRecord.getData('idrma');
				url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=flag_garantia&val=\"+set;
				WBS.conn.asyncRequest('GET',url, _hande,null);
			},elCell);
		}
	}";
	$ft_dis = "{
		var markup = '';
		var idst = oRecord.getData('idstatus');
		var set,id,url;
		if ((oData != 2)&&((idst==15)||(idst==23)||(idst==12)||(idst==4)||(idst==14)||(idst==10))) {
			var set = oData;
			var oTable = this;
			elCell.innerHTML = '<div class=\"flag_'+oData+'\"></div>';		
			
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				if ( oData==1 ) { set = 0; } else { set = 1; };
				elCell.innerHTML = '...';
				var _hande = {
					success:function(o){
						oRecord.setData('flag_disponivel', set);
						oTable.refreshView();
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				id = oRecord.getData('idrma');
				url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=flag_disponivel&val=\"+set;
				WBS.conn.asyncRequest('GET',url, _hande,null);
			},elCell);
		}else if (idst==22) {
		var set = oData;
			var oTable = this;
			elCell.innerHTML = '<div class=\"flag_'+oData+'\"></div>';		
			
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				elCell.innerHTML = '...';
				var _hande = {
					success:function(o){
						oRecord.setData('flag_disponivel', 1);
						oRecord.setData('status','AG SEPARACAO');
						oTable.refreshView();
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				id = oRecord.getData('idrma');
				url= \"modulos/formularios/act.php\";
				postdata = \"cond@v_rma@idrma=\"+id+\"&v_rma@idstatus=4&v_rma@flag_disponivel=1\";
				//url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=flag_disponivel&val=\"+set;
				WBS.conn.asyncRequest('POST',url, _hande, postdata);
			},elCell);
		}
	}";
	$ft_cre = "{
		var markup = '';
		var set,set,sta,cla,id,url;
		var idst = oRecord.getData('idstatus');
		var disp = oRecord.getData('flag_disponivel');
		if ((disp==0)&&(oRecord.getData('flag_garantia')!=0)&&(oRecord.getData('idstatus')!=13)&&(oRecord.getData('idstatus')!=5)&&(oRecord.getData('idstatus')!=11)) {
			set = oData;
			oTable = this;
			elCell.innerHTML = '<div class=\"flag_c_'+oData+'\"> </div>';			
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				elCell.innerHTML = '...';
				if ( oData==1 ) { set = 0; sta = 4; cla = 'AG SEPARACAO'; } else { set = 1; sta = 10; cla = 'SOL NF DEVOL'; };
				var _hande = {
					success:function(o){
						oRecord.setData('status',cla);
						oRecord.setData('idstatus',sta);
						oRecord.setData('flag_credito',set);
						oTable.refreshView();
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				id = oRecord.getData('idrma');
				url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=flag_credito&val=\"+set;
				YAHOO.util.Connect.asyncRequest('GET',url, _hande,null);
			},elCell);
		}
	}";
	
	### FT COMPRAS FT COMPRAS FT COMPRAS((oData==12)||(oData == 4)||(oData == 15)) &&  
	$ft_com = "{
		var markup = '';
		var set,cla,id,url;
		var idst = oRecord.getData('idstatus');
		var disp = oRecord.getData('flag_disponivel');
		if ((disp==0)&&(oRecord.getData('flag_garantia')!=0)&&(oRecord.getData('idstatus')!=23)&&(oRecord.getData('idstatus')!=13)&&(oRecord.getData('idstatus')!=5)&&(oRecord.getData('idstatus')!=11)) {
			
			set = oData;
			var oTable = this;
			if (oData == 15) {
				elCell.innerHTML = '<div class=\"flag_compras_1\"> </div>';
			} else {
				elCell.innerHTML = '<div class=\"flag_compras_0\"> </div>';
			}			
			YAHOO.util.Event.addListener(elCell, 'click', function(e, oSelf) { 
				elCell.innerHTML = '...';
				if ( oData==4 ) { set = 15; cla = 'AG COMPRAS'; } else { set = 4; cla = 'AG SEPARACAO'; };
				_hande = {
					success:function(o){
						oRecord.setData('status',cla);
						oRecord.setData('idstatus',set);
						oTable.refreshView();
					},
					failure:function(o){
						alert('ERRO DE SERVIDOR, NAO RESPONDEU.');
					},
					timeout:2000
				}
				id = oRecord.getData('idrma');
				url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=idstatus&val=\"+set;
				YAHOO.util.Connect.asyncRequest('GET',url, _hande,null);
			},elCell);
		}
	}";
	$ft_tro = "{
		var rec = oRecord;
		var data = oData;
		var cell = elCell;
		var markup = '';
		var id;
		var oTable = this;
		var disp = oRecord.getData('flag_disponivel');
		if ((disp==0)&&(oRecord.getData('flag_garantia')!=0)&&(oRecord.getData('idstatus')!=13)&&(oRecord.getData('idstatus')!=5)&&(oRecord.getData('idstatus')!=11)) {
			id = rec.getData('idrma');
			var fEdit =  '".encode("modulos/mod_rma/sub_interno/ajax_trocaproduto.php")."';
			markup = '<div class=\"flag_troca_0\"> </div>';
			YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
				
				divCentral.carrega(fEdit+'&id='+id, oTable);
				
			}, cell);
				
		} 		
		cell.innerHTML = markup;
	}";
	$ft_chck = "{
		if ((oData==7||oData==10)||((oRecord.getData('flag_garantia')==0)&&oData==4)||(oData==13)||(oData==14)){
			elCell.innerHTML = '<input type=\"checkbox\" id=\"'+oRecord.getId()+\"\\\" name='\"+oRecord.getData('idrma')+\"'></input>\";
			var oTable = this;
			YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {	
				if (elCell.firstChild.checked) {
					oTable.selectRow(oRecord);
				} else {
					oTable.unselectRow(oRecord);
				}
			},elCell.firstChild);
		} else {
			if ((oRecord.getData('qtde')>0)&&(oRecord.getData('flag_disponivel')==0)&&(oRecord.getData('idstatus')==4)) {
				elCell.innerHTML = '<div class=\"gridinfo\"></div>';
			};
		}
	}";
		
	$header_devol = "() {
		oTable = this;
		var sels,postdata,url,resp,revenda,rec0;
		
		sels = oTable.getSelectedRows();
		postdata = this.getSelectedsAsPost();
		
		if (sels.length > 0) { 
			
			revenda = oTable.getRecord(sels[0]).getData('revenda');
		
			var _hande = {
				success:function(o){
					eval('resp = '+o.responseText);
					if (resp.erro==0) {
						for ( recKey in sels ) {
							if (recKey != '______array'){
								oTable.unselectRow(sels[recKey]);
								oTable.deleteRow(sels[recKey]);
							}
						}
						oTable.refreshView();
					} else {
					
						oTable.showTableMessage(resp.erromsg,'alert_gar');
						setTimeout('oTable.hideTableMessage()',3000);
					}
				},
				failure:function(o){
				
				
				},
				timeout:20000
			}
			
	
			url = 'ajax_html.php?file=".encode('modulos/mod_rma/sub_interno/ajax_empacota.php')."&tipo=4&status=8';
			if (confirm('Empacotar este(s) iten(s) da revenda \"'+revenda+'\"')){
				WBS.conn.asyncRequest('POST',url, _hande, postdata);
			}
		} else {
		
			alert('N�o h� itens selecionados');
		
		}
	
	}";
	
	$requestBuilder = "(oState, oSelf) { 
		var oState = oState || {pagination:null,sortedBy:null}; 
		var sorte = oState.sortedBy.ket || 'idrma';
		var dir = (oState.sortedBy && oState.sortedBy.dir === DT.CLASS_DESC) ? 'DESC' : 'ASC'; 
		var startIndex = oState.pagination.recordOffset || 0; 
		var results = oState.pagination.rowsPerPage || 20; 
		return  '&startIndex=' + startIndex + '&results=' + results+ '&dir=' + dir + '&sort=' + sorte; }
	
	}";
	
	$campos = "v.flag_nosso as flag_nosso,
			v.data, 
			v.idrma as id,
			v.codprod as codantigo, 
			v.idrma as idrma,
			v.tipo_prod as tipo, 
			v.codbarra_tcliente as codbarra_tcliente, 
			v.codbarra as codbarra, 
			v.idstatus,
			v.laudo_rma, 
			v_rma_status.descr as status,
			DATE_FORMAT(v.data,\"%d/%m/%Y\") as data,
			IF(codprod_tcliente=0,v.codprod,codprod_tcliente) as codnovo,
			IF(NOW()>DATE_ADD(v.data,INTERVAL 5 DAY),IF((NOW()>DATE_ADD(v.data,INTERVAL 15 DAY)),\"1\",\"2\"),\"3\") as alerta,
			IF(codbarra_tcliente<>\"0\",2,flag_garantia) as flag_garantia, 
			IF(codbarra_tcliente<>\"0\",2,flag_disponivel) as flag_disponivel, 
			IF(codbarra_tcliente<>\"0\",2,flag_credito) as flag_credito,
			IF(not v.flag_nosso,\"0\",IF(v.tipo_prod=\'P\',\'FAB\',IF((select codemp from pedido where pedido.codped = v.codped)=14,\'FAB\',\'LF\'))) as emp_saida,
			IFNULL((select IF((CHAR_LENGTH(nomeprod)> 30),concat(LEFT(nomeprod,23),RIGHT(nomeprod,7)),nomeprod) from produtos where produtos.codprod = codprod_tcliente limit 1),\"*\") as novo,			 
			LEFT(IFNULL((select IF((CHAR_LENGTH(nomeprod)> 30),concat(LEFT(nomeprod,23),\"[]\",RIGHT(nomeprod,7)),nomeprod) from produtos where produtos.codprod = v.codprod limit 1),laudo_rma),32) as antigo,
			(select LEFT(nome,40) from clientenovo where clientenovo.codcliente = v_rma_pct.short_desc) as revenda,
			v_rma_pct.idrmapct as idpct";

	$camp = ereg_replace("[\r\t\n]","",$campos);

	$tabelas = "v_rma as v,v_rma_status,v_rma_pct,v_rma_pctrma,clientenovo";
	
	$condicao = "v.idstatus = v_rma_status.idstatus and v.idrma = v_rma_pctrma.idrma AND v_rma_pct.short_desc = clientenovo.codcliente and v_rma_pctrma.idrmapct = v_rma_pct.idrmapct AND ((not v.idstatus = 11 and not v.idstatus = 9 AND not v.idstatus = 8 and not v.idstatus = 21 AND v_rma_pct.tipo = 2 AND tipo_rma = \'REV\') or (v.idstatus=13))";	
	
	$grid = new grid('rma_revenda', "ajax_json.php?campos=".$camp."&obj=".$tabelas."&condicao=".$condicao, array(idname=>'principal',maxw=>950,chave=>"'idrma'"));
	
	$grid->AddColuna("idstatus", " ", "10", "String", 'formatter:'.$grid->addFormatter('ft_chck',$ft_chck));
	$grid->AddColuna("alerta", " ", "13", "Number",'formatter:'.$grid->addFormatter('ft_mark',$ft_mark));
	$grid->AddColuna('idrma','RMA',20,'Number');
	$grid->AddColuna('idpct','PCT',20,'Number');
	$grid->AddColuna("revenda", "REVENDA", "230", "String");
	$grid->AddColuna("status", "status", "100", "String","className:'td_bold td_center'");
	$grid->AddColuna("codantigo",'',5,'String','formatter:'.$grid->addFormatter('ft_arr',$ft_arr));
	$grid->AddColuna("codnovo", "COD", "25", "String",'formatter:'.$grid->addFormatter('ft_cp',$ft_codp));
	$grid->AddColuna("novo", "PRODUTO", "210", "String",'formatter:'.$grid->addFormatter('ft_nomep',$ft_nomep));
	$grid->AddColuna("codbarra_tcliente", "N/S", "100", "String",'formatter:'.$grid->addFormatter('ft_codbarra',$ft_codbarra));
	$grid->AddColuna('tipo','T',5,'String');
	$grid->AddColuna('emp_saida','EMP',20,'String');
	$grid->AddColuna("flag_garantia", "G", "13", "String", 'formatter:'.$grid->addFormatter('ft_gar',$ft_gar));
	$grid->AddColuna("flag_disponivel", "D", "13", "String", 'formatter:'.$grid->addFormatter('ft_dis',$ft_dis));
	$grid->AddColuna("flag_credito", " $ ", "13", "String", 'formatter:'.$grid->addFormatter('ft_cre',$ft_cre));
	$grid->AddColuna("idstatus", " B ", "13", "String", 'formatter:'.$grid->addFormatter('ft_com',$ft_com));
	if ($grp) $grid->AddColuna("data", "T", "13", "String", 'formatter:'.$grid->addFormatter('ft_tro',$ft_tro));
 
	$grid->AddCampo('flag_nosso');
	$grid->AddCampo('data');
	$grid->AddCampo('antigo');
	$grid->AddCampo('codbarra');  
	$grid->AddCampo('qtde');
	
	$grid->AddPesquisa('v.idrma','IDRMA');
	$grid->AddPesquisa('clientenovo.nome','REVENDA');
	$grid->AddPesquisa('v_rma.codbarra','N/S Antigo');
	
	$grid->AddHeader("modulos/mod_rma/images/act_pct_green.png",'ENVIAR');
	$grid->AddFuncao('requestBuilder',$request_builder);
	$grid->AddFuncao('empacota',$header_devol,0);
	 
	$config = array(
		sortedBy => array('key'=>"idrma",'dir'=>"desc"),
		formatRow=>'WBS.modulo.rowFormatter',

		initialLoad => true,
		paginator => true,
		dynamicData => true,
		MSG_EMPTY=>"'<center><font size=2>RMA 1.5</font></center>'"
	);
	
	$grid->SetConfigs($config);
	$grid->loadGrid();
	
	$grid->imprime();
?>