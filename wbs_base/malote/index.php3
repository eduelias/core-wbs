<?
echo("

<html>
<head><title>Controle de Malotes</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<div align='center'>
  <center>
    <table border='0' width='550' cellspacing='0' cellpadding='0'>
      <tr>
      <td width='20' bgcolor='#FFFFFF'><img border='0' src='images/seta.gif' width='20' height='20'>&nbsp;</td>
        <td width='526' bgcolor='#000000'><b><font color='#3399FF' face='Verdana' size='2'>&nbsp;</font></b></td>
    </tr>
    <tr>
        <td width='548' colspan='2' align='center'><font face='Verdana' size='2'><img src='images/logo.jpg' width='400' height='200'></font>&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align='center'>
  <center>
    <table width='550' cellpadding='2'>
      <tr align='center'> 
        <td width='80%'><font face='Verdana' size='2'>Seja Bem-Vindo à Ipasoft.
          </font></td>
      </tr>
    </table>
  </center>
</div>
<p><center>

<div align='center'>
  <table border='0' width='100%' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='100%'>
        <p align='center'><b><font face='Verdana' size='5'>CONTROLE DE MALOTES<br>
        </font></b><font face='Verdana'><small>Digite seu <b>LOGIN</b> e <b>SENHA</b>
        abaixo para entrar na área de Controle de Malotes</small></font></td>
    </tr>
  </table>
</div>
<div>
  <form action='login.php3' method='POST' name='Form'>
    <div align='center'>
      <table border='0' cellPadding='2' cellSpacing='1' width='560'>
        <tbody>
          <tr>
            <td colSpan='3' width='540'>
              <p align='center'><b><font color='#008080' face='Verdana' size='4'>ENTRE
              COM SUA IDENTIFICAÇÃO:</font></b></p>
            </td>
          </tr>
		  <!--
          <tr>
            <td width='115'></td>
            <td width='119'><b><font color='#000000' face='Verdana' size='2'>Login</font></b></td>
            <td width='300'><input name='login' size='20'></td>
          </tr>
		  -->
          <tr>
            <td width='115'></td>
            <td width='119'><b><font color='#000000' face='Verdana' size='2'>Senha</font></b></td>
            <td width='300'><font face='Verdana' size='2'><input name='senha' type='password' value size='20'></font></td>
          </tr>
          <tr>
            <td colSpan='3' width='540'>&nbsp;</td>
          </tr>
          <tr>
            <td colSpan='3' width='540'>
              <p align='center'>
<input type=submit name=b1 name=SUBMIT value=Enviar>
              </p>
            </td>
        </tr>
      </tbody>
      </table>
    </div>
  </form>
</div>
&nbsp;
<table border='0' width='100%' cellspacing='0' cellpadding='3'>
  <tr>
    <td width='100%' align='center'><p><font size='1' face='Verdana' color='#808080'>Copyright ©&nbsp;
2002 - JFnet Soluções Internet</font></p>
</td>
  </tr>
</table>

</center>
</body>
</html>
");
?>

