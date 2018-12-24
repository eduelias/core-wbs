<?
$rev = $revenda;
$revenda = urldecode($revenda);
$log = $login;
$login = urldecode($login);


include("bdconnect.php3");

$pesq1 = "SELECT * from senha where revenda = '$revenda' ";
$pesq_q1 = mysql('ipasoft',$pesq1);

$codrev = mysql_result($pesq_q1,0,"cod");
$nomerevenda = mysql_result($pesq_q1,0,"nomerevenda");
$endrevenda = mysql_result($pesq_q1,0,"endrevenda");
$cidrevenda = mysql_result($pesq_q1,0,"cidrevenda");
$estrevenda = mysql_result($pesq_q1,0,"estrevenda");
$telrevenda = mysql_result($pesq_q1,0,"telrevenda");




switch ($Action) {

    case "insert":

		if ($retorno){
		
		$ins = "INSERT INTO malote SET codrev =$codrev ,nomerev = '$nomerevenda', endereco = '$endrevenda', cidade = '$cidrevenda', estado = '$estrevenda', telefone = '$telrevenda',  datacheg=NOW() ";
		$ins_r = mysql('ipasoft',$ins);

		}
		$retorno=0;
		
     break;


}

$titulo1 = "SOLICITAÇÃO DE MALOTE";


$pesq = "SELECT * from malote where hist <> 1 and codrev = $codrev order by datacheg desc";
$pesq_q = mysql('ipasoft',$pesq);


echo("
<html>
<head>
<title>Ipasoft Informatica / PEDIDO</title>
<link rel='stylesheet' type='text/css' href='style.css'>

</head>
<body>

<div align='center'>
  <center>
  <table border='0' width='600' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='201'><img border='0' src='images/logopeq.gif' width='200' height='100'></td>
              <td width='29'></td>
              <td width='364'><b><font face='Verdana' color='#669999'
size='3'>REVENDAS</font></b><font size='4' face='Verdana' color='#0099CC'><br>
                </font><font color='#000000' face='Verdana' size='5'><b>$titulo1</b></font></td>
            </tr>
            <tr>
              <td width='201'></td>
              <td width='29'></td>
              <td width='364'>
                <table border='0' width='100%' cellspacing='1' cellpadding='0'>
                  <tr>
                    <td width='93%'>
                      <p align='right'><b><font face='Verdana' color='#FFFFFF' size='1'><a href='ped-user-malote.php3?revenda=$revenda&amp;login=$log'>SOLICITAR
                      MALOTE</a>&nbsp;&nbsp;</font></b></td>
                    <td width='8%'><b><font face='Verdana' color='#FFFFFF' size='1'>&nbsp;<img border='0' src='images/tracking.gif' width='20' height='20'></font></b></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table border='0' cellpadding='2' cellspacing='1' width='608'>
           <tr>
            <td width='486' bgcolor='#669999'>
              <p align='left'><b><font face='Verdana' size='2' color='#FFFFFF'>&nbsp;REVENDAS
              - PEDIDOS</font></b></td>
            <td width='110' bgcolor='#669999'>
              <b><font face='Verdana' size='2' color='#FFFFFF'>&nbsp;</font></b></td>
          </tr>

            <tr>
            <td width='486' bgcolor='#669999'>
              <p align='left'><font size='1' face='Verdana'><b><font
color='#000000'>&nbsp;<a
href=ped-user-cad.php3?revenda=$revenda&login=$log>NOVO PEDIDO</a>
</font> | <b><a
href=ped-user-lista.php3?revenda=$revenda&login=$log&hist=0>PEDIDOS</a>
|
              <a
href='ped-user-lista.php3?revenda=$revenda&login=$log&hist=1'>HISTÓRICO</a></b>
|  <b><a href='listavalores-new.php3?revenda=$revenda&login=$log' target=_new>TABELA
PRE&Ccedil;OS</a></b>
 |
 <b><a href='procedimentoped.php3' target=_new>AJUDA</a></b>
 |
 <b><a
href='http://www.bb.com.br/appbb/portal/voce/ep/fin/UsuariosEspecificos.jsp' 
target=_new >BBRASIL</a></b>

</font></b></td>
            <td width='110' bgcolor='#669999'>
              <p align='right'><a href='index.php3'><b><font size='1' face='Verdana'>FINALIZAR</font></b></a></td>
          </tr>

           <tr>
            <td width='596' colspan='2'></td>
          </tr>

        </table>

  </center>
</div>

</div>
<form method='POST' action='$PHP_SELF?Action=insert&amp;retorno=1&revenda=$revenda&login=$log'>
  <div align='center'>
    <center>
    <table border='0' width='600' cellspacing='1' cellpadding='2'>
      <tr>
        <td width='100%'>
          <p align='center'><b><font face='Verdana' size='2'>Clique no botão
          abaixo para solicitar um novo malote</font></b></td>
      </tr>
      <tr>
        <td width='100%'>
          <p align='center'><input type='submit' value='Solicitar Malote' name='B1'></td>
      </tr>
	  <tr>
        <td width='100%'><br>
          <p align='left'><font face='Verdana' size='1' color='#FF0000'><b>OBS.1:</B> No caso de <b>CANCELAMENTO</b> do Malote entrar em contato diretamente com a transportadora. Falar com Andressa (32) 3217-3500. </font><br>
		  <font face='Verdana' size='1' color='#FF0000'><b>OBS.2:</B> Utilize o botão <b> ATUALIZAR TABELA </b> para manter atualizada a listagem e ver as alterações feitas pela transportadora. </font></p>
		</td>
      </tr>
    </table>
    </center>
  </div>

</form>

  <div align='center'>
    <center>
    <table height='204' cellSpacing='0' cellPadding='2' width='680' border='0'>
      <tbody>
         <tr>
          <td width='50%' height='15'><font size='1' face='Verdana'><b>:: <a href='#legenda'>VER
            LEGENDA</a></b></font></td>
          <td width='50%' height='15'><font size='1' face='Verdana'><b>:: <a href='$PHP_SELF?revenda=$revenda&login=$log'><font color='#FF0000'>ATUALIZAR
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
   <tr>
                  <td width='17%' bgcolor=$cor><b><font size='1' face='Verdana'>$nome</font></b></td>
                  <td width='16%' bgcolor=$cor><font size='1' face='Verdana'>$datacheg</font></td>
                  <td width='18%' bgcolor=$cor><font size='1' face='Verdana'><b>$endereco
                    - $cidade - $estado</b></font></td>
                  <td width='13%' bgcolor=$cor><font size='1' face='Verdana'>$tel</font></td>
                  <td width='11%' bgcolor=$cor><font size='1' face='Verdana'><b>$status</b></font></td>
                  <td width='15%' bgcolor=$cor><font size='1' face='Verdana'>$datastatus</font></td>
                  <td width='7%' bgcolor=$cor><font size='1' face='Verdana'>$solf</font></td>
                
                 <td width='7%' bgcolor=$cor><font size='1' face='Verdana'>$colf</font></td>
				   
                <td width='7%' bgcolor=$cor><font size='1' face='Verdana'>$entf</font></td>
                  <td width='4%' bgcolor=$cor>
                    <p align='center'><font size='1' face='Verdana'><b></b></font></td>
                </tr>
					   <tr>
                  <td width='113%' bgColor='#f4f4f4' colspan='10'><font size='1' face='Verdana'><b>OBS.:
                    </b></font>  $obsold</td>
                </tr>

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

?>
