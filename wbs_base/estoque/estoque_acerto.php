<?php

require("/home/wbs/public_html/sif/classprod.php");

//$codempselect = $codemp;

$codempselect = $argv[1];

// INICIO DA CLASSE
$prod = new operacao();

		#echo("cb=$codped");


			// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codprod, nomeprod", "produtos", "unidade not like 'CJ'", $array, $array_campo, "order by nomeprod" );
 
 
		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );
			
			$codprod = $prod->showcampo0();
			$nomeprod = $prod->showcampo1();
			$nomeprod= strtoupper($nomeprod);
			
			
			$reserva_total = 0; 
			$est_reserva_ped = 0;
			$est_reserva_op = 0;
			$est_reserva_op_total = 0;
	
			// VERIFICA QUANTIDADES DE CODBARRAS DESSE PRODUTO
			$prod->clear();
			$prod->listProdU("COUNT(*)", "codbarra", "codprod = $codprod and codemp=$codempselect and codbarraped <> 1");
			$est_codbarra = $prod->showcampo0();
			
			
			// VERIFICA QUANTIDADES VENDIDAS DESSE PRODUTO
			$prod->clear();
			$prod->listProdSum("codprod, qtde, codcb", "pedidoprod, pedido", "codprod = $codprod and pedido.codemp=$codempselect and pedidoprod.codped=pedido.codped and cb <> 'OK' and cancel <> 'OK' and hist <> 1", $array1, $array_campo1, "" );
 				for($j = 0; $j < count($array1); $j++ ){
			
					$prod->mostraProd( $array1, $array_campo1, $j );
					#$codprod = $prod->showcampo0();
					$qtdenew  = $prod->showcampo1();
					$codcb  = $prod->showcampo2();
					
					$codcb_array1 = explode(":", $codcb);
					$codcb_array1 = array_diff($codcb_array1, array(''));
					$qtdecb = count($codcb_array1);

					$est_reserva_ped = $est_reserva_ped + ($qtdenew - $qtdecb);
				}//FOR
		
			// VERIFICA QUANTIDADES EM PRODUCAO DESSE PRODUTO
			
			$prod->clear();
			$prod->listProdSum("SUM(op.qtde), op.idop", "op_prod LEFT JOIN op ON op.idop = op_prod.idop", "op_prod.codprod = $codprod and codemp=$codempselect and hist <> 'S' GROUP by op_prod.idop", $array5, $array_campo5, "" );
			#$prod->listProdU("SUM(op.qtde), op.idop", "op_prod LEFT JOIN op ON op.idop = op_prod.idop", "op_prod.codprod = $codprod and codemp=$codempselect and hist <> 'S' GROUP by op_prod.codprod");
				for($t = 0; $t < count($array5); $t++ ){
			
					$prod->mostraProd( $array5, $array_campo5, $t );
					$est_reserva_op = $prod->showcampo0();
					$idop = $prod->showcampo1();
			#echo "aqui=$idop";
			
				$prod->clear();
				$prod->listProdU("COUNT(*)", "op_sn LEFT JOIN op ON op.idop = op_sn.idop", "codemp='$codempselect' and hist <> 'S' and op_sn.cb = 'OK' and op.idop = '$idop'");
				$est_reserva_op_sn = $prod->showcampo0();
				
				$est_reserva_op_total = $est_reserva_op_total + ($est_reserva_op-$est_reserva_op_sn);
				#echo "| $est_reserva_op + $est_reserva_op_sn | $idop <BR>";
			
				}//FOR
			
			#$reserva_total = $est_reserva_ped + ($est_reserva_op-$est_reserva_op_sn);
			
			$reserva_total = $est_reserva_ped + $est_reserva_op_total;
			
			#echo "$codprod - qtde = $est_codbarra, reserva = $reserva_total | $est_reserva_ped + $est_reserva_op_total | $idop <BR>";
			$prod->upProdU("estoque","qtde = '$est_codbarra', reserva = '$reserva_total'", "codemp='$codempselect' and codprod='$codprod'");
			
	
		}//FOR
?>
