<?php

require("classprod.php");

#$desloc = 0;
$acrescimo = 10000;


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();
	

// ACOES PRINCIPAIS DA PAGINA

			echo "
			<div align='center'>
  <table border='0' width='550' cellpadding='2'>
    <tr>
      <td width='100%' bgcolor='#FFFFFF' colspan='4'>
        <p align='left'><b><font face='Verdana' size='1'>$mes/$ano</font></b></td>
    </tr>
  <center>
    <tr>
      <td width='25%' bgcolor='#000000'><font size='1' face='Verdana' color='#FFFFFF'><b>VENDEDOR</b></font></td>
      <td width='25%' bgcolor='#000000'><font size='1' face='Verdana' color='#FFFFFF'><b>NUMPED</b></font></td>
      <td width='25%' bgcolor='#000000'><font size='1' face='Verdana' color='#FFFFFF'><b>%MOD</b></font></td>
      <td width='25%' bgcolor='#000000'><font size='1' face='Verdana' color='#FFFFFF'><b>%CANCEL</b></font></td>
    </tr>
";


			// PEDIDOS COM PEDENCIAS DE PAGAMENTOS COM STATUS LIB
			$prod->listProdSum("codvend, nome", "vendedor", "tipo <> 'R'", $array71, $array_campo71, "order by nome" );
						
			for($j = 0; $j < count($array71); $j++ ){
		
				$prod->mostraProd($array71, $array_campo71, $j );

				$nome = $prod->showcampo1();
				$codvend = $prod->showcampo0();

				$prod->listProdU("count(*)", "pedido", "codvend=$codvend and dataped AND dataped >=  '$ano-$mes-01' AND dataped <=  '$ano-$mes-31'");
				$numped = $prod->showcampo0();

				$porc_mod =0;
				$porc_cancel = 0;
				if ($numped <> 0){
				
				$prod->listProdSum("count(*)", " pedidostatus, pedido", "pedido.codped = pedidostatus.codped AND statusped =  'MOD INICIO' AND dataped >=  '$ano-$mes-01' AND dataped <=  '$ano-$mes-31' AND pedido.codvend = $codvend and pedido.cancel <> 'OK'", $array72, $array_campo72, "GROUP  BY pedido.codvend " );
				$prod->mostraProd($array72, $array_campo72, 0 );
				$mod = $prod->showcampo0();

				$prod->listProdU("count(*)", "pedido", "codvend=$codvend and dataped AND dataped >=  '$ano-$mes-01' AND dataped <=  '$ano-$mes-31' and pedido.cancel = 'OK'");
				$cancel = $prod->showcampo0();

				$porc_mod = ($mod/$numped)*100;
				$porc_cancel = ($cancel/$numped)*100;
				$porc_modf = number_format($porc_mod,2,',','.'); 
				$porc_cancelf = number_format($porc_cancel,2,',','.'); 

				$modt = $modt + $mod;
				$cancelt = $cancelt +$cancel;
				$numpedt = $numpedt + $numped;
				

				echo " 
				<tr>
      <td width='25%'><font size='1' face='Verdana'>$nome</font></td>
      <td width='25%'><font size='1' face='Verdana'>$numped</font></td>
      <td width='25%'><font size='1' face='Verdana'>$porc_modf%</font></td>
      <td width='25%'><font size='1' face='Verdana'>$porc_cancelf%</font></td>
    </tr>";
				}
					
				
			}//FOR

		
				$porc_modt = ($modt/$numpedt)*100;
				$porc_cancelt = ($cancelt/$numpedt)*100;
				$porc_modtf = number_format($porc_modt,2,',','.'); 
				$porc_canceltf = number_format($porc_cancelt,2,',','.'); 
			          
echo("
<tr>
      <td width='25%'><font size='1' face='Verdana'></font></td>
      <td width='25%'><font size='1' face='Verdana'>$numpedt</font></td>
      <td width='25%'><font size='1' face='Verdana'>$porc_modtf%</font></td>
      <td width='25%'><font size='1' face='Verdana'>$porc_canceltf%</font></td>
    </tr>
</table>
  </center>
</div>
");