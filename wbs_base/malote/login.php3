<?
include("bdconnect.php3");

$entrada = "SELECT * from senha where login= 'transportadora' and senha = '$senha'";
$p_e = mysql("ipasoft",$entrada);
$p_e_n = mysql_numrows($p_e);

if ($p_e_n <> 0):

$revenda = urlencode(mysql_result($p_e,0,'revenda'));
$login = urlencode(mysql_result($p_e,0,'login'));

echo("
<html>
<head>
<meta http-equiv='REFRESH'
content='0;URL=http://www.ipasoft.com.br/malote/malote.php3?connect=1'>
</head>
<body>
</body>
</html>
");

else:

echo("
<html>
<head>
<title>Ipasoft Informatica</title>
<link rel='stylesheet' type='text/css' href='style.css'>

</head>
<body bgcolor='#FFFFFF'>
<P align='center'>
<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='0' cellpadding='0'>
      <tr>
      <td width='20' bgcolor='#FFFFFF'><img border='0' src='images/seta.gif' width='20' height='20'>&nbsp;</td>
        <td width='526' bgcolor='#000000'><b><font color='#3399FF' face='Verdana' size='2'>&nbsp;</font></b></td>
    </tr>
    <tr>
        <td width='548' colspan='2' align='center'>&nbsp;<P><font size=5 color=#FF0000 face='Verdana'><b>ACESSO NEGADO</b></font><p>
<font color='#FF0000' face='Verdana' size='2'><b>LOGIN</b> ou <b> SENHA</b> Incorretos.<br>
</font><font color='#FF0000' face='Verdana' size='2'>Clique em Voltar
e digite corretamente os dados fornecidos.</font></td>
    </tr>
  </table>
  </center>
</div>
<P>
<p>




<br>
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

endif;

?>
