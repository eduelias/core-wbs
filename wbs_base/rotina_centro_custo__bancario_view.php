<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2006 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_sistema_seed.php
|  template:    sistema_seed.htm
+--------------------------------------------------------------
*/

include("config.inc.php");
include(DIR_SISTEMA."/".DIR_MODULOS."/padrao.class.php");

$db = new Padrao();

$hoje = getdate();
$ano_hoje = $hoje[year];
$mes_hoje = $hoje[mon];

$db->connect_wbs();
//$db->conn->debug = true;


  $rs_lista_proj = $db->query_db("SELECT codproj, nomeproj FROM projeto_nome ORDER BY nomeproj","SQL_NONE","N");
  
  ?>
  
<script language='JavaScript'>
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
if(win.window.focus){win.window.focus();}
}
</script>
  
  
  <?


switch ($Action)
  {
    case "pesquisa":
    
   
?>
		<BR>
		<BR>
		<table width="100%" border="0">
		 <tr>
		    <td><B>PROJETO:</b><? echo $rs_lista_proj_select->fields[1]; ?></td>
		    <td><b>PERIODO:</b><? echo "$mes/$ano" ?></td>
		    <td><b>OPCAIXA:</b><? echo "$opcaixa" ?></td>
		    <td></td>
		    <td></td>	    
		  </tr>
		   <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		  </tr>
		  <tr>
		    <td>OBS</td>
		    <td>VALOR</td>
		    <td>DATAMOV</td>
		    <td>LOGIN</td>
		    <td>DESCRI&Ccedil;&Atilde;O</td>
		  </tr>
		  
<?

$rs_lista = $db->query_db("SELECT opcaixa, descricao, debito, datamov, obs, login FROM fin_bcomov WHERE datamov LIKE '$ano-$mes%' and opcaixa = '$opcaixa' ORDER BY descricao","SQL_NONE","N");

while (!$rs_lista->EOF)
	{
		
		?>
		
		  <tr bgcolor="#F3F7CE">
		    <td><? echo $rs_lista->fields[4]; ?></td>
		     <td><? echo $db->fvalor($rs_lista->fields[2]); ?></td>
		     <td><? echo $rs_lista->fields[3]; ?></td>
		      <td><? echo $rs_lista->fields[5]; ?></td>
		      <td><? echo $rs_lista_cap_select->fields[1]; ?></td>
		  </tr>
		
		
		<?
		$valort = $valort + $rs_lista->fields[2];
		$rs_lista->MoveNext();
	}
	
	?>
	
	<tr bgcolor="#F3F7CE">
		    <td></td>
		     <td><B><? echo $db->fvalor($valort); ?></B></td>
		    <td></td>
		   
		     <td></td>
		      <td></td>
		  </tr>
	</table>
	<?
	
	  break;
 	
  }
  
  
  

$db->disconnect();
?>