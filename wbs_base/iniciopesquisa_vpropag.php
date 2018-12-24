<?

require("classprod.php" );


// INICIO DA CLASSE
$prod = new operacao();

$dataatual = $prod->gdata();


  switch ($Action)
{
	case "grava":
		
		if ($tipo_orc_view == "1"){$tipo_orc = "O";}else{$tipo_orc = "P";}
		if ($tipo_orc_view == "A"){$tipo_orc = "A";}
		
		$prod->clear();
		$prod->listProdU("codproj","vendedor", "codvend='$codvend_view'");
		$codproj_view = $prod->showcampo0();
		
		// ADICIONA PRODUTOS NA TABELA TEMPORARIA DO MICRO
		$prod->clear();
		$prod->setcampo1($tipo_orc);
		$prod->setcampo2($codvend_view);
		$prod->setcampo3($codproj_view); // QTDE
		$prod->setcampo4($dataatual);
		if ($folder){$prod->setcampo5("OK");}else{$prod->setcampo5("NO");}
		if ($radio){$prod->setcampo6("OK");}else{$prod->setcampo6("NO");}
		if ($jornal){$prod->setcampo7("OK");}else{$prod->setcampo7("NO");}
		if ($tv){$prod->setcampo8("OK");}else{$prod->setcampo8("NO");}
		if ($visita){$prod->setcampo9("OK");}else{$prod->setcampo9("NO");}
		if ($amigo){$prod->setcampo10("OK");}else{$prod->setcampo10("NO");}
		if ($cliente){$prod->setcampo11("OK");}else{$prod->setcampo11("NO");}
		if ($outdoor){$prod->setcampo12("OK");}else{$prod->setcampo12("NO");}
		if ($loja){$prod->setcampo13("OK");}else{$prod->setcampo13("NO");}
		if ($outros){$prod->setcampo14("OK");}else{$prod->setcampo14("NO");}
		if ($internet){$prod->setcampo15("OK");}else{$prod->setcampo15("NO");}
		if ($catalogo){$prod->setcampo16("OK");}else{$prod->setcampo16("NO");}
		
		$prod->addProd("pedido_pesquisa_propag", $uregmicro);
		
	break;
}


		


$title = "CHECK LIST FINASA";

//include("sif-topolimpo.php");

#echo "aqui=$tipo_finasa_cel - codped = $codped";

if ($Action <> "grava"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
	font-style: normal;
}
.textb {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-style: normal;
	font-weight: bolder;
}
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
}
.textesp {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
}
.style10 {font-size: 9px; font-style: normal; font-family: Arial, Helvetica, sans-serif;}
-->
</style>

<script>
function printPage()
{
    document.getElementById('print').style.visibility = 'hidden';
	// Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
          document.getElementById('print_finasa').value = 1;
    }
    document.getElementById('print').style.visibility = '';
 }

</script>
</head>
<body bgcolor='#FFFFFF' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' >

<center>
  <form id="form1" name="form1" method="post" action="<? echo "$PHP_SELF?pg=$pg&pg_ped=2&Action=grava&menu_not=1"; ?>">
    <table width="100%" border="0" cellpadding="0" cellspacing="1">
      <tr>
        <td colspan="2" align="center" class="titulo">PESQUISA DE VE&Iacute;CULO DE COMUNICA&Ccedil;&Atilde;O </td>
      </tr>
      <tr>
        <td height="0" colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="0" colspan="2" align="center"><strong class="textb">COMO O CLIENTE CHEGOU AT&Eacute; A EMPRESA? </strong></td>
      </tr>
      <tr>
        <td width="48%" height="0" align="center" class="style10"><table width="100%" border="0">
          <tr>
            <td align="center"><input name="folder" type="checkbox" id="folder" value="OK" /></td>
            <td>FOLDER</td>
          </tr>
          <tr>
            <td align="center"><input name="radio" type="checkbox" id="radio" value="OK" /></td>
            <td>RADIO</td>
          </tr>
          <tr>
            <td align="center"><input name="jornal" type="checkbox" id="jornal" value="OK" /></td>
            <td>JORNAL</td>
          </tr>
          <tr>
            <td align="center"><input name="tv" type="checkbox" id="tv" value="OK" /></td>
            <td>TV</td>
          </tr>
          <tr>
            <td align="center"><input name="internet" type="checkbox" id="internet" value="OK" /></td>
            <td>INTERNET</td>
          </tr>
          <tr>
            <td align="center"><input name="visita" type="checkbox" id="visita" value="OK" /></td>
            <td>FUI VISITADO PELO VENDEDOR </td>
          </tr>
        </table></td>
        <td width="52%" height="0" class="style10"><table width="100%" border="0">
          <tr>
            <td align="center"><input name="amigo" type="checkbox" id="amigo" value="OK" /></td>
            <td>INDICA&Ccedil;&Atilde;O AMIGO </td>
          </tr>
          <tr>
            <td align="center"><input name="cliente" type="checkbox" id="cliente" value="OK" /></td>
            <td>J&Aacute; ERA CLIENTE </td>
          </tr>
          <tr>
            <td align="center"><input name="outdoor" type="checkbox" id="outdoor" value="OK" /></td>
            <td>OUTDOOR</td>
          </tr>
          <tr>
            <td align="center"><input name="loja" type="checkbox" id="loja" value="OK" /></td>
            <td>LOCALIZA&Ccedil;&Atilde;O DA LOJA </td>
          </tr>
          <tr>
            <td align="center"><input name="catalogo" type="checkbox" id="catalogo" value="OK" /></td>
            <td>CAT&Aacute;LOGO TELEF&Ocirc;NICO </td>
          </tr>
          <tr>
            <td align="center"><input name="outros" type="checkbox" id="outros" value="OK" /></td>
            <td>OUTROS</td>
          </tr>
        </table></td>
      </tr>

      <tr>
        <td height="0" align="center" class="style10">&nbsp;</td>
        <td height="0" class="style10"><input type="submit" name="Submit" value="ENVIAR" /></td>
      </tr>
    </table>
    <input id = "codemp_view" name="codemp_view" value="<? echo $codemp_view; ?>" type="hidden" >
<input id = "codvend_view" name="codvend_view" value="<? echo $codvend_view; ?>" type="hidden" >
<input id = "tipo_orc_view" name="tipo_orc_view" value="<? echo $tipo_orc_view; ?>" type="hidden" >
  </form>
  <p>&nbsp;</p>
</center>

</body>
</html>

<? }else{?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="wbs2_novo/css/pesquisa.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<title></title>
</head>

<body>
<br>
<table  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="pesq_aviso">Pesquisa realizada com Sucesso!</td>
  </tr>
</table>
</body>
</html>
<? }?>