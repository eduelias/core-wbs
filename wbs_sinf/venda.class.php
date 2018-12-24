<?php
	class venda {
		
		private $EMPRESA_MAXXMICRO = '001';
		
		private $EMPRESA_NETEXPRESS = '002';
		
		public $nseqvendas;
		
		public $codped;	
		
		public $res_pedido;
		
		public $res_pedidoprod;
		
		public $res_cliente;
		
		private $sinf_data;
		
		public $codcliente;
		
		public $produtos;
		
		private $sinf;
		
		private $wbs;
		
		private $fator = false;
		
		private $descontos;
		
		private $vtotal = 0;
		
		private $desc_total = 0;
		
		private $orcamento = 'T';
		
		private $calc;
		
		private $clizeroaliqicms = 'F';
		
		private $prod_men_quant = false;
		
		private $soma_t = 0;
		
		private $soma_a = 0;
		
		private $empresa = '001';
				
		public function vendas($ie) {
			
			$this->wbs = new wbs;
			
			//echo $this->orcamento;
			$this->orcamento = ($ie == 'T')?'F':'T';
			
			//echo $this->orcamento;
			
			//COMENTAR ESSA LINHA AO MUDAR EMPRESA
			$this->sinf = new sinf;			
			
		}
		
		public function setEmpresa($emp) 
		{
			$this->empresa = ($emp == '15')?$this->EMPRESA_MAXXMICRO:$this->EMPRESA_NETEXPRESS;
		}
				
		public function arred($valor) {
			//$float = round($valor*100)/100;
			//return $float;	
			return $valor;
		}
		
		//FUNÇÃO MASTER QUE INSTANCIA A CLASSE
		public function existe_produto($codped) {
			
			$this->codped = $codped;
			
			//CASO NÃO EXISTA UM FATOR, DEFINIR UM;		
			if (!$this->fator) {
				//DESDE Q VPP E VT SEJAM OS VALORES CORRETOS, FAZ A MÁGICA
				$w_res = $this->wbs->query('SELECT vpp / vt as fator FROM `pedido` WHERE codped = '.$this->codped); 			
				$aux = $this->wbs->fetch($w_res);
				$this->fator = $aux['fator'];
			} 
			
			//pegando dados da venda e preco total por unidade
			$res = $this->wbs->query('select nseqvendas,codprod,qtde,(ppu * '.$this->fator.') as preco from pedidoprod where codped = '.$codped);	
			
			while ($prod = mysql_fetch_array($res)) {
				
				//esta parte é feita para corrigir os preços dos produtos, com problemas no arredondamento.
				$this->prod_men_quant = ($this->prod_men_quant)?(($this->prod_men_quant < $prod['qtde'])?(str_pad($prod['codprod'],14,'0',STR_PAD_LEFT)):$this->prod_men_quant):str_pad($prod['codprod'],14,'0',STR_PAD_LEFT);
				
				//acumulando o preço sem arredondar
				$this->soma_t += $prod['preco'];
	
				//acumulando o preço arredondado			
				$this->soma_a += round(floor($prod['preco']*100)/100,2);
				
				//if ($prod['nseqvendas'] != null and $prod['nseqvendas'] != '') die (print('<div class="error">DADOS JÁ EXPORTADOS: '.$prod['nseqvendas'].'</div>'));
				
				$sql = 'select (select RESTOQUEATUAL from CE_CONESTOQUE(\''.$this->empresa.'\',null,null,\''.date('m/d/Y').'\',\''.date('m/d/Y').'\',\'(CODPRODUTO=\'\''.str_pad($prod['codprod'],14,'0',STR_PAD_LEFT).'\'\')\')) as ESTOQUE, CODPRODUTO,CODORIMERC,CODTRIBICMS,SUBSTITUTOTRIBUTARIO,ALIQIPI,CODNCM,CODORIMERCSIMPREM,CODTRIBICMSSIMPREM,CODUNDMEDIDA from PRODUTOS where CODPRODUTO = \''.str_pad($prod['codprod'],14,'0',STR_PAD_LEFT).'\' AND NEMPRESA = \''.$this->empresa.'\''/**/;
				
				/*$sql = "select (select RESTOQUEATUAL from CE_CONESTOQUE(001,null, null, '".date('m/d/Y')."','".date('m/d/Y')."',''(CODPRODUTO='".str_pad($prod['codprod'],14,'0',STR_PAD_LEFT)."')'')) as ESTOQUE, CODPRODUTO,CODTRIBICMS,SUBSTITUTOTRIBUTARIO,ALIQIPI,CODNCM,CODORIMERCSIMPREM,CODTRIBICMSSIMPREM,CODUNDMEDIDA from PRODUTOS where CODPRODUTO = '".str_pad($prod['codprod'],14,'0',STR_PAD_LEFT)."'";*/
				
				//echo $sql.'<br>';
				
				$res2 = $this->sinf->query($sql);
				
				if ($res2 === null) die (print('<div class="warning">PRODUTO NÃO ESTA CADASTRADO: '.$prod['codprod'].'</div>'));
				
				$ax = $this->sinf->fetch($res2);
				
				if ($ax['ESTOQUE'] < $prod['qtde']) die(print('<div class="warning">QUANTIDADE INSUFICIENTE DO PRODUTO: '.$prod['codprod'].'</div>'));
				
				$this->produtos[$ax['CODPRODUTO']]['ALIQIPI'] = $ax['ALIQIPI'];			
				$this->produtos[$ax['CODPRODUTO']]['CODORIMERCSIMPREM'] = $ax['CODORIMERCSIMPREM'];
				$this->produtos[$ax['CODPRODUTO']]['CODTRIBICMSSIMPREM'] = $ax['CODTRIBICMSSIMPREM'];
				$this->produtos[$ax['CODPRODUTO']]['CODUNDMEDIDA'] = $ax['CODUNDMEDIDA'];				
				$this->produtos[$ax['CODPRODUTO']]['SUBSTITUTOTRIBUTARIO'] = $ax['SUBSTITUTOTRIBUTARIO'];
				$this->produtos[$ax['CODPRODUTO']]['CODORIMERC'] = $ax['CODORIMERC'];
				$this->produtos[$ax['CODPRODUTO']]['CODTRIBICMS'] = $ax['CODTRIBICMS'];	
				//echo  '<pre>';
				//print_r($this->produtos);
				//echo  '</pre>';
							
			}
			
			$this->diferenca = $this->soma_t - $this->soma_a;
		
			//echo $this->diferenca;
		
			return true;
		}
		
		//FUNÇÃO QUE EXECUTA A VENDA		<--- EM DESENVOLVIMENTO
		public function vende($codped) {
			
			$this->get_dados_venda($codped);
			
			$cliente = $this->get_dados_cliente($this->codcliente);
			
		}
		
		//FUNÇÃO QUE BUSCA OS DADOS DA VENDA E SEUS PRODUTOS
		public function get_dados_venda($codped) {
			
			//PEGA O CODIGO DO PEDIDO QUE VAMOS PROCURAR	
			$this->codped = $codped;
					
			//BUSCA OS DADOS NO BD DO WBS
			$sql = 'Select caixa,codcliente,codvend,codped,vpp,vpv,vt,codemp FROM pedido WHERE codped = '.$codped; //.' and caixa = "NO"';

			$this->res_pedido = $this->wbs->query($sql);			
			$ax = $this->wbs->fetch($this->res_pedido);
			
			//INSTANCIANDO AQUI, POIS PRECISO DA EMPRESA DO PEDIDO - NÃO PRECISAMOS MAIS
			//$this->sinf = new sinf($ax['codemp']);
			
			//SALVA O CODCLIENTE PARA UMA PROCURA FUTURA
			$this->codcliente = $ax['codcliente'];
			
			//SALVA O VPP EM UMA VARIÁVEL LOCAL
			$this->preco_final = $ax['vpp'];		
			
			//PEGA TODOS OS PRODUTOS PROVENIENTES DO PEDIDO EM QUESTÃO
			$sql = 'Select codpped,codprod,ppu,qtde FROM pedidoprod WHERE codped = '.$codped;
			$this->res_pedidoprod = $this->wbs->query($sql);
				
		}
		
		//FUNÇAO QUE BUSCA OS DADOS DO CLIENTE NO WBS
		public function get_dados_cliente_wbs() {
				$sql = 'SELECT codcliente,nome,IF(cpf="",cnpj,cpf) as cnpj, ie, endereco, numero, complemento, bairro, cidade, cep, estado, dddtel1, tel1, datacad, email from clientenovo where codcliente ='.$this->codcliente;
				$this->res_cliente = $this->wbs->query($sql);
				
				//$this->wbs->show($sql);
		}
		
		//FUNÇÃO PARA ACHAR O CODIGO DA CIDADE NO SINF A PARTIR DO NOME DA CIDADE E UF DO WBS
		public function get_cod_cidade($cidade,$uf){
			$sql = 'SELECT CODCIDADE FROM CIDADES WHERE CIDADE = \''.strtoupper($cidade).'\' AND UF = \''.strtoupper($uf).'\'';	
			$fet = $this->sinf->fetch($this->sinf->query($sql));
			
			return $fet['CODCIDADE'];
		}
		
		//FUNÇÃO PARA DEFINIR O TIPO DE INSCRIAÇÃO ESTADUAL DO WBS -> SINF
		public function get_insc_est($ie,$cnpj){
			switch (true) {
				case (count($cnpj)== 11):{
					//$this->orcamento = 'T';
					return null;
				}break;
				case ((count($cnpj) == 15) && ($ie != null)):{
					//$this->orcamento = 'F';
					return str_replace('.','',$ie);
				}break;
				default: {
					//$this->orcamento = 'T';
					return 'ISENTO';
				}
			}
		}
		
		//FUNÇÃO QUE COMPARA CLIENTE SINF X WBS, MANTEM, ATUALIZA OU CRIA NO SINF.
		public function compara_cliente_sinf($codped) {

			//PEGA DADOS SOBRE A VENDA; (DADOS DO PEDIDO WBS)
			$this->get_dados_venda($codped);
			
			//PEGA DADOS DO CLIENTE			
			$this->get_dados_cliente_wbs();
			$fet = $this->wbs->fetch($this->res_cliente);

			
			if ($fet['codcliente']==228) { 
				
				$this->codcliente = null;
				
				$this->orcamento = 'T';
				
			} else {
				//ARRUMA O CNPJ, SEM PONTOS, TRACOS OU BARRAS
				$cnpj = $fet['cnpj'];
				$cnpj = str_replace('.','',$cnpj);
				$cnpj = str_replace('-','',$cnpj);
				$cnpj = str_replace('/','',$cnpj);
	
				//CASO O CNPJ ESTEJA CERTO, PESQUISA NO SINF
				if ($cnpj) { 
					//RETORNA DADOS DO CLIENTE CASO ELE EXISTA NO SINF
					$sql = 'SELECT RSOCIAL,IE,ENDERECO,NUMERO,COMPLEMENTO,TEL1,NFORCLI,ALIQZEROICMSSAIDAS FROM FORCLI WHERE CNPJ = \''.$cnpj.'\' AND NEMPRESA = \''.$this->empresa.'\'';
	
					$fetch = $this->sinf->fetch($this->sinf->query($sql));			
					
					$this->clizeroaliqicms = $fetch['ALIQZEROICMSSAIDAS'];
					
					//CASO O CLIENTE EXISTA ...
					if (is_array($fetch)) {
						//FUNÇÃO QUE ATUALIZA OS DADOS DO CLIENTE EM AMBAS AS BASES (FETCH = SINF, FET = WBS);	
						if ($this->atualiza_cliente($fetch ,$fet)) {
							//CASO ATUALIZADO CORRETAMENTE, RETORNA TRUE
							return true;
								
						} else {
							//CASO ERRO, TRATAR
							//echo  'erro no SINF';
							return false;
						
						}
							
					} 
					//CASO O CLIENTE NÃO EXISTA, INSERIR
					else {
						
						$sql = 'SELECT MAX(NFORCLI) FROM FORCLI';
						$fetch2 = $this->sinf->fetch($this->sinf->query($sql));		
						
						$nforcli = $fetch2['MAX'];
						
						$cliente['NEMPRESA'] = $this->empresa;
						$cliente['NFORCLI'] = $nforcli + 1; //(int) $fet['codcliente'] + 10000;
						$cliente['TIPO'] = '2';
						$cliente['IE'] = $this->get_insc_est($fet['ie'],$cnpj);
						$cliente['RSOCIAL']=$fet['nome'];
						$cliente['ENDERECO']=$fet['endereco'];
						$cliente['NUMERO']=$fet['numero'];
						$cliente['COMPLEMENTO']=$fet['complemento'];
						$cliente['BAIRRO'] = $fet['bairro'];
						$cliente['CEP'] = $fet['cep'];
						$cliente['TEL1'] = $fet['dddtel1'].$fet['tel1'];
						$cliente['CNPJ'] = $cnpj;
						$cliente['F_DTCADASTRO'] = date('d.m.Y');//$fet['datacad']);
						$cliente['OPTSIMPLES'] = 'F';
						$cliente['CODCIDADE'] = $this->get_cod_cidade($fet['cidade'],$fet['estado']);
						$cliente['UTILIZARPRODFORNEC'] = 'F';
						$cliente['QTDPADCOMPRA'] = 0;
						$cliente['QTDPADVENDA'] = 0;
						$cliente['GERACREDICMS'] = 'F';
						$cliente['NDIASPARCELA'] = 0;
						$cliente['TRAVARFORCLI'] = 'F';
						$cliente['RETEMISS'] = 'F';
						$cliente['PERCCOMIS'] = 0;
						$cliente['CALCIPIPROD'] = 'T';
						$cliente['ADCIPIBASEICMS'] = 'F';
						$cliente['ALIQZEROICMSSAIDAS'] = 'F';
						$cliente['NAOEXIBIRINFOFINANCEIRA'] = 'F';
						
						//print_r($cliente);
						$this->sinf->insere_cliente($cliente);
						
						$fet = $this->sinf->fetch($this->sinf->query('select * from FORCLI where cnpj ='.$cnpj));
						$this->codcliente = $fet['NFORCLI'];
						//$this->orcamento = ($fetch['IE'])?'T':'F'					
						
						return true;
					}
				}
			}
		}
		
		public function atualiza_cliente($sinf, $wbs){
			$this->codcliente = $sinf['NFORCLI'];
			return true; //ARRUMAR - ATUALIZAÇÃO DE CLIETNES
		}
		
		public function get_cond_rec_padrao($codped){
			return '9'; //	ARRUMAR BUSCA DE CONDIÇÃO DE PAGAMENTO	
		}
		
		public function get_geracredicms($codped){
			return 'F'; // ARRUMAR BUSCA SE GERA CREDITO DE ICMS	
		}
		
		public function insere_venda(){
			//CAPTURA A DATA NO FORMATO CERTO DO SINF
			$this->data = date('d.m.Y');
			
			$NFORCLI = ($this->codcliente != null)?'NFORCLI,':'';
			
			//SQL DE ENTRADA NA TABELA VENDAS
			$this->sinf_query = "INSERT INTO VENDAS (
								NROORCDAV,
								NSEQVENDAS,
								NEMPRESA,
								REFERENCIA,
								DATA,
								NROCONTROLE,
								".$NFORCLI."
								F_ORCAMENTO,
								SISTEMAPDV,
								TIPODESCNFPROD,
								GERACREDICMS,
								ID_CRECEBERCONDRECPADRAO,
								VALMANUAL,
								CODORC,
								CODVENDA,
								DTALTERACAO,
								HSALTERACAO,
								DTCADASTRO
								) VALUES (
								(SELECT RREFERENCIA FROM ZERO_FILL_7(GEN_ID(G_NROORCDAV,1))),
								GEN_ID(G_VENDAS,1),
								'".$this->empresa."',
								".date('Ym').",
								'".$this->data."',
								'".$this->codped."',
								".(($this->codcliente != null)?"'".$this->codcliente."',":'')."
								'".$this->orcamento."',
								'F',		
								'1',
								'".$this->get_geracredicms($codped)."',
								".$this->get_cond_rec_padrao($codped).",
								'F',
								GEN_ID(G_VENDAS_CODORC,1), 
								GEN_ID(G_VENDAS_CODVENDA,1),
								'".$this->data."',
								'".date('H:i:s')."',
								'".$this->data."');";
			
			//EXECUTA SQL NA TABELA VENDAS
			//echo $this->sinf_query.'<br>';
			$this->sinf->query($this->sinf_query);
			
			//RETIRADO DAQUI PRA MUDAR A POSIÇÃO DO DESCONTO - DEVE SER REINSERIDO POR DEFINIÇÕES DE RMA NA NOTA
			//$this->insere_nfsaidas();
			
			return true;
		} // end function insere
		
		public function insere_nfsaidas(){
			
			$sql = "INSERT INTO NFSAIDAS (
				NEMPRESA,
				REFERENCIA,
				DATA,
				NSEQVENDAS,
				CODFISCAL,
				NF,
				SITUACAONOTA,
				NSEQESPECIES,
				SERIE,
				SUBSERIE,
				TIPODOCUMENTO,
				VRCONTABIL,
				VRDESCONTOS,
				VRBASEICMS,
				VRICMS,
				VRBASESTICMS,
				VRSTICMS,
				VRBASEIPI,
				VRIPI,
				VRFRETE,
				F_VOLPESOBRUTO,
				F_VOLPESOLIQUIDO,
				OBS,
				BASEREPICMS,
				VRREPICMS,
				BASEREDICMS,
				VRREDICMS,
				BASECREDICMS,
				VRCREDICMS,
				OBSREDUCAOICMS,
				OBSREPASSEICMS,
				OBSCREDITOICMS,
				OBSST,
				VRIPIISENTO,
				VRIPIOUTRAS,
				VRICMSISENTO,
				VRICMSOUTRAS,
				OBSISENTOICMS,
				OBSISENTOIPI
			) VALUES (
				'".$this->empresa."',
				".date('Ym').",
				".$this->data."',,
				".$this->nseqvendas.",
				".$this->get_cfop().",
				'N.IMP.',
				'0',
				26,
				".$serie.",
				'',
				1,
				".$this->vtotal.",
				".$this->desc_total.",
				".$this->vtotal.",
				".($this->vtotal).",
				".$this->vrbasesticms.",
				".$this->calcule("VRSTICMS").",
				".$this->calcule("VRBASEIPI").",
				".$this->calcule("VRIPI").",
				0,
				1,
				1,
				'OBS',
				".$this->calcule("BASEREPICMS").",
				".$this->calcule("VRREPICMS").",
				".$this->calcule("BASEREDICMS").",
				".$this->calcule("VRREDICMS").",
				".$this->calcule("BASECREDICMS").",
				".$this->calcule("VRCREDICMS").",
				'OBSREDUCAOICMS',
				'OBSREPASSEICMS',
				'OBSCREDITOICMS',
				'OBSST',
				".$this->calcule("VRIPIISENTO").",
				".$this->calcule("VRIPIOUTRAS").",
				".$this->calcule("VRICMSISENTO").",
				".$this->calcule("VRICMSOUTRAS").",
				'OBSISENTOICMS',
				'OBSISENTOIPI'
			)";
			
		} //ENDFUNCTION INSERE_NFSAIDAS
		
		
		//CAPTURA O NSEQVENDAS DO SINF PELO CODPED DO WBS
		public function get_nseqvendas($codped){
			
			$sql = 'Select MAX(NSEQVENDAS) as NSEQVENDAS from VENDAS where NROCONTROLE = '.$codped;
			
			$res = $this->sinf->query($sql);  
			
			$aux = $this->sinf->fetch($res);
		
			$this->nseqvendas = $aux['NSEQVENDAS'];
		
			return $aux['NSEQVENDAS'];	
		}
		
		//MARCA O PEDIDO NO WBS COM O NSEQVENDAS DO SINF
		public function atualiza_pedido($codped){
			//PEGA O NSEQVENDAS DO CODPED
			$nseqvendas = $this->get_nseqvendas($codped);
			
			//CASO ELE EXITA, MARCAR O PEDIDO
			if(is_int($nseqvendas)) {
						
				$sql = 'update `pedido` set `nseqvendas` = "'.$nseqvendas.'" where codped = '.$codped;
    			$this->wbs->query($sql);
				
			} //ENDIF
				
		}
		
		//FUNÇÃO QUE ATUALIZA O PRODUTO NO WBS COM O NSEQVENDAS DO SINF
		public function produto_wbs_nseq($codped,$codprod,$nseqvendas){
					
			$sql = 'update `pedidoprod` set `nseqvendas` = '.$nseqvendas.' where codped = '.$codped.' and codprod = '.$codprod;
			$this->wbs->query($sql);

		}
		
		public function compara_produto($produto){
			//CASO NÃO EXISTA UM FATOR, DEFINIR UM;		
			if (!$this->fator) {
				//DESDE Q VPP E VT SEJAM OS VALORES CORRETOS, FAZ A MÁGICA
				$w_res = $this->wbs->query('SELECT vpp / vt as fator FROM `pedido` WHERE codped = '.$this->codped); 			
				$aux = $this->wbs->fetch($w_res);
				$this->fator = $aux['fator'];
			} 
			
			//CONVERTE CODPROD PRO VALOR COM ZEROS DO SINF
			$codprod = str_pad($produto['codprod'],14,"0",STR_PAD_LEFT);
			
			//CAPTURAR O PREÇO DO PRODUTO NO SINF
			$s_res = $this->sinf->query('SELECT VRPRECOVENDA from PRODUTOS where CODPRODUTO = \''.$codprod.'\' AND NEMPRESA = \''.$this->empresa.'\'');
			$prod_sinf = $this->sinf->fetch($s_res);
			$preco_sinf = $prod_sinf['VRPRECOVENDA'];
			
			//CALCULA O PREÇO REAL PELO WBS
			$preco_wbs = $produto['ppu']*$this->fator;
			
			//CASO O PREÇO DO WBS SEJA MENOR QUE O DO SINF, CALCULAR DESCONTO
			if ($preco_wbs < $preco_sinf) {
				
				//PREPARA O RETORNO DO PERCENTUAL DO DESCONTO
				$this->descontos[$codprod]['perdesc'] = 100*$this->arred(($preco_sinf - $preco_wbs) / $preco_sinf); 
				
				//PREPARA O RETORNO DO PREÇO CHEIO
				$this->descontos[$codprod]['vrtabela'] = $this->arred($preco_sinf);
				
				//PREPARA O VALOR DO PRODUTO COM DESCONTO PRO RETORNO
				$this->descontos[$codprod]['pvenda'] = $this->arred($preco_wbs);
				
				//ACUMULANDO O T
				$this->descontos['total']  += $this->arred($preco_sinf - $preco_wbs);
				
			//CASO O PREÇO DO WBS SEJA MAIOR, ALTERAR A TABELA DO SINF
			} else if ($preco_wbs > $preco_sinf) {
				//PREPARA O SQL PARA INJETAR O NOVO PREÇO
				$sql = 'UPDATE PRODUTOS SET VRPRECOVENDA = '.$this->arred($preco_wbs).' WHERE CODPRODUTO = \''.$codprod.'\' AND NEMPRESA = \''.$this->empresa.'\'';
				//INJETA O NOVO PREÇO
				$this->sinf->query($sql);

				//PREPARA O RETORNO DO PREÇO CHEIO
				$this->descontos[$codprod]['vrtabela'] = $preco_wbs;
				//PREPARA O RETORNO DO PERCENTUAL DE DESCONTO
				$this->descontos[$codprod]['perdesc'] = '0';
				//PREPARA O RETORNO DO VALOR DE VENDA
				$this->descontos[$codprod]['pvenda'] = $preco_wbs;
			//CASO OS DOIS PREÇOS SEJAM IGUAIS, SÓ VOLTAR OS VALORES
			} else {
				//PREPARA O RETORNO DO PREÇO CHEIO
				$this->descontos[$codprod]['vrtabela'] = $preco_wbs;
				//RETORNA O PERCENTUAL DE DESCONTO
				$this->descontos[$codprod]['perdesc'] = '0';
				//RETORNA O PREÇO DE VENDA
				$this->descontos[$codprod]['pvenda'] = $preco_wbs;
			}
				 
			if ($codprod == $this->prod_men_quant) $this->descontos[$this->prod_men_quant]['pvenda'] += $this->diferença;
			//print_r($this->descontos);
			return true;
			
		}
		
		public function insere_produtos(){
			
			//VAMOS INSTANCIAR OS CALCULOS PARA ESSE PRODUTO
			$this->calc = new calcula($this->codcliente, $this->produtos, $this->empresa);
			
			//VAMOS INSTANCIAR OS CALCULOS PARA ESSE PRODUTO - mudado para a chamada da classe
			//$calc = new calcula($this->codped);
			$calc = $this->calc;
			
			//CONTADOR PARA NSEQVENDASPRODUTOS
			$i = 1;
			
			//PERCORRENDO CADA PRODUTO DO PEDIDO
			while ($pprod = mysql_fetch_assoc($this->res_pedidoprod)) {
				
				//ARRUMA O PREÇO DO PRODUTO QUE SERÁ INSERIDO
				if (!$this->compara_produto($pprod)) die ('ERRO AO ARRUMAR O PREÇO DO PRODUTO');
				
				//TROCA A VIRGULA NO PREÇO POR PONTO
				$ppu = str_replace(',','.',$pprod['ppu']); 
				//TRANSFORMA O CODPROD DO WBS PRO FORMATO DO SINF
				$codprod = str_pad($pprod['codprod'], 14,'0',STR_PAD_LEFT);
				
				$calc->set_produto($codprod, $this->descontos[$codprod]['pvenda'], $pprod['qtde']);
				
				//SQL PARA INSERIR O 'PRODUTO DA VEZ'
				$sql2 = "INSERT INTO vendasprodutos (
						NEMPRESA,
						REFERENCIA,
						DATA,
						NSEQVENDAS,
						NSEQVENDASPRODUTOS,
						CODPRODUTO,
						QUANTIDADE,
						CTRLESTOQUE,
						ALIQICMS,
						VRDESCONTO,
						ALIQIPI,
						VRBASEIPI,
						VRBASEST,
						VRIPI,
						VRST,
						VRBASEICMS,
						VRUNITARIO,
						VRICMS,
						COMISSAO,
						BASEREPICMS,
						PERREPICMS,
						VRREPICMS,
						BASEREDICMS,
						PERREDICMS,
						VRREDICMS,
						PERMARGAGREG,
						BASECREDICMS,
						PERCREDICMS,
						VRCREDICMS,
						ISENTOICMS,
						ISENTOIPI,
						PERDESCONTO,
						VRTOTAL,
						VRUNITCOMIS,
						SUBSTITUTOTRIBUTARIO,
						VRPRECOMAXIMO,
						VRACRESCIMO,
						PERACRESCIMO,
						ICMSNTRIB,
						OBS,
						CODORIMERC,
						CODTRIBICMS,
						CODORIMERCSIMPREM,
						CODTRIBICMSSIMPREM,
						FORCLIALIQZEROICMS,
						F_ORCAMENTO,
						PISCST,
						COFINSCST
					) VALUES (
						'".$this->empresa."',
						".date('Ym').",
						'".date('d.m.Y')."', 
						".$this->get_nseqvendas($this->codped).",
						".$i.",
						'".$codprod."',
						".$pprod['qtde'].",
						'T',
						".$calc->calcule("ALIQICMS").",
						".$pprod['qtde']*($this->descontos[$codprod]['vrtabela'] - $this->descontos[$codprod]['pvenda']).",
						".$calc->calcule("ALIQIPI").",
						".$calc->calcule("VRBASEIPI").",
						".$calc->calcule("VRBASEST").",
						".$calc->calcule("VRIPI").",
						".$calc->calcule("VRST").",
						".$calc->calcule("VRBASEICMS").",
						".$this->arred($this->descontos[$codprod]['vrtabela']).",
						".$calc->calcule("VRICMS").",
						0,
						".$calc->calcule("BASEREPICMS").",
						".$calc->calcule("PERREPICMS").",
						".$calc->calcule("VRREPICMS").",
						".$calc->calcule("BASEREDICMS").",
						".$calc->calcule("PERREDICMS").",
						".$calc->calcule("VRREDICMS").",
						0,
						".$calc->calcule("BASECREDICMS").",
						".$calc->calcule("PERCREDICMS").",
						".$calc->calcule("VRCREDICMS").",
						'F',
						'F',
						".($this->descontos[$codprod]['perdesc']).",
						".$this->arred(($pprod['qtde'] * $this->descontos[$codprod]['vrtabela'])).",
						0,
						'".$this->produtos[$codprod]['SUBSTITUTOTRIBUTARIO']."',
						".$this->arred(($pprod['qtde'] * $this->descontos[$codprod]['vrtabela'])).",
						".'0'.",
						".'0'.",
						'T',
						' ',
						'0',
						'".$this->produtos[$codprod]['CODTRIBICMS']."',
						'0',
						'50',
						'F',
						'".$this->orcamento."',
						'".(($this->orcamento == 'T')?'08':'01')."',
						'".(($this->orcamento == 'T')?'08':'01')."'
					);";
				//print_r($this->produto[$codprod]);
				//CALCULA O VR TOTAL DA NOTA, ATE AGORA
				$this->vtotal += $this->descontos['vrtotal']*$pprod['qtde'];
				
				$this->desc_total += $this->descontos[$codprod]['vrtotal'] - $this->descontos[$codprod]['pvenda'];
				
				//DEBUG
				//echo  $sql2.'<br><br>';
				
				//INSERE O PRODUTO
				$this->sinf->query($sql2);
				
				//MARCA O PRODUTO NO WBS COMO INSERIDO
				$this->produto_wbs_nseq($this->codped,$codprod,$this->nseqvendas);
				
				//INCREMENTA O CONTADOR
				$i++;
			}	
			
			//SALVANDO NO NFSAIDAS OS DADOS DA NF
			//$this->insere_nfsaidas();
			
			return true;
			
		}
	}
?>