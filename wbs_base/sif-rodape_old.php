<?
//RODAPE

$prod = new operacao();


echo("
 </td>
    <td width='119' valign='top' background='images/p_21.gif'> 
      <table width='119' border='0' cellspacing='0' cellpadding='0'>
	   <tr> 
          <td <td colspan='2'><img src='images/p_08.gif' width=119 height=20></td>
        </tr>


");

$prod->listProdgeral("segurancaacesso, seguranca", "codgrp = '$codgrp' and segurancaacesso.codpg=seguranca.codpg", $array02, $array_campo02, "order by nomem" );
	
	for($i = 0; $i < count($array02); $i++ ){



	$prod->mostraProd( $array02, $array_campo02, $i );
	$codpg = $prod->showcampo4();
	$nomem = $prod->showcampo5();
	$arquivo = $prod->showcampo6();
	$actionpg = $prod->showcampo7();

	#$prod->listProd("seguranca", "codpg=$codpg");
	#$nomem = $prod->showcampo1();
	#$arquivo = $prod->showcampo2();
	#$actionpg = $prod->showcampo3();

	if ($actionpg <> 'N'){

echo("

		 <tr> 
          <td colspan='2'><img src='images/p_11.gif' width=119 height=1></td>
        </tr>

        <tr> 
		  <td background='images/p_10.gif' height='19' class='topics' align ='right' width='10%'>&nbsp;<img border='0' src='images/seta1-a.gif' >&nbsp;&nbsp;</td>
          <td background='images/p_10.gif' height='19' class='topics' align ='left' width='90%'><a href='restrito.php?Action=list&desloc=0&pg=$codpg&connectok=$connectok&retlogin=1'>
            
$nomem<img src='images/spacer.gif' width='10' height='1' border='0'></a></td>
        </tr>


");

	}
	}

	// CALCULO DO TEMPO DE EXECUÇÃO DA PAGINA //
	$mtime2 = explode(" ", microtime());
	$endtime = $mtime2[0] + $mtime2[1];
	$totaltime = $endtime - $starttime;
	$totaltime = number_format($totaltime, 7);

$npesq = $prod->Database->queries;
	
echo("
        </table>
    </td>
    <td width='30' background='images/p_25.gif' valign='top'>&nbsp;</td>
  </tr>
</table>

<table width='780' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td><img src='images/f001_blht_27.gif' width=780 height=40></td>
  </tr>
</table>
<div align='center'>
  &nbsp;
</div>
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='1'>
    <tr>
      <td width='100%'>
        <p align='center'><img border='0' src='images/ano1.gif' width='51' height='50'></td>
    </tr>
  </table>
  </center>
</div>

<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='3'>
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><b>Copyright ©
        2002-2004 -&nbsp; JFnet -&nbsp; Todos os Direitos Reservados<br></b>
		Processado em: $totaltime segundos</font></td>
    </tr>
  </table>
  </center>
</div>

</body>
</html>

");
//RODAPE
?>