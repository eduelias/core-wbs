<?php

	class pcalc {
	
		public $codprod = 0;
		
		public $ptabela = 0;
		
		public $pvenda = 0;
		
		public $aliqicms = 0;
		
		public $vricms = 0;
		
		public $aliqipi = 0;
		
		public $vripi = 0;
		
		public $ncm = 0;
		
		public $unidade = 0;
		
		public $codorimercsimprem = 0;
		
		public $codtribicmssimprem = 0;
		
		public $qntde = 0;
		
		public function pcalc($param){
		
			foreach ($param as $var => $val) {
				
				$this->$var = $val;
				
			}
				
		}
		
		public function get_icms() {
		
			$this->vricms = $this->aliqicms * $this->pvenda;
			
			return $this->vricms;
			
		}
		
		public function get_ipi() {
		
			$this->vripi = $this->aliqipi * $this->pvenda;
			
			return $this->vricms;
				
		}
		
	}
	
	class calcula {
		
		public $codped;
		
		public $codprod;
		
		public $aliqicms = 12;
		
		public $vrdesconto = 0;
		
		public $aliqipi = 0;
		
		public $vrbaseipi = 0;
		
		public $vrbasest = 0;
		
		public $vripi = 0;
		
		public $vrst = 0;
		
		public $vrbaseicms = 0;
		
		public $vricms = 0;
		
		public $baserepicms = 0; 
		
		public $perrepicms = 0;
		
		public $vrrepicms = 0;

		public $baseredicms = 0;
		
		public $perredicms = 0;
		
		public $vrredicms = 0;
		
		public $basecredicms = 0;
		
		public $percredicms = 0;
		
		public $vrcredicms = 0;
		
		public $perdesconto = 0;
		
		public $vrtotal = 0;
		
		public $vracrescimo = 0;
		
		public $peracrescimo = 0;
		
		public $codtribicms = '00';
		
		private $uf = false;
		
		private $cidade = false;
		
		//campos necessários no nfsaidas
		
		private $vrbasestcims = 0;
		
		public function set_produto($codprod,$valor, $quantidade) {
			
			$this->codprod = $codprod;
			
			$res['codprod'] = $codprod;
			
			$res['ptabela'] = $valor;
			
			$res['pvenda'] = $valor;
			
			$res['aliqipi'] = $this->sinf_dados[$codprod]['ALIQIPI'];
			
			$res['aliqicms'] = $this->aliqicms($codprod,$this->codcliente);
			
			$res['codncm'] = $this->sinf_dados[$codprod]['CODNCM'];
			
			$res['codunomedida'] = $this->sinf_dados[$codprod]['CODUNOMEDIDA'];
			
			$res['quantidade'] = $quantidade;
			
			$res['codorimercsimprem'] = $this->sinf_dados[$codprod]['CODORIMERCSIMPREM'];
			
			$res['codtribicmssimprem'] = $this->sinf_dados[$codprod]['CODTRIBICMSSIMPREM'];
			
			$res['codtribicms'] = $this->sinf_dados[$codprod]['CODTRIBICMS'];
			
			$res['substitutotributario'] = $this->sinf_dados[$codprod]['SUBSTITUTOTRIBUTARIO'];
			
			$this->produto[$codprod] = new pcalc($res);
			
			$this->soma_ipi += $this->produto[$codprod]->get_ipi();
			
			$this->soma_icms += $this->produto[$codprod]->get_icms();
		}
		
		public function calcule($campo) {
			//return 0;	
			switch ($campo) {
			
				case ('ALIQICMS'): {
					return ($this->produto[$this->codprod]->codtribicms != 60)?$this->aliqicms():'0';
				}; break;
				case ('ALIQIPI'): {
					return $this->produto[$this->codprod]->aliqipi;
				}; break;
				case ('VRBASEIPI'): {
					if ($this->aliqipi) {
						return $this->produto[$this->codprod]->ptabela;
					}
					else return 0;
				}; break;
				case ('VRBASEST'): {
					return 0;
				}; break;
				case ('VRIPI'): {
					if ($this->aliqipi) {
						
						return ($this->aliqipi/100) * $this->produto[$this->codprod]->ptabela;
						
					}
					else return 0;
				}; break;
				case ('VRST'): {
					return '0';
				}; break;
				case ('VRBASEICMS'): {
					switch ($this->produto[$this->codprod]->codtribicms) {
						case ('00'):{ //TRIBUTADO INTEGRALMENTE
							$c = ($this->produto[$this->codprod]->ptabela * $this->produto[$this->codprod]->quantidade);
							$this->vrredicms = 0;
							return $c;
						} break;
						case ('20'):{ //REDUÇÃO NA BASE DE CALCULO
							//echo $this->produto[$this->codprod]->ptabela.' | '.$this->perredicms .' | '.$this->produto[$this->codprod]->quantidade.'<br>';
							$red = ($this->produto[$this->codprod]->ptabela * $this->perredicms * $this->produto[$this->codprod]->quantidade)/100;
							$this->vrbaseicms = ($this->produto[$this->codprod]->ptabela - $red) * $this->produto[$this->codprod]->quantidade;
							$this->vrredicms = $red * $this->produto[$this->codprod]->quantidade;
							return $this->vrbaseicms;
						}break;
						case ('30'):{ //ISENTO MAS COM COBRANÇA DE ICMS EM ST
							return '0';
						}break;
						case ('41'):{ //NÃO TRIBUTADO
							$this->vrredicms = 0;
							$this->vrbaseicms = 0;
							$this->aliqicms = 0;
							
							return $this->vrbaseicms;
						}break;
						case ('50'):{ //SUSPENSÃO
							return '0';
						}break;
						case ('51'):{ //DIFERIMENTO
							return '0';
						}break;
						case ('60'):{ //ST
							$c = '0'; //$this->produto[$this->codprod]->ptabela * $this->produto[$this->codprod]->quantidade;
							$this->vrredicms = 0;
							return $c;
						}break;
						default: return '0';	
					};
				}; break;
				case ('VRICMS'): {
					if ($this->aliqicms and ($this->produto[$this->codprod]->codtribicms != 60)) {
						$c = ($this->produto[$this->codprod]->ptabela * $this->produto[$this->codprod]->quantidade);
						//echo $c.'<br>';
						return ($this->aliqicms/100) * $c;
					} else return 0;
				}; break;
				case ('BASEREPICMS'): {
					return 0; //VERIFICAR
				}; break;
				case ('PERREPICMS'): {
					return 0; //VERIFICAR
				}; break;
				case ('VRREPICMS'): {
					return 0; //VERIFICA
				}; break;
				case ('BASEREDICMS'): {
					return $this->baseredicms;
				}; break;
				case ('PERREDICMS'): {
					return $this->perredicms;
				}; break;
				case ('VRREDICMS'): {
					return $this->vrredicms;
				}; break;
				case ('BASECREDICMS'): {
					return 0; //VERIFICA
				}; break;
				case ('PERCREDICMS'): {
					return 0; //VERIFICA
				}; break;
				case ('VRCREDICMS'): {
					return 0;
				}; break;
				/*case (''): {
					
				}; break;*/
				default:{
					return 99;	
				}
			}
		}
		
		public function calcula($codcliente, $sinf_dados, $empresa = '001') {
			
			$this->codcliente = ($codcliente == null)?false:$codcliente;
			//echo $this->codcliente.'<br>';
			$this->sinf_dados = $sinf_dados;
			
			$this->empresa = $empresa;
			
		}
		
		public function aliqicms() {
			
			$codprod = $this->codprod;
			$codcliente = $this->codcliente;
			
			//print_r($this);
			//echo $this->codcliente;
			
			$this->sinf = new sinf;
			
			if ($this->codcliente) {
				
				
				
				if (!$this->cidade) 
					$this->cidade = $this->sinf->gera('select ALIQZEROICMSSAIDAS,CODCIDADE from FORCLI where NFORCLI = '.($this->codcliente).' and NEMPRESA = \''.$this->empresa.'\'');
				
				if (!$this->uf)
					$this->uf = $this->sinf->gera('select UF from CIDADES where CODCIDADE = \''.$this->cidade['CODCIDADE'].'\'');
					
			} else {
				
				$this->uf['UF'] = 'MG ';
				
				$this->cidade['ALIQZEROICMSSAIDAS'] = 'F';
				
			}
			
			$sqa = 'select ALIQUOTA,PERREDICMS from PRODUTOSALIQUOTAS where CODPRODUTO = \''.$codprod.'\' AND UF = \''.$this->uf['UF'].'\' AND NEMPRESA = \''.$this->empresa.'\'';
			
			$aliq = $this->sinf->gera($sqa);
			

			//CIDADE SÃO OS DADOS VINDOS DO NFORCLI, CHAMADO CIDADE PQ BUSCAVA SÓ A CIDADE NO INICIO		
			$this->aliqicms = ($this->cidade['ALIQZEROICMSSAIDAS']=='F')?$aliq['ALIQUOTA']:'0';
			
			//BUSCAR ISSO NO PRODUTO

			//echo $aliq['PERREDICMS'].'<br>';
			//print_r($aliq);
			
			$this->perredicms = $aliq['PERREDICMS'];

			return $this->aliqicms;				
		
		}
	
		public function vrbase($vrunit,$qtde){
			return $vrunit * $qtde;	
		}
	
		public function icms($vrbase,$aliq){
			return $vrbase * $aliq;	
		}
		
	}

?>