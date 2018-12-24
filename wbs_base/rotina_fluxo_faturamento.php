<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

		$prod->clear();
		$prod->listProdU("nome", "empresa", "codemp='$codemp'");
		$nomeemp = $prod->showcampo0();

		if ($codvend <> "-1"){
			
			$condicao = " and codvend=$codvend";
			
			$prod->clear();
			$prod->listProdU("nome", "vendedor", "codvend='$codvend'");
			$nomevend = $prod->showcampo0();

			
		}else{
			$nomevend = "TODOS";
		}

		
		echo "
			<table border='0' width='100%'>
			  <tr>
				<td width='13%' bgcolor='#EAF0FD'><b><font size='1' face='Verdana' color='#0033CC'>EMPRESA:<br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'>$nomeemp<br>
				  <b>USUÁRIO:</b><br>
				  $nomevend</font></td>
				<td width='74%' bgcolor='#EAF0FD'>
				  <p align='center'><b><font face='Verdana' color='#0033CC' size='2'>ANALISE DE VENDAS POR
				  FORMA DE PAGAMENTO</font></b></td>
				<td width='13%' bgcolor='#EAF0FD'>
				  <p align='right'><b><font size='1' face='Verdana' color='#0033CC'>PERÍODO:<br>
				  </font>
				  </b><font size='1' face='Verdana' color='#0033CC'>$mes/$ano</font></td>
			  </tr>
			</table>


			";

		
		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("opcaixa, descricao", "formapg", "opcaixa like '02%'", $array, $array_campo, "");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$opcaixa = $prod->showcampo0();
			$descricao = $prod->showcampo1();

			// VENDEDORES
			// 108 - IPASOFT
			// 120 - INFOHELP
			// 124 - GBA
			// 95  - MAXXFORM
			// 170 - BRETAS
			// 203 - IHELPCOM
			// 277 - IHALFELD
			// 326 - IPAMINAS
			// 323 - IPAESTRELASUL
			// 364 - IPABHSHOPPPING
			// CLIENTE
			// 323 - IPASOFT
			

			$vp0=0;$vp1=0;$vp2=0;$vp3=0;$vp4=0;$vp5=0;$vp6=0;$vp7=0;
			$vp8=0;$vp9=0;$vp10=0;$vp11=0;$vp12=0;$vp13=0;
			
			
			$prod->listProdSum("vp, TO_DAYS(datavenc) - TO_DAYS(dataped) as prazo", "pedidoparcelas, pedido", "pedidoparcelas.codped=pedido.codped and tipo = '$opcaixa' and dataped > '$ano-$mes-01' and dataped <'$ano-$mes-31' and codemp = $codemp and (pedido.codvend <> 124 and pedido.codvend <> 95 and pedido.codvend <> 120 and pedido.codvend <> 108 and codcliente <> 323 and pedido.codvend <> 170 and pedido.codvend <> 203 and pedido.codvend <> 277 and pedido.codvend <> 326 and pedido.codvend <> 323 and pedido.codvend <> 364) AND pedido.cancel <> 'OK'".$condicao , $array71, $array_campo71, "" );

			
			
			if (count($array71) <> 0){

			echo"
			<br>
			<b><font size='1' face='Verdana'>$descricao</font></b>
			<table border='1' width='100%'>
			  <tr>
				<td width='6%' align='center'>&nbsp;</td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>0</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>à vista</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>30</font></b></td>
				<td width='6%' align='center'><b><font size='1' face='Verdana'>30-60</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>60-90</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>90-120</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>120-150</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>150-180</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>180-210</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>210-240</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>240-270</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>270-300</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>300-330</font></b></td>
				<td width='7%' align='center'><b><font size='1' face='Verdana'>330</font></b></td>
			  </tr>

			";
			}
			
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$vp = $prod->showcampo0();
				$prazo = $prod->showcampo1();

				if ($prazo < 0){$vp0 = $vp0 + $vp;$vp=0;}
				if ($prazo >= 0 and $prazo <= 7){$vp1 = $vp1 + $vp;$vp=0;}
				if ($prazo > 7 and $prazo <= 30){$vp2 = $vp2 + $vp;$vp=0;}
				if ($prazo > 30 and $prazo <= 60){$vp3 = $vp3 + $vp;$vp=0;}
				if ($prazo > 60 and $prazo <= 90){$vp4 = $vp4 + $vp;$vp=0;}
				if ($prazo > 90 and $prazo <= 120){$vp5 = $vp5 + $vp;$vp=0;}
				if ($prazo > 120 and $prazo <= 150){$vp6 = $vp6 + $vp;$vp=0;}
				if ($prazo > 150 and $prazo <= 180){$vp7 = $vp7 + $vp;$vp=0;}
				if ($prazo > 180 and $prazo <= 210){$vp8 = $vp8 + $vp;$vp=0;}
				if ($prazo > 210 and $prazo <= 240){$vp9 = $vp9 + $vp;$vp=0;}
				if ($prazo > 240 and $prazo <= 270){$vp10 = $vp10 + $vp;$vp=0;}
				if ($prazo > 270 and $prazo <= 300){$vp11 = $vp11 + $vp;$vp=0;}
				if ($prazo > 300 and $prazo <= 330){$vp12 = $vp12 + $vp;$vp=0;}
				if ($prazo > 330){$vp13 = $vp13 + $vp;$vp=0;}

			

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
				$vp10f = number_format($vp10,2,',','.');
				$vp11f = number_format($vp11,2,',','.');
				$vp12f = number_format($vp12,2,',','.');
				$vp13f = number_format($vp13,2,',','.');
				
				
			
			
				if ($j == (count($array71)-1) and count($array71) <> 0){

				$vpt = $vp0+$vp1+$vp2+$vp3+$vp4+$vp5+$vp6+$vp7+$vp8+$vp9+$vp10+$vp11+$vp12+$vp13;
				$vptf = number_format($vpt,2,',','.');

					echo "
					<tr>
						<td width='6%' align='center'><font size='1' face='Verdana'>$opcaixa</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp0f</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp1f</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp2f</font></td>
						<td width='6%' align='center'><font size='1' face='Verdana'>$vp3f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp4f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp5f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp6f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp7f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp8f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp9f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp10f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp11f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp12f</font></td>
						<td width='7%' align='center'><font size='1' face='Verdana'>$vp13f</font></td>
					  </tr>
					<tr>
					    <td width='6%' align='center'>&nbsp;</td>
					    <td width='94%' colspan='14'><b><font size='1' face='Verdana'>R$ $vptf</font></b></td>
					</tr>

					";	
					
					$vtg = $vtg + $vpt;
				}

				

			}//FOR

				echo "</table>";
				
				
				
	
		}//FOR

				$vtgf = number_format($vtg,2,',','.'); 

				echo "<br><b><font size='2' face='Verdana'>TOTAL DE TODAS AS OPERACOES: R$ $vtgf</font></b><br><br>";
          
