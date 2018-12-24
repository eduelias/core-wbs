<?

include("classprod.php");
include("config.inc.php");
include("wbs2_novo/modulos/padrao.class.php");

$prod = new operacao();
$db = new Padrao();

$db->connect_wbs();

$db->$conn->debug = true;

$rs_msg = $db->query_db("SELECT codvend, datamsg, assunto, msg FROM msg WHERE assunto LIKE '%Ocorrência%'","SQL_NONE","N");

$db->disconnect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>CODVEND</td>
    <td>DATAMSG</td>
    <td>ASSUNTO</td>
    <td>MSG</td>
  </tr>
<?
if ($rs_msg)
{
	while (!$rs_msg->EOF)
	{
?>
  <tr>
    <td valign="top"><? echo $rs_msg->fields['codvend']; ?></td>
    <td valign="top"><? echo $rs_msg->fields['datamsg']; ?></td>
    <td valign="top"><? echo $rs_msg->fields['assunto']; ?></td>
    <td valign="top"><? echo $rs_msg->fields['msg']; ?></td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><hr /></td>
  </tr>
<?
		$rs_msg->MoveNext();
	}//WHILE
}
?>
</table>
</body>
</html>
