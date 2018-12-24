<?php

// Verifica se possui barra / no final
// Se não, coloca barra
if (dirname($_SERVER['PHP_SELF']) == "/") { $bar = ""; } else { $bar = "/"; }

// Variáveis
$temporeload = "10";
$urlreload = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $bar ."restrito.php?pg=$pg&pg_ped=$pg_ped";
$txtreload = ">>>>>>>>>";

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="<? echo $temporeload; ?>;URL=<? echo $urlreload; ?>">
<title>WBS - Redirecionando</title>
<style type="text/css">
<!--
.corpo {
	font-family: "Trebuchet MS", Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #000000;
	border-top: 2px outset #3879CD;
	border-right: 2px outset #91C0EE;
	border-bottom: 2px outset #91C0EE;
	border-left: 2px outset #3879CD;
	padding: 3px;
}
.titulo {
	font-family: "Trebuchet MS", Tahoma, Verdana, Arial;
	font-size: 18px;
	font-weight: bold;
	color: #FFFFFF;
	padding: 6px;
}
.msg {
	font-family: "Trebuchet MS", Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #000000;
	background-color: #FFFFFF;
	padding: 4px;
	border: 1px inset #3879CD;
}
body {
	background-color: #D4D0C8;
}
-->
</style>
</head>

<body>
<br>
<br>
<br>
<br>
<table  border="0" align="center" cellpadding="3" cellspacing="2" background="../images/fundomenu.jpg" class="corpo">
  <tr>
    <td class="titulo">Redirecionando p&aacute;gina, aguarde...</td>
  </tr>
  <tr>
    <td class="msg"><? echo $txtreload; ?></td>
  </tr>
</table>
</body>
</html>