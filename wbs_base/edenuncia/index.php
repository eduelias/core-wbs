<?
include("../config.inc.php");
include("../".DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

if ($Action == "insert"){

$db->connect_wbs();
//$db->conn->debug =    true;
$iplocal = $REMOTE_ADDR;

$rs_insert = $db->query_db("INSERT INTO e_denuncia SET denuncia = '$denuncia' , datahora = NOW(), ip= '$iplocal' ","SQL_NONE","N");

$db->disconnect();

}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email - Denuncia</title>
</head>

<body><form id="form1" name="form1" method="post" action="<? echo $PHP_SELF."?Action=insert";?>">
  <table width="200" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr align="center">
    <td colspan="2"><h1><strong>EMAIL DENUNCIA</strong></h1></td>
    </tr>
  <tr>
    <td><img src="../images/voz.jpg" alt="" border="0" /></td>
    <td><textarea name="denuncia" id="textarea" cols="60" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="button" id="button" value="Enviar" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
