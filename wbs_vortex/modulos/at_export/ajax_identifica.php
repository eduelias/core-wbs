<?php

class exportat {

	/*dados do*/ public $cliente = array();
	
	/*dados do*/ public $pedido = array('data'=>'','cod'=>'','nf'=>array(array('num'=>0,'data'=>0)));
	
	/*dados da*/ public $peca = array('vendido'=>true, 'dados'=>array('nome'=>false,'ident'=>false,'descricao'=>false),'garantia'=>false,'pecas'=>false,'computador'=>false);
	
	/*buffer */public $buff_libcb = array();
	
	/*info para*/public $debug;
	
	private $bd;
	
	private $ret;
	
	public function libera_codbarra($serie) /* 1 funcao a rodar*/
	{
		$this->bd = new bd();
		
		$this->libcb = $this->bd->gera_array('b.chkcb as chkcb,b.nomeprod as nome, a.codped as ped,  descres as d, b.codprod as cod','codbarra a,produtos b','a.codprod = b.codprod AND ( a.codbarra = "'.$serie.'" OR b.codbarra = "'.$serie.'") order by codcb DESC LIMIT 1');	
		
		$this->debug['libera_codbarra'] = $this->bd->get_debug();
		
		//print_r($this->libcb);
		
		if ($this->libcb[0]['chkcb'] == 'N') 
		{
			
			$this->peca['dados'] = array('nome'=>$this->libcb[0]['nome'],'ident'=>$serie,'descricao'=>$this->libcb[0]['cod'].' - '.$this->libcb[0]['d']);
			
			return true;
			
		} else {
			
			$this->pedido['cod'] = $this->libcb[0]['ped'];
				
		}

		return false;
	}
	
	public function eh_computador($serie) /* segunda funcao a ser executada, não é libcb, é computador? */
	{
		$cat = $this->bd->gera_array('b.codcat as cat, b.nomeprod as nome, b.codprod as cod, descres as d','codbarra a,produtos b','a.codprod = b.codprod AND a.codbarra = "'.$serie.'"');
		
		$this->debug['eh_computador'] = $this->bd->get_debug();	
	
		//print_r($cat);
		
		$this->peca['dados'] = array('nome'=>$cat[0]['nome'],'ident'=>$serie,'descricao'=>$cat[0]['d']);
		
		if ($cat[0]['cat'] == '72' or $cat[0]['cat'] == '73') {
			
			$this->peca['computador'] = true;
						
			return true;	
		}
		
		return false;
	}
	
	public function busca_pecas_computador($serie) /*terceira executada. Caso seja computador, devolve as peças do mesmo*/
	{
		$idopsn = $this->bd->gera_array('idop_sn','op_sn','sn = "'.$serie.'" LIMIT 1');	
		
		$this->debug['idop_sn'] = $this->bd->get_debug();	
			
		$prods = $this->bd->gera_array('UPPER(a.codbarra) as ident,a.codprod as descricao,b.nomeprod as nome','codbarra a,produtos b','a.codprod = b.codprod AND a.idop_sn = '.$idopsn[0]['idop_sn']);
		
		$debug['prods'] = $this->bd->get_debug();	
			
		return $prods;
	}
	
	public function busca_dados_cliente($codped)
	{
		$ped = $this->bd->gera_array('a.nome as nome, CONCAT("(",TRIM(LEADING "0" FROM dddtel1),") ",LTRIM(a.tel1)) as telefone,IF(a.tipocliente ="F",a.cpf,a.cnpj) as cp, endereco, numero,complemento,bairro,cep,estado,cidade,email','clientenovo a, pedido b','b.codcliente = a.codcliente AND b.codped = '.$codped.' LIMIT 1');
		
		$this->debug['busca_dados_cliente'] = $this->bd->get_debug();	

		if (is_array($ped))
		{		
		
			$this->cliente['cp'] = $ped[0]['cp'];
			
			$this->cliente['nome'] = $ped[0]['nome'];
			
			$this->cliente['telefone'] = $ped[0]['telefone'];
			
			$this->cliente['endereco'] = array(
				'tipo'=>'PRINCIPAL (WBS)', 
				'logradouro'=>$ped[0]['endereco'],
				'numero'=>$ped[0]['numero'],
				'complemento'=>$ped[0]['complemento'],
				'bairro'=>$ped[0]['bairro'],
				'cep'=>$ped[0]['cep'],
				'uf'=>$ped[0]['estado'],
				'cidade'=>$ped[0]['cidade'],
				'email'=>$ped[0]['email']
			);
		
		} else {
			
			$this->ret['peca']['vendido'] = false;			
		}
		
		return $this->cliente;
	}
	
	public function busca_dados_pedido($codped)
	{
		
		$ped = $this->bd->gera_array('datanf as data, nf as num','pedidonf','codped = '.$codped);
		
		$this->debug['busca_dados_pedido'] = $this->bd->get_debug();	
	
		if (is_array($ped))
			foreach ($ped as $nf) {
				$this->pedido['nf'] = $nf;			
			}
		else
			$this->debug['erro'] = 'NOTA FISCAL NAO ENCONTRADA';
		
		if (is_array($ped)) $this->pedido['data'] = $ped[0]['data'];
		
		return $this->pedido;	
		
	}
	
	function dados_pedido_por_nf($nf,$dtnf)
	{
		$ped = $this->bd->gera_array('c.codped as ped, c.datanf as data, c.nf as num','pedidonf c','c.codped = '.$codped);
		
		$this->debug['busca_dados_pedido_por_nf'] = $this->bd->get_debug();
		
		try {
			
			$this->pedido['cod'] = $ped[0]['ped'] ;
			
		} catch (Exception $e) {
			
			echo 'Pedido Inexistente: ',  $e->getMessage(), "\n";
			
		}
		
		return $this->pedido['cod'];
	}
	
	public function checa_garantia($serie)
	{
	
	
	
		return true;	
	}
	
	public function busca_por_nserie($nserie)
	{
		//aqui devo pegar o GET vindo via ajax;
		$serie = $_GET['nserie'];
		
		//TESTA SE A PEÇA EH LIBCB, SE LIBERA, INFORMA OS DADOS DO PRODUTO SEM BUSCAR MAIS NADA
		if (!$this->libera_codbarra($serie)) {
			
			if ($this->eh_computador($serie))  $this->peca['pecas'] = $this->busca_pecas_computador($serie);//SE É COMPUTADOR, BUSQUE AS PEÇAS DELE
			
			$this->ret['pedido'] = $this->busca_dados_pedido($this->pedido['cod']);
			
			$this->ret['cliente'] = $this->busca_dados_cliente($this->pedido['cod']);
			
			$this->ret['produto'] = $this->peca;
	
				
		} else { //É LIBCB
		
			$this->ret['libcb'] = true;
			
			$this->ret['produto'] = $this->peca;
			
		}
		
	}
	
	public function exportat()
	{
			
			
		switch ($_GET['action']){
		
			case ('identifica'):{
				$this->busca_por_nserie($_GET['nserie']);
			};break;
			
			case ('nf'):{
				
				$nf = '';
				
				$dtnf = '';
				
				$codprod = '';/*??*/
				
				$this->ret['pedido'] = $this->dados_pedido_por_nf($nf,$dtnf);
				
				$this->ret['cliente'] = $this->busca_dados_cliente($pedido['cod']);
				
				
			};break;
			
			default:{			
				$this->busca_por_nserie($_GET['nserie']);
			};break;
		
			
		}
		
		//$this->ret['debug'] = $this->debug;
		
		echo json($this->ret);

	}
}
?>
<?=$_GET['callback']?>(<?php $xp = new exportat(); ?>)

	
