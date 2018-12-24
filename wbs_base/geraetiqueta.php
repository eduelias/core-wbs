<?

require("classprod.php" );

// INICIO DA CLASSE
$prod = new operacao();


function fdata($data)
    {

	$datanew = str_replace('-','',$data);
	$ano = substr($datanew,0,4);
	$mes = substr($datanew,4,2);
	$dia = substr($datanew,6,2);
	$hora = substr($datanew,8,10);
	$hora = str_replace(':','',$hora);
	$hora = str_replace(' ','',$hora);
	$h = substr($hora,0,2);
	$min = substr($hora,2,2);
	$seg = substr($hora,4,2);

	if ($hora <> 0):
	$data = $dia . '/' . $mes . '/' . $ano . " " . $h . ':' . $min . ':' . $seg;
	else:
	$data = $dia . '/' . $mes . '/' . $ano;
	endif;


	return $data;
		
	}

	/// Funcao FORMATA PREÇOS
	function fpreco($preco)
    {

	$pnew = number_format($preco,2,',','.'); 

	return $pnew;
		
	}

		/// Funcao GERA DATA ATUAL
	function gdata()
    {

		 $hoje = getdate();
		 $ano = $hoje[year];
		 $mes = $hoje[mon];
		 $dia = $hoje[mday];
		 $h = $hoje[hours];
		 $m = $hoje[minutes];
		 $s = $hoje[seconds];

		 if (strlen($mes)==1){$mes = '0'.$mes;}
		 if (strlen($dia)==1){$dia = '0'.$dia;}
		 if (strlen($h)==1){$h = '0'.$h;}
		 if (strlen($m)==1){$m = '0'.$m;}
		 if (strlen($s)==1){$s = '0'.$s;}

		 $dataatual = $ano.$mes.$dia.$h.$m.$s;

	return $dataatual;
		
	}


	// MOSTRA DADOS DO PEDIDO - INICIO
	 $prod->listProdU("codbarra","pedido_kit", "codped=$codped");
		
		
		$codbarra = $prod->showcampo0();

		// MOSTRA DADOS DO PEDIDO - INICIO
		 $prod->listProdU("nomeprod","produtos", "codprod=$codprod");
		
		
		$nomeprod = $prod->showcampo0();
		
		

		$dataatual = $prod->gdata();
		$dataatualf = fdata($dataatual);

$titulo1 = "Lista de Pedidos";

echo("

<html>
<head>
  <title>Testing HTML_ToPDF</title>
  <style type='text/css'>
  div.noprint {
    display: none;
  }
  h6 {
    font-style: italic;
    font-weight: bold;
    font-size: 14pt;
    font-family: Courier;
    color: blue;
  }
  /** Change the paper size, orientation, and margins */
  @page {
    size: 8.5in 14in;
    orientation: landscape;
  }
  /** This is a bit redundant, but its works ;) */
  /** odd pages */
  @page:right {
    margin-right: 1.0cm;
    margin-left: 1.0cm;
    margin-top: 1.0cm;
    margin-bottom: 1.0cm;
  }
  /** even pages */
  @page:left {
    margin-right: 1.0cm;
    margin-left: 1.0cm;
    margin-top: 1.0cm;
    margin-bottom: 1.0cm;
  }
  </style>
</head>
<body>


");
		
 $totalpagina= ceil($numvol /6);  


	 $numvolt=$numvol;

$h=0;
 for($i = 0; $i < $totalpagina; $i++ ){

	 echo("

	 <table border='0' width='100%' cellspacing='0' cellpadding='0' height='950'>
  <tr>
    <td width='1%' valign='top'><img border='0' src='images/hbranco.gif' width='1' height='842'></td>
    <td width='99%' valign='top'>
      &nbsp;
<table border='1' width='100%' cellspacing='10' cellpadding='2' >

	");


 $numlinhas = ceil($numvol/2);
 if ($numlinhas > 3){
	 $numvol = ($numvol-6);
	 $numlinhas = 3;
	 $h=6*$i;
 }
#echo("nl=$numlinhas - nv=$numvol");


  for($j = 0; $j < $numlinhas; $j++ ){
	
  $h=$h+1;

	echo("

<tr>
    <td valign='top' width='441'>
      <p class='MsoNormal'><b><font face='Verdana' size='2'><span style='mso-bidi-font-size: 12.0pt; font-weight: bold; font-size: 10pt'><o:p>
      </o:p>
      </span></font></b></p>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='50%' bgcolor='#FFFFFF'>
            <p align='left'><img border='0' src='images/grupoipa.gif' width='131' height='58'></td>
          <td width='50%' bgcolor='#FFFFFF'>
            <p align='right'><img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
        </tr>
        <tr>
          <td width='100%' colspan='2'>
            <hr size='1'>
          </td>
        </tr>
         <tr>
          <td width='100%' bgcolor='#F3F3F3' colspan='2'><font color='#800000' face='Verdana' size='1'>DESCRIÇÃO</font><font face='Verdana' size='2'><br>
            <b>$nomeprod</b></font></td>
        </tr>

        <tr>
          <td width='100%' colspan='2'>
            <p align='center'><font size='2' face='Verdana'><br>
            </font><font face='Verdana' size='5'>$h/$numvolt</font></td>
        </tr>
      </table>
    </td>


	");
	    $h=$h+1;
	  echo("
      <td valign='top' width='441'>
      <p class='MsoNormal'><b><font face='Verdana' size='2'><span style='mso-bidi-font-size: 12.0pt; font-weight: bold; font-size: 10pt'><o:p>
      </o:p>
      </span></font></b></p>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='50%' bgcolor='#FFFFFF'>
            <p align='left'><img border='0' src='images/grupoipa.gif' width='131' height='58'></td>
          <td width='50%' bgcolor='#FFFFFF'>
            <p align='right'><img src='barcode/barcode.php?code=$codbarra&encoding=EAN&scale=1&mode=png'></td>
        </tr>
        <tr>
          <td width='100%' colspan='2'>
            <hr size='1'>
          </td>
        </tr>
         <tr>
          <td width='100%' bgcolor='#F3F3F3' colspan='2'><font color='#800000' face='Verdana' size='1'>DESCRIÇÃO</font><font face='Verdana' size='2'><br>
            <b>$nomeprod</b></font></td>
        </tr>

        <tr>
          <td width='100%' colspan='2'>
            <p align='center'><font size='2' face='Verdana'><br>
            </font><font face='Verdana' size='5'>$h/$numvolt</font></td>
        </tr>
      </table>
    </td>


  </tr>
");
  }

echo("

</table>
    </td>
  </tr>
</table>


");


 }



