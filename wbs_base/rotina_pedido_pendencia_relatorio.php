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
				<td width='13%' bgcolor='#EAF0FD'><b><font size='1' face='Verdana' color='#0033CC'>PROJETO:<br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'>$nomeemp<br>
				 </font></td>
				<td width='74%' bgcolor='#EAF0FD'>
				  <p align='center'><b><font face='Verdana' color='#0033CC' size='2'>PEDIDOS PENDENTES DE PAGAMENTO</font></b></td>
				<td width='13%' bgcolor='#EAF0FD'>
				  <p align='right'><b><font size='1' face='Verdana' color='#0033CC'><br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'></font></td>
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

			$vp0=0;$vp1=0;$vp2=0;$vp3=0;$vp4=0;$vp5=0;$vp6=0;$vp7=0;
			$vp8=0;$vp9=0;$vp10=0;$vp11=0;$vp12=0;$vp13=0;
			$np0=0;$np1=0;$np2=0;$np3=0;$np4=0;$np5=0;$np6=0;$np7=0;
			$np8=0;$np9=0;$np10=0;$np11=0;$np12=0;$np13=0;
			$vppt = 0;
			
			
			$prod->listProdSum("vpp, TO_DAYS(NOW()) - TO_DAYS(dataped) as prazo, codped", "pedido", "pedido.caixa = 'NO' and (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108) AND pedido.cancel <> 'OK' ".$condicao , $array71, $array_campo71, "" );

			
			
			if (count($array71) <> 0){

			echo"
			<table border='1' width='100%'>
			  <tr>
				<td width='6%' align='center'>&nbsp;</td>
				
				<td width='6%' align='center'><b><font size='1' face='Verdana'>1</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>2</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>3</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>4</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>5</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>6</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>7</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>7-14</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>+14</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>PM</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>À VISTA</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>À PRAZO</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>TOTAL</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'></font></b></td>
				
			  </tr>

			";
			}
			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$vp = $prod->showcampo0();
				$prazo = $prod->showcampo1();
				$codped = $prod->showcampo2();
				$numped = count($array71);

				$prod->listProdSum("SUM(vp)", "pedidoparcelas, pedido", "pedidoparcelas.codped=pedido.codped and pedido.codped = $codped and TO_DAYS(datavenc) - TO_DAYS(dataped) <= 7", $array72, $array_campo72, "group by pedido.codped" );

				$prod->mostraProd($array72, $array_campo72, 0 );

				$vpp = $prod->showcampo0();
				$vppf = number_format($vpp,2,',','.');

				#echo("$vppf- $prazo1<br>");

				#echo("$prazo - $numped<br>");

				if ($prazo == 0){$vp0 = $vp0 + $vp;$vp=0;$np0 = $np0 + 1;}
				if ($prazo == 1){$vp1 = $vp1 + $vp;$vp=0;$np1 = $np1 + 1;}
				if ($prazo == 2){$vp2 = $vp2 + $vp;$vp=0;$np2 = $np2 + 1;}
				if ($prazo == 3){$vp3 = $vp3 + $vp;$vp=0;$np3 = $np3 + 1;}
				if ($prazo == 4){$vp4 = $vp4 + $vp;$vp=0;$np4 = $np4 + 1;}
				if ($prazo == 5){$vp5 = $vp5 + $vp;$vp=0;$np5 = $np5 + 1;}
				if ($prazo == 6){$vp6 = $vp6 + $vp;$vp=0;$np6 = $np6 + 1;}
				if ($prazo == 7){$vp7 = $vp7 + $vp;$vp=0;$np7 = $np7 + 1;}
				if ($prazo > 7 and $prazo <= 14){$vp8 = $vp8 + $vp;$vp=0;$np8 = $np8 + 1;}
				if ($prazo > 14){$vp9 = $vp9 + $vp;$vp=0;$np9 = $np9 + 1;}
				#if ($prazo > 240 and $prazo <= 270){$vp10 = $vp10 + $vp;$vp=0;}
				#if ($prazo > 270 and $prazo <= 300){$vp11 = $vp11 + $vp;$vp=0;}
				#if ($prazo > 300 and $prazo <= 330){$vp12 = $vp12 + $vp;$vp=0;}
				#if ($prazo > 14){$vp13 = $vp13 + $vp;$vp=0;}

				$vppt = $vppt + $vpp;
			
				$vp0f = number_format($vp0,2,',','.');
				$vp1f = number_format($vp1,2,',','.');
				$vp2f = number_format($vp2,2,',','.');
				$vp3f = number_format($vp3,2,',','.');
				$vp4f = number_format($vp4,2,',','.');
				$vp5f = number_format($vp5,2,',','.');
				$vp6f = number_format($vp6,2,',','.');
				$vp7f = number_format($vp7,2,',','.');
				$vp8f = number_format($vp8,2,',','.');
				$vp9f = number_format($vp9,2,',','.');
				$vpptf = number_format($vppt,2,',','.');
				#$vp10f = number_format($vp10,2,',','.');
				#$vp11f = number_format($vp11,2,',','.');
				#$vp12f = number_format($vp12,2,',','.');
				#$vp13f = number_format($vp13,2,',','.');
				
				
				
			
				if ($j == (count($array71)-1) and count($array71) <> 0){

				$vpt = $vp0+$vp1+$vp2+$vp3+$vp4+$vp5+$vp6+$vp7+$vp8+$vp9+$vp10+$vp11+$vp12+$vp13;
				$vptf = number_format($vpt,2,',','.');

				$vprazo = $vpt - $vppt;
				$vprazof = number_format($vprazo,2,',','.');

					echo "
					<tr>
						<td width='6%' align='center'><font size='1' face='Verdana'><b>$nomevend</b></font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp1f<br>$np1</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp2f<br>$np2</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp3f<br>$np3</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp4f<br>$np4</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp5f<br>$np5</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp6f<br>$np6</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp7f<br>$np7</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp8f<br>$np8</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp9f<br>$np9</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'></font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vpptf</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vprazof</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'><b>$vptf</b></font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'></font></td>
					  </tr>
				

					";	

					$vpt0= $vpt0 + $vp0;
					$vpt1= $vpt1 + $vp1;
					$vpt2= $vpt2 + $vp2;
					$vpt3= $vpt3 + $vp3;
					$vpt4= $vpt4 + $vp4;
					$vpt5= $vpt5 + $vp5;
					$vpt6= $vpt6 + $vp6;
					$vpt7= $vpt7 + $vp7;
					$vpt8= $vpt8 + $vp8;
					$vpt9= $vpt9 + $vp9;
					
					$vtg = $vtg + $vpt;
					$vpptg = $vpptg + $vppt;

				}

				

			}//FOR

					

					

				echo "
				
				
				</table>
					";
				
				
				
	
		}//FOR

				$vprg = $vtg - $vpptg;
				$vpt0f = number_format($vpt0,2,',','.');
				$vpt1f = number_format($vpt1,2,',','.');
				$vpt2f = number_format($vpt2,2,',','.');
				$vpt3f = number_format($vpt3,2,',','.');
				$vpt4f = number_format($vpt4,2,',','.');
				$vpt5f = number_format($vpt5,2,',','.');
				$vpt6f = number_format($vpt6,2,',','.');
				$vpt7f = number_format($vpt7,2,',','.');
				$vpt8f = number_format($vpt8,2,',','.');
				$vpt9f = number_format($vpt9,2,',','.');
				$vtgf = number_format($vtg,2,',','.'); 
				$vpptgf = number_format($vpptg,2,',','.'); 
				$vprf = number_format($vprg,2,',','.'); 

			
				echo "
				<br>
					<table border='1' width='100%'>
			<tr>
				<td width='6%' align='center'><font size='1' face='Verdana'><b>TOTAL</B></font></td>
				<td width='6%' align='center'><font size='1' face='Verdana'><b>$vpt1f<br>$npt1</b></font></td>
				<td width='6%' align='center'><font size='1' face='Verdana'><b>$vpt2f<br>$npt2</b></font></td>
				<td width='6%' align='center'><font size='1' face='Verdana'><b>$vpt3f<br>$npt3</b></font></td>
				<td width='6%' align='center'><font size='1' face='Verdana'><b>$vpt4f<br>$npt4</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpt5f<br>$npt5</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpt6f<br>$npt6</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpt7f<br>$npt7</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpt8f<br>$npt8</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpt9f<br>$npt9</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vpptgf</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vprf</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'><b>$vtgf</b></font></td>
				<td width='7%' align='center'><font size='1' face='Verdana'></font></td>
			  </tr>
			</table>
				
				
				
				";
          
