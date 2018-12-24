<?
$rev = $revenda;
$revenda = urldecode($revenda);
$log = $login;
$login = urldecode($login);

if ($connect == 1){

include("bdconnect.php3");

switch ($Action) {

    case "update":

		if ($retorno){

		 $dados2 = "UPDATE malote SET solicitado = $sol, coletado = $col, entregue = $ent, obs='$obs', datastatus=NOW() where codmal=$codmal";
		 $dados_p2 = mysql("ipasoft",$dados2);
		 #echo("$dados2");
		
			if ($ent == 1 ){

			 $dados2 = "UPDATE malote SET  entregue = '$ent', hist=1,  datastatus=NOW() where codmal='$codmal'";
			 $dados_p2 = mysql("ipasoft",$dados2);

			}

			if ($sol == 0 and $col ==0 and $ent == 0){

			 $dados2 = "UPDATE malote SET datastatus='0000-00-00' where codmal='$codmal'";
			 $dados_p2 = mysql("ipasoft",$dados2);

			}
		
		}
		$retorno=0;
		
     break;


	 case "delete":

		if ($retorno){

		$del = "DELETE FROM malote where codmal=$codmal";
		$del_r = mysql('ipasoft',$del);
		
		}
		$retorno=0;
		
     break;

}


$pesq = "SELECT * from malote where hist <> 1 order by datacheg desc";
$pesq_q = mysql('ipasoft',$pesq);

#echo("p=$pesq_q");


echo("
<html>
<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>Controle de Malotes</title>
<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body>
<div align=center>

<div align='center'>
  <center>
  <table border='0' width='680' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='201'><img border='0' src='images/logopeq.gif' width='200' height='100'></td>
              <td width='29'></td>
              <td width='364'><b><font face='Verdana' color='#669999' size='3'>ADMINISTRÇÃO</font></b><font size='4' face='Verdana' color='#0099CC'><br>
                </font><font color='#000000' face='Verdana' size='5'><b>CONTROLE DE MALOTES</b></font></td>
            </tr>
          </table>
          <table border='0' cellpadding='2' cellspacing='1' width='680'>

            <tr>
            <td width='486' bgcolor='#669999'>
              <p align='left'><font size='1' face='Verdana'><b><font
color='#000000'>&nbsp;</font></font></b></td>
            <td width='110' bgcolor='#669999'>
              <p align='right'><a href='index.php3'><b><font size='1' face='Verdana'>FINALIZAR</font></b></a></td>
          </tr>

        </table>

  </center>
</div>



  <div align='center'>
    <center>
    <table height='204' cellSpacing='0' cellPadding='2' width='680' border='0'>
      <tbody>
        <tr>
          <td width='50%' height='15'><font size='1' face='Verdana'><b>:: <a href='#legenda'>VER
            LEGENDA</a></b></font></td>
          <td width='50%' height='15'><font size='1' face='Verdana'><b>:: <a href='$PHP_SELF?connect=1'><font color='#FF0000'>ATUALIZAR
            TABELA</font></a></b></font></td>
        </tr>

        <tr>
          <td vAlign='top' width='100%' height='143' colspan='2'>
            <table cellSpacing='1' cellPadding='2' width='100%' border='0'>
              <tbody>
                <tr>
                  <td align='middle' width='17%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>NOME
                    REVENDA</font></b></td>
                  <td align='middle' width='16%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>DATA
                    ENTRADA</font></b></td>
                  <td align='middle' width='18%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>ENDEREÇO</font></b></td>
                  <td align='middle' width='13%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>TEL</font></b></td>
                  <td align='middle' width='11%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>STATUS</font></b></td>
                  <td align='middle' width='15%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>DATA
                    STATUS</font></b></td>
                  <td align='middle' width='7%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>SOL</font></b></td>
                  <td align='middle' width='8%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>COL</font></b></td>
                  <td align='middle' width='4%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>ENT</font></b></td>
                  <td align='middle' width='4%' bgColor='#808080'><b><font color='#ffffff' size='1' face='Verdana'>EX</font></b></td>
                </tr>

");

if ($pesq_q <> 0 ){

	$pesq_q_n = mysql_numrows($pesq_q);

$conta = 0;
$cor1 = '#FFCC66';
$cor2 = '#FFCC66';

while ($conta < $pesq_q_n):

 $codmal = mysql_result($pesq_q,$conta,"codmal");
 $nome = mysql_result($pesq_q,$conta,"nomerev");
 $endereco = mysql_result($pesq_q,$conta,"endereco");
 $cidade = mysql_result($pesq_q,$conta,"cidade");
 $estado = mysql_result($pesq_q,$conta,"estado");
 $sol = mysql_result($pesq_q,$conta,"solicitado");
 $col = mysql_result($pesq_q,$conta,"coletado");
 $ent = mysql_result($pesq_q,$conta,"entregue");
 $datacheg = mysql_result($pesq_q,$conta,"datacheg");
 $datastatus = mysql_result($pesq_q,$conta,"datastatus");
 $hist = mysql_result($pesq_q,$conta,"hist");
 $tel = mysql_result($pesq_q,$conta,"telefone");
  $obsold = mysql_result($pesq_q,$conta,"obs");

 $nome = substr($nome,0,25);

 if (($conta % 2) <> 0):
    $cor=$cor1;
 else:
    $cor=$cor2;
 endif;
$status = "";
if ($sol==1){$cor="#CFFCC7"; $status = "MOTORISTA SOLICITADO";}
if ($col==1){$cor="#D52835"; $status = "PRODUTO COLETADO";}
if ($col==1 and $sol ==1){$cor="#99CCFF"; $status = "AGUARDANDO ENTREGA";}
if ($ultsituacao=="ENTR" and $contrpre=="S" and $pedpg == "N"){$cor="#D52835";}
if ($ultsituacao=="ENTR" and $contrpre=="N" and $pedpg == "N"){$cor="#D52835";}

if ($col == 1){$colf="S";}else{$colf="N";}
if ($sol == 1){$solf="S";}else{$solf="N";}
if ($ent == 1){$entf="S";}else{$entf="N";}



echo("
<form method='POST' action='$PHP_SELF?Action=update&connect=$connect&retorno=1'>
   <tr>
                  <td width='17%' bgcolor=$cor><b><font size='1' face='Verdana'>$nome</font></b></td>
                  <td width='16%' bgcolor=$cor><font size='1' face='Verdana'>$datacheg</font></td>
                  <td width='18%' bgcolor=$cor><font size='1' face='Verdana'><b>$endereco
                    - $cidade - $estado</b></font></td>
                  <td width='13%' bgcolor=$cor><font size='1' face='Verdana'>$tel</font></td>
                  <td width='11%' bgcolor=$cor><font size='1' face='Verdana'><b>$status</b></font></td>
                  <td width='15%' bgcolor=$cor><font size='1' face='Verdana'>$datastatus</font></td>
                  <td width='7%' bgcolor=$cor>
				   <select size='1' name='sol' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
    				  <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=$col&ent=$ent&connect=1&obs=$obsold' selected>$solf</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=0&col=$col&ent=$ent&connect=1&obs=$obsold' >N</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=1&col=$col&ent=$ent&connect=1&obs=$obsold'>S</option>
                    </select></td>
                 <td width='7%' bgcolor=$cor>
				   <select size='1' name='col' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
    				  <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=$col&ent=$ent&connect=1&obs=$obsold' selected>$colf</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=0&ent=$ent&connect=1&obs=$obsold' >N</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=1&ent=$ent&connect=1&obs=$obsold'>S</option>
                    </select></td>
                <td width='7%' bgcolor=$cor>
				   <select size='1' name='ent' onChange='if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)'>
    				  <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=$col&ent=$ent&connect=1&obs=$obsold' selected>$entf</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=$col&ent=0&connect=1&obs=$obsold' >N</option>
                      <option value='$PHP_SELF?Action=update&codmal=$codmal&retorno=1&sol=$sol&col=$col&ent=1&connect=1&obs=$obsold'>S</option>
                    </select></td>
                  <td width='4%' bgcolor=$cor>
                    <p align='center'><font size='1' face='Verdana'><b><a href='$PHP_SELF?Action=delete&codmal=$codmal&retorno=1&connect=1'>X</a></b></font></td>
                </tr>
					   <tr>
                  <td width='113%' bgColor='#f4f4f4' colspan='10'><font size='1' face='Verdana'><b>OBS.:
                    </b></font><input type='text' name='obs' size='85' value='$obsold'><input type='submit' value='OK' name='B1'></td>
                </tr>
<input type='hidden' name='col' value='$col'>
  <input type='hidden' name='ent' value='$ent'>
  <input type='hidden' name='sol' value='$sol'>
 <input type='hidden' name='codmal' value='$codmal'>
				
</form>

");

 $conta++;

endwhile;

}else{
echo("
 <tr>
                  <td width='100%' align = 'center' colspan= 10><b><font size='1' face='Verdana' color='#FF0000'>NENHUM PEDIDO DE MALOTE</font></b></td>
                   </tr>
");

}



echo("
</tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td width='100%' height='15' colspan='2'></td>
        </tr>
       <tr>
          <td width='50%' height='15'><font size='1' face='Verdana'><b><a name='legenda'></a>Legenda
            : </b></font>
            <ul>
              <li><font size='1' face='Verdana'><b>SOL</b> - Solicitação do
                motorista para a entrega do malote.</font></li>
              <li><font size='1' face='Verdana'><b>COL</b> - Malote coletado na
                transportadora.</font></li>
              <li><font size='1' face='Verdana'><b>ENT</b> - Malote entregue na
                Ipasoft.</font></li>
              <li><font size='1' face='Verdana'><b>EX</b> - Excluir
                solicitação de malote.</font></li>
            </ul>
          </td>
          <td width='50%' height='15'><font size='1' face='Verdana'><b>Legenda
            Cores: </b></font>
            <ul>
              <li><font size='1' face='Verdana'><b><font color='#FFCC66'>LARANJA</font></b>
                - Novo pedido de malote</font></li>
              <li><font size='1' face='Verdana'><b><font color='#66CC00'>VERDE</font></b>
                - Motorista Solicitado.</font></li>
              <li><font size='1' face='Verdana'><b><font color='#99CCFF'>AZUL</font>&nbsp;</b>
                - A coleta foi feita pelo motorista</font></li>
              <li><font size='1' face='Verdana'><b><font color='#FF0000'>VERMELHO</font></b>
                - O campo <b>SOL</b> não foi marcado.</font></li>
            </ul>
          </td>
        </tr>

      </tbody>
    </table>
    </center>
  </div>
  <p>&nbsp;</p>

  





<p>&nbsp;</p>
<table border='0' width='100%' cellspacing='0' cellpadding='3'>
  <tr>
    <td width='100%' align='center'><p><font size='1' face='Verdana' color='#808080'>Copyright ©&nbsp;
      2002 - JFnet
Soluções Internet</font></p>
</td>
  </tr>
</table>

</body>
</html>


");

mysql_close();

}else{

echo("
<html>
<head>
<meta http-equiv='REFRESH'
content='0;URL=http://www.ipasoft.com.br/malote/index.php3?connect=0'>
</head>
<body>
</body>
</html>
");


}



?>
