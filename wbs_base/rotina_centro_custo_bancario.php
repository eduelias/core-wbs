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
  <table width="100%" border="0">
<form id="form1" name="form1" method="post" action="<? echo $PHP_SELF."?Action=pesquisa";?> ">

  <tr>
   
    <td>PERIODO</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td>
      <input name="mes" type="text" id="mes" size="2" maxlength="2" />
      /
      <input name="ano" type="text" id="ano" size="4" maxlength="4" />
   </td>
    <td><input type="submit" name="Submit" value="Submit" /></td>
  </tr>
  </form>
</table>
  
  <?


switch ($Action)
  {
    case "pesquisa":
    
   
    
     $rs_lista_proj_select = $db->query_db("SELECT codproj, nomeproj FROM projeto_nome where codproj = '$codproj'","SQL_NONE","N");

?>
		<BR>
		<BR>
		<table width="100%" border="0">
		 <tr>
		    <td><B>PROJETO:</b><? echo $rs_lista_proj_select->fields[1]; ?></td>
		    <td><b>PERIODO:</b><? echo "$mes/$ano" ?></td>
		    <td></td>
		  </tr>
		   <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		  </tr>
		  <tr>
		    <td>OPCAIXA</td>
		    <td>DESCRI&Ccedil;&Atilde;O</td>
		    <td>VALOR</td>
		  </tr>
		  
<?

$rs_lista = $db->query_db("SELECT fin_bcomov.opcaixa, descricao, SUM(debito) FROM fin_bcomov WHERE datamov LIKE '$ano-$mes%' and (opcaixa = '01.03' or opcaixa = '01.04' or opcaixa = '01.05' or opcaixa = '01.09' or opcaixa = '01.53' or opcaixa = '01.54' or opcaixa = '01.55')  group by opcaixa ORDER BY descricao","SQL_NONE","N");

while (!$rs_lista->EOF)
	{
		if ($x==1){$cor = "#CCCCCC";$k=0;}
		if ($x==0){$cor = "#FFFFFF";$k=1;}
		?>
		
		  <tr bgcolor="<? echo $cor; ?>">
		    <td><a href="javascript:void(0)" onclick="NewWindow('rotina_centro_custo__bancario_view.php?Action=pesquisa&codproj=<?echo $codproj?>&opcaixa=<? echo $rs_lista->fields[0]; ?>&ano=<? echo $ano ?>&mes=<? echo $mes ?>','TESTE','1000','400','yes');return false")><? echo $rs_lista->fields[0]; ?></a></td>
		    <td><? echo $rs_lista->fields[1]; ?></td>
		    <td align = "right"><? echo $db->fvalor($rs_lista->fields[2]); ?></td>
		  </tr>
		
		
		<?
		$valort = $valort + $rs_lista->fields[2];
		if ($k==0){$x=0;}
		if ($k==1){$x=1;}
		$rs_lista->MoveNext();
	}
	
	?>
	
	<tr bgcolor="#F3F7CE">
		    <td></td>
		    <td></td>
		    <td align = "right"><B><? echo $db->fvalor($valort); ?></B></td>
		  </tr>
	</table>
	<?
	
	  break;
 	
  }
  
  
  

$db->disconnect();
?>