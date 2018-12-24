<?php

require("../classprod.php");

$codgrp = 2;


// INICIO DA CLASSE
$prod = new operacao();

// ACOES PRINCIPAIS DA PAGINA


	// LISTA OS REGISTROS DE ACORDO COM O ACRESCIMO DEFINIDO
		$prod->listProdSum("codmenu, menu", "seguranca_menu", "", $array, $array_campo, "ORDER BY menu");

		for($i = 0; $i < count($array); $i++ ){
			
			$prod->mostraProd( $array, $array_campo, $i );

			// DADOS //
			$codmenu[$i] = $prod->showcampo0();
			$menu[$i] = $prod->showcampo1();

			$div_name[$i] = "popup".$menu[$i]."Items";
			$div_name_m[$i] = "popup".$menu[$i];

			$prod->listProdSum("seguranca.codpg, nomem, arquivo, actionpg", "segurancaacesso,seguranca", "codmenu=$codmenu[$i] AND codgrp = '$codgrp' AND segurancaacesso.codpg=seguranca.codpg", $array1, $array_campo1, "ORDER BY nomem");

				for($j = 0; $j < count($array1); $j++ ){
				
					$prod->mostraProd( $array1, $array_campo1, $j );

					// DADOS //
					$codpg[$i][$j] = $prod->showcampo0();
					$nomem[$i][$j] = $prod->showcampo1();
					$arquivo[$i][$j] = $prod->showcampo2();
					$actionpg[$i][$j] = $prod->showcampo3();
				
					#print_r(array_values ($nomem));echo"<BR>";

				}//FOR

			$sub_array[$i] = $j;
			
		}//FOR

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>WBS - Grupo Ipasoft</title>
<link href="css/padrao.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript src='menus.js' type=text/javascript></SCRIPT>
<body>
<br>
<?
	for($i = 0; $i < count($array); $i++ ){

?>
<DIV id= <? echo"$div_name[$i]"; ?> style='Z-INDEX: 100000; FILTER: progid:DXImageTransform.Microsoft.Shadow(color=#888888,strength=5,direction=135); VISIBILITY: hidden; POSITION: absolute'>
<TABLE class=topMenuItems cellSpacing=0 cellPadding=0 width=200 border=0>
  <TBODY>
<?
		for($j = 0; $j < $sub_array[$i]; $j++ ){

		// DADOS //
		$xcodpg = $codpg[$i][$j];
		$xnomem = $nomem[$i][$j];
		$xarquivo = $arquivo[$i][$j];
		$xactionpg = $actionpg[$i][$j];
?>	

   <TR class=topMenuItemOff onmouseover=onTopMenuItem(this) 
  onclick="gotoTopMenuItem('restrito.php?pg=<? echo"$xcodpg";  ?>')" onmouseout=offTopMenuItem(this) statustext='<? echo"$xnomem"; ?>'>
    <TD width=25 height=16><IMG src='images/ic_users.gif' width="16" height="15" hspace=5 vspace=5></TD>
    <TD><? echo"$xnomem";  ?></TD></TR>

<? 		}//FOR ?>
		
</TBODY></TABLE></DIV>

<?	}//FOR ?>
<table width="778"  border="0" align="center" cellpadding="0" cellspacing="0" class="tabelaprincipal" >
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20%" align="left" valign="baseline" bgcolor="#ECF3FA"><img src="images/logowbs_p1.png" width="124" height="30"></td>
        <td width="80%" height="20" bgcolor="#ECF3FA"><table width="100%"  border="0" cellpadding="3" cellspacing="0">
          <tr>
            <td width="86%" align="right"><span class="relogio" id="clock"></span><script language="JavaScript" type="text/javascript" src="relogio.js"></script></td>
            <td width="14%" align="right"><a href="?logout"><img src="images/logout.gif" width="78" height="23" border="0"></a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#2F6FBF"><img src="images/logowbs_p2.png" width="124" height="80"></td>
        <td height="80" bgcolor="#2F6FBF"><TABLE cellSpacing=2 cellPadding=0 border=0>
          <TBODY>
            <TR>
              <?
	for($i = 0; $i < count($array); $i++ ){
?>
              <TD class=topButtonOff id=<? echo"$div_name_m[$i]"; ?> onmouseover=onTopButton(this) onmouseout=offTopButton(this)><IMG src='images/aabb.gif' width="32" height="32"><BR>
                  <? echo"$menu[$i]"; ?></TD>
              <? 
	}//FOR 
?>
            </TR>
          </TBODY>
        </TABLE></td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#C0D6EF"><img src="images/logowbs_p3.png" width="124" height="30"></td>
        <td height="20" bgcolor="#C0D6EF"><table width="100%"  border="0" cellpadding="3" cellspacing="0">
          <tr>
            <td width="50%" class="bemvindo">Bem vindo giovanni (ADMIN) </td>
            <td width="50%" align="right"><img src="images/msg_nova.gif" width="91" height="25"><img src="images/naoconformidade.gif" width="145" height="25"> </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#2F6FBF"><table width="100%"  border="0" cellpadding="3" cellspacing="0" class="copyright">
          <tr>
            <td width="50%">Copyright &copy; 2005 Grupo Ipasoft. Todos os direitos reservados.</td>
            <td width="50%" align="right"><a href="?ir=politicaprivacidade">Pol&iacute;tica de Privacidade</a> | <a href="?ir=sobreipasoft">Sobre o Grupo Ipasoft</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#ECF3FA"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="rodape">
            <tr>
              <td height="20" align="center">Processado em: 1.0937831 segundos </td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
</body>
</html>
