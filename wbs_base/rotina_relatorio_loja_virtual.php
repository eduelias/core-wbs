<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (vers�o 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright � 2006 Grupo Ipasoft. Todos os direitos reservados.
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
$ano = $hoje[year];
$mes = $hoje[mon];
$dia = $hoje[mday];
 
 
$db->connect_wbs();
//$db->conn->debug =    true;

////////////////////////// ORDEM DE COMPRA  - ENTRADA ///////////////////////////////////////
$rs_lista = $db->query_db("SELECT produtos.codprod, nomeprod, if ((SELECT (qtde -reserva) FROM estoque WHERE codprod = produtos.codprod and codemp = 15) <= 0 , 1, 0) as est0, if (DATE_FORMAT( datacad, '%d/%m/%Y' ) = DATE_FORMAT( NOW(), '%d/%m/%Y' ), 1, 0) as novo , if (DATE_FORMAT( dataatualiza_preco, '%d/%m/%Y' ) = DATE_FORMAT( NOW(), '%d/%m/%Y' ), 1, 0) as pnovo , pvv, (SELECT (qtde -reserva) FROM estoque WHERE codprod = produtos.codprod and codemp = 15) as estoque  FROM produtos WHERE hist <> 'Y' and chk_web = 'S' ORDER by nomeprod","SQL_NONE","N");


			$html .= "<head>";
			$html .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
			$html .= "<title>Relatorio Loja Virtual</title>";
			$html .= "<style type='text/css'>";
			$html .= "<!--";
			$html .= ".style6 {";
			$html .= "	font-family: Verdana, Arial, Helvetica, sans-serif;";
			$html .= "	font-size: 9px;";
			$html .= "	font-weight: normal;";
			$html .= "}";
			$html .= "-->";
			$html .= "</style>";
			$html .= "</head>";


			$html .= "<table width='100%' border='1' cellspacing='2' cellpadding='3'>";
			$html .= "<tr>";
			$html .= "    <td width='4%' class='style6'></td>";
			$html .= "    <td width='8%' class='style6' align = 'center'><b>COD</B></td>";
			$html .= "    <td width='68%' class='style6' align = 'center'><b>PRODUTOS</B></td>";
			$html .= "    <td width='12%' class='style6' align = 'center'><b>PRECO</B></td>";
			$html .= "    <td width='8%' class='style6' align = 'center'><b>EST</B></td>";
			$html .= "  </tr>";


if ($rs_lista) {
		while (!$rs_lista->EOF) { 
		
			$i++;	
			
			$cor = "#FFFFFF";
			if ($rs_lista->fields[2] == 1){$cor = "#FFFF99";} // SEM ESTOQUE (AMARELO)
			if ($rs_lista->fields[4] == 1){$cor = "#FF0000";} // PRECO NOVO (LARANJA)
			if ($rs_lista->fields[3] == 1){$cor = "#3399FF";} // PRODUTO NOVO (AZUL)
			
		
  			$html .= "<tr bgcolor = '$cor'>";
			$html .= "    <td width='4%' class='style6' align = 'center'>".$i."</td>";
			$html .= "    <td width='8%' class='style6' align = 'center'>".$rs_lista->fields[0]."</td>";
			$html .= "    <td width='68%' class='style6'>".$rs_lista->fields[1]."</td>";
			$html .= "    <td width='12%' class='style6' align = 'center'>".$db->fvalor($rs_lista->fields['pvv'])."</td>";
			$html .= "    <td width='8%' class='style6' align = 'center'>".$rs_lista->fields['estoque']."</td>";
			$html .= "  </tr>";
		
			
			
			#echo $i." - ".$rs_lista->fields[0]." - ".$rs_lista->fields[1]." - ".$rs_lista->fields['pvv']." - ".$rs_lista->fields['estoque']." - EST0=".$rs_lista->fields[2]." - NOVO=".$rs_lista->fields[3]." - NPRECO=".$rs_lista->fields[4]."<BR>";
						
			
	
			$rs_lista->MoveNext();
		}//WHILE
}

			$html .= "<table width='500' border='1' align='center'>";
  			$html .= "	<tr align='center'>";
			$html .= "	<td bgcolor='#FFFF99'>SEM ESTOQUE</td>";
			$html .= "	<td bgcolor='#FF0000'>PRECO NOVO</td>";
			$html .= "	<td bgcolor='#3399FF'>PRODUTO NOVO</td>";
			$html .= " 	</tr>";
			$html .= "</table>";

			$html .= "</table>";
			
			
			
			
			#echo $html;
			
			$to = "Admin Loja Virtual";
			$emailto = "felipefp@gmail.com";
			$assunto = "Relatorio Loja Virtual- $dia/$mes/$ano";
			
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "To: " . $to . " <" . $emailto . ">\r\n";
			$headers .= "Content-type: text/html; charset=ISO-8859-1;\r\n";
						
			@mail($emailto, $assunto, $html, $headers);
			@mail("luciano.squianqui@ipasoft.com.br", $assunto, $html, $headers);
			@mail("bruno.schettino@ipasoft.com.br, erinaldo.cunha@ipasoft.com.br, fernanda.alves@ipasoft.com.br, jair.oliveira@ipasoft.com.br, jader@maxxmicro.com.br, junio@maxxmicro.com.br", $assunto, $html, $headers);

$db->disconnect();


?>

