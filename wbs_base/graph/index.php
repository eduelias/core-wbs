<?

require("../classprod.php" );
$prod = new operacao();


			$titulo = "Área restrita.";
			$titulosec = "Permissão de acesso negado";
			$restrito = 0;

			#include ("../sif-topo.php");
			 echo("
			<BR><BR><BR><BR><BR><BR><BR>
			  <p align='center'><img border='0' src='../images/erro.gif' width='35' height='33'><br>
 <b><font face='Verdana' color='#FF0000' size='4'>ACESSO NEGADO</font></b>
 <p align='center'><font face='Verdana' size='2' color='#008080'>$titulo&nbsp;
 <br>
 <b>$titulosec</b></font>
 



			 ");
			#include ("../sif-rodape.php");

?>