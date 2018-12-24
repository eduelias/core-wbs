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
//$db->conn->debug =    true;


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
    
   
     
 
?>
		<BR>
		<BR>
		<table width="100%" border="0">
		 <tr>
		    <td><b>PERIODO:</b><? echo "$mes/$ano" ?></td>
		  		  </tr>
		 </table>
		 <table width="100%" border="1" cellspacing="0" cellpadding="6">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="13%"><div align="center"><strong>VALOR<br />
            VENDIDO</strong></div></td>
            <td width="14%"><div align="center"><strong>MLB</strong></div></td>
            <td width="13%"><div align="center"><strong>CUSTO<br />
            PRODUTO</strong></div></td>
            <td width="6%"><div align="center"><strong>MM<br />
            %</strong></div></td>
            <td width="13%"><div align="center"><strong>CARTÃO</strong></div></td>
            <td width="6%"><div align="center"><strong>%</strong></div></td>
            <td width="14%"><div align="center"><strong>BOLETO</strong></div></td>
            <td width="6%"><div align="center"><strong>%</strong></div></td>
          </tr>
		  
<?


$vpp_total = 0;			
$mlb_total = 0;
$custo_total = 0;
$cartao_total = 0;
$boleto_total = 0;
////////////////////////// MARGEM VAREJO ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codped, vpp, dataped, (SELECT tipo FROM vendedor WHERE codvend = pedido.codvend) as tipo , mlb FROM  pedido WHERE cancel <> 'OK' and ped_transf <> 'OK' and dataped like '$ano-$mes%'  and modelo_ped = '' having tipo = 'V' ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$rs_cartao = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.27' or tipo = '02.28' or tipo = '02.29' or tipo = '02.30' or tipo = '02.31' or tipo = '02.32' or tipo = '02.33' or tipo = '02.34' or tipo = '02.35' or tipo = '02.36' or tipo = '02.37' or tipo = '02.38') ","SQL_NONE","N");
			
			$rs_boleto = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.04' ) ","SQL_NONE","N");
									
			$rs_custo = $db->query_db("SELECT   (SUM( ifnull( qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if (qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ) , qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ),  qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )) )  FROM pedidoprod WHERE codped = '".$rs_lista->fields[0]."' GROUP by pedidoprod.codped","SQL_NONE","N");
			
			#echo " codped =  ".$rs_lista->fields[0]." vpp =  ".$rs_lista->fields[1]." dataped =  ".$rs_lista->fields[2]." tipo =  ".$rs_lista->fields[3]." mlb =  ".$rs_lista->fields[4]." custo =  ".$rs_custo->fields[0]. " - " .(($rs_lista->fields[1] - $rs_custo->fields[0])/$rs_lista->fields[1])*100 ." <BR>";
			
			if ($rs_custo->fields[0] <> 0){$vpp_total = $vpp_total + $rs_lista->fields[1];}			
			if ($rs_custo->fields[0] <> 0){$mlb_total = $mlb_total + $rs_lista->fields[4];}
			$custo_total = $custo_total + $rs_custo->fields[0];
			if ($rs_custo->fields[0] <> 0){$cartao_total = $cartao_total + $rs_cartao->fields[0];}
			if ($rs_custo->fields[0] <> 0){$boleto_total = $boleto_total + $rs_boleto->fields[0];}
			
			
			$rs_lista->MoveNext();
		}//WHILE
}

			$vpp_geral = $vpp_geral + $vpp_total;
			$custo_geral = $custo_geral + $custo_total;
			$cartao_geral = $cartao_geral + $cartao_total;
			$boleto_geral = $boleto_geral + $boleto_total;

?>
 <tr>
    <td><strong>VAREJO</strong></td>
    <td><div align="right"><? echo $db->fvalor($vpp_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($mlb_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($custo_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor((($vpp_total - $custo_total)/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($cartao_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_total/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($boleto_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_total/$vpp_total)*100); ?></div></td>
  </tr>
  
  <?

#echo "<b><br>VAREJO: VPP: $vpp_total - MLB: $mlb_total - PC: $custo_total - MARG: ".(($vpp_total - $custo_total)/$vpp_total)*100 ." - CARTAO: $cartao_total - PERC: " .($cartao_total/$vpp_total)*100 . " - BOLETO: $boleto_total - PERC: " .($boleto_total/$vpp_total)*100 . " <BR></b>" ;


$vpp_total = 0;			
$mlb_total = 0;
$custo_total = 0;
$cartao_total = 0;
$boleto_total = 0;
////////////////////////// REV IPASOFT ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codped, vpp, dataped, (SELECT tipo FROM vendedor WHERE codvend = pedido.codvend) as tipo , mlb FROM  pedido WHERE cancel <> 'OK' and ped_transf <> 'OK' and dataped like '$ano-$mes%' and modelo_ped = '' having tipo = 'R' ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$rs_cartao = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.27' or tipo = '02.28' or tipo = '02.29' or tipo = '02.30' or tipo = '02.31' or tipo = '02.32' or tipo = '02.33' or tipo = '02.34' or tipo = '02.35' or tipo = '02.36' or tipo = '02.37' or tipo = '02.38') ","SQL_NONE","N");
			
			$rs_boleto = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.04' ) ","SQL_NONE","N");
			
			$rs_custo = $db->query_db("SELECT   (SUM( ifnull( qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if (qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ) , qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ),  qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )) )  FROM pedidoprod WHERE codped = '".$rs_lista->fields[0]."' GROUP by pedidoprod.codped","SQL_NONE","N");
			
			#echo " codped =  ".$rs_lista->fields[0]." vpp =  ".$rs_lista->fields[1]." dataped =  ".$rs_lista->fields[2]." tipo =  ".$rs_lista->fields[3]." mlb =  ".$rs_lista->fields[4]." custo =  ".$rs_custo->fields[0]. " - " .(($rs_lista->fields[1] - $rs_custo->fields[0])/$rs_lista->fields[1])*100 ." <BR>";
			
			if ($rs_custo->fields[0] <> 0){$vpp_total = $vpp_total + $rs_lista->fields[1];}			
			if ($rs_custo->fields[0] <> 0){$mlb_total = $mlb_total + $rs_lista->fields[4];}
			$custo_total = $custo_total + $rs_custo->fields[0];
			if ($rs_custo->fields[0] <> 0){$cartao_total = $cartao_total + $rs_cartao->fields[0];}
			if ($rs_custo->fields[0] <> 0){$boleto_total = $boleto_total + $rs_boleto->fields[0];}
			
			
			$rs_lista->MoveNext();
		}//WHILE
}

			$vpp_geral = $vpp_geral + $vpp_total;
			$mlb_geral = $mlb_geral + $mlb_total;
			$cartao_geral = $cartao_geral + $cartao_total;
			$custo_geral = $custo_geral + $custo_total;
			$boleto_geral = $boleto_geral + $boleto_total;

?>
<tr>
    <td><strong>REV. IPASOFT</strong></td>
    <td><div align="right"><? echo $db->fvalor($vpp_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($mlb_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($custo_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor((($vpp_total - $custo_total - $mlb_total)/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($cartao_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_total/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($boleto_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_total/$vpp_total)*100); ?></div></td>
  </tr>

<?


#echo "<b><br>REV IPASOFT: VPP: $vpp_total - MLB: $mlb_total - PC: $custo_total - MARG: ".(($vpp_total - $custo_total - $mlb_total)/$vpp_total)*100 ." - CARTAO: $cartao_total - PERC: " .($cartao_total/$vpp_total)*100 . " - BOLETO: $boleto_total - PERC: " .($boleto_total/$vpp_total)*100 . "<BR></b>" ;


$vpp_total = 0;			
$mlb_total = 0;
$custo_total = 0;
$cartao_total = 0;
$boleto_total = 0;
////////////////////////// DISTRIBUICAO ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codped, vpp, dataped, (SELECT tipo FROM vendedor WHERE codvend = pedido.codvend) as tipo , mlb FROM  pedido WHERE cancel <> 'OK' and ped_transf <> 'OK' and dataped like '$ano-$mes%' and modelo_ped = 'DST' having tipo = 'R' ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$rs_cartao = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.27' or tipo = '02.28' or tipo = '02.29' or tipo = '02.30' or tipo = '02.31' or tipo = '02.32' or tipo = '02.33' or tipo = '02.34' or tipo = '02.35' or tipo = '02.36' or tipo = '02.37' or tipo = '02.38') ","SQL_NONE","N");
			
			$rs_boleto = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.04' ) ","SQL_NONE","N");
			
			$rs_custo = $db->query_db("SELECT   (SUM( ifnull( qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if (qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ) , qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ),  qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )) )  FROM pedidoprod WHERE codped = '".$rs_lista->fields[0]."' GROUP by pedidoprod.codped","SQL_NONE","N");
			
			#echo " codped =  ".$rs_lista->fields[0]." vpp =  ".$rs_lista->fields[1]." dataped =  ".$rs_lista->fields[2]." tipo =  ".$rs_lista->fields[3]." mlb =  ".$rs_lista->fields[4]." custo =  ".$rs_custo->fields[0]. " - " .(($rs_lista->fields[1] - $rs_custo->fields[0])/$rs_lista->fields[1])*100 ." <BR>";
			
			if ($rs_custo->fields[0] <> 0){$vpp_total = $vpp_total + $rs_lista->fields[1];}			
			if ($rs_custo->fields[0] <> 0){$mlb_total = $mlb_total + $rs_lista->fields[4];}
			$custo_total = $custo_total + $rs_custo->fields[0];
			if ($rs_custo->fields[0] <> 0){$cartao_total = $cartao_total + $rs_cartao->fields[0];}
			if ($rs_custo->fields[0] <> 0){$boleto_total = $boleto_total + $rs_boleto->fields[0];}
			
			
			$rs_lista->MoveNext();
		}//WHILE
}

			$vpp_geral = $vpp_geral + $vpp_total;
			$cartao_geral = $cartao_geral + $cartao_total;
			$custo_geral = $custo_geral + $custo_total;
			$boleto_geral = $boleto_geral + $boleto_total;

?>
<tr>
    <td><strong>DISTRIBUIÇÃO</strong></td>
    <td><div align="right"><? echo $db->fvalor($vpp_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($mlb_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($custo_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor((($vpp_total - $custo_total)/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($cartao_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_total/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($boleto_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_total/$vpp_total)*100); ?></div></td>
  </tr>
<?

#echo "<b><br>DISTRIBUICAO: VPP: $vpp_total - PC: $custo_total - MARG: ".(($vpp_total - $custo_total)/$vpp_total)*100 ." - CARTAO: $cartao_total - PERC: " .($cartao_total/$vpp_total)*100 . " - BOLETO: $boleto_total - PERC: " .($boleto_total/$vpp_total)*100 . "<BR></b>"  ;


$vpp_total = 0;			
$mlb_total = 0;
$custo_total = 0;
$cartao_total = 0;
$boleto_total = 0;
////////////////////////// FAT DIRETO) ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codped, vpp, dataped, (SELECT tipo FROM vendedor WHERE codvend = pedido.codvend) as tipo , mlb FROM  pedido WHERE cancel <> 'OK' and ped_transf <> 'OK' and dataped like '$ano-$mes%' and modelo_ped = 'RDD' having tipo = 'R' ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$rs_cartao = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.27' or tipo = '02.28' or tipo = '02.29' or tipo = '02.30' or tipo = '02.31' or tipo = '02.32' or tipo = '02.33' or tipo = '02.34' or tipo = '02.35' or tipo = '02.36' or tipo = '02.37' or tipo = '02.38') ","SQL_NONE","N");
			
			$rs_boleto = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.04' ) ","SQL_NONE","N");
			
			$rs_custo = $db->query_db("SELECT   (SUM( ifnull( qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if (qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ) , qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ),  qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )) )  FROM pedidoprod WHERE codped = '".$rs_lista->fields[0]."' GROUP by pedidoprod.codped","SQL_NONE","N");
			
			#echo " codped =  ".$rs_lista->fields[0]." vpp =  ".$rs_lista->fields[1]." dataped =  ".$rs_lista->fields[2]." tipo =  ".$rs_lista->fields[3]." mlb =  ".$rs_lista->fields[4]." custo =  ".$rs_custo->fields[0]. " - " .(($rs_lista->fields[1] - $rs_custo->fields[0])/$rs_lista->fields[1])*100 ." <BR>";
			
			if ($rs_custo->fields[0] <> 0){$vpp_total = $vpp_total + $rs_lista->fields[1];}			
			if ($rs_custo->fields[0] <> 0){$mlb_total = $mlb_total + $rs_lista->fields[4];}
			$custo_total = $custo_total + $rs_custo->fields[0];
			if ($rs_custo->fields[0] <> 0){$cartao_total = $cartao_total + $rs_cartao->fields[0];}
			if ($rs_custo->fields[0] <> 0){$boleto_total = $boleto_total + $rs_boleto->fields[0];}
			
			
			$rs_lista->MoveNext();
		}//WHILE
}

			$vpp_geral = $vpp_geral + $vpp_total;
			$mlb_geral = $mlb_geral + $mlb_total;
			$cartao_geral = $cartao_geral + $cartao_total;
			$custo_geral = $custo_geral + $custo_total;
			$boleto_geral = $boleto_geral + $boleto_total;

?>
<tr>
    <td><strong>FAT DIRETO</strong></td>
    <td><div align="right"><? echo $db->fvalor($vpp_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($mlb_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($custo_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor((($vpp_total - $custo_total - $mlb_total)/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($cartao_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_total/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($boleto_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_total/$vpp_total)*100); ?></div></td>
  </tr>
<?

#echo "<b><br>FAT DIRETO: VPP: $vpp_total - MLB: $mlb_total - PC: $custo_total - MARG: ".(($vpp_total - $custo_total - $mlb_total)/$vpp_total)*100 ." - CARTAO: $cartao_total - PERC: " .($cartao_total/$vpp_total)*100 . " - BOLETO: $boleto_total - PERC: " .($boleto_total/$vpp_total)*100 . "<BR></b>"  ;


$vpp_total = 0;			
$mlb_total = 0;
$custo_total = 0;
$cartao_total = 0;
$boleto_total = 0;
////////////////////////// LOJA VIRTUAL ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT codped, vpp, dataped, (SELECT tipo FROM vendedor WHERE codvend = pedido.codvend) as tipo , mlb FROM  pedido WHERE cancel <> 'OK' and ped_transf <> 'OK' and dataped like '$ano-$mes%' and modelo_ped = '' and codvend = 627 having tipo = 'V'  ","SQL_NONE","N");


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$rs_cartao = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.27' or tipo = '02.28' or tipo = '02.29' or tipo = '02.30' or tipo = '02.31' or tipo = '02.32' or tipo = '02.33' or tipo = '02.34' or tipo = '02.35' or tipo = '02.36' or tipo = '02.37' or tipo = '02.38') ","SQL_NONE","N");
			
			$rs_boleto = $db->query_db("SELECT SUM(vp) FROM pedidoparcelas WHERE codped = '".$rs_lista->fields[0]."' and (tipo = '02.04' ) ","SQL_NONE","N");
				
			$rs_custo = $db->query_db("SELECT   (SUM( ifnull( qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra <= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra DESC  LIMIT 0 , 1 ) , if (qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ) , qtde * ( SELECT puc FROM produtos WHERE codprod = pedidoprod.codprod ),  qtde * ( SELECT (pcu + pcu * ( ipi /100 ) ) FROM ocprod, oc WHERE ocprod.codoc = oc.codoc AND codped_transf =0 AND datacompra >= '".$rs_lista->fields[2]."' AND codprod = pedidoprod.codprod ORDER BY datacompra ASC  LIMIT 0 , 1 )) )) )  FROM pedidoprod WHERE codped = '".$rs_lista->fields[0]."' GROUP by pedidoprod.codped","SQL_NONE","N");
			
			#echo " codped =  ".$rs_lista->fields[0]." vpp =  ".$rs_lista->fields[1]." dataped =  ".$rs_lista->fields[2]." tipo =  ".$rs_lista->fields[3]." mlb =  ".$rs_lista->fields[4]." custo =  ".$rs_custo->fields[0]. " - " .(($rs_lista->fields[1] - $rs_custo->fields[0])/$rs_lista->fields[1])*100 ." <BR>";
			
			if ($rs_custo->fields[0] <> 0){$vpp_total = $vpp_total + $rs_lista->fields[1];}			
			if ($rs_custo->fields[0] <> 0){$mlb_total = $mlb_total + $rs_lista->fields[4];}
			$custo_total = $custo_total + $rs_custo->fields[0];
			if ($rs_custo->fields[0] <> 0){$cartao_total = $cartao_total + $rs_cartao->fields[0];}
			if ($rs_custo->fields[0] <> 0){$boleto_total = $boleto_total + $rs_boleto->fields[0];}
			
			
			$rs_lista->MoveNext();
		}//WHILE
}

			$vpp_geral = $vpp_geral + $vpp_total;
			$cartao_geral = $cartao_geral + $cartao_total;
			$custo_geral = $custo_geral + $custo_total;
			$boleto_geral = $boleto_geral + $boleto_total;

?>
<tr>
    <td><strong>LOJA VIRTUAL</strong></td>
    <td><div align="right"><? echo $db->fvalor($vpp_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($mlb_total); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($custo_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor((($vpp_total - $custo_total)/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($cartao_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_total/$vpp_total)*100); ?></div></td>
    <td><div align="right"><? echo  $db->fvalor($boleto_total); ?></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_total/$vpp_total)*100); ?></div></td>
  </tr>
<?


#echo "<b><br>LOJA VIRTUAL: VPP: $vpp_total  - PC: $custo_total - MARG: ".(($vpp_total - $custo_total)/$vpp_total)*100 ." - CARTAO: $cartao_total - PERC: " .($cartao_total/$vpp_total)*100 . " - BOLETO: $boleto_total - PERC: " .($boleto_total/$vpp_total)*100 . "<BR></b>" ;


	
	$rs_juros = $db->query_db("SELECT SUM(juros) FROM fin_car WHERE opcaixa = '02.04' and datapg like '$ano-$mes%' and juros > 0 ","SQL_NONE","N");
	
?>
<tr bgcolor="#FFFF66">
    <td><strong>TOTAL</strong></td>
    <td><div align="right"><strong><? echo $db->fvalor($vpp_geral); ?></strong></div></td>
    <td><div align="right"><strong><? echo  $db->fvalor($mlb_geral); ?></strong></div></td>
    <td><div align="right"><strong><? echo  $db->fvalor($custo_geral); ?></strong></div></td>
    <td><div align="center"><strong><? echo  $db->fvalor((($vpp_geral - $custo_geral - $mlb_geral)/$vpp_geral)*100); ?></strong></div></td>
    <td><div align="right"><strong><? echo  $db->fvalor($cartao_geral); ?></strong></div></td>
    <td><div align="center"><? echo  $db->fvalor(($cartao_geral/$vpp_geral)*100); ?></div></td>
    <td><div align="right"><strong><? echo  $db->fvalor($boleto_geral); ?></strong></div></td>
    <td><div align="center"><? echo  $db->fvalor(($boleto_geral/$vpp_geral)*100); ?></div></td>
  </tr>
  <tr>
    <td><strong>JUROS REC</strong></td>
    <td><div align="right"><? echo $db->fvalor($rs_juros->fields[0]); ?></div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
    <td><div align="center"></div></td>
    <td><div align="left"></div></td>
    <td><div align="center"></div></td>
    <td><div align="left"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><strong>JUROS REC/BOLETAS</strong></td>
    <td><div align="left"><? echo $db->fvalor(($rs_juros->fields[0]/$boleto_geral)*100); ?> %</div></td>
    <td><div align="left"></div></td>
    <td><div align="left"></div></td>
    <td><div align="center"></div></td>
    <td><div align="left"></div></td>
    <td><div align="center"></div></td>
    <td><div align="left"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>

<?	
	
	
	#echo "<b><br> VPP GERAL: $vpp_geral - CUSTO GERAL: $custo_geral - MLB_GERAL: $mlb_geral - MARGEM GERAL: ". (($vpp_geral - $custo_geral - $mlb_geral)/$vpp_geral)*100 ."  - JUROS E MULTAS MES: ". $rs_juros->fields[0] ." - JUROS/BOLETO TOTAl(%) : ". ($rs_juros->fields[0]/$boleto_geral)*100 . "<BR></b>" ;
	
	  break;
 	
  }

$db->disconnect();


?>

