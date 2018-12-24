<?php

require("classprod.php");


// INICIO DA CLASSE
$prod = new operacao();
	

// ACOES PRINCIPAIS DA PAGINA

echo("

<table border='0' width='100%' cellspacing='1' height='31'>
  <tr>
    <td width='15%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>CODOS</font></b></td>
    <td width='85%' bgcolor='#800000' height='15'><b><font face='Verdana' size='1' color='#FFFFFF'>LAUDO</font></b></td>
    
  </tr>


");



		// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codbarra , os_laudo", "os", "conf_cb = 'OK'", $array, $array_campo, "ORDER BY codos");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codbarra = $prod->showcampo0();
			$laudo = $prod->showcampo1();

			
					
			

			echo("
		 <tr>
    <td width='15%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'><b>$codbarra</font></b></td>
    <td width='85%' height='8' bgcolor='#EBEBEB'><font face='Verdana' size='1'>$laudo</font></td>
    
  </tr>

");


		}//FOR

echo("TOTAL DE PEDIDOS MODIFICADOS : $i");

