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
    <td>PROJETO</td>
    <td>PERIODO</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
     
        <select name="codproj" id="codproj">
         <option value="-1" selected>TODOS</option>
<?
  while (!$rs_lista_proj->EOF)
	{
		
		?>
		
		   <option value="<? echo $rs_lista_proj->fields[0]; ?>"><? echo $rs_lista_proj->fields[1]; ?></option>	
		
		<?
	
		$rs_lista_proj->MoveNext();
	}
       ?>  
        </select>    </td>
    <td>
      <input name="mes" type="text" id="mes" size="2" maxlength="2" />
      /
      <input name="ano" type="text" id="ano" size="4" maxlength="4" />   </td>
    <td><input type="submit" name="Submit" value="Submit" /></td>
  </tr>
  <tr>
    <td><div align="right">GRUPO:</div></td>
    <td><input name="fin_grupo" type="text" id="fin_grupo" size="10" maxlength="10" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
  
<?


switch ($Action)
  {
    case "pesquisa":
    
    if ($codproj <> "-1"){$cond = " and codproj = '$codproj'";}else{$cond = "";}
	if ($fin_grupo <> ""){$cond1 = " and fin_grupo = '$fin_grupo'";}else{$cond1 = "";}
    
     $rs_lista_proj_select = $db->query_db("SELECT codproj, nomeproj FROM projeto_nome where codproj = '$codproj'","SQL_NONE","N");

?>
		<BR>
		<BR>
		<table width="100%" border="0">
		 <tr>
		    <td width="14%"><B>PROJETO:</b><? echo $rs_lista_proj_select->fields[1]; ?></td>
		    <td width="49%"><b>PER&Iacute;ODO:</b><? echo "$mes/$ano" ?></td>
		    <td width="19%"></td>
		    <td width="18%"><b>GRUPO:</b><? echo "$fin_grupo" ?></td>
		 </tr>
		   <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td>OPCAIXA</td>
		    <td>DESCRI&Ccedil;&Atilde;O</td>
		    <td>VALOR</td>
		    <td>&nbsp;</td>
		  </tr>
		  
<?

$rs_lista = $db->query_db("SELECT projeto_relacao_custo.opcaixa, descricao, SUM(valor) as v, fin_grupo FROM projeto_relacao_custo, formapg
WHERE formapg.opcaixa = projeto_relacao_custo.opcaixa $cond AND datacc LIKE '$ano-$mes%' and projeto_relacao_custo.opcaixa <> '60.01' and projeto_relacao_custo.opcaixa <> '60.02' and projeto_relacao_custo.opcaixa <> '60.04' and projeto_relacao_custo.opcaixa <> '100.02' and projeto_relacao_custo.opcaixa <> '100.12' and projeto_relacao_custo.opcaixa <> '100.06' and projeto_relacao_custo.opcaixa <> '800.98' and projeto_relacao_custo.opcaixa <> '830.01' and projeto_relacao_custo.opcaixa <> '100.13' and despesa = 'OP' $cond1 group by projeto_relacao_custo.opcaixa ORDER BY fin_grupo, v DESC,descricao ","SQL_NONE","N");

while (!$rs_lista->EOF)
	{
		if ($x==1){$cor = "#CCCCCC";$k=0;}
		if ($x==0){$cor = "#FFFFFF";$k=1;}
		
		if ($rs_lista->fields[3] <> $fin_grupo_ant){
		?>
        <tr bgcolor="#F3F7CE">
		    <td></td>
		    <td></td>
		    <td align = "right"><B><? echo $db->fvalor($valor_parc); ?></B></td>
		    <td align = "right">&nbsp;</td>
		</tr>
        
        <?
		$fin_grupo_ant = $rs_lista->fields[3];
		$valor_parc= 0;
		}
		
		
		?>
		
		  <tr bgcolor="<? echo $cor; ?>">
		    <td><a href="javascript:void(0)" onclick="NewWindow('rotina_centro_custo_operacional_view.php?Action=pesquisa&codproj=<?echo $codproj?>&opcaixa=<? echo $rs_lista->fields[0]; ?>&ano=<? echo $ano ?>&mes=<? echo $mes ?>','TESTE','1000','400','yes');return false")><? echo $rs_lista->fields[0]; ?></a></td>
		    <td><? echo $rs_lista->fields[1]; ?></td>
		    <td align = "right"><? echo $db->fvalor($rs_lista->fields[2]); ?></td>
		    <td align = "right"><? echo $rs_lista->fields[3]; ?></td>
		  </tr>
		
		
		<?
		
		
		$valort = $valort + $rs_lista->fields[2];
		$valor_parc = $valor_parc + $rs_lista->fields[2];
		if ($k==0){$x=0;}
		if ($k==1){$x=1;}
		
		$rs_lista->MoveNext();
	}
	
	?>
	<tr bgcolor="#F3F7CE">
		    <td></td>
		    <td></td>
		    <td align = "right"><B><? echo $db->fvalor($valor_parc); ?></B></td>
		    <td align = "right">&nbsp;</td>
	</tr>
	<tr bgcolor="#FFCC66">
		    <td></td>
		    <td></td>
		    <td align = "right"><B><? echo $db->fvalor($valort); ?></B></td>
		    <td align = "right">&nbsp;</td>
	</tr>
	</table>
<?
	
	  break;
 	
  }
  
  
  

$db->disconnect();
?>