<?


	class rma extends bd {
	
		#LIVE => VARIÁVEL UTILIZADA PARA PESQUISA E MODIFICADA A CADA NOTA/PEDIDO PROCURADO NO MESMO OBJETO;
		
		#STATIC => VARIÁVEL (ARRAY) QUE MANTEM DADOS DE PESQUISA ANTERIOR USANDO PEDIDO COMO CHAVE
				
		private $codped; //INT COM O CODIGO DO PEDIDO 'EM USO';
		
		private $idop; //IDOP  'LIVE'
		
		private $nf; #NUMERO DA NOTA FISCAL 'LIVE'
		
		private $data_nf; #DATA DA NOTA FISCAL 'LIVE'
		
		private $modo_nf; #TIPO DE DOCUMENTO FISCAL 'LIVE'
		
		private $idops; #NUERO DAS ORDENS DE PRODUÇÃO DO PEDIDO 'LIVE'
		
		public $prods; #ARRAY DE PRODUTOS PESQUISADOS POR PEDIDO 'STATIC'
		
		public $laudos;
		
		public function get_laudos(){
		
			$res = parent::gera_array('*','v_rma_laudos','true');
			
			#$this->debug['get_laudos'] = parent::get_debug();
			
			$this->laudos;
			
			return $res;
		
		}
		
		public function get_oknf($iNf){
		
			$this->nf = $iNf;
			
			$this->data_nf = $dData_nf;
			
			$this->modo_nf = $sModo_nf;
			
			$data = 'AND NOT datanf = 0000-00-00';
			
			$result = parent::gera_array('DATE_FORMAT(datanf,\'%d/%m/%Y\') as data, pedidonf.codped as codped, datanf, modo_nf','pedidonf','nf LIKE "%'.$this->nf.'" '.$data);
			#$this->debug['get_oknf'] = parent::get_debug();
			
			return $result;
				
		}
		//RETORNA CODPED, ATRAVEZ DO NUMERO DA NOTA-FISCAL, DATA DA NOTA FISCAL E MODO DO DOCUMENTO FISCAL
		public function get_codped($iNf, $dData_nf = 'N', $sModo_nf = 'NF'){
		
			$this->nf = $iNf;
			
			$this->data_nf = $dData_nf;
			
			$this->modo_nf = $sModo_nf;
						
			$result = parent::gera_array('pedidonf.codped as codped, datanf, modo_nf','pedidonf','nf LIKE "%'.$this->nf.'%" AND datanf = "'.$this->data_nf.'"');
			
			$this->codped = $result[0]['codped'];
			
			#$this->debug['sql_codped'] = parent::get_debug();
			
			return $this->codped;
		
		}
		
		
		#RETORNA UM ARRAY COM OS DADOS DO PEDIDO PELO CÓDIGO DO PEDIDO
		public function get_pedata($iCodped = 'N'){
		
			if ($iCodped != 'N') {
				$this->codped = $iCodped;
			}
			
			$result = parent::gera_array('codbarra, codped,(select nome from clientenovo where clientenovo.codcliente = pedido.codcliente) as nome_cli,(select cpf from clientenovo where clientenovo.codcliente = pedido.codcliente) as cpf','pedido','codped = '.$this->codped);
			
			#$this->debug['get_pedata'] = parent::get_debug();
			
			return $result[0];
		
		}
		
		//RETORNA UM ARRAY DE IDOPS ATRAVES DO CODPED ==> MÉTODO A SER MODIFICADO: PEGAR IDOPS DE OUTRA FORMA (5/12);
		public function get_idops(){
			 
			$this->idops = parent::gera_array("codbarra.codprod as coprod,op_sn.idop_sn as idopsn,op_sn.idop,codbarra.codcb as ccb from codbarra,op_sn where op_sn.sn = codbarra.codbarra and codbarra.codped = ".$this->codped." and not codbarra.idop_sn in (select codbarra.idop_sn from v_rma,codbarra where v_rma.codcb_ent = ccb and  v_rma.codprod = coprod and codbarra.idop_sn <> 0)");
			
			$this->debug['get_idops'] = parent::get_debug();
			 
			return $this->idops;
		
		}
		
		public function get_liblist($codped){
					
			$this->codped = $codped;
			
			$idops = $this->get_idops(); #PEGA OS IDOP_SNs DO PEDIDO DIGITADO ACIMA
			
			$idopsns = '';
			$aux = '';
			#pre($idops);
			if (is_array($idops)){
				foreach ($idops as $k => $val) {
				
					$idopsns.= $aux.'idop_sn ='.$val['idopsn'];
					$aux = ' OR ';
				
				}
			} else {
			
				$idopsns = 'FALSE';
			
			}
			//dados do pedido, nf,dtnf,codbarra
			$ped = parent::gera_array("DATE_FORMAT(datanf,'%d/%m/%Y') as datanf,pedidonf.nf,codbarra from pedido,pedidonf where pedido.codped = pedidonf.codped and pedido.codped = ".$this->codped);
			
			#$this->debug[ped_data] = parent::get_debug();
			
			$this->codbped = $ped[0][codbarra];
			
			$auxi = "codcat, @ccb:=cb.codcb as codcb_ent, ('".$this->codped."') as codped, (select idrma from v_rma where v_rma.codcb_ent = @ccb limit 1) as idrma, cb.codped as cped,('".$ped[0]['nf']."') as nf, ('".$ped[0]['datanf']."') as datanf,cb.codbarra as codbarra,(select count(codbarra) from codbarra where codbarraped <> 1 and (codemp = 14) and codbarra.codprod = cb.codprod) as quant_f, (select count(codbarra) from codbarra where codbarraped <> 1 and (codemp = 15) and codbarra.codprod = cb.codprod) as quant_lf, cb.codprod as codprod,tipo_fab,nomeprod from codbarra as cb,produtos where cb.codprod = produtos.codprod and chkcb = 'N' and ((".$idopsns.") or (cb.codped = ".$this->codped.")) and not cb.codcb in (select codcb_ent from v_rma where v_rma.codprod = cb.codprod) GROUP BY cb.codprod";//);
			
			$res = parent::gera_array($auxi);
			
			$this->debug[prod_idop] = parent::get_debug();	
			
			//busca garantia dos produtos
			
			if (is_array($res)) {
			
				foreach ($res as $k=>$v) {
				
					$this->codprods[] = $v[codprod];
					
					$dados_origem = $this->calc_emporigem($v[codcb_ent]);
					
					$res[$k][codcb] = $dados_origem[0][codcb];
					$res[$k][codbped] = $this->codbped;
					$res[$k][codoc] = $dados_origem[0][codoc];
					
					if ($v[cped] != 0) {
					
						$gar = parent::gera_array('cb.codped, cb.codprod, gar_um FROM codbarra AS cb, pedidoprod AS pp WHERE cb.codprod = pp.codprod AND cb.codped = pp.codped AND cb.codped ='.$codped.' AND cb.codprod = '.$v[codprod].' GROUP BY cb.codped');
										
						$ax = parent::gera_array('DATE_FORMAT(@garant:=DATE_ADD(pnf.datanf, INTERVAL '.$gar[0][gar_um].' MONTH),"%d/%m/%Y") as garantia, IF(@garant>=NOW(),1,0) as em_garantia from pedidonf as pnf where codped = '.$this->codped);
						
						$res[$k]['garantia'] = $ax[0][garantia];
						
						$res[$k]['em_garantia'] = $ax[0][em_garantia];

						
					} else  {
					
						$ax = parent::gera_array('DATE_FORMAT(@garant:=DATE_ADD(pnf.datanf, INTERVAL 12 MONTH),"%d/%m/%Y") as garantia, IF(@garant>=NOW(),1,0) as em_garantia from pedidonf as pnf where codped = '.$this->codped);
						
						$res[$k]['garantia'] = $ax[0][garantia];
						
						$res[$k]['em_garantia'] = $ax[0][em_garantia];
			
					}
				
				}
			
			} else {
			
				$res = array();
			
			}		
			##$this->debug[prod_ped] = parent::get_debug();					
			
			
			return $res;
				
		
		}
		
		
		//RETORNA LISTA DE PRODUTOS ATRAVEZ DO #PEDIDO E SE TRAVA OU NÃO CODBARRA
		public function get_prods($iCodped){
		
			$this->codped = $iCodped;
			
			$idops = $this->get_idops($this->codped); #PEGA OS IDOP_SNs DO PEDIDO DIGITADO ACIMA
			
			$idopsns = '';
			if (is_array($idops)){
				foreach ($idops as $k => $val) {
				
					$idopsns.= ' OR idop_sn ='.$val['idop_sn'];
				
				}
			}
			
			$pesq_codbarra = ($sCodbarra=='NAO')?'':' AND codbarra.codbarra = "'.$sCodbarra.'"';
			
			#$this->debug['idopsns'] = $idopsns;
			
			$group = ($sLib == 'N')?' GROUP BY codprod':'';
			
			#SQL QUE RETORNA A GARANTIA DO MICRO DO PRODUTO EM QUESTÃO
			#select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = 229 and codcb = 344373 and codoc = 9712))) and codped = 53566 
			
			#SQL QUER RETORNA SE ESTÁ EM GARANTIA OU NÃO FORA DE MICRO.
			#, IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") MONTH)>NOW()),1,0) as em_garantia,(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") as tempo_garantia
			
			#(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") as gar_fora,;
			
			#(select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = codbarra.codprod and codcb = codbarra.codcb and codoc = codbarra.codoc))) and codped = ".$this->codped.") as gar_dentro,;
			
			#IF(gar_fora,gar_fora,gar_dentro) as tempo_garantia
			
			#IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL tempo_garantia MONTH)>NOW()),1,0) as em_garantia,(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") as tempo_garantia
			
			#IF((select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped."),(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped."),(select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = codbarra.codprod and codcb = codbarra.codcb and codoc = codbarra.codoc))) and codped = ".$this->codped.")) as tempo_garantia,
			
			#PESQUISA
			#IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (IF((select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped."),(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped."),(select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = codbarra.codprod and codcb = codbarra.codcb and codoc = codbarra.codoc))) and codped = ".$this->codped."))) MONTH)>NOW()),1,0) as em_garantia,
			
			#$this->prods[$this->codped] = parent::gera_array("UCASE(codbarra) as codbarra,codprod, codcb,codoc,idop,idop_sn, IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") MONTH)>=NOW()),1,0) as em_garantia,(select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") as tempo_garantia, (select chkcb from produtos where produtos.codprod = codbarra.codprod order by codprod DESC limit 1) as travacb,(select nomeprod from produtos where produtos.codprod = codbarra.codprod) as nome_prod,(SELECT codcat FROM produtos where produtos.codprod = codbarra.codprod limit 1) AS categoria",'codbarra','codped = '.$this->codped.$idopsns.$group.' HAVING NOT(categoria = 72 OR categoria =73) AND travacb = "'.$sLib.'" ');
			
			#$this->prods[$this->codped] = parent::gera_array("IF((select COUNT(codprod) from v_rma where v_rma.codbarra = codbarra.codbarra)<1,1,0) as livre_rma,UCASE(codbarra) as codbarra,codprod, codemp,codcb,codoc,idop,idop_sn, IF((DATE_ADD('".$this->data_nf." 00:01:00', INTERVAL (select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") MONTH)>=NOW()),1,0) as em_garantia,(select DATE_FORMAT(DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") MONTH),'%d/%m/%Y')) as garantia, (select chkcb from produtos where produtos.codprod = codbarra.codprod order by codprod DESC limit 1) as travacb,(select nomeprod from produtos where produtos.codprod = codbarra.codprod) as nome_prod,(SELECT codcat FROM produtos where produtos.codprod = codbarra.codprod limit 1) AS categoria",'codbarra','codped = '.$this->codped.$pesq_codbarra.$idopsns.$group.' HAVING NOT(categoria = 72 OR categoria =73) AND travacb = "'.$sLib.'" ');
			
			$this->prods[$this->codped] = parent::gera_array("IF((select COUNT(codprod) from v_rma where v_rma.codbarra = codbarra.codbarra)<1,1,0) as livre_rma, UCASE(codbarra) as codbarra, ".$this->codped." as codped, ".$this->nf." as nf, codprod, codprod as eduardo, codemp,codcb,codoc,idop,idop_sn,(select DATE_FORMAT(@garantia:=DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod WHERE pedidoprod.codprod = codbarra.codprod AND codped = ".$this->codped.") MONTH),'%d/%m/%Y')) as garantia, IF(@garantia>=NOW(),1,0) as em_garantia, (select chkcb from produtos where produtos.codprod = codbarra.codprod order by codprod DESC limit 1) as travacb,(select count(codbarra) from codbarra where codbarraped <> 1 and (codemp = 14) and codbarra.codprod = eduardo) as quant_f, (select count(codbarra) from codbarra where codbarraped <> 1 and (codemp = 15) and codbarra.codprod = eduardo) as quant_lf, (SELECT CONCAT('<b>LF: </b> ',quant_lf,'<br><b>F: </b>',quant_f)) as quant,(select nomeprod from produtos where produtos.codprod = codbarra.codprod) as nomeprod,(SELECT codcat FROM produtos where produtos.codprod = codbarra.codprod limit 1) AS categoria",'codbarra','codped = '.$this->codped.$pesq_codbarra.$idopsns.$group.' HAVING NOT(categoria = 72 OR categoria =73) AND travacb = "'.$sLib.'" ');
			
			#$this->prods[$this->codped] = parent::gera_array();
			
			
			#$this->debug['sql_get_prods'] = parent::get_debug();
			
			$arr = $this->prods[$this->codped];
			
			#$this->debug['if_idop_sn'] = array();
			
			if (is_array($arr)) { 
				foreach ($arr as $chave => $produto){				
					
					//#$this->debug['IF'][$chave] = 'NAO ENTROU';
				
					if ($produto['idop_sn']!=0){
							#(select DATEDIFF(DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = ".$produto['codprod']." and codcb = ".$produto['codcb']." and codoc = ".$produto['codoc'].")) and not idop = 0) and codped = ".$this->codped.") MONTH),NOW())) as tempo_garantia
					#	$gar = parent::gera_array("(select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = ".$produto['codprod']." and codcb = ".$produto['codcb']." and codoc = ".$produto['codoc'].")) and not idop = 0) and codped = ".$this->codped.") as tempo_garantia, IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = ".$produto['idop_sn'].") limit 1) and codped = ".$this->codped.") MONTH)>NOW()),1,0) as em_garantia");
						$gar = parent::gera_array("(select DATE_FORMAT((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = (select idop_sn from codbarra where codprod = ".$produto['codprod']." and codcb = ".$produto['codcb']." and codoc = ".$produto['codoc'].")) and not idop = 0) and codped = ".$this->codped.") MONTH)),'%d/%m/%Y')) as tempo_garantia, IF((DATE_ADD('".$this->data_nf." 00:00:00', INTERVAL (select gar_um from pedidoprod where codprod = (select codprod from codbarra where codbarra = (select sn from op_sn where idop_sn = ".$produto['idop_sn'].") limit 1) and codped = ".$this->codped.") MONTH)>NOW()),1,0) as em_garantia");
						
						#$this->debug['garantia_produto'] = parent::get_debug();
						
						
						//#$this->debug['IF'][$chave] = 'ENTROU'; //parent::get_debug(); 
						$produto['garantia'] = $gar[0]['tempo_garantia'];
						#$produto['tempo_garantia'] = $gar[0]['tempo_garantia'];
						$produto['em_garantia'] = $gar[0]['em_garantia'];
						$this->prods[$this->codped][$chave] = $produto;
					
					}
				
				}
			}
			
			//#$this->debug['idop'] = parent::get_debug();
			
			return $this->prods[$this->codped];
			
			
		
		}
		
		public function calc_emporigem($cb){
		
			$bd = new bd;
			
			$i = 0;
		
			while(!$flag){
			
				$res = $bd->gera_array('codbarra.codcb, oc.codemp as codemp,oc.codfor as codfor,oc.codoc as codoc,oc.codped_transf as codped_transf,codbarra.codprod as codprod from oc,codbarra where oc.codoc = codbarra.codoc and codbarra.codcb ='.$cb);
				
				$this->debug['data1'] = $bd->get_debug();
	
				if (is_array($res)) { 
				
				$codped_orig = $res[0][codped_transf];
					
					$codprod = $res[0][codprod];
					
					if ($res[0]['codped_transf'] == 0){
						
						$flag = 1;
										
						$res[0][codcb] = $cb;
						
						
					} else {
					
						$res1 = $bd->gera_array('codcb from codbarra where codprod = '.$codprod.' and codped = '.$codped_orig.' limit 1');
						
						$cb = $res1[0]['codcb'];
					
					}
					
				} else {
				
					$flag = 1;
				
					$res[msg] = 'DEU ALGUM ERRO NO SQL';
				
					$res[debug] = $this->debug['data1'];
				
				}
				
			}//WHILE
		
			return $res;
		
		}
		
		public function get_debug(){
		
			return $this->debug;
		
		}
		
		public function troca_pedido($novo_cb, $idrma) {
		
		
			return true;
		
		}
		
		//FELIPE: ESTA FUNÇÃO RECEBE UM ARRAY COM OS IDRMAs QUE DEVEM SER TRANSFERIDOS
		public function executa_transferencia($array_idrmas){
		
		
		
			return true;
		
		}
	
	}


?>