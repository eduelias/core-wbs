<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

			if ($codproj <> "-1"){
				
				$condicao = " and codproj=$codproj";
				
				$prod->clear();
				$prod->listProdU("nomeproj", "projeto_nome", "codproj='$codproj'");
				$nomeproj = $prod->showcampo0();

			
			}else{
				$nomeproj = "TODOS";
			}

		
		
		echo "
			<table border='0' width='100%'>
			  <tr>
				<td width='13%' bgcolor='#EAF0FD'><b><font size='1' face='Verdana' color='#0033CC'>EMPRESA:<br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'>$nomeproj<br>
				  <b>USUÁRIO:</b><br>
				  $nomevend</font></td>
				<td width='74%' bgcolor='#EAF0FD'>
				  <p align='center'><b><font face='Verdana' color='#0033CC' size='2'>PRAZO MÉDIO DE ACERTO</font></b></td>
				<td width='13%' bgcolor='#EAF0FD'>
				  <p align='right'><b><font size='1' face='Verdana' color='#0033CC'>PERÍODO:<br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'>DE $mes/$ano ATE $mes1/$ano1</font></td>
			  </tr>
			</table>


			";

		

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("nome, tipo, codvend, codgrp, codsuper", "vendedor", "block <> 'Y'".$condicao, $array, $array_campo, "order by nome");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$login = $prod->showcampo0();
			$tipo = $prod->showcampo1();
			$codvend = $prod->showcampo2();
			$codgrp = $prod->showcampo3();
			$codsuper = $prod->showcampo4();


			if ($codvend <> "-1"){
				
				$condicao = " and codvend=$codvend";
				
				$prod->clear();
				$prod->listProdU("nome", "vendedor", "codvend='$codvend'");
				$nomevend = $prod->showcampo0();

			
			}else{
				$nomevend = "TODOS";
			}
			
			// 108 - IPASOFT
			// 120 - INFOHELP
			// 124 - GBA
			// 95  - MAXXFORM

			$np0=0;$np1=0;$np2=0;$np3=0;$np4=0;$np5=0;$np6=0;$np7=0;
			$np8=0;$np9=0;$np10=0;$np11=0;$np12=0;$np13=0;
			$vppt = 0;$soma = 0;$numerador = 0;
			
			
			$prod->listProdSum("TO_DAYS(datastatus) - TO_DAYS(dataped) as prazo, pedido.codped", "pedido, pedidostatus", "pedido.codped = pedidostatus.codped AND pedido.codvend =$codvend AND statusped LIKE  'CAIXA%' AND ( pedido.caixa =  'OK' ) AND pedido.cancel <>  'OK' and dataped > '$ano-$mes-01' and dataped < '$ano1-$mes1-31'" , $array71, $array_campo71, "" );

			
			
			if (count($array71) <> 0){

			echo"
		<table border='1' width='100%'>
		  <tr>
			<td width='16%' align='center'>&nbsp;</td>
			
			<td width='12%' align='center'><b><font size='1' face='Verdana'>ATE 1</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>2</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>2-7</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>7-14</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>+14</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>MEDIA<br>(DIAS)</font></b></td>
			<td width='12%' align='center'><b><font size='1' face='Verdana'>DESVIO<br>PADRAO</font></b></td>
			
			
		  </tr>

			";
			}
			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$prazo = $prod->showcampo0();
				$codped = $prod->showcampo1();
				$numped = count($array71);

				if ($prazo <= 1){$np1 = $np1 + 1;}
				if ($prazo == 2){$np2 = $np2 + 1;}
				if ($prazo > 2 and $prazo <= 7){$np3 = $np3 + 1;}
				if ($prazo > 7 and $prazo <= 14){$np4 = $np4 + 1;}
				if ($prazo > 14){$np5 = $np5 + 1;}

				$prazot[$j] = $prazo;
				#echo"p=$prazot[$j]";
			
				$soma = $soma + $prazo;
										
									
				if ($j == (count($array71)-1) and count($array71) <> 0){

				$np1_p = ($np1/$numped)*100;
				$np2_p = ($np2/$numped)*100;
				$np3_p = ($np3/$numped)*100;
				$np4_p = ($np4/$numped)*100;
				$np5_p = ($np5/$numped)*100;

				$np1_pf = number_format($np1_p,2,',','.');
				$np2_pf = number_format($np2_p,2,',','.');
				$np3_pf = number_format($np3_p,2,',','.');
				$np4_pf = number_format($np4_p,2,',','.');
				$np5_pf = number_format($np5_p,2,',','.');

				$media = $soma/$numped;
				$mediaf = number_format($media,2,',','.');
				#echo("media = $media");

				for($u = 0; $u < count($array71); $u++ ){
					
					$pm = ($prazot[$u]-$media);
					$somatorio = pow(($prazot[$u]-$media),2);
					$numerador = $numerador + $somatorio;
					#echo"num=$numerador - $somatorio - $pm<br>";
	
				}
				
				if ($numped <> 1){
					$desvio = $numerador/($numped-1);
					$dpadrao = sqrt($desvio);
				}else{
					$dpadrao = 0;
				}

				$dpadraof = number_format($dpadrao,2,',','.');

					echo "
				<tr>
					<td width='16%' align='center'><font size='1' face='Verdana'><b>$nomevend<br>$numped</b></font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$np1_pf%</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$np2_pf%</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$np3_pf%</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$np4_pf%</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$np5_pf%</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$mediaf</font></td>
					<td width='12%' align='center'><font size='1' face='Verdana'>$dpadraof</font></td>
					
				  </tr>
				

					";	

					$np1t = $np1t + $np1;
					$np2t = $np2t + $np2;
					$np3t = $np3t + $np3;
					$np4t = $np4t + $np4;
					$np5t = $np5t + $np5;
					#echo("$np1t - $np2t - $np3t - $np4t -$np5t");

				}

				

			}//FOR
					
				
					
					$somat = $somat + $soma;

				echo "
				
				
				</table>
					";
				
				
				
	
		}//FOR
				
				$numpedt = $np1t + $np2t + $np3t + $np4t + $np5t;
				
				$np1_pt = ($np1t/$numpedt)*100;
				$np2_pt = ($np2t/$numpedt)*100;
				$np3_pt = ($np3t/$numpedt)*100;
				$np4_pt = ($np4t/$numpedt)*100;
				$np5_pt = ($np5t/$numpedt)*100;

				#echo("$np1t - $np2t - $np3t - $np4t -$np5t");

				$np1_ptf = number_format($np1_pt,2,',','.');
				$np2_ptf = number_format($np2_pt,2,',','.');
				$np3_ptf = number_format($np3_pt,2,',','.');
				$np4_ptf = number_format($np4_pt,2,',','.');
				$np5_ptf = number_format($np5_pt,2,',','.');

				$mediat = $somat/$numpedt;
				$mediatf = number_format($mediat,2,',','.');

			
				echo "
				<br>
					<table border='1' width='100%'>
		<tr>
			<td width='16%' align='center'><font size='1' face='Verdana'><b>TOTAL<br>$numpedt</B></font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$np1_ptf%</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$np2_ptf%</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$np3_ptf%</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$np4_ptf%</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$np5_ptf%</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'>$mediatf</font></td>
			<td width='12%' align='center'><font size='1' face='Verdana'></font></td>
			
		  </tr>
			</table>
				
				
				
				";
          
