<?

/*

	OBSERVAÇÃO:
		--> FORMATADORES DEVEM SER ENXUTOS. DEFINIR BEM O EVENTO, O ATUADOR E A AÇÃO. OBSERVAR OS DADOS PASSADOS E RECEBIDOS POR CADA ARQUIVO.

	ATENÇÃO: À FAZER ->
	
	**** RECRIAR - E FILTRAR - FORMATADORES EM UTILIZAÇÃO E CARREGA-LOS NA CLASSE
	**** OBSERVAR EVENTOS, OBJETOS E DADOS,
	
	** OS ARQUIVOS DE AÇÃO ESTÃO INCLUSOS NA TABELA, REPASSAR DIRETO AO FORMATADOR LIMPANDO, ASSIM, OBJETOS DA TABELA
	** DESVINCULAR OS FORMATADORES DE VARIÁVEIS ABSOLUTAS DO SISTEMA, DESVINCULAR DO OBJETO 'WBS.PAGINA' ENTRE OUTROS
	** GENERALIZAR FORMATADORES QUE TÊM O MESMO TIPO DE AÇÃO E MODULARIZAR OS JA EXISTENTES
	** HABILITAR A CRIAÇÃO DE FORMATADORES E FACILITAR A INCLUSÃO DOS MESMOS ------> UTILIZAR BDADOS??????
	
	==> CRIAR NO OBJETO 'PAGINA' UM OBJETO QUE CONTROLE ID_MESTRE, TELA ABERTA E POSSÍVEIS INFORMAÇÕES GERAIS DA PÁGINA <<<< UNIFORMIZAR >>>> (HOJE EM PAGINA E WBS)
	
	
*/

	class formatter {
	
		public $debug = false;
	
		public $func;
	
		//var que guarda o tipo de formatador que será usado
		public $type;
		 
		//guarda o script especifico do formatador, caso seja criado 'por módulo'
		public $f_script;
		
		public function conv_params($array) {
			// ESTA FUNCAO DEVE CONVERTER UM ARRAY DE PARAMETROS EM ARRAY DE PARÂMETROS JAVASCRIPT
			return '';
		}
		
		public function formatter($params){
			$this->tipo = $params['tipo'];
		//formata colunas do tipo VIEW          ///==================> AO CLIQUE, NAVEGA PARA UM ARQUIVO (TABLE_PARAM) ABRINDO UM ID (DADO_CAMPO)
			$this->view = "YAHOO.widget.DataTable.format".$params['tipo']." = function(elCell, oRecord, oColumn, oData ".((count($params['args'])>>1)?$this->conv_params($params['args']):'').") {
							var id = parseInt(oRecord._oData[this._campochave]);
							var markup = \"<a href='#' id='add-tab'>
											<img src='".IMAGES."".(($params['imagem']!='def')?$params['imagem']:"view.gif")."' alt='Ver Dados' title='Ver Dados' border='0' width=14px/>
										</a>\";
							elCell.innerHTML = markup;
							var viewfile = '".$params['arquivo']."';
							var oTable = this;
							YAHOO.util.Event.addListener(elCell.firstChild, 'click', function (e, oSelf) { 
								alert('FORMATTER AINDA NAO IMPLEMENTADO');
							});
						};";
			$this->janela_script = "YAHOO.widget.DataTable.formateditjanela_script = function(elCell, oRecord, oColumn, oData".((count($params['args'])>>1)?','.$this->conv_params($params['args']):'').") {
							elCell.innerHTML = \"<div class='icon-jswindow'>&nbsp;</div>\";

							var fOut = this._listOut;
							var oTable = this;
							
							var id = oData;
					
							YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) {
									temp = new YAHOO.widget.ResizePanel(\"panel2\", {effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.4}, underlay:'none', constraintoviewport:true, fixedcenter:false, visible:false, draggable:true, close:true, modal:true, zindex:30} );
									temp.setHeader('".$params['args']['header']."');
									temp.setBody('Erro no carregamento.');
									temp.setFooter('".$params['args']['footer']."');  
							}
							, elCell);
					};";
					
			$this->rma_3botoes = $this->getFunction() . "=function(cell,rec,col,data){
				var div = document.createElement('div');
				ADEBUG = div;
				
				YAHOO.util.Event.addListener(cell, 'click', function(e, oSelf) {
					
					div.offsetLeft = cell.offsetLeft;
					div.offsetTop = cell.offsetTop;
					div.width = '200px';
					div.height = '200px';
					div.innerHTML = 'EDUARDO';
					
					cell.appendChild(div);
					
				},cell);
			
			}";
					
			$this->enum_sn = $this->getFunction() . " = function(elCell, oRecord, oColumn, oData){
			var id = parseInt(oRecord._oData[this._campochave]);
			var table = this._tablename;
			var campochave = this._campochave;
			var selectedValue = oData;
			var alter_campo = oColumn.key;
			var futuro;
			var oTable = this;
			elCell.id = id;
			//alert(oData+' '+id+' '+alter_campo);
			if(oData != 'N'){
				elCell.innerHTML = '<img src=\"images/suse.png\" width=14px>';
				YAHOO.util.Dom.setStyle(elCell,'text-align','center');
				futuro = 'N';
			} else {
				elCell.innerHTML = '<img src=\"images/bt_not.png\" width=14px>';
				YAHOO.util.Dom.setStyle(elCell,'text-align','center');
				futuro = 'S';
			}
			
			YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf){
				//alert(id);
				if (id == elCell.id){
					oRecord._oData[alter_campo] = futuro;
					if(futuro == 'S'){
						elCell.innerHTML = '<img src=\"images/suse.png\" width=14px>';
						futuro = 'N';
					} else {
						elCell.innerHTML = '<img src=\"images/bt_not.png\" width=14px>';
						futuro = 'S';
					}
					
					_hande = {	
						success: function(o){  },
						failure: function(o){  },
						timeout:1000
					}
				
					var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=\"+table+\"&id=\"+id+\"&keyfield=\"+campochave+\"&field=\"+alter_campo+\"&val=\"+oRecord._oData[alter_campo];
					//alert(url);
					YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);		
				}
			}, elCell);
		}";

			$this->novalinha =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				this.addRow('',0);
			
			}";
			
			$this->trufalse = $this->getFunction()."= function(cell,rec,col,data) {
			
				var sts = 1;

				var markup_t = '<img src=\"".$params['args']['vimagem']."\" width=\"14px\" alt=\"".$params['args']['vmsg']."\" title=\"".$params['args']['vmsg']."\">';
				
				var markup_f = '<img src=\"".$params['args']['fimagem']."\" width=\"14px\" alt=\"".$params['args']['fmsg']."\" title=\"".$params['args']['fmsg']."\">';
				
				if ((data>=1)||(data=='S')) {
					sts = 0;
					cell.innerHTML = markup_t;
				} else {
					sts = 1;
					cell.innerHTML = markup_f;
				}

				var table = this._tablename;
				var oTable = this;
				var campochave = this._campochave;
				var valorchave = rec.getData('idrma');
				var alter_campo = col.field;
				var id = valorchave;
				
				YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
					
					var _hande = {
						success:function(o) {
							if (sts==0) {				
								sts = 1;	
								cell.innerHTML = markup_f;
							} else {
								sts = 0;
								cell.innerHTML = markup_t;
							}
							oTable.requery(oTable.configs.generateRequest(oTable.getState()));
						},
						failure:function(o) {
							alert('NAO EFETUADO');
						},
						timeout:1000
					}
				
					var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=\"+table+\"&id=\"+id+\"&keyfield=\"+campochave+\"&field=\"+alter_campo+\"&val=\"+sts;

					WBS.conn.asyncRequest('GET',url, _hande, null);

				
				},cell);
				
			
			}";
			 
			$this->marker = $this->getFunction() ."=function(cell,rec,col,data){
			
				var ar = new Array();
				ar[1] = '';
				ar[4] =	'';	
				ar[5] = '<img src=\"images/botoes/clock_error.png\" title=\'AG.CARTA DE CORRECAO\' width=14px>';	
 				ar[6] = '<img src=\"images/botoes/information.png\" title=\'ITENS SEPARADO\' width=14px>';	
 				ar[7] = '<img src=\"images/botoes/alert_shield.png\" title=\'PREPARAR PARA ENVIAR\' width=14px>';
				ar[8] = '<img src=\"images/botoes/alert_shield.png\" title=\'ITENS AG. TRANSPORTE\' width=14px>';
				ar[9] = '<img src=\"images/botoes/arrow_refresh.png\" title=\'RECARREGUE A TAB\' width=14px>';
				ar[10] = '<img src=\"images/botoes/arrow_undo.png\" title=\'EM PROCESSO CREDITO\' width=14px>';
				ar[13] = ''; //'<img src=\"images/botoes/error.png\" title=\'PRODUTO NAO CONSTA NA BASE DE DADOS\' width=14px>';
				ar[14] = '<img src=\"images/botoes/error_shield.png\" title=\'SEM GARANTIA\' width=14px>';
				ar[16] = '<img src=\"images/botoes/alert_shield.png\" title=\'AGUARDANDO CONFERENCIA\' width=14px>';
				
				cell.innerHTML = ar[data];
			
			};";
			
			$this->rma_info = $this->getFunction()."=function(cel,rec,col,data) {
				
				if (data!='0</td><td> - </td><td>0') {
					mark = '<img src=\"images/botoes/information.png\" id=\"I'+rec._sId+'\" title=\'<table widht=\"100px\"><tr><td colspan=2><b>CODPROD</td><td> - </td><td><b>CODBARRA </b></td></tr><tr><td><img src=\"images/botoes/arrow_up_red.png\"></td><td>'+rec.getData('coprod')+'</td><td> - </td><td>'+rec.getData('codbarra')+'</td><td></tr><tr><td><img src=\"images/botoes/arrow_down.png\"></td><td>'+data+'</td></tr><tr><td colspan=3>Legenda: </td><td><img src=\"images/botoes/arrow_up_red.png\" width=14px>- Antigo <img src=\"images/botoes/arrow_down.png\" width=14px>- Novo</td></tr></table>\'>';
					cel.innerHTML = mark;
				}
			
				WBS.tooltips.push('I'+rec._sId);
			
			};";
			
			$this->rma_aguarda_compras = $this->getFunction() ."=function(cell,rec,col,data) {
			
				var oTable = this;
			
				var id = rec.getData('idrma');
				
				if ((rec.getData('idstatus')==4)&&(rec.getData('flag_disponivel')==0)) {
				
					var markup = '<img src=\"".$params['args']['imagem']."\" width=\"14px\" alt=\"".$params['args']['msg']."\" title=\"".$params['args']['msg']."\">';
				
					cell.innerHTML = markup;
				
					YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
						
						var _hande = {
						
							success:function(o) {
								oTable.requery(oTable.configs.generateRequest(oTable.getState()));
							},
							failure:function(o) {
								alert('NAO EFETUADO');
							},
							timeout:1000
						}
					
						var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=v_rma&id=\"+id+\"&keyfield=idrma&field=idstatus&val=15\";
						
						if (confirm('Aguardar Compras?')) {
						
							WBS.conn.asyncRequest('GET',url, _hande, null);
							
						}
	
					
					},cell);
					
				}
			
			};";
			
			$this->rma_correcao = $this->getFunction() ."=function(cell,rec,col,data) {
			
				var st = rec.getData('".(($params[field])?$params[field]:'sts')."');

				var oTable = this;
		 
				var markup_libera = \"<img src='images/botoes/hourglass.png' title='".$params['args']['msg1']."' width='14px' alt='".$params['args']['msg1']."' id='\"+col._sId+rec._sId+\"'/>\";
				
				var markup_aguarda = \"<img src='images/botoes/hourglass_gray.png' title='".$params['args']['msg2']."' width='14px' alt='".$params['args']['msg2']."' id='\"+col._sId+rec._sId+\"'/>\";
				
				WBS.tooltips.push(col._sId+rec._sId);

				if (st!=5) {
					
					cell.innerHTML = markup_aguarda;
					var url = \"ajax_html.php?file=".encode(($params['arquivo'])?$params[arquivo]:'modulos/mod_rma/sub_interno/ajax_voltastatus.php')."&pct=\"+data+\"&acao=aguarda\";

				} else {
				
					cell.innerHTML = markup_libera;
					var url = \"ajax_html.php?file=".encode(($params['arquivo'])?$params[arquivo]:'modulos/mod_rma/sub_interno/ajax_voltastatus.php')."&pct=\"+data+\"&acao=libera\";
								
				};
				
				YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
						
					//alert(url);
						
					_hande = {
					
						success:function(o) {
							
							eval('var resp ='+o.responseText);
							
							if (typeof(resp.errorMessage)!='undefined') {
								alert(resp.errorMessage);
							} else { 
							
								if (st!=5) {			
																						
									cell.innerHTML = markup_libera;
									
								} else {
															
									cell.innerHTML = markup_aguarda;
									
								}
								
								oTable.requery(oTable.configs.generateRequest(oTable.getState()));
							}
							
						},
						failure:function(o) {
							

							
						},
						timeout:1000
					}
				
					YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);

				
				},cell);
				
			};";
			
			$this->trufalse_rma = $this->getFunction()."= function(cell,rec,col,data) {

				var sts = 1;
				
				//markup_lock = '<img id=\"'+col._sId+rec._sId+'\" src=\"".$params['args']['limagem']."\" width=\"14px\" alt=\"".$params['args']['lmsg']."\" title=\"".$params['args']['lmsg']."\">';				
				markup_lock = '';

				markup_t = '<img id=\"'+col._sId+rec._sId+'\" src=\"".$params['args']['vimagem']."\" width=\"14px\" alt=\"".$params['args']['vmsg']."\" title=\"".$params['args']['vmsg']."\">';
				
				markup_f = '<img id=\"'+col._sId+rec._sId+'\" src=\"".$params['args']['fimagem']."\" width=\"14px\" alt=\"".$params['args']['fmsg']."\" title=\"".$params['args']['fmsg']."\">';
				
				if ((data != 2)&&(rec.getData('flag_credito')==0)&&((rec.getData('idstatus')==4)||(rec.getData('idstatus')==14))) { 
					
					if ((data>=1)||(data=='S')) {
						sts = 0;
						cell.innerHTML = markup_t;
					} else {
						sts = 1;
						cell.innerHTML = markup_f;
					}

					var table = this._tablename;
					var oTable = this;
					var campochave = this._campochave;
					var valorchave = rec.getData('idrma');
					var alter_campo = col.field;
					var id = valorchave;
					
					YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
						
						_hande = {
						
							success:function(o) {
								if (sts==0) {				
									sts = 1;	
									cell.innerHTML = markup_f;
								} else {
									sts = 0;
									cell.innerHTML = markup_t;
								}
								oTable.requery(oTable.configs.generateRequest(oTable.getState()));
							},
							failure:function(o) {
								alert('NAO EFETUADO');
							},
							timeout:1000
						}
					
						var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=\"+table+\"&id=\"+id+\"&keyfield=\"+campochave+\"&field=\"+alter_campo+\"&val=\"+sts;
						//alert(url);
						YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);
	
					
					},cell);
				} else {
				
					cell.innerHTML = markup_lock;
				
				}
				
				WBS.tooltips.push(col._sId+rec._sId);
			
			}";
			
			$this->trufalse_credito = $this->getFunction()."= function(cell,rec,col,data) {
			 
				var sts = 1;
				
				credito_markup_lock = '';

				credito_markup_t = '<img id=\"'+col._sId+rec._sId+'\" src=\"".$params['args']['vimagem']."\" width=\"14px\" alt=\"".$params['args']['vmsg']."\" title=\"".$params['args']['vmsg']."\">';
				
				credito_markup_f = '<img id=\"'+col._sId+rec._sId+'\" src=\"".$params['args']['fimagem']."\" width=\"14px\" alt=\"".$params['args']['fmsg']."\" title=\"".$params['args']['fmsg']."\">';
				
				if ((data != 2)&&(rec.getData('flag_disponivel') == 0)&&(rec.getData('flag_garantia')==1)) { 
					
					if ((data>=1)||(data=='S')) {
						sts = 0;
						cell.innerHTML = credito_markup_t;
					} else {
						sts = 1;
						cell.innerHTML = credito_markup_f;
					}

					var table = this._tablename;
					var oTable = this;
					var campochave = this._campochave;
					var valorchave = rec.getData('idrma');
					var alter_campo = col.field;
					var id = valorchave;
					
					YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
						
						_hande = {
						
							success:function(o) {
								
								if (sts==0) {				
									sts = 1;	
									cell.innerHTML = credito_markup_f;
									st = 4;
										
								} else {
									
									st = 10;
									sts = 0;
									cell.innerHTML = credito_markup_t;
								}
								var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=\"+table+\"&id=\"+id+\"&keyfield=\"+campochave+\"&field=idstatus&val=\"+st;
					
								YAHOO.util.Connect.asyncRequest('GET',url, {success:function(o){ oTable.requery(oTable.configs.generateRequest(oTable.getState()));} }, null);
							},
							failure:function(o) {
								alert('NAO EFETUADO');
							},
							timeout:1000
						}
					
						var url = \"ajax_html.php?file=".encode('ajax_altera.php')."&tabela=\"+table+\"&id=\"+id+\"&keyfield=\"+campochave+\"&field=\"+alter_campo+\"&val=\"+sts;
						//alert(url);
						YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);
	
					
					},cell);
				} else {
				
					cell.innerHTML = credito_markup_lock;
				
				}
				
				WBS.tooltips.push(col._sId+rec._sId);
			
			}";
			
			$this->rma_separacao_tiro =  $this->getFunction()." = function(cell, rec, col, data) {
				
				var i_tiro = document.createElement('input');
				i_tiro.type = 'text';
				i_tiro.size = '55';
				var idrma = rec.getData('idrma');
				var oTable = this;
				if (data == 0) {
					YAHOO.util.Event.addListener(i_tiro, \"blur\", function(e, oSelf) {
					
						_hande = {
							success:function(o){
								eval('obj = '+o.responseText);
								if (obj.erro == 0) {
									WBS.rma_transf = new Array;
									oTable.requery(oTable.configs.generateRequest(oTable.getState()));
								} else if (obj.erro == 1) {
									alert('ERRO: PRODUTO INDISPONIVEL');
									i_tiro.value = '';
								} else {
									alert('NAO FOI POSSIVEL TROCAR NO PEDIDO');
									i_tiro.value = '';
								}
									
							},
							failure:function(o){
							
								alert('FALHA SEPARACAO');
							
							},
							timeout:1000
						}
						
						if (i_tiro.value != '') {
						
							var url = \"ajax_html.php?file=".encode('modulos/mod_rma/sub_separacao/ajax_tiro.php')."&idrma=\"+idrma+\"&newcb=\"+i_tiro.value;
							//alert(url);
							YAHOO.util.Connect.asyncRequest('GET',url, _hande, i_tiro);
						}
					
					});
					
					cell.appendChild(i_tiro);
				} else {
					WBS.rma_transf.push(rec.getData('idrma'));
					cell.innerHTML = data;
				}
						
			}";
			
			$this->gera_detalhe =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				/*if (oData != '') {
					recCache[oRecord.getId()] = oRecord;
					recCacheLength++;
					elCell.innerHTML = oData;
				} */
			
			}";
			
			$this->rma_etqprint = $this->getFunction()." = function(cell,rec,col,data) {
			
				if (ETQ_ONLINE) {
				
					mark = '<a href=\"http://".C_ZEBRA."/wbsprint/prod_print.php?rma='+rec.getData('idrma_a')+'&pct='+rec.getData('pct')+'&codprod='+rec.getData('codprod')+'&nomeprod='+rec.getData('nomeprod')+'&ns='+rec.getData('codbarra')+'&empor='+rec.getData('codemp')+'&forn='+rec.getData('forn')+'&nomeforn='+rec.getData('forn')+'&status='+rec.getData('sts')+'\" target=\"ETQ\"><img src=\"".$params['args']['imagem']."\" width=14px></a>';
				
				} else {
				
					mark = '<img src=\"images/botoes/printer_error.png\" alt=\"IMPRESSORA OFFLINE\" title=\"IMPRESSORA OFFLINE\" width=14px>';
				
				}
				
				cell.innerHTML = mark
			
			}";
			
			$this->rma_romaneio = $this->getFunction()."= function(cell,rec,col,data){
			
				var markup = \"<a href='ajax_html.php?file=".encode($params['arquivo'])."&id=\"+rec.getData('idrmapct')+\"&pct=1' target='_blank'><img src='".$params['args']['imagem']."' title='".$params['args']['mensagem']."' alt='".$params['args']['mensagem']."' id='\"+col._sId+''+rec._sId+\"' width=14px></a>\";
				
				WBS.tooltips.push(col._sId+''+rec._sId);		
				cell.innerHTML = markup;
			
			};";
			
			$this->rma_indisponivel = $this->getFunction()."= function(cell,rec,col,data){
			
				var markup = '<img src=\"".$params['args']['imagem']."\" width=\"14px\" title=\"".$params[args][mensagem]."\" id=\"'+col._sId+''+rec._sId+'\">';
				
				//cell.innerHTML = markup;
				img = cell.firstChild;
				oTable = this;
				
				_hande = {
					success:function(o) {
						oTable.requery(oTable.configs.generateRequest(oTable.getState()));
					},
					failure:function(o) {
						alert('Falha AJAX linha 218');	
					},
					timeout:1000
				}
				
				
				if (rec.getData('codbarra_tcliente')=='0') {
					WBS.tooltips.push(col._sId+''+rec._sId);
				 	cell.innerHTML = markup;
					YAHOO.util.Event.addListener(img, \"click\", function(e, oSelf) {
						if (confirm('(RMA:'+data+') Indisponibilizar produto?')) {
							YAHOO.util.Connect.asyncRequest('GET', encodeURI('ajax_html.php?file=".encode($params['arquivo'])."&idrma='+data), _hande, img);			
						}
					},img);
				}
			
			}";
			
			$this->rma_aprova_reprova = $this->getFunction()."= function(cell,rec,col,data){
				
				var oTable = this;
						
				_hand = {
					success:function(o){
						oTable.requery(oTable.configs.generateRequest(oTable.getState()));
					},
					failure:function(o){
						alert('FALHA');
					}
				}
				
				etiqueta = function(sA){
					var etq = document.getElementById('ETQ');
					etq.src = encodeURI('http://10.10.9.240/wbsprint/prod_print.php?rma='+rec.getData('idrma_a')+'&pct='+rec.getData('pct')+'&codprod='+rec.getData('codprod')+'&nomeprod='+rec.getData('nomeprod')+'&ns='+rec.getData('codbarra')+'&empor='+rec.getData('codemp')+'&forn='+rec.getData('forn')+'&nomeforn='+rec.getData('forn')+'&status='+sA);
				
				}
				
				var d_aceita = document.createElement('div');
				d_aceita.style.display = 'inline';
				d_aceita.innerHTML = \"<img src='images/botoes/accept_dis.png' title=' DESABILITADO ' alt=' DISABILITADO ' width=14px>\";
				
				var aceita = document.createElement('div');
				aceita.style.display = 'inline';
				aceita.innerHTML = \"<img src='".$params['args']['imagem_2']."' title='".$params['args']['mensagem_2']."' alt='".$params['args']['mensagem_2']."' width=14px>\";
				YAHOO.util.Event.addListener(aceita, \"click\", function(e, oSelf) {
					var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('ajax_html.php?file=".encode($params['arquivo'])."&id='+data+'&idstatus=5'), _hand);
					var etq = document.getElementById('ETQ');
					url = 'http://10.10.9.240/wbsprint/prod_print.php?rma='+rec.getData('idrma_a')+'&pct='+rec.getData('pct')+'&codprod='+rec.getData('codprod')+'&nomeprod='+rec.getData('nomeprod')+'&ns='+rec.getData('codbarra')+'&empor='+rec.getData('codemp')+'&forn='+rec.getData('forn')+'&nomeforn='+rec.getData('nomeforn')+'&status=EM RMA';
					//alert(url);
					etq.src = encodeURI(url);
				}, aceita);
				
				var reprova = document.createElement('div');
				reprova.style.display = 'inline';
				reprova.innerHTML = \"<img src='".$params['args']['imagem_1']."' title='".$params['args']['mensagem_1']."' alt='".$params['args']['mensagem_1']."' width=14px>\";
				YAHOO.util.Event.addListener(reprova, \"click\", function(e, oSelf) {
					var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('ajax_html.php?file=".encode($params['arquivo'])."&id='+data+'&idstatus=6'), _hand);
					var etq = document.getElementById('ETQ');
					url = 'http://10.10.9.240/wbsprint/prod_print.php?rma='+rec.getData('idrma_a')+'&pct='+rec.getData('pct')+'&codprod='+rec.getData('codprod')+'&nomeprod='+rec.getData('nomeprod')+'&ns='+rec.getData('codbarra')+'&empor='+rec.getData('codemp')+'&forn='+rec.getData('forn')+'&nomeforn='+rec.getData('forn')+'&status=REPROVADO';
					etq.src = encodeURI(url);
				}, reprova);
				
				if (rec.getData('idstatus') == 4) {
					cell.appendChild(aceita);
					cell.appendChild(reprova);
				} else {
					cell.appendChild(d_aceita);
				}
							
			};";
			/*if (ETQ_ONLINE) {
				
					mark = '<a href=\"http://".C_ZEBRA."/wbsprint/prod_print.php?rma='+rec.getData('idrma_a')+'&pct='+rec.getData('pct')+'&codprod='+rec.getData('codprod')+'&nomeprod='+rec.getData('nomeprod')+'&ns='+rec.getData('codbarra')+'&empor='+rec.getData('codemp')+'&forn='+rec.getData('forn')+'&nomeforn='+rec.getData('forn')+'&status='+rec.getData('sts')+'\" target=\"ETQ\"><img src=\"".$params['args']['imagem']."\"></a>';
				
				} else {
				
					mark = '<img src=\"images/botoes/printer_error.png\" alt=\"IMPRESSORA OFFLINE\" title=\"IMPRESSORA OFFLINE\">';
				
				}*/
			$this->blank.$param['arg']['nome'] = $this->getFunction ." = function (elCell,oRecord,oColumn,oData) {
			
				".$param[arg][fmt]."
			
			};";
			
			$this->rma_addlaudo = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
	
				var codprod = oRecord.getData('codprod') || false;
				var codcat = oRecord.getData('codcat') || false;
				var idrma = oRecord.getData('idrma') || false;
				
				var fEdit = '".encode($params['arquivo'])."';
				
				var oTable = this;
				
				var markup = '';
				
					switch (true) {
					
						case (idrma): {
						
							markup = ".$this->imagem('cancel.png','Produto JA em RMA').";
						
						}break;
						default:{
							
							markup = ".$this->imagem('add.png','Iniciar RMA deste produto').";
							
							".$this->evento()."
								
								WBS.pagina._msg.static('info','Aguarde, conectando...');
								
								WBS.rma = oRecord._oData;
								
								elCell.innerHTML = '';
								divCentral.carrega(fEdit+'&codprod='+codprod+'&codcat='+codcat);
				
							},elCell);			
						}
					}				
					
					elCell.innerHTML = markup;		
			
			}";
			
			$this->novolaudo = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
			var rec = oRecord;
			var col = oColumn;
			var data = oData;
			var cell = elCell;
			var markup;
			var emrma = rec.getData('idrma');
			
		if ((typeof(emrma)=='undefined')||(emrma < 1)) {
		
			markup = '<img src=\"images/botoes/add.png\" title=\"Iniciar RMA deste prodtuo\" width=14px>';
			
			YAHOO.util.Event.addListener(cell, 'click', function(e, oSelf) { 
			
				WBS.rma = {
					codbarra:rec.getData('codbarra'),
					codcb:rec.getData('codcb'),
					codcb_ent:rec.getData('codcb_ent'),
					codped:rec.getData('codped'),
					codprod:rec.getData('codprod'),
					flag_garantia:rec.getData('em_garantia'),
					garantia:rec.getData('garantia'),
					nomeprod:rec.getData('nomeprod'),
					codoc:rec.getData('codoc'),
					codemp:rec.getData('codemp'),
					codforn:rec.getData('codforn'),
					disponivel:rec.getData('quant_f')+rec.getData('quant_lf')
				}
				
				divCentral.carrega('".encode('modulos/mod_rma/ajax/ajax_laudos.php')."&codcat='+rec.getData('codcat')+'&codprod='+rec.getData('codprod')+'&act=I',this);
				
			},cell);
		
		} else {
		
			markup = '<img src=\"images/botoes/cancel.png\" title=\"Produto EM rma\" width=14px>';
		
		}
		
		cell.innerHTML = markup;
	
	};";
			
			$this->marca_garantia = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				if ((oRecord.getData('em_garantia')==1)&&oData){
				
					elCell.innerHTML = '<font color=009900>'+oData+'</font>';
					
				} else {
					if (oData) {
						elCell.innerHTML = '<font color=990000>'+oData+'</font>';
					} else {
						elCell.innerHTML = '<font color=FF0000><b>CONFERIR<br>DATA NF</b></font>';
					}					
				}
			
			};";
			
			$this->addlaudo2 = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				oData = oRecord.getData('codbarra');
				garantia = oRecord.getData('garantia');
				if (!oRecord.getData('idrma')) {
					if ((oRecord.getData('garantia'))&&(oRecord.getData('em_garantia'))) {
						elCell.innerHTML = '<img src=\"images/botoes/".(($params['args']['imagem'])?$params['args']['imagem']:'add.png')."\" title=\"Iniciar RMA deste produto\" alt=\"Iniciar RMA deste produto\" width=\"14px\">';
							var fEdit = '".encode($params['arquivo'])."';
							var oTable = this;
							
							var id = oData;
							
							
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {
									oTable.select(oSelf.parentNode);
									WBS.pagina._msg.static('info','Aguarde, conectando...');
									divCentral.carrega( changeIt(fEdit+'&id='+id+'&gar=' +oRecord.getData('em_garantia')+ '&disp=' +oRecord.getData('quant')+ '&garant=' +garantia+ '&codcb=' + oRecord.getData('codcb') + '&codcb_ent=' + oRecord.getData('codcb_ent') + '&codped= '+oRecord.getData('codped')  ));							}
							, elCell);

					} else {
							elCell.innerHTML = '<img src=\"images/botoes/".(($params['args']['imagem'])?$params['args']['imagem']:'add.png')."\" title=\"Iniciar RMA deste produto\" alt=\"Iniciar RMA deste produto\">';
							var fEdit = '".encode($params['arquivo'])."';
							var oTable = this;
							
							var id = oData;
							
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {
									oTable.select(oSelf.parentNode);
									WBS.pagina._msg.static('info','Aguarde, conectando...');
									divCentral.carrega( changeIt(fEdit+'&id='+id+'&gar=' +oRecord.getData('em_garantia')+ '&disp=' +oRecord.getData('quant')+ '&garant=' +garantia+ '&codcb=' + oRecord.getData('codcb') + '&codcb_ent=' + oRecord.getData('codcb_ent') + '&codped= '+oRecord.getData('codped')  ));
							}
							, elCell);
					}					
				} else {
					elCell.innerHTML = 'EM RMA';
				}
						
			
			}";
			
			$this->rma_trocacliente = $this->getFunction()." = function(cell,rec,col,data){
				
				cod_tc = data;
				
				if ((rec.getData('status')=='AG SEPARACAO')&&(rec.getData('flag_garantia')==1)&&(rec.getData('flag_disponivel')==0)&&(rec.getData('flag_credito')==0)) {
		
					var id = rec.getData('idrma');
					fEdit = '".$params['arquivo']."';
					var markup = '<img src=\"".$params['args']['imagem']."\" alt=\"".$params['args']['mensagem']."\" title=\"".$params['args']['mensagem']."\" width=14px>';
					YAHOO.util.Event.addListener(cell, \"click\", function(e, oSelf) {
						
						divCentral.carrega(fEdit+'&id='+id);		
						
					}, cell);
					
				} else {
						var lock = '<img src=\"images/botoes/lock.png\" alt=\"'+data+'\" title=\"'+data+'\" width=14px>'
					if (cod_tc != 0) {
						markup = '';
					} else {
						markup = '';
					}
				}			
				cell.innerHTML = markup;
			};";
			
			$this->dummie = $this->getFunction() ." = function(elCell, oRecord, oColumn, oData) {
			
				elCell.innerHTML = \"<img src='".$params['args']['imagem']."' alt='N&Atilde;O FUNCIONA' title='N&Atilde;O FUNCIONA' width=14px/>\";
				
			
			}";
			
			$this->marca1 = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) { //RMA
						
				oTable.this;
 
				
				if (oData < 1) {
								
					elCell.innerHTML = 'NAO';
					onscreen.marks.push(oRecord.getId());
					
				} else {
					
					elCell.innerHTML = 'SIM';
				
				};
			
			};";
			
			$this->rma_prod_status_changer =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				arr = new Array();
				arr[5] = 'EM RMA';
				arr[10] = 'RMA';
				arr[11] = 'RMA TROCADO';
				arr[12] = 'ENV. FORNEC';
				arr[13] = 'RET. FORNEC';
				arr[14] = 'ENV. AT.';
				arr[15] = 'RET. AT.';
				arr[16] = 'RET. ESTOQUE';
				arr[17] = 'S. GARANTIA';
				arr[18] = 'AG. CARTA CORRECAO';
				arr[19] = 'AG. NOTA FISCAL';
							
				
				_hand = {
					success:function(o){ },
					failure:function(o){ },
					timeout:1000
				}
				
				dar = \"<select name='status' id=\"+oRecord._oData['idrma']+\">\";
				opts = new Array();
				for (i=10;i<arr.length;i++){
					sel = '';
					if (i < 3) { enbl = 'disabled = \"disabled\"'; } else { enbl =''; }
					if (oData == i) { sel = 'SELECTED' };
					dar+=\"<option value='\"+i+\"' '\"+enbl+\"' \"+sel+\">\"+arr[i]+\"</option>\";		
				}

				dar +=\"</select>\";
				
				if (oData == 5) {
					dar = arr[5];
				};
				
				elCell.innerHTML = dar;
								
				
				YAHOO.util.Event.addListener(elCell.firstChild, \"change\", function(e, oSelf) {
						var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('ajax_html.php?file=".encode('modulos/mod_rma/sub_adm/ajax_status.php')."&id='+oRecord._oData['idrma_a']+'&status='+elCell.firstChild.value), _hand);
				}, elCell);
							
				dar = '';
			}";
			
			$this->ticket_status =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				arr = new Array();
				arr[0] = 'ABERTO';
				arr[1] = 'NA FILA';
				arr[2] = 'EM ATENDIMENTO';
				arr[3] = 'AGUARDANDO';
				arr[4] = 'RESOLVIDO';
				arr[5] = 'SEM SOLU&Ccedil;&Atilde;O';
				arr[6] = 'N&Atilde;O PROCEDE';
				
				
				if (oData == '2'){
					//alert(oData);
					var time = new Array();
					
					time[1] = 48;
					time[2] = 24;
					time[3] = 1;
					
					elCell.innerHTML = time[oRecord._oData['prioridade']]+'H PARA SOLU&Ccedil;&Atilde;O';
				
				} else {
					elCell.innerHTML = arr[oData];
				}
			
			}";
			
			$this->ticket_hstatus =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				arr = new Array();
				arr[0] = 'ABERTO';
				arr[1] = 'NA FILA';
				arr[2] = 'EM ATENDIMENTO';
				arr[3] = 'AGUARDANDO';
				arr[4] = 'RESOLVIDO';
				arr[5] = 'SEM SOLU&Ccedil;&Atilde;O';
				arr[6] = 'N&Atilde;O PROCEDE';
				
				elCell.innerHTML = arr[oData];
			
			}";
			
			$this->ticket_prior_changer =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				oTable = this;
				arr = new Array();
				arr[1] = 'BAIXA (48H)';
				arr[2] = 'MEDIA (24H)';
				arr[3] = 'ALTA  (1H)';
				arr[0] = 'A DEFINIR';
				//arr[4] = 'ALTA';
				//arr[5] = 'SEM NOCAO';
				
				//var D = YAHOO.util.Dom;
        		//D.batch(D.getChildren(this.getTrEl(1)),this.formatCell,this,true);
				
				_hand = {
					success:function(o){				
						oTable.requery(oTable.configs.generateRequest(oTable.getState())); 
					},
					failure:function(o){ },
					timeout:1000
				}
				

				
				dar = \"<select name='prioridade'>\";
				opts = new Array();
				for (i=0; i<arr.length; i++){
					sel = '';
					if (oData == i) { sel = 'SELECTED' };
					dar+=\"<option value='\"+i+\"' \"+sel+\">\"+arr[i]+\"</option>\";		
				}
				dar +=\"</select>\";
				
				if (oData != 0) {
					dar = arr[oData];
				}
				elCell.innerHTML = dar;
				oRecord._oData['status'] = 1;

				YAHOO.util.Event.addListener(elCell.firstChild, \"change\", function(e, oSelf) {
				var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('modulos/tickets_adm/ajax_prioridade.php?id='+oRecord._oData['idticket']+'&prioridade='+elCell.firstChild.value), _hand);
				elCell.innerHTML = arr[elCell.firstChild.value];				

			}, elCell);
			
			}";
			
			$this->ticket_status_changer =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				arr = new Array();
				arr[0] = 'ABERTO';
				arr[1] = 'NA FILA';
				arr[2] = 'EM ATENDIMENTO';
				arr[3] = 'AGUARDANDO';
				arr[4] = 'RESOLVIDO';
				arr[5] = 'SEM SOLU&Ccedil;&Atilde;O';
				arr[6] = 'N&Atilde;O PROCEDE';
			
				_hand = {
					success:function(o){ },
					failure:function(o){ },
					timeout:1000
				}
				
				dar = \"<select name='status' id=\"+oRecord._oData['idticket']+\">\";
				opts = new Array();
				for (i=1;i<arr.length;i++){
					sel = '';
					if (i == 1) { enbl = 'disabled = \"disabled\"'; } else { enbl =''; }
					if (oData == i) { sel = 'SELECTED' };
					dar+=\"<option value='\"+i+\"' '\"+enbl+\"' \"+sel+\">\"+arr[i]+\"</option>\";		
				}

				dar +=\"</select>\";
				dar += \"<textarea id='\"+oRecord._oData['idticket']+\"' style='display:none'></textarea>\";
				if (oData == 0) {
					dar = arr[0];
				};
				
				elCell.innerHTML = dar;
						
				/*	teste1 = function(oText,valor,id){
				if (oText.value != '') {
						elCell = oText.parentNode;
						//var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('modulos/tickets_adm/ajax_status.php?id='+id+'&status='+valor+'&desc='+oText.value), _hand);
						elCell.innerHTML = arr[valor];
					} else {
						alert('STATUS NÃO ALTERADO');
					}
				}*/
				
				
				YAHOO.util.Event.addListener(elCell.firstChild, \"change\", function(e, oSelf) {
					if (elCell.firstChild.value > 2){
						YAHOO.util.Dom.setStyle(elCell.lastChild, 'display', 'block');
					} else {
						var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('modulos/tickets_adm/ajax_status.php?id='+oRecord._oData['idticket']+'&status='+elCell.firstChild.value+'&desc='+arr[elCell.firstChild.value]), _hand);
					}
				}, elCell);
				
				YAHOO.util.Event.addListener(elCell.lastChild, \"blur\", function(e, oSelf) {
					oText = elCell.lastChild;
					if (oText.value != '') {
						elCell = oText.parentNode;
						var cObj = YAHOO.util.Connect.asyncRequest('get', encodeURI('modulos/tickets_adm/ajax_status.php?id='+oRecord._oData['idticket']+'&status='+elCell.firstChild.value+'&desc='+oText.value), _hand);
						//alert('modulos/tickets_adm/ajax_status.php?id='+oRecord._oData['idticket']+'&status='+elCell.firstChild.value+'&desc='+oText.value);
						elCell.innerHTML = arr[elCell.firstChild.value];
					} else {
						alert('STATUS N&Atilde;O ALTERADO');
						//YAHOO.util.Dom.setStyle(elCell.lastChild, 'display', 'none');
					}
				}, elCell);
				
			
			
			}";
			
			$this->kill_user =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
			
				elCell.innerHTML = 'EJETAR';
				WBS.AA = elCell;
					_hand = {
					success:function(o){ },
					failure:function(o){ },
					timeout:1000
				}
				
			YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) {
				elCell.innerHTML = 'EJETADO';
				oRecord = '';
				var cObj = WBS.conn.asyncRequest('get', encodeURI('modulos/adm_session/ajax_delsess.php?id='+oData), _hand);
			}, elCell);
			
			}";
			//ESSE TIPO DE EDIT ABRE UM ARQUIVO EXTERNO, CONTENDO O FORMULÁRIO						
			$this->edit =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
							var markup = \"<img src='".((isset($params['args']['imagem']))?$params['args']['imagem']:"images/botoes/page_white_edit.png")."' alt='Editar Dados' title='Editar Dados' width=14px/>\";
							elCell.innerHTML = markup;
							var fEdit = '".encode($params['arquivo'])."';
							var oTable = this;
							
							var id = oData;
							
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {
									oTable.select(oSelf.parentNode);
									WBS.pagina._msg.static('info','Aguarde, conectando...');
									divCentral.carrega(changeIt(fEdit+'&id='+id));
							}
							, elCell);
						};";
			//ESSE TIPO DE EDIT ABRE UM FORMULARIO GERADO AUTOMATICAMENTE <<==================================== AINDA EM DESENVOLVIMENTO
			$this->auto_edit =  $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				var col = oColumn;
				var rec = oRecord;
				var cel = elCell;
				var data = oData;
							var markup = '<img id=\"'+col._sId+''+rec._sId+'\" src=\"".(($params['args']['imagem'])?$params['args']['imagem']:'images/edit.gif')."\" alt=\"".$params['args']['mensagem']."\" title=\"".$params['args']['mensagem']."\" width=14px/>';
							
							elCell.innerHTML = markup;
							var fEdit = '".encode('modulos/formularios/act_gera.php')."';
							var oTable = this;
							var id = '".$params['args']['formid']."';
							var oid = oData;
							
							WBS.tooltips.push(col._sId+''+rec._sId);
							
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) {
									YAHOO.util.Event.preventDefault(e);
									oTable.select(oSelf.parentNode);
									WBS.pagina._msg.static('info','Aguarde, conectando...');
									divCentral.carrega(fEdit+'&formid='+id+'&recordID='+oid);
									
							}
							, elCell);
						};";
			//FORMATA STATUS NO GRID SVN_ADM
			$this->svn_status = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
				arr = new Array();
				arr[1] = \"add\";
				arr[2] = \"unv\";
				arr[3] = \"mod\";
				arr[4] = \"add\";
				arr[5] = \"miss\";
				arr[6] = \"deleted\";
				arr[7] = \"replaced\";
				arr[8] = \"erro_wc_modified\";
				arr[9] = \"erro\";
				arr[10] = \"erro3\";
				arr[11] = \"ignored\";
				arr[12] = \"erro4\";
				arr[13] = \"erro5\";
				arr[14] = \"erro6\";
				elCell.innerHTML = \"<div class='\"+arr[oData]+\"'>&nbsp;</div>\";
			}";
			//FORMATA UMA CHECKBOX COM RECORDID COMO ID E ODATA COMO NOME DO ELEMENTO
			$this->checkbox = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
				elCell.innerHTML = '<input type=\"checkbox\" id=\"'+oRecord.getId()+\"\\\" name='\"+oData+\"'></input>\";
			}";
			
			$this->form_diretorio = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
				var e;
				e = oData.indexOf('.');
				if (e>0) {
					elCell.innerHTML = oData;
				} else {
					elCell.innerHTML = '<b>'+oData+'</b>';
				}			
			}";
			
			$this->rma_cond_checkbox = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
				

				if (".(($params['args']['condicao'])?$params['args']['condicao']:"				((oRecord.getData('flag_transferido')!=0)&&(oRecord.getData('idstatus')==7))||(oRecord.getData('flag_credito')==1)||(oRecord.getData('flag_nosso')==0)||((oRecord.getData('flag_garantia')==0)&&(oRecord.getData('idstatus')==4))")."){
					elCell.innerHTML = '<input type=\"checkbox\" id=\"'+oRecord.getId()+\"\\\" name='\"+oRecord.getData('idrma')+\"'></input>\";
				} else {
					elCell.innerHTML = \"<img src='images/botoes/".(($params['args']['img_lock'])?$params['args']['img_lock']:'hourglass').".png' alt='NAO' title='NAO' width=14px />\";
				}
			}";
			
			$this->rma_mark_garantia = $this->getFunction() ." = function(cel,rec,col,data){
			
				if (data==1) {
				
					mark = '<img src=\"images/botoes/accept.png\" title=\"Processar\" alt=\"Trocado\" width=14px>';
					
				
				} else {
				
					mark = '<img src=\"images/botoes/cancel.png\" title=\"Devolver\" alt=\"Devolvendo\" width=14px>';
				
				}
				
				cel.innerHTML = mark;
			
			}";
			
			$this->rma_send_revenda = $this->getFunction() ." = function(cel,rec,col,data){
			
					var oTable = this;
				
				if (".$params[args][condicao].") {
				
					mark = '<img src=\"images/botoes/cart_go.png\" title=\"Setar como eviado\" alt=\"Setar como enviado\" width=14px>';
					
					_hand = {
						success:function(o) {
							oTable.requery(oTable.configs.generateRequest(oTable.getState()));
						}
					};
					
					YAHOO.util.Event.addListener(cel, \"click\", function(e, oSelf) {
						
						var url = \"ajax_html.php?file=".encode('modulos/mod_rma/sub_interno/ajax_envio_revenda.php')."&id=\"+data;
						
						YAHOO.util.Connect.asyncRequest('GET',url,_hand);
						
					}
					, cel);
					
				} else {
					mark = '<img src=\"images/botoes/exclamation.png\" title=\"Inserir numero e data da nota fiscal\" alt=\"Inserir numero e data da nota fiscal\" width=14px>';
				}
				
				cel.innerHTML = mark;
			
			}";
			
			$this->form_diretorio = $this->getFunction()." = function(elCell,oRecord,oColumn,oData){
				var e;
				e = oData.indexOf('.');
				if (e>0) {
					elCell.innerHTML = oData;
				} else {
					elCell.innerHTML = '<b>'+oData+'</b>';
				}			
			}";
			
			//FORMATA EXCLUSÃO DE REGISTROS NO BANCO DE DADOS, PARA EXCLUSÕES ESPECÍFICAS, PROGRAMAR ESPECÍFICO?
			$this->delete = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				var markup = \"<img src='images/delete.gif' alt='Excluir Dados' title='Excluir Dados' width=14px/>\";
				var tablename = this._tablename || this.configs._tablename;
				var deleteFile = '".$params['arquivo']."';
				var oTable = this;
				elCell.innerHTML = markup;
				var campochave = this._campochave || this.configs._campochave;
				var idd = oData;
				
			
				YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function(e, oSelf) { 
					var request;
					if (idd != WBS.ida){	
						if (confirm(\"Deseja realmente excluir este registro?\")) {
							var id = idd;
							var url1 = \"ajax_html.php?file=\"+deleteFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave;
							YAHOO.util.Connect.asyncRequest('GET',url1,  {
																success: function (o) {
																		oTable.requery();
																 },
																 failure: function (o) {
																		 alert('FAIO');
																 }
															 }, null);
							WBS.ida = idd;
						}
					}
				}, elCell);
			};";
			
			//FORMATA ENVIO DE PACOTES AGUARDANDO PARA PRODUTOS ATIVOS 'EM RMA';
			$this->ajax_sendata = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				var tablename = this._tablename;
				var setFile = '".encode($params['arquivo'])."';
				var oTable = this;
				
				var campochave = this._campochave;
				var idd = parseInt(oRecord._oData[this._campochave]);
				
				if (oRecord._oData['nf_e'] != ''){
					var markup = \"<img src='images/".$params['args']['imagem']."' alt='Excluir Dados' title='Rejeitar pacote' width=14px />\";
					YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) { 
						var request;
						if (confirm(\" ".$params['args']['mensagem'].": \"+oData+\"?\")) {
							var id = idd;
							var url1 = \"ajax_html.php?file=\"+setFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave+\"&dado=".$params['args']['dado']."\";
							//alert(url1);
							YAHOO.util.Connect.asyncRequest('GET',url1,  {
																success: function (o) {
																		oTable.requery(oTable.configs.generateRequest(oTable.getState()));
																 },
																 failure: function (o) {
																		 alert('FALHA');
																 }
															 }, null);
						}
					}, elCell);
				} else {
				
					var markup = \" - \";
				
				}
				elCell.innerHTML = markup;
			};";
			
			//FORMATA ENVIO DE PACOTES AGUARDANDO PARA PRODUTOS ATIVOS 'EM RMA';
			$this->em_rma = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				var tablename = this._tablename;
				var setFile = '".encode($params['arquivo'])."';
				var oTable = this;
				var imagem = '".(($params['args']['imagem'])?$params['args']['imagem']:'images/botoes/package_go.png')."';
				var mensagem = '".(($params['args']['mensagem'])?$params['args']['mensagem']:'RECEBER PACOTE')."';
				var campochave = this._campochave;
				var idd = parseInt(oRecord._oData[this._campochave]);
				var markup = 'ed';
				
				if ((oRecord.getData('status')=='AG CONFERENCIA')||(oRecord.getData('status')=='AG CONF RMA')){
					var markup = \"<img src='\"+imagem+\"' alt='\"+mensagem+\"' title='\"+mensagem+\"' width=14px/>\";
					YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) { 
						var request;
						if (confirm(\" CONFIRMA RECEBIMENTO DO PACOTE NUMERO: \"+oData+\"\")) {
							var id = idd;
							var url1 = \"ajax_html.php?file=\"+setFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave;
							//alert(url1);
							YAHOO.util.Connect.asyncRequest('GET',url1,  {
																success: function (o) {
																		oTable.requery(oTable.configs.generateRequest(oTable.getState()));
																 },
																 failure: function (o) {
																		 alert('FALHA');
																 }
															 }, null);
						}
					}, elCell);
				} else {
				
					var markup = \" \";
				
				}
				elCell.innerHTML = markup;
			};";
			
			$this->delbyid = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				var tablename = this.configs._tablename;
				var deleteFile = '".encode($params['arquivo'])."';
				var oTable = this;
     
				var campochave = this.configs._campochave;
				var idd = oRecord.getData(this.configs._campochave);
				
				//alert(oRecord.getData('status')+' '+oRecord.getData('sameuser'));
				
				if ((oRecord.getData('status') == '4')&&(oRecord.getData('sameuser')==1)){
					var markup = \"<img src='images/delete.gif' alt='Excluir Dados' title='Excluir Dados' width=14px />\";
					YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) { 
						var request;
						if (confirm(\"Deseja realmente excluir este pacote?\\n NÃO PODE SER DESFEITO!\")) {
							var id = idd; 
							var url1 = \"ajax_html.php?file=\"+deleteFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave;
							//alert(url1);
							YAHOO.util.Connect.asyncRequest('GET',url1,  {
																success: function (o) {
																		oTable.deleteRow(oRecord);
																 },
																 failure: function (o) {
																		 alert('FALHOU');
																		 oTable.requery();
																 }
															 }, null);
						}
					}, elCell);
				} else {
				
					var markup = \"  - \";
				
				}
				elCell.innerHTML = markup;
			};";
			
			//FORMATA EXCLUSÃO DE REGISTROS NO BANCO DE DADOS, PARA EXCLUSÕES ESPECIFICAS DO PACOTE RMA 
			$this->delrma = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				var tablename = this._tablename;
				var deleteFile = '".encode($params['arquivo'])."';
				var oTable = this;
				
				var campochave = this._campochave;
				var idd = parseInt(oData);
				
				if (oRecord.getData('nf_e') == ''){
					var markup = \"<img src='images/delete.gif' alt='Excluir Dados' title='Excluir Dados' width=14px />\";
					YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) { 
						var request;
						if (confirm(\"Deseja realmente excluir este pacote?\\nNÃO PODE SER DESFEITO!\")) {
							var id = idd;
							var url1 = \"ajax_html.php?file=\"+deleteFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave;
							//alert(url1);
							YAHOO.util.Connect.asyncRequest('GET',url1,  {
																success: function (o) {
																		oTable.requery(oTable.configs.generateRequest(oTable.getState()));
																 },
																 failure: function (o) {
																		 alert('FAIO');
																 }
															 }, null);
						}
					}, elCell);
				} else {
				
					var markup = \" - \";
				
				}
				elCell.innerHTML = markup;
			};";
			
			//FORMATA EXCLUSÃO DE REGISTROS NO BANCO DE DADOS, PARA EXCLUSÕES ESPECIFICAS DO PACOTE RMA (ADM)
			$this->delrma_adm = $this->getFunction()." = function(elCell, oRecord, oColumn, oData) {
				
				var tablename = this._tablename;
				var deleteFile = '".encode($params['arquivo'])."';
				var oTable = this;
				
				var campochave = this._campochave;
				var idd = parseInt(oRecord._oData[this._campochave]);
			
				var markup = \"<img src='images/delete.gif' alt='Excluir Dados' title='Excluir Dados' width=14px />\";
				YAHOO.util.Event.addListener(elCell, \"click\", function(e, oSelf) { 
					var request;
					if (confirm(\"Deseja realmente excluir este pacote?\\n NAO PODE SER DESFEITO!\")) {
						var id = idd;
						var url1 = \"ajax_html.php?file=\"+deleteFile+\"&table=\"+tablename+\"&id=\"+id+\"&keyfield=\"+campochave;
						//alert(url1);
						YAHOO.util.Connect.asyncRequest('GET',url1,  {
															success: function (o) {
																	oTable.requery(oTable.configs.generateRequest(oTable.getState()));
															 },
															 failure: function (o) {
																	 alert('FAIO');
															 }
														 }, null);
					}
				}, elCell);
				elCell.innerHTML = markup;
			};";

			
			//FORMATADOR QUE ABRE, AO CLIQUE, UM CAMPO PARA EDIÇÃO DO ENDEREÇO DA IMAGEM, APENAS ========> TO-DO: UPLOAD DE NOVA IMAGEM PELO EDITOR.
			$this->image_src = "YAHOO.widget.DataTable.format".$params['tipo']." = function(elCell, oRecord, oColumn, oData ".((count($params['args'])>>1)?$this->conv_params($params['args']):'').") {
							//alert(oData);
							var markup = \"<img src='".IMAGES."\"+oData+\"' border='0'/>\";
							elCell.innerHTML = markup;
			};";
			
			//ABRE EM UM TABVIEW (PARA TVIEW), UMA TAB EXISTENTE (PARAM TABINDEX) O ID (PARAM ID); <=============================== AINDA EM DESENVOLV.
			$this->filtro_tab = "YAHOO.widget.DataTable.format".$params['tipo']." = function(elCell, oRecord, oColumn, oData) {
							var markup = \"<a href=\'#\' id=\'add-tab\'><img src=\'images/view.gif\' alt=\'Ver Dados\' title=\'Ver Dados\' border=\'0\' width=14px/></a>\";
							elCell.innerHTML = markup;
							var viewfile = ".$params['args']['tview'].".conteudo;
							var tabview = ".$params['args']['tview'].";
							var oTable = this;
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function (e, oSelf) { 
										var id = oData;
										WBS.MasterId = id;
										oTable.unselectAllRows();
										oTable.select(oSelf);
										
							})	};";
			
			//ABRE UMA NOVA TAB E MOSTRA ARQUIVO (TABLE_PARAM) DETALHANDO ID (DADO_CAMPO);'<img id=\"'+col._sId+''+rec._sId+'\" src=\"".$params['args']['imagem']."\" alt=\"".$params['args']['mensagem']."\" title=\"".$params['args']['mensagem']."\" />';
			$this->det_tab = "YAHOO.widget.DataTable.format".$params['tipo']." = function(elCell, oRecord, oColumn, oData) {
				var col = oColumn;
				var rec = oRecord;
							var markup = \"<a href=\'#\' id=\'add-tab\'><img src=\'".((isset($params['args']['imagem']))?$params['args']['imagem']:"images/botoes/zoom_in.png")."\' alt=\'".((isset($params['args']['mensagem']))?$params['args']['mensagem']:"Ver Dados")."\' title=\'".((isset($params['args']['mensagem']))?$params['args']['mensagem']:"Ver Dados")."\' border=\'0\' style=\'float:right\' id='\"+col._sId+rec._sId+\"' width=14px/></a>\";
							elCell.innerHTML = markup;
							var viewfile = '".$params['arquivo']."';
							var oTable = this;
							WBS.tooltips.push(col._sId+''+rec._sId);
							YAHOO.util.Event.addListener(elCell.firstChild, \"click\", function (e, oSelf) { 
										WBS.wait.show();
										WBS.MasterId = id;
										oTable.unselectAllRows();
										oTable.select(oSelf);
										var id = oData;
										if (!WBS.pagina._opentabs[oData+id]){
											
											var newTab = new YAHOO.widget.Tab({
												cacheData:false,
												label: WBS.pagina.cl('Detalhe: '+id),
												dataSrc: 'ajax_html.php?file=".encode($params['arquivo'])."&id='+id,
												active: true
											});
											eval('tabView ='+ onscreen.tab['".$params['args']['modulo']."']);
											WBS.last_activetab = tabView.get('activeIndex');
											acti = tabView.get('activeIndex');
											tabView.addTab(newTab, tabView.get('activeIndex')+1);
												
											YAHOO.util.Event.on(newTab.getElementsByClassName('close')[0], 'click', function (e, tab){																

												YAHOO.util.Event.preventDefault(e);
												onscreen.sCond = '';
												var tab0 = tabView.getTab(WBS.last_activetab);

												tabView.set('activeTab', tab0);
												WBS.pagina._opentabs[oData+id] = false;
												tabView.removeTab(newTab);

												
											}, newTab);
											
											WBS.pagina._opentabs[oData+id] = newTab;

										}else{
											tabView.set('activeTab',WBS.pagina._opentabs[oData+id]);
											WBS.wait.hide();
										}
						})	};";
			
			$this->relacional2 = $this->getFunction() . " = function(elCell, oRecord, oColumn, oData) {
				var selectedValue = oData;
				var opt = oColumn.selected;
				var sel = document.createElement('input');
				sel.type = 'checkbox';
				var _tablename = this._tablename;
				var id = parseInt(oRecord._oData[this._campochave]);
				elCell.innerHTML = '';
				elCell.appendChild(sel);
				if((selectedValue == null)||(selectedValue == '')){
					sel.checked = false;	
				} else {
					sel.checked = true;
				}
				_hande = {	
					success: function(o){ WBS.pagina._msg('info','Altera&ccedil;&atilde;o feita!') },
					failure: function(o){  },
					timeout:1000
				}
					
				YAHOO.util.Event.addListener(sel, 'click', function(e, oSelf){
					var alter_campo = oColumn.key;
					var id1 = id;
					//alert('e');
					var value = (sel.checked)? oData:\"FALSE\";
			
					var url = \"ajax_html.php?file=".encode("ajax_altera.php")."&tabela=\"+_tablename+\"&id1=\"+id1+\"&id2=\"+WBS.pagina.idgeral+\"&field=\"+alter_campo+\"&val=\"+value;
					YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);															
				}, sel);	
			};";
				
		}
		
		//retorna o nome da função para setar o campo no data-grid;
		public function getFunction($domain = "YAHOO.widget.DataTable.format") {
			$this->func = $domain.$this->tipo;
			return $this->func;
		}
		
		public function get_fmt($tipo) {
			return $this->$tipo;
		}
		
		public function get($tipo) {
			return '<script>'.$this->$tipo.'</script>';
		}
		
		private function imagem($src,$title,$tam='14px',$js=''){
		
			$rs = "'<img src=\"images/botoes/".$src."\" title=\"".$title."\" alt=\"".$title."\" width=".$tam." ".$js." id=\"img_id_'+oRecord._sId+'\">'";
		
			return $rs;
		
		}
		
		private function evento($el='elCell',$ev='click'){
		
			$rs = "YAHOO.util.Event.addListener(".$el.", \"".$ev."\", function(e, oSelf) {";
			
			return $rs;
		
		}
		
		public function getNewFmt($tipo) {
		
			return array($this->getFunction(),$this->get_fmt($tipo));
			
		}
		
		public function gera_script($tipo, $arquivo = 'n', $params = 'default', $imagem = 'def') {

		}
		
	
	}

?>