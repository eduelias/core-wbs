<script>

	WBS.rma_transf = new Array();
	
	pede_transf = function(oTable) {
	
		if (confirm('Mandar produtos ja separados?')) {
	
			postdata = '';
			
			for ( recKey in WBS.rma_transf ) {
				
				postdata += "&"+recKey+"="+WBS.rma_transf[recKey];
				
			}
			
			_hande = {	
				success: function (o) {
					eval('obj ='+o.responseText);
					if (obj.erro==0){
						eval('oTable ='+onscreen.dt[0]);
						oTable.requery();
							var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/impresso/rmas06_transferencia.php')?>";
							WBS.wait.hide();
							url2 = url+postdata;
							onscreen.myDataTablerma_produtos['rma_produtos0'].requery();
							window.open(url2);
					} else {
						alert('ERRO g_separacao - rma.class');
					}
				},
				failure: function (o) {
					alert('ERRO g_separacao');
				}, 
				timeout:1000
			}
		
			var url = "ajax_html.php?file=<?=encode('modulos/mod_rma/sub_separacao/ajax_transfere.php')?>";
		
			YAHOO.util.Connect.asyncRequest('POST',url, _hande, postdata);
			
		}
	
	}

</script>
<?  
	//Cria a página
	$pagina = new pagina("rma_separacao3","PRODUTOS AGUARDANDO SEPARACAO");

	//Seta o elemento grid na página
	$pagina->setGrid("idrma, flag_disponivel, IF(tipo_prod=\'P\',\'P\',\'V\') as tipo_prod, IF(codprod_tcliente = 0, v_rma.codprod, codprod_tcliente) as coprod, codbarra_tcliente,(IF(v_rma.tipo_prod=\'P\',\'14\', IF(pedido.codemp=14,14,15))) as codemp, produtos.nomeprod", "v_rma,pedido,produtos", "v_rma.codped = pedido.codped AND produtos.codprod = IF(codprod_tcliente = 0, v_rma.codprod, codprod_tcliente) and flag_garantia AND flag_disponivel AND NOT flag_transferido AND (idstatus = 4 or idstatus = 12 or idstatus = 6) ", "Lista de produtos aguardando","idrma","v_rma","323");
	
	#$pagina->grid->set_rowformatter('row_formatter');
	
	$pagina->grid->AddFuncao('empacota','',array('html'=>'<img src=\"images/forward.png\" onClick=\"javascript:pede_transf();\" alt=\"TRANSFERIR PRODS COM CODBARRA\" title=\"TRANSFERIR PRODS COM CODBARRA\"/>'));

	$pagina->grid->setRender('WBS.rendered');
	//                      ($campo, $label, $type,  $width, $editor = "", $classname = "", $sortable = "true", $formatter = "")
	#acao especifica para negar existencia no estoque;
	$pagina->grid->AddColuna("idrma", "RMA", "String", "25", "''", '');
	$pagina->grid->AddColuna("coprod", "COD", "Number", "45", "''", 'td_bold td_right');
	$pagina->grid->AddColuna("nomeprod", "PRODUTO", "String", "400", "''", '');
	$pagina->grid->AddColuna("tipo_prod", "TIPO", "String", "30", "''", 'central');
	$pagina->grid->AddColuna("codemp", "EMP", "String", "40", "''", 'central');
	$pagina->grid->AddAcao('rma_separacao_tiro', '', array('campo'=>'codbarra_tcliente', 'head'=>' ', tamanho=>'500','sort'=>true));
	$pagina->grid->AddAcao('rma_indisponivel', 'modulos/mod_rma/sub_separacao/ajax_indisponibiliza.php', array('campo'=>'idrma', 'head'=>'', 'imagem'=>'images/botoes/cancel.png', tamanho=>'20', mensagem=>'Tornar este produto <b>INDISPONIVEL</b>'));
	$pagina->grid->setSorted('codbarra_tcliente');
	$pagina->loadGrid('100');
	$pagina->imprime();
?>