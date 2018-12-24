<style type="text/css">
<!--
body,td,th {
	font-family: Trebuchet MS, Tahoma, Verdana, Arial;
	font-size: 12px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
	margin-left: 15px;
	margin-top: 15px;
	margin-right: 15px;
	margin-bottom: 15px;
}
-->
</style>


<?php


/*
+--------------------------------------------------------------
|  Informações dos servidores
+--------------------------------------------------------------
|  data, hora, ip, phpinfo
+--------------------------------------------------------------
*/

$datahora = date("d/m/Y H:i:s");


echo "--------------------------------------------------------------<br>";
echo "<b>INFORMAÇÕES DO SERVIDOR</b><br>";
echo "--------------------------------------------------------------<br>";
echo "Data e Hora: $datahora<br>";
echo "Nome Servidor: $_SERVER[SERVER_NAME]<br>";
echo "Porta Servidor: $_SERVER[SERVER_PORT]<br>";
echo "Protocolo do Servidor: $_SERVER[SERVER_PROTOCOL]<br>";
echo "Software Servidor: $_SERVER[SERVER_SOFTWARE]<br>";
echo "Host do Servidor: $_SERVER[HTTP_HOST]<br>";
echo "Conexão: $_SERVER[HTTP_CONNECTION]<br>";
echo "URI Requisitada: $_SERVER[REQUEST_URI]<br>";
echo "--------------------------------------------------------------<br>";
echo "Porta Remota: $_SERVER[REMOTE_PORT]<br>";
echo "IP Remoto: $_SERVER[REMOTE_ADDR]<br>";
echo "IP Local: ".$_SERVER["HTTP_X_FORWARDED_FOR"]."";
echo "--------------------------------------------------------------<br>"; 
echo "Navegador: $_SERVER[HTTP_USER_AGENT]<br>";
echo "Modo de requisição: $_SERVER[REQUEST_METHOD]<br>";
echo "--------------------------------------------------------------<br>";




//phpinfo();

?>



