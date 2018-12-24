<?
$tipo = $_GET[tipo];
session_start();

switch ($tipo) {

	case (2): {
		$arr['v_rma_pct@codvend'] = $_SESSION['id'];
		$arr['v_rma_pct@short_desc'] = $_GET['rev'];
		$arr['v_rma_pct@codemp_ent'] = $_GET['entrada'];
		$arr['v_rma_pct@nf_e']= $_GET['nf'];
		$arr['v_rma_pct@data_nf_e']=$_GET['dtnf'];
		$arr['v_rma_pct@tipo'] = 2;
		$bd->insere($arr);
		$retorno['tipo_2'] = $bd->get_debug();
		$idstatus = 4;
		$arr2['cond@v_rma@idstatus'] = 1;
		$retorno[erro]=0;
		pre($retorno);
	};
	case (4): {
		$str = '';
		$liga = '';
		foreach ($_POST as $k => $v) {
			$n = $v;
			$str .= $liga.'v_rma_pctrma.idrma = '.$v;
			$retorno['21'][] =  $v;
			$liga = ' OR ';
		}
		$res1 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.')');			
		
		$retorno[total] = $bd->get_sql();
			
		$res2 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.') AND v_rma_pct.nf_e = "BALCAO"');
			
		$retorno['balcao'] = $bd->get_debug();
			
		$res3 = $bd->gera_array('COUNT(DISTINCT(short_desc)) as counter from v_rma_pct, v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct AND ('.$str.') AND v_rma_pct.nf_e <> "BALCAO"');
			
		$retorno['nbalcao'] = $bd->get_debug();
		
		$res4 = $bd->gera_array('count(idrma) as counter from v_rma_pct,v_rma_pctrma where v_rma_pct.idrmapct = v_rma_pctrma.idrmapct and v_rma_pct.tipo=4 and ('.$str.')');
		
		$retorno['naoduplique'] = $bd->get_debug();
			
		$nf = '000000';
		$dt = '';
			
		switch (true) {
			case (count($_POST)==0):{
				$retorno[erro] = 1;
				$retorno[erromsg] = "SEM PRODUTOS NO PACOTE! QUE FEIO!";
			}break;
			case ($res4[0]['counter']>=1):{
				$retorno[erro] = 1;
				$retorno[erromsg] = "PACOTE DUPLICADO? PRODUTO JA EMPACOTADO";
			}break;
			case (($res2[0]['counter']==1)and($res3[0]['counter']==1)):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = "PRODUTOS EM NF E DE BALCAO NAO\r\nDEVEM SER EMPACOTADOS JUNTOS";
			}break;
			case ($res1[0]['counter']!=1):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = 'MAIS DE UMA EMPRESA SELECIONADAS';
			}break;
			case ($res2[0]['counter']==1):{

				$nf = 'BALCAO';
				$dt = date('%Y-%m-%d');

			};
			default:{
				$res = $bd->gera_array('short_desc from v_rma_pct,v_rma_pctrma where v_rma_pctrma.idrmapct = v_rma_pct.idrmapct and v_rma_pct.tipo = 2 and v_rma_pctrma.idrma = '.$n);
				$retorno['31'] = $bd->get_sql();
				$arr['v_rma_pct@codvend'] = $_SESSION['id'];
				$arr['v_rma_pct@short_desc'] = ($_GET['codcliente'])? $_GET['codcliente']:$res[0]['short_desc']; //;
				$arr['v_rma_pct@nf_e']= $nf;
				$arr['v_rma_pct@data_nf_e']= $dt;
				$arr['v_rma_pct@tipo'] = $_GET['tipo'];
				$bd->insere($arr);
					
				$retorno['insert_4'] = $bd->get_debug();
					
				$idstatus = $_GET['status'];
				$retorno['erro'] = 0;
			}break;
		}
	};
	case(6):{
		$str = '';
		$liga = '';
		
		foreach ($_POST as $k => $v) {
			$n = $v;
			$str .= $liga.'v_rma.idrma = '.$v;
			$retorno['21'][] =  $v;
			$liga = ' OR ';
		}
		
		//SELECIONA O COD DOS FORNECEDORES PARA SABER SE EXISTE MAIS DE UM FORNECEDOR NA SELEÇÃO
		$res1 = $bd->gera_array('COUNT(DISTINCT(codforn)) as counter from v_rma where ('.$str.')');			
		
		$retorno[total] = $bd->get_debug();
		
		//SELECIONA A QUANTIDADE DE CODIGOS DE PRODUTO PARA SABER SE TEM MAIS DE 10 PRODUTOS DIFERENTES NA MESMA NOTA
		$res2 = $bd->gera_array('count(DISTINCT(codprod)) from v_rma where ('.$str.')');
		
		$retorno[codprods] = $bd->get_debug();
			
		$nf = '000000';
		$dt = '';
			
		switch (true) {
			case (count($_POST)==0):{
				$retorno[erro] = 1;
				$retorno[erromsg] = "SEM PRODUTOS NO PACOTE! QUE FEIO!";
			}break;
			case ($res1[0][counter]!=1):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = "PRODUTOS DE FORNECEDORES DIFERENTES\r\nNAO DEVEM IR NO MESMO PACOTE";
			}break;
			case ($res2[0]['counter']>>10):{
				$retorno['erro'] = 1;
				$retorno['erromsg'] = 'MAIS DE DEZ CODPRODS DIFERENTES SELECIONADOS';
			}break;
			default:{
				$res3 = $bd->gera_array('codforn from v_rma where idrma='.$str);
				$arr['v_rma_pct@codvend'] = $_SESSION['id'];
				$arr['v_rma_pct@short_desc'] = $res3[0]['codforn'];
				$arr['v_rma_pct@nf_e']= $nf;
				$arr['v_rma_pct@data_nf_e']= $dt;
				$arr['v_rma_pct@tipo'] = 6;
				$bd->insere($arr);
					
				$retorno['insert_6'] = $bd->get_debug();
					
				$idstatus = 19;
				$retorno['erro'] = 0;
			}break;
		}
	};
	default:{
		$idpct = $bd->conn->Insert_ID();
		$arr = array();
		$arr['v_rma_pctrma@idrmapct'] = $idpct;
		$arr['v_rma_pctrma@codvend'] = $_SESSION['id'];
		if ($retorno['erro'] == 0) {
			foreach ($_POST as $k => $v) {
				$arr['v_rma_pctrma@idrma'] = $v;
				$bd->insere($arr);
				$retorno['v_rma_pctrma'][] = $bd->get_debug();
				$arr2['cond@v_rma@idrma'] = $v;
				$arr2['v_rma@idstatus'] = $idstatus;
				$bd->altera($arr2);
				$retorno['v_rma_alter'][] =  $bd->get_debug();
			}
		}
	}

}
echo json($retorno);

?>