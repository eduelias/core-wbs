<?

	class rma2 extends bd {
	
		public $debug;
		
		public $retorno;
		
		private $codbarra;
		
		private $lib_cb;
		
		private $codprod;
		
		private $codped;
		
		private $idop_sn;
		
		private $em_garantia;
		
		private $garantia;
		
		private $notafiscal;
		
		private $datanf;
		
		private $interno = false;
		
		private $nosso = true;
		
		private $codbped;
		
		function get_codprod($codbarra) {
		
			$this->codbarra = $codbarra;
			
			$this->retorno['raw'][codprod] = parent::gera_array('chkcb,codbarra.codprod,nomeprod,codcat,codcb from codbarra,produtos where codbarra.codprod = produtos.codprod and codbarra.codbarra ="'.$codbarra.'" GROUP BY codbarra.codprod ORDER BY codcb ASC');
			
			if ((count($this->retorno['raw'][codprod])>1) and ($this->retorno['raw'][codprod][0]['chkcb']!='N')) {
				$this->msg = 'CODPROD DUPLICADO : '.$this->retorno['raw'][codprod][0]['codprod'].' e '.$this->retorno['raw'][codprod][1]['codprod'].'<br>N&Atilde;O &Eacute; LIBCB';
				$res[records]='';
				$res[msg] = $this->msg;
				$res[erro] = '1';
				echo json($res);
				exit();
			}
			
			$this->debug[codprod] = parent::get_debug();
			
			$this->retorno['raw'][codcb_ent] = parent::gera_array('codcb,codbarraped from codbarra where codbarra ="'.$codbarra.'" ORDER BY codcb DESC limit 1');
			
			$this->debug[codcb_ent] = parent::get_debug();
			
			$this->codcb_ent = $this->retorno[raw][codcb_ent][0][codcb];
			
			$this->codbarraped = $this->retorno[raw][codcb_ent][0][codbarraped];
			
			$this->codcb = $this->retorno[raw][codprod][0][codcb];
			
			$this->codcat = $this->retorno[raw][codprod][0][codcat];
			
			$this->nomeprod = $this->retorno[raw][codprod][0][nomeprod];			
			
			if (count($this->retorno[raw][codprod]>>0)) {
								
				return $this->retorno[raw][codprod][0][codprod];
			
			} else {
			
				return false;
				
			}
		
		}
		
		function get_libcb($codbarra) {
		
			$this->codbarra = $codbarra;
			
			$this->codprod = $this->get_codprod($codbarra);
			
			#$this->debug[cod] = $this->codprod;
			
			if ($this->codprod=='') { 
				
				$this->nosso = false;
				
				$this->msg = 'PRODUTO N�O ENCONTRADO'; 
				
				return true;
				
			} else {
			
				$this->retorno['raw']['libcb'] = parent::gera_array('(IF(chkcb="Y",true,false)) as libcb,codcat from produtos where codprod = '.$this->codprod);
				
				$this->debug[libcb] = parent::get_debug();
				
				$this->codcat =  $this->retorno[raw][libcb][0][codcat];
				
				$this->libcb = ($this->retorno[raw][libcb][0]['libcb']=='Y')?true:false;
				
				return $this->retorno[raw][libcb][0]['libcb'];
			}
		}
		
		function get_pedido($codbarra) {
		
			$this->codbarra = $codbarra;
			
			$this->retorno[raw][idop] = parent::gera_array('idop_sn,idrma from codbarra where codbarra ="'.$this->codbarra.'" order by codcb DESC limit 1');
			
			$this->idrma = $this->retorno[raw][idop][0][idrma];
			
			$this->debug[pedido_idop] = parent::get_debug();
					
			if ($this->retorno[raw][idop][0][idop_sn]!=0) {
			
				$this->retorno[raw][idop][op_sn] = parent::gera_array('codped,codprod,sn from op_sn,codbarra where op_sn.idop_sn = '.$this->retorno[raw][idop][0][idop_sn].' and op_sn.sn = codbarra.codbarra order by codbarra.codcb DESC limit 1');
				
				$this->debug[pedido_com_idop] = parent::get_debug();
				
				$this->idop_sn = $this->retorno[raw][idop][0][idop_sn];
				
				$this->codbarra_micro = $this->retorno[raw][idop][op_sn][0][sn];
				
				$this->codprod_micro = $this->retorno[raw][idop][op_sn][0][codprod];
				
				$this->codped = $this->retorno[raw][idop][op_sn][0][codped];
				
				$result = $this->retorno[raw][idop][op_sn][0][codped];
			
			} else {
			
				$this->retorno[raw][idop][codped] = parent::gera_array('codped,codcb from codbarra where codbarra = "'.$this->codbarra.'" order by codcb DESC limit 1');				
				
				$this->debug[pedido_semidop] = parent::get_debug();
							
				$this->codped = $this->retorno[raw][idop][codped][0][codped];
				
				$this->codbarra_micro = false;
				
				$this->idop_sn = false;
				
				$result = $this->codped;
			
			}
			if ((!$this->interno)&&($result)) {
			
				$this->get_codbped($result);
				
			}
			
			return $result; //http://wbs-teste.maxxmicro.com.br/
		
		
		}
		
		function get_codbped($result) {
			
			$this->retorno[raw][codbarrapedido] = parent::gera_array('codbarra from pedido where codped = '.$result);
			
			$this->debug[barraped] = parent::get_debug();
				
			$this->codbped = $this->retorno[raw][codbarrapedido][0]['codbarra'];
				
			$this->pedlink = "<a href = '../../wbs_base/restrito.php?Action=list&codprod=&codpedselect=".$this->codbped."&desloc=0&palavrachave=&operador=OR&pagina=&codprodpesq=&retlogin=1&connectok=&pg=105&hist=0&menu_not=1&impressao=1' target='_blank'><img src='images/botoes/zoom_in.png' width='12px'></a>";								
		}
		
		function get_garantia_pedido($codbarra) {
			
			$this->codbarra = $codbarra;
			
			if (!isset($this->codped)){
				 
				$this->get_pedido($this->codbarra);
				
			}
			
			$codprod = ($this->codprod_micro)?$this->codprod_micro:$this->get_codprod($this->codbarra);
			
			$this->retorno[raw][garantia_pedido] = parent::gera_array("DATE_FORMAT(@garantia:=DATE_ADD(datanf, INTERVAL gar_um MONTH),'%d/%m/%Y') as garantia, (IF(@garantia>=NOW(),1,0)) as em_garantia, nf, DATE_FORMAT(datanf,'%d/%m/%Y') as datanf from pedidoprod, pedidonf,codbarra where pedidoprod.codped = ".$this->codped." and pedidoprod.codped = pedidonf.codped and codbarra.codped = pedidoprod.codped and codbarra.codprod = pedidoprod.codprod and pedidoprod.codprod = ".$codprod." group by codbarra.codbarra order by datanf desc");
			
			$this->debug[garantia_pedido] = parent::get_debug();
			
			$this->notafiscal = $this->retorno[raw][garantia_pedido][0][nf];
			
			$this->datanf = $this->retorno[raw][garantia_pedido][0][datanf];
			
			$this->garantia_pedido = $this->retorno[raw][garantia_pedido][0][garantia];
		
			$this->em_garantia = $this->retorno[raw][garantia_pedido][0][em_garantia];
			
			return $this->em_garantia;
		
		}
		
		function get_oc_origem() {
		
			$codbarra = $this->codbarra;
			
			$this->retorno[raw][oc_origem] = parent::gera_array('oc.codfor as codforn, oc.codoc,codbarra.codemp,tipo_fab from codbarra,oc where codbarra.codoc = oc.codoc and codbarra = "'.$this->codbarra.'" order by codcb ASC limit 1');
			$this->debug[get_oc_origem] = parent::get_debug();
			
			$this->codforn = $this->retorno[raw][oc_origem][0][codforn];
			
			$this->oc = $this->retorno[raw][oc_origem][0][codoc];
			
			$this->codemp = $this->retorno[raw][oc_origem][0][codemp];
			
			$this->tipo_fab = ($this->retorno[raw][oc_origem][0][tipo_fab]=='P')?'P':'V';
			
			return $this->oc;
		
		}
		
		function get_em_rma($codbarra) {
		
			$this->codbarra = $codbarra;
			
			$this->retorno[raw][em_rma] = parent::gera_array('idrma,idstatus from v_rma where codbarra = "'.$this->codbarra.'" AND NOT (idstatus = 24 OR idstatus = 9)');
			
			$this->debug[get_em_rma] = parent::get_debug();
			
			$this->idstatus = $this->retorno[raw][em_rma][0][idstatus];
			
			$res = ($this->retorno[raw][em_rma][0][idrma])?true:false;
			
			return $res;
			
		}
		
		function get_disponiveis() {
		
			$this->retorno[raw][disponivel_f] = parent::gera_array('IFNULL(count(codbarra),0) as qf from codbarra where codprod = "'.$this->codprod.'" and codemp = 14 and codbarraped <> 1');
			
			$this->debug[disp_f] = parent::get_debug();
			
			$this->retorno[raw][disponivel_lf] = parent::gera_array('IFNULL(count(codbarra),0) as qlf from codbarra where codprod = "'.$this->codprod.'" and codemp = 15 and codbarraped <> 1');
			
			$this->debug[disp_lf] = parent::get_debug();
		
			$this->disponiveis_f = $this->retorno[raw][disponivel_f][0][qf];
			
			$this->disponiveis_lf = $this->retorno[raw][disponivel_lf][0][qlf];
			
			return $this->disponiveis_f;
		}
		
		function getCodbarraped(){
		
			$this->retorno[raw][cbped] = parent::gera_array('codbarraped from codbarra where codbarra = '.$this->codbarra);
			
			$this->debug[cbped] = parent::get_debug();
			
			$this->msg = 'PRODUTO EM PEDIDO';
			
			return ($this->retorno[raw][cbped]==1)?false:true;
		
		}
		
		function traduz_codped($codped) {
		
			switch ($codped) {
				case 0: {
					return false;
				}break;
				case -33:{
					return false;
				}break;
				case '-55':{
					$res = parent::gera_array('idrma,codped,IF(garantia>=NOW(),1,0) as em_garantia,DATE_FORMAT(garantia,"%d/%m/%Y") as garantia from v_rma where idrma = '.$this->idrma);
					$this->msg = 'PRODUTO TROCADO EM RMA';
					$this->debug[get_ped_55] = parent::get_debug();
					$this->codped = $res[0][codped];
					$res2 = $this->retorno[raw][garantia_pedido_55] = parent::gera_array(" nf, DATE_FORMAT(datanf,'%d/%m/%Y') as datanf from pedidoprod, pedidonf where pedidoprod.codped = ".$this->codped." and pedidoprod.codped = pedidonf.codped limit 1");
					$this->debug[get_nf_55] = parent::get_debug();
					$this->notafiscal = $this->retorno[raw][garantia_pedido_55][0][nf];
					$this->datanf = $this->retorno[raw][garantia_pedido_55][0][datanf];
					$this->em_garantia = $res[0][em_garantia];
					$this->idrma_t = $res[0][idrma];
					$this->get_codbped($this->codped);				
					$this->garantia = $res[0][garantia];
					return true;
				}break;
				case -2000:{
					return false;
				}break;
				case -3333:{
					return false;
				}break;
				case -5555:{
					return false;
				}break;
				default:{
					return true;
				}break;
			
			}
		}
		
		function filtra($arry) {
		
			if ($this->traduz_codped($arry[codped])) {
				
				return $arry;
				
			} else {
				
				return 0;
			
			}
			
		}
		
		function get_retorno() {
		
			return $this->retorno;
		
		}
		
		function get_msg(){
		
			return $this->msg;
		
		}
		
		function get_debug() {
			
			return $this->debug;
		
		}
		
		function set_interno() {
		
			$this->interno = true;
		
		}
		
		function get_dados($codbarra) {
			
			$arr = array();
				
			switch (true) {				
				//TESTANDO SE � PRODUTO LIBERA CODBARRA
				case (!$this->get_libcb($codbarra)): {
				
					$this->msg = 'PRODUTO LIBCB';
				
				}break;
				case (!$this->nosso):{
				
					$this->msg = 'PRODUTO N�O ENCONTRADO';
				
				}break;
				//TESTA SE O PRODUTO EST� EM RMA
				case ($this->get_em_rma($codbarra)): {
				
					$this->retorno[raw][em_rma] = parent::gera_array('produtos.codprod,codped,DATE_FORMAT(garantia,"%d/%m/%Y") as garantia,flag_garantia as em_garantia, idrma, 0 as quant_f, 0 as quant_lf, produtos.nomeprod, "'.$this->codbarra.'" as codbarra, codcat from v_rma,produtos where v_rma.codprod = produtos.codprod and (v_rma.codbarra = "'.$this->codbarra.'" or v_rma.codbarra_tcliente = "'.$this->codbarra.'")');
					
					$this->debug[rma_retorno] = parent::get_debug();
					
					$arr = $this->retorno[raw][em_rma][0];
					
					$this->msg = 'PRODUTO EM RMA';
				
				}break;
				//TESTA SE O PRODUTO EST� EM ESTOQUE E N�O VEM DO MODULO INTERNO
				case ((!$this->traduz_codped($this->get_pedido($this->codbarra)))&&(!$this->interno)):{
				
					$this->msg = 'PRODUTO EM ESTOQUE';
				
				}break;
				case (($this->codcat==72)or($this->codcat==73)):{
				
					$this->msg = 'N&Atilde;O ACEITAMOS MICRO PARA RMA';
				
				}break;
				//CASE PARA PRODUTOS INTERNOS SEM PEDIDO
				case ((!$this->traduz_codped($this->pedido))&&($this->interno)&&(!$this->codbarraped)):{
				
					$this->msg = 'RMA INTERNO';
					//CAMPOS QUE S�O MOSTRADOS NA TABELA
					$arr[codprod] = $this->codprod;
					$arr[nomeprod] = $this->nomeprod;
					$arr[codoc] = $this->get_oc_origem();
					$arr[quant_f] = $this->get_disponiveis();
					$arr[quant_lf] = $this->disponiveis_lf;
					$arr[codbarra] = $this->codbarra;
					$arr[codemp] = $this->codemp;
					$arr[codforn] = $this->codforn;
					
					//CAMPOS HIDDEN
					$arr[codcb] = $this->codcb;
					$arr[codcb_ent] = $this->codcb_ent;
					$arr[codcat] = $this->codcat;
					
				}break;
				//CASE PARA PRODUTOS COM PEDIDO N�O INTERNOS
				case (($this->traduz_codped($this->codped))&&(!$this->interno)):
					
					//CALCULO DOS PARAMETROS DO PEDIDO
					#$this->get_pedido($this->codbarra);
					
					//SETA MENSAGEM
					$this->msg = (isset($this->msg))?$this->msg:"RMA NORMAL";
					
					//CAMPOS QUE S�O MOSTRADOS NA TABELA
					$arr[codprod] = $this->codprod;
					$arr[codped] = $this->codped;
					$arr[nomeprod] = $this->nomeprod;
					$arr[codbped] = $this->codbped;
					$arr[codoc] = $this->get_oc_origem();
					$arr[quant_f] = $this->get_disponiveis();
					$arr[quant_lf] = $this->disponiveis_lf;
					$arr[codbarra] = $this->codbarra;
					$arr[codemp] = $this->codemp;
					$arr[codforn] = $this->codforn;
					$arr[em_garantia] = (isset($this->em_garantia))?$this->em_garantia:$this->get_garantia_pedido($this->codbarra);
					$arr[nf] = $this->notafiscal;
					$arr[idrma_t] = $this->idrma_t;
					$arr[garantia] = (isset($this->garantia))?$this->garantia:$this->garantia_pedido;
					//CAMPOS HIDDEN
					$arr[codcb] = $this->codcb;
					$arr[codcb_ent] = $this->codcb_ent;
					$arr[codbarraped] = $this->codbped;				
					$arr[datanf] = $this->datanf;
					$arr[codcat] = $this->codcat;
				
				break;
				//CASE PARA PRODUTOS VINDOS DO MOD INTERNO MAS QUE EST�O EM PEDIDO (ERRO)
				case (($this->traduz_codped($this->pedido))	&&($this->interno)):{
					
					$this->msg = "ERRO: PRODUTO EM PEDIDO, FA�A PELO RMA NORMAL";
				
				}break;
				default: {
					$this->msg = 'PRODUTO EM PEDIDO';
				}break;			
			}			
			return $arr;
		}		
	
	}

?>