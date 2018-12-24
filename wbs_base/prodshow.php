<?php

mysql_connect("localhost","root","");


$pesq = "Select descdet from produtos where codprod=$codprod";
$result = mysql("sif",$pesq);

#echo($pesq);

$data = mysql_result($result,0,"descdet");

require("classprod.php" );

// VARIAVEIS DA PAGINA
$acrescimo = 5;
$tabela = "cliente";					// Tabela EM USO
$condicao1 = "codcliente=$codcliente";		// condicao sem WHERE e separadas por AND or OR -> ADD/UP/DEL 
$condicao2 = "";						// condicao sem WHERE e separadas por AND or OR -> LISTAR 
$parm = " order by nome limit $desloc,$acrescimo ";								// order by nome
$campopesq = "nome";				// Campo a ser pesquisado -> LISTAR 
$nomeform = "CLIENTE";
$titulo = "Lista de Clientes";

// INICIO DA CLASSE
$prod = new operacao();

include("sif-topo.php");
echo ("

$data

");
include("sif-rodape.php");
?>
