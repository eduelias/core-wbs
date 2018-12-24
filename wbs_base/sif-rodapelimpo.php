<?
//RODAPE

$prod = new operacao();




	// CALCULO DO TEMPO DE EXECUÇÃO DA PAGINA //
	$mtime2 = explode(" ", microtime());
	$endtime = $mtime2[0] + $mtime2[1];
	$totaltime = $endtime - $starttime;
	$totaltime = number_format($totaltime, 7);

$npesq = $prod->Database->queries;
	
echo("
<BR><BR><BR>
  
<div align='center'>
  <center>
  <table border='0' width='550' cellspacing='0' cellpadding='3'>
    <tr>
      <td width='100%'>
        <p align='center'><font face='Verdana' size='1'><b>Copyright ©
        2002-2003 -&nbsp; JFnet -&nbsp; Todos os Direitos Reservados<br></b>
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